<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Admin\DetailOrder;
use App\Models\Admin\Employee;
use App\Models\Attendance;
use App\Models\Leave;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function salesReport(Request $request)
    {
         // Retrieve the start and end date from the request
         $startDate = $request->input('start_date');
         $endDate = $request->input('end_date');
 
         // Set default date range to current month if not provided
         if (!$startDate) {
             $startDate = Carbon::now()->startOfMonth()->toDateString();
         }
         if (!$endDate) {
             $endDate = Carbon::now()->endOfMonth()->toDateString();
         }
 
         // Fetch sales data grouped by product within the date range
         $salesData = DetailOrder::selectRaw('products.id, products.image, products.nama, products.harga_jual, SUM(detail_orders.jumlah) as total_quantity, SUM(detail_orders.total_harga) as total_sales')
             ->join('products', 'detail_orders.product_id', '=', 'products.id')
             ->join('orders', 'detail_orders.order_id', '=', 'orders.id')
             ->whereBetween('orders.created_at', [$startDate, $endDate])
             ->groupBy('products.id', 'products.image', 'products.nama', 'products.harga_jual')
             ->get();
 
         // Pass the sales data and the filter dates to the view
         return view('user.owner.report.sales', compact('salesData', 'startDate', 'endDate'));
    }

    public function attendancesReport(Request $request)
    {
          // Retrieve the start and end date from the request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Set default date range to current month if not provided
        if (!$startDate) {
            $startDate = Carbon::now()->startOfMonth()->toDateString();
        }
        if (!$endDate) {
            $endDate = Carbon::now()->endOfMonth()->toDateString();
        }

        // Fetch all employees
        $employees = Employee::all();

        // Initialize an array to hold the attendance data
        $attendanceData = [];

        foreach ($employees as $employee) {
            // Total working days within the date range
            $totalWorkingDays = Carbon::parse($startDate)->diffInDaysFiltered(function (Carbon $date) {
                return !$date->isWeekend();
            }, Carbon::parse($endDate)->endOfDay());

            // Count the different types of absences and leaves within the date range
            $sickDays = Absence::where('employee_id', $employee->id)
                ->where('reason', 'sakit')
                ->where('status', 'confirmed')
                ->whereBetween('start_date', [$startDate, $endDate])
                ->count();

            $permissionDays = Absence::where('employee_id', $employee->id)
                ->where('reason', 'izin')
                ->where('status', 'confirmed')
                ->whereBetween('start_date', [$startDate, $endDate])
                ->count();

            $unexplainedAbsences = Attendance::where('employee_id', $employee->id)
                ->where('status', 'rejected')
                ->whereBetween('date', [$startDate, $endDate])
                ->count();

            $leaveCount = Leave::where('employee_id', $employee->id)
                ->where('status', 'confirmed')
                ->whereBetween('start_date', [$startDate, $endDate])
                ->count();

            // Calculate the number of present days
            $presentDays = Attendance::where('employee_id', $employee->id)
            ->where('status', 'confirmed')
            ->where('type', 'in')
            ->whereBetween('date', [$startDate, $endDate])
            ->distinct('date')
            ->count();

            // Add the data to the array
            $attendanceData[] = [
                'employee_id' => $employee->id,
                'employee_name' => $employee->nama,
                'present_days' => $presentDays,
                'sick_days' => $sickDays,
                'permission_days' => $permissionDays,
                'unexplained_absences' => $unexplainedAbsences,
                'leave_count' => $leaveCount,
            ];
        }

        // Pass the attendance data and the filter dates to the view
        return view('user.owner.report.attendance', compact('attendanceData', 'startDate', 'endDate'));
    }
}

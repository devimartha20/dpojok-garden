<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Admin\DetailOrder;
use App\Models\Admin\Employee;
use App\Models\Admin\Order;
use App\Models\Admin\Payment;
use App\Models\Attendance;
use App\Models\Leave;
use App\Models\Reservation;
use Illuminate\Http\Request;
use PDF;

class PrintController extends Controller
{
    public function printReceiptReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        $order = Order::where('reservation_id', $reservation->id)->first();
        $payment = Payment::findOrFail($order->payment_id);

        $data = [
            'title' => 'Struk Pembayaran',
            'reservation' => $reservation,
            'order' => $order,
            'payment' => $payment,
        ];

        $pdf = PDF::loadView('print.receipt-resv', $data);
        return $pdf->download('receipt-resv.pdf');
    }

    public function printReceiptOrder($id)
    {
        $order = Order::findOrFail($id);
        $payment = Payment::findOrFail($order->payment_id);

        $data = [
            'title' => 'Struk Pembayaran',
            'order' => $order,
            'payment' => $payment,
        ];

        $pdf = PDF::loadView('print.receipt-ord', $data);
        return $pdf->download('receipt.pdf');
    }

    public function printAttendances()
    {
        // Fetch all employees
        $employees = Employee::all();

        // Initialize an array to hold the attendance data
        $attendanceData = [];
        foreach ($employees as $employee) {
            $sickDays = Absence::where('employee_id', $employee->id)
                ->where('reason', 'sakit')
                ->where('status', 'confirmed')
                ->count();

            $permissionDays = Absence::where('employee_id', $employee->id)
                ->where('reason', 'izin')
                ->where('status', 'confirmed')
                ->count();

            $unexplainedAbsences = Attendance::where('employee_id', $employee->id)
                ->where('status', 'rejected')
                ->count();

            $leaveCount = Leave::where('employee_id', $employee->id)
                ->where('status', 'confirmed')
                ->count();

            // Calculate the number of present days
            $presentDays = Attendance::where('employee_id', $employee->id)
                ->where('status', 'confirmed')
                ->where('type', 'in')
                ->distinct('date')
                ->count();

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

        $data = [
            'title' => 'Laporan Absensi Karyawan',
            'attendanceData' => $attendanceData,
        ];

        $pdf = PDF::loadView('print.attendances', $data)->setPaper('a4', 'landscape');
        return $pdf->download('attendances.pdf');
    }

    public function printSales()
    {
        $salesData = DetailOrder::selectRaw('products.id, products.image, products.nama, detail_orders.harga, SUM(detail_orders.jumlah) as total_quantity, SUM(detail_orders.total_harga) as total_sales')
             ->join('products', 'detail_orders.product_id', '=', 'products.id')
             ->join('orders', 'detail_orders.order_id', '=', 'orders.id')
             ->where('orders.status', 'lunas')
             ->groupBy('products.id', 'products.image', 'products.nama', 'detail_orders.harga')
             ->get();

        $data = [
            'title' => 'Laporan Penjualan',
            'salesData' => $salesData,
        ];

        $pdf = PDF::loadView('print.sales', $data)->setPaper('a4', 'landscape');
        return $pdf->download('sales.pdf');
    }
}

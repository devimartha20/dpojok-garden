<?php

namespace App\Http\Controllers;

use App\Models\Admin\DetailOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function salesReport(Request $request)
    {
        // Retrieve the start and end date from the request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Query to fetch sales data grouped by product
        $salesData = DetailOrder::select(
                'products.nama as product_name',
                'products.harga_jual as product_price',
                DB::raw('SUM(detail_orders.jumlah) as total_quantity'),
                DB::raw('SUM(detail_orders.total_harga) as total_sales')
            )
            ->join('products', 'detail_orders.product_id', '=', 'products.id')
            ->whereBetween('detail_orders.created_at', [$startDate, $endDate])
            ->groupBy('products.nama', 'products.harga_jual')
            ->get();

        // Pass the sales data and the filter dates to the view
        return view('user.owner.report.sales', compact('salesData', 'startDate', 'endDate'));
    }

    public function attendanceReport(){
        return view('user.owner.report.attendance');
    }
}

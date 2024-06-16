<?php

namespace App\Http\Controllers;

use App\Models\Admin\DetailOrder;
use App\Models\Admin\Order;
use App\Models\Admin\Product;
use DB;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin'))
        {
            $total_pesanan_masuk = Order::where('progress', 'menunggu')->count();
            $total_pesanan_selesai = Order::where('progress', 'selesai')->orWhere('progress', 'diterima')->count();
            $total_produk_terjual = DB::table('orders')
            ->join('detail_orders', 'orders.id', '=', 'detail_orders.order_id')
            ->where(function ($query) {
                $query->where('orders.progress', 'selesai')
                    ->orWhere('orders.progress', 'diterima');
            })
            ->select('detail_orders.product_id', DB::raw('SUM(detail_orders.jumlah) as total_sold'))
            ->groupBy('detail_orders.product_id')
            ->count();
            $total_pendapatan = Order::where('status', 'lunas')->sum('total_harga');
            $total_pesanan_online = Order::where('tipe', 'online')->count();
            $total_pesanan_offline = Order::where('tipe', 'in_store')->count();
            $pesanan_terbaru = DetailOrder::whereHas('order', function ($query) {
                $query->where('status', 'lunas');
            })
            ->latest()
            ->take(5)
            ->get();
            return view('user.admin.dashboard', compact(
                'total_pesanan_masuk',
                'total_pesanan_selesai',
                'total_produk_terjual',
                'total_pendapatan',
                'total_pesanan_online',
                'total_pesanan_offline',
                'pesanan_terbaru',

            ));
        }
        else if (Auth::user()->hasRole('koki'))
        {
            $total_pesanan_masuk = Order::where('progress', 'menunggu')->count();
            $total_pesanan_diproses = Order::where('progress', 'diproses')->count();
            $total_pesanan_selesai = Order::where('progress', 'selesai')->count();
            $total_pesanan_diterima = Order::where('progress', 'diterima')->count();
            $pesanan_masuk_terbaru = DetailOrder::whereHas('order', function ($query) {
                $query->where('progress', 'menunggu');
            })->latest()
            ->take(5)
            ->get();
            $pesanan_terbaru = DetailOrder::whereHas('order', function ($query) {
                $query->where('status', 'lunas');
            })->latest()
            ->take(5)
            ->get();
            return view('user.koki.dashboard', compact(
                'total_pesanan_masuk',
                'total_pesanan_diproses',
                'total_pesanan_selesai',
                'total_pesanan_diterima',
                'pesanan_masuk_terbaru',
                'pesanan_terbaru',
            ));
        }
        else if (Auth::user()->hasRole('kasir'))
        {
            $total_pesanan_masuk = Order::where('progress', 'menunggu')->count();
            $total_pesanan_selesai = Order::where('progress', 'selesai')->orWhere('progress', 'diterima')->count();
            $total_produk_terjual = DB::table('orders')
            ->join('detail_orders', 'orders.id', '=', 'detail_orders.order_id')
            ->where(function ($query) {
                $query->where('orders.progress', 'selesai')
                    ->orWhere('orders.progress', 'diterima');
            })
            ->select('detail_orders.product_id', DB::raw('SUM(detail_orders.jumlah) as total_sold'))
            ->groupBy('detail_orders.product_id')
            ->count();
            $total_pendapatan = Order::where('status', 'lunas')->sum('total_harga');
            $total_pesanan_online = Order::where('tipe', 'online')->count();
            $total_pesanan_offline = Order::where('tipe', 'in_store')->count();
            $pesanan_terbaru = DetailOrder::whereHas('order', function ($query) {
                $query->where('status', 'lunas');
            })
            ->latest()
            ->take(5)
            ->get();

            return view('user.kasir.dashboard', compact(
                'total_pesanan_masuk',
                'total_pesanan_selesai',
                'total_produk_terjual',
                'total_pendapatan',
                'total_pesanan_online',
                'total_pesanan_offline',
                'pesanan_terbaru',

            ));
        }
        else if (Auth::user()->hasRole('pelayan'))
        {
            $total_pesanan_masuk = Order::where('progress', 'menunggu')->count();
            $total_pesanan_diproses = Order::where('progress', 'diproses')->count();
            $total_pesanan_selesai = Order::where('progress', 'selesai')->count();
            $total_pesanan_diterima = Order::where('progress', 'diterima')->count();
            $pesanan_masuk_terbaru = DetailOrder::whereHas('order', function ($query) {
                $query->where('progress', 'menunggu');
            })->latest()
            ->take(5)
            ->get();
            $pesanan_terbaru = DetailOrder::whereHas('order', function ($query) {
                $query->where('status', 'lunas');
            })->latest()
            ->take(5)
            ->get();
            return view('user.pelayan.dashboard', compact(
                'total_pesanan_masuk',
                'total_pesanan_diproses',
                'total_pesanan_selesai',
                'total_pesanan_diterima',
                'pesanan_masuk_terbaru',
                'pesanan_terbaru',
            ));
        }
        else if (Auth::user()->hasRole('owner'))
        {
            $total_pesanan_masuk = Order::where('progress', 'menunggu')->count();
            $total_pesanan_selesai = Order::where('progress', 'selesai')->orWhere('progress', 'diterima')->count();
            $total_produk_terjual = DB::table('orders')
            ->join('detail_orders', 'orders.id', '=', 'detail_orders.order_id')
            ->where(function ($query) {
                $query->where('orders.progress', 'selesai')
                    ->orWhere('orders.progress', 'diterima');
            })
            ->select('detail_orders.product_id', DB::raw('SUM(detail_orders.jumlah) as total_sold'))
            ->groupBy('detail_orders.product_id')
            ->count();
            $total_pendapatan = Order::where('status', 'lunas')->sum('total_harga');
            $total_pesanan_online = Order::where('tipe', 'online')->count();
            $total_pesanan_offline = Order::where('tipe', 'in_store')->count();
            $pesanan_terbaru = DetailOrder::whereHas('order', function ($query) {
                $query->where('status', 'lunas');
            })
            ->latest()
            ->take(5)
            ->get();
            return view('user.owner.dashboard', compact(
                'total_pesanan_masuk',
                'total_pesanan_selesai',
                'total_produk_terjual',
                'total_pendapatan',
                'total_pesanan_online',
                'total_pesanan_offline',
                'pesanan_terbaru',

            ));
        }
        else if (Auth::user()->hasRole('pelanggan'))
        {
            $products = Product::where('stok', '>', 0)->get();
            $customerId = Auth::user()->customer->id;

            $totalPesananHariIni = Order::where('customer_id', $customerId)
                ->whereDate('created_at', Carbon::today())
                ->count();

            $totalPesananDiproses = Order::where('customer_id', $customerId)
                ->where('progress', 'diproses')
                ->count();

            $totalPesananSelesai = Order::where('customer_id', $customerId)
                ->where('progress', 'selesai')
                ->count();

            $totalPesananDiterima = Order::where('customer_id', $customerId)
                ->where('progress', 'diterima')
                ->count();

            $totalPesananMenungguPembayaran = Order::where('customer_id', $customerId)
                ->where('progress', 'menunggu_pembayaran')
                ->count();

            $pesananTerbaru = Order::where('customer_id', $customerId)
                ->orderBy('updated_at', 'desc')
                ->take(5)
                ->get();

            $startOfWeek = Carbon::now()->startOfWeek();
            $endOfWeek = Carbon::now()->endOfWeek();

            $weeklyOrders = Order::where('customer_id', $customerId)
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->selectRaw('DATE(created_at) as date, SUM(total_harga) as total')
                ->groupBy('date')
                ->orderBy('date', 'asc')
                ->get();

            return view('user.pelanggan.dashboard', compact(
                'products',
                'totalPesananHariIni',
                'totalPesananDiproses',
                'totalPesananSelesai',
                'totalPesananDiterima',
                'totalPesananMenungguPembayaran',
                'pesananTerbaru',
                'weeklyOrders'
            ));
        }

        return abort('403');
    }
}

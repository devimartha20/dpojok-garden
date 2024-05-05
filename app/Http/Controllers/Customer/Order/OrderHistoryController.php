<?php

namespace App\Http\Controllers\Customer\Order;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use App\Models\Admin\Order;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    public function index(){
        $customer = Customer::where('user_id', auth()->user()->id)->first();
        $orders = Order::where('customer_id', $customer->id)->get();
        return view('user.pelanggan.riwayat', compact('orders'));
    }

    public function show($order_id){
        $order = Order::findOrFail($order_id);
        return view('user.pelanggan.detailorder', compact('order'));
    }
}

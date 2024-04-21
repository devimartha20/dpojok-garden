<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use DateTime;
use Auth;

class OrderTransController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('user.kasir.order.order', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($OfflineorOnline)
    {
        // Get current date and time
        $currentDateTime = new DateTime();
        // Format date and time components
        $year = $currentDateTime->format('Y');
        $month = $currentDateTime->format('m');
        $day = $currentDateTime->format('d');
        $time = $currentDateTime->format('His'); // Hours, minutes, seconds
        $hour = $currentDateTime->format('H');
        $minute = $currentDateTime->format('i');
        $second = $currentDateTime->format('s');
        // Get authenticated employee ID (assuming you have a function to retrieve this)
        $userId = Auth::user()->id;
        // Get the last order ID
        $lastOrder = Order::latest()->first();
        $lastOrderId = $lastOrder ? $lastOrder->id : 1;

        // Generate order number by concatenating components
        $orderNo = 'ORDER-'.$OfflineorOnline .$year . $month . $day . $hour. $minute. $second . $userId . ($lastOrderId + 1);
        return view('user.kasir.order.create', compact('orderNo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([

        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

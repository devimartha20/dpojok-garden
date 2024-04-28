<?php

namespace App\Http\Controllers\Customer\Order;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use App\Models\Admin\Payment;
use Illuminate\Http\Request;

class OnlineOrderController extends Controller
{
    public function checkout($order_id){
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $order = Order::findOrFail($order_id);

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_harga,
            ),
            'customer_details' => array(
                'first_name' => $order->customer->nama,
                'email' => $order->customer->user->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // return dd($snapToken);
        return view('user.pelanggan.checkout', compact('snapToken', 'order'));
    }

    public function midtransCallback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        // if($hashed == $request->signature_key){
            $order = Order::findOrFail($request->order_id);
            if($request->transaction_status == 'capture' || $request->transaction_status == 'settlement'){
                //update status order 
                $order = Order::findOrFail($request->order_id)->update([
                    'status' => 'lunas',
                    'progress' => 'menunggu',
                ]);
                Payment::findOrFail($order->payment_id)->update([
                    'status' => 'lunas',
                    'kembali' => 0,
                    'uang'=> $request->gross_amount,
                ]);
            }

            Payment::findOrFail($order->payment_id)->update([
                'transaction_time' => $request->transaction_time,
                'transaction_status' => $request->transaction_status,
                'transaction_id' => $request->transaction_id,
                'status_code' => $request->status_code,
                'payment_type' => $request->payment_type,
                'signature_key' => $request->signature_key,
                
            ]);
            // return dd($request);
            
        // }
    }

    public function finish(Request $request){
        return dd($request);
    }
}

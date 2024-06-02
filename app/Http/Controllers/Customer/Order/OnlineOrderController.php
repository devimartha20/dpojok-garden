<?php

namespace App\Http\Controllers\Customer\Order;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use App\Models\Admin\Payment;
use App\Models\Admin\Product;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Services\Midtrans\CreateSnapTokenService;
use App\Services\Midtrans\CallbackService;

class OnlineOrderController extends Controller
{
    public function checkout($order_id){

        $order = Order::findOrFail($order_id);

        $snapToken = $order->snap_token;
        if (is_null($snapToken)) {
            // If snap token is still NULL, generate snap token and save it to database

            $midtrans = new CreateSnapTokenService($order);
            $snapToken = $midtrans->getSnapToken();

            $order->snap_token = $snapToken;
            $order->save();
        }

        // return dd($snapToken);
        return view('user.pelanggan.checkout', compact('order'));
    }

    public function receive()
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", request()->order_id.request()->status_code.request()->gross_amount.$serverKey);
        if($hashed == request()->signature_key){
            $order = Order::where('no_pesanan', request()->order_id)->first();
            if($order && (request()->transaction_status == 'capture' || request()->transaction_status == 'settlement')){
                //update status order
                $update_order = Order::where('no_pesanan', request()->order_id)->update([
                    'status' => 'lunas',
                    'progress' => 'menunggu',
                ]);

                if($order->reservation_id != null){
                    Reservation::find($order->reservation_id)->update([
                        'status' => 'menunggu'
                    ]);
                }

                Payment::find($order->payment_id)->update([
                    'status' => 'lunas',
                    'kembali' => 0,
                    'uang'=> request()->gross_amount,
                ]);

                foreach($order->detailOrders as $do){
                    $product = Product::findOrFail($do->product_id);
                    if($do->jumlah <= $product->stok){
                        $update_product = Product::findOrFail($do->product_id)->update(['stok'=> $product->stok - $do->jumlah]);
                    }
                }
            }elseif ($order && request()->transaction_status == 'expired') {
                // Update order status to 'dibatalkan'
                $order->update([
                    'progress' => 'dibatalkan',
                ]);

                if($order->reservation_id != null){
                    Reservation::find($order->reservation_id)->update([
                        'status' => 'dibatalkan'
                    ]);
                }
            }

            if ($order){
            Payment::findOrFail($order->payment_id)->update([
                'transaction_time' => request()->transaction_time,
                'transaction_status' => request()->transaction_status,
                'transaction_id' => request()->transaction_id,
                'status_code' => request()->status_code,
                'payment_type' => request()->payment_type,
                'signature_key' => request()->signature_key,
                'fraud_status' => request()->fraud_status,
            ]);


        }


        }

    }

    public function midtransCallback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
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

        }
    }

    public function finish(Request $request){
        return dd($request);
    }
}

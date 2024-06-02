<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin\DetailOrder;
use App\Models\Admin\Order;
use App\Models\Admin\Payment;
use App\Models\Admin\Product;
use App\Models\DetailCart;
use Illuminate\Http\Request;

class ConfirmController extends Controller
{
    public function index(){
        $detailOrders_old = session()->get('detailOrders');
        $detailOrders = [];
        $total_items = 0;
        $total_amount = 0;
        foreach($detailOrders_old as $do){
            $product = Product::find($do['product']->id);
            if ($product){
                $detailOrders[] = $do;
                $total_amount += $do['total_harga'];
            }

        }
        $total_items = count($detailOrders);


        return view('user.pelanggan.confirm', compact('detailOrders', 'total_items', 'total_amount'));
    }

    public function confirm(Request $request){
        // return dd($request);
        $currentDateTime = new \DateTime();
        // Format date and time components
        $year = $currentDateTime->format('Y');
        $month = $currentDateTime->format('m');
        $day = $currentDateTime->format('d');
        $time = $currentDateTime->format('His'); // Hours, minutes, seconds
        $hour = $currentDateTime->format('H');
        $minute = $currentDateTime->format('i');
        $second = $currentDateTime->format('s');
        // Get authenticated employee ID (assuming you have a function to retrieve this)
        $userId = auth()->user()->id;
        // Get the last order ID
        $lastOrder = Order::latest()->first();
        $lastOrderId = $lastOrder ? $lastOrder->id : 1;

        // Generate order number by concatenating components
        $orderNo = 'ORDER-1'.$year . $month . $day . $hour. $minute. $second . $userId . ($lastOrderId + 1);

        $total_amount = 0;
        foreach($request->product as $idx => $do){

                $total_amount += $request->jumlah[$idx] * $request->harga[$idx];

        }

        // Delete the detailOrders session
        session()->forget('detailOrders');
        // Delete the selectedItems session
        session()->forget('selectedItems');

        //create payment
        $payment = Payment::create([
            'no_payment' => time().'-'.$orderNo,
            'status' => 'belum_lunas',
            'total_bayar' => $total_amount,
        ]);

        //create order
        // Save order data to Order model
        $order = Order::create([
            'no_pesanan' => $orderNo,
            'pemesan' => auth()->user()->name,
            'employee_id' => null,
            'total_harga' => $total_amount,
            'jumlah_pesanan' => $request->total_items,
            'progress' => 'menunggu_pembayaran',
            'status' => 'belum_lunas',
            'tipe' => 'online',
            'payment_id' => $payment->id,
            'packing' => 'take_away',
            'customer_id' => auth()->user()->customer->id,
        ]);
        // return dd($request);
        //insert product to detail orders
        foreach($request->product as $idx => $do){
            $product = Product::find($idx);
            if ($product){
                $sourcePath = public_path('images/' . $product->image);
                if (\File::exists($sourcePath)) {
                    $destinationFolder = public_path('images/details');
                    $destinationPath = $destinationFolder . '/' . basename($sourcePath);
                    \File::copy($sourcePath, $destinationPath);
                }
                DetailOrder::create([
                    'order_id' => $order->id,
                    'product_id' => $idx,
                    'jumlah' => $request->jumlah[$idx],
                    'harga' => $request->harga[$idx],
                    'total_harga' => $request->jumlah[$idx] * $request->harga[$idx],
                    'catatan' => $request->catatan[$idx],
                    'nama' => $product->nama,
                    'image' => $product->image,
                    'deskripsi' => $product->deskripsi,
                ]);
            }

        }

        foreach($request->dc as $idx => $dc){
            DetailCart::destroy($dc);
        }

        //redirect to payment method
        return redirect()->route('checkout', $order->id);
    }
}

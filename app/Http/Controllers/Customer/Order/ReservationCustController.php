<?php

namespace App\Http\Controllers\Customer\Order;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use App\Models\Admin\Order;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Support\Facades\Auth;

class ReservationCustController extends Controller
{
    public function index(){
        $cust = Customer::where('user_id', Auth::user()->id)->first();
        $wp = Reservation::with('order')
            ->whereHas('order', function ($query) use ($cust) {
                $query->where('customer_id', $cust->id);
            })
            ->where('status', 'menunggu_pembayaran')
            ->orderBy('updated_at', 'desc')
            ->get();
        $w = Reservation::with('order')
            ->whereHas('order', function ($query) use ($cust) {
                $query->where('customer_id', $cust->id);
            })
            ->where('status', 'menunggu')
            ->orderBy('updated_at', 'desc')
            ->get();
        $a = Reservation::with('order')
            ->whereHas('order', function ($query) use ($cust) {
                $query->where('customer_id', $cust->id);
            })
            ->where('status', 'aktif')
            ->orderBy('updated_at', 'desc')
            ->get();
        $s = Reservation::with('order')
            ->whereHas('order', function ($query) use ($cust) {
                $query->where('customer_id', $cust->id);
            })
            ->where('status', 'selesai')
            ->orderBy('updated_at', 'desc')
            ->get();
        $d = Reservation::with('order')
            ->whereHas('order', function ($query) use ($cust) {
                $query->where('customer_id', $cust->id);
            })
            ->where('status', 'dibatalkan')
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('user.pelanggan.reservation.index', compact('wp', 'w', 'a', 's', 'd'));
    }

    public function create(){
        return view('user.pelanggan.reservation.create');
    }

    public function show($id){
        $reservation = Reservation::find($id);
        $order = Order::where('reservation_id', $reservation->id)->first();
        return view('user.pelanggan.reservation.detail', compact('reservation', 'order'));
    }

    public function payment($id){
        $reservation = Reservation::findOrFail($id);
        $order = Order::where('reservation_id', $reservation->id)->first();

        $snapToken = $order->snap_token;
        if (is_null($snapToken)) {
            // If snap token is still NULL, generate snap token and save it to database

            $midtrans = new CreateSnapTokenService($order);
            $snapToken = $midtrans->getSnapToken();

            $order->snap_token = $snapToken;
            $order->save();
        }
        return view('user.pelanggan.reservation.pay', compact('reservation', 'order'));
    }


}

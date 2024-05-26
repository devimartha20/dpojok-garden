<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Admin\Unit;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        $wp = Reservation::where('status', 'menunggu_pembayaran')
            ->orderBy('updated_at', 'desc')
            ->get();
        $w = Reservation::where('status', 'menunggu')
            ->orderBy('updated_at', 'desc')
            ->get();
        $a = Reservation::where('status', 'aktif')
            ->orderBy('updated_at', 'desc')
            ->get();
        $s = Reservation::where('status', 'selesai')
            ->orderBy('updated_at', 'desc')
            ->get();
        $d = Reservation::where('status', 'dibatalkan')
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('user.kasir.reservation.index', compact('wp', 'w', 'a', 's', 'd'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currentDateTime = new \DateTime();
        $year = $currentDateTime->format('Y');
        $month = $currentDateTime->format('m');
        $day = $currentDateTime->format('d');
        $hour = $currentDateTime->format('H');
        $minute = $currentDateTime->format('i');
        $second = $currentDateTime->format('s');
        $userId = auth()->user()->id;
        $lastReservation = Reservation::latest()->first();
        $lastReservationId = $lastReservation ? $lastReservation->id : 0;

        $no_reservasi = 'RESERVATION-' . $year . $month . $day . $hour . $minute . $second . $userId . ($lastReservationId + 1);
        return view('user.kasir.reservation.create', compact('no_reservasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('reservation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $order = Order::where('reservation_id', $reservation->id)->first();
        return view('user.kasir.reservation.show', compact('reservation', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $order = Order::where('reservation_id', $reservation->id)->first();
        return view('user.kasir.reservation.edit', compact('reservation', 'order'));
    }

    public function payment(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $order = Order::where('reservation_id', $reservation->id)->first();
        return view('user.kasir.reservation.pay', compact('reservation', 'order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('reservation.index');
    }
}

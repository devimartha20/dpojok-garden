<?php

namespace App\Livewire;

use App\Models\Admin\Order;
use App\Models\Admin\Payment;
use App\Models\Reservation;
use Livewire\Component;

class EditResvPayment extends Component
{
    public $payment, $uang, $uang_new, $kembali = 0, $order, $payment_method = 'cash';
    public $transaction_number, $reservation;

    public function mount($reservation){
        $this->reservation = Reservation::findOrFail($reservation->id);
        $this->order = Order::where('reservation_id', $reservation->id)->first();
        $this->payment = Payment::findOrFail($this->order->payment_id);
        $this->uang = $this->payment->uang;
        $this->kembali = $this->uang - $this->payment->total_bayar;
        $this->payment_method = $this->payment->payment_type;
        $this->transaction_number = $this->payment->no_payment;

    }

    public function updatedUang($value)
    {
        // Ensure uang is not negative
        $uang = max(0, $value);
        $this->kembali = $uang - $this->payment->total_bayar;
    }

    public function pay(){

        $validatedData = $this->validate([
            'payment_method' => 'required',
            'transaction_number' => 'required',
            'uang' => 'required|numeric|min:0|max:' . $this->payment->total_bayar - $this->payment->uang,
        ], [
            'payment_method.required' => 'Metode pembayaran harus dipilih.',
            'transaction_number.required' => 'Nomor transaksi harus diisi.',
            'uang.required' => 'Total uang diberikan harus diisi.',
            'uang.numeric' => 'Total uang diberikan harus berupa angka.',
            'uang.min' => 'Total uang diberikan harus minimal :min.',
        ]);

        $update_reservasi = Reservation::findOrFail($this->reservation->id)->update([
            'status' => $this->uang + $this->uang_new > 0 ? 'menunggu' : 'menunggu_pembayaran',
        ]);

        $update_payment = Payment::findOrFail($this->payment->id)->update([
            'status' =>  $this->uang + $this->uang_new >= $this->payment->total_bayar ? 'lunas' : 'belum_lunas',
            'transaction_time' => now(),
            'transaction_id' => $this->transaction_number,
            'payment_type' => $this->payment_method,
            'uang' => $this->uang +  $this->payment->uang,
            'kembali' => $this->kembali,
        ]);

        $payment = Payment::findOrFail($this->payment->id);

        $order = Order::where('payment_id', $payment->id)->first();
        $reservation = Reservation::find($order->reservation_id)->update([
            
        ]);
        $order->update([
            'progress' =>$this->uang > 0 ? 'menunggu' : 'menunggu_pembayaran',
            'status' =>  $this->uang + $this->uang_new >= $this->payment->total_bayar ? 'lunas' : 'belum_lunas',
        ]);

        $this->payment = $payment;

        session()->flash('success', 'Pembayaran berhasil diupdate!');
    }
    public function render()
    {
        return view('livewire.edit-resv-payment');
    }
}

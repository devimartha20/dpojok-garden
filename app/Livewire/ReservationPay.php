<?php

namespace App\Livewire;

use App\Models\Admin\Order;
use App\Models\Admin\Payment;
use App\Models\Admin\Product;
use App\Models\Reservation;
use Livewire\Component;

class ReservationPay extends Component
{
    public $payment, $uang, $kembali = 0, $order, $payment_method = 'cash';
    public $transaction_number, $reservation;


    public function generateTransactionNumber()
    {
        if($this->payment_method == 'cash'){
            $this->transaction_number = 'CASH' . $this->payment->id . 'ON' . time();
        }else if($this->payment_method == 'qris'){
            $this->transaction_number = 'QRIS' . $this->payment->id . 'ON' . time();
        }

    }

    public function updatedPaymentMethod(){
        $this->generateTransactionNumber();
    }

    public function mount($reservation){
        $this->reservation = Reservation::findOrFail($reservation->id);
        $this->order = Order::where('reservation_id', $reservation->id)->first();
        $this->payment = Payment::findOrFail($this->order->payment_id);
        $this->generateTransactionNumber();
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
            'status' => $this->uang > 0 ? 'menunggu' : 'menunggu_pembayaran',
        ]);

        $update_payment = Payment::findOrFail($this->payment->id)->update([
            'status' => $this->uang >= $this->payment->total_bayar ? 'lunas' : 'belum_lunas',
            'transaction_time' => now(),
            'transaction_id' => $this->transaction_number,
            'payment_type' => $this->payment_method,
            'uang' => $this->uang +  $this->payment->uang,
            'kembali' => $this->kembali,
        ]);

        $payment = Payment::findOrFail($this->payment->id);

        $order = Order::where('payment_id', $payment->id)->first();
        $order->update([
            'progress' =>$this->uang > 0 ? 'menunggu' : 'menunggu_pembayaran',
            'status' => $this->uang >= $this->payment->total_bayar ? 'lunas' : 'belum_lunas',
        ]);

        foreach($order->detailOrders as $do){
            $product = Product::findOrFail($do->product_id);
            if($do->jumlah <= $product->stok){
                $update_product = Product::findOrFail($do->product_id)->update(['stok'=> $product->stok - $do->jumlah]);
            }else{
                session()->flash('fail', 'Silahkan update stok produk '.$product->nama);
            }

        }

        $this->payment = $payment;

        session()->flash('success', 'Pembayaran berhasil, Reservasi dan Pesanan sudah masuk ke daftar antrian!');

    }
    public function render()
    {
        return view('livewire.reservation-pay');
    }
}

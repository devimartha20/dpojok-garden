<?php

namespace App\Livewire;

use App\Models\Admin\Product;
use Livewire\Component;
use App\Models\Admin\Payment;
use App\Models\Admin\Order;

class Pay extends Component
{
    public $payment, $uang, $kembali = 0, $order, $payment_method = 'cash';
    public $transaction_number;

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

    public function mount($payment = null){
        $this->payment = $payment;
        $this->order = Order::where('payment_id', $payment->id)->first();
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
            'uang' => 'required|numeric|min:' . $this->payment->total_bayar,
        ], [
            'payment_method.required' => 'Metode pembayaran harus dipilih.',
            'transaction_number.required' => 'Nomor transaksi harus diisi.',
            'uang.required' => 'Total uang diberikan harus diisi.',
            'uang.numeric' => 'Total uang diberikan harus berupa angka.',
            'uang.min' => 'Total uang diberikan harus minimal :min.',
        ]);

        $update = Payment::findOrFail($this->payment->id)->update([
            'status' => 'lunas',
            'transaction_time' => now(),
            'transaction_id' => $this->transaction_number,
            'payment_type' => $this->payment_method,
            'uang' => $this->uang,
            'kembali' => $this->kembali,
        ]);

        $payment = Payment::findOrFail($this->payment->id);

        $order = Order::where('payment_id', $payment->id)->first();
        $order->update([
            'progress' => 'menunggu',
            'status' => 'lunas',
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

        session()->flash('success', 'Pembayaran berhasil, Pesanan sudah masuk ke daftar antrian!');

    }


    public function render()
    {
        return view('livewire.pay', [
            'payment' => $this->payment,
            'payment_mehtod' => $this->payment_method,
            'transaction_number' => $this->transaction_number,
        ]);
    }
}

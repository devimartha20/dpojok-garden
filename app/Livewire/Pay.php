<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Admin\Payment;
use App\Models\Admin\Order;

class Pay extends Component
{
    public $payment, $uang, $kembali = 0, $order;

    public function mount($payment = null){
        $this->payment = $payment;
        $this->order = Order::where('payment_id', $payment->id)->first();
    }

    public function updatedUang($value)
    {
        // Ensure uang is not negative
        $uang = max(0, $value);
        $this->kembali = $uang - $this->payment->total_bayar;
    }

    public function pay(){
        $update = Payment::findOrFail($this->payment->id)->update([
            'status' => 'lunas',
            'uang' => $this->uang,
            'kembali' => $this->kembali,
        ]);

        session()->flash('success', 'Pembayaran berhasil, Pesanan sudah masuk ke daftar antrian!');

    }

    public function printReceipt()
    {
        // Generate receipt content from the view template
        $receiptContent = view('receipt', ['payment' => $this->payment])->render();

        // Open print dialog for receipt
        echo "<script>window.open('', '_blank').document.write('$receiptContent'); window.print();</script>";
    }

    public function printInvoice()
    {
        // Generate invoice content from the view template
        $invoiceContent = view('invoice', ['payment' => $this->payment])->render();

        // Open print dialog for invoice
        echo "<script>window.open('', '_blank').document.write('$invoiceContent'); window.print();</script>";
    }
    public function render()
    {
        return view('livewire.pay', [
            'payment' => $this->payment,
        ]);
    }
}

<?php

namespace App\Livewire;

use App\Models\Admin\DetailOrder;
use App\Models\Admin\Order;
use App\Models\Admin\Payment;
use App\Models\Admin\Product;
use App\Models\Reservation;
use Livewire\Component;

class UpdateReservation extends Component
{
    public $total_price, $order, $payment, $search, $uang, $products, $productOrders = [], $total_all = 0, $reservation, $order_price, $previousPayment;

    public function mount($reservation)
    {
        $this->reservation = $reservation;
        $this->order = Order::where('reservation_id', $reservation->id)->first();
        $this->payment = Payment::find($this->order->payment_id);
        $this->previousPayment = $this->payment->replicate(); // Clone the current payment details
        $this->loadProducts();
        $this->loadOrderDetails();
    }

    public function loadOrderDetails()
    {
        $this->productOrders = $this->order->detailOrders->map(function ($detail) {
            return [
                'id' => $detail->id,
                'product' => $detail->product_id,
                'jumlah' => $detail->jumlah,
                'stok' => $detail->product->stok,
                'nama' => $detail->product->nama,
                'harga_jual' => $detail->harga,
                'total_harga' => $detail->total_harga,
                'catatan' => $detail->catatan,
            ];
        })->toArray();

        $this->calculateTotalHarga();
    }

    public function addToOrder(Product $product)
    {
        if ($product->stok > 0) {
            $existingProductIndex = array_search($product->id, array_column($this->productOrders, 'product'));

            if ($existingProductIndex !== false) {
                $this->productOrders[$existingProductIndex]['jumlah']++;
                $this->productOrders[$existingProductIndex]['total_harga'] = $this->productOrders[$existingProductIndex]['jumlah'] * $this->productOrders[$existingProductIndex]['harga_jual'];

                // Update the existing detail order in the database
                $detailOrder = DetailOrder::find($this->productOrders[$existingProductIndex]['id']);
                $detailOrder->jumlah = $this->productOrders[$existingProductIndex]['jumlah'];
                $detailOrder->total_harga = $this->productOrders[$existingProductIndex]['total_harga'];
                $detailOrder->save();
            } else {
                $newDetailOrder = DetailOrder::create([
                    'order_id' => $this->order->id,
                    'product_id' => $product->id,
                    'jumlah' => 1,
                    'harga' => $product->harga_jual,
                    'total_harga' => $product->harga_jual,
                    'catatan' => '',
                ]);

                $this->productOrders[] = [
                    'id' => $newDetailOrder->id,
                    'product' => $product->id,
                    'jumlah' => 1,
                    'stok' => $product->stok,
                    'nama' => $product->nama,
                    'harga_jual' => $product->harga_jual,
                    'total_harga' => $product->harga_jual,
                    'catatan' => '',
                ];
            }

            $this->calculateTotalHarga();
        }
    }

    public function updateDetailOrder($index)
    {
        $detailOrderData = $this->productOrders[$index];
        $detailOrder = DetailOrder::find($detailOrderData['id']);
        $detailOrder->update([
            'jumlah' => $detailOrderData['jumlah'],
            'total_harga' => $detailOrderData['harga_jual'] * $detailOrderData['jumlah'],
            'catatan' => $detailOrderData['catatan'],
        ]);

        $this->calculateTotalHarga();
    }

    public function removeDetailOrder($index)
    {
        $detailOrderData = $this->productOrders[$index];
        if ($detailOrderData['id']) {
            DetailOrder::destroy($detailOrderData['id']);
        }
        array_splice($this->productOrders, $index, 1);
        $this->calculateTotalHarga();
    }

    public function calculateOrderPrice()
    {
        return array_sum(array_column($this->productOrders, 'total_harga'));
    }

    public function calculateTotalHarga()
    {
        $this->order_price = $this->calculateOrderPrice();
        $this->total_price = $this->order_price + $this->reservation->price;

        $this->order->update([
            'total_price' => $this->total_price,
        ]);

        $this->updatePayment();
    }

    public function updateStatus()
    {
        $status = $this->uang <= 0 ? 'menunggu' : $this->reservation->status;
        Reservation::findOrFail($this->reservation->id)->update([
            'status' => $status,
        ]);

        $payment = Payment::findOrFail($this->payment->id);

        $order = Order::where('payment_id', $payment->id)->first();
        $order->update([
            'progress' => $status,
            'status' => $payment->uang >= $payment->total_bayar ? 'lunas' : 'belum_lunas',
        ]);
    }

    public function updatePayment()
    {
        $this->validate([
            'uang' => 'required|numeric|min:0',
        ]);

        $payment = Payment::find($this->payment->id);
        $total_bayar = $payment->uang + $this->uang;
        $kembali = 0;

        if ($total_bayar >= $this->order->total_price) {
            $kembali = $total_bayar - $this->order->total_price;
        }

        $payment->update([
            'uang' => $total_bayar,
            'kembali' => $kembali,
            'status' => $total_bayar >= $payment->total_bayar ? 'lunas' : 'belum_lunas',
        ]);

        $this->updateStatus();
    }

    public function loadProducts()
    {
        if (!empty($this->search)) {
            $this->products = Product::where('nama', 'like', '%' . $this->search . '%')->get();
        } else {
            $this->products = Product::all();
        }
    }

    public function updatedSearch()
    {
        $this->loadProducts();
    }

    public function render()
    {
        return view('livewire.update-reservation', [
            'products' => $this->products,
            'productOrders' => $this->productOrders,
            'total_price' => $this->total_price,
            'previousPayment' => $this->previousPayment,
        ]);
    }
}

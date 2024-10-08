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
    public $total_price, $order, $payment, $search, $uang = 0, $uang_new, $products, $productOrders = [], $total_all = 0, $reservation, $order_price, $previousPayment;

    public function mount($reservation)
    {
        $this->reservation = $reservation;
        $this->order = Order::where('reservation_id', $reservation->id)->first();
        $this->payment = Payment::find($this->order->payment_id);
        $this->previousPayment = $this->payment->replicate(); // Clone the current payment details
        $this->uang = $this->payment->uang ? $this->payment->uang : 0;
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
                'stok' => $detail->product->stok ?? 0,
                'nama' => $detail->nama,
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
                if($product){
                    $sourcePath = public_path('images/' . $product->image);
                    if (\File::exists($sourcePath)) {
                        $destinationFolder = public_path('images/details');
                        $destinationPath = $destinationFolder . '/' . $product->image;
                        \File::copy($sourcePath, $destinationPath);
                    }
                    $newDetailOrder = DetailOrder::create([
                        'order_id' => $this->order->id,
                        'product_id' => $product->id,
                        'jumlah' => 1,
                        'harga' => $product->harga_jual,
                        'total_harga' => $product->harga_jual,
                        'catatan' => '',
                        'nama' => $product->nama,
                        'deskripsi'=> $product->deskripsi,
                        'image' => $product->image,
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

            }

            $this->calculateTotalHarga();
        }
    }

    public function updateDetailOrder($index)
    {
        $detailOrderData = $this->productOrders[$index];
        $detailOrderData['total_harga'] = $detailOrderData['jumlah'] * $detailOrderData['harga_jual']; // Update total_harga
        $this->productOrders[$index] = $detailOrderData; // Reflect the change in the productOrders array

        $detailOrder = DetailOrder::find($detailOrderData['id']);
        $detailOrder->update([
            'jumlah' => $detailOrderData['jumlah'],
            'total_harga' => $detailOrderData['total_harga'],
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
        $this->payment->update([
            'total_bayar' => $this->total_price
        ]);

        $this->updatePayment();
    }

    public function updateStatus()
    {
        $status = $this->reservation->status == 'menunggu_pembayaran' ? $this->uang > 0 ? 'menunggu' : $this->reservation->status : $this->reservation->status;
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
        $total_bayar = $this->uang;
        $kembali = $total_bayar - $this->calculateOrderPrice();


        $payment->update([
            'uang' => $total_bayar,
            'kembali' => $kembali,
            'status' => $total_bayar >= $payment->total_bayar ? 'lunas' : 'belum_lunas',
        ]);

        $this->updateStatus();
    }

    public function addAmountToPayment()
    {
        $this->validate([
            'uang_new' => 'required|numeric|min:0',
        ]);

        $uang = $this->payment->uang += $this->uang_new;
        $this->uang = $uang;
        $this->payment->save();
        $payment = Payment::find($this->payment->id);
        $kembali = $uang - $this->calculateOrderPrice();


        $payment->update([
            'uang' => $uang,
            'kembali' => $kembali,
            'status' => $uang >= $payment->total_bayar ? 'lunas' : 'belum_lunas',
        ]);

        $this->updateStatus();
    }

    public function loadProducts()
    {
        if (!empty($this->search)) {
            $this->products = Product::where('stok', '>', 0)->where('nama', 'like', '%' . $this->search . '%')->get();
        } else {
            $this->products = Product::where('stok', '>', 0)->get();
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

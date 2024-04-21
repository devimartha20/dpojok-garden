<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Admin\Product;
use App\Models\Admin\Order;
use App\Models\Admin\Employee;
use App\Models\Admin\DetailOrder;
use App\Models\Admin\Payment;
use Auth;

class AddOrder extends Component
{
    public $orderNo, $pemesan, $search;

    public $products, $productOrders = [], $total_all = 0;

    public function mount($orderNo)
    {
        $this->orderNo = $orderNo;
        $this->loadProducts();
    }

    public function loadProducts()
    {
        if (!empty($this->search)) {
            $this->products = Product::where('nama', 'like', '%' . $this->search . '%')->get();
        } else {
            $this->products = Product::all();
        }
    }

    public function addToOrder(Product $product)
    {
        // Check if the product with the same ID already exists in the productOrders array
        $existingProductIndex = null;
        foreach ($this->productOrders as $index => $productOrder) {
            if ($productOrder['product'] === $product->id) {
                $existingProductIndex = $index;
                break;
            }
        }

        // If the product already exists in the order
        if ($existingProductIndex !== null) {
            // Calculate the new total quantity after adding one more
            $newQuantity = $this->productOrders[$existingProductIndex]['jumlah'] + 1;

            // If the new quantity exceeds the available stock, don't add it
            if ($newQuantity > $product->stok) {
                session()->flash('error', 'Jumlah pesanan melebihi stok yang tersedia.');
                return;
            }

            // Increase the quantity (jumlah) of the existing product
            $this->productOrders[$existingProductIndex]['jumlah'] += 1;
            $this->productOrders[$existingProductIndex]['total_harga'] = $this->productOrders[$existingProductIndex]['jumlah'] * $this->productOrders[$existingProductIndex]['harga_jual'] ;
        } else {
            // If the product doesn't exist, add it as a new entry
            $this->productOrders[] = [
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


    public function save()
    {
        // Validate data
        $this->validate([
            'orderNo' => 'required',
            'pemesan' => 'required',
            // Validate each product in productOrders array
            'productOrders.*.product' => 'required', // Ensure each 'product' field is not null
            'productOrders.*.jumlah' => 'required|numeric|min:1', // Ensure each 'jumlah' field is not null and is numeric with minimum value 1
            // Add other validation rules for productOrders if needed
        ]);

        $employee = Employee::where('user_id', Auth::user()->id)->first();

        $payment = Payment::create([
            'no_payment' => now().'-'.$this->orderNo,
            'status' => 'belum_lunas',
            'total_bayar' => collect($this->productOrders)->sum('total_harga'),
        ]);

        // Save order data to Order model
        $order = Order::create([
            'no_pesanan' => $this->orderNo,
            'pemesan' => $this->pemesan,
            'employee_id' => Auth::user()->id,
            'total_harga' => collect($this->productOrders)->sum('total_harga'),
            'jumlah_pesanan' => collect($this->productOrders)->sum('jumlah'),
            'progress' => 'menunggu_pembayaran',
            'status' => 'belum_lunas',
            'tipe' => 'in_store',
            'payment_id' => $payment->id,
            // Add other fields as needed
        ]);

        // Save each item in productOrders array to DetailOrder model
        foreach ($this->productOrders as $productOrder) {
            DetailOrder::create([
                'order_id' => $order->id,
                'product_id' => $productOrder['product'],
                'jumlah' => $productOrder['jumlah'],
                'total_harga' => $productOrder['total_harga'],
                'harga' => $productOrder['harga_jual'],
                'catatan' => $productOrder['catatan'],
                // Add other fields as needed
            ]);
        }

        // Optionally, you can redirect to another page after saving
        session()->flash('success', 'Pemesanan berhasil disimpan, silahkan lakukan pembayaran!');
        return redirect(route('payment.show',  $payment->id));
    }

    public function removeProduct($index)
    {
        array_splice($this->productOrders, $index, 1);
        $this->calculateTotalHarga();
    }

    public function calculateTotalHarga()
    {
        // Update total_harga in productOrders array
        foreach ($this->productOrders as $index => $productOrder) {
            $this->productOrders[$index]['total_harga'] = $productOrder['harga_jual'] * $productOrder['jumlah'];
        }

        // Calculate total_all
        $this->total_all = array_sum(array_column($this->productOrders, 'total_harga'));
    }

    public function updatedSearch()
    {
        $this->loadProducts(); // Load products whenever the search query changes
    }

    public function updated($field, $value)
{
    // Check if the updated field is within the productOrders array and is related to the 'jumlah' field
    if (strpos($field, 'productOrders.') === 0 && strpos($field, '.jumlah') !== false) {
        // Extract the index of the product order from the field name
        $index = explode('.', $field)[1];

        // Validate the updated jumlah value to ensure it's a positive integer
        if (!is_numeric($value) || $value <= 0) {
            session()->flash('error', 'Jumlah harus berupa angka positif.');
            return;
        }

        // Update the jumlah field for the corresponding product order
        $this->productOrders[$index]['jumlah'] = $value;

        // Update the total harga for the corresponding product order
        $this->productOrders[$index]['total_harga'] = $this->productOrders[$index]['harga_jual'] * $value;

        // Recalculate the total harga for all product orders
        $this->calculateTotalHarga();
    }
}



    public function render()
    {
        return view('livewire.add-order', [
            'orderNo' => $this->orderNo,
        ]);
    }

}

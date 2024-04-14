<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Admin\Product;
use App\Models\Admin\Order;
use App\Models\Admin\Employee;
use App\Models\Admin\DetailOrder;
use Auth;

class AddOrder extends Component
{
    public $orderNo, $pemesan, $paymentOrders;
    public $products, $productOrders = [], $total_all = 0;

    public function mount($orderNo){
        $this->orderNo = $orderNo;
        $this->products = Product::all();
        $this->orderNo = $orderNo;
        $this->addProduct();
    }

    // Define a hook method that triggers whenever 'jumlah' or 'harga_jual' is updated
    public function updated($field, $value)
    {
        foreach ($this->productOrders as $index => $productOrder) {
            // Fetch the product model based on the selected product ID
            $product = Product::find($productOrder['product']);

            // Update the 'harga_jual' and 'total_harga' for the product order entry
            if ($product) {
                $this->productOrders[$index]['harga_jual'] = $product->harga_jual;
                $this->productOrders[$index]['total_harga'] = $product->harga_jual * (int)$productOrder['jumlah'];
            }
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

        // Save order data to Order model
        $order = Order::create([
            'no_pesanan' => $this->orderNo,
            'pemesan' => $this->pemesan,
            'employee_id' => $employee->id,
            'total_harga' => collect($this->productOrders)->sum('total_harga'),
            'jumlah_pesanan' => collect($this->productOrders)->sum('jumlah'),
            'progress' => 'menunggu',
            'status' => 'belum_lunas',
            'payment_id' => null,
            // Add other fields as needed
        ]);

        // Save each item in productOrders array to DetailOrder model
        foreach ($this->productOrders as $productOrder) {
            DetailOrder::create([
                'order_id' => $order->id,
                'product_id' => $productOrder['product'],
                'jumlah' => $productOrder['jumlah'],
                'catatan' => $productOrder['catatan'],
                // Add other fields as needed
            ]);
        }

        // Optionally, you can redirect to another page after saving
        session()->flash('success', 'Pemesanan berhasil disimpan, silahkan lakukan pembayaran!');
        return redirect(route('payment.create', $this->orderNo));
    }

    // Method to add a new product order entry
    public function addProduct()
    {
        // Add an empty product order entry with default values
        $this->productOrders[] = [
            'product' => null,
            'jumlah' => 1,
            'harga_jual' => null,
            'total_harga' => null,
            'catatan' => '',
        ];
    }
     // Method to calculate total harga
     public function calculateTotalHarga()
     {
         $this->total_all = array_sum(array_column($this->productOrders, 'total_harga'));
     }

    public function removeProduct($index)
    {
        array_splice($this->productOrders, $index, 1);
        $this->calculateTotalHarga();
    }

    public function render()
    {
        return view('livewire.add-order',
        [
            'orderNo' => $this->orderNo,
        ]);
    }
}

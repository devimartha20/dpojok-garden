<?php

namespace App\Livewire;

use App\Models\Admin\Product;
use Livewire\Component;

class ConfirmOrder extends Component
{
    public $detailOrders, $total_amount, $total_items;

    public function mount($detailOrders, $total_amount, $total_items)
    {
        // Ensure that each item in $detailOrders has a 'product' key associated with a product object
        foreach ($detailOrders as &$do) {
            $do['product'] = Product::find($do['product']->id); // Assuming 'product_id' is the key to fetch the product
        }
        $this->detailOrders = array_values($detailOrders);
        $this->total_amount = $total_amount;
        $this->total_items = $total_items;
    }

    public function updatedDetailOrders($changedDetailOrders, $index)
    {
        // Update total harga for the changed detail order
        $this->detailOrders[$index]['total_harga'] = $this->detailOrders[$index]['jumlah'] * $this->detailOrders[$index]['harga'];

        // Recalculate total amount and total items
        $this->total_amount = collect($this->detailOrders)->sum('total_harga');
        $this->total_items = collect($this->detailOrders)->sum('jumlah');
    }
    public function render()
    {
        return view('livewire.confirm-order', [
            'total_amount' => $this->total_amount,
            'total_items' => $this->total_items,
            'detailOrders' => $this->detailOrders,
        ]);
    }
}

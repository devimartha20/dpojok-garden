<?php

namespace App\Livewire;

use App\Models\Admin\Product;
use App\Models\DetailCart;
use Livewire\Component;

class Cart extends Component
{
    public $cart;
    public $selectedItems = [];


    public function mount($cart = null){
        $this->cart = $cart;

        // Retrieve selected items from session, if any
        $selectedItems = session('selectedItems', []);

        // Initialize the selectedItems array with all detail cart IDs set to false
        $this->selectedItems = $cart->detailCarts->pluck('id')->toArray();

        // Filter out items that do not exist in the session
        $this->selectedItems = array_intersect_key($this->selectedItems, $selectedItems);
    }

    public function totalPrice()
    {
        $totalPrice = 0;

        foreach ($this->selectedItems as $itemId => $selected) {
            if ($selected) {
                $detailCart = DetailCart::find($itemId);
                $totalPrice += $detailCart->product->harga_jual * $detailCart->jumlah;
            }
        }

        return $totalPrice;
    }

    public function incrementQuantity($itemId, $maxStock)
    {
        $detailCart = DetailCart::find($itemId);
        if ($detailCart->jumlah < $maxStock) {
            $detailCart->jumlah++;
            $detailCart->save();
        }
        $this->totalPrice();
    }
    public function deleteItem($itemId)
    {
        $detailCart = DetailCart::find($itemId);
        if ($detailCart) {
            $detailCart->delete();
            session()->flash('success', 'Item berhasil dihapus.');
            $this->cart = $this->cart->fresh(); // Refresh cart data
        }
        // Retrieve selected items from session, if any
        $selectedItems = session('selectedItems', []);

        // Initialize the selectedItems array with all detail cart IDs set to false
        $this->selectedItems = array_fill_keys($this->cart->detailCarts->pluck('id')->toArray(), false);

        // Mark the items that exist in the session as true
        foreach ($this->selectedItems as $itemId => $isChecked) {
            if (isset($selectedItems[$itemId])) {
                $this->selectedItems[$itemId] = true;
            }
        }

        // Filter out items that do not exist in the session
        $this->selectedItems = array_intersect_key($this->selectedItems, $selectedItems);

    }

    public function decrementQuantity($itemId)
    {
        $detailCart = DetailCart::find($itemId);
        if ($detailCart->jumlah > 1) {
            $detailCart->jumlah--;
            $detailCart->save();
        }
        $this->totalPrice();
    }

     public function updatedSelectedItems()
    {
        // Save selected items to session
        session(['selectedItems' => $this->selectedItems]);
    }

    public function confirm(){

        $detailOrders = [];

        foreach ($this->selectedItems as $itemId => $isChecked) {
            if ($isChecked) {
                $dc = DetailCart::findOrFail($itemId);
                $product = Product::find($dc->product->id);
                if ($product){
                    $detailOrders[] = [
                        'detail_cart_id' => $dc->id,
                        'product' => $product,
                        'harga' => $product->harga_jual,
                        'total_harga' => $product->harga_jual * $dc->jumlah,
                        'jumlah' => $dc->jumlah,
                        'nama' => $product->nama,
                        'deskripsi' => $product->deskripsi,
                        'image' => $product->image,
                    ];
                }

            }
        }

        if ($detailOrders == []) {
            session()->flash('error', 'Tidak ada item yang dipilih.');
            return;
        }


        session()->put('detailOrders', $detailOrders);

        return redirect()->route('confirm.index');
    }

    public function render()
    {
        return view('livewire.cart', [
            'cart' => $this->cart,
        ]);
    }
}

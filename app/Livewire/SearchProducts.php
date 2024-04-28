<?php

namespace App\Livewire;

use App\Models\Admin\Product;
use App\Models\Admin\ProductCategory;
use App\Models\Cart;
use App\Models\DetailCart;
use Livewire\Component;

class SearchProducts extends Component
{
    public $products, $search, $categories, $categoryFilter, $cart;

    public function mount(){
        $this->products = Product::where('stok', '<', 0)->get();
        $this->categories = ProductCategory::all();
        $this->cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
        ]);
    }
    public function setCategoryFilter($categoryId)
    {
        $this->categoryFilter = $categoryId;
    }

    public function resetCategoryFilter()
    {
        $this->categoryFilter = null;
    }

    public function addToCart($id)
    {
        // Find or create a cart for the current user
        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
        ]);

        // Find the detail cart record for the current product and cart
        $detail = DetailCart::where('cart_id', $cart->id)
            ->where('product_id', $id)
            ->first();

        if ($detail) {
            // Increment jumlah if the detail cart record exists
            $detail->increment('jumlah');
        } else {
            // Create a new detail cart record with jumlah of 1 if it doesn't exist
            $detail = DetailCart::create([
                'product_id' => $id,
                'cart_id' => $cart->id,
                'jumlah' => 1,
            ]);
        }

        // Show a success message
        session()->flash('message', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function confirm($product){
        $product = Product::findOrFail($product['id']);
        $detailOrders = [];
        $detailOrders[] = [
            'product' => $product,
            'harga' => $product->harga_jual,
            'total_harga' => $product->harga_jual,
            'jumlah' =>1,
        ];
        session()->put('detailOrders', $detailOrders);
        return redirect(route('confirm.index'));
    }
    public function render()
    {
        $query = Product::query();

        if ($this->search) {
            $query->where('nama', 'like', '%' . $this->search . '%');
        }
        if ($this->categoryFilter) {
            $query->where('product_category_id', $this->categoryFilter);
        }
        $this->products = $query->get();
        return view('livewire.search-products', [
            'cart' => $this->cart
        ]);
    }
}

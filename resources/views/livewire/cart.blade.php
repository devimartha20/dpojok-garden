<div>
    <style>
        .quantity-box {
    display: inline-block;
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
    </style>
   <div class="container">
    <div class="card">
        <h5>My Shopping Cart</h5>
        @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
         @endif
         @if (session()->has('success'))
         <div class="alert alert-success">
             {{ session('success') }}
         </div>
          @endif
    </div>
    <hr>

    @foreach ($cart->detailCarts as $dc)
    <div class="row align-items-center">
        <div class="col-2 col-lg-auto d-flex justify-content-center mb-2 mb-lg-0">
            <input wire:model.live="selectedItems.{{ $dc->id }}" class="form-check-input m-0" type="checkbox" id="checkbox{{ $dc->id }}" style="transform: scale(1.5);">
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-4">
                            <img src="{{ asset('images/'.$dc->product->image) }}" alt="Product Image" class="product-image">
                        </div>
                        <div class="col-md-6 col-8">
                            <h5>{{ $dc->product->nama }}</h5>
                            <p>Rp. {{ number_format($dc->product->harga_jual) }}</p>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="input-group mb-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button wire:click="decrementQuantity({{ $dc->id }})" class="btn btn-outline-secondary" type="button">-</button>
                                    </div>
                                    <div class="quantity-box">{{ $dc->jumlah }}</div>
                                    <div class="input-group-append">
                                        <button wire:click="incrementQuantity({{ $dc->id }}, {{ $dc->product->stok }})" class="btn btn-outline-secondary" type="button">+</button>
                                    </div>
                                </div>
                                <div class="input-group-append">
                                    <button wire:click="deleteItem({{ $dc->id }})" class="btn btn-outline-secondary" type="button">Hapus</button>
                                </div>
                            </div>
                            <p class="total-price">Rp. {{ number_format($dc->product->harga_jual * $dc->jumlah) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Display total price -->
    <div class="row mt-4">
        <div class="col">
            <p>Total Harga: Rp. {{ number_format($this->totalPrice()) }}</p>
        </div>
    </div>

    <div class="action-buttons d-flex justify-content-between">
        <div>
            <a class="btn btn-secondary btn-round" href="{{ URL::previous() }}">Kembali</a>
        </div>
        <div>
            <button class="btn btn-primary" wire:click="confirm()">Buat Pesanan</button>
        </div>
    </div>


   </div>
</div>

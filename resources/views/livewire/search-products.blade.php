<div>
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="sub-title">Katalog Produk</div>
            <div class="row">
                <div class="col-lg-10">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="search-container w-100"> <!-- Add w-100 class to make it full-width -->
                            <input type="text" wire:model.live='search' class="search-input form-control" placeholder="Cari dari nama...">
                            <button class="btn btn-primary search-button"><i class="ti-search"></i>Cari</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="position-relative d-inline-block">
                            <span class="badge badge-danger rounded-circle" style="position: absolute; top: -5px; right: -5px;">{{ $cart->detailCarts->count() }}</span>
                            <i class="fa fa-shopping-cart" style="vertical-align: middle;"></i>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xl-10">
            @if (session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
            <div class="row">
                
                @forelse ($products as $p)
                <div class="col-md-6 col-lg-4">
                    <div class="card mb-4">
                        <img src="{{ asset('images/'.$p->image) }}" class="card-img-top" alt="Gambar 1">
                        <div class="card-body">
                            <div class="product-info">
                                <h5 class="product-name">{{ $p->nama }}</h5>
                                <p class="product-description">{{ $p->deskripsi }}</p>
                                <p class="product-price">Rp. {{ number_format($p->harga_jual) }}</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button wire:click="addToCart({{ $p->id }})" class="btn btn-success btn-round">Tambah ke Keranjang</button>
                                <button class="btn btn-warning btn-round">Pesan Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <p class="class-center">Tidak Ada Produk.</p>
                @endforelse
            
            </div>
        </div>
        
        
        <div class="col-lg-12 col-xl-2">
    
            <div class="">
                <div class="d-flex justify-content-center">
                    <ul class="nav nav-tabs md-tabs tabs-right b-none" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link{{ !$categoryFilter ? ' active' : '' }}" wire:click="resetCategoryFilter" role="tab">All</a>
                            <div class="slide"></div>
                        </li>
                        @foreach ($categories as $c)
                        <li class="nav-item">
                            <a class="nav-link{{ $categoryFilter == $c->id ? ' active' : '' }}" wire:click="setCategoryFilter({{ $c->id }})" role="tab">{{ $c->nama }}</a>
                           
                        </li>
                        @endforeach
                    </ul>
                </div>
        </div>
        </div>
    </div>

 
</div>

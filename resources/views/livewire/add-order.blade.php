<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-form-label">Pembuat Pesanan</label>
                                <div class="col-sm-12">
                                    <input type="text" readonly value="{{ Auth::user()->name }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Pemesan</label>
                                <div class="col-sm-12">
                                    <input type="text" wire:model="pemesan" placeholder="Nama Pemesan" value="{{ old('pemesan') }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card bg-c-green order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Total Harga</h6>
                                    <h2 class="text-right"><i class="ti-wallet f-left"></i><span>Rp. {{ number_format($total_all) }}</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Daftar Produk</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" wire:model.live="search" placeholder="Cari Produk">
                    </div>
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->nama }}</h5>
                                    <p class="card-text">Harga: Rp. {{ number_format($product->harga_jual) }}</p>
                                    <small>{{ $product->stok }} Stok Tersedia</small>
                                    <button class="btn btn-primary btn-sm" wire:click="addToOrder({{ $product }})">Tambah ke Pesanan</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Rincian Pesanan</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Catatan</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productOrders as $index => $productOrder)
                            <tr>
                                <td>{{ $productOrder['nama'] }}</td>
                                <td>{{ number_format($productOrder['harga_jual']) }}</td>
                                <td>
                                    <input type="number" min="1" max="{{ $productOrder['stok'] }}" class="form-control"
                                        wire:model.live="productOrders.{{ $index }}.jumlah" value="{{ $productOrder['jumlah'] }}">
                                </td>
                                <td>
                                    <input type="text" class="form-control" wire:model="productOrders.{{ $index }}.catatan">
                                </td>
                                <td>{{ number_format($productOrder['total_harga']) }}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm" wire:click="removeProduct({{ $index }})">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                            <!-- Display total harga keseluruhan -->
                            @if (count($productOrders) > 0)
                            <tr>
                                <td colspan="4" class="text-right">Total Harga Keseluruhan:</td>
                                <td colspan="2">Rp. {{ number_format($total_all) }}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button class="btn btn-info" wire:click="save">Simpan dan Lanjutkan ke Pembayaran</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

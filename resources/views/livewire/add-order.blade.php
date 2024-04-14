<div>
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Pembuat Pesanan</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly value="{{ Auth::user()->name }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Pemesan</label>
                                    <div class="col-sm-10">
                                        <input type="text" wire:model='pemesan' placeholder="Nama Pemesan" value="{{ old('pemesan') }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="card bg-c-green order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20">Total Harga</h6>
                                        <h2 class="text-right"><i class="ti-wallet f-left"></i><span>Rp. {{ $total_all }}</span></h2>
                                        {{-- <p class="m-b-0">This Month<span class="f-right">$542</span></p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="text-right mb-3">
                            <button class="btn btn-sm btn-primary" wire:click="addProduct">Tambah Produk</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                        <th>Catatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($productOrders as $index => $po)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <select class="form-control" wire:model.live="productOrders.{{ $index }}.product">
                                                    <option value="">Pilih Menu</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" min="1" class="form-control" wire:model.live="productOrders.{{ $index }}.jumlah">
                                            </td>
                                            <td>
                                                @if (!is_null($po['harga_jual']))
                                                  Rp. {{ $po['harga_jual'] }}
                                                @else
                                                Rp. 0.00
                                                @endif
                                            </td>
                                            <td>
                                                @if (!is_null($po['total_harga']))
                                                  Rp. {{ $po['total_harga'] }}.00
                                                  @else
                                                  Rp. 0.00
                                                  @endif
                                            </td>
                                            <td>
                                                <input type="text" placeholder="Tulis catatan disini..." class="form-control" wire:model.live="productOrders.{{ $index }}.catatan">
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" wire:click="removeProduct({{ $index }})">Hapus</button>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7">No Data</td>
                                    </tr>
                                    @endforelse
                                     @if (count($productOrders))
                                    <tr>
                                        <th colspan="4" class="text-center">Total</th>
                                        <th>Rp. {{ $total_all }}.00</th>
                                        <td colspan="2"></td>
                                    </tr>
                                     @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <button class="btn btn-info" wire:click='save'>Simpan dan Lanjutkan ke Pembayaran</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- ====================== --}}


</div>

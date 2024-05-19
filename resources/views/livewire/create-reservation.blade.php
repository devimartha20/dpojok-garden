<div>
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container-fluid px-0">
            <div class="row d-flex no-gutters">
                <div class="col-md-12 ftco-animate makereservation p-4 p-md-5 pt-5">
                    <div class="py-md-5">
                        <div class="heading-section ftco-animate mb-5">
                            <span class="subheading">Book a table</span>
                            <h2 class="mb-4">Make Reservation</h2>
                        </div>
                        <div class="reservation-container">
                            <div class="reservation-form">
                                <form wire:submit.prevent="checkAvailability">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tanggal_mulai">Tanggal Sewa</label>
                                                <input type="date" class="form-control" wire:model="date" id="date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jam">Jam Mulai</label>
                                                <input type="time" class="form-control" wire:model="start_time" id="start_time" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jam">Jam Akhir</label>
                                                <input type="time" class="form-control" wire:model="end_time" id="end_time" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="orang">Jumlah Tamu</label>
                                                <input type="number" class="form-control" wire:model="guests" id="jumlah_tamu" placeholder="Jumlah Tamu" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tanggal_akhir">Catatan</label>
                                                <input type="text" class="form-control" wire:model="catatan" id="catatan" placeholder="Tambahkan Catatan">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary py-3 px-5 btn-round">Cek Ketersediaan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @if($available)
                            <div class="table-selection">
                                <div class="form-group">
                                    <label for="nomor_meja">Pilih Meja</label>
                                    <p>Rekomendasi Terbaik</p>
                                    @foreach($bestCombination as $combination)
                                        <div class="form-group">
                                            <input type="radio" wire:model="selectedTable" value="{{ $combination['table_id'] }}">
                                            <img src="{{ asset('images/' . $combination['image']) }}" alt="Product Image" class="product-image">
                                            <p>Jumlah Kursi : {{ $combination['number'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        @if($available)
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
                            @foreach($products as $product)
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->nama }}" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->nama }}</h5>
                                            <p class="card-text">Harga: {{ $product->harga_jual }}</p>
                                            <button wire:click="addToOrder({{ $product->id }})" class="btn btn-primary">Tambah ke Pesanan</button>
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
                                @foreach($productOrders as $index => $order)
                                    <tr>
                                        <td>{{ $order['nama'] }}</td>
                                        <td>{{ $order['harga_jual'] }}</td>
                                        <td><input type="number" wire:model="productOrders.{{ $index }}.jumlah" min="1" max="{{ $order['stok'] }}"></td>
                                        <td><input type="text" wire:model="productOrders.{{ $index }}.catatan"></td>
                                        <td>{{ $order['total_harga'] }}</td>
                                        <td><button wire:click="removeProduct({{ $index }})" class="btn btn-danger">Hapus</button></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Total Harga Pesanan:</strong></td>
                                    <td colspan="2">{{ $order_price }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Total Harga Reservasi:</strong></td>
                                    <td colspan="2">{{ $reservation_price }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Total Harga Keseluruhan:</strong></td>
                                    <td colspan="2">{{ $total_price }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <button wire:click="save" class="btn btn-primary py-3 px-5 btn-round">Buat Reservasi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </section>
</div>

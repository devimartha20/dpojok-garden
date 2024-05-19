<div>    
        <div class="container-fluid px-0">
            <div class="row d-flex no-gutters">
                <div class="col-md-12  makereservation p-4 p-md-5 pt-5">
                    <div class="py-md-5">
                        <div class="heading-section  mb-5">
                            <span class="subheading">Book a table</span>
                            <h2 class="mb-4">Make Reservation</h2>
                        </div>
                        <div class="reservation-container">
                            <div class="reservation-form">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                <form wire:submit.prevent="checkAvailability">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="start_date">Tanggal Sewa</label>
                                                <input type="date" class="form-control" wire:model.live="date" id="start_date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jam_mulai">Jam Mulai</label>
                                                <input type="time" class="form-control" wire:model.live="start_time" id="jam_mulai" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jam_akhir">Jam Akhir</label>
                                                <input type="time" class="form-control" wire:model.live="end_time" id="jam_akhir" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jumlah_tamu">Jumlah Tamu</label>
                                                <input type="number" class="form-control" wire:model.live="guests" id="jumlah_tamu" placeholder="Jumlah Tamu" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="catatan">Catatan</label>
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
                            <div class="table-selection mt-4">
                                @if($available)
                                    <div class="form-group">
                                        <label for="nomor_meja">Pilih Meja</label>
                                        <p>Rekomendasi Terbaik</p>
                                        @foreach ($bestCombination as $tables)
                                            @foreach ($tables as $table)
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="table{{ $table['table_id'] }}" wire:model.live="selected_table" value="{{ $table['table_id'] }}" {{ $loop->iteration == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="table{{ $table['table_id'] }}">Jumlah Kursi: {{ $table['number'] }}</label>
                                            </div>
                                            @endforeach
                                        @endforeach
                                        <hr>
                                        <p>Rekomendasi Lainnya</p>
                                        @foreach ($combinations as $tables)
                                        @foreach ($tables as $table)
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="table{{ $table['table_id'] }}" wire:model.live="selected_table" value="{{ $table['table_id'] }}" {{ $loop->iteration == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="table{{ $table['table_id'] }}">Jumlah Kursi: {{ $table['number'] }}</label>
                                            </div>
                                        @endforeach
                                    @endforeach
                                    </div>
                                @else
                                    <p>Tidak ada meja yang tersedia.</p>
                                @endif
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        @if($available)
        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Produk</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" wire:model="search" placeholder="Cari Produk">
                        </div>
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                            <button wire:click="addToOrder({{ $product->id }})" class="btn btn-primary">Tambah</button>
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
                                @foreach ($productOrders as $index => $order)
                                    <tr>
                                        <td>{{ $order['nama'] }}</td>
                                        <td>Rp {{ number_format($order['harga_jual'], 0, ',', '.') }}</td>
                                        <td>
                                            <input type="number" class="form-control" wire:model="productOrders.{{ $index }}.jumlah" min="1">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" wire:model="productOrders.{{ $index }}.catatan">
                                        </td>
                                        <td>Rp {{ number_format($order['total_harga'], 0, ',', '.') }}</td>
                                        <td>
                                            <button wire:click="removeProduct({{ $index }})" class="btn btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Total Harga Pesanan: Rp {{ number_format($order_price, 0, ',', '.') }}</h5>
                            </div>
                            <div class="col-md-6">
                                <h5>Total Harga Reservasi: Rp {{ number_format($reservation_price, 0, ',', '.') }}</h5>
                            </div>
                            <div class="col-md-6">
                                <h5>Total Harga Keseluruhan: Rp {{ number_format($total_price, 0, ',', '.') }}</h5>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button wire:click="save" class="btn btn-primary py-3 px-5 btn-round">Buat Reservasi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif   
</div>

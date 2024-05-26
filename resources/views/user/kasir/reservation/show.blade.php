@extends('layouts.main.layout')

@section('title')
    Detail Reservasi
@endsection
@section('styles')
<style>
    /* Additional CSS styles can be added here if needed */
    .product-image {
        float: left;
        margin-right: 100px;
    }
    .bottom-right {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    .separator {
        margin-top: 20px;
        border-top: 1px solid #ccc;
    }
    .icon-link {
        margin-right: 10px;
    }
</style>
@endsection

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Detail Reservasi</h5>
                </div>
                <div class="card-body">
                    <p>Tanggal Sewa : {{ $reservation->date }}</p>
                    <p>Jam Awal Sewa : {{ $reservation->start_time }}</p>
                    <p>Jam Akhir Sewa : {{ $reservation->end_time }}</p>
                    <p>Jumlah Tamu : {{ $reservation->guests }}</p>
                    <p>Catatan : {{ $reservation->note }} </p>
                    <div class="separator"></div>
                    <div class="form-group">
                        <label for="ordered_menu">Menu yang Dipesan:</label>
                    </div>
                    @foreach ($order->detailorders as $do)
                        <div class="product-image">
                            <img src="{{ asset('images').'/'.$do->product->image }}" alt="Produk" width="100">
                        </div>
                        <div class="accordion-desc">
                            <h5>{{ $do->product->nama }}</h5>
                            <h5>{{ $do->harga }}</h5>
                            <h5>Jumlah: {{ $do->jumlah }}</h5>
                            <h5>Total Harga: {{ number_format($do->total_harga) }}</h5>
                        </div>
                    @endforeach
                    <div class="separator"></div>
                    <p>Meja pesanan : </p>
                    @foreach ($reservation->reservationTables as $rt)
                    <div class="product-image">
                        <img src="{{ asset($rt->table->image) }}" alt="Meja" width="100">
                    </div>
                    <div class="accordion-desc">
                        <h5>No Meja : {{ $rt->table->no_meja }}</h5>
                        <h5>Jumlah Kursi : {{ $rt->seats }}</h5>
                    </div>
                    @endforeach

                    <div class="separator"></div>
                    <br>
                    <h4>Total Harga : {{ number_format($order->total_harga) }}</h4>
                    @if($reservation->status == 'menunggu_pembayaran')
                            <div class="badge badge-danger">Menunggu Pembayaran</div>
                        @elseif($order->progress == 'menunggu')
                            <div class="badge badge-warning">Dibooking</div>
                        @elseif($order->progress == 'aktif')
                            <div class="badge badge-info">Sedang Dibooking</div>
                        @elseif($order->progress == 'selesai')
                            <div class="badge badge-success">Selesai</div>
                        @elseif($order->progress == 'dibatalkan')
                            <div class="badge badge-secondary">Dibatalkan</div>
                        @endif
                    <div class="separator"></div>
                    @if ($reservation->status == 'meunggu_pembayaran')
                    <div class="bottom-right">
                        <a href="{{ route('reservation.pay') }}" id="pay-button" class="btn btn-primary">Bayar Reservasi</a>
                    </div>
                    @endif

                </div>
                <div class="card-footer">
                    <div class="bottom-left">
                        <a class="btn btn-secondary" href="{{ route('reservation.index') }}">
                            Kembali
                        </a>
                    </div>
                    @if ($reservation->status != 'dibatalkan')
                    <div class="bottom-right">
                        <a class="btn btn-primary" href="{{ route('reservation.edit', $reservation->id) }}">
                            Edit
                        </a>
                    </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')

@endsection

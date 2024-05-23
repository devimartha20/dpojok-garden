@extends('layouts.main.layout')
@section('title')
Riwayat Reservasi
@endsection
@section('content')
<div class="col-md-12 col-lg-12">
    <div class="card">
        <div class="card-block text-center">
            <i class="fa fa-envelope-open text-c-blue d-block f-40"></i>
            <h4 class="m-t-20"><span class="text-c-blue">0</span> Reservasi hari ini</h4>
            <br>
            <a class="btn btn-primary btn-xl btn-round" href="{{ route('reservation.create') }}">Tambah Reservasi</a>
        </div>
    </div>
</div>
<div class="col-lg-6 col-xl-12">
    <!-- <h6 class="sub-title">Tab With Icon</h6> -->
    <div class="sub-title">Reservasi</div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs md-tabs justify-content-center" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#wp" role="tab" aria-expanded="true">
                <i class="ti-shortcode"></i>
                Menunggu Pembayaran</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#w" role="tab" aria-expanded="false">
                <i class="ti-shortcode"></i>
                Dibooking</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#a" role="tab" aria-expanded="false">
                <i class="ti-timer"></i>
                Sedang Dibooking</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#s" role="tab" aria-expanded="false">
                <i class="ti-close"></i>
                Selesai</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#d" role="tab" aria-expanded="false">
                <i class="ti-check-box"></i>
                Dibatalkan</a>
            <div class="slide"></div>
        </li>
    </ul>
    <div class="tab-content card">
        <div class="tab-pane active" id="wp" role="tabpanel" aria-expanded="true">
            <div class="card-block caption-breadcrumb">
               @forelse ($wp as $r)
               <div class="breadcrumb-header">
                <h6>No Reservasi: {{ $r->no_reservasi }}</h6>
                <p>Tanggal Reservasi: {{ $r->date }}</p>
                <p>Waktu Reservasi: {{ $r->start_time }} - {{ $r->end_time }}</p>
                @foreach ($r->reservationTables as $rt)
                    <div class="product-details">
                        <p>Nomor Meja : {{ $rt->table->no_meja }}</p>
                        <p>Jumlah Kursi : {{ $rt->seats }}</p>
                    </div>
                @endforeach

                <h6>Total Harga: Rp. {{ number_format($r->order->total_harga) }}</h6>
            </div>
            <div class="col float-start text-right">
                <span><a href="{{ route('reservation.show', $reservation->id) }}">Detail Pesanan</a></span>
            </div>
            @empty
            <div class="text-center">
                Tidak Ada Pesanan Menunggu Pembayaran
            </div>
            @endforelse

            </div>
        </div>
        <div class="tab-pane" id="w" role="tabpanel" aria-expanded="false">
            <div class="card-block caption-breadcrumb">
               @forelse ($w as $r)
               <div class="breadcrumb-header">
                <h6>No Reservasi: {{ $r->no_reservasi }}</h6>
                <p>Tanggal Reservasi: {{ $r->date }}</p>
                <p>Waktu Reservasi: {{ $r->start_time }} - {{ $r->end_time }}</p>
                @foreach ($r->reservationTables as $rt)
                    <div class="product-details">
                        <p>Nomor Meja : {{ $rt->table->no_meja }}</p>
                        <p>Jumlah Kursi : {{ $rt->seats }}</p>
                    </div>
                @endforeach

                <h6>Total Harga: Rp. {{ number_format($r->order->total_harga) }}</h6>
            </div>
            <div class="col float-start text-right">
                <span><a href="{{ route('customer.reservation.detail', $r->id) }}">Detail Pesanan</a></span>
            </div>
            @empty
            <div class="text-center">
                Tidak Ada Pesanan Menunggu
            </div>
            @endforelse

            </div>
        </div>
        <div class="tab-pane" id="a" role="tabpanel" aria-expanded="false">
            <div class="card-block caption-breadcrumb">
               @forelse ($a as $r)
               <div class="breadcrumb-header">
                <h6>No Reservasi: {{ $r->no_reservasi }}</h6>
                <p>Tanggal Reservasi: {{ $r->date }}</p>
                <p>Waktu Reservasi: {{ $r->start_time }} - {{ $r->end_time }}</p>
                @foreach ($wp->reservationTables as $rt)
                    <div class="product-details">
                        <p>Nomor Meja : {{ $rt->table->no_meja }}</p>
                        <p>Jumlah Kursi : {{ $rt->seats }}</p>
                    </div>
                @endforeach

                <h6>Total Harga: Rp. {{ number_format($r->order->total_harga) }}</h6>
            </div>
            <div class="col float-start text-right">
                <span><a href="{{ route('customer.reservation.detail', $r->id) }}">Detail Pesanan</a></span>
            </div>
            @empty
            <div class="text-center">
                Tidak Ada Pesanan Sedang Dibooking
            </div>
            @endforelse

            </div>
        </div>
        <div class="tab-pane" id="s" role="tabpanel" aria-expanded="false">
            <div class="card-block caption-breadcrumb">
               @forelse ($s as $r)
               <div class="breadcrumb-header">
                <h6>No Reservasi: {{ $r->no_reservasi }}</h6>
                <p>Tanggal Reservasi: {{ $r->date }}</p>
                <p>Waktu Reservasi: {{ $r->start_time }} - {{ $r->end_time }}</p>
                @foreach ($r->reservationTables as $rt)
                    <div class="product-details">
                        <p>Nomor Meja : {{ $rt->table->no_meja }}</p>
                        <p>Jumlah Kursi : {{ $rt->seats }}</p>
                    </div>
                @endforeach

                <h6>Total Harga: Rp. {{ number_format($r->order->total_harga) }}</h6>
            </div>
            <div class="col float-start text-right">
                <span><a href="{{ route('customer.reservation.detail', $r->id) }}">Detail Pesanan</a></span>
            </div>
            @empty
            <div class="text-center">
                Tidak Ada Pesanan Selesai
            </div>
            @endforelse

            </div>
        </div>
        <div class="tab-pane" id="d" role="tabpanel" aria-expanded="false">
            <div class="card-block caption-breadcrumb">
               @forelse ($d as $r)
               <div class="breadcrumb-header">
                <h6>No Reservasi: {{ $r->no_reservasi }}</h6>
                <p>Tanggal Reservasi: {{ $r->date }}</p>
                <p>Waktu Reservasi: {{ $r->start_time }} - {{ $r->end_time }}</p>
                @foreach ($r->reservationTables as $rt)
                    <div class="product-details">
                        <p>Nomor Meja : {{ $rt->table->no_meja }}</p>
                        <p>Jumlah Kursi : {{ $rt->seats }}</p>
                    </div>
                @endforeach

                <h6>Total Harga: Rp. {{ number_format($r->order->total_harga) }}</h6>
            </div>
            <div class="col float-start text-right">
                <span><a href="{{ route('customer.reservation.detail', $r->id) }}">Detail Pesanan</a></span>
            </div>
            @empty
            <div class="text-center">
                Tidak Ada Pesanan Dibatalkan
            </div>
            @endforelse

            </div>
        </div>
    </div>
    </div>
</div>
@endsection


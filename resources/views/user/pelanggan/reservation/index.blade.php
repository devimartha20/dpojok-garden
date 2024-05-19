@extends('layouts.customer.layout')

@section('title')
    Riwayat Reservasi
@endsection

@section('styles')
    <style>
        .new-reservation-link {
            text-align: right;
            margin-bottom: 20px;
            margin-right: 10px;
        }
    </style>
@endsection

@section('content')
<br>
<div class="new-reservation-link">
    <a href="{{ route('customer.reservation.create') }}" class="btn btn-primary">Buat Reservasi Baru</a>
</div>
<div class="row">
    <div class="col-lg-6 col-xl-12">
        <ul class="nav nav-tabs md-tabs justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#menungguPembayaran" role="tab" aria-expanded="true">
                    <i class="ti-shortcode"></i>
                    Menunggu Pembayaran</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#dibooking" role="tab" aria-expanded="false">
                    <i class="ti-shortcode"></i>
                    Dibooking</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#sedangDibooking" role="tab" aria-expanded="false">
                    <i class="ti-timer"></i>
                    Sedang Dibooking</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#dibatalkan" role="tab" aria-expanded="false">
                    <i class="ti-close"></i>
                    Dibatalkan</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#selesai" role="tab" aria-expanded="false">
                    <i class="ti-check-box"></i>
                    Selesai</a>
                <div class="slide"></div>
            </li>
        </ul>
        <div class="tab-content card">
            <div class="tab-pane active" id="home7" role="tabpanel" aria-expanded="true">
                <div class="card-block caption-breadcrumb">
                    <div class="breadcrumb-header">
                        <h6>No Reservasi: #12345</h6>
                        <p>Tanggal Reservasi: 12 April 2024</p>
                        <p>Waktu Reservasi: 12:12 PM</p>
                        <div class="product-details">
                            <p>Nomor Meja : 18</p>
                            <p>Menu Pesanan : Roti Bakar 1, Mix Platter 1, Ice Cream Cookies 1</p>
                        </div>
                        <h6>Total Harga: Rp. 100.000</h6>
                    </div>
                    <div class="col float-start text-right">
                        <span><a href="{{ route('detail.index') }}">Detail Pesanan</a></span>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="profile7" role="tabpanel" aria-expanded="false">
            </div>
            <div class="tab-pane" id="messages7" role="tabpanel" aria-expanded="false">
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection

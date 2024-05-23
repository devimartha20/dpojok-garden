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
            <a class="btn btn-primary btn-xl btn-round" href="http://127.0.0.1:8000/ordertrans/create/0">Tambah Reservasi</a>
        </div>
    </div>
</div>
<div class="col-lg-6 col-xl-12">
    <!-- <h6 class="sub-title">Tab With Icon</h6> -->
    <div class="sub-title">Reservasi</div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs md-tabs justify-content-center" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#menunggu" role="tab" aria-expanded="true">
                <i class="ti-timer"></i>
                Menunggu Pembayaran</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link " data-toggle="tab" href="#dibooking" role="tab" aria-expanded="false">
                <i class="ti-reload"></i>
                Dibooking</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link " data-toggle="tab" href="#sedangdibooking" role="tab" aria-expanded="false">
                <i class="ti-check-box"></i>
                Sedang Dibooking</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link " data-toggle="tab" href="#dibatalkan" role="tab" aria-expanded="false">
                <i class="ti-check-box"></i>
                Dibatalkan</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link " data-toggle="tab" href="#selesai" role="tab" aria-expanded="false">
                <i class="ti-check-box"></i>
                Selesai</a>
            <div class="slide"></div>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content card-block">
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
        <div class="tab-pane active" id="menunggu" role="tabpanel" aria-expanded="true">
            <hr>
            <!--[if BLOCK]><![endif]-->                <div class="text-center">Tidak Ada Reservasi Menunggu Pembayaran</div>
            <!--[if ENDBLOCK]><![endif]-->
        </div>
        <div class="tab-pane " id="dibooking" role="tabpanel" aria-expanded="false">
            <hr>
            <!--[if BLOCK]><![endif]-->                <div class="text-center">Tidak Ada Reservasi Dibooking</div>
            <!--[if ENDBLOCK]><![endif]-->
        </div>
        <div class="tab-pane " id="sedangdiboking" role="tabpanel" aria-expanded="false">
            <hr>
            <!--[if BLOCK]><![endif]-->                <div class="text-center">Tidak Ada Reservasi yang Sedang Dibooking</div>
            <!--[if ENDBLOCK]><![endif]-->

        </div>
        <div class="tab-pane " id="dibatalkan" role="tabpanel" aria-expanded="false">
            <hr>
            <!--[if BLOCK]><![endif]-->                <div class="text-center">Tidak Ada Reservasi yang Dibatalkan
            <!--[if ENDBLOCK]><![endif]-->

        </div>
        <div class="tab-pane " id="selesai" role="tabpanel" aria-expanded="false">
            <hr>
            <!--[if BLOCK]><![endif]-->                <div class="text-center">Tidak Ada Pesanan yang Selesai
            <!--[if ENDBLOCK]><![endif]-->

        </div>

    </div>
</div>
@endsection


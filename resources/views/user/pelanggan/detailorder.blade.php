@extends('layouts.main.layout')

@section('title')
    Riwayat Pemesanan
@endsection

@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 col-xl-12">
        <div class="sub-title">Riwayat Pemesanan</div>
        <ul class="nav nav-tabs md-tabs justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home7" role="tab" aria-expanded="true">
                    <i class="ti-shortcode"></i>
                    Menunggu Pembayaran</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#home7" role="tab" aria-expanded="false">
                    <i class="ti-timer"></i>
                    DiProses</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#profile7" role="tab" aria-expanded="false">
                    <i class="ti-close"></i>
                    Dibatalkan</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#messages7" role="tab" aria-expanded="false">
                    <i class="ti-check-box"></i>
                    Selesai</a>
                <div class="slide"></div>
            </li>
        </ul>
        <div class="tab-content card">
            <div class="tab-pane active" id="home7" role="tabpanel" aria-expanded="true">
                <div class="card-block caption-breadcrumb">
                    <div class="breadcrumb-header">
                        <h6>No Pesanan: #12345</h6>
                        <p>Tanggal Pesanan: 12 April 2024</p>
                        <div class="product-details">
                            <p>Roti Bakar 1, Mix Platter 1, Ice Cream Cookies 1</p>
                        </div>
                        <h6>Total: Rp. 100.000</h6>
                    </div>
                    <div class="col float-start text-right">
                        <span><i>Detail Pesanan</i></span>
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
@endsection

@section('scripts')

@endsection

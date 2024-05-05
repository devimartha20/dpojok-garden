@extends('layouts.customer.layout')

@section('title')
    Detail Order
@endsection

@section('styles')
    <style>
        /* Tambahkan gaya CSS tambahan di sini jika diperlukan */
        .product-image {
            float: left;
            margin-right: 20px;
        }
        .order-date {
            text-align: right;
            margin-bottom: 20px;
        }
        .action-links {
            text-align: right;
            margin-top: 10px;
        }
        .separator {
            margin-top: 20px;
            border-top: 1px solid #ccc;
        }
        .bottom-right {
            display: flex;
            justify-content: flex-end;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Detail Order</h5>
                </div>
                <div class="card-block accordion-block color-accordion-block">
                    <div class="color-accordion ui-accordion ui-widget ui-helper-reset" id="color-accordion" role="tablist">
                        <div class="card">
                            <div class="card-body">
                                <div class="order-date">
                                    Tanggal Pemesanan : 29 Januari 2024
                                </div>
                                <div class="separator"></div>
                                <div class="accordion-msg b-none ui-accordion-header ui-corner-top ui-state-default ui-accordion-header-active ui-state-active ui-accordion-icons scale_active" role="tab" id="" aria-controls="" aria-selected="true" aria-expanded="true" tabindex="0">
                                    <span class="ui-accordion-header-icon ui-icon zmdi zmdi-chevron-up"></span>No Pesanan : 11234</div>
                                    <div class="separator"></div>
                                <div class="accordion-desc ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content ui-accordion-content-active" style="" id="" aria-labelledby="" role="tabpanel" aria-hidden="false">
                                    <p>
                                        Produk<br>
                                        <div class="product-image">
                                            <img src="{{ asset('images/1711265258.png') }}" alt="Nama Produk" width="200">
                                        </div>
                                        Nasi Goreng<br>
                                        <br>Jumlah : 3<br>
                                        Harga : Rp. 15000<br>
                                        Catatan : Jangan pedas<br>
                                        <div class="separator"></div>
                                        <div class="product-image">
                                            <img src="{{ asset('images/1711265234.png') }}" alt="Nama Produk" width="200">
                                        </div>
                                        Nasi Liwet<br>
                                        <br>Jumlah : 3<br>
                                        Harga : Rp. 15000<br>
                                        Catatan : Jangan pedas<br>
                                        <div class="separator"></div>
                                        Total Harga : Rp. 30.000<br>
                                        <div class="separator"></div>
                                        Tanggal Pembayaran : 29 Januari 2024, 13:31<br>
                                        Metode Pembayaran : BNI<br>
                                        Status Pembayaran : Lunas<br>
                                        <div class="separator"></div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="text-left">Faktur</div>
                                            <div class="text-right"><i>Lihat</i></div>
                                        </div>
                                        <div class="separator"></div>
                                        <div class="bottom-right">
                                            <button onclick="window.history.back()" class="btn btn-primary">Kembali</button>
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.customer.layout')

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
                    <p>Tanggal Sewa : </p>
                    <p>Jam Awal Sewa : </p>
                    <p>Jam Akhir Sewa : </p>
                    <p>Jumlah Tamu : </p>
                    <p>Catatan : </p>
                    <div class="separator"></div>
                    <p>Menu pesanan : </p>
                    <div class="product-image">
                        <img src="{{ asset('images/1711265258.png') }}" alt="Nama Produk" width="100">
                    </div>
                    <div class="accordion-desc">
                        <h5>Nasi Goreng Kecap Manis</h5>
                        <h5>Rp. 45.000</h5>
                        <p>Jumlah: 3</p>
                    </div>
                    <div class="product-image">
                        <img src="{{ asset('images/1711265258.png') }}" alt="Nama Produk" width="100">
                    </div>
                    <div class="accordion-desc">
                        <h5>Nasi Goreng Kecap Manis</h5>
                        <h5>Rp. 45.000</h5>
                        <p>Jumlah: 3</p>
                    </div>
                    <div class="separator"></div>
                    <p>Meja pesanan : </p>
                    <div class="product-image">
                        <img src="{{ asset('images/1711265258.png') }}" alt="Nama Produk" width="100">
                    </div>
                    <div class="accordion-desc">
                        <h5>Meja no 5</h5>
                        <h5>4 kursi</h5>
                    </div>
                    <div class="separator"></div>
                    <br>
                    <p>Total Harga : Rp. 90.000</p>
                    <div class="separator"></div>
                    <div class="bottom-right">
                        <button onclick="" class="btn btn-primary">Bayar Reservasi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.customer.layout')

@section('title')
    Detail Product
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
                    <h5 class="card-header-text">Detail Product</h5>
                </div>
                <div class="card-body">
                    <div class="product-image">
                        <img src="{{ asset('images/1711265258.png') }}" alt="Nama Produk" width="300">
                    </div>
                    <div class="accordion-desc">
                        <h5>Nasi Goreng Kecap Manis</h5>
                        <h5>Rp. 15.000</h5>
                        <p>Stok: 3</p>
                        <p>Kategori: Main Course</p>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="separator"></div>
                    <p>Bagikan:
                        <a><span class=" icon-facebook"></span></a>
                        <a><span class=" icon-whatsapp "></span></a>
                        <a><span class=" icon-instagram"></span></a>
                    </p>
                    <h5>Deskripsi</h5>
                    <p>Nasi Goreng Kecap Manis dapat anda tambahkan toping telur, baso dan mie</p>
                    <div class="bottom-right">
                        <button onclick="window.history.back()" class="btn btn-primary">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

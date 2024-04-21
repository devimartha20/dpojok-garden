@extends('layouts.main.layout')

@section('title')
    Pemesanan
@endsection

@section('styles')
    <style>
        .nav-tabs {
            margin-left: auto; /* Membuat tablist berada di sisi kanan */
            margin-right: 0;
            padding-right: 0;
        }

        .card {
            transition: transform 0.3s ease;
            height: 100%;
            margin-bottom: 20px; /* Menambah jarak antara kartu */
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            height: 200px; /* Tinggi gambar */
            object-fit: cover; /* Penyesuaian gambar agar sesuai */
        }

        .nav-tabs .nav-link {
            padding: 8px 20px; /* Mengatur padding untuk tab */
        }

        .nav-tabs .slide {
            top: 10px; /* Menyesuaikan posisi slide */
        }

        .btn-round {
            width: 100%; /* Tombol menjadi setengah panjang */
            margin-top: 10px; /* Jarak antara tombol */
            position: relative; /* Membuat posisi relatif untuk menempatkan ikon */
        }

        .btn-round i {
            position: absolute; /* Mengatur posisi ikon */
            left: 10px; /* Mengatur jarak ikon dari kiri tombol */
            top: 50%; /* Mengatur posisi vertikal ikon ke tengah */
            transform: translateY(-50%); /* Menggeser ikon ke posisi tengah vertikal */
        }

        .search-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px; /* Menambah jarak antara elemen pencarian dan produk */
        }

        .search-input {
            flex: 1;
            padding: 10px;
            border-radius: 20px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }

        .search-input:focus {
            outline: none;
            border-color: dodgerblue;
        }

        .search-button {
            border-radius: 20px; /* Membuat tombol agak bulat */
            padding: 10px 20px; /* Memberikan ruang di dalam tombol */
            display: flex;
            align-items: center;
        }

        .search-button i {
            margin-right: 5px; /* Menambah jarak antara ikon dan teks */
        }

        /* Menambahkan gaya untuk nama produk, deskripsi, dan harga */
        .product-info {
            width: 100%; /* Menetapkan lebar tetap */
            overflow: hidden; /* Mengatur overflow */
            text-overflow: ellipsis; /* Mengatur teks yang terpotong */
        }

        .product-name {
            font-weight: bold;
            margin-bottom: 2px;
        }

        .product-description {
            margin-bottom: 10px;
        }

        .product-price {
            color: green;
            font-weight: bold;
        }
        .ti-shopping-cart {
            font-size: 24px; /* Atur ukuran ikon */
            margin-left: 500px; /* Atur jarak antara ikon dan tombol pencarian */
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-xl-10">
        <div class="sub-title">Katalog Produk</div>
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="search-container">
                        <input type="text" class="search-input" placeholder="Search by name...">
                        <button class="btn btn-primary search-button"><i class="ti-search"></i> Search</button>
                    </div>
                    <div class="position-relative">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge badge-danger rounded-circle">3</span> <!-- Angka keranjang -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="row">
    <div class="col-lg-12 col-xl-10">
        <div class="d-flex justify-content-center">
            <div class="card">
                <img src="gambar1.jpg" class="card-img-top" alt="Gambar 1">
                <div class="card-body">
                    <div class="product-info">
                        <h5 class="product-name">Roti Bakar</h5>
                        <p class="product-description">Dibuat dari roti segar yang dipanggang hingga renyah di luar namun lembut di dalamnya</p>
                        <p class="product-price">Rp. 10.000</p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success btn-round">Add to Cart</button>
                        <button class="btn btn-warning btn-round">Order Now</button>
                    </div>
                </div>
            </div>
            <!-- Tambahkan margin untuk jarak antara kartu -->
            <div style="margin-bottom: 20px;"></div>
            <div class="card">
                <img src="gambar1.jpg" class="card-img-top" alt="Gambar 1">
                <div class="card-body">
                    <div class="product-info">
                        <h5 class="product-name">Mix Platter</h5>
                        <p class="product-description">Hidangan yang terdiri dari berbagai macam hidangan kecil dalam satu nampan</p>
                        <p class="product-price">Rp. 15.000</p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success btn-round">Add to Cart</button>
                        <button class="btn btn-warning btn-round">Order Now</button>
                    </div>
                </div>
            </div>
            <!-- Tambahkan margin untuk jarak antara kartu -->
            <div style="margin-bottom: 20px;"></div>
            <div class="card">
                <img src="gambar1.jpg" class="card-img-top" alt="Gambar 1">
                <div class="card-body">
                    <div class="product-info">
                        <h5 class="product-name">Ice Cream Cookies</h5>
                        <p class="product-description">Paduan ice cream dengan sepotong kue kering sebagai topping nya dan butiran-butiran oreo diatasnya</p>
                        <p class="product-price">Rp. 13.000</p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success btn-round">Add to Cart</button>
                        <button class="btn btn-warning btn-round">Order Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-xl-2">
        <div class="">
        <div class="d-flex justify-content-center">
            <ul class="nav nav-tabs md-tabs tabs-right b-none" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home6" role="tab">All</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile6" role="tab">Main Course</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#settings6" role="tab">Snack Corner</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#settings6" role="tab">Dessert</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#messages6" role="tab">Coffee</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#settings6" role="tab">Non-Coffee</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#settings6" role="tab">Milk Base</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#settings6" role="tab">Tea</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#settings6" role="tab">Fizzy Float</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#settings6" role="tab">Toppings Bar</a>
                    <div class="slide"></div>
                </li>
            </ul>
        </div>
    </div>
    </div>
</div>

@endsection

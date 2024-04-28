@extends('layouts.customer.layout')

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
<div class="container">
@livewire('search-products')
</div>



@endsection
@section('scripts')
    
@endsection
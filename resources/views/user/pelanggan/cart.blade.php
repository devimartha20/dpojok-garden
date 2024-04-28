@extends('layouts.customer.layout')
@section('title')
    My Shopping Cart
@endsection
@section('styles')
<style>
    .card-header {
        background-color: #ff5722;
        color: white;
    }

    .product-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
    }

    .quantity-input {
        width: 50px;
    }

    .total-price {
        font-weight: bold;
    }

    .action-buttons {
        display: flex;
        justify-content: flex-end; /* Mengatur agar tombol berada di sebelah kanan */
        margin-top: 20px; /* Memberikan jarak dari card produk */
    }

    .action-buttons button {
        width: auto; /* Mengatur lebar sesuai kebutuhan */
        margin-left: 10px; /* Memberikan jarak antar tombol */
        border-radius: 20px; /* Membuat tombol agak bulat */
        padding: 10px 20px; /* Memberikan ruang di dalam tombol */
        background-color: #ff5722; /* Warna latar belakang */
        color: white; /* Warna teks */
        border: none; /* Menghapus border */
    }

    .action-buttons button:hover {
        background-color: #f4511e; /* Warna latar belakang saat dihover */
    }

    .checkout-button {
        width: auto; /* Mengatur lebar sesuai kebutuhan */
    }

    /* Memberikan jarak antar card produk */
    .card {
        margin-bottom: 20px;
    }

    /* Memberikan jarak pada judul "My Shopping Cart" */
    .row-title {
        margin-bottom: 20px;
    }
</style>
@endsection
@section('content')
@livewire('cart')
@endsection

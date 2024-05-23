@extends('layouts.main.layout')

@section('title')
    Detail Product
@endsection

@section('styles')
<style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f4f4f4;
        margin: 0;
    }

    .product-card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 350px;
        margin: 20px;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: auto;
    }

    .product-details {
        padding: 20px;
    }

    .product-name {
        font-size: 24px;
        margin: 0 0 10px;
    }

    .product-price {
        font-size: 20px;
        color: #e67e22;
        margin: 0 0 10px;
    }

    .product-description {
        font-size: 16px;
        color: #555;
    }
</style>
@endsection

@section('content')
<div class="product-card">
    <div class="product-image">
        <img src="https://via.placeholder.com/300" alt="Product Image">
    </div>
    <div class="product-details">
        <h2 class="product-name">Nama Produk</h2>
        <p class="product-price">Rp 150.000</p>
        <p class="product-description">Ini adalah deskripsi singkat tentang produk ini. Produk ini sangat berguna dan berkualitas tinggi.</p>
    </div>
</div>
@endsection

@extends('layouts.main.layout')
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
<div class="row row-title">
    <h5>My Shopping Cart</h5>
</div>

<div class="row align-items-center">
    <div class="col-2 col-lg-auto d-flex justify-content-center mb-2 mb-lg-0">
        <input class="form-check-input m-0" type="checkbox" value="" id="checkbox1" style="transform: scale(1.5);">
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-4">
                        <img src="product_image.jpg" alt="Product Image" class="product-image">
                    </div>
                    <div class="col-md-6 col-8">
                        <h5>Roti Bakar</h5>
                        <p>Rp. 10.000</p>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="input-group mb-3">
                            <input type="number" class="form-control quantity-input" value="1" min="1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">Remove</button>
                            </div>
                        </div>
                        <p class="total-price">Rp. 10.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row align-items-center">
    <div class="col-2 col-lg-auto d-flex justify-content-center mb-2 mb-lg-0">
        <input class="form-check-input m-0" type="checkbox" value="" id="checkbox1" style="transform: scale(1.5);">
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-4">
                        <img src="product_image.jpg" alt="Product Image" class="product-image">
                    </div>
                    <div class="col-md-6 col-8">
                        <h5>Roti Bakar</h5>
                        <p>Rp. 10.000</p>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="input-group mb-3">
                            <input type="number" class="form-control quantity-input" value="1" min="1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">Remove</button>
                            </div>
                        </div>
                        <p class="total-price">Rp. 10.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row align-items-center">
    <div class="col-2 col-lg-auto d-flex justify-content-center mb-2 mb-lg-0">
        <input class="form-check-input m-0" type="checkbox" value="" id="checkbox1" style="transform: scale(1.5);">
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-4">
                        <img src="product_image.jpg" alt="Product Image" class="product-image">
                    </div>
                    <div class="col-md-6 col-8">
                        <h5>Roti Bakar</h5>
                        <p>Rp. 10.000</p>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="input-group mb-3">
                            <input type="number" class="form-control quantity-input" value="1" min="1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">Remove</button>
                            </div>
                        </div>
                        <p class="total-price">Rp. 10.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="action-buttons">
    <button class="checkout-button">Checkout</button>
</div>
@endsection

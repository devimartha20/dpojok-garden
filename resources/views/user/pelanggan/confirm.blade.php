@extends('layouts.customer.layout')

@section('title')
    Konfirmasi Pemesanan
@endsection

@section('styles')
<style>
    .product-details {
        display: flex;
        align-items: center;
    }

    .product-details .quantity {
        margin-right: 10px;
    }

    .product-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
        margin-right: 20px;
    }

    .total-price {
        font-weight: bold;
    }

    .accordion-msg {
        display: flex;
        align-items: center;
    }

    .card-footer {
        padding: 20px;
        background-color: #f7f7f7;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .total-items {
        font-size: 16px;
    }

    .total-amount {
        font-size: 18px;
        font-weight: bold;
        color: green;
    }

    .btn-pay-now {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
</style>
@endsection

@section('content')
<h5>Konfirmasi Pemesanan</h5>
<div class="card">
    <div class="accordion-msg ui-accordion-header ui-corner-top ui-accordion-header-collapsed ui-corner-all ui-state-default ui-accordion-icons scale_active" role="tab" id="ui-id-9" aria-controls="ui-id-10" aria-selected="false" aria-expanded="false" tabindex="-1">
        <div class="quantity">1 x</div>
        <span class="ui-accordion-header-icon ui-icon zmdi zmdi-chevron-down"></span>
    </div>
    <div class="card-block accordion-block">
        <div class="accordion-box ui-accordion ui-widget ui-helper-reset" id="single-open" role="tablist">
            <div class="product-details">
                <div class="col-md-3 col-4">
                    <img src="product_image.jpg" alt="Product Image" class="product-image">
                </div>
                <div class="col-md-6 col-8">
                    <h5>Roti Bakarr</h5>
                </div>
                <p class="total-price">Rp. 10.000</p>
            </div>
        </div>
    </div>
    <div class="accordion-msg ui-accordion-header ui-corner-top ui-accordion-header-collapsed ui-corner-all ui-state-default ui-accordion-icons scale_active" role="tab" id="ui-id-9" aria-controls="ui-id-10" aria-selected="false" aria-expanded="false" tabindex="-1">
        <div class="quantity">2 x</div>
        <span class="ui-accordion-header-icon ui-icon zmdi zmdi-chevron-down"></span>
    </div>
    <div class="card-block accordion-block">
        <div class="accordion-box ui-accordion ui-widget ui-helper-reset" id="single-open" role="tablist">
            <div class="product-details">
                <div class="col-md-3 col-4">
                    <img src="product_image.jpg" alt="Product Image" class="product-image">
                </div>
                <div class="col-md-6 col-8">
                    <h5>Mix Platter</h5>
                </div>
                <p class="total-price">Rp. 10.000</p>
            </div>
        </div>
    </div>
    <div class="accordion-msg ui-accordion-header ui-corner-top ui-accordion-header-collapsed ui-corner-all ui-state-default ui-accordion-icons scale_active" role="tab" id="ui-id-11" aria-controls="ui-id-12" aria-selected="false" aria-expanded="false" tabindex="-1">
        <div class="quantity">2 x</div>
        <span class="ui-accordion-header-icon ui-icon zmdi zmdi-chevron-down"></span>
    </div>
    <div class="card-block accordion-block">
        <div class="accordion-box ui-accordion ui-widget ui-helper-reset" id="single-open" role="tablist">
            <div class="product-details">
                <div class="col-md-3 col-4">
                    <img src="product_image.jpg" alt="Product Image" class="product-image">
                </div>
                <div class="col-md-6 col-8">
                    <h5>Roti Bakarr</h5>
                </div>
                <p class="total-price">Rp. 10.000</p>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="total-items">Total Items: 5</div>
        <div class="total-amount">Total Amount: Rp. 40.000</div>
        <button type="button" class="btn btn-primary btn-pay-now">Konfirmasi Pesanan</button>
    </div>
</div>
@endsection

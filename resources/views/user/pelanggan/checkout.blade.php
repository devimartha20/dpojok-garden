@extends('layouts.main.layout')
@section('title')
    Check-Out
@endsection
@section('styles')
<style>
    .checkout-container {
        padding: 20px;
        background-color: #f7f7f7;
    }

    .checkout-header {
        background-color: #ff5722;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .checkout-step {
        margin-bottom: 20px;
    }

    .step-number {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #ff5722;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-right: 10px;
    }

    .step-title {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .checkout-form {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .btn-checkout {
        background-color: #ff5722;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-checkout:hover {
        background-color: #f4511e;
    }
</style>
@endsection
@section('content')
<div class="checkout-container">
    <div class="checkout-header">Check-Out</div>

    <div class="checkout-step">
        <div class="step-number">1</div>
        <div class="step-title">Shipping Information</div>
        <div class="checkout-form">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" class="form-control" placeholder="Enter your full name">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" class="form-control" placeholder="Enter your address">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" class="form-control" placeholder="Enter your city">
            </div>
            <div class="form-group">
                <label for="postal_code">Postal Code</label>
                <input type="text" id="postal_code" class="form-control" placeholder="Enter your postal code">
            </div>
        </div>
    </div>

    <div class="checkout-step">
        <div class="step-number">2</div>
        <div class="step-title">Payment Information</div>
        <div class="checkout-form">
            <div class="form-group">
                <label for="card_number">Card Number</label>
                <input type="text" id="card_number" class="form-control" placeholder="Enter your card number">
            </div>
            <div class="form-group">
                <label for="expiry_date">Expiry Date</label>
                <input type="text" id="expiry_date" class="form-control" placeholder="Enter expiry date (MM/YY)">
            </div>
            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" class="form-control" placeholder="Enter CVV">
            </div>
        </div>
    </div>

    <div class="checkout-step">
        <div class="step-number">3</div>
        <div class="step-title">Order Summary</div>
        <!-- Tampilkan ringkasan pesanan di sini -->
    </div>

    <button class="btn-checkout">Place Order</button>
</div>
@endsection

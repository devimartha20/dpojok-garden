@extends('layouts.main.layout')

@section('title')
    Check-Out
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
<h5>Check Out</h5>
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
                    <h3>Roti Bakarr</h3>
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
        <button type="button" class="btn btn-info" data-container="body" data-toggle="popover" title="" data-placement="bottom" data-content="<div class='color-code'>
            <div class='row'>
              <div class='col-sm-6 col-xs-12'>
                <span class='block'>Normal</span>
                <span class='block'>
                  <small>#62d1f3</small>
              </span>
          </div>
          <div class='col-sm-6 col-xs-12'>
            <div class='display-color' style='background-color:#62d1f3;'></div>
        </div>
        </div>
        </div>

        <div class='color-code'>
          <div class='row'>
            <div class='col-sm-6 col-xs-12'>
              <span class='block'>Hover</span>
              <span class='block'>
                <small>#91dff7</small>
            </span>
        </div>
        <div class='col-sm-6 col-xs-12'>
          <div class='display-color' style='background-color:#91dff7;'></div>
        </div>
        </div>
        </div>

        <div class='color-code'>
          <div class='row'>
            <div class='col-sm-6 col-xs-12'>
              <span class='block'>Active</span>
              <span class='block'>
                <small>#29c0ef</small>
            </span>
        </div>
        <div class='col-sm-6 col-xs-12'>
          <div class='display-color' style='background-color:#29c0ef;'></div>
        </div>
        </div>
        </div>

        <div class='color-code'>
          <div class='row'>
            <div class='col-sm-6 col-xs-12'>
              <span class='block'>Disabled</span>
              <span class='block'>
                <small>#ccf0fb</small>
            </span>
        </div>
        <div class='col-sm-6 col-xs-12'>
          <div class='display-color' style='background-color:#ccf0fb;'></div>
        </div>
        </div>
        </div>" data-original-title="Info color states" aria-describedby="popover530040">Pay Now</button>
    </div>
</div>
@endsection

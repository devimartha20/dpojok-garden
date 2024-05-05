@extends('layouts.customer.layout')

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
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ config('app.client_key') }}"></script>
@endsection

@section('content')
<div class="container">
    <h5>Check Out</h5>
    <div class="card">
        @foreach ($order->detailOrders as $do)
        <div class="accordion-msg ui-accordion-header ui-corner-top ui-accordion-header-collapsed ui-corner-all ui-state-default ui-accordion-icons scale_active" role="tab" id="ui-id-9" aria-controls="ui-id-10" aria-selected="false" aria-expanded="false" tabindex="-1">
            <div class="quantity">{{ $do->jumlah }} x</div>
            <span class="ui-accordion-header-icon ui-icon zmdi zmdi-chevron-down"></span>
        </div>
        <div class="card-block accordion-block">
            <div class="accordion-box ui-accordion ui-widget ui-helper-reset" id="single-open" role="tablist">
                <div class="product-details row">
                    <div class="col-md-3 col-4">
                        <img src="{{ asset('images/'.$do->product->image) }}" alt="Product Image" class="product-image">
                    </div>
                    <div class="col-md-6 col-8">
                        <h3>{{ $do->product->nama }}</h3>
                        <p class="total-price">Harga Satuan : Rp. {{ number_format($do->harga) }}</p>
                        <p class="total-price">Total : Rp. {{ number_format($do->total_harga) }}</p>
                        <p class="total-price">Catatan : {{ $do->catatan }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="card-footer">
            <p class="total-price">Total Keseluruhan Rp. {{ number_format($order->total_harga)}}</p>
            @if ($order->status == 'belum_lunas')
                <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
            @else
                Payment successful
            @endif
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{$order->snap_token}}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
        //   alert("Pembayaran Berhasil"); console.log(result);
        window.location.href = "{{ route('order-history.show', $order->id) }}";
        },
        onPending: function(result){
          /* You may add your own implementation here */
          alert("Menunggu Pembayaran"); console.log(result);
        },
        onError: function(result){
          /* You may add your own implementation here */
          alert("Pembayaran gagal!"); console.log(result);
        },
        onClose: function(){
          /* You may add your own implementation here */
          alert('Anda menutup pop-up sebelum melakukan pembayaran');
        }
      })
    });
  </script>
@endsection

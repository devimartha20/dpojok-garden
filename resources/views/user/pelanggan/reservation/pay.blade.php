@extends('layouts.customer.layout')

@section('title', 'Pembayaran Reservasi')

@section('styles')
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ config('app.client_key') }}"></script>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Pembayaran Reservasi</h4>
        <hr class="mt-0 mb-3">
    </div>
    <div class="card-body">
        <form action="/pembayaran-reservasi" method="POST">
            @csrf
            <h5>Detail Reservasi</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="reservation_datetime">Waktu Reservasi:</label>
                        <p class="form-control-static">2024-04-20 14:30 PM</p>
                    </div>
                    <div class="form-group">
                        <label for="customer_name">Pemesan:</label>
                        <p class="form-control-static">Diah</p>
                    </div>

                    <div class="form-group">
                        <label for="ordered_menu">Menu yang Dipesan:</label>
                        <p class="form-control-static">Roti Bakar, Nasi Goreng, Es Teh</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="start_date">Tanggal Mulai Sewa:</label>
                        <p class="form-control-static">2024-04-20</p>
                    </div>
                    <div class="form-group">
                        <label for="end_date">Tanggal Akhir Sewa:</label>
                        <p class="form-control-static">2024-04-20</p>
                    </div>
                    <div class="form-group">
                        <label for="start_time">Waktu Mulai Sewa:</label>
                        <p class="form-control-static">17:00 PM</p>
                    </div>
                    <div class="form-group">
                        <label for="end_time">Waktu Akhir Sewa:</label>
                        <p class="form-control-static">20:00 PM</p>
                    </div>
                    <div class="form-group">
                        <label for="total_price">Total Harga:</label>
                        <p class="form-control-static">2024-04-20</p>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-right">Bayar</button>
        </form>
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

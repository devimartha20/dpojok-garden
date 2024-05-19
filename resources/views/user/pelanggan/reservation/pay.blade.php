@extends('layouts.customer.layout')

@section('title')
    Detail Reservasi
@endsection

@section('styles')
    <style>
        /* Additional CSS styles can be added here if needed */
        .product-image {
            float: left;
            margin-right: 100px;
        }
        .bottom-right {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        .separator {
            margin-top: 20px;
            border-top: 1px solid #ccc;
        }
        .icon-link {
            margin-right: 10px;
        }
    </style>
@endsection

@section('styles')
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ config('app.client_key') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Detail Reservasi</h5>
                </div>
                <div class="card-body">
                    <p>Tanggal Sewa : </p>
                    <p>Jam Awal Sewa : </p>
                    <p>Jam Akhir Sewa : </p>
                    <p>Jumlah Tamu : </p>
                    <p>Catatan : </p>
                    <div class="separator"></div>
                    <p>Menu pesanan : </p>
                    <div class="product-image">
                        <img src="{{ asset('images/1711265258.png') }}" alt="Nama Produk" width="100">
                    </div>
                    <div class="accordion-desc">
                        <h5>Nasi Goreng Kecap Manis</h5>
                        <h5>Rp. 45.000</h5>
                        <p>Jumlah: 3</p>
                    </div>

                    <div class="form-group">
                        <label for="ordered_menu">Menu yang Dipesan:</label>
                        <p class="form-control-static">Roti Bakar, Nasi Goreng, Es Teh</p>
                    </div>
                    <div class="accordion-desc">
                        <h5>Nasi Goreng Kecap Manis</h5>
                        <h5>Rp. 45.000</h5>
                        <p>Jumlah: 3</p>
                    </div>
                    <div class="separator"></div>
                    <p>Meja pesanan : </p>
                    <div class="product-image">
                        <img src="{{ asset('images/1711265258.png') }}" alt="Nama Produk" width="100">
                    </div>
                    <div class="accordion-desc">
                        <h5>Meja no 5</h5>
                        <h5>4 kursi</h5>
                    </div>
                    <div class="separator"></div>
                    <br>
                    <p>Total Harga : Rp. 90.000</p>
                    <div class="separator"></div>
                    <div class="bottom-right">
                        <button onclick="" class="btn btn-primary">Bayar Reservasi</button>
                    </div>
                </div>
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

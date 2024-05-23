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
                    <p>Tanggal Sewa : {{ $reservation->date }}</p>
                    <p>Jam Awal Sewa : {{ $reservation->start_time }}</p>
                    <p>Jam Akhir Sewa : {{ $reservation->end_time }}</p>
                    <p>Jumlah Tamu : {{ $reservation->guests }}</p>
                    <p>Catatan : {{ $reservation->note }} </p>
                    <div class="separator"></div>
                    <div class="form-group">
                        <label for="ordered_menu">Menu yang Dipesan:</label>
                        <p class="form-control-static">Roti Bakar, Nasi Goreng, Es Teh</p>
                    </div>
                    @foreach ($order->detailorders as $do)
                        <div class="product-image">
                            <img src="{{ asset('images').'/'.$do->product->image }}" alt="Produk" width="100">
                        </div>
                        <div class="accordion-desc">
                            <h5>{{ $do->product->nama }}</h5>
                            <h5>{{ $do->harga }}</h5>
                            <h5>Jumlah: {{ $do->jumlah }}</h5>
                        </div>
                    @endforeach
                    <div class="separator"></div>
                    <p>Meja pesanan : </p>
                    @foreach ($reservation->reservationTables as $rt)
                    <div class="product-image">
                        <img src="{{ asset($rt->table->image) }}" alt="Meja" width="100">
                    </div>
                    <div class="accordion-desc">
                        <h5>No Meja : {{ $rt->table->no_meja }}</h5>
                        <h5>Jumlah Kursi : {{ $rt->seats }}</h5>
                    </div>
                    @endforeach

                    <div class="separator"></div>
                    <br>
                    <h4>Total Harga : {{ number_format($order->total_harga) }}</h4>
                    <div class="separator"></div>
                    <div class="bottom-right">
                        <button id="pay-button" class="btn btn-primary">Bayar Reservasi</button>
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
        window.location.href = "{{ route('customer.reservation.detail', $reservation->id) }}";
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

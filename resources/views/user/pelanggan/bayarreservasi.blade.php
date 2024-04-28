@extends('layouts.main.layout')

@section('title', 'Pembayaran Reservasi')

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
                        <label for="table_number">Nomor Meja:</label>
                        <p class="form-control-static">4</p>
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

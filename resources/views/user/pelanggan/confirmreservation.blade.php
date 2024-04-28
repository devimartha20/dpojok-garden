@extends('layouts.main.layout')

@section('title')
    Konfirmasi Data Reservasi
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="mb-0">Konfirmasi Data Reservasi</h3>
        <hr class="mt-0 mb-3">
    </div>
    <div class="card-body">
        <h5>Detail Reservasi</h5>
        <hr>
        <div class="form-group">
            <label for="datetime">Waktu Reservasi:</label>
            <p>2024-04-20 14:30</p>
        </div>
        <div class="form-group">
            <label for="jumlah_orang">Jumlah Orang:</label>
            <p>4</p>
        </div>
        <div class="form-group">
            <label for="menu">Menu yang Dipesan:</label>
            <p>Roti Bakar, Nasi Goreng, Es Teh</p>
        </div>
        <form action="/konfirmasi-reservasi" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Konfirmasi Reservasi</button>
        </form>
    </div>
</div>
@endsection

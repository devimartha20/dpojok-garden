@extends('layouts.main.layout')
@section('title')
    Form Reservasi
@endsection
@section('styles')
    @livewireStyles
@endsection
@section('content')
<div class="card-block">
    <h5 class="m-b-10">Input Reservasi</h5>
    <p class="text-muted m-b-10">No Reservasi : <b>ORDER-02024051917282022</b></p>
    <ul class="breadcrumb-title b-t-default p-t-10">
        <li class="breadcrumb-item">
            <a href="http://127.0.0.1:8000/ordertrans"> <i class="fa fa-home"></i> Kembali</a>
        </li>
    </ul>
    <p class="text-muted m-b-10">Nama Pemesan : </p>
    <p class="text-muted m-b-10">Telepon : </p>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Daftar Produk</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" wire:model.live="search" placeholder="Cari Produk">
                </div>
                <div class="row">
                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Rincian Pesanan</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Catatan</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                        <!-- Display total harga keseluruhan -->
                        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 mt-3">
                <div class="form-group">
                    <input type="submit" wire:click="save" value="Buat Reservasi" class="btn btn-primary py-3 px-5 btn-round">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

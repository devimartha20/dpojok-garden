@extends('layouts.main.layout')
@section('title')
    Dashboard
@endsection
@section('styles')
@endsection
@section('content')
<div class="row">
    <!-- order-card start -->
    <div class="col-md-5 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Masuk</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>50</span></h2>
                {{-- <p class="m-b-0">Pesanan Diterima<span class="f-right">351</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-5 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Diproses</h6>
                <h2 class="text-right"><i class="ti-tag f-left"></i><span>11</span></h2>
                {{-- <p class="m-b-0">Bulan Ini<span class="f-right">213</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-5 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Selesai</h6>
                <h2 class="text-right"><i class="ti-tag f-left"></i><span>11</span></h2>
                {{-- <p class="m-b-0">Bulan Ini<span class="f-right">213</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-5 col-xl-3">
        <div class="card bg-c-yellow order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Diterima</h6>
                <h2 class="text-right"><i class="ti-reload f-left"></i><span>20</span></h2>
                {{-- <p class="m-b-0">Bulan Ini<span class="f-right">Rp.1.200.000</span></p> --}}
            </div>
        </div>
    </div>
</div>
    <div class="col-md-6 col-lg-6">
        <div class="card tabs-card">
            <div class="card-block p-0">
                <div class="card-header">
                    <h5>Semua Pesanan</h5>
                </div>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="home3" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Pelanggan</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Jumlah Harga</th>
                                    <th>Status</th>
                                </tr>
                                <tr>
                                    {{-- <td><img src="{{ asset('main/assets/images/product/prod3.jpg') }}" alt="prod img" class="img-fluid"></td> --}}
                                    <td>Spagetti</td>
                                    <td>2</td>
                                    <td>Dodi</td>
                                    <td>06-05-2024</td>
                                    <td>Rp. 30.000</td>
                                    <td><span class="label label-primary">Selesai</span></td>
                                </tr>
                                <tr>
                                    {{-- <td><img src="{{ asset('main/assets/images/product/squash-lemon.jpg') }}" alt="prod img" class="img-fluid"></td> --}}
                                    <td>Cireng</td>
                                    <td>1</td>
                                    <td>Asep</td>
                                    <td>05-05-2024</td>
                                    <td>Rp. 10.000</td>
                                    <td><span class="label label-success">Diterima</span></td>
                                </tr>
                                <tr>
                                    {{-- <td><img src="{{ asset('main/assets/images/product/prod3.jpg') }}" alt="prod img" class="img-fluid"></td> --}}
                                    <td>Spagetti</td>
                                    <td>2</td>
                                    <td>Dodi</td>
                                    <td>06-05-2024</td>
                                    <td>Rp. 30.000</td>
                                    <td><span class="label label-warning">Diproses</span></td>
                                </tr>
                                <tr>
                                    {{-- <td><img src="{{ asset('main/assets/images/product/prod3.jpg') }}" alt="prod img" class="img-fluid"></td> --}}
                                    <td>Spagetti</td>
                                    <td>2</td>
                                    <td>Dodi</td>
                                    <td>06-05-2024</td>
                                    <td>Rp. 30.000</td>
                                    <td><span class="label label-danger">Menunggu</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection

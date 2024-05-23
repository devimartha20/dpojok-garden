@extends('layouts.main.layout')
@section('title')
    Dashboard
@endsection
@section('styles')

@endsection
@section('content')
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Masuk</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>486</span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Selesai</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>486</span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Total Penjualan</h6>
                <h2 class="text-right"><i class="ti-tag f-left"></i><span>1641</span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-yellow order-card">
            <div class="card-block">
                <h6 class="m-b-20">Total Pendapatan</h6>
                <h2 class="text-right"><i class="ti-reload f-left"></i><span>Rp. 12.000.000</span></h2>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Statistik</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-times close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <canvas id="Statistics-chart" height="200"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Grafik Pemesanan</h5>
            </div>
            <div class="card-block">
                <span class="d-block text-c-blue f-24 f-w-600 text-center">365247</span>
                <canvas id="feedback-chart" height="100"></canvas>
                <div class="row justify-content-center m-t-15">
                    <div class="col-auto b-r-default m-t-5 m-b-5">
                        <h4>83%</h4>
                        <p class="text-success m-b-0"><i class="ti-hand-point-up m-r-5"></i>Online</p>
                    </div>
                    <div class="col-auto m-t-5 m-b-5">
                        <h4>17%</h4>
                        <p class="text-danger m-b-0"><i class="ti-hand-point-down m-r-5"></i>Offline</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card tabs-card">
            <div class="card-block p-0">
                <div class="card-header">
                    <h5>Aktivitas Terbaru</h5>
                </div>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="home3" role="tabpanel">

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Pelanggan</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Jumlah Harga</th>
                                </tr>
                                <tr>
                                    <td>Cireng</td>
                                    <td>1</td>
                                    <td><span class="label label-danger">Failed</span></td>
                                    <td>Asep</td>
                                    <td>05-05-2024</td>
                                    <td>Rp. 10.000</td>
                                </tr>
                                <tr>
                                    <td>Spagetti</td>
                                    <td>2</td>
                                    <td><span class="label label-success">Delivered</span></td>
                                    <td>Dodi</td>
                                    <td>06-05-2024</td>
                                    <td>Rp. 30.000</td>
                                </tr>
                                <tr>
                                    <td>Ocean Ice Blue</td>
                                    <td>2</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                    <td>Dedi</td>
                                    <td>07-05-2024</td>
                                    <td>Rp. 36.000</td>
                                </tr>
                            </table>
                        </div>
                        <div class="text-center">
                            <a href: {{ route('riwayatpesan.route') }} class="btn btn-outline-primary btn-round btn-sm">Load More</a>
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

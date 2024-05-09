@extends('layouts.main.layout')
@section('title')
    Pemesanan
@endsection
@section('styles')

@endsection
@section('content')
<div class="col-sm-12">
    <div class="col-sm-12">
        <div class="card tabs-card">
            <div class="card-block p-0">
                <div class="card-header">
                    <h5>Riwayat Pesanan</h5>
                </div>
                <!-- Nav tabs -->
                {{-- <ul class="nav nav-tabs md-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#home3" role="">Recent Activities</a>
                        <div class="slide"></div>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="fa fa-key"></i>Security</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#messages3" role="tab"><i class="fa fa-play-circle"></i>Entertainment</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#settings3" role="tab"><i class="fa fa-database"></i>Big Data</a>
                        <div class="slide"></div>
                    </li> --}}
                {{-- </ul> --}}
                <!-- Tab panes -->
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="home3" role="tabpanel">

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Gambar</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Pelanggan</th>
                                    <th>Tanggan Pemesanan</th>
                                    <th>Jumlah Harga</th>
                                </tr>
                                <tr>
                                    {{-- <td><img src="{{ asset('main/assets/images/product/squash-lemon.jpg') }}" alt="prod img" class="img-fluid"></td> --}}
                                    <td>PNG002344</td>
                                    <td>Cireng</td>
                                    <td>1</td>
                                    <td><span class="label label-danger">Failed</span></td>
                                    <td>Asep</td>
                                    <td>05-05-2024</td>
                                    <td>Rp. 10.000</td>
                                </tr>
                                <tr>
                                    {{-- <td><img src="{{ asset('main/assets/images/product/prod3.jpg') }}" alt="prod img" class="img-fluid"></td> --}}
                                    <td>PNG002653</td>
                                    <td>Spagetti</td>
                                    <td>2</td>
                                    <td><span class="label label-success">Delivered</span></td>
                                    <td>Dodi</td>
                                    <td>06-05-2024</td>
                                    <td>Rp. 30.000</td>
                                </tr>
                                <tr>
                                    {{-- <td><img src="{{ asset('main/assets/images/product/prod4.jpg') }}" alt="prod img" class="img-fluid"></td> --}}
                                    <td>PNG002653</td>
                                    <td>Ocean Ice Blue</td>
                                    <td>2</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                    <td>Dedi</td>
                                    <td>07-05-2024</td>
                                    <td>Rp. 36.000</td>
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

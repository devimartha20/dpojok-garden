@extends('layouts.main.layout')
@section('title')
    Pemesanan
@endsection
@section('styles')

@endsection
@section('content')
<div class="row">

</div>
<div class="card">

</div>
<div class="col-lg-6 col-xl-12">
    <!-- <h6 class="sub-title">Tab With Icon</h6> -->
    <div class="sub-title">Pemesanan</div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs md-tabs justify-content-center" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home7" role="tab" aria-expanded="true">
                <i class="ti-timer"></i>
                Menunggu</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#profile7" role="tab" aria-expanded="false">
                <i class="ti-reload"></i>
                Diproses</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#messages7" role="tab" aria-expanded="false">
                <i class="ti-check-box"></i>
                Selesai</a>
            <div class="slide"></div>
        </li>

    </ul>
    <!-- Tab panes -->
    <div class="tab-content card-block">
        <div class="tab-pane active" id="home7" role="tabpanel" aria-expanded="true">
            <hr>
            <div class="card borderless-card">
                <div class="card-block danger-breadcrumb">
                    <div class="row">
                        <div class="col">
                            <div class="breadcrumb-header">
                                <h5>No Pesanan : 1234567</h5>
                                <span>Jumlah Pesanan : 3</span>
                            </div>
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title m-t-10">
                                    <li class="breadcrumb-item"><a href="#!">28 Maret 2024, 04:05 PM</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col float-end text-right">
                                <span><i>Dipesan sejak 2 menit yang lalu</i></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="tab-pane" id="profile7" role="tabpanel" aria-expanded="false">
           <hr>
           <div class="card borderless-card">
            <div class="card-block warning-breadcrumb">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumb-header">
                            <h5>No Pesanan : 1234567</h5>
                            <span>Jumlah Pesanan : 3</span>
                        </div>
                        <div class="page-header-breadcrumb">
                            <ul class="breadcrumb-title m-t-10">
                                <li class="breadcrumb-item"><a href="#!">28 Maret 2024, 04:05 PM</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col float-end text-right">
                            <span><i>Dipesan sejak 2 menit yang lalu</i></span>

                    </div>
                </div>

            </div>
        </div>



        </div>
        <div class="tab-pane" id="messages7" role="tabpanel" aria-expanded="false">
            <hr>
            <div class="card borderless-card">
                <div class="card-block success-breadcrumb">
                    <div class="row">
                        <div class="col">
                            <div class="breadcrumb-header">
                                <h5>No Pesanan : 1234567</h5>
                                <span>Jumlah Pesanan : 3</span>
                            </div>
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title m-t-10">
                                    <li class="breadcrumb-item"><a href="#!">28 Maret 2024, 04:05 PM</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col float-end text-right">
                                <span><i>Dipesan sejak 2 menit yang lalu</i></span>

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

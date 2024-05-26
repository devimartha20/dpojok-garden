@extends('layouts.main.layout')
@section('content')
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
                <h6 class="m-b-20">Kehadiran</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>486</span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Ketidakhadiran</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>486</span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Cuti Kerja</h6>
                <h2 class="text-right"><i class="ti-tag f-left"></i><span>1641</span></h2>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-6 col-xl-3">
        <div class="card bg-c-yellow order-card">
            <div class="card-block">
                <h6 class="m-b-20">Total Pendapatan</h6>
                <h2 class="text-right"><i class="ti-reload f-left"></i><span>Rp. 12.000.000</span></h2>
            </div>
        </div>
    </div> --}}
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Grafik KInerja Kerja</h5>
                <p></p>
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
                <span></span>
                <div class="row justify-content-center m-t-15">
                    {{-- <div class="col-auto b-r-default m-t-5 m-b-5">
                        <h4>83%</h4>
                        <p class="text-success m-b-0"><i class="ti-hand-point-up m-r-5"></i>Online</p>
                    </div>
                    <div class="col-auto m-t-5 m-b-5">
                        <h4>17%</h4>
                        <p class="text-danger m-b-0"><i class="ti-hand-point-down m-r-5"></i>Offline</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection

@endsection

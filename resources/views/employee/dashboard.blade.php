@extends('layouts.main.layout')
@section('title')
    Dashboard
@endsection
@section('styles')

@endsection
@section('content')
<div class="row">
    <div class="col-md-4 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Hadir</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>486</span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Sakit</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>486</span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Libur</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>486</span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Izin</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>486</span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Cuti Kerja</h6>
                <h2 class="text-right"><i class="ti-tag f-left"></i><span>1641</span></h2>
            </div>
        </div>
    </div>
    {{-- Uncomment and adjust as necessary --}}
    {{-- <div class="col-md-6 col-xl-3">
        <div class="card bg-c-yellow order-card">
            <div class="card-block">
                <h6 class="m-b-20">Total Pendapatan</h6>
                <h2 class="text-right"><i class="ti-reload f-left"></i><span>Rp. 12.000.000</span></h2>
            </div>
        </div>
    </div> --}}
    {{-- <div class="col-lg-8 col-md-12">
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
    </div> --}}
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Jam Kerja Hari Ini</h5>
            </div>
            <div class="card-block">
                <span></span>
                <div class="card borderless-card">
                    <div class="card-block info-breadcrumb">
                        <div class="breadcrumb-header">
                            <h5>Senin, 26 Mei 2024</h5>
                        </div>
                        <div class="page-header-breadcrumb">
                            <ul class="breadcrumb-title m-t-10">
                                <li class="breadcrumb-item"><a href="#!">Masuk - Selesai</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">11:00 - 23:00</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h5>Aktivitas Terbaru</h5>
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
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Metode</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Tipe Absen</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6" class="text-center">No Data</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection

@extends('layouts.main.layout')
@section('content')
<div class="card">
<div class="card-block front-icon-breadcrumb row align-items-end">
    <div class="breadcrumb-header col">
        <div class="big-icon">
            <i class="icofont icofont-user"></i>
        </div>
        <div class="d-inline-block">
            <h5>Sudah absen hari ini?</h5>
            <span>Lakukan absen dengan metode yang telah di sediakan</span>
        </div>
    </div>
    <div class="col">
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title m-t-15">
                <li class="breadcrumb-item"><a href="{{ route('employee.scan') }}">Scan QR</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('formabsen.route') }}">Form Absen</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('formtidakhadir.route') }}">Form Ketidakhadiran</a>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
<div class="card">
    <div class="card-header">
        <h5>Riwayat Absensi</h5>
        {{-- <span>use class <code>table</code> inside table element</span> --}}
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
                        <th>ID Pegawai</th>
                        <th>Metode</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Tipe Absen</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1234</th>
                        <td>QR</td>
                        <td>10-05-2024</td>
                        <td>11:45:32</td>
                        <td>Masuk</td>
                        <td>Confirmed</td>
                    </tr>
                    <tr>
                        <th scope="row">2345</th>
                        <td>Confirmed</td>
                        <td>10-05-2024</td>
                        <td>11:45:32</td>
                        <td>Masuk</td>
                        <td>Pending</td>
                    </tr>
                    <tr>
                        <th scope="row">3321</th>
                        <td>QR</td>
                        <td>10-05-2024</td>
                        <td>11:45:32</td>
                        <td>Keluar</td>
                        <td>Confirmed</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

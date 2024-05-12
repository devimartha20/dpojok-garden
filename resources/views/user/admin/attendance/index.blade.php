@extends('layouts.main.layout')
@section('title')
    Absensi Pegawai
@endsection
@section('styles')
 <!-- Notification.css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/assets/pages/notification/notification.css">
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Absensi Pegawai</h5>
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
                        <th>ID Pegawai</th>
                        <th>Tanggal</th>
                        <th>Kehadiran</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-success">
                        <th scope="row">1</th>
                        <td>3245</td>
                        <td>10-05-2024</td>
                        <td>Masuk</td>
                        <td>Masuk</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>3245</td>
                        <td>10-05-2024</td>
                        <td>Masuk</td>
                        <td>Masuk</td>
                    </tr>
                    <tr class="table-warning">
                        <th scope="row">3</th>
                        <td>3245</td>
                        <td>10-05-2024</td>
                        <td>Sakit</td>
                        <td>Sakit</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>3245</td>
                        <td>10-05-2024</td>
                        <td>Masuk</td>
                        <td>Masuk</td>
                    </tr>
                    <tr class="table-danger">
                        <th scope="row">5</th>
                        <td>3245</td>
                        <td>10-05-2024</td>
                        <td>Tidak Masuk</td>
                        <td>Tanpa Keterangan</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>3245</td>
                        <td>10-05-2024</td>
                        <td>Masuk</td>
                        <td>Masuk</td>
                    </tr>
                    <tr class="table-info">
                        <th scope="row">7</th>
                        <td>3245</td>
                        <td>10-05-2024</td>
                        <td>Izin</td>
                        <td>Izin</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

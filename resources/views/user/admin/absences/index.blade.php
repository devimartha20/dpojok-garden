@extends('layouts.main.layout')
@section('title')
    Daftar Ketidakhadiran Pegawai
@endsection
@section('styles')
 <!-- Notification.css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/assets/pages/notification/notification.css">
@endsection
@section('content')
<div class="row">
    <h5>Daftar Pengajuan Form Absensi</h5>
    <br>
</div>
<div class="page-header card">
    <div class="card-block">
        <h6 class="m-b-10">0021 - Debi</h6><hr>
        <p>Tipe : Absen Masuk</p>
        <p>Catatan : absen masuk pagi ini</p>
        <div class="float-right">
            <select class="form-control" id="statusDebi">
                <option value="approve">Disetujui</option>
                <option value="reject">Ditolak</option>
                <option value="pending">Pending</option>
            </select>
        </div>
    </div>
</div>

<div class="page-header card">
    <div class="card-block">
        <h6 class="m-b-10">0023 - Deni</h6><hr>
        <p>Tipe : Absen Pulang</p>
        <p>Catatan : absen pulang malam ini</p>
        <div class="float-right">
            <select class="form-control" id="statusDeni">
                <option value="approve">Disetujui</option>
                <option value="reject">Ditolak</option>
                <option value="pending">Pending</option>
            </select>
        </div>
    </div>
</div>

@endsection

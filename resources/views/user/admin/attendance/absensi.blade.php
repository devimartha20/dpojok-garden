@extends('layouts.main.layout')
@section('title')
    Absensi Pegawai
@endsection
@section('styles')
 <!-- Notification.css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/assets/pages/notification/notification.css">
@endsection
@section('content')
<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Daftar Pengajuan Absensi Pegawai</h5>
        <p class="text-muted m-b-10">Daftar pengajuan absensi pegawai</p>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="index.html"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Basic Components</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Breadcrumb</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#!">
                    <i class="ti-check"></i>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="#!">
                    <i class="ti-close"></i>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="#!">
                    <i class="ti-save"></i>
                </a>
            </li>
        </ul>
    </div>
</div>

@endsection

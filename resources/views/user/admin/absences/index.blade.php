@extends('layouts.main.layout')
@section('title')
    Daftar Ketidakhadiran Pegawai
@endsection
@section('styles')
 <!-- Notification.css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/assets/pages/notification/notification.css">
@endsection
@section('content')
<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">0021 - Debi</h5>
        <p class="text-muted m-b-10">Tipe : Absen Masuk</p>
        <p class="text-muted m-b-10">Catatan : absen masuk pagi ini</p>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item"><a href="#!">Lihat Detail</a>
            </li>
            <li class="breadcrumb-item float-right">
                <a href="#!">
                    <button class="btn btn-success"><i class="ti-check"></i></button>
                </a>
            </li>
            <li class="breadcrumb-item float-right">
                <a href="#!">
                    <button class="btn btn-danger"><i class="ti-close"></i></button>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="col-lg-12 col-xl-6">
    <div class="sub-title"></div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home5" role="tab">Terbaru</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#profile5" role="tab">Disetujui</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#messages5" role="tab">Ditolak</a>
            <div class="slide"></div>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content tabs-left-content card-block">
        <div class="tab-pane active" id="home5" role="tabpanel">
            <p class="m-0">1. This is Photoshop's version of Lorem IpThis is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mas Cum sociis natoque penatibus et magnis dis.....</p>
        </div>
        <div class="tab-pane" id="profile5" role="tabpanel">
            <p class="m-0">2.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
        </div>
        <div class="tab-pane" id="messages5" role="tabpanel">
            <p class="m-0">3. This is Photoshop's version of Lorem IpThis is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mas Cum sociis natoque penatibus et magnis dis.....</p>
        </div>
        <div class="tab-pane" id="settings5" role="tabpanel">
            <p class="m-0">4.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
        </div>
    </div>
</div>
@endsection

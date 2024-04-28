@extends('layouts.main.layout')

@section('title')
    Cek Ketersediaan Meja
@endsection

@section('style')
<style>
.center-content {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.card {
    max-width: 500px;
    width: 100%;
    margin-bottom: 20px;
}

.success-breadcrumb {
    background-color: #28a745;
    color: #fff;
}

.primary-breadcrumb {
    background-color: #007bff;
    color: #fff;
}
</style>
@endsection

@section('content')
<div class="center-content">
    <div class="card borderless-card success-breadcrumb">
        <div class="card-block">
            <div class="breadcrumb-header">
                <h5>Meja Tersedia</h5>
                <span>Nomor Meja 18</span>
            </div>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title m-t-10">
                    <li class="breadcrumb-item">
                        <a href="#!">
                            <i class="ti-check"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">28 April 2024 11:14 PM</a></li>
                    <li class="breadcrumb-item"><a href="#!">Available</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card borderless-card primary-breadcrumb">
        <div class="card-block">
            <div class="breadcrumb-header">
                <h5>Meja Tidak Tersedia</h5>
                <span>Nomor Meja 18</span>
            </div>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title m-t-10">
                    <li class="breadcrumb-item">
                        <a href="#!">
                            <i class="ti-close"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">28 April 2024 11:14 PM</a></li>
                    <li class="breadcrumb-item"><a href="#!">Booked</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

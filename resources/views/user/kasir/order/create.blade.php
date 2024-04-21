@extends('layouts.main.layout')
@section('title')
    Pemesanan
@endsection
@section('styles')
    @livewireStyles
@endsection
@section('content')
<div class="main-body">
    <div class="page-wrapper">
        <div class="page-header card">
            <div class="card-block">
                <h5 class="m-b-10">Input Pesanan</h5>
                <p class="text-muted m-b-10">No Pesanan : <b>{{ $orderNo }}</b></p>
                <ul class="breadcrumb-title b-t-default p-t-10">
                    <li class="breadcrumb-item">
                        <a href="{{ route('ordertrans.index') }}"> <i class="fa fa-home"></i> Kembali</a>
                    </li>
                </ul>
            </div>
        </div>
        @livewire('add-order', [
        'orderNo' => $orderNo
    ])
    </div>
</div>

@endsection
@section('scripts')

    @livewireScripts

@endsection

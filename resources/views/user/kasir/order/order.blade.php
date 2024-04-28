@extends('layouts.main.layout')
@section('title')
    Pemesanan
@endsection
@section('styles')

@endsection
@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-block text-center">
                <i class="fa fa-envelope-open text-c-blue d-block f-40"></i>
                <h4 class="m-t-20"><span class="text-c-blue">{{ $orders->count() }}</span> Pesanan hari ini</h4>
                {{-- <p class="m-b-20">Your main list is growing</p> --}}
                <a class="btn btn-primary btn-xl btn-round" href="{{ route('ordertrans.create', 0) }}">Tambah Pemesanan</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        @livewire('orders')
    </div>

</div>



@endsection
@section('scripts')

@endsection

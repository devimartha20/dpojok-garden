@extends('layouts.customer.layout')

@section('title')
    Riwayat Pemesanan
@endsection

@section('styles')
@livewireStyles
@endsection

@section('content')
<div class="container">
    @livewire('order-history')
</div>

@endsection

@section('scripts')
@livewireScripts
@endsection

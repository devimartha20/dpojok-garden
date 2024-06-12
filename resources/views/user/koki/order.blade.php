@extends('layouts.main.layout')
@section('title')
    Pemesanan
@endsection
@section('styles')
<style>
    .nav-tabs.horizontal-tabs li {
    display: inline-block;
    margin-right: 10px; /* Adjust spacing between items as needed */
}
</style>

@livewireStyles
@endsection
@section('content')
    @livewire('orders')

   
@endsection
@section('scripts')
@livewireScripts
@endsection

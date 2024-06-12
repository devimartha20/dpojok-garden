@extends('layouts.main.layout')
@section('title')
    Pemesanan
@endsection
@section('styles')
<style>
 .nav-tabs.horizontal-tabs {
    display: flex;
    justify-content: center;
    flex-wrap: nowrap; /* Prevent wrapping of items */
    overflow-x: auto; /* Allow horizontal scrolling if needed */
}

.nav-tabs.horizontal-tabs li {
    flex: 0 0 auto; /* Prevent items from growing or shrinking */
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

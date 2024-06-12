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
/* Hide default scrollbar */
.nav-tabs.horizontal-tabs::-webkit-scrollbar {
    display: none;
}

/* Show custom scrollbar */
.nav-tabs.horizontal-tabs {
    overflow-x: auto;
    scrollbar-width: thin;
    scrollbar-color: #888 #f4f4f4; /* Change scrollbar colors as needed */
}

/* Track */
.nav-tabs.horizontal-tabs::-webkit-scrollbar-track {
    background: #f4f4f4; /* Color of the track */
}

/* Handle */
.nav-tabs.horizontal-tabs::-webkit-scrollbar-thumb {
    background-color: #888; /* Color of the scrollbar handle */
    border-radius: 10px; /* Rounded corners */
}

/* Handle on hover */
.nav-tabs.horizontal-tabs::-webkit-scrollbar-thumb:hover {
    background-color: #555; /* Darker handle color on hover */
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

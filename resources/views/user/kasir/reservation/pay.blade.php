@extends('layouts.main.layout')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    @livewire('reservation-pay', [
        'reservation' => $reservation,
    ])
@endsection
@section('scripts')
    @livewireScripts
@endsection


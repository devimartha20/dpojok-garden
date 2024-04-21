@extends('layouts.main.layout')
@section('title')
    Pembayaran
@endsection
@section('styles')


@endsection
@section('content')
@livewire('pay', ['payment' => $payment])
@endsection
@section('scripts')

@endsection

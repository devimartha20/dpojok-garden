@extends('layouts.main.layout')
@section('title')
    Pembayaran
@endsection
@section('styles')


@endsection
@section('content')
@if (Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif
@livewire('pay', ['payment' => $payment])
@endsection
@section('scripts')

@endsection

@extends('layouts.main.layout')
@section('title')
    Tambah Metode Pembayaran
@endsection
@section('styles')
 <!-- Notification.css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/assets/pages/notification/notification.css">
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Form Tambah Metode Pembayaran</h4>
        {{-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> --}}
        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

            <div class="card-header-right">
                <i class="icofont icofont-spinner-alt-5"></i>
            </div>

        </div>
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="card-block">
            {{-- <h4 class="sub-title">Form Tambah Produk</h4> --}}
            <form action="{{ route('metode.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis Metode Pembayaran</label>
                    <div class="col-sm-10">
                        <select name="jenis" required class="form-control">
                            <option>Pilih Jenis Metode Pembayaran</option>
                            <option value="e-wallet">E-Wallet</option>
                            <option value="transfer_bank">Transfer Bank</option>
                            <option value="cash" selected>Cash</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Metode Pembayaran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Masukkan Nama Metode Pembayaran" required value="{{ old('nama') }}" name="nama">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi Metode Pembayaran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Deskripsi Metode Pembayaran" required name="deskripsi">
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('metode.index') }}" class="btn btn-round btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-round btn-primary">Simpan</button>
            </div>
        </div>

    </form>
@endsection
@section('scripts')
<!-- notification js -->
<script type="text/javascript" src="{{ asset('main/assets/js/bootstrap-growl.min.js') }}"></script>
<script>
    function notify(from, align, icon, type, animIn, animOut, msg, title){
        $.growl({
            icon: icon,
            title: title,
            message: msg,
            url: ''
        },{
            element: 'body',
            type: type,
            allow_dismiss: true,
            placement: {
                from: from,
                align: align
            },
            offset: {
                x: 30,
                y: 30
            },
            spacing: 10,
            z_index: 999999,
            delay: 2500,
            timer: 1000,
            url_target: '_blank',
            mouse_over: false,
            animate: {
                enter: animIn,
                exit: animOut
            },
            icon_type: 'class',
            template: '<div data-growl="container" class="alert" role="alert">' +
            '<button type="button" class="close" data-growl="dismiss">' +
            '<span aria-hidden="true">&times;</span>' +
            '<span class="sr-only">Close</span>' +
            '</button>' +
            '<span data-growl="icon"></span>' +
            '<span data-growl="title"></span>' +
            '<span data-growl="message"></span>' +
            '<a href="#" data-growl="url"></a>' +
            '</div>'
        });
    };

</script>
@if (Session::has('success'))
<script>
var nFrom = 'top';
var nAlign = 'right';
var nIcons = 'fa fa-check';
var nType = 'success';
var nAnimIn = 'animated fadeIn';
var nAnimOut = 'animated fadeInLeft';
var msg = "{{ Session::get('success') }}";
var title = "Sukses! ";

notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, msg, title);
</script>
@endif

@if (Session::has('fail'))
<script>
var nFrom = 'top';
var nAlign = 'right';
var nIcons = 'fa fa-comments';
var nType = 'danger';
var nAnimIn = 'animated fadeIn';
var nAnimOut = 'animated fadeInLeft';
var msg = "{{ Session::get('fail') }}";
var title = "Gagal! ";

notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, msg, title);
</script>
@endif
@endsection

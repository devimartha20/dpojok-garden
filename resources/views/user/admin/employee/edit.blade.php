@extends('layouts.main.layout')
@section('title')
    Edit Data Pegawai
@endsection
@section('styles')
 <!-- Notification.css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/assets/pages/notification/notification.css">
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Form Edit Data Pegawai</h4>
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
            <form action="{{ route('pegawai.update',$pegawai->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <select name="role" required class="form-control">
                                <option>Pilih Role</option>
                                <option value='admin'{{ $pegawai->user->getRoleNames()->first() == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value='kasir' {{ $pegawai->user->getRoleNames()->first() == 'kasir' ? 'selected' : '' }}>Kasir</option>
                                <option value='koki' {{ $pegawai->user->getRoleNames()->first() == 'koki' ? 'selected' : '' }}>Koki</option>
                                <option value='pelayan' {{ $pegawai->user->getRoleNames()->first() == 'pelayan' ? 'selected' : '' }}>Pelayan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">id_pegawai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="ID Pegawai"  value="{{ $pegawai->id_pegawai }}" name="id_pegawai" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Nama"  value="{{ $pegawai->nama }}"name="nama" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" placeholder="Email" required value="{{ $pegawai->user->email }}" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" min=1 class="form-control" placeholder="Alamat" required value="{{ $pegawai->alamat }}" name="alamat">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" min=1 class="form-control" placeholder="Telepon" required value="{{ $pegawai->telepon }}" name="telepon">
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('pegawai.index') }}" class="btn btn-round btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-round btn-primary">Simpan</button>
            </div>
        </div>

    </form>
@endsection
@section('scripts')
<script>
    function previewImage(event) {
         var input = event.target;
         var reader = new FileReader();

         reader.onload = function() {
             var img = document.getElementById('imagePreview');
             img.src = reader.result;
             img.style.display = 'block';
         };

         reader.readAsDataURL(input.files[0]);
     }
 </script>
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

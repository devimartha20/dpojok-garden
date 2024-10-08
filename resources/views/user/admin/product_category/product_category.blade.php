@extends('layouts.main.layout')
@section('title')
    Kelola Kategori Menu
@endsection
@section('styles')
 <!-- Notification.css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/assets/pages/notification/notification.css">
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Daftar Kategori Menu</h5>
        {{-- <span>use class <code>table-hover</code> inside table element</span> --}}
        <div class="card-header-right">
            <ul class="list-unstyled card-option">
                <li><i class="fa fa-chevron-left"></i></li>
                <li><i class="fa fa-window-maximize full-card"></i></li>
                <li><i class="fa fa-minus minimize-card"></i></li>
                <li><i class="fa fa-refresh reload-card"></i></li>
                <li><i class="fa fa-times close-card"></i></li>
            </ul>
        </div>

    </div>
    <div class="card-block table-border-style">
        @if($errors->any())
            {!! implode('', $errors->all('<div style="color: red;">:message</div>')) !!}
        @endif
        <br>
        <button type="button" class="btn btn-sm btn-primary btn-round" data-toggle="modal" data-target="#tambahModal">
            Tambah Kategori Menu
        </button>
        <br>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productCategory as $pc)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pc->nama }}</td>
                            <td>{{ $pc->deskripsi }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-round btn-sm" data-toggle="modal" data-target="#editModal{{ $pc->id }}">
                                    Edit
                                  </button>
                                <button type="button" class="btn btn-danger btn-round btn-sm" data-toggle="modal" data-target="#hapusModal{{ $pc->id }}">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal{{ $pc->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('product-category.update', $pc->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nama Kategori</label>
                                        <input type="text" class="form-control" placeholder="Nama Kategori" name="nama" required value="{{ $pc->nama }}">
                                        </div>
                                        <div class="form-group">
                                        <label for="message-text" class="col-form-label">Deskripsi Singkat</label>
                                        <textarea class="form-control" placeholder="Deskripsi Singkat" name="deskripsi" required>{{ $pc->deskripsi }}</textarea>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- Modal Hapus -->
                        <div class="modal fade" id="hapusModal{{ $pc->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin untuk menghapus kategori {{ $pc->nama }} ?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <form action="{{ route('product-category.destroy', $pc->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Data</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        <!-- Modal Tambah -->
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('product-category.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Nama Kategori</label>
                          <input type="text" class="form-control" placeholder="Nama Kategori" name="nama" required>
                        </div>
                        <div class="form-group">
                          <label for="message-text" class="col-form-label">Deskripsi Singkat</label>
                          <textarea class="form-control" placeholder="Deskripsi Singkat" name="deskripsi" required></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                </div>
            </div>
            </div>
        </div>
            </div>
            <div id="styleSelector">

            </div>
        </div>
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


    // $('#notif').on('click',function(e){
    //     e.preventDefault();
    //     var nFrom = $(this).attr('data-from');
    //     var nAlign = $(this).attr('data-align');
    //     var nIcons = $(this).attr('data-icon');
    //     var nType = $(this).attr('data-type');
    //     var nAnimIn = $(this).attr('data-animation-in');
    //     var nAnimOut = $(this).attr('data-animation-out');

    //     notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut);
    // });
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
var title = "Gagal! ";;

notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, msg, title);
</script>
@endif
@endsection

@extends('layouts.main.layout')
@section('title')
    Daftar Cuti Pegawai
@endsection
@section('styles')
 <!-- Notification.css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/assets/pages/notification/notification.css">
@endsection
@section('content')
<div class="col-lg-12 col-xl-12">
    <div><h6>Daftar Pengajuan Form Cuti</h6></div>
    <ul class="nav nav-tabs md-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#pending" role="tab">Menunggu</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#confirmed" role="tab">Disetujui</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#rejected" role="tab">Ditolak</a>
            <div class="slide"></div>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content card-block">
        <div class="tab-pane active" id="pending" role="tabpanel">
            <div class="page-header card">
                <div class="card-block">
                    <h6 class="m-b-10">0021 - Debi</h6><hr>
                    <p>Tanggal Awal: 09-08-2024</p>
                    <p>Tanggal Akhir : 10-08-2024</p>
                    <p>Keterangan : Cuti Menikah</p>
                    <div class="float-right">
                        <button class="btn btn-primary change-status" data-toggle="modal" data-target="#data1">Ubah Status</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="confirmed" role="tabpanel">
            <div class="page-header card">
                <div class="card-block">
                    <h6 class="m-b-10">0021 - Debi</h6><hr>
                    <p>Tanggal Awal: 09-08-2024</p>
                    <p>Tanggal Akhir : 10-08-2024</p>
                    <p>Keterangan : Cuti Melahirkan</p>
                    <div class="float-right">
                        <button class="btn btn-primary change-status" data-toggle="modal" data-target="#data1">Ubah Status</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="rejected" role="tabpanel">
            <div class="page-header card">
                <div class="card-block">
                    <h6 class="m-b-10">0021 - Debi</h6><hr>
                    <p>Tanggal Awal: 09-08-2024</p>
                    <p>Tanggal Akhir : 10-08-2024</p>
                    <p>Keterangan : Cuti Liburan</p>
                    <div class="float-right">
                        <button class="btn btn-primary change-status" data-toggle="modal" data-target="#data1">Ubah Status</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Modal  --}}
<div class="modal fade" id="data1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Status Pengajuan Cuti</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="mb-3">
                    <label for="kode_pegawai" class="form-label">Kode Pegawai</label>
                    <input type="text" class="form-control" id="kode_pegawai" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                    <input type="text" class="form-control" id="nama_pegawai" readonly>
                </div>
                <div class="mb-3">
                    <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                    <input type="text" class="form-control" id="tanggal_awal" readonly>
                </div>
                <div class="mb-3">
                    <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                    <input type="text" class="form-control" id="tanggal_akhir" readonly>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" readonly>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status">
                        <option value="Diterima">Diterima</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="catatan" class="form-label">Alasan</label>
                    <textarea class="form-control" id="catatan" rows="3"></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
    </div>
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

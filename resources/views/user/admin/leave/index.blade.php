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
            @forelse ($pending_leaves as $pa)
                <div class="page-header card">
                    <div class="card-block">
                        <h6 class="m-b-10">{{ $pa->employee->id_pegawai }} - {{ $pa->employee->nama }}</h6><hr>
                        <p>Tanggal Awal: {{ $pa->start_date }}</p>
                        <p>Tanggal Akhir : {{ $pa->end_date }}</p>
                        <p>Alasan : {{ $pa->reason }}</p>
                        <div class="float-right">
                            <button class="btn btn-primary change-status" data-toggle="modal" data-target="#data{{ $pa->id }}">Ubah Status</button>
                        </div>
                    </div>
                    <div class="modal fade" id="data{{ $pa->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Status Ketidakhadiran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('leave.update.status', $pa->id) }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="status" class="form-label"  >Status</label>
                                        <select class="form-select" id="status" name="status">
                                            <option value="confirmed" {{ $pa->status == 'confirmed' ? 'selected' : '' }}>Diterima</option>
                                            <option value="rejected" {{ $pa->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                                            <option value="pending" {{ $pa->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="catatan" class="form-label">Catatan</label>
                                        <textarea  name="catatan" class="form-control" id="catatan" rows="3">{{ $pa->catatan }}</textarea>
                                    </div>

                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                        </div>
                        </div>
                    </div>
                 </div>
                @empty

                @endforelse
        </div>
        <div class="tab-pane" id="confirmed" role="tabpanel">
            @forelse ($confirmed_leaves as $ca)
                <div class="page-header card">
                    <div class="card-block">
                        <h6 class="m-b-10">{{ $ca->employee->id_pegawai }} - {{ $ca->employee->nama }}</h6><hr>
                        <p>Tanggal Awal: {{ $ca->start_date }}</p>
                        <p>Tanggal Akhir : {{ $ca->end_date }}</p>
                        <p>Alasan : {{ $ca->reason }}</p>
                        <div class="float-right">
                            <button class="btn btn-primary change-status" data-toggle="modal" data-target="#data{{ $ca->id }}">Ubah Status</button>
                        </div>
                    </div>
                    <div class="modal fade" id="data{{ $ca->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Satatus Ketidakhadiran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('leave.update.status', $ca->id) }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="status" class="form-label"  >Status</label>
                                        <select class="form-select" id="status" name="status">
                                            <select class="form-select" id="status" name="status">
                                                <option value="confirmed" {{ $ca->status == 'confirmed' ? 'selected' : '' }}>Diterima</option>
                                                <option value="rejected" {{ $ca->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                                                <option value="pending" {{ $ca->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                                            </select>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="catatan" class="form-label">Catatan</label>
                                        <textarea class="form-control" id="catatan" name="catatan" rows="3">{{ $ca->catatan }}</textarea>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                        </div>
                        </div>
                    </div>
                 </div>
                @empty

                @endforelse
        </div>
        <div class="tab-pane" id="rejected" role="tabpanel">
            @forelse ($rejeted_leaves as $ra)
            <div class="page-header card">
                <div class="card-block">
                    <h6 class="m-b-10">{{ $ra->employee->id_pegawai }} - {{ $ra->employee->nama }}</h6><hr>
                    <p>Tanggal Awal: {{ $ra->start_date }}</p>
                    <p>Tanggal Akhir : {{ $ra->end_date }}</p>
                    <p>Alasan : {{ $ra->reason }}</p>
                
                    <div class="float-right">
                        <button class="btn btn-primary change-status" data-toggle="modal" data-target="#data{{ $ca->id }}">Ubah Status</button>
                    </div>
                </div>
                <div class="modal fade" id="data{{ $ra->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Satatus Ketidakhadiran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('leave.update.status', $ra->id) }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="confirmed" {{ $ra->status == 'confirmed' ? 'selected' : '' }}>Diterima</option>
                                        <option value="rejected" {{ $ra->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                                        <option value="pending" {{ $ra->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="catatan" class="form-label">Catatan</label>
                                    <textarea class="form-control" id="catatan" name="catatan" rows="3">{{ $ra->catatan }}</textarea>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
             </div>
            @empty

            @endforelse
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

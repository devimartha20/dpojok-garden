@extends('layouts.main.layout')
@section('title')
    Jadwal Kerja
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/assets/pages/notification/notification.css">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.13/index.global.min.js'></script>
    <script>
        // Convert PHP array to JSON
        var events = @json($events);

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            slotMinTime: '06:00:00',
            firstDay: 1,
            events: events
            });
            calendar.render();
      });
    </script>
@endsection
@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if($errors->any())
                            {!! implode('', $errors->all('<div style="color: red;">:message</div>')) !!}
                        @endif
                        <a href="{{ route('worktime.edit') }}" class="btn btn-primary btn-round btn-sm">Edit Jadwal Kerja</a>
                    </div>
                    <div class="card-body">
                        {{-- CALENDAR --}}
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Daftar Hari Libur
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-round btn-sm" data-toggle="modal" data-target="#addModal">
                            Tambah Hari Libur
                        </button>
                        {{-- MODAL ADD --}}
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Hari Libur</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formAdd" action="{{ route('holiday.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="start_date" class="col-form-label">Tanggal & Waktu Awal</label>
                                            <input type="datetime-local" class="form-control" name="start_date" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date" class="col-form-label">Tanggal & Waktu Akhir</label>
                                            <input type="datetime-local" class="form-control" name="end_date" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">Nama Hari Libur</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="desc" class="col-form-label">Deskripsi <small>(Optional)</small></label>
                                            <input type="text" class="form-control" name="desc">
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
                        <ul>
                            @foreach($holidays as $holiday)
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $holiday->name }}</strong><br>
                                        <small class="text-muted">{{ $holiday->start_date->format('F j, Y, g:i a') }} - {{ $holiday->end_date->format('F j, Y, g:i a') }}</small>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-warning btn-round btn-sm" data-toggle="modal" data-target="#editModal{{ $holiday->id }}">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger btn-round btn-sm" data-toggle="modal" data-target="#deleteModal{{ $holiday->id }}">
                                            Hapus
                                        </button>
                                    </div>
                                </li>
                                <!-- Repeat for other holidays -->
                            </ul>
                                {{-- EDIT MODAL --}}
                                <div class="modal fade" id="editModal{{ $holiday->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Hari Libur</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formEdit{{ $holiday->id }}" action="{{ route('holiday.update', $holiday->id) }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="start_date" class="col-form-label">Tanggal & Waktu Awal</label>
                                                    <input type="datetime-local" class="form-control" name="start_date" required value="{{ $holiday->start_date->format('Y-m-d\TH:i') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="end_date" class="col-form-label">Tanggal & Waktu Akhir</label>
                                                    <input type="datetime-local" class="form-control" name="end_date" required value="{{ $holiday->end_date->format('Y-m-d\TH:i') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-form-label">Nama Hari Libur</label>
                                                    <input type="text" class="form-control" name="name" required value="{{ $holiday->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="desc" class="col-form-label">Deskripsi <small>(Optional)</small></label>
                                                    <input type="text" class="form-control" name="desc" value="{{ $holiday->desc }}">
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
                                {{-- DELETE MODAL --}}
                                <div class="modal fade" id="deleteModal{{ $holiday->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin untuk menghapus hari libur
                                            {{ $holiday->name }} : {{ $holiday->start_date->format('F j, Y, g:i a') }} - {{ $holiday->end_date->format('F j, Y, g:i a') }} ?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <a href="{{ route('holiday.destroy', $holiday->id) }}" class="btn btn-danger">Hapus</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                    </div>
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

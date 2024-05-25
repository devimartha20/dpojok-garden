@extends('layouts.main.layout')
@section('title')
    Edit Jadwal Kerja
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/assets/pages/notification/notification.css">

@endsection
@section('content')
<div class="">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Edit Jadwal Kerja per Minggu

                    @if($errors->any())
                        {!! implode('', $errors->all('<div style="color: red;">:message</div>')) !!}
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Hari</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Pulang</th>
                                        <th>Jam Mulai Istirahat <small>(Optional)</small></th>
                                        <th>Jam Selesai Istirahat <small>(Optional)</small></th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($worktimes as $w)
                                        <tr>
                                            <form id="update{{ $w->id }}" action="{{ route('worktime.update', $w->id) }}" method="POST">
                                                @csrf
                                                <td>
                                                    <select name="day" class="form-control" disabled readonly>
                                                        @foreach($days as $idx => $day)
                                                        <option value="{{ $idx }}" {{ $idx == $w->day ? 'selected' : '' }}>{{ $day }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="time" name="start_time" class="form-control" required value="{{ $w->start_time }}">
                                                </td>
                                                <td>
                                                    <input type="time" name="end_time" class="form-control" required value="{{ $w->end_time }}">
                                                </td>
                                                <td>
                                                    <input type="time" name="rest_start_time" class="form-control" value="{{ $w->rest_start_time }}">
                                                </td>
                                                <td>
                                                    <input type="time" name="rest_end_time" class="form-control" value="{{ $w->rest_end_time }}">
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('schedule.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
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

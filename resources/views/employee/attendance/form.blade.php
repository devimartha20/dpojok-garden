@extends('layouts.main.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Form Absen</h4>
        <span>Senin, 24 Desember 2024</span>
        <div class="card-header-right">
            <i class="icofont icofont-spinner-alt-5"></i>
        </div>
    </div>
    <div class="card-block tooltip-icon button-list">
        <form method="POST" action="{{ route('employee.attendance.submit.store') }}" >
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="email"><i class="icofont icofont-check-alt"></i></span>
                    <select class="form-control" id="tipe_absen" name="type" required>
                        <option value="in">Masuk</option>
                        <option value="out">Keluar</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="email"><i class="icofont icofont-ui-note"></i></span>
                    <input type="datetime-local" readonly class="form-control" value="{{ now()->format('Y-m-d\TH:i') }}">
                </div>
            </div>


            <br>
            <br>
            <button type="submit" class="btn btn-primary waves-effect waves-light m-r-20 float-right" value="submit">Kirim
            </button>
            <a href="{{ route('employee.attendance') }}" class="btn btn-secondary waves-effect waves-light m-r-20 float-left" >Kembali
            </a>
        </form>
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

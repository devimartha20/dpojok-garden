@extends('layouts.main.layout')

@section('styles')

@endsection

@section('content')
<div class="container mt-4 mb-4">
    <div class="card p-4 text-center">
        <div class="image mb-3">
            <button class="btn btn-secondary">
                <img src="{{ asset('/main/assets/images/avatar-4.jpg') }}" height="100" width="100" />
            </button>
        </div>
        <h2 class="name">{{ Auth::user()->name ?? '-' }}</h2>
        <p class="idd">{{ Auth::user()->email }}</p>
        <div class="d-flex justify-content-center align-items-center gap-2 mt-3">
            <span class="idd1">
            @foreach(Auth::user()->roles as $role)
               {{ $role->name }}
            @endforeach</span>
            {{-- <button class="btn btn-dark"><i class="fa fa-copy"></i> Copy ID</button> --}}
        </div>
        {{-- <div class="number mt-3">
            <span class="fw-bold">1069</span> <span class="follow">Followers</span>
        </div> --}}
        {{-- <div class="text mt-3">
            <p>
                Eleanor Pena is a creator of minimalistic x bold graphics and digital artwork.<br><br>
                Artist/ Creative Director by Day #NFT minting@ with FND night.
            </p>
        </div> --}}
        <div class="date mt-4">
            <span class="join">Joined {{ Auth::user()->created_at }}</span>
        </div>
    </div>
</div>

<div class="container mb-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-4">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>
        {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-4">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div> --}}
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
@if (Session::has('status'))
<script>
var nFrom = 'top';
var nAlign = 'right';
var nIcons = 'fa fa-check';
var nType = 'status';
var nAnimIn = 'animated fadeIn';
var nAnimOut = 'animated fadeInLeft';
var msg = "{{ Session::get('status') }}";
var title = "Sukses! ";

notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, msg, title);
</script>
@endif
@endsection
@extends('layouts.main.layout')

@section('styles')
    <style>
        /* Masukkan CSS di sini */
    </style>
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
        <p class="idd">@eleanorpena</p>
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
        <div class="icons mt-3">
            <span><i class="fa fa-twitter"></i></span>
            <span><i class="fa fa-facebook-f"></i></span>
            <span><i class="fa fa-instagram"></i></span>
            <span><i class="fa fa-linkedin"></i></span>
        </div>
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
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-4">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
@endsection

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
        <h2 class="name">{{ $user->nama ?? '-' }}</h2>
        <p class="idd">{{ $user->email }}</p>
        <div class="d-flex justify-content-center align-items-center gap-2 mt-3">
            <span class="idd1">
            @foreach($user->roles as $role)
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
            <span class="join">Joined {{ $user->created_at }}</span>
        </div>
    </div>
</div>

<div class="container mb-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Profile Information') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('employee.profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="form-group">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="form-control" :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error class="alert alert-danger" :messages="$errors->get('email')" />

                        </div>

                        <div class="flex items-center gap-4">
                            <button class="btn btn-sm btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-4">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Update Password') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Ensure your account is using a long, random password to stay secure.') }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('employee.password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                            <x-text-input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="alert alert-danger" />
                        </div>

                        <div class="form-group">
                            <x-input-label for="update_password_password" :value="__('New Password')" />
                            <x-text-input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="alert alert-danger" />
                        </div>

                        <div class="form-group">
                            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="alert alert-danger" />
                        </div>

                        <div class="flex items-center gap-4">
                            <button class="btn btn-sm btn-primary">{{ __('Save') }}</button>

                            @if (session('status') === 'password-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </section>

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

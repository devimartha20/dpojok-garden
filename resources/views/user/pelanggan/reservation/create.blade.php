@extends('layouts.customer.layout')

@section('title')
    Form Reservasi
@endsection
@section('styles')
    <style>
        .btn-round {
            border-radius: 50px; /* Adjust the value as needed */
            padding: 10px 20px;  /* Adjust the padding as needed */
        }
        .reservation-container {
            display: flex;
            flex-wrap: wrap;
        }
        .reservation-form, .table-selection {
            flex: 1;
            padding: 15px;
        }
        @media (max-width: 768px) {
            .reservation-form, .table-selection {
                flex-basis: 100%;
            }
        }
    </style>

    @livewireStyles
@endsection
@section('content')

{{-- @livewire('create-reservation') --}}

<div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate text-center mb-4">
            {{-- <h1 class="mb-2 bread">Reservasi</h1> --}}
            <p class="breadcrumbs">
                {{-- <span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> --}}
                {{-- <span>Reservation</span> --}}
            </p>
        </div>
    </div>
    @livewire('create-reservation')
</div>


    <!-- Include your scripts here -->
    {{-- <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('js/google-map.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script> --}}
@endsection
@section('scripts')
@livewireScripts
@endsection

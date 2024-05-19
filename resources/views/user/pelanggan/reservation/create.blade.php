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
    </style>
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
</div>
<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container-fluid px-0">
        <div class="row d-flex no-gutters">
            <div class="col-md-6 order-md-last ftco-animate makereservation p-4 p-md-5 pt-5">
                <div class="py-md-5">
                    <div class="heading-section ftco-animate mb-5">
                        <span class="subheading">Book a table</span>
                        <h2 class="mb-4">Make Reservation</h2>
                    </div>
                    <form action="#">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_pemesan">Nama Pemesan</label>
                                    <input type="text" class="form-control" id="nama_pemesan" placeholder="Nama Pemesan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_pemesan">Telepon</label>
                                    <input type="text" class="form-control" id="nama_pemesan" placeholder="Telepon">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nomor_meja">Pilih Meja</label>
                                    <select name="product_category_id" required class="form-control">
                                        <option>Pilih Meja</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="menu">Pilih Menu</label>
                                    <select name="product_category_id" required class="form-control">
                                        <option>Pilih Menu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_mulai">Tanggal Mulai Sewa</label>
                                    <input type="datetime-local" class="form-control" name="start_date" id="start_date" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_akhir">Tanggal Akhir Sewa</label>
                                    <input type="datetime-local" class="form-control" name="end_date" id="end_date" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="orang">Berapa Orang</label>
                                    <div class="select-wrap one-third">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="orang" id="orang" class="form-control">
                                            <option value="">Banyaknya Orang</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_akhir">Catatan</label>
                                    <input type="text" class="form-control" id="" placeholder="Tambahkan Catatan">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <input type="submit" value="Make a Reservation" class="btn btn-primary py-3 px-5 btn-round">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-stretch pb-5 pb-md-0">
                <div id="map"></div>
            </div>
        </div>
    </div>
</section>

    <!-- Include your scripts here -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
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
    <script src="{{ asset('js/main.js') }}"></script>
@endsection

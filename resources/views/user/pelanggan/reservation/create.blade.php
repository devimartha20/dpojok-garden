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
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container-fluid px-0">
            <div class="row d-flex no-gutters">
                <div class="col-md-12 ftco-animate makereservation p-4 p-md-5 pt-5">
                    <div class="py-md-5">
                        <div class="heading-section ftco-animate mb-5">
                            <span class="subheading">Book a table</span>
                            <h2 class="mb-4">Make Reservation</h2>
                        </div>
                        <div class="reservation-container">
                            <div class="reservation-form">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tanggal_mulai">Tanggal Sewa</label>
                                                <input type="datetime-local" class="form-control" name="start_date" id="start_date" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jam">Jam Mulai</label>
                                                <input type="time" class="form-control" name="jam_mulai" id="jam_mulai" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jam">Jam Akhir</label>
                                                <input type="time" class="form-control" name="jam_akhir" id="jam_akhir" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="orang">Jumlah Tamu</label>
                                                <div class="select-wrap one-third">
                                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                    <input type="number" class="form-control" id="jumlah_tamu" placeholder="Jumlah Tamu">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tanggal_akhir">Catatan</label>
                                                <input type="text" class="form-control" id="catatan" placeholder="Tambahkan Catatan">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <input type="submit" value="Cek Ketersediaan" class="btn btn-primary py-3 px-5 btn-round">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="table-selection">
                                <div class="form-group">
                                    <label for="nomor_meja">Pilih Meja</label>
                                    <p>Rekomendasi Terbaik</p>
                                        <div class="form-group">
                                            <input type="radio" id="bahan1" name="bahan_baku" value="Bahan Baku 1">
                                            <img src="" alt="Product Image" class="product-image">
                                            <p>Jumlah Kursi : 4</p>
                                            <div class="form-group">
                                            <img src="" alt="Product Image" class="product-image">
                                            <p>Jumlah Kursi : 4</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="radio" id="bahan2" name="bahan_baku" value="Bahan Baku 2">
                                            <img src="" alt="Product Image" class="product-image">
                                            <p>Jumlah Kursi : 4</p>
                                            <img src="" alt="Product Image" class="product-image">
                                            <p>Jumlah Kursi : 4</p>
                                        </div>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Produk</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" wire:model.live="search" placeholder="Cari Produk">
                        </div>
                        <div class="row">
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Rincian Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Catatan</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                <!-- Display total harga keseluruhan -->
                                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <input type="submit" wire:click="save" value="Buat Reservasi" class="btn btn-primary py-3 px-5 btn-round">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


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

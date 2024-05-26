@extends('layouts.customer.layout')

@section('title')
    Dashboard
@endsection

@section('styles')
    {{-- Add your styles here if needed --}}
@endsection

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row no-gutters justify-content-center mb-5 pb-2">
                <div class="col-md-12 text-center heading-section ftco-animate fadeInUp ftco-animated">
                    <span class="subheading">Specialties</span>
                    <h2 class="mb-4">Our Menu</h2>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    @forelse ($products as $product)
                        <div class="col-md-3">
                            <div class="featured-menus ftco-animate">
                                <div class="menu-img img" style="background-image: url({{ asset('customer-template')}}/images/{{$product->image}});"></div>
                                <div class="text text-center">
                                    <h3>{{ $product->nama }}</h3>
                                    <p>
                                        @foreach ($product->categories as $category)
                                            <span>{{ $category->nama }}</span>
                                        @endforeach
                                    </p>
                                    <p><span>{{ $product->harga_jual }}</span></p>
                                    {{-- Additional information or buttons --}}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <p>No products available</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-12 text-center heading-section ftco-animate fadeInUp ftco-animated">
                    <span class="subheading">Services</span>
                    <h2 class="mb-4">Catering Services</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center fadeInUp ftco-animated">
                    <!-- Service content here -->
                </div>
                <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center fadeInUp ftco-animated">
                    <!-- Service content here -->
                </div>
                <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
                    <!-- Service content here -->
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-12 text-center heading-section ftco-animate fadeInUp ftco-animated">
                    <span class="subheading">Facilities</span>
                    <h2 class="mb-4">D'Podjok Garden</h2>
                </div>
            </div>
            <div class="row">
                <!-- Facilities content here -->
            </div>
        </div>
    </section>
@endsection

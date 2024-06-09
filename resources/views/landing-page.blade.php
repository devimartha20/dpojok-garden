@extends('layouts.customer.layout')
@section('content')
<section class="home-slider owl-carousel js-fullheight">
    <div class="slider-item js-fullheight" style="background-image: url({{asset('customer-template')}}/images/bg_1.jpg);">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-12 col-sm-12 text-center ftco-animate">
              <span class="subheading">D'Podjok Garden</span>
            <h1 class="mb-4">Selamat Datang</h1>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item js-fullheight" style="background-image: url({{asset('customer-template')}}/images/bg_2.jpg);">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-12 col-sm-12 text-center ftco-animate">
              <span class="subheading">D'Podjok Garden</span>
            <h1 class="mb-4">Nutritious &amp; Tasty</h1>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item js-fullheight" style="background-image: url({{asset('customer-template')}}/images/bg_3.jpg);">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-12 col-sm-12 text-center ftco-animate">
              <span class="subheading">D'Podjok Garden</span>
            <h1 class="mb-4">Delicious Specialties</h1>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-no-pt ftco-no-pb">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="featured">
                      <div class="row">
                        @foreach ($products->take(4) as $product)
                        <div class="col-md-3">
                            <div class="featured-menus ftco-animate">
                                  <div class="menu-img img" style="background-image: url({{asset('images/'.$product->image)}});"></div>
                                  <div class="text text-center">
                                      <h3>{{ $product->nama }}</h3>
                                      <p>{{ $product->productCategory->nama ?? '-' }}</p>
                                  </div>
                            </div>
                        </div>
                        @endforeach

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>


      <section id="about" class="ftco-section ftco-wrap-about">
          <div class="container">
              <div class="row">
                  <div class="col-md-7 d-flex">
                      <div class="img img-1 mr-md-2" style="background-image: url({{asset('landing-page-template')}}/images/halaman.jpg);"></div>
                      <div class="img img-2 ml-md-2" style="background-image: url({{asset('landing-page-template')}}/images/biliard.jpg);"></div>
                  </div>
                  <div class="col-md-5 wrap-about pt-5 pt-md-5 pb-md-3 ftco-animate">
            <div class="heading-section mb-4 my-5 my-md-0">
                <span class="subheading">About</span>
              <h2 class="mb-4">D'Podjok Garden Coffee Shop</h2>
            </div>
            <p>Selamat datang di D'Podjok Garden - tempat terbaik untuk remaja yang mencari suasana hangat dan harga ramah di kantong. Nikmati waktu santai bersama teman-teman dalam suasana yang cozy dan nyaman, sambil menikmati berbagai hidangan lezat dan minuman segar.</p>
                      <pc class="time">
                          <span>Mon - Fri <strong>11:00 AM - 11:00 PM</strong></span>
                          <span><a href="#">+ 1-978-123-4567</a></span>
                      </p>
                  </div>
              </div>
          </div>
      </section>


      {{-- <section class="ftco-section ftco-counter img ftco-no-pt" id="section-counter">
      <div class="container">
          <div class="row d-md-flex">
              <div class="col-md-9">
                  <div class="row d-md-flex align-items-center">
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18">
                    <div class="text">
                      <strong class="number" data-number="18">0</strong>
                      <span>Years of Experienced</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18">
                    <div class="text">
                      <strong class="number" data-number="100">0</strong>
                      <span>Menus/Dish</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18">
                    <div class="text">
                      <strong class="number" data-number="50">0</strong>
                      <span>Staffs</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18">
                    <div class="text">
                      <strong class="number" data-number="15000">0</strong>
                      <span>Happy Customers</span>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center text-md-left">
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
        </div>
      </div>
      </div>
  </section> --}}
{{--
      <section class="ftco-section bg-light">
          <div class="container">
              <div class="row justify-content-center mb-5 pb-2">
        <div class="col-md-12 text-center heading-section ftco-animate">
            <span class="subheading">Services</span>
          <h2 class="mb-4">Catering Services</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
          <div class="media block-6 services d-block">
            <div class="icon d-flex justify-content-center align-items-center">
                  <span class="flaticon-cake"></span>
            </div>
            <div class="media-body p-2 mt-3">
              <h3 class="heading">Birthday Party</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
          <div class="media block-6 services d-block">
            <div class="icon d-flex justify-content-center align-items-center">
                  <span class="flaticon-meeting"></span>
            </div>
            <div class="media-body p-2 mt-3">
              <h3 class="heading">Business Meetings</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
          <div class="media block-6 services d-block">
            <div class="icon d-flex justify-content-center align-items-center">
                  <span class="flaticon-tray"></span>
            </div>
            <div class="media-body p-2 mt-3">
              <h3 class="heading">Wedding Party</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>
        </div>
      </div>
          </div>
      </section> --}}

    <section id="menu" class="ftco-section">
        <div class="container">
            <div class="row no-gutters justify-content-center mb-5 pb-2">
                <div class="col-md-12 text-center heading-section ftco-animate">
                    <span class="subheading">Specialties</span>
                    <h2 class="mb-4">Our Menu</h2>
                </div>
            </div>
            <div class="row no-gutters d-flex align-items-stretch">
                @foreach ($products->take(10) as $product)
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch">

                            @if($loop->iteration % 2 != 0)
                            <div class="menus d-sm-flex ftco-animate align-items-stretch">
                                <div class="text d-flex align-items-center">
                                    <div>
                                        <div class="d-flex">
                                            <div class="one-half">
                                                <h3>{{ $product->nama }}</h3>
                                            </div>
                                        </div>
                                        <div class="">
                                            <span class="price">Rp. {{ $product->harga_jual }}</span>
                                        </div>
                                        <p>{{ $product->productCategory->nama ?? '-' }}</p>
                                        <p><a href="{{ route('login') }}" class="btn btn-primary">Pesan sekarang</a></p>
                                    </div>
                                </div>
                                <div class="menu-img img" style="background-image: url({{ asset('images/' . $product->image) }});"></div>
                            </div>
                            @else
                            <div class="menus d-sm-flex ftco-animate align-items-stretch">
                                <div class="menu-img img" style="background-image: url({{ asset('images/' . $product->image) }});"></div>
                                <div class="text d-flex align-items-center">
                                    <div>
                                        <div class="d-flex">
                                            <div class="one-half">
                                                <h3>{{ $product->nama }}</h3>
                                            </div>
                                        </div>
                                        <div class="">
                                            <span class="price">Rp. {{ $product->harga_jual }}</span>
                                        </div>
                                        <p>{{ $product->productCategory->nama ?? '-' }}</p>
                                        <p><a href="{{ route('login') }}" class="btn btn-primary">Pesan sekarang</a></p>
                                    </div>
                                </div>
                            </div>
                            @endif

                    </div>
                @endforeach
            </div>

        </div>
    </section>

      {{-- <section class="ftco-section">
          <div class="container">
              <div class="row justify-content-center mb-5 pb-2">
        <div class="col-md-12 text-center heading-section ftco-animate">
            <span class="subheading">Chef</span>
          <h2 class="mb-4">Our Master Chef</h2>
        </div>
      </div>
              <div class="row">
                  <div class="col-md-6 col-lg-3 ftco-animate">
                      <div class="staff">
                          <div class="img" style="background-image: url({{asset('customer-template')}}/images/chef-4.jpg);"></div>
                          <div class="text pt-4">
                              <h3>John Smooth</h3>
                              <span class="position mb-2">Coffe Shop Owner</span>
                              <div class="faded">
                                  <ul class="ftco-social d-flex">
                      <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                      <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                      <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                      <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-3 ftco-animate">
                      <div class="staff">
                          <div class="img" style="background-image: url({{asset('customer-template')}}/images/chef-2.jpg);"></div>
                          <div class="text pt-4">
                              <h3>Rebeca Welson</h3>
                              <span class="position mb-2">Head Chef</span>
                              <div class="faded">
                                  <ul class="ftco-social d-flex">
                      <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                      <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                      <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                      <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-3 ftco-animate">
                      <div class="staff">
                          <div class="img" style="background-image: url({{asset('customer-template')}}/images/chef-3.jpg);"></div>
                          <div class="text pt-4">
                              <h3>Kharl Branyt</h3>
                              <span class="position mb-2">Chef</span>
                              <div class="faded">
                                  <ul class="ftco-social d-flex">
                      <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                      <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                      <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                      <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-3 ftco-animate">
                      <div class="staff">
                          <div class="img" style="background-image: url({{asset('customer-template')}}/images/chef-1.jpg);"></div>
                          <div class="text pt-4">
                              <h3>Luke Simon</h3>
                              <span class="position mb-2">Chef</span>
                              <div class="faded">
                                  <ul class="ftco-social d-flex">
                      <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                      <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                      <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                      <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section> --}}

      <section class="ftco-section img" style="background-image: url({{asset('customer-template')}}/images/bg_3.jpg)" data-stellar-background-ratio="0.5">
          <div class="container">
              <div class="row d-flex">
        <div class="col-md-7 ftco-animate makereservation p-4 px-md-5 pb-md-5">
            <div class="heading-section ftco-animate mb-5 text-center">
                <span class="subheading">Book a table</span>
              <h2 class="mb-4">Make Reservation</h2>
            </div>
          <form action="#">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Start Date</label>
                  <input type="text" class="form-control" placeholder="Start Date">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Start Time</label>
                  <input type="text" class="form-control" placeholder="Start Time">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">End Time</label>
                  <input type="text" class="form-control" placeholder="End Time">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="">Person</label>
                    <div class="select-wrap one-third">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="" id="" class="form-control">
                        <option value="">Person</option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                      </select>
                    </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Note</label>
                  <input type="text" class="form-control" id="book_time" placeholder="Note">
                </div>
              </div>
              <div class="col-md-12 mt-3">
                <div class="form-group text-center">
                    <a href="{{ route('login') }}" class="btn btn-primary">Make a reservation</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
          </div>
      </section>

      {{-- <section class="ftco-section testimony-section img">
          <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-12 text-center heading-section ftco-animate">
            <span class="subheading">Testimony</span>
          <h2 class="mb-4">Happy Customer</h2>
        </div>
      </div>
      <div class="row ftco-animate justify-content-center">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel ftco-owl">
            <div class="item">
              <div class="testimony-wrap text-center pb-5">
                <div class="user-img mb-4" style="background-image: url({{asset('customer-template')}}/images/person_1.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text p-3">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Jason McClean</p>
                  <span class="position">Customer</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap text-center pb-5">
                <div class="user-img mb-4" style="background-image: url({{asset('customer-template')}}/images/person_2.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text p-3">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Mark Stevenson</p>
                  <span class="position">Customer</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap text-center pb-5">
                <div class="user-img mb-4" style="background-image: url({{asset('customer-template')}}/images/person_3.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text p-3">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Art Leonard</p>
                  <span class="position">Customer</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap text-center pb-5">
                <div class="user-img mb-4" style="background-image: url({{asset('customer-template')}}/images/person_4.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text p-3">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Rose Henderson</p>
                  <span class="position">Customer</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap text-center pb-5">
                <div class="user-img mb-4" style="background-image: url({{asset('customer-template')}}/images/person_3.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text p-3">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Ian Boner</p>
                  <span class="position">Customer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

  <section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Maps</span>
                <h2 class="mb-4">Location</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="map-container" style="width: 100%; height: 450px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.703726769279!2d107.76318187430363!3d-6.5590338641174135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e693df1e57ac3ed%3A0xbd727532766e8dd7!2sD&#39;Podjok%20GARDEN!5e0!3m2!1sen!2sid!4v1717936705370!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4">
                    <span class="subheading">Our Location</span>
                    <h2 class="mb-4">Find Us</h2>
                    <p>
                        Gg. Sukagalih No.I No 5, Karanganyar, Kec. Subang, Kabupaten Subang, Jawa Barat 41211 <br>
                        CQR8+98 Karanganyar, Subang Regency, West Java
                    </p>
                    <p>
                        <a href="https://maps.app.goo.gl/osHfGn94Ged4kkQH9" target="_blank" class="btn btn-primary">Lihat Lokasi</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

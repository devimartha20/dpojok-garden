@extends('layouts.customer.layout')
@section('title')
    Dashboard
@endsection
@section('styles')

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
        @forelse ($products as $product)
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
      <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center fadeInUp ftco-animated">
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
                <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
                    <div class="staff">
                        <div class="img" style="background-image: url(https://dolanyok.com/wp-content/uploads/2019/12/Blanco-Coffee-and-Books.jpg);"></div>
                        <div class="text pt-4">
                            <h3>Indoor</h3>
                            <span class="position mb-2">Dalam Ruangan</span>
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
                <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
                    <div class="staff">
                        <div class="img" style="background-image: url(https://image.archify.com/blog/l/06-6%20Inspirasi%20Desain%20Cafe%20Outdoor%20Unik.jpg);"></div>
                        <div class="text pt-4">
                            <h3>Outdoor</h3>
                            <span class="position mb-2">Diluar Ruangan</span>
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
                <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
                    <div class="staff">
                        <div class="img" style="background-image: url(https://th.bing.com/th/id/R.acdcedb72b9d9b39a537150258c6671b?rik=v%2fIB4GYNdcOinA&riu=http%3a%2f%2fupload.wikimedia.org%2fwikipedia%2fcommons%2f2%2f29%2fBilliards_and_snookers.jpg&ehk=imL%2f3dOn8iarQ2imI0iY8MHzMGjjTQeJNfl5Aoo5qZw%3d&risl=&pid=ImgRaw&r=0);"></div>
                        <div class="text pt-4">
                            <h3>Biliard</h3>
                            <span class="position mb-2">Ruang bermain</span>
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
                <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
                    <div class="staff">
                        <div class="img" style="background-image: url(https://artikel.rumah123.com/news-content/img/2020/10/16060313/120816894_651544972166302_1863605521619113105_n-884x1024.jpg);"></div>
                        <div class="text pt-4">
                            <h3>Mushola</h3>
                            <span class="position mb-2">Ruang Ibadah</span>
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
                <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
                    <div class="staff">
                        <div class="img" style="background-image: url(data:image/jpeg;base64,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);"></div>
                        <div class="text pt-4">
                            <h3>Toilet</h3>
                            <span class="position mb-2">Toilet dan Tempat Wudhu</span>
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
                <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
                    <div class="staff">
                        <div class="img" style="background-image: url(https://sman1kibin.sch.id/wp-content/uploads/2018/11/parkir-2-1024x683.jpg);"></div>
                        <div class="text pt-4">
                            <h3>Area Parkir</h3>
                            <span class="position mb-2">Tempat Parkir</span>
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
    </section>
    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-6 col-lg-3">
              <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">D'Podjok Garden</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                  <li class="ftco-animate fadeInUp ftco-animated"><a href="#"><span class="icon-twitter"></span></a></li>
                  <li class="ftco-animate fadeInUp ftco-animated"><a href="#"><span class="icon-facebook"></span></a></li>
                  <li class="ftco-animate fadeInUp ftco-animated"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Open Hours</h2>
                <ul class="list-unstyled open-hours">
                  <li class="d-flex"><span>Monday</span><span>11:00 - 23:00</span></li>
                  <li class="d-flex"><span>Tuesday</span><span>11:00 - 23:00</span></li>
                  <li class="d-flex"><span>Wednesday</span><span>11:00 - 23:00</span></li>
                  <li class="d-flex"><span>Thursday</span><span>11:00 - 23:00</span></li>
                  <li class="d-flex"><span>Friday</span><span>11:00 - 23:00</span></li>
                  <li class="d-flex"><span>Saturday</span><span>11:00 - 23:00</span></li>
                  <li class="d-flex"><span>Sunday</span><span> 11:00 - 23:00</span></li>
                </ul>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
               <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Instagram</h2>
                <div class="thumb d-sm-flex">
                      <a href="#" class="thumb-menu img" style="background-image: url(http://127.0.0.1:8000/customer-template/images/insta-1.jpg);">
                      </a>
                      <a href="#" class="thumb-menu img" style="background-image: url(http://127.0.0.1:8000/customer-template/images/insta-2.jpg);">
                      </a>
                      <a href="#" class="thumb-menu img" style="background-image: url(http://127.0.0.1:8000/customer-template/images/insta-3.jpg);">
                      </a>
                  </div>
                  <div class="thumb d-flex">
                      <a href="#" class="thumb-menu img" style="background-image: url(http://127.0.0.1:8000/customer-template/images/insta-4.jpg);">
                      </a>
                      <a href="#" class="thumb-menu img" style="background-image: url(http://127.0.0.1:8000/customer-template/images/insta-5.jpg);">
                      </a>
                      <a href="#" class="thumb-menu img" style="background-image: url(http://127.0.0.1:8000/customer-template/images/insta-6.jpg);">
                      </a>
                  </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="ftco-footer-widget mb-4">
                  <h2 class="ftco-heading-2">Newsletter</h2>
                  <p>Far far away, behind the word mountains, far from the countries.</p>
                <form action="#" class="subscribe-form">
                  <div class="form-group">
                    <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                    <input type="submit" value="Subscribe" class="form-control submit px-3">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">

              <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright ©<script>document.write(new Date().getFullYear());</script>2024 All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
          </div>
        </div>
      </footer>
@endsection
@section('scripts')

@endsection

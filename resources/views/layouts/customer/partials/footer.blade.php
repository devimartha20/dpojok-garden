@auth
@else
<footer id="contact" class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6 col-lg-3">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">D'Podjok Garden</h2>
            <p>Tempat terbaik untuk remaja yang mencari suasana hangat dan harga ramah di kantong. Nikmati waktu santai bersama teman-teman dalam suasana yang cozy dan nyaman, sambil menikmati berbagai hidangan lezat dan minuman segar.</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
              <li class="ftco-animate"><a href="https://wa.me/6281322455758" target="_BLANK"><span class="icon-whatsapp"></span></a></li>
              <li class="ftco-animate"><a href="https://www.instagram.com/dpodjok.garden?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_BLANK"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Open Hours</h2>
            <ul class="list-unstyled open-hours">
              <li class="d-flex"><span>Monday</span><span>10:00 - 22:00</span></li>
              <li class="d-flex"><span>Tuesday</span><span>10:00 - 22:00</span></li>
              <li class="d-flex"><span>Wednesday</span><span>10:00 - 22:00</span></li>
              <li class="d-flex"><span>Thursday</span><span>10:00 - 22:00</span></li>
              <li class="d-flex"><span>Friday</span><span>10:00 - 22:00</span></li>
              <li class="d-flex"><span>Saturday</span><span>10:00 - 22:00</span></li>
              <li class="d-flex"><span>Sunday</span><span> 10:00 - 22:00</span></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Instagram</h2>
                <div id="instagram-feed" class="thumb d-flex justify-content-center">
                    <!-- Local Instagram image will be inserted here -->
                    <a href="https://www.instagram.com/dpodjok.garden?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="thumb-menu img" style="background-image: url({{ asset('images/instagram-qr.png') }}); width: 100%; height: 200px; background-size: contain; background-position: center; background-repeat: no-repeat;">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Tiktok</h2>
                <div id="instagram-feed" class="thumb d-flex justify-content-center">
                    <!-- Local Instagram image will be inserted here -->
                    <a href="https://www.tiktok.com/@dpodjok.garden?_t=8n3ZFnLnfpY&_r=1" target="_blank" class="thumb-menu img" style="background-image: url({{ asset('images/tiktok-qr.jpg') }}); width: 100%; height: 200px; background-size: contain; background-position: center; background-repeat: no-repeat;">
                    </a>
                </div>
            </div>
        </div>


        {{-- <div class="col-md-6 col-lg-3">
           <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Instagram</h2>
            <div class="thumb d-sm-flex">
                  <a href="#" class="thumb-menu img" style="background-image: url({{asset('customer-template')}}/images/insta-1.jpg);">
                  </a>
                  <a href="#" class="thumb-menu img" style="background-image: url({{asset('customer-template')}}/images/insta-2.jpg);">
                  </a>
                  <a href="#" class="thumb-menu img" style="background-image: url({{asset('customer-template')}}/images/insta-3.jpg);">
                  </a>
              </div>
              <div class="thumb d-flex">
                  <a href="#" class="thumb-menu img" style="background-image: url({{asset('customer-template')}}/images/insta-4.jpg);">
                  </a>
                  <a href="#" class="thumb-menu img" style="background-image: url({{asset('customer-template')}}/images/insta-5.jpg);">
                  </a>
                  <a href="#" class="thumb-menu img" style="background-image: url({{asset('customer-template')}}/images/insta-6.jpg);">
                  </a>
              </div>
          </div>
        </div> --}}
        {{-- <div class="col-md-6 col-lg-3">
          <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Contact</h2>
              <p>081322455758</p>
            {{-- <form action="#" class="subscribe-form">
              <div class="form-group">
                <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                <input type="password" class="form-control mb-2 text-center" placeholder="Enter password">
                <p><a href="{{ route('login') }}" class="btn btn-primary">Login</a></p>
              </div>
            </form> --}}
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
      </div>
    </div>
  </footer>
@endauth


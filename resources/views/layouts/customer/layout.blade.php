<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('customer-template')}}/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('customer-template')}}/css/animate.css">

    <link rel="stylesheet" href="{{asset('customer-template')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('customer-template')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('customer-template')}}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{asset('customer-template')}}/css/aos.css">

    <link rel="stylesheet" href="{{asset('customer-template')}}/css/ionicons.min.css">

    <link rel="stylesheet" href="{{asset('customer-template')}}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{asset('customer-template')}}/css/jquery.timepicker.css">


    <link rel="stylesheet" href="{{asset('customer-template')}}/css/flaticon.css">
    <link rel="stylesheet" href="{{asset('customer-template')}}/css/icomoon.css">
    <link rel="stylesheet" href="{{asset('customer-template')}}/css/style.css">

    @yield('styles')
  </head>
  <body>
    
    @include('layouts.customer.partials.nav')
    <!-- END nav -->

    @yield('content')

    @include('layouts.customer.partials.footer')

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  

  <script src="{{asset('customer-template')}}/js/jquery.min.js"></script>
  <script src="{{asset('customer-template')}}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{asset('customer-template')}}/js/popper.min.js"></script>
  <script src="{{asset('customer-template')}}/js/bootstrap.min.js"></script>
  <script src="{{asset('customer-template')}}/js/jquery.easing.1.3.js"></script>
  <script src="{{asset('customer-template')}}/js/jquery.waypoints.min.js"></script>
  <script src="{{asset('customer-template')}}/js/jquery.stellar.min.js"></script>
  <script src="{{asset('customer-template')}}/js/owl.carousel.min.js"></script>
  <script src="{{asset('customer-template')}}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{asset('customer-template')}}/js/aos.js"></script>
  <script src="{{asset('customer-template')}}/js/jquery.animateNumber.min.js"></script>
  <script src="{{asset('customer-template')}}/js/bootstrap-datepicker.js"></script>
  <script src="{{asset('customer-template')}}/js/jquery.timepicker.min.js"></script>
  <script src="{{asset('customer-template')}}/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('customer-template')}}/js/google-map.js"></script>
  <script src="{{asset('customer-template')}}/js/main.js"></script>
  @yield('scripts')
  </body>
</html>

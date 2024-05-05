@if(request()->path() !== '/')
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar" id="ftco-navbar" style="background-color: rgb(83, 22, 22);">
    <div class="container">
        <a class="navbar-brand" href="/">Dpodjok Garden</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>
                <li class="nav-item"><a href="{{ route('search-products.index') }}" class="nav-link">Menu</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Take Away</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Reservasi</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Riwayat</a></li>
                <li class="nav-item"><a href="{{ route('cart.index') }}" class="nav-link"><i class="fa fa-shopping-cart"></i> Keranjang</a></li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <li class="nav-item cta"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    this.closest('form').submit();" class="nav-link">Logout</a></li>
                </form>
            </ul>
        </div>
    </div>
</nav>

@else
<div class="py-1 bg-black top">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">+ 1235 2355 98</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">youremail@email.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
                        <p class="mb-0 register-link"><span>Open hours:</span> <span>Monday - Sunday</span> <span>8:00AM - 9:00PM</span></p>
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">D'Podjok Garden</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
            <li class="nav-item"><a href="menu.html" class="nav-link">Menu</a></li>
            <li class="nav-item"><a href="blog.html" class="nav-link">Stories</a></li>
          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
          <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Sign Up</a></li>
          <li class="nav-item cta"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>
@endif


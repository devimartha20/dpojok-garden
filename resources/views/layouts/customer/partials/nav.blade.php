@if(request()->path() !== '/')
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar" id="ftco-navbar" style="background-color: #A79277; color: #ffffff;">
    <div class="container">
        <a class="navbar-brand" href="/">Dpodjok Garden</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}" class="nav-link"><strong>Dashboard</strong></a></li>
                <li class="nav-item {{ request()->routeIs('search-products.index') ? 'active' : '' }}"><a href="{{ route('search-products.index') }}" class="nav-link"><strong>Menu</strong></a></li>
                <li class="nav-item {{ request()->routeIs('customer.reservation') ? 'active' : '' }}"><a href="{{ route('customer.reservation.index') }}" class="nav-link"><strong>Reservasi</strong></a></li>
                <li class="nav-item {{ request()->routeIs('order-history.index') ? 'active' : '' }}"><a href="{{ route('order-history.index') }}" class="nav-link"><strong>Riwayat</strong></a></li>
                <li class="nav-item {{ request()->routeIs('cart.index') ? 'active' : '' }}"><a href="{{ route('cart.index') }}" class="nav-link"><strong>Keranjang</strong></a></li>
                <li class="nav-item {{ request()->routeIs('customer.profile.update') ? 'active' : '' }}"><a href="{{ route('customer.profile.update') }}" class="nav-link"><strong>Akun</strong></a></li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <li class="nav-item cta"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    this.closest('form').submit();" class="nav-link"><strong>Logout</strong></a></li>
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
                        <span class="text">+62 813-2245-5758</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-home"></span></div>
                        <span class="text">Karanganyar, Subang Regency</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
                        <p class="mb-0 register-link"><span>Open hours:</span> <span>Monday - Sunday</span> <span>10:00AM - 10:00PM</span></p>
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="/">D'Podjok Garden</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
            <li class="nav-item"><a href="#menu" class="nav-link">Menu</a></li>
            <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Sign Up</a></li>
            <li class="nav-item cta"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>
@endif


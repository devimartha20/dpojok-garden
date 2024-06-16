<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <div class="mobile-search">
                <div class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                            <input type="text" class="form-control" placeholder="Enter Keyword">
                            <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <a href="/">
                <img class="img-fluid" src="{{ asset('main/assets/images/logo-pojok.png') }}" alt="Theme-Logo" />
            </a>
            <a class="mobile-options">
                <i class="ti-more"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                </li>
                <li class="header-search">
                    {{-- <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                            <input type="text" class="form-control">
                            <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                        </div>
                    </div> --}}
                </li>
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="ti-fullscreen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="user-profile header-notification">
                    <a href="#!">
                        <img src="{{ asset('main/assets/images/avatar-4.jpg') }}" class="img-radius" alt="User-Profile-Image">
                        <span>
                            @auth('employee')
                            {{ Auth::guard('employee')->user()->name }}
                            @else
                            {{ Auth::user()->name }}
                            @endauth
                            </span>
                        <i class="ti-angle-down"></i>
                    </a>
                    <ul class="show-notification profile-notification">
                        {{-- <li>
                            <a href="#!">
                                <i class="ti-settings"></i> Settings
                            </a>
                        </li> --}}
                        <li>
                            <a href="{{ request()->routeIs('employee.*') ? route('employee.profile.edit') : route('profile.edit') }}">
                                <i class="ti-user"></i> Profile
                            </a>
                        </li>

                        {{-- <li>
                            <a href="auth-lock-screen.html">
                                <i class="ti-lock"></i> Lock Screen
                            </a>
                        </li> --}}
                        <li>
                            @if(request()->routeIs('employee.*'))
                            <form method="POST" action="{{ route('employee.logout') }}">
                                @csrf
                                <i class="ti-layout-sidebar-left"></i>
                                <a href="route('employee.logout')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                            @else
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <i class="ti-layout-sidebar-left"></i>
                                <a href="route('logout')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                            @endif

                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

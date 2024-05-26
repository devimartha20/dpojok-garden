<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">


        @if (request()->routeIs('employee.*'))
            @auth('employee')
                <div class="pcoded-navigatio-lavel">Dashboard</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="{{ request()->routeIs('employee.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('employee.dashboard') }}">
                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
                <div class="pcoded-navigatio-lavel">Data</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="{{ request()->routeIs('employee.attendance') ? 'active' : '' }}">
                        <a href="{{ route('employee.attendance') }}">
                            <span class="pcoded-micon"><i class="ti-home"></i><b>A</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Absensi</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('employee.schedule') ? 'active' : '' }}">
                        <a href="{{ route('employee.schedule') }}">
                            <span class="pcoded-micon"><i class="ti-home"></i><b>J</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Jadwal</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('employee.leave.index') }}">
                            <span class="pcoded-micon"><i class="ti-home"></i><b>J</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Cuti</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            @endauth
        @else
            @auth('web')
            <div class="pcoded-navigatio-lavel">Dashboard</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>

            @hasrole('admin')
            {{-- Produk --}}
            <div class="pcoded-navigatio-lavel">Data Produk</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu">
                    <a>
                        <span class="pcoded-micon"><i class="ti-menu"></i></span>
                        <span class="pcoded-mtext">Produk</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class=" ">
                            <a href="{{ route('product-category.index') }}">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext" data-i18n="">Kategori Produk</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('product.index') }}">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Daftar Produk</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            {{-- Meja --}}
            <div class="pcoded-navigatio-lavel">Data Meja</div>
            <ul class="pcoded-item pcoded-left-item">
                <li>
                    <a href="{{ route('table.index') }}">
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                        <span class="pcoded-mtext" >Daftar Meja</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>

            {{-- Penjualan --}}
            <div class="pcoded-navigatio-lavel">Penjualan</div>
            <ul class="pcoded-item pcoded-left-item">
                <li>
                    <a>
                        <span class="pcoded-micon"><i class="ti-shopping-cart"></i><b>FC</b></span>
                        <span class="pcoded-mtext" >Pemesanan Menu</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li>
                    <a href="map-google.html">
                        <span class="pcoded-micon"><i class="ti-map-alt"></i><b>FC</b></span>
                        <span class="pcoded-mtext" >Reservasi Tempat</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>

        {{-- Human Resource --}}
        <div class="pcoded-navigatio-lavel">Human Resource</div>
        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="{{ route('employee.index') }}">
                    <span class="pcoded-micon"><i class="ti-calendar"></i><b>FC</b></span>
                    <span class="pcoded-mtext" >Daftar Pegawai</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('attendance.index') }}">
                    <span class="pcoded-micon"><i class="ti-calendar"></i><b>FC</b></span>
                    <span class="pcoded-mtext" >Absensi Karyawan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a>
                    <span class="pcoded-micon"><i class="ti-agenda"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Jadwal Kerja</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('schedule.index') }}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Jam Kerja</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('absence.index')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Ketidakhadiran</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('leave.index')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Cuti</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

            {{-- Pelanggan --}}
            <div class="pcoded-navigatio-lavel">Kelola Pelanggan</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu">
                    <a>
                        <span class="pcoded-micon"><i class="ti-id-badge"></i></span>
                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Pelanggan</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class=" ">
                            <a href="{{ route('customer.index') }}">
                                <span class="pcoded-micon"><i class="ti-id-badge"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Daftar Pelanggan</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class=" ">
                            <a>
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">News Letter</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            {{-- Laporan --}}
            <div class="pcoded-navigatio-lavel">Kelola Laporan</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu">
                    <a>
                        <span class="pcoded-micon"><i class="ti-file"></i></span>
                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Laporan</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class=" ">
                            <a href="{{ route('report.sales') }}">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Laporan Penjualan</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{ route('report.attendances') }}">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Laporan Kinerja Karyawan</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            {{-- Pengguna --}}
            <div class="pcoded-navigatio-lavel">Kelola Pengguna</div>
            <ul class="pcoded-item pcoded-left-item">
                <li>
                    <a>
                        <span class="pcoded-micon"><i class="ti-id-badge"></i><b>FC</b></span>
                        <span class="pcoded-mtext" >Daftar Pengguna</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>

            {{-- Profile --}}
            <div class="pcoded-navigatio-lavel">Profil</div>
            <ul class="pcoded-item pcoded-left-item">
                <li>
                    <a>
                        <span class="pcoded-micon"><i class="ti-user"></i><b>FC</b></span>
                        <span class="pcoded-mtext" >Profil</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
            @endhasrole


            @hasrole('koki')
            <div class="pcoded-navigatio-lavel">Kelola Pemesanan</div>
            <ul class="pcoded-item pcoded-left-item">
                <li>
                    <a href="{{ route('orderpros.index') }}">
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                        <span class="pcoded-mtext" >Pemesanan</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li>
                    <a>
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                        <span class="pcoded-mtext" >Reservasi</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
            @endhasrole

            @hasrole('pelayan')
            <div class="pcoded-navigatio-lavel">Kelola Pemesanan</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ request()->routeIs('orderpros.waiter.*') ? 'active' : '' }}">
                    <a href="{{ route('orderpros.waiter.index') }}">
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                        <span class="pcoded-mtext" >Pemesanan</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li>
                    <a>
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                        <span class="pcoded-mtext" >Reservasi</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
            @endhasrole

            @hasrole('kasir')
            <div class="pcoded-navigatio-lavel">Kelola Pemesanan</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ request()->routeIs('ordertrans.*') ? 'active' : '' }}">
                    <a href="{{ route('ordertrans.index') }}">
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                        <span class="pcoded-mtext" >Pesanan</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reservation.index') }}">
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                        <span class="pcoded-mtext" >Reservasi</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('riwayatpesan.route') }}">
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                        <span class="pcoded-mtext" >Riwayat</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
            @endhasrole

            @hasrole('owner')
            <div class="pcoded-navigatio-lavel">Human Resource</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu">
                    <a>
                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Human Resource</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class=" ">
                            <a href="{{ route('attendance.index') }}">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Absensi</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="pcoded-hasmenu ">
                            <a>
                                <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.main">Jadwal Kerja</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="{{ route('schedule.index') }}">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Jam Kerja</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ route('absence.index')}}">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Ketidakhadiran</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ route('leave.index')}}">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Cuti</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>

                <div class="pcoded-navigatio-lavel">Laporan</div>
                <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu">
                    <a>
                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Laporan</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class=" ">
                            <a href="{{ route('report.sales') }}">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Laporan Penjualan</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{ route('report.attendances') }}">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Laporan Absensi</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            @endhasrole

            @hasrole('pelanggan')
            <div class="pcoded-navigatio-lavel">Kelola Pesanan</div>
            <ul class="pcoded-item pcoded-left-item">
                <li>
                    <a>
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                        <span class="pcoded-mtext" >Reservasi</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li>
                    <a>
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                        <span class="pcoded-mtext" >Pemesanan Online (Pick Up)</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li>
                    <a>
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                        <span class="pcoded-mtext" >Review</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
            @endhasrole

        @endauth
        @endif

    </div>
</nav>

<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm.svg') }}" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-sm.svg') }}" alt="" height="24"> 
                        <span class="logo-txt">{{ config('app.name') }}</span>
                    </span>
                </a>

                <a href="{{ route('dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm.svg') }}" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-sm.svg') }}" alt="" height="24"> 
                        <span class="logo-txt">{{ config('app.name') }}</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" 
                    data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Cari...">
                    <span class="fa fa-search"></span>
                </div>
            </form>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/avatar-1.jpg') }}"
                        alt="User Avatar">
                    <span class="d-none d-xl-inline-block ms-1">{{ Auth::user()->name }}</span>
                    <i class="fa fa-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="fa fa-user font-size-16 align-middle me-1"></i> 
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fa fa-power-off font-size-16 align-middle me-1 text-danger"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="topnav">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="fa fa-home me-2"></i>Dashboard
                            </a>
                        </li>

                        <!-- Menu Parkir -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-parking" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-car me-2"></i>Parkir <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-parking">
                                <a href="{{ route('parking.entry') }}" class="dropdown-item">Kendaraan Masuk</a>
                                <a href="{{ route('parking.index') }}" class="dropdown-item">Daftar Parkir</a>
                                <a href="{{ route('parking.history') }}" class="dropdown-item">Riwayat Parkir</a>
                            </div>
                        </li>

                        <!-- Menu Laporan -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-reports" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-file me-2"></i>Laporan <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-reports">
                                <a href="{{ route('reports.daily') }}" class="dropdown-item">Laporan Harian</a>
                                <a href="{{ route('reports.monthly') }}" class="dropdown-item">Laporan Bulanan</a>
                                <a href="{{ route('reports.yearly') }}" class="dropdown-item">Laporan Tahunan</a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('reports.export.daily') }}" class="dropdown-item">Export Laporan Harian</a>
                                <a href="{{ route('reports.export.monthly') }}" class="dropdown-item">Export Laporan Bulanan</a>
                                <a href="{{ route('reports.export.yearly') }}" class="dropdown-item">Export Laporan Tahunan</a>
                            </div>
                        </li>

                        @if(Auth::user()->role === 'admin')
                        <!-- Menu Master Data (Admin Only) -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-master" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cogs me-2"></i>Master Data <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-master">
                                <a href="{{ route('users.index') }}" class="dropdown-item">Pengguna</a>
                                <a href="{{ route('vehicles.index') }}" class="dropdown-item">Jenis Kendaraan</a>
                                <a href="{{ route('settings.index') }}" class="dropdown-item">Pengaturan</a>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
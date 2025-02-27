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
                <i class="uil-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            @auth
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/avatar-1.jpg') }}" 
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">{{ Auth::user()->name }}</span>
                    <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> 
                        <span class="align-middle">Profile</span>
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> 
                        <span class="align-middle">Sign out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </div>

    <div class="container-fluid">
        <div class="topnav">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">
                                    <i class="uil-tachometer-alt me-2"></i>Dashboard
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-parking" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="uil-parking me-2"></i>Parkir <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-parking">
                                    <a href="{{ route('parking.entry') }}" class="dropdown-item">Kendaraan Masuk</a>
                                    <a href="{{ route('parking.index') }}" class="dropdown-item">Daftar Parkir</a>
                                    <a href="{{ route('parking.history') }}" class="dropdown-item">Riwayat Parkir</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-reports" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="uil-chart me-2"></i>Laporan <div class="arrow-down"></div>
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

                            @if(Auth::user()->isAdmin())
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-settings" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="uil-setting me-2"></i>Pengaturan <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-settings">
                                        <a href="{{ route('users.index') }}" class="dropdown-item">Manajemen User</a>
                                        <a href="{{ route('settings.index') }}" class="dropdown-item">Pengaturan Aplikasi</a>
                                    </div>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
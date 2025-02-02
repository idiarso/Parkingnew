<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- plugin css -->
    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">

    <!-- preloader css -->
    <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

    @if(file_exists(public_path('css/app.css')))
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endif
</head>
<body data-layout="horizontal" data-topbar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="/" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.svg" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">{{ config('app.name') }}</span>
                            </span>
                        </a>

                        <a href="/" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.svg" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">{{ config('app.name') }}</span>
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

                <div class="d-flex">
                    @auth
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">{{ Auth::user()->name }}</span>
                            <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">Profile</span></a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Sign out</span>
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
                                        <i class="uil-home-alt me-2"></i> Dashboard
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('overview') }}">
                                        <i class="uil-chart-line me-2"></i> Overview
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" role="button" data-bs-toggle="dropdown">
                                        <i class="uil-parking-square me-2"></i> Parking <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('parking.index') }}" class="dropdown-item">Current Parking</a>
                                        <a href="{{ route('parking.entry') }}" class="dropdown-item">Vehicle Entry</a>
                                        <a href="{{ route('parking.history') }}" class="dropdown-item">History</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" role="button" data-bs-toggle="dropdown">
                                        <i class="uil-file-alt me-2"></i> Reports <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('reports.daily') }}" class="dropdown-item">Daily Report</a>
                                        <a href="{{ route('reports.monthly') }}" class="dropdown-item">Monthly Report</a>
                                        <a href="{{ route('reports.yearly') }}" class="dropdown-item">Yearly Report</a>
                                    </div>
                                </li>

                                @if(auth()->user()->is_admin)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" role="button" data-bs-toggle="dropdown">
                                        <i class="uil-cog me-2"></i> Settings <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('settings.index') }}" class="dropdown-item">General Settings</a>
                                        <a href="{{ route('users.index') }}" class="dropdown-item">User Management</a>
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

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <!-- pace js -->
    <script src="assets/libs/pace-js/pace.min.js"></script>

    @if(file_exists(public_path('js/app.js')))
        <script src="{{ asset('js/app.js') }}" defer></script>
    @endif
</body>
</html>
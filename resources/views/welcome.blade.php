<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Parking Management System" name="description" />
    <meta content="RSI" name="author" />
    
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body data-layout="horizontal" data-topbar="dark">
    <div class="authentication-bg min-vh-100">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center mb-4">
                            <a href="/" class="auth-logo mb-5 d-block">
                                <img src="assets/images/logo-sm.svg" alt="" height="30" class="auth-logo-dark">
                                <img src="assets/images/logo-sm.svg" alt="" height="30" class="auth-logo-light">
                            </a>

                            <h4 class="text-white">Welcome to {{ config('app.name') }}</h4>
                            <p class="text-white-50">Parking Management System</p>
                        </div>

                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    @if (Route::has('login'))
                                        <div class="mb-3 text-center">
                                            @auth
                                                <a href="{{ url('/dashboard') }}" class="btn btn-primary w-100 waves-effect waves-light">Dashboard</a>
                                            @else
                                                <a href="{{ route('login') }}" class="btn btn-primary w-100 waves-effect waves-light">Log in</a>

                                                @if (Route::has('register'))
                                                    <div class="mt-3">
                                                        <a href="{{ route('register') }}" class="btn btn-info w-100 waves-effect waves-light">Register</a>
                                                    </div>
                                                @endif
                                            @endauth
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center text-muted p-4">
                            <p class="text-white-50">© <script>document.write(new Date().getFullYear())</script> {{ config('app.name') }}. Crafted with <i class="mdi mdi-heart text-danger"></i> by RSI</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <!-- pace js -->
    <script src="assets/libs/pace-js/pace.min.js"></script>
</body>
</html>
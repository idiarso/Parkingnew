<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistem Parkir RSI" name="description" />
    <meta content="Dason" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Icons Css -->
    <link href="{{ URL::asset('assets/css/icons.min.css') }}" rel="stylesheet">
    <!-- App Css-->
    <link href="{{ URL::asset('assets/css/app.min.css') }}" rel="stylesheet">
    @stack('css')
</head>

<body data-topbar="light" data-layout="horizontal">
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.horizontal')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ URL::asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
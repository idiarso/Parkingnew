<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.ico')); ?>">

    <!-- preloader css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/preloader.min.css')); ?>" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo e(asset('assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body data-layout="horizontal">

    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- Horizontal Menu -->
        <?php echo $__env->make('layouts.horizontal-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © <?php echo e(config('app.name')); ?>.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="<?php echo e(asset('assets/libs/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/metismenu/metisMenu.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/simplebar/simplebar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/node-waves/waves.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/feather-icons/feather.min.js')); ?>"></script>
    <!-- pace js -->
    <script src="<?php echo e(asset('assets/libs/pace-js/pace.min.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH D:\XAMPP\htdocs\parkir-RSI\resources\views/layouts/app.blade.php ENDPATH**/ ?>
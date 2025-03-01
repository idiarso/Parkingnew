<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Coming_Soon'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/libs/swiper/swiper.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<body data-topbar="dark">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="preview-img">
    <div class="swiper-container preview-thumb">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slide-bg" style="background-image: url(./assets/images/bg-1.jpg);"></div>
            </div>
            <div class="swiper-slide">
                <div class="slide-bg" style="background-image: url(./assets/images/bg-2.jpg);"></div>
            </div>
            <div class="swiper-slide">
                <div class="slide-bg" style="background-image: url(./assets/images/bg-3.jpg);"></div>
            </div>
        </div>
    </div>
    <!-- preview-thumb -->
    <div class="swiper-container preview-thumbsnav">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div>
                    <img src="<?php echo e(URL::asset('assets/images/bg-1.jpg')); ?>" alt=""
                        class="avatar-sm nav-img rounded-circle">
                </div>
            </div>
            <div class="swiper-slide">
                <div>
                    <img src="<?php echo e(URL::asset('assets/images/bg-2.jpg')); ?>" alt=""
                        class="avatar-sm nav-img rounded-circle">
                </div>
            </div>
            <div class="swiper-slide">
                    <img src="<?php echo e(URL::asset('assets/images/bg-3.jpg')); ?>" alt=""
                        class="avatar-sm nav-img rounded-circle">
                </div>
            </div>
        </div>
    </div>
    <!-- preview-thumb -->
</div>
<!-- preview bg -->

<div class="coming-content min-vh-100 py-4 px-3 py-sm-5">
    <div class="bg-overlay bg-primary"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center py-4 py-sm-5">
                    <div class="mb-5">
                        <a href="index">
                            <img src="<?php echo e(URL::asset('assets/images/logo-sm.svg')); ?>" alt="" height="30" class="me-1"><span class="logo-txt text-white font-size-22">Dason</span>
                        </a>
                    </div>
                    <h3 class="text-white mt-5">Let's get started with Dason</h3>
                    <p class="text-white-50 font-size-15">Donec pede justo fringilla vel aliquet nec vulputate eget arcu. In enim justo, rhoncus ut imperdiet a venenatis vitae, justo felis</p>
                    <div data-countdown="2021/12/31" class="counter-number mt-5"></div>
                    <form class="app-search mt-5 mx-auto">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Enter your email address">
                            <button class="btn btn-primary" type="button"><i class="bx bx-paper-plane align-middle"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- coming-content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/libs/swiper/swiper.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('assets/libs/jquery-countdown/jquery-countdown.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('assets/js/pages/coming-soon.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\morpich\laravl\Dason_Laravel_v1.1.0\Admin\resources\views/pages-comingsoon.blade.php ENDPATH**/ ?>
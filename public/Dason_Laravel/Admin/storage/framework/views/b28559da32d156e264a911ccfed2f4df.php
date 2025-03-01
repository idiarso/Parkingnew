<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Font_awesome'); ?> 5 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Icons <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Font Awesome 5 <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Solid</h4>
                <p class="card-title-desc">Use <code>&lt;i class="fas fa-ad"&gt;&lt;/i&gt;</code> <span class="badge bg-success">v 5.13.0</span>.</p>
            </div>
            <div class="card-body">
                <div class="row icon-demo-content" id="solid">
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Regular</h4>
                <p class="card-title-desc">Use <code>&lt;i class="far fa-address-book"&gt;&lt;/i&gt;</code> <span class="badge bg-success">v 5.13.0</span>.</p>
            </div>
            <div class="card-body">
                <div class="row icon-demo-content" id="regular">
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Brands</h4>
                <p class="card-title-desc">Use <code>&lt;i class="fab fa-500px"&gt;&lt;/i&gt;</code> <span class="badge bg-success">v 5.13.0</span>.</p>
            </div>
            <div class="card-body">
                <div class="row icon-demo-content" id="brand">
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div> <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/pages/fontawesome.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\morpich\laravl\Dason_Laravel_v1.1.0\Admin\resources\views/icons-fontawesome.blade.php ENDPATH**/ ?>
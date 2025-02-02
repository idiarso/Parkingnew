<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Video'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Components <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Video <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ratio video 16:9</h4>
                    <p class="card-title-desc">Aspect ratios can be customized with modifier classes.</p>
                </div><!-- end card header -->

                <div class="card-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe src="<?php echo e(URL::asset('https://www.youtube.com/embed/1y_kfWUCFDQ')); ?>" title="YouTube video" allowfullscreen></iframe>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ratio video 21:9</h4>
                    <p class="card-title-desc">Aspect ratios can be customized with modifier classes.</p>
                </div><!-- end card header -->

                <div class="card-body">
                    <!-- 21:9 aspect ratio -->
                    <div class="ratio ratio-21x9">
                        <iframe src="<?php echo e(URL::asset('https://www.youtube.com/embed/1y_kfWUCFDQ')); ?>" title="YouTube video" allowfullscreen></iframe>
                    </div>

                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col -->

    </div> <!-- end row -->

    <div class="row">

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ratio video 4:3</h4>
                    <p class="card-title-desc">Aspect ratios can be customized with modifier classes.</p>
                </div><!-- end card header -->

                <div class="card-body">
                    <!-- 4:3 aspect ratio -->
                    <div class="ratio ratio-4x3">
                        <iframe src="<?php echo e(URL::asset('https://www.youtube.com/embed/1y_kfWUCFDQ')); ?>" title="YouTube video" allowfullscreen></iframe>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ratio video 1:1</h4>
                    <p class="card-title-desc">Aspect ratios can be customized with modifier classes.</p>
                </div><!-- end card header -->

                <div class="card-body">
                    <!-- 1:1 aspect ratio -->
                    <div class="ratio ratio-1x1">
                        <iframe src="<?php echo e(URL::asset('https://www.youtube.com/embed/1y_kfWUCFDQ')); ?>" title="YouTube video" allowfullscreen></iframe>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div> <!-- end row -->
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\morpich\laravl\Dason_Laravel_v1.1.0\Admin\resources\views/ui-video.blade.php ENDPATH**/ ?>
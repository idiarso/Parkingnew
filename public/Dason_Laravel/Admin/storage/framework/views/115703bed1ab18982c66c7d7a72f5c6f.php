<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Starter_Page'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Pages <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Starter Page <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\morpich\laravl\Dason_Laravel_v1.1.0\Admin\resources\views/pages-starter.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Form_Mask'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Forms <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Form Mask <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Imask</h4>
                <p class="card-title-desc mb-0">vanilla javascript input mask</p>
            </div>
            <div class="card-body">

                <form>
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <div>
                                    <label for="regexp-mask" class="form-label">RegExp (Russian postal code)</label>
                                    <input type="text" class="form-control" id="regexp-mask">
                                    <div class="text-muted">/^[1-6]\d{0,5}$/</div>
                                </div>

                                <div class="mt-4">
                                    <label for="phone-mask" class="form-label">Pattern (Phone)</label>
                                    <input type="text" class="form-control" id="phone-mask">
                                    <div class="text-muted">+{7}(000)000-00-00</div>
                                </div>
                                <div class="mt-4">
                                    <label for="number-mask" class="form-label">Number</label>
                                    <input type="text" class="form-control" id="number-mask">
                                    <div class="text-muted">in range [-10000, 10000]</div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-6">
                            <div class="mt-4 mt-lg-0">
                                <div>
                                    <label for="date-mask" class="form-label">Date</label>
                                    <input type="text" class="form-control" id="date-mask">
                                    <div class="text-muted">'dd.mm.yyyy' in range [01.01.1990, 01.01.2020]</div>
                                </div>

                                <div class="mt-4">
                                    <label class="form-label">On-the-fly select</label>
                                    <input type="text" class="form-control" id="dynamic-mask">
                                    <div class="text-muted">phone or email</div>
                                </div>
                                <div class="mt-4">
                                    <label class="form-label">Mask in mask</label>
                                    <input type="text" class="form-control" id="currency-mask">
                                    <div class="text-muted">currency input</div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </form>
                <!-- end form -->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/libs/imask/imask.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/pages/form-mask.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\morpich\laravl\Dason_Laravel_v1.1.0\Admin\resources\views/form-mask.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Jquery_Knob_Charts'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Charts <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Jquery Knob <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Examples</h4>
                <p class="card-title-desc">Nice, downward compatible, touchable, jQuery dial</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-4 col-sm-6">
                        <div class="text-center" dir="ltr">
                            <h5 class="font-size-14 mb-3">Disable display input</h5>
                            <input class="knob" data-width="150" data-fgcolor="#1c84ee" data-displayinput="false" value="35">
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="text-center" dir="ltr">
                            <h5 class="font-size-14 mb-3">Cursor mode</h5>
                            <input class="knob" data-width="150" data-cursor="true" data-fgcolor="#34c38f" value="29">
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="text-center" dir="ltr">
                            <h5 class="font-size-14 mb-3">Display previous value</h5>
                            <input class="knob" data-width="150" data-min="-100" data-fgcolor="#16daf1" data-displayprevious="true" value="44">
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6">
                        <div class="text-center" dir="ltr">
                            <h5 class="font-size-14 mb-3">Angle offset</h5>
                            <input class="knob" data-width="150" data-angleoffset="90" data-linecap="round" data-fgcolor="#fa5f1c" value="35">
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="text-center" dir="ltr">
                            <h5 class="font-size-14 mb-3"> 5-digit values, step 1000</h5>
                            <input class="knob" data-width="150" data-min="-15000" data-displayprevious="true" data-max="15000" data-step="1000" value="-11000" data-fgcolor="#ffcc5a">
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="text-center" dir="ltr">
                            <h5 class="font-size-14 mb-3">Angle offset and arc</h5>
                            <input class="knob" data-width="150" data-cursor="true" data-fgcolor="#ef6767" value="29">
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6">
                        <div class="text-center" dir="ltr">
                            <h5 class="font-size-14 mb-3">Readonly</h5>
                            <input class="knob" data-width="150" data-height="150" data-linecap=round
                                    data-fgColor="#e83e8c" value="80" data-skin="tron" data-angleOffset="180"
                                    data-readOnly=true data-thickness=".1"/>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="text-center" dir="ltr">
                            <h5 class="font-size-14 mb-3"> Angle offset and arc</h5>
                            <input class="knob" data-width="150" data-height="150"
                            data-displayPrevious=true data-fgColor="#050505" data-skin="tron"
                            data-cursor=true value="75" data-thickness=".2" data-angleOffset=-125
                            data-angleArc=250 value="44"/>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/libs/jquery-knob/jquery-knob.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/pages/jquery-knob.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\morpich\laravl\Dason_Laravel_v1.1.0\Admin\resources\views/charts-knob.blade.php ENDPATH**/ ?>
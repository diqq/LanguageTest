<?php $__env->startSection('content'); ?>
    <div class="flex w-full gap-5 max-md:block">
        <?php echo $__env->make('partials.testTakerProfile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="w-3/5">
            <input type="hidden" value="<?php echo e($category); ?>" id="Category">
            <input type="hidden" value="<?php echo e($toeicOpen->id); ?>" id="Exam-Id">
            <?php echo $__env->make('examTOEIC.partials.listening.partI', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('examTOEIC.partials.listening.partII', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('examTOEIC.partials.listening.partIII', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('examTOEIC.partials.listening.partIV', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('examTOEIC.partials.reading.partV', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('examTOEIC.partials.reading.partVI', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('examTOEIC.partials.reading.partVII', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('examTOEIC.partials.finishPage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('js/examGlobal.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examTOEIC.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.exam', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\zaldy\OneDrive\Documents\All About Widyatama\Semester 7\MBKM\Project\language-test\resources\views/examTOEIC/testTOEIC.blade.php ENDPATH**/ ?>
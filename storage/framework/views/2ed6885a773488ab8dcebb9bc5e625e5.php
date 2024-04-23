<?php $__env->startSection('content'); ?>
    <div class="flex w-full gap-5 max-md:block">
        <?php echo $__env->make('partials.testTakerProfile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="w-3/5">
            <input type="hidden" value="<?php echo e($category); ?>" id="Category">
            <input type="hidden" value="<?php echo e($eptOpen->id); ?>" id="Exam-Id">
            <?php echo $__env->make('examEPT.partials.sectionOne.listeningCompPartA', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('examEPT.partials.sectionOne.listeningCompPartB', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('examEPT.partials.sectionOne.listeningCompPartC', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('examEPT.partials.sectionTwo.structureExpression', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('examEPT.partials.sectionTwo.writtenExpression', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('examEPT.partials.sectionThree.readingComp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('examEPT.partials.finishPage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('js/examEPT.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examGlobal.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.exam', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\zaldy\OneDrive\Documents\All About Widyatama\Semester 7\MBKM\Project\language-test\resources\views/examEPT/testEPT.blade.php ENDPATH**/ ?>

<?php $__env->startSection('content'); ?>
    <div class="w-full flex gap-5 max-md:block">
        <div
            class="mt-5 p-5 w-2/5 h-[425px] max-md:w-full bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 border border-gray-200">
            <div class="border-b-2 border-gray-200">
                <h1 class="pb-2 text-2xl font-semibold dark:text-white">Test Taker Profile</h1>
            </div>
            <div class="mt-5 flex justify-center">
                <img class="w-24 h-24 object-cover rounded-full bg-gray-50" src="<?php echo e(asset('storage/' . $profile->picture)); ?>"
                    alt="profile-picture">
            </div>
            <div class="font-semibold">
                <div class="flex mt-5">
                    <div class="w-1/3">Registrant</div>
                    <div class="w-1/3">:</div>
                    <div class="w-1/2 -ms-32 max-md:-ms-20 font-normal border-b border-gray-200">
                        <?php echo e(ucwords(strtolower($profile->profile->registrant))); ?></div>
                </div>
                <div class="flex mt-5">
                    <div class="w-1/3">Name</div>
                    <div class="w-1/3">:</div>
                    <div class="w-1/2 -ms-32 max-md:-ms-20 font-normal border-b border-gray-200"><?php echo e($profile->name); ?>

                    </div>
                </div>
                <div class="flex mt-5">
                    <div class="w-1/3">NPM</div>
                    <div class="w-1/3">:</div>
                    <div class="w-1/3 -ms-32 max-md:-ms-20 font-normal border-b border-gray-200">
                        <?php echo e($profile->profile->npm); ?></div>
                </div>
                <div class="flex mt-5">
                    <div class="w-1/3">Faculty</div>
                    <div class="w-1/3">:</div>
                    <div class="w-1/3 -ms-32 max-md:-ms-20 font-normal border-b border-gray-200">
                        <?php echo e($profile->profile->faculty); ?></div>
                </div>
                <div class="flex mt-5">
                    <div class="w-1/3">Program Study</div>
                    <div class="w-1/3">:</div>
                    <div class="w-1/3 -ms-32 max-md:-ms-20 font-normal border-b border-gray-200">
                        <?php echo e($profile->profile->program_study); ?></div>
                </div>
            </div>
        </div>

        <div class="w-3/5">
            <?php echo $__env->make('test.partials.sectionOne.listeningCompPartA', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('test.partials.sectionOne.listeningCompPartB', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('test.partials.sectionOne.listeningCompPartC', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('test.partials.sectionTwo.structureExpression', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('test.partials.sectionTwo.writtenExpression', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('test.partials.sectionThree.readingComp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('test.partials.finish', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.exam', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\zaldy\OneDrive\Documents\All About Widyatama\Semester 7\MBKM\Project\language-test\resources\views/test/testEPT.blade.php ENDPATH**/ ?>
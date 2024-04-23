<div id="toeicNav"
    class="w-full p-5 mt-5 bg-white border border-gray-200 rounded-lg shadow max-md:w-full dark:bg-gray-800 dark:border-gray-700">
    <div>
        <h2 class="text-base font-normal">Part I - Listening</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            <?php $__currentLoopData = $enrolls->exam->toeicQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($question->section == 'i'): ?>
                    <button type="button" id="questionNav-<?php echo e($question->id); ?>"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"><?php echo e($countPartI++); ?></button>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="pt-5 mt-5 border-t border-gray-200 dark:border-gray-700">
        <h2 class="text-base font-normal">Part II - Listening</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            <?php $__currentLoopData = $enrolls->exam->toeicQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($question->section == 'ii'): ?>
                    <?php
                        $countPartII++;
                    ?>
                    <button type="button" id="questionNav-<?php echo e($question->id); ?>"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"><?php echo e($countPartII); ?></button>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="pt-5 mt-5 border-t border-gray-200 dark:border-gray-700">
        <h2 class="text-base font-normal">Part III - Listening</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            <?php $__currentLoopData = $enrolls->exam->toeicQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($question->section == 'iii'): ?>
                    <?php
                        $countPartIII++;
                    ?>
                    <button type="button" id="questionNav-<?php echo e($question->id); ?>"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"><?php echo e($countPartIII); ?></button>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="pt-5 mt-5 border-t border-gray-200 dark:border-gray-700">
        <h2 class="text-base font-normal">Part IV - Listening</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            <?php $__currentLoopData = $enrolls->exam->toeicQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($question->section == 'iv'): ?>
                    <?php
                        $countPartIV++;
                    ?>
                    <button type="button" id="questionNav-<?php echo e($question->id); ?>"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"><?php echo e($countPartIV); ?></button>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="pt-5 mt-5 border-t border-gray-200 dark:border-gray-700">
        <h2 class="text-base font-normal">Part V - Reading</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            <?php $__currentLoopData = $enrolls->exam->toeicQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($question->section == 'v'): ?>
                    <?php
                        $countPartV++;
                    ?>
                    <button type="button" id="questionNav-<?php echo e($question->id); ?>"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"><?php echo e($countPartV); ?></button>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="pt-5 mt-5 border-t border-gray-200 dark:border-gray-700">
        <h2 class="text-base font-normal">Part VI - Reading</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            <?php $__currentLoopData = $enrolls->exam->toeicQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($question->section == 'vi'): ?>
                    <?php
                        $countPartVI++;
                    ?>
                    <button type="button" id="questionNav-<?php echo e($question->id); ?>"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"><?php echo e($countPartVI); ?></button>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="pt-5 mt-5 border-t border-gray-200 dark:border-gray-700">
        <h2 class="text-base font-normal">Part VII - Reading</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            <?php $__currentLoopData = $enrolls->exam->toeicQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($question->section == 'vii'): ?>
                    <?php
                        $countPartVII++;
                    ?>
                    <button type="button" id="questionNav-<?php echo e($question->id); ?>"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"><?php echo e($countPartVII); ?></button>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\zaldy\OneDrive\Documents\All About Widyatama\Semester 7\MBKM\Project\language-test\resources\views/examTOEIC/partials/questionNav.blade.php ENDPATH**/ ?>

<div id="toeicPartII"
    class="hidden p-5 mt-5 bg-white border border-gray-200 rounded-lg shadow max-md:w-full max-md:h-full dark:bg-gray-800 dark:border-gray-700">
    <div class="border-b-2 border-gray-200 dark:border-gray-700">
        <h1 class="pb-2 text-2xl font-semibold dark:text-white">PART II - Listening</h1>
    </div>
    
    <div class="mt-5">
        <h2 class="pb-2 text-xl font-medium dark:text-white">Direction of Listening Part II:</h2>
        <div class="p-3 border-2 border-gray-200 rounded-lg dark:border-gray-700">
            <audio controls>
                <?php $__currentLoopData = $enrolls->exam->toeicDirection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($direction->section == 'ii'): ?>
                        <source src="<?php echo e(asset('storage/' . $direction->audio)); ?>">
                        Your browser does not support the audio element.
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </audio>
            <?php $__currentLoopData = $enrolls->exam->toeicDirection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($direction->section == 'ii'): ?>
                    <p class="mt-2"><?php echo e($direction->direction); ?></p>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    
    <div class="mt-3">
        <h2 class="text-xl font-medium text-gray-900 dark:text-white">Question of Listening Part II:</h2>
        <?php $__currentLoopData = $enrolls->exam->toeicQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($question->section == 'ii'): ?>
                <div class="relative p-2 mt-2 border-2 border-gray-200 rounded-lg dark:border-gray-700">
                    <div class="flex gap-5">
                        <div
                            class="flex items-center justify-center w-10 h-10 text-base font-medium text-gray-900 border-2 border-gray-400 rounded-full dark:text-white">
                            <?php
                                $countPartII++;
                            ?>
                            <div><?php echo e($countPartII); ?>.</div>
                        </div>
                        <div>
                            <div class="mt-1.5">
                                <button type="button" id="playQuestionAudio-<?php echo e($question->id); ?>"
                                    onclick="submitQuestionAudio('<?php echo e($question->id); ?>', 'yes')"
                                    class="w-10 h-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 -2 13 21">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M1 1.984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L2.506 1.139A1 1 0 0 0 1 1.984Z" />
                                    </svg>
                                </button>
                                <button type="button" id="pauseQuestionButton-<?php echo e($question->id); ?>" disabled
                                    class="hidden w-10 h-10 text-white bg-gray-400 disabled:cursor-not-allowed focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-full text-sm p-2.5 text-center items-center me-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 -2 11 20">
                                        <path fill-rule="evenodd"
                                            d="M0 .8C0 .358.32 0 .714 0h1.429c.394 0 .714.358.714.8v14.4c0 .442-.32.8-.714.8H.714a.678.678 0 0 1-.505-.234A.851.851 0 0 1 0 15.2V.8Zm7.143 0c0-.442.32-.8.714-.8h1.429c.19 0 .37.084.505.234.134.15.209.354.209.566v14.4c0 .442-.32.8-.714.8H7.857c-.394 0-.714-.358-.714-.8V.8Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <audio id="audioQuestionSource-<?php echo e($question->id); ?>"
                                    src="<?php echo e(asset('storage/' . $question->audio)); ?>"></audio>
                            </div>
                            
                            <form class="mt-3 ms-1">
                                <div class="flex items-center mb-4">
                                    <input id="toeic-answer-<?php echo e($question->id); ?>-a" type="radio" value="a"
                                        name="answer"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        onClick="submitAndUpdate('<?php echo e($question->id); ?>', 'a')">
                                    <label for="toeic-answer-<?php echo e($question->id); ?>-a"
                                        class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300"><?php echo e($question->answer_a); ?></label>
                                </div>
                                <div class="flex items-center mb-4">
                                    <input id="toeic-answer-<?php echo e($question->id); ?>-b" type="radio" value="b"
                                        name="answer"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        onClick="submitAndUpdate('<?php echo e($question->id); ?>', 'b')">
                                    <label for="toeic-answer-<?php echo e($question->id); ?>-b"
                                        class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300"><?php echo e($question->answer_b); ?></label>
                                </div>
                                <div class="flex items-center mb-1">
                                    <input id="toeic-answer-<?php echo e($question->id); ?>-c" type="radio" value="c"
                                        name="answer"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        onClick="submitAndUpdate('<?php echo e($question->id); ?>', 'c')">
                                    <label for="toeic-answer-<?php echo e($question->id); ?>-c"
                                        class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300"><?php echo e($question->answer_c); ?></label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <div class="flex items-center justify-between pt-3 mt-5 border-t-2 border-gray-200 dark:border-gray-700">
        <button type="button" onclick="backToPartI()"
            class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Prev</button>
        <button type="button" onclick="nextToPartIII()"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Next</button>
    </div>
</div>
<?php /**PATH C:\Users\zaldy\OneDrive\Documents\All About Widyatama\Semester 7\MBKM\Project\language-test\resources\views/examTOEIC/partials/listening/partII.blade.php ENDPATH**/ ?>
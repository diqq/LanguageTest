
<div class="mt-5">
    <h2 class="text-xl font-medium dark:text-white">Direction of Written Expression:</h2>
    <?php if($directions_written): ?>
        <?php if($directions_a->audio): ?>
            <audio class="mt-2 mb-2" controls>
                <source src="<?php echo e(asset('storage/' . $directions_a->audio)); ?>">
                Your browser does not support the audio element.
            </audio>
        <?php endif; ?>
        <p class="text-base text-gray-900 dark:text-white"><?php echo e($directions_written->direction); ?></p>
    <?php else: ?>
        <div class="mt-2 p-2 border-2 rounded-lg">
            No direction of this structure expression has been created.
        </div>
    <?php endif; ?>
</div>
<div class="mt-3">
    <div class="flex items-center">
        <h2 class="text-xl font-medium dark:text-white">Question of Written Expression:</h2>
        <span
            class="inline-flex items-center justify-center w-6 h-6 ms-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
            <?php echo e($questions_written->count()); ?>

        </span>
    </div>
    <?php if($questions_written): ?>
        <?php $__currentLoopData = $questions_written; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mt-2 p-2 border-2 rounded-lg relative">
                <div class="flex gap-5">
                    <div
                        class="w-10 h-10 flex items-center justify-center border-2 border-gray-400 rounded-full font-medium text-base">
                        <div><?php echo e($loop->iteration); ?>.</div>
                    </div>
                    <div>
                        <div class="mt-1.5">
                            <?php if(str_contains($question->question, 'question/')): ?>
                                <audio class="-mt-1.5" controls>
                                    <source src="<?php echo e(asset('storage/' . $question->question)); ?>">
                                    Your browser does not support the audio element.
                                </audio>
                            <?php else: ?>
                                <p class="text-base text-gray-900 dark:text-white">
                                    <?php echo e($question->question); ?>

                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="mt-3 ms-1">
                            <div class="flex items-center mb-4">
                                <input id="radio-a" type="radio" disabled
                                    <?php echo e($question->correct_answer == 'a' ? 'checked' : ''); ?>

                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="radio-a"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo e($question->answer_a); ?></label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="radio-b" type="radio" disabled
                                    <?php echo e($question->correct_answer == 'b' ? 'checked' : ''); ?>

                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="radio-b"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo e($question->answer_b); ?></label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="radio-c" type="radio" disabled
                                    <?php echo e($question->correct_answer == 'c' ? 'checked' : ''); ?>

                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="radio-c"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo e($question->answer_c); ?></label>
                            </div>
                            <div class="flex items-center">
                                <input id="radio-d" type="radio" disabled
                                    <?php echo e($question->correct_answer == 'd' ? 'checked' : ''); ?>

                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="radio-d"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo e($question->answer_d); ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="absolute top-3 right-3">
                        <button type="button" data-modal-target="delete-exam-<?php echo e($question->id); ?>"
                            data-modal-toggle="delete-exam-<?php echo e($question->id); ?>"
                            data-bs-target="#delete-exam-<?php echo e($question->id); ?>"
                            class="text-white bg-white px-2 py-2 text-sm hover:bg-red-100 border border-red-200 focus:ring-4 focus:outline-none focus:ring-red-100 font-medium rounded-lg text-center inline-flex items-center dark:focus:ring-red-600 dark:bg-red-800 dark:border-red-700 dark:text-white dark:hover:bg-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-red-700 text-white"
                                viewBox="0 0 24 24">
                                <path
                                    d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
                                </path>
                                <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                            </svg>
                        </button>
                        <a href=""
                            class="text-white bg-white px-2 py-2 text-xs hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-blue-700 text-white"
                                viewBox="0 0 24 24">
                                <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z">
                                </path>
                                <path
                                    d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z">
                                </path>
                            </svg>
                        </a>
                        
                        <div id="delete-exam-<?php echo e($question->id); ?>" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="delete-exam-<?php echo e($question->id); ?>">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h3 class="text-lg font-semibold text-gray-500 dark:text-gray-400">
                                            Are you
                                            sure want to delete this Question?</h3>
                                        <div class="mt-1 mb-5">
                                            <p class=" font-normal leading-relaxed text-gray-500 dark:text-gray-400">
                                                This action is irreversible and will lead to the removal of
                                                Question forever from the system.
                                            </p>
                                        </div>
                                        <form class=" flex justify-center"
                                            action="admin/dashboard/exam/question/<?php echo e($question->id); ?>" method="POST">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <button data-modal-hide="delete-exam-<?php echo e($question->id); ?>" type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="delete-exam-<?php echo e($question->id); ?>" type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <div class="mt-2 p-2 border-2 rounded-lg">
            No question of structure expression has been created.
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\zaldy\OneDrive\Documents\All About Widyatama\Semester 7\MBKM\Project\language-test\resources\views/admin/exam/secondSection/written.blade.php ENDPATH**/ ?>
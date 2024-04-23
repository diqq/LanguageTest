<?php $__env->startSection('content'); ?>
    <form action="/dashboard/waiting-area/schedule" method="POST">
        <?php echo csrf_field(); ?>
        <div class="flex w-full gap-5 max-md:block">
            <?php echo $__env->make('partials.testTakerProfile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div
                class="w-3/5 p-5 mt-5 bg-white border border-gray-200 rounded-lg shadow h-1/2 max-md:w-full max-md:h-full dark:bg-gray-800 dark:border-gray-700">
                <div class="border-b-2 border-gray-200 dark:border-gray-700">
                    <h1 class="pb-2 text-2xl font-semibold dark:text-white">Select Schedule of the
                        <?php echo e(strtoupper($exams->category)); ?> Test</h1>
                </div>
                <input type="hidden" value="<?php echo e($exams->category); ?>" name="for">
                <input type="hidden" value="<?php echo e($exams->code); ?>" name="exam_code">
                <div class="mt-5">
                    <select id="date" name="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Select Date</option>
                        <option value="0">
                            <?php echo e(\Carbon\Carbon::parse($exams->first_date)->translatedFormat('j F Y')); ?></option>
                        <option value="1">
                            <?php echo e(\Carbon\Carbon::parse($exams->second_date)->translatedFormat('j F Y')); ?></option>
                        <option value="2">
                            <?php echo e(\Carbon\Carbon::parse($exams->third_date)->translatedFormat('j F Y')); ?></option>
                    </select>
                </div>
                <div class="mt-5">
                    <select id="time" name="time"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Select Time</option>
                        <option value="0"><?php echo e($exams->first_time); ?> WIB</option>
                        <option value="1"><?php echo e($exams->second_time); ?> WIB</option>
                        <option value="2"><?php echo e($exams->third_time); ?> WIB</option>
                    </select>
                </div>
                <div class="flex items-center mt-5 border-gray-200 rounded-b dark:border-gray-600">
                    <a href="/dashboard" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Back</a>
                    <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                        class="ms-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                </div>
            </div>
        </div>
        
        <div id="popup-modal" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full p-4">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 text-center md:p-5">
                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                            choose this exam schedule?</h3>
                        <button data-modal-hide="popup-modal" type="submit"
                            class="text-white bg-blue-700  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="popup-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                            cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php if(session()->has('success')): ?>
        <div class="fixed bottom-0 z-10 w-full max-w-xs right-5">
            <?php echo $__env->make('notifications.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php elseif(session()->has('failed')): ?>
        <div class="fixed bottom-0 z-10 w-full max-w-xs right-5">
            <?php echo $__env->make('notifications.failed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.userDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\zaldy\OneDrive\Documents\All About Widyatama\Semester 7\MBKM\Project\language-test\resources\views/user/exam/examSchedule.blade.php ENDPATH**/ ?>
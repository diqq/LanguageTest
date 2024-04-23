<?php $__env->startSection('content'); ?>
    <form action="" method="">
        <?php echo csrf_field(); ?>
        <div class="w-full flex gap-5 max-md:block">
            <?php echo $__env->make('partials.testTakerProfile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div
                class="mt-5 p-5 w-3/5 h-1/2 max-md:w-full max-md:h-full bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 border border-gray-200">
                <div class="border-b-2 border-gray-200">
                    <h1 class="pb-2 text-2xl font-semibold dark:text-white">Select Schedule of the Test</h1>
                </div>
                <div class="mt-5">
                    <select id="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Select Date</option>
                        <option value="">Tuesday, 21 November 2023</option>
                        <option value="">Thursday, 23 November 2023</option>
                        <option value="">Saturday, 25 November 2023</option>
                    </select>
                </div>
                <div class="mt-5">
                    <select id="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Select Time</option>
                        <option value="">10:00 WIB</option>
                        <option value="">13:00 WIB</option>
                    </select>
                </div>
                <div class="flex mt-5 items-center border-gray-200 rounded-b dark:border-gray-600">
                    <a href="<?php echo e(URL::previous()); ?>" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Back</a>
                    <button type="button"
                        class="ms-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.userDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\zaldy\OneDrive\Documents\All About Widyatama\Semester 7\MBKM\Project\language-test\resources\views/pages/waitingArea/jadwal/jadwalTOEIC.blade.php ENDPATH**/ ?>
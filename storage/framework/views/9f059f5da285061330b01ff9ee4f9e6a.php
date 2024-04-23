<?php $__env->startSection('content'); ?>
    <form action="" method="">
        <?php echo csrf_field(); ?>
        <div class="w-full flex gap-5 max-md:block">
            <div
                class="mt-5 p-5 w-2/5 max-md:w-full bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 border border-gray-200">
                <div class="border-b-2 border-gray-200">
                    <h1 class="pb-2 text-2xl font-semibold dark:text-white">Test Taker Profile</h1>
                </div>
                <div class="mt-5 flex justify-center">
                    <img class="w-24 h-24 object-cover rounded-full bg-gray-50"
                        src="<?php echo e(asset('storage/' . $profile->picture)); ?>" alt="profile-picture">
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
                <div class="flex items-center p-4 mt-5 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Warning!</span> Make sure your profile above is correct.
                    </div>
                </div>
            </div>
            <div
                class="mt-7 p-5 w-3/5 h-1/2 max-md:w-full max-md:h-full bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 border border-gray-200">
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
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    <a href="<?php echo e(URL::previous()); ?>" type="button"
                        class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Back</a>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.userDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\zaldy\OneDrive\Documents\All About Widyatama\Semester 7\MBKM\Project\language-test\resources\views/pages/waiting-area-jadwal.blade.php ENDPATH**/ ?>
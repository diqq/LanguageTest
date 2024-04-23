<?php $__env->startSection('content'); ?>
    <div class="p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="border-b-2 border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between my-2">
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">TOEIC Reporting</h1>
                <form action="/admin/dashboard/toeic/reporting/filter" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="flex items-center gap-3">
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker type="text" name="start_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select start date">
                        </div>
                        <span class="text-gray-900 dark:text-white">-</span>
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker type="text" name="end_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select end date">
                        </div>
                        <button type="submit"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Filter</button>
                    </div>
                </form>
            </div>
        </div>
        <section class="mt-5">
            <table id="reporting" class="w-full text-sm text-left text-gray-500 display dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Listening Score
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Reading Score
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Score
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Exam Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $toeicScores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toeicScore): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo e($loop->iteration); ?>

                            </th>
                            <td scope="row" class="px-6 py-4">
                                <?php echo e($toeicScore->user->name); ?>

                            </td>
                            <td scope="row" class="px-6 py-4">
                                <?php echo e($toeicScore->score_listening); ?>

                            </td>
                            <td scope="row" class="px-6 py-4">
                                <?php echo e($toeicScore->score_reading); ?>

                            </td>
                            <td scope="row" class="px-6 py-4">
                                <?php echo e($toeicScore->score_total); ?>

                            </td>
                            <td scope="row" class="px-6 py-4">
                                <?php echo e(\Carbon\Carbon::parse($toeicScore->created_at)->translatedFormat('j F Y')); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('js/adminGlobal.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.adminDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\MBKM\language-test\resources\views/admin/reporting/toeicReporting.blade.php ENDPATH**/ ?>
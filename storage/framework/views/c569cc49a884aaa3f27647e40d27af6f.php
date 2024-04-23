<?php $__env->startSection('content'); ?>
    <div class="p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="border-b-2 border-gray-200 dark:border-gray-700">
            <h1 class="pb-2 text-2xl font-semibold dark:text-white">EPT History</h1>
        </div>
        <section class="mt-5">
            <table id="myTable" class="w-full text-sm text-left text-gray-500 display dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                No
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                First Section Score
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Second Section Score
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Third Section Score
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Score Total
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Date of Test
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Action
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($eptHistories->isNotEmpty()): ?>
                        <?php $__currentLoopData = $eptHistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eptHistory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo e($loop->iteration); ?>

                                </th>
                                <td class="px-6 py-4">
                                    <?php echo e($eptHistory->score_first_section); ?>

                                </td>
                                <td class="px-6 py-4">
                                    <?php echo e($eptHistory->score_second_section); ?>

                                </td>
                                <td class="px-6 py-4">
                                    <?php echo e($eptHistory->score_third_section); ?>

                                </td>
                                <td class="px-6 py-4">
                                    <?php echo e($eptHistory->score_total); ?>

                                </td>
                                <td class="px-6 py-4">
                                    <?php echo e($eptHistory->created_at->format('Y-m-d')); ?>

                                </td>
                                <td>
                                    <form action="/dashboard/generate/certificate" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" value="<?php echo e($eptHistory->score_code); ?>" name="score_code">
                                        <input type="hidden" value="ept" name="category">
                                        <button type="submit"
                                            class="inline-flex items-center p-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                                    d="M16.4 18H19c.6 0 1-.4 1-1v-5c0-.6-.4-1-1-1H5a1 1 0 0 0-1 1v5c0 .6.4 1 1 1h2.6m9.4-7V5c0-.6-.4-1-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4c0 .6-.4 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            $("#myTable").DataTable();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.userDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\zaldy\OneDrive\Documents\All About Widyatama\Semester 7\MBKM\Project\language-test\resources\views/user/testHistoryEPT.blade.php ENDPATH**/ ?>
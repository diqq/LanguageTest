<?php $__env->startSection('content'); ?>
    <div class="p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="border-b-2 border-gray-200 dark:border-gray-700">
            <h1 class="pb-2 text-2xl font-semibold dark:text-white">My Purchase</h1>
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
                                Order ID
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Product
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Usage
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Status
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo e($loop->iteration); ?>

                            </th>
                            <td class="px-6 py-4">
                                <?php echo e($payment->order_id); ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php echo e(strtoupper($payment->for)); ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php if($payment->used == 'no'): ?>
                                    Allowed
                                <?php else: ?>
                                    Not allowed
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo e(ucfirst($payment->status_pay)); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('layouts.userDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\zaldy\OneDrive\Documents\All About Widyatama\Semester 7\MBKM\Project\language-test\resources\views/user/purchase.blade.php ENDPATH**/ ?>

<?php $__env->startSection('content'); ?>
    <form action="/admin/dashboard/exam/toeic/direction/<?php echo e($direction->id); ?>" method="POST" enctype="multipart/form-data">
        <?php echo method_field('put'); ?>
        <?php echo csrf_field(); ?>
        <div class="flex items-center justify-center">
            <div
                class="w-full max-w-screen-lg p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="border-b-2 border-gray-200 dark:border-gray-700">
                    <h1 class="pb-1 text-2xl font-semibold dark:text-white">TOEIC Update Direction
                        <?php echo e(ucwords($direction->section)); ?></h1>
                </div>
                <div class="mt-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Audio
                        Direction (Optional)</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" type="file" name="audio" accept="audio/*">
                    <div>
                        <?php if($direction->audio): ?>
                            <div class="flex gap-1 mt-2 text-sm text-gray-900 dark:text-white">Stored Audio:
                                <div class="text-sm text-blue-800"><?php echo e($direction->audio); ?></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mt-5">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Text
                        Direction</label>
                    <textarea id="message" rows="4" name="direction" required
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write direction here ..."><?php echo e($direction->direction); ?></textarea>
                </div>
                <div class="pb-5 mt-5 border-b-2 border-gray-200 dark:border-gray-700">
                    <label for="select-section" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                        Section</label>
                    <select id="select-section" name="section" disabled required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Select section</option>
                        <option value="i" <?php echo e($direction->section == 'i' ? 'selected' : ''); ?>>Part I</option>
                        <option value="ii" <?php echo e($direction->section == 'ii' ? 'selected' : ''); ?>>Part II</option>
                        <option value="iii" <?php echo e($direction->section == 'iii' ? 'selected' : ''); ?>>Part III</option>
                        <option value="iv" <?php echo e($direction->section == 'iv' ? 'selected' : ''); ?>>Part IV</option>
                        <option value="v" <?php echo e($direction->section == 'v' ? 'selected' : ''); ?>>Part V</option>
                        <option value="vi" <?php echo e($direction->section == 'vi' ? 'selected' : ''); ?>>Part VI</option>
                        <option value="vii" <?php echo e($direction->section == 'vii' ? 'selected' : ''); ?>>Part VII</option>
                    </select>
                </div>
                <div class="flex items-center mt-5 rounded-b dark:border-gray-600">
                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    <a href="<?php echo e(url('/admin/dashboard/exam/' . session('id')) . '/edit'); ?>"
                        class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Back</a>
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
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 text-center md:p-5">
                                <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want
                                    to upload this Direction?</h3>
                                <button data-modal-hide="popup-modal" type="submit"
                                    class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                    Yes, I'm sure
                                </button>
                                <button data-modal-hide="popup-modal" type="button"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                    cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\zaldy\OneDrive\Documents\All About Widyatama\Semester 7\MBKM\Project\language-test\resources\views/admin/exam/toeic/updateDirection.blade.php ENDPATH**/ ?>

<div
    class="mt-5 p-5  max-md:w-full max-md:h-full bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 border border-gray-200">
    <div class="border-b-2 border-gray-200">
        <h1 class="pb-2 text-2xl font-semibold dark:text-white">SECTION TWO - Written Expression</h1>
    </div>

    
    <div class="mt-5">
        <h2 class="pb-2 text-xl font-medium dark:text-white">Direction of Written Expression:</h2>
        <div class="border-2 rounded-lg p-3">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin convallis nibh mi,
                et tincidunt purus elementum sed. Vivamus ultricies velit a nulla varius, nec tempor urna
                efficitur. Vestibulum et libero non mauris commodo tincidunt. Vestibulum eu ligula nec erat
                dapibus ornare. Suspendisse potenti. In sit amet lobortis felis, eu ultrices nunc. Cras iaculis
                aliquam arcu at iaculis. Nam finibus nisi id tellus posuere tempor. Etiam a rutrum nisi, vitae
                sagittis mauris. Duis ac arcu ut turpis egestas dignissim eu in quam. Curabitur convallis felis
                quis tempus condimentum. Nam et ligula ex. Cras dignissim massa vitae mauris luctus convallis.
            </p>
        </div>
    </div>

    
    <div class="mt-5">
        <h2 class="pb-2 text-xl font-medium dark:text-white">Question List of Written Expression:</h2>
        <?php for($i = 0; $i < 2; $i++): ?>
            <div class="border-2 rounded-lg p-3 mb-3">
                <div class="flex gap-5">
                    <div
                        class="w-10 h-10 flex items-center justify-center border-2 border-gray-400 rounded-full font-medium text-base">
                        <div><?php echo e($i + 1); ?>.</div>
                    </div>
                    <div>
                        <p class="mt-2">Question _____ goes here.</p>
                        <div class="mt-5">
                            <div class="flex items-center mb-4">
                                <input id="default-radio-1" type="radio" value="" name="default-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-1"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Answer
                                    A</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="default-radio-1" type="radio" value="" name="default-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-1"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Answer
                                    B</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="default-radio-1" type="radio" value="" name="default-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-1"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Answer
                                    C</label>
                            </div>
                            <div class="flex items-center">
                                <input id="default-radio-1" type="radio" value="" name="default-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-1"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Answer
                                    D</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>

    
    <div class="flex mt-5 justify-between items-center border-t-2 pt-3 dark:border-gray-600">
        <button type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Prev</button>
        <button type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Next</button>
    </div>
</div>
<?php /**PATH C:\Users\zaldy\OneDrive\Documents\All About Widyatama\Semester 7\MBKM\Project\language-test\resources\views/test/partials/sectionTwo/writtenExpression.blade.php ENDPATH**/ ?>
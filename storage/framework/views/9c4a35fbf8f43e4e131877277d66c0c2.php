<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?php echo e(asset('css/global.css')); ?>" />
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <?php echo $__env->yieldPushContent('style'); ?>

    <title>Test Page</title>
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <?php echo $__env->make('partials.testNavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="max-w-7xl mx-auto max-md:px-2">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('script'); ?>
</body>

</html>
<?php /**PATH C:\Users\zaldy\OneDrive\Documents\All About Widyatama\Semester 7\MBKM\Project\language-test\resources\views/layouts/test.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/global.css')); ?>" />

    
    <link rel="stylesheet" href="<?php echo e(asset('css/dataTables.css')); ?>" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

    <title><?php echo e($title); ?> | Widyamata Language Institute</title>
</head>

<body id="top" class="bg-gray-50 dark:bg-gray-900"">
    <?php echo $__env->make('partials.publicNavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="mx-auto max-w-7xl max-md:px-2 pt-28">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('js/public.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('script'); ?>
</body>

</html>
<?php /**PATH C:\Users\zaldy\OneDrive\Documents\All About Widyatama\Semester 7\MBKM\Project\language-test\resources\views/layouts/public.blade.php ENDPATH**/ ?>
<?php $__env->startSection('head-meta'); ?>
<title><?php echo e($album[0]->judul); ?></title>
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(url('public/images/fav.png')); ?>">
<meta property="og:url" content="<?php echo e($urlLink); ?>" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo e($album[0]->judul); ?>" />
<meta property="og:description" content="<?php echo e($description); ?>" />
<meta property="og:image" content="<?php echo e($gambarLink); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<album-Detail :id="<?php echo e($id); ?>"></album-Detail>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\inilahkepri_web\resources\views/album/detail.blade.php ENDPATH**/ ?>
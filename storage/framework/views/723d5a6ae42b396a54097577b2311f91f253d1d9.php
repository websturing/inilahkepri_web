<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <div id="app">
            <router-view :key="$route.fullPath"></router-view>
        </div>
        <script src="<?php echo e(url('public/js/app.js')); ?>"></script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\inilahkepri_web\resources\views/welcome.blade.php ENDPATH**/ ?>
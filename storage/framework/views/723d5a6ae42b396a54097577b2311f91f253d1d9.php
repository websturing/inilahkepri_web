<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inilahkperi.id - Disini Kami Berbagi</title>
        <link rel="icon" href="<?php echo e(url('public/images/fav.png')); ?>" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="<?php echo e(url('public/pure/css/build/pure-min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(url('public/pure/css/build/grids-responsive-old-ie-min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(url('public/pure/css/build/grids-responsive-min.css')); ?>">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

            <link rel="stylesheet" href="<?php echo e(url('public/pure/css/layouts/marketing-old-ie.css')); ?>">
            <link rel="stylesheet" href="<?php echo e(url('public/pure/css/layouts/marketing.css')); ?>">
            <link rel="stylesheet" href="<?php echo e(url('public/pure/css/layouts/style.css')); ?>">

    </head>
    <body>
        
       
        <div class="header">
            <div class="pure-menu pure-menu-horizontal pure-menu-fixed ikMenu">
                <div class="ik-container">
                    <div class="headlineLeft">
                        <a class="pure-menu-heading" href="">
                            <img src="<?php echo e(url('public/images/logo1.png')); ?>" class="headerLogo">
                        </a>
                    </div>
                    <div class="headlineRight">
                    <ul class="">
                        <li class="pure-menu-item pure-menu-selected"><a href="#" class="pure-menu-link">Beranda</a></li>
                        <li class="pure-menu-item"><a href="#" class="pure-menu-link">Inilah Channel</a></li>
                        <li class="pure-menu-item"><a href="#" class="pure-menu-link">Inilah News</a></li>
                        <li class="pure-menu-item"><a href="#" class="pure-menu-link">Inilah Parlemen</a></li>
                    </ul>
                    </div>
                    <div class="clearer"></div>
                </div>
            </div>
        </div>
        <br/><br/><br/><br/>
        <section class="headline-content ik-sideStrip">
            <div class="ik-container">
                <div class="headlineLeft">
                    <div class="padd-10">
                        <span class="ik-date-p">22 April 2020</span>
                        <h1>Paket Sembako Murah Untuk 
                            Masyarakat Tanjungpinang 
                            Terdampak Wabah Corona Diluncurkan
                        </h1>
                        <p>
                            INILAHKEPRI, TANJUNGPINANG - Pemerintah Kota Tanjungpinang meluncurkan paket sembako
                            murah untuk masyarakat yang terdampak  wabah pandemi virus Corona (Covid-19). 
                            Paket sembako murah dibandrol dengan harga  Rp40 ribu, masyarakat Tanjungpinang dapat
                            membawa pulang beras, gula pasir, tepung terigu, minyak goreng, mie instan dan telur.    
                        <p>
                        <span class="ik-date-p text-right">Baca Selengkapnya <i class="fa fa-arrow-right"></i></span>
                    </div>
                </div>
                <div class="headlineRight">
                    <div class="padd-10 ik-sideStrip-headline">
                        <img src="<?php echo e(url('public/images/head.jpg')); ?>" class="ik-headline-img">
                    </div>
                </div>
                <div class="clearer"></div>


                <div class="newTranding">
                    <div class="panel">
                        <img src="<?php echo e(url('public/images/head.jpg')); ?>" class="ik-headline-img">
                        <p>Paket Sembako Murah Untuk Masyarakat Tanjungpinang Terdampak Wabah Corona Diluncurkan</p>
                        <span class="time">20 April 2020, 13 jam lalu</span>
                    </div>
                    <div class="panel">
                        <img src="<?php echo e(url('public/images/head.jpg')); ?>" class="ik-headline-img">
                        <p>Paket Sembako Murah Untuk Masyarakat Tanjungpinang Terdampak Wabah Corona Diluncurkan</p>
                        <span class="time">20 April 2020, 13 jam lalu</span>
                    </div>
                    <div class="panel">
                        <img src="<?php echo e(url('public/images/head.jpg')); ?>" class="ik-headline-img">
                        <p>Paket Sembako Murah Untuk Masyarakat Tanjungpinang Terdampak Wabah Corona Diluncurkan</p>
                        <span class="time">20 April 2020, 13 jam lalu</span>
                    </div>
                    <div class="panel">
                        <img src="<?php echo e(url('public/images/head.jpg')); ?>" class="ik-headline-img">
                        <p>Paket Sembako Murah Untuk Masyarakat Tanjungpinang Terdampak Wabah Corona Diluncurkan</p>
                        <span class="time">20 April 2020, 13 jam lalu</span>
                    </div>
                </div>
                <div class="clearer"></div>
            </div>
        </section>
        <div id="app">
            <router-view :key="$route.fullPath"></router-view>
        </div>
        <script src="<?php echo e(url('public/js/app.js')); ?>"></script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\inilahkepri_web\resources\views/welcome.blade.php ENDPATH**/ ?>
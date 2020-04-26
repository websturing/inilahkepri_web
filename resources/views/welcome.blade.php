<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inilahkperi.id - Disini Kami Berbagi</title>
        <link rel="icon" href="{{url('public/images/fav.png')}}" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="{{url('public/pure/css/build/pure-min.css')}}">
        <link rel="stylesheet" href="{{url('public/pure/css/build/grids-responsive-old-ie-min.css')}}">
        <link rel="stylesheet" href="{{url('public/pure/css/build/grids-responsive-min.css')}}">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

            <link rel="stylesheet" href="{{url('public/pure/css/layouts/marketing-old-ie.css')}}">
            <link rel="stylesheet" href="{{url('public/pure/css/layouts/marketing.css')}}">
            <link rel="stylesheet" href="{{url('public/pure/css/layouts/style.css')}}">

    </head>
    <body>
        
       
        <div class="header">
            <div class="pure-menu pure-menu-horizontal pure-menu-fixed ikMenu">
                <div class="ik-container">
                    <div class="headlineLeft">
                        <a class="pure-menu-heading" href="">
                            <img src="{{url('public/images/logo1.png')}}" class="headerLogo">
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
        <div id="app">
            <router-view :key="$route.fullPath"></router-view>
        </div>
        <script src="{{url('public/js/app.js')}}"></script>
    </body>
</html>

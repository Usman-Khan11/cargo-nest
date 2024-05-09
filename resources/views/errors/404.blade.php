<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>404 not found</title>
    <link href="{{ asset('frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/arbiii.png')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    @stack('style')
    <!-- Google tag (gtag.js) google analytics-->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-RK5M6LQ99Y"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-RK5M6LQ99Y');
            </script>
    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MQVZ2G6W"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '346912537900259');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=346912537900259&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
    <style>
        .error {
            width: 100%;
            height: 100%;
        }
        .error img {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body class="boxed_wrapper">
    <!--<div class="preloader">-->
    <!--    <img src="{{ asset('frontend/images/123.gif')}}" alt="">-->
    <!--</div>-->
    <!--<div class="theBall-outer">-->
    <!--    <div class="theBall"></div>-->
    <!--</div>-->
    <!--<canvas class="banner_canvas" id="canvas_banner"></canvas>-->
    <!--<div class="top-title" onmousemove="color_hover(event)">-->
        <div class="error">
            <img src="{{ asset('frontend/images/404-error.jpg')}}" alt="" loading="lazy">
        </div>
    <!--</div>-->
    <script src="{{ asset('frontend/js/jquery-2.1.4.js')}}"></script>
    <script src="{{ asset('frontend/js/script.js')}}"></script>
</body>
</html>
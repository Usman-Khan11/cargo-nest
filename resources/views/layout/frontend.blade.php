<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$seo_title}}</title>
    <meta name="description" content="{{$seo_desc}}">
    <meta name="keywords" content="{{$seo_keywords}}">
    @stack('style')
</head>

 <body>
    <div>
        @yield('content')
    </div>
    
    @stack('script')
</body>
</html>
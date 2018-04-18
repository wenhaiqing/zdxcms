<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'zdxcms') }}</title>
    <link href="{{asset('wap/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('wap/bootstrap/css/aui.css')}}" rel="stylesheet">
    <!-- Styles -->
    @yield('css')
</head>
<body>


    @yield('content')

<!-- Scripts -->
@yield('js')
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CuentasClaras</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
@include('layouts.includes.css')
<!-- Favicon-->
    <link rel="shortcut icon" href="{{  URL::to('img/favicon.png') }}">
</head>
<body>
<div class="page home-page">
    @include('layouts.includes.header')
    <div class="page-content d-flex align-items-stretch">
        @include('layouts.includes.menu')
        <div class="content-inner">
            @yield('main')
            @include('layouts.includes.footer')
        </div>
    </div>
</div>
<!-- Javascript files-->
@include('layouts.includes.js')
@include('layouts.includes.mensajes')
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">

    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
</head>
<body>
<div class="container-fluid py-4">
    @if (Route::has('login'))
        <div>
            @auth
                <a href="{{ url('/home') }}">
                    <i class="fa fa-home fa-2x"></i>
                    الرئيسية
                </a>
            @else
                <a class="primary-btn transition" data-text="تسجيل الدخول" href="{{ route('login') }}">
                    <span>تسجيل الدخول</span>
                </a>

            @endauth
        </div>
    @endif
</div>
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-lg-12">
            <h1 class="text-center text-uppercase">
                مرحبا بكم في لوحة التحكم :)
            </h1>
        </div>
    </div>
</div>
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <!-- Styles -->
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages/login/classic/login-5.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="d-flex flex-column flex-root">
        <div class="login login-5 login-signin-on d-flex flex-row-fluid">
            <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid"
                style="background-image: url(/assets/media/bg/bg-2.jpg);">
                <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                    <div class="d-flex flex-center mb-15">
                        <a href="/">
                            <img src="{{ asset('assets/media/logos/logo-letter-13.png') }}" class="max-h-75px"
                                alt="" />
                        </a>
                    </div>
                    <div class="login-signin">
                        @yield('main')
                        <div class="mt-10">
                            <span class="opacity-40 mr-4">Am'u Distribuciones S.A | © Copyright 2021</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

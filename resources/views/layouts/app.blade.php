<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('storage/img/favicon.ico') }}" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Styles -->
    @include('theme.styles')
</head>

<body>
    @include('theme.header')
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        @include('theme.sidebar')
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">
                    @yield('content')
                </div>
            </div>
            @include('theme.footer')
        </div>

    </div>
    @include('theme.scripts')

    {{--  @yield('scripts')  --}}
</body>

</html>

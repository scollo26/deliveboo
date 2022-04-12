<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="my-bg vh-100">
        <div class="home">
            <a href="/" class="btn btn-light">Homepage</a>
        </div>
        <main>
            @yield('content')
        </main>
        
        </div>    
    </div>
</body>

</html>
<style>
    .my-bg {
        background-image: url("{{ asset('/images/cover4.jpg') }}");
        background-size: 100%;
        background-position: center;
        background-repeat: no-repeat;
    }
    .home{
        position: absolute;
        top: 20;
        left: 30;
    }
</style>
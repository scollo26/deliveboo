<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}"></script>

    {{-- script per provare gli errors senza bestemmiations
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto">

                    </ul>


                    <ul class="navbar-nav ml-auto">

                        @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
    @endif
@else
    <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                                                 document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>

                                </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav> -->

        <div class="row m-0">
            <div class="col-2 p-0 vh-100">
                <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark h-100">
                    <a href="/"
                        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-4">Admin Panel</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="{{ route('admin.home') }}"
                                class="nav-link text-white {{ 'admin.home' === Route::currentRouteName() ? 'active' : '' }}"
                                aria-current="page">
                                <i class="fa-solid fa-house"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.plates.index') }}"
                                class="nav-link text-white {{ 'admin.plates.index' === Route::currentRouteName() ? 'active' : '' }}">
                                <i class="fa-solid fa-pizza-slice"></i>
                                Plates
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.orders.index') }}"
                                class="nav-link text-white {{ 'admin.orders.index' === Route::currentRouteName() ? 'active' : '' }}">
                                <i class="fa-solid fa-sack-dollar"></i>
                                Orders
                            </a>
                        </li>

                        <!-- Rotte future  -->

                        <li>
                            <a href="{{ route('admin.users.show', Auth::user()->slug) }}" class="nav-link text-white">
                                <i class="fa-solid fa-id-card"></i>
                                Preview Profile
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <i class="fa-solid fa-chart-line"></i>
                                Statistics
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::user()->logo_img }}" alt="" width="32" height="32"
                                class="rounded-circle me-2">
                            <strong>{{ Auth::user()->name }}</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item"
                                    href="{{ route('admin.users.edit', Auth::user()->slug) }}">Edit profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-10 p-0 my-overflow">
                <header class="p-3 bg-dark text-white">
                    <div class="container">
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <!-- Bottone per entrare nella vue  -->


                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div>
                                <strong>&nbsp; {{ Auth::user()->name }} &nbsp;</strong>
                                <span>{{ __(' welcome to control panel') }}</span>
                            </div>

                            <div>
                                <a href="/"
                                    class="d-flex text-left align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                                    Visualizza come ospite
                                </a>
                            </div>
                        </div>
                    </div>
                </header>
                <main class="over auto">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

</body>

</html>

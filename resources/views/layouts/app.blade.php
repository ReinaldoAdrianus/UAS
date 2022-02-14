<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-app-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold fs-2" href="{{ url('/') }}">
                    {{ config('app.name', 'Amazing E-Book') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-warning text-dark me-3" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                </li>
                            @endif

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-warning text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">

                                <!-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"> -->
                                    <a class="btn btn-warning" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                <!-- </div> -->
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @auth
            <nav class="navbar navbar-expand-md navbar-light bg-warning shadow-sm">
                <div class="d-flex flex-row navbar-nav mx-auto">
                    <li class="nav-item mx-4">
                        <a class="nav-link btn btn-warning text-dark fw-bold me-3 @if(Route::currentRouteName() === 'home') text-decoration-underline skip-ink @endif" href="{{ route('home') }}">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link btn btn-warning text-dark fw-bold me-3 @if(Route::currentRouteName() === 'cart') text-decoration-underline skip-ink @endif" href="{{ route('cart') }}">{{ __('Cart') }}</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link btn btn-warning text-dark fw-bold me-3 @if(Route::currentRouteName() === 'profile') text-decoration-underline skip-ink @endif" href="{{ route('profile') }}">{{ __('Profile') }}</a>
                    </li>
                    @if(Auth::user()->role_id == 2)
                        <li class="nav-item mx-4">
                            <a class="nav-link btn btn-warning text-dark fw-bold me-3 @if(Route::currentRouteName() === 'maintenance') text-decoration-underline skip-ink @endif" href="{{ route('maintenance') }}">{{ __('Account Maintenance') }}</a>
                        </li>  
                    @endif
                </div>
            </nav>
        @endauth

        <main class="py-4">
            @unless (Route::currentRouteName() === 'login' && Route::currentRouteName() === 'profile')
                @include('layouts.message')
            @endunless
            @yield('content')
        </main>

        <footer class="bg-app-primary text-center text-lg-start fixed-bottom">
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © Amazing E-book 2022
            </div>
        </footer>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="slycoder, web dev, web development, javascript, laravel, vue">
    <meta name="author" content="Carlos Ramirez">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- <script src="{ { asset('js/app.js') } }" defer></script> -->

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- <link href="{ { asset('css/app.css') } }" rel="stylesheet"> -->
</head>
<body>
    <div id="app" class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
         
        <a href="/webapps/drivertools" class="btn btn-sm btn-light active" role="button" aria-pressed="true">Calculator</a> &nbsp;
        <a href="/webapps/drivertools/count" class="btn btn-sm btn-light active" role="button" aria-pressed="true">Count</a> &nbsp;
        <a href="/webapps/drivertools/vehicle" class="btn btn-sm btn-light active" role="button" aria-pressed="true">Vehicle</a> &nbsp;
        <a href="/webapps/drivertools/goals" class="btn btn-sm btn-light active" role="button" aria-pressed="true">Goals</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->

                <!-- Move to right sidebar -->
                <ul class="navbar-nav mr-auto">

                <li class="nav-item"><a class="nav-link" href="/">DRIVER TOOLS MENU</a></li>
                
                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        SLYCODER MENU
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/">Home</a>
          <a class="dropdown-item" href="/about">About</a>
          <a class="dropdown-item" href="/contact">Contact</a>
          <a class="dropdown-item" href="/webapps">Apps</a>
          <a class="dropdown-item" href="/resources">Resources</a>
        </div>
      </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                            @if(Auth::user()->hasRole('SLY_ADMIN'))
                            <a class="dropdown-item" href="/admin">- Admin</a>
                            @endif
                            @if(Auth::user()->hasRole('SLY_SUPERADMIN'))
                            <a class="dropdown-item" href="/superadmin">- Super Admin</a>
                            @endif

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
       
        </nav>

        <main class="py-4">

            @include('inc.messages')

            @yield('content')
        </main>

        <footer-component></footer-component>
    </div>
</body>
</html>

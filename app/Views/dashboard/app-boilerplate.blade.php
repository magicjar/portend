<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="base-url" content="{{ url('/') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blvckgold') }}</title>

    <!-- Styles -->
    <link href="{{ asset('app/views/assets/css/dashboard.css') }}" rel="stylesheet">
</head>
<body id="dashboard">
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top flex-nowrap p-0">
        @if(Request::is('*dashboard*'))
        <button class="navbar-toggler border-0" type="button" data-toggle="offcanvas" title="Menu">
            <i class="menu-icon" data-feather="menu"></i>
        </button>
        <a class="navbar-brand ml-4" href="{{ url('/') }}" title="Homepage"> {{ config('app.name', 'Blvckgold') }}</a>
        @else
        <a class="navbar-toggler border-0" href="{{ route('dashboard.index') }}" title="Dashboard">
            <i class="menu-icon" data-feather="home"></i>
        </a>
        <a class="navbar-brand ml-4" href="{{ route('dashboard.index') }}" title="Dashboard"> {{ config('app.name', 'Blvckgold') }}</a>
        @endif
        <ul class="navbar-nav px-3 ml-auto">
            <li class="nav-item text-nowrap">
                @auth
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i data-feather="log-out"></i> {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                <a class="nav-link" href="{{ route('login') }}">
                    <i data-feather="log-in"></i> {{ __('Login') }}
                </a>
                @endauth
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            @yield('dashboard.sidebar')

            <main class="content-wrapper" id="app">
            @yield('content')
            </main>
        </div>
    </div>

    <div class="overlay"></div>

    <!-- Scripts -->
    <script src="{{ asset('app/views/assets/javascript/dashboard.js') }}"></script>
    <script src="{{ asset('app/views/assets/javascript/feather.min.js') }}"></script>
    
    @yield('scripts')
</body>
</html>
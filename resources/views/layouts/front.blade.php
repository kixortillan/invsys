<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/login.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <vuelma-nav>
        {{--     <img slot="nav-brand" src="" alt="Sales & Aftersales" />
            @if (Auth::guest())
                <a slot="nav-menu-links" class="nav-item is-tab" href="{{ url('/login') }}">Login</a>
                <a slot="nav-menu-links" class="nav-item is-tab" href="{{ url('/register') }}">Register</a>
            @endif
        </vuelma-nav> --}}
        <nav class="nav has-shadow">
            <div class="nav-left">
                <a class="nav-item">
                    <img src="" alt="Sales & Aftersales">
                </a>
            </div>

            @if (Auth::guest())
                <div class="nav-right nav-menu">
                    <a class="nav-item" href="{{ url('/login') }}">Login</a>
                    <a class="nav-item" href="{{ url('/register') }}">Register</a>
                </div>
            @endif
        </nav>
        <section class="section">
            @yield('content')
        </section>
    </div>

    <!-- Scripts -->
    {{-- <script src="/js/app.js"></script> --}}
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title') - EXPSR</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/js/toggle-modal.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Asap+Condensed:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="logo">EXPSR</div>
            <ul class="nav-list">
                <li class="nav-item"><a href="#">Início</a></li>
                <li class="nav-item"><a href="#">Explorar</a></li>
@guest
                <li class="nav-item align-right"><a href="{{ route('login') }}">Entrar</a></li>
@if (Route::has('register'))
                <li class="nav-item"><a href="{{ route('register') }}">Criar conta</a></li>
@endif
@else
                <li class="nav-item align-right">
                    {{ Auth::user()->username }}
                    <ul class="dropdown">
                        <li class="dropdown-item"><a href="#">Perfil</a></li>
                        <li class="dropdown-item"><a href="{{ url('/albums') }}">Álbuns</a></li>
                        <li class="dropdown-item"><a href="#">Amigos</a></li>
                        <li class="dropdown-item"><a href="#">Configurações</a></li>
                        <li class="dropdown-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Desconectar</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>    
                </li>
@endguest
            </ul>
        </div>
    </nav>
@yield('content')
</body>
</html>
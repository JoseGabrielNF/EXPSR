<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Asap+Condensed:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="/css/main.css">
        <title>@yield('title') - EXPSR</title>
    </head>
    <body>
        <nav class="navbar">
            <div class="container">
                <div class="logo">EXPSR</div>
                <ul>
                    <li><a href="#">Início</a></li>
                    <li><a href="#">Explorar</a></li>
                    <li class="alt align-right"><a href="#">Entrar</a></li>
                    <li class="alt"><a href="#">Criar conta</a></li>
                </ul>
            </div>
        </nav>
        <div class="content">
            @yield('content')
        </div>
    </body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rese|@yield('title')</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/b064dd4cf2.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header">

        <div class="header-left">

            <nav class="drawer-menu" id="drawer-menu">
                <ul>
                    <li><a href="/" class="drawer-menu__item">Home</a></li>
                    <li><a href="/register" class="drawer-menu__item">Registration</a></li>
                    <li><a href="/login" class="drawer-menu__item">Login</a></li>
                </ul>
            </nav>

            <div class="header__icon w40" id="header__icon">
                <span class="icon__line--top"></span>
                <span class="icon__line--middle"></span>
                <span class="icon__line--bottom"></span>
            </div>

            <h1 class="header__title">Rese</h1>

        </div>

    </header>
    <main>
        <div class="box-wrapper">
            <div class="box center">
                {{ $slot }}
            </div>
    </main>
</body>

<script src="/js/main.js"></script>

</html>
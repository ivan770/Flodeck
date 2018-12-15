<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Flodeck</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
        <header id="navigation" class="p-navigation">
            <div class="p-navigation__banner">
                <a href="#navigation" class="p-navigation__toggle--open" title="menu">Menu</a>
                <a href="#navigation-closed" class="p-navigation__toggle--close" title="close menu">Close menu</a>
            </div>
            <nav class="p-navigation__nav" role="menubar">
                @auth
                <form class="p-search-box" action="{{ route('search') }}" method="GET">
                    <input type="search" class="p-search-box__input" name="tag" placeholder="Search by tag" required="">
                    <button type="reset" class="p-search-box__reset" alt="reset"><i class="p-icon--close"></i></button>
                    <button type="submit" class="p-search-box__button"><i class="p-icon--search"></i></button>
                </form>
                @endauth
                <ul class="p-navigation__links" role="menu">
                <li class="p-navigation__link" role="menuitem">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                @guest
                <li class="p-navigation__link" role="menuitem">
                    <a href="{{ route('login') }}">Login</a>
                </li>
                <li class="p-navigation__link" role="menuitem">
                    <a href="{{ route('register') }}">Register</a>
                </li>
                @else
                <li class="p-navigation__link" role="menuitem">
                    <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout ({{ Auth::user()->name }})</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
                </ul>
            </nav>
        </header>
        <br />

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>

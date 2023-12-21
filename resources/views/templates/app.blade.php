<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{isset($title) ? $title : "Page en cours"}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    @vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header>
<nav class="norm">
    <a href="#">logo</a>
    <a href="{{route('index')}}">Accueil</a>
    <a href="#">Contact</a>
    <a href="{{route('histoires.create')}}">Nouvelle histoire</a>
</nav>
    <nav class="norm">
@auth
        <a href="{{route('user')}}">{{Auth::user()->name}}</a>
        <a href="{{route("logout")}}"
           onclick="document.getElementById('logout').submit(); return false;">Logout</a>
        <form id="logout" action="{{route("logout")}}" method="post">
            @csrf
        </form>
    @else
        <a href="{{route("login")}}">Login/</a>
        <a href="{{route("register")}}">Register</a>
    @endauth
</nav>
    <nav class="res">
        <div class="navbar">
            <div class="container nav-container">
                <input class="checkbox" type="checkbox" name="" id="" />
                <div class="hamburger-lines">
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                    <span class="line line3"></span>
                </div>
                <div class="logo">
                </div>
                <div class="menu-items">
                    <li><a href="{{route('index')}}">Accueil</a></li>
                    @auth
                        <li><a href="{{route('user')}}">{{Auth::user()->name}}</a></li>
                        <li><a href="{{route("logout")}}"
                               onclick="document.getElementById('logout').submit(); return false;">Logout</a></li>
                        <form id="logout" action="{{route("logout")}}" method="post">
                            @csrf
                        </form>
                    @else
                        <li><a href="{{route("login")}}">Login/</a></li>
                        <li><a href="{{route("register")}}">Register</a></li>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

</header>
<main>
    @yield("content")
</main>
<div class="espacevide"></div>
<footer>
    IUT de Lens
    <div class="square"></div>
    <a href="#" class="up">
        <i class='bx bx-up-arrow-alt'></i>
    </a>
</footer>
</body>

</html>

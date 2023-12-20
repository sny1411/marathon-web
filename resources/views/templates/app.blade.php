<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{isset($title) ? $title : "Page en cours"}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    @vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header>
<nav>
    <a href="#">logo</a>
    <a href="{{route('index')}}">Accueil</a>
    <a href="{{route('test-vite')}}">Test Vite</a>
    <a href="#">Contact</a>
</nav>
    <nav>
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
</header>
<main>
    @yield("content")
</main>

<footer>
    IUT de Lens
    <div class="square"></div>
    <a href="#" class="up">
        <i class='bx bx-up-arrow-alt'></i>
    </a>
</footer>
</body>

</html>

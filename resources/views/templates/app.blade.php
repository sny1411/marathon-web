<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{isset($title) ? $title : "Page en cours"}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header>
    <nav>
        <img src="" alt="logo">
        <a href="{{route('index')}}">Accueil</a>
        <a href="{{route('contact')}}">Contact</a>

        @auth
            <a href="{{route('histoires.create')}}">Nouvelle histoire</a>
            <a href="{{route('user')}}">{{Auth::user()->name}}</a>
            <a href="{{route("logout")}}"
               onclick="document.getElementById('logout').submit(); return false;">Logout</a>
            <form id="logout" action="{{route("logout")}}" method="post">
                @csrf
            </form>
        @else
            <a href="{{route("login")}}">Login</a>
            <a href="{{route("register")}}">Register</a>
        @endauth
    </nav>
</header>

<main>
    @yield("content")
</main>

<footer>IUT de Lens</footer>
</body>
</html>

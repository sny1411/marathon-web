@extends("templates.app")

@section('content')

    <h2>LOGIN</h2>

    <form action="{{route("login")}}" method="post">
        @csrf
        <input type="email" name="email" required placeholder="Email" /><br />
        <input type="password" name="password" required placeholder="Password" /><br />
        Remember me<input type="checkbox" name="remember"   /><br />
        <button value="submit">Se connecter</button><br/>
        Vous n'avez pas de compte ? <a href="{{route("register")}}">Inscrivez-vous !</a>
    </form>
@endsection
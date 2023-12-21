@extends("templates.app")

@section('content')
<section class="login">
    <h1>login</h1>
    <form action="{{route("login")}}" method="post">
        @csrf
        <input type="email" name="email" required placeholder="Email" /><br />
        <input type="password" name="password" required placeholder="Password" /><br />
        Remember me<input type="checkbox" name="remember"   /><br />
        <button value="submit">Se connecter</button><br/>
        Vous n'avez pas de compte ? <a href="{{route("register")}}">Inscrivez-vous !</a>
    </form>
</section>
@endsection
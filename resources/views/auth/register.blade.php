@extends("templates.app")

@section('content')
<form action="{{route("register")}}" method="post">
    @csrf
    <input type="text" name="name" required placeholder="Name" /><br />
    <input type="email" name="email" required placeholder="Email" /><br />
    <input type="password" name="password" required placeholder="Password" /><br />
    <input type="password" name="password_confirmation" required placeholder="Confirm password" /><br />
    <button value="submit">Se connecter</button><br/>
</form>
Déjà un compte ? <a href="{{route("login")}}">Connectez vous !</a>

@endsection

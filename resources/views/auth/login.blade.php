@extends("templates.app")

@section('content')
<section class="login">
    <h1>login</h1>
    <form action="{{route("login")}}" method="post">
        @csrf
        <input type="email" name="email" required placeholder="Email" /><br />
        <input type="password" name="password" required placeholder="password" /><br />
        Remember me<input type="checkbox" name="remember"   /><br />
        <input type="submit"/><br />
    </form>
</section>
@endsection
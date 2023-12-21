@extends("templates.app")

@section('content')
    <section class="reg">
    <form action="{{ route('register') }}" method="post">
        @csrf
        <label for="name">Nom :</label>
        <input type="text" name="name" required placeholder="Entrez votre nom" />

        <label for="email">E-mail :</label>
        <input type="email" name="email" required placeholder="Entrez votre adresse e-mail" />

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required placeholder="Entrez votre mot de passe" />

        <label for="password_confirmation">Confirmer le mot de passe :</label>
        <input type="password" name="password_confirmation" required placeholder="Confirmez votre mot de passe" />



        <input type="submit" value="S'inscrire" />
        <a href="{{ route('login') }}">Vous avez déjà un compte ? Connectez-vous</a>
    </form>
    </section>
@endsection


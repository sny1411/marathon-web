@extends("templates.app")

@section('content')
    <section class="log">
    <div class="login-container">
        <form action="{{ route("login") }}" method="post" class="login-form" onsubmit="return validateForm()">
            @csrf
            <label for="email">Email:</label>
            <input type="email" name="email" required placeholder="Entrez votre email" />

            <label for="password">Mot de passe:</label>
            <input type="password" name="password" required placeholder="Entrez votre mot de passe" />

            <div>
                <input type="checkbox" name="remember" id="remember" />
                <label for="remember">Se souvenir de moi</label>
            </div>



            <input type="submit" value="Se connecter" />
        </form>
    </div>
    </section>

    <script>
        function validateForm() {
            var gdprCheckbox = document.getElementById('gdprCheckbox');

            if (!gdprCheckbox.checked) {
                alert("Veuillez lire et approuver la politique de confidentialité (RGPD).");
                return false;
            }

            return true;
        }
    </script>
@endsection
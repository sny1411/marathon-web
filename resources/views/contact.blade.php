@extends("templates.app")

@section('content')
    <div>

        <section class="reg">
            <h1>Nous contacter</h1>
        <form class="form-check-inline mx-md-3" action="{{route("contact")}}" method="POST" class="login-form">
            {!! csrf_field() !!}
            <div class="form-group">
                <input class="form-control" type="text" id="identite" name="identite" placeholder="Prénom Nom *" required>
            </div>

            <div class="form-group">
                <input class="form-control" type="email" id="email" name="email" placeholder="Mail *" required>
            </div>

            <div class="form-group">
                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Écrivez votre message ici... *" required></textarea>
            </div>

            <input class="mt-1" type="submit" value="Envoyer">
        </form>

        </section>
        <p id="rgpd">
            En cliquant sur le bouton <strong>Envoyer</strong>, vous acceptez le traitement de vos données.
            Les informations recueillies sur ce formulaire sont enregistrées dans un fichier informatisé pour permettre de vous recontacter.
            Les données sont conservées pour une durée de 2 ans maximum et ne sont utilisées que dans un usage privé.
            Vous bénéficiez du droit d'accès, de rectification, de suppression, de portabilité ou d'une limitation du traitement.
            Vous pouvez également retirer à tout moment votre consentement au traitement de vos données.
            Vous pouvez exercer ces droits en contactant Bob par email à l'adresse suivante : onesttotalementlegal@gmail.com.
        </p>
    </div>

@endsection
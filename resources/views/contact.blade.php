@extends("templates.app")

@section('content')
    <div>
        <h1>Nous contacter</h1>

        <form class="form-check-inline mx-md-3" action="{{route("contact")}}" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
                <input class="form-control" type="text" id="identite" name="identite" placeholder="Prénom Nom" required>
            </div>

            <div class="form-group">
                <input class="form-control" type="email" id="email" name="email" placeholder="Mail" required>
            </div>

            <div class="form-group">
                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Écrivez votre message ici..." required></textarea>
            </div>

            <input class="mt-1" type="submit" value="Envoyer">
        </form>
    </div>

@endsection
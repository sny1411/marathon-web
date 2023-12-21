@extends("templates.app")

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <form action="{{route('avis.store')}}" method="POST">
            {!! csrf_field() !!}
            <div class="text-center">
                <h3>Création d'un avis</h3>
                <hr>
            </div>

            <div class="form-group">
                <label for="contenu"><strong>Votre avis :</strong></label>
                <input type="text" name="contenu" id="contenu" class="form-control" value="{{ old('contenu') }}">
            </div>

            <div class="form-group text-center">
                <button type="submit">Valider</button>
            </div>
        </form>
    </div>

@endsection
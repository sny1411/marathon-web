@extends("templates.app")

@section('content')

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('avis.update', $avis->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <h3>Modification d'un avis</h3>
            <hr>
        </div>

        <div>
            <label for="contenu"><strong>Votre avis :</strong></label>
            <input type="text" class="form-control" id="contenu" name="contenu"
                   value="{{$avis->contenu}}">
        </div>
        <div>
            <button type="submit">Valide</button>
        </div>
    </form>

    <div>
        <h3>Suppression d'un avis</h3>
    </div>

    <form action="{{route('avis.destroy',$avis->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <div>
            <button type="submit" name="delete" value="valide">Valide</button>
            <button type="submit" name="delete" value="annule">Annule</button>
        </div>
    </form>

@endsection
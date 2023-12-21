@extends("templates.app")

@section('content')
    <form action="{{route('chapitre.liaison')}}" method="POST">
        <h1>Liaison des chapitres</h1>
        <label for="source">Source :</label>
        <select name="source">
            @foreach($histoire->chapitre as $chapitre)
                <option value="{{$chapitre->id}}">{{$chapitre->id}}</option>
            @endforeach
        </select>
        <label for="destination">Destination :</label>
        <select name="destination">
            @foreach($histoire->chapitre as $chapitre)
                <option value="{{$chapitre->id}}">{{$chapitre->id}}</option>
            @endforeach
        </select>
        <div>
            <input type="text" name="reponse" placeholder="Réponse">
        </div>
    </form>
@endsection
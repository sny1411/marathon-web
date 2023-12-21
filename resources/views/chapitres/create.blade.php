@extends("templates.app")

@section('content')
    <td><button><a href="{{route('activate', $id=$histoire->id)}}">Activer l'histoire</a></button></td>

    <form class="first-form" action="{{route("chapitre.store")}}" method="POST" enctype="multipart/form-data">
        <div>
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre"
                   value="{{ old('titre') }}">
        </div>

        <div>
            <label for="titreCourt">Titre Court:</label>
            <input type="text" id="titreCourt" name="titreCourt"
                   value="{{ old('titreCourt') }}">
        </div>

        <div>
            <input type="file" name="document" id="doc">
        </div>

        <div>
            <label for="question">Question :</label>
            <input type="text" id="question" name="question"
                   value="{{ old('question') }}">
        </div>

        <div>
            <label for="premierTexte">Premier texte</label>
            <input type="checkbox" id="premierTexte" name="premierTexte" @if(old('premierTexte')) checked @endif>
        </div>

        <div style="display: none;">
            <label for="histoire">histoire:</label>
            <input type="text" id="histoire" name="histoire"
                   value="{{$histoire->id}}">
        </div>

        <label for="texte"></label><textarea id="texte" name="texte"></textarea>

        <button type="submit">Envoyer</button>
    </form>
    <form class="second-form" action="{{route('chapitre.liaison')}}" method="POST">
        {!! csrf_field() !!}
        <h1>Liaison des chapitres</h1>
        <label for="source">Source :</label>
        <select name="source">
            @foreach($histoire->chapitres as $chapitre)
                <option value="{{$chapitre->id}}">{{$chapitre->id}}</option>
            @endforeach
        </select>
        <label for="destination">Destination :</label>
        <select name="destination">
            @foreach($histoire->chapitres as $chapitre)
                <option value="{{$chapitre->id}}">{{$chapitre->id}}</option>
            @endforeach
        </select>
        <div>
            <input type="text" name="reponse" placeholder="Réponse">
        </div>

        <button type="submit">Envoyer</button>
    </form>
    <h3 class="histoire-preview-title">Aperçu histoire :</h3>
    @foreach($histoire->chapitres as $chapitre)
        <div class="chapitre-preview">
            <div>{{$chapitre->id}}# => {{$chapitre->titrecourt}}</div>
        </div>
    @endforeach

@endsection
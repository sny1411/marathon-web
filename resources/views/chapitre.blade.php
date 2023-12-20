@extends("templates.app")

@section('content')

    <h3>{{$chapitre->titrecourt}}<</h3>
    {{$chapitre->texte}}
    {{$chapitre->media}}
    {{$chapitre->question}}
    <ul>
        @foreach($chapitre->suivants as $suivant)
            <li><a href="{{route('chapitre.show', $suivant->id)}}"> {{$suivant->pivot->reponse}} </a></li>
        @endforeach
    </ul>

@endsection
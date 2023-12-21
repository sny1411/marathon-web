@extends("templates.app")

@section('content')
    <section class="chapitre">
        @php
            $url = $chapitre->media;
            $mediaType = '';

            if(strpos($url, 'jpg')) $mediaType = 'image';
            if(strpos($url, 'jpeg')) $mediaType = 'image';
            if(strpos($url, 'png')) $mediaType = 'image';
            if(strpos($url, 'mp4')) $mediaType = 'video';
            if(strpos($url, 'webm')) $mediaType = 'video';
            if(strpos($url, 'mov')) $mediaType = 'video';
            if(strpos($url, 'mp3')) $mediaType = 'audio';

        @endphp
        @if ($mediaType === 'video')
            <video controls src="{{Storage::url($chapitre->media)}}"></video>
        @elseif ($mediaType === 'image')
            <img src="{{ Storage::url($chapitre->media) }}" alt="Image" width="150" height="150">
        @elseif ($mediaType === 'audio')
            <audio controls>
                <audio controls src="{{ $url }}">
                </audio>
                @else
                @endif
                <h3>{{$chapitre->titrecourt}}</h3>
                {{$chapitre->texte}}





                {{$chapitre->question}}
                <div id="quest">

                    @if(!$chapitre->question==null)
                        @foreach($chapitre->suivants as $suivant)
                            <a href="{{route('chapitre.show', $suivant->id)}}"> {{$suivant->pivot->reponse}} </a>
                        @endforeach
                    @else <h1>L'histoire est terminée !</h1>
                    <a href="{{route('chapitre.show', $chapitre->histoire->premier())}}"> Recommencer l'histoire</a>
                    <a href="{{route('histoires.index')}}"> Revenir à l'acceuil</a>
                    @endif
                </div>
    </section>
@endsection
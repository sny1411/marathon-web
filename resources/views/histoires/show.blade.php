@extends("templates.app")

@section('content')
<div style="display: flex;align-items: center; justify-content: center">
    <div>
        <tr>
            <td> <h1> {{$histoire->titre}}</h1></td>
            <td> <img src="{{Storage::url($histoire->photo)}}" alt="image représentant l'histoire"> </td>
            @foreach(\App\Models\User::all() as $user)
                @if($user->id == $histoire->user_id)
                    <div> écrite par {{$user->name}},
                @endif
            @endforeach
            @foreach(\App\Models\Genre::all() as $genre)
                @if($genre->id == $histoire->user_id)
                     dans le genre {{$genre->label}} </div>
                @endif
            @endforeach
            <td> {{$histoire->pitch}} </td>
            @foreach(\App\Models\Chapitre::all() as $chapitre)
                @if($chapitre->histoire_id == $histoire->id and $chapitre->premier == 1)
                    <td> <button> <a href="{{route('chapitre.show', $chapitre)}}">démarrer l'histoire !</a></button></td>
                @endif
            @endforeach
            @auth
            <td>
                <form action="{{route('avis.store')}}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="contenu"><strong>Votre avis :</strong></label>
                        <input type="text" name="contenu" id="contenu" class="form-control" value="{{ old('contenu') }}">
                    </div>

                    <div style="display: none;">
                        <label for="histoire_id"> </label>
                        <input type="text" id="histoire_id" name="histoire_id"
                               value="{{$histoire->id}}">
                    </div>

                    <div class="form-group text-center">
                        <button type="submit">Valider</button>
                    </div>
                </form>
            </td>
            @endauth
            <td>
                @foreach(\App\Models\Avis::all() as $avi)
                    @if($avi->histoire_id == $histoire->id)
                        <div>
                            <h5>Avis de {{\App\Models\User::find($avi->user_id)->name}}</h5>
                            <p>{{$avi->contenu}}</p>
                            @if(\Illuminate\Support\Facades\Auth::id() == $avi->user_id)
                                <a href="{{route('avis.edit', $avi->id)}}">Modifier l'avis</a>
                            @endif
                        </div>
                        <hr>
                    @endif
                @endforeach
            </td>
        </tr>
    </div>

</div>
@endsection
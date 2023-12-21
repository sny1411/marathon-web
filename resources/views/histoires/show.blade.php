@extends("templates.app")

@section('content')
<div style="display: flex;align-items: center; justify-content: center">
    <div>
        <tr>
            <td> <h1> {{$histoire->titre}}</h1></td>
            <td> <img src="{{asset("app/".$histoire->photo)}}" alt="image représentant l'histoire"> </td>
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
        </tr>
    </div>
</div>
@endsection
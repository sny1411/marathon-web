@extends("templates.app")

<div style="display: flex;align-items: center; justify-content: center">
    <div>
        <tr>
            <td> <h1> {{$histoire->titre}}</h1></td>
            <td> <img src="{{ asset($histoire->photo)}}" alt="image représentant l'histoire"> </td>
            <td> {{$histoire->pitch}} </td>
            <td> {{$histoire->pitch}} </td>
            @foreach(\App\Models\Chapitre::all() as $chapitre)
                @if($chapitre->histoire_id == $histoire->id and $chapitre->premier == 1) @endif
                <td> <button> <a href="{{route('chapitre', $suivant=$chapitre)}}"></a></button></td>
            @endforeach
        </tr>
    </div>
</div>
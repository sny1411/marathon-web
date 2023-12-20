@extends("templates.app")

@section('content')
    <div style="display: flex;align-items: center; justify-content: center">
        <tr>
            <td >{{$equipe['nomEquipe']}}</td>
            <td ><img src="{{Vite::asset($equipe['logo'])}}" alt="logo" width="50" height="60"></td>
            <td >{{$equipe['slogan']}}</td>
            <td >{{$equipe['localisation']}}</td>
            @foreach($equipe['membres'] as $membre)
                <td >{{$membre['nom']}}</td>
                <td >{{$membre['prenom']}}</td>
                <td ><img src="{{Vite::asset($membre['image'])}}" alt="pdp" width="50" height="60"> </td>
                @foreach($membre['fonctions'] as $fonction)
                    <td >{{$fonction}}</td>
                @endforeach
            @endforeach
            <td >{{$equipe['autres']}}</td>
        </tr>
    </div>
@endsection
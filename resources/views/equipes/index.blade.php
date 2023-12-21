@extends("templates.app")

@section('content')
    <div class="content-container">
        <div class="team-info">
            <h2>{{$equipe['nomEquipe']}}</h2>
            <img src="{{Vite::asset($equipe['logo'])}}" alt="logo" width="50" height="60">
            <p>{{$equipe['slogan']}}</p>
            <p>{{$equipe['localisation']}}</p>
        </div>

        @foreach($equipe['membres'] as $membre)
            <div class="member-container">
                <div class="member">
                    <img src="{{Vite::asset($membre['image'])}}" alt="pdp" width="50" height="60">
                    <p>{{$membre['nom']}} {{$membre['prenom']}}</p>
                </div>
                <div class="member-functions">
                    @foreach($membre['fonctions'] as $fonction)
                        <p>{{$fonction}}</p>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
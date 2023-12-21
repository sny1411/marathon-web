@extends("templates.app")

@section('content')
    <section class="info">
    <div>
        <div>
            <h1>{{Auth::user()->name}}</h1>

            <p>{{count($finies)}} histoire(s) terminée(s)</p>
            <p>{{count($avis)}} avis posté(s)</p>
            <p>{{count($histoires)}} histoire(s) écrite(s)</p>
        </div>

        <div>
            <h4>Vos histoires</h4>
            <section class="histoires container">
            @foreach($histoires as $histoire)
                <div id="hist">
                    <div>{{ $histoire->titre }}</div>
                    <div>{{ $histoire->pitch }}</div>
                    <img src="{{$histoire->photo}}" alt="photo histoire">
                    <button>READ MORE<i class='bx bxs-right-arrow' ></i></button>
                    @if($histoire->active == 0)
                        <button><a href="{{route('creaChapitre', $histoire)}}"> reprendre l'histoire</a></button>
                    @endif
                </div>
            @endforeach
            </section>
        </div>

        <div class="lues">
            <h4>Déjà lues</h4>
            <section class="histoires">
            @foreach($finies as $finie)
                <div id="hist">
                    <div>{{ $finie->titre }}</div>
                    <div>{{ $finie->pitch }}</div>
                    <img src="{{$histoire->photo}}" alt="photo histoire">
                    <div>{{ \App\Models\User::find($finie->user_id)->name }}</div>
                    <div>Lue {{ DB::table('terminees')->select('nombre')->where('user_id', Auth::user()->id)->where('histoire_id', $finie->id)->first()->nombre }} fois</div>
                    <button>READ MORE </button>
                </div>
            @endforeach
            </section>
        </div>
    </div>
@endsection
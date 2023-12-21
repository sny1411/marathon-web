@extends("templates.app")

@section('content')
    <section class="info">
    <div>
        <h2>Profil de {{Auth::user()->name}}</h2>

        <div>
            <h4>Vos histoires</h4>
            <section class="histoires container">
            @foreach($histoires as $histoire)
                <div id="hist">
                    <div>{{ $histoire->titre }}</div>
                    <div>{{ $histoire->pitch }}</div>
                    <img src="{{$histoire->photo}}" alt="photo histoire">
                    <button>READ MORE<i class='bx bxs-right-arrow' ></i></button>
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
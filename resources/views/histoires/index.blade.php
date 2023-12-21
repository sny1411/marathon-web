@extends("templates.app")

@section('content')
    <div class="banner">
        <h1>Bookshelf, chaque histoire devient un monde interactif</h1>
        <a href="#hist">Découvrir</a>
    </div>
    <section class="filtre">

    <form action="{{route('index')}}" method="get">
        <label>
            <select name="cat">
                <option value="All" @if($cat == 'All') selected @endif>-- Toutes catégories --</option>
                @foreach($genres as $genre)
                    <option value="{{$genre}}" @if($cat == $genre) selected @endif>{{ \App\Models\Genre::find($genre)->label }}</option>
                @endforeach
            </select>
        </label>
        <input type="submit" value="OK">
    </form>
    </section>
    <section class="histoires container">
    @foreach($histoires as $histoire)
        @if($histoire->active == 1)
                <div id="hist">
                    <div>{{ $histoire->titre }}</div>
                    <div id="pitch">{{ $histoire->pitch }}</div>
                    <img src="{{Storage::url($histoire->photo)}}" alt="photo histoire">
                    <div>{{ \App\Models\User::find($histoire->user_id)->name }}</div>
                    @auth
                    <button><a href="{{ route("histoires.show", [$histoire->id]) }}"> READ MORE <i class='bx bxs-right-arrow' ></i></a></button>
                    @endauth
                </div>
        @endif
    @endforeach
    </section>
@endsection
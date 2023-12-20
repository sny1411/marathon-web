@extends("templates.app")

@section('content')
    <div class="banner">
        <h1>Slogan</h1>
    </div>
    <h4>filtrage par genre :</h4>
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
    <section class="histoires container">
    @foreach($histoires as $histoire)
        <div id="hist">
            <div>{{ $histoire->titre }}</div>
            <div>{{ $histoire->pitch }}</div>
            <img src="{{$histoire->photo}}" alt="photo histoire">
            <div>{{ \App\Models\User::find($histoire->user_id)->name }}</div>
            <button><a href="{{ route("histoires.show", [$histoire->id]) }}"> READ MORE <i class='bx bxs-right-arrow' ></i></a></button>
        </div>
    @endforeach
    </section>
@endsection
@extends("templates.app")

@section('content')

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

    @foreach($histoires as $histoire)
        <div>
            <div>{{ $histoire->titre }}</div>
            <div>{{ $histoire->pitch }}</div>
            <div>{{ $histoire->photo }}</div>
            <div>{{ \App\Models\User::find($histoire->user_id)->name }}</div>
            <button>READ MORE</button>
        </div>
    @endforeach
@endsection
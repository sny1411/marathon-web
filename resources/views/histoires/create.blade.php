@extends("templates.app")

@section('content')
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="form">
    <form action="{{route('histoires.store')}}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="text-center" style="margin-top: 2rem">
            <h3>Création d'une histoire</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div>
            <input type="text" name="titre" id="titre" placeholder="Titre">
        </div>
        <div>
            <input type="file" name="document" id="doc">
        </div>
        <div>
            <select name="genre_id" id="genre_id">
                @foreach(\App\Models\Genre::all() as $genre)
                    <option value="{{$genre->id}}">{{$genre->label}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <textarea type="" class="form-control" id="pitch" name="pitch"> </textarea>
        </div>
        <div>
            <button class="btn btn-success" type="submit">Valide</button>
        </div>
    </form>
    </section>
@endsection
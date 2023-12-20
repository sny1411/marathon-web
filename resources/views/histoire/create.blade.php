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

    <form action="{{route('histoires.store')}}" method="POST">
        {!! csrf_field() !!}
        <div class="text-center" style="margin-top: 2rem">
            <h3>Création d'un commentaire</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div>
            <label for="user_id"><strong>votre id : </strong></label>
            <input type="text" name="user_id" id="user_id">
        </div>
        <div>
            <label for="scene_id"><strong>Votre commentaire : </strong></label>
            <input type="text" class="form-control" id="scene_id" name="scene_id">
        </div>
        <div>
            <label for="titre"><strong>titre du commentaire : </strong></label>
            <input type="text" name="titre" id="titre"
                   value="{{ old('titre') }}">
        </div>
        <div>
            <label for="commentaire"><strong>Votre commentaire : </strong></label>
            <input type="text" class="form-control" id="commentaire" name="commentaire"
                   value="{{ old('commentaire') }}">
        </div>
        <div>
            <button class="btn btn-success" type="submit">Valide</button>
        </div>
    </form>
@endsection
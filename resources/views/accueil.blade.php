@extends("templates.app")

@section('content')
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
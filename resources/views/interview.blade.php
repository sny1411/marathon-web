@extends("templates.app")

@section('content')

    <div class="interview" style="margin-top: 2rem">
        <h1>Notre interview en anglais !</h1>
        <video controls src="{{Storage::url("videos/groupe-7.mp4")}}"></video>
    </div>
@endsection
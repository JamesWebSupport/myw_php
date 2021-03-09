@extends('layouts.main')

@section('content')

  <div class="row">
    <div class="col-sm-4">
        <h4>Index by Tag: {{$tag->tag}} </h4>
        @csrf

        @foreach ($posts as $post)
            {{ $post->title }}
        @endforeach

    </div>
  </div>

@endsection

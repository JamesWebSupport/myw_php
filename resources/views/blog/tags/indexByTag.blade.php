@extends('layouts.main')

@section('content')

  <div class="row">
    <div class="col-md-8 border-bottom border-light rounded mb-5 ">
        @if($posts)
            <h4>Posts taged by: {{$tag->tag}} </h4>
            @csrf
            <ol>
                @foreach ($posts as $post)
                    <li><a class="font-italic text-dark" href="{{route('show_post', $post->id)}}">{{ $post->title }}</a>
                        <span class='pl-5'>By: </span>
                        <span> <a class='pl-1 font-weight-bold' href="#">{{$post->user->username}}</a></span>
                    </li>
                @endforeach
            </ol>
        @else
            <h4>Hasn't post taged by: {{$tag->tag}} </h4>
        @endif
    </div>
    <div class="text-center">
        <a href="{{route('list_post')}}" class="btn btn-secondary btn-sm">Post Home</a>
    </div>
  </div>

@endsection

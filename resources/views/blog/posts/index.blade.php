@extends('layouts.main')

@section('content')
    <div>
        @if (Auth::user())
            <a href="{{route('create_post')}}" class="btn btn-primary">Create New Post</a>
        @endif
    </div>
    <div class="row">
        <div class="col-md-8 text-wrap">
            <div class="text-center">Post List</div>
            @foreach ( $posts as $post)
                <div class="panel container">
                    <h4 class="text-center">{{$post->title}}</h4>
                    <small class="text-muted">Author: {{$post->user->username}}</small>
                    <span><small class="text-muted">Created at: {{$post->user->creted_at}}</small></span>
                </div>
                {!! $post->content !!}
                <a href="{{ route('show_post', $post->id)}}">More</a>
            @endforeach

        </div>
        <div class="col-md-4">

        </div>
    </div>


@endsection

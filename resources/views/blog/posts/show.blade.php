@extends('layouts.main')

@section('content')

  <div class="row">
    <div class="col-md-8 text-wrap">
        <div class="text-center">Post Detail</div>
        <div class="panel container border border-light">
            <h4 class="text-center">{{$post->title}}</h4>
            <small class="text-muted">Author: {{$post->user->username}}</small>
            <span><small class="text-muted">Created at: {{$post->user->creted_at}}</small></span>
            <span>
                @foreach($tags as $tag)
                    <a href="{{ route('show_by_tag',$tag->id)}}" class="btn btn-parimary btn-sm">{{ " ".$tag->tag." "}}</a>
                @endforeach
            </span>
            <span>
                <a href="{{ route ('create_tag', ['post', $post->id])}}"><i class="fas fa-tag"></i></a>
                <a href="{{ route ('choose_create_tags', ['post', $post->id])}}"><i class="fas fa-plus"></i></a>
                <a href="{{ route ('remove_tags', ['post', $post->id])}}"><i class="fas fa-minus"></i></a>


            </span>
            <div class="container m-3 ">
                {!! $post->content !!}
            </div>

            <div class="text-primary m-3">

                {{$post->likes()->count()}} {{ Str::plural('like', $post->likes()->count())}}

                <span>
                    @if( $post->getIsLiked())
                        <a class="btn btn-secondary btn-sm" href="{{ route('like_post', $post->id)}}"><i class="fas fa-thumbs-down"></i></a>
                    @else
                        <a class="btn btn-secondary btn-sm" href="{{ route('like_post', $post->id)}}"><i class="fas fa-thumbs-up"></i></a>
                    @endif
                </span>


                <span>
                    @if (Auth::user())
                    {{-- create a comment for the post --}}
                        <a class="btn btn-primary btn-sm " href="{{route('create_comment', ['post', $post->id])}}"><i class="fas fa-comment"></i></a>
                    @endif

                    @if (Auth::user() == $post->user)
                        <span><a class="btn btn-primary btn-sm" href="{{route('edit_post', $post->id)}}"><i class="fas fa-edit"></i></a></span>
                        <span><a class="btn btn-primary btn-sm" href="{{route('delete_post', $post->id)}}"><i class="fas fa-trash"></i></a></span>
                    @endif
                </span>
            </div>

        @if ($comments->count())
            <p>Comments:</p>
            @foreach ($comments as $comment)
                <div class="panel border-1">
                    <p></p>
                    <small class="text-muted">Author: {{$comment->user->username}}</small>
                    <span><small class="text-muted">At: {{$comment->created_at}}</small></span>

                </div>
                {{$comment->comment}}

                @if (Auth::user() == $comment->user)
                    <p></p>
                    <span><a class="btn btn-secondary btn-sm" href="{{route('edit_comment', $comment->id)}}">Edit</a></span>
                    <span><a class="btn btn-secondary btn-sm" href="{{route('delete_comment', $comment->id)}}">Delete</a></span>
                @endif
            @endforeach
        @endif


    </div>
    <div class="col-md-4">

    </div>
  </div>


@endsection

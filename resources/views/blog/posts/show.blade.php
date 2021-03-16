@extends('layouts.main')

@section('content')

  <div class="row mb-2">
    <div class="col-md-8">
        <div class="bg-light">
            <a href="{{route('list_post')}}" class="text-mute">Post</a>
            <span class="text-mute">>></span>
            <span><a class='text-mute' href="{{route('list_by_subject', $post->subject->id)}}">{{$post->subject->subject}}</a></span>
        </div>
        <div class="border border-dark rounded">
            <h4 class="text-center border-bottom font-weight-bold">{{$post->title}}</h4>
            <p></p>
            <small class="ml-1 text-muted">By: <a href="#">{{$post->user->username}} </a></small>
            <span><small class="text-muted mr-5"> At: {{$post->user->created_at->diffForHumans()}}</small></span>
            <span>
                @foreach($tags as $tag)
                    <a href="{{ route('show_by_tag',$tag->id)}}" class="btn btn-info btn-sm ">{{ " ".$tag->tag." "}}</a>
                @endforeach
            </span>

            @if(Auth::user() == $post->user)
                <span class='ml-5'>
                    {{-- <a data-toggle="tooltip" title="Create new tag" href="{{ route ('create_tag', ['post', $post->id])}}"><i class="fas fa-tag"></i></a> --}}
                    <a data-toggle="tooltip" title="Add existing tags" href="{{ route ('choose_create_tags', ['post', $post->id])}}"><i class="fas fa-plus"></i></a>
                    <a data-toggle="tooltip" title="Remove existing tags" href="{{ route ('remove_tags', ['post', $post->id])}}"><i class="fas fa-minus"></i></a>
                </span>
            @endif
            <div class="container m-3 ">
                {!! $post->content !!}
            </div>

            <x-action :post='$post'/>


        </div>
        @if ($comments->count())
            <p>Comments:</p>
            @foreach ($comments as $comment)
            <section class="ml-5">
                <div class="border-bottom rounded">
                    <p></p>
                    <small class="text-muted">Author: {{$comment->user->username}}</small>
                    <span><small class="text-muted">At: {{$comment->created_at}}</small></span>

                </div>
                {{$comment->comment}}
                <div class="text-primary m-3">

                    {{$comment->likes()->count()}} {{ Str::plural('like', $comment->likes()->count())}}
                    <span>
                        <!-- only auth::user() can like and comment -->
                        @if (Auth::user())
                            <!-- Like Action -->
                            @if( $comment->getIsLiked())
                            {{-- @if(true) --}}
                                <a class="btn btn-secondary btn-sm" href="{{ route('like', ['comment', $comment->id])}}"><i class="fas fa-thumbs-down"></i></a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('like', ['comment', $comment->id])}}"><i class="fas fa-thumbs-up"></i></a>
                            @endif
                            <!-- Create Comment -->

                            {{-- <a class="btn btn-primary btn-sm " href="{{route('create_comment', ['comment', $comment->id])}}"><i class="fas fa-comment"></i></a> --}}


                            @endif
                        <!-- only author can edit and delete the post -->
                        @if (Auth::user() == $comment->user)
                            <span><a class="btn btn-primary btn-sm" href="{{route('edit_comment', $comment->id)}}"><i class="fas fa-edit"></i></a></span>
                            <span><a class="btn btn-warning btn-sm" href="{{route('delete_comment', $comment->id)}}"><i class="fas fa-trash"></i></a></span>
                        @endif
                    </span>
                    </div>
            </section>
            @endforeach
        @endif


    </div>
    <div class="col-md-4">

    </div>
  </div>

@endsection

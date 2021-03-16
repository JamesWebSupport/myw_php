@extends('layouts.main')

@section('content')

  <div class="row">
    <div class="col-md-8">
        <h4>Posts with subject of "{{$subject->subject}}" </h4>
        @csrf
        <ol>
            @foreach ($posts as $post)

               <li><a class="font-italic text-dark" href="{{route('show_post', $post->id)}}">{{ $post->title }}</a>
                    <span class='pl-5'>By: </span><span> <a class='pl-1 font-weight-bold' href="#">{{$post->user->username}}
                    </a></span></li>
            @endforeach

        </ol>


    </div>
  </div>

@endsection

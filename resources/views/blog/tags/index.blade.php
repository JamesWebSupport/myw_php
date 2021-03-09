@extends('layouts.main')

@section('content')

  <div class="row">
    <div class="col-md-8">
        <h4>List all tags</h4>
        @csrf

        @foreach ($tags as $tag)

                <span>
                    <a href="{{route('show_by_tag', $tag->id)}}" class="btn btn_secondary border btn_sm m-1">{{$tag->tag}}</a>
                </span>

        @endforeach
        <div>
            <a href="{{ URL::previous() }}" class="btn btn-primary btn_sm m-1">Back</a>
        </div>


    </div>
  </div>

@endsection

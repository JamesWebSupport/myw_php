@extends('layouts.main')

@section('content')

  <div class="row">
    <div class="col-sm-4">
        <h4>only for power users</h4>
        @csrf

        @foreach ($subjects as $subject)
            <li>
                <strong>{{ $subject->subject }}</strong>
                <span> <a href="{{route('show_subject', $subject->id)}}">Detail</a></span>
                <span> <a href="{{route('create_subject')}}">Edit</a></span>
            </li>
        @endforeach

    </div>
  </div>

@endsection

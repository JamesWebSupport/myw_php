@extends('layouts.main')

@section('content')

  <div class="row">
    <div class="col-sm-4">
        <h4>only for power users Subjec Detail</h4>
        @csrf

        <strong>{{ $subject->subject }}</strong>
        <p>{{ $subject->description}}</p>

    </div>
  </div>

@endsection

@extends('layouts.main')

@section('content')

  <div class="row">
    <div class="col-sm-4">
      <form action="{{ route('register')}}" method="post">
        @csrf
        <div class="form-group mb-2">
          <label for="name">Name:</label>
          <input type="text" class="form-control @error('name') border-danger @enderror" id="name" name="name" placeholder="Name:" value="{{old('name')}}">

          @error('name')
            <div class="text-danger">
              <small>{{ $message }}</small>
            </div>
          @enderror
        </div>

        <div class="form-group mb-2">
          <label for="email">Email:</label>
          <input type="text" class="form-control" id="email" name="email"placeholder="Email:" value="{{old('email')}}">
          @error('email')
            <div class="text-danger">
              <small>{{ $message }}</small>
            </div>
          @enderror
        </div>

        <div class="form-group mb-2">
          <label for="username">Username:</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Username:" value="{{old('username')}}">
          @error('username')
            <div class="text-danger">
              <small>{{ $message }}</small>
            </div>
          @enderror
        </div>

        <div class="form-group mb-2">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password:">
          @error('password')
            <div class="text-danger">
              <small>{{ $message }}</small>
            </div>
          @enderror
        </div>

        <div class="form-group mb-2">
          <label for="password_confirmation">Password Confirmation:</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password again">
          @error('password_confirmation')
            <div class="text-danger">
              <small>{{ $message }}</small>
            </div>
          @enderror
        </div>

        <div>
          <button type = "submit" class="btn-primary btn center">Register</button>
        </div>

      </form>
    </div>
  </div>

@endsection

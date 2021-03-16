@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 text-center">
            @if (session('status'))
            {{ session('status')}}
            @endif
            <form action="{{ route('login')}}" method="post">
                @csrf
                <div class="form-group mb-2 mx-5">
                <label for="email" class="float-left">Email:</label>
                {{-- <i class="fas fa-envelope-square block"></i> --}}
                <input type="text" class="form-control" id="email" name="email"placeholder="Email:" value="{{old('email')}}" required autofocus/>
                @error('email')
                    <div class="text-danger">
                    <small>{{ $message }}</small>
                    </div>
                @enderror
                </div>

                <div class="form-group mb-2 mx-5">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password:">
                @error('password')
                    <div class="text-danger">
                    <small>{{ $message }}</small>
                    </div>
                @enderror
                </div>

                <div>
                <button type = "submit" class="btn-primary btn center mt-3">Login</button>
                </div>
          </form>
        </div>
    </div>
</div>
@endsection

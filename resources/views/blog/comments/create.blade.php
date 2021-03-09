@extends('layouts.main')

@section('content')
   <div class="row">
    <div class="col-sm-4">
        <h1>Create Comment</h1>
        <form action="" method="POST">
            @csrf

            <div class="form-group">
                <strong>Comment:</strong>

                <textarea name='comment' class='form-control' id='comment' placeholder="..."></textarea>
                {{-- <input type="text" name='comment' class='form-control' id='subject' placeholder="comment..."> --}}

            </div>
            @error('comment')
                <div class="text-warning">
                    {{ $message }}
                </div>
            @enderror

            <input type="hidden" name="commentable_id" value = {{$commentable_id}} id="commentable_id">
            <input type="hidden" name="commentable_type" value = {{$commentable_type}} id="commentable_type">
            <div>
                <button type="submit" class="btn btn-primary">Create New Comment</button>
            </div>
        </form>
    </div>
  </div>

@endsection

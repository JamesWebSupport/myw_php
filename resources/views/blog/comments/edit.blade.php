@extends('layouts.main')

@section('content')
   <div class="row">
    <div class="col-md-8">
        <h3>Comment Edit</h3>
        <form action="" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group">
                <strong class="text-justify">Update your Comment:</strong>
                <textarea name='comment' class='form-control' id='comment' placeholder="...">{{ $comment->comment}}</textarea>
                <input type="hidden" name='commenentable_id' value={{$comment->commentable_id}} id="commentable_id">
                <input type="hidden" name='commenentable_type' value={{$comment->commentable_type}} id="commentable_type">
                <input type="hidden" name="comment_id" value={{$comment->id}} id="comment_id">
            </div>

            <div>
                <button type="submit" class="btn btn-primary ">Update Comment</button>
            </div>
        </form>
    </div>
  </div>

@endsection

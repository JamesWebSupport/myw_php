@extends('layouts.main')

@section('content')

  <div class="row">
    <div class="col-sm-4">
        <h1>Post Create</h1>
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <strong>Subject:</strong>
                <select  name="subject_id" class="form-control"id="post_subject_id">
                    <option selected>Choose subject...</option>
                    @foreach ($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->subject}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name='title' class='form-control' id='post_title' placeholder="title">
            </div>
            <div class="form-group">
                <strong>Title:</strong>
                <textarea name='content' class='ckeditor form-control' id='post_title' placeholder="..."></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Create A New Post</button>
            </div>
        </form>
    </div>
  </div>

@endsection

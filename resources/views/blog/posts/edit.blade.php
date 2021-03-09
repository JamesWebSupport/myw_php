@extends('layouts.main')

@section('content')

  <div class="row">
    <div class="col-md-8">
        <h1>Post edit</h1>
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <strong>Subject:</strong>
                <select  name="subject_id" class="form-control"id="post_subject_id">
                    @foreach ($subjects as $subject)
                        <option value="{{$subject->id}}"
                            @if ($subject->id == $post->subject_id)
                            selected
                            @endif
                            >{{$subject->subject}}</option>
                    @endforeach
                </select>
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name='title' class='form-control' id='title' value="{{$post->title}}">
            </div>
            <div class="form-group">
                <strong>Content:</strong>
                <textarea name='content' class='ckeditor form-control' id='content' >{!! $post->content !!}</textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Update Post</button>
            </div>
        </form>
    </div>
  </div>

@endsection

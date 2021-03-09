@extends('layouts.main')

@section('content')
   <div class="row">
    <div class="col-sm-4">
        <h1>Subject Create</h1>
        <form action="" method="POST">
            @csrf
            <strong class="text-warning"><small>Plesase note, the subject can not be deleted, and can be updated.</small></strong>
            <div class="form-group">
                <strong>Subejct:</strong>
                <input type="text" name='subject' class='form-control' id='subject' placeholder="subject">
            </div>
            <div class="form-group">
                <strong>Description:</strong>
                <input name='description' class='form-control' id='description' placeholder="...">
                {{-- <textarea name='description' class='form-control' id='description' placeholder="..."></textarea> --}}
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Create New Subject</button>
            </div>
        </form>
    </div>
  </div>

@endsection

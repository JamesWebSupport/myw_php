@extends('layouts.main')

@section('content')
   <div class="row">
    <div class="col-md-8">
        <h1>tag Create</h1>
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <strong>Create Tag: limited to 32 characters</strong>
                <input type="text" name='tag' class='form-control' id='tag' maxlength="32" style="width:50%"  placeholder="maximum 32 charachter">
                <input type="hidden" name='taggable_type' class='form-control' id='taggable_type' value="{{$taggable_type}}">
                <input type="hidden" name='taggable_id' class='form-control' id='taggable_id' value="{{$taggable_id}}">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Create New Tag</button>
            </div>
        </form>
    </div>
  </div>

@endsection

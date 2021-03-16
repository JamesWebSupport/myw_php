@extends('layouts.main')

@section('content')
   <div class="row">
    <div class="col-md-8">

        <form action="" method="POST">
            @csrf



            <div class="form-group">

                <h4 class="ml-5 pb-3 font-weight-bold border-bottom ">choose tags...</h4>
                <fieldset class="ml-3 mt-3">


                        <span class="mx-2">
                            @foreach ($tags as $tag)
                                <input type="checkbox" name="{{ $tag->id }}" id = "{{ $tag->id}}" value="{{ $tag->id}}">
                                <label for="{{ $tag->id}}" class="pr-3" >{{ $tag->tag }} </label>
                            @endforeach
                        </span>


                </fieldset>
                {{-- <input type="text" name='tag' class='form-control' id='tag' maxlength="32" style="width:50%"  placeholder="maximum 32 charachter"> --}}
                <input type="hidden" name='taggable_type' class='form-control' id='taggable_type' value="{{$taggable_type}}">
                <input type="hidden" name='taggable_id' class='form-control' id='taggable_id' value="{{$taggable_id}}">
            </div>
            <div class='text-center'>
                <button type="submit" class="btn btn-primary">Attach Tagsss</button>
            </div>
        </form>

        <div class="text-center mt-5">
            <p>Please check the existing tags before creating new tag</p>
            <a class="btn btn-primary" href="{{route ('create_tag', [$taggable_type, $taggable_id])}}">Create New Tag</a>
        </div>
    </div>
  </div>

@endsection

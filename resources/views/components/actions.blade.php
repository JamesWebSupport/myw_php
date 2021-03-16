

<div class="text-primary m-3">
    {{-- {{ $post->likes}} --}}
{{$post->likes()->count()}} {{ Str::plural('like', $post->likes()->count())}}
<span>
    <!-- only auth::user() can like and comment -->
    @if (Auth::user())
        <!-- Like Action -->
        @if( $post->getIsLiked())
        {{-- @if(true) --}}
            <a class="btn btn-secondary btn-sm" href="{{ route('like', ['post', $post->id])}}"><i class="fas fa-thumbs-down"></i></a>
        @else
            <a class="btn btn-secondary btn-sm" href="{{ route('like', ['post', $post->id])}}"><i class="fas fa-thumbs-up"></i></a>
        @endif
        <!-- Create Comment -->
        <a class="btn btn-primary btn-sm " href="{{route('create_comment', ['post', $post->id])}}"><i class="fas fa-comment"></i></a>
    @endif
    <!-- only author can edit and delete the post -->
    @if (Auth::user() == $post->user)
        <span><a class="btn btn-primary btn-sm" href="{{route('edit_post', $post->id)}}"><i class="fas fa-edit"></i></a></span>
        <span><a class="btn btn-primary btn-sm" href="{{route('delete_post', $post->id)}}"><i class="fas fa-trash"></i></a></span>
    @endif
</span>
</div>

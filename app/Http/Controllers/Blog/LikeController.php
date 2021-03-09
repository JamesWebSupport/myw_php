<?php

namespace App\Http\Controllers\Blog;

use App\Models\Like;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function likePost($id)
    {
        //$this->handleLike(Post::class, $id);
        return back();

    }

    public function likeComment($id)
    {

    }

    public function handleLike($type, $id)
    {
        $existing_like = Like::withTrashed()
                ->where('like_type', $type)
                ->where('like_id', $id)
                ->where('user_id', Auth::id())
                ->first();

//        dd($existing_like);
        if(is_null($existing_like)){
            Like::create([
                'user_id' => Auth::id(),
                'like_type' => $type,
                'like_id' => $id,
            ]);
        } else {
            if(is_null($existing_like->deleted_at)){
                $existing_like->delete();
//                dd("delete");
            }else {
                $existing_like->restore();
//                dd("restore");
            }
        }
        // dd("ok");

    }
}

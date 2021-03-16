<?php

namespace App\Http\Controllers\Blog;

use App\Models\Like;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;


class LikeController extends Controller
{
    /**
     *
     * Define Likeable Models: Post, Photo, Comment
     *
     */
    protected $types = [
        'post' => Post::class,
        'comment' => Comment::class,
        ];

    //Basic like Action

    public function likeAction($type, $id)
    {
        //find out liked model
        $liked_model = $this->types[$type]::find($id);

        //liked_model must has a links() function
        $exist_like = $liked_model->likes()
                        ->withTrashed() //withTrashed()
                        ->where('user_id', auth()->user()->id)
                        ->first(); //maybe not important

        if(!$exist_like){
            $new_like = new Like();
            $new_like->user_id = auth()->user()->id;
            $liked_model->likes()->save($new_like);
        } elseif (is_null($exist_like->deleted_at)){
            $exist_like->delete();
        }else{
            $exist_like->restore();
        }
        return back();
    }

}

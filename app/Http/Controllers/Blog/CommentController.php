<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
    *
    **/
    protected $types = [
        'post' => Post::class,
        'comment' => Comment::class,
        ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type, $id)
    {
        //
        //dd($type);

        return view('blog.comments.create', [
            'commentable_type' => $type,
            'commentable_id'=> $id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd("ok");
        //dd($request);
        $request->validate([
            'comment' => 'required',
        ]);

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = auth()->user()->id;
        $comment->commentable_type = $this->types[$request->commentable_type];
        $comment->commentable_id = $request->commentable_id;

 //dd($comment);
        $comment->save();
//consider ; blog/{model}/show/{id}
//        return redirect()->route('show_post', $request->post_id);

//            dd($request->commentable_type.'_show');
        return redirect()->route('show_'.$request->commentable_type,$request->commentable_id );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($comment_id)
    {
        //
        $comment = Comment::find($comment_id);

        return view('blog.comments.edit', [
            'comment' => $comment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $comment = Comment::find($request->comment_id);

        $this->validate($request, [
            'comment' => 'required',
        ]);

        $commentable_type_class = $comment->commentable_type;
        $commentable_type = array_search($commentable_type_class, $this->types);
        $commentable_id = $comment->commentable_id;

        $comment->comment = $request->comment;

        $comment->save();

        return redirect()->route('show_'.$commentable_type,$commentable_id );
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment_id)
    {
        //

        $comment = Comment::find($comment_id);
        $commentable_type_class = $comment->commentable_type;
        $commentable_type = array_search($commentable_type_class, $this->types);
        $commentable_id = $comment->commentable_id;
        $comment->delete();


        return redirect()->route('show_'.$commentable_type,$commentable_id );
    }
}

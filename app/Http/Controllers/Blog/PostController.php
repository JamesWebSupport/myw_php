<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;
use App\Models\Subject;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = Post::all();

        return view('blog.posts.index', [
            'posts' => $post,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $subjects = Subject::get();
        return view('blog.posts.create', [
            'subjects' => $subjects,
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
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'subject_id' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->subject_id = $request->subject_id;
        $post->user_id = auth()->user()->id;

        $post->save();

        #Post::create($request->all());

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = POST::find($id);
    //    $comments = Comment::get()->where('post_id', $id);
    //    dymical property
    //    equivlent to
    //    $comments = Comment::get()->where('commentable_id', $id)->where('commentable_type', POST::class);
         $comments = $post->comments;
         $tags = $post->tags;

     //   dd($post->likes);
        return view('blog.posts.show', [
            'post' => $post,
            'comments'=> $comments,
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = POST::find($id);
        $subjects = Subject::get();
        return view('blog.posts.edit', [
            'post' => $post,
            'subjects' => $subjects,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::find($id);

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->subject_id = $request->subject_id;


        $post->save();


        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);

        $post->delete();

        return back();
    }
}

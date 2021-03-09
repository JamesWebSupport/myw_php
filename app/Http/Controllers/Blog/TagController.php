<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     *
     * Define Tag many to many with Post, Photo,
     *
     */
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
        $tags = Tag::all();

        return view('blog.tags.index', [
            'tags' => $tags,
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexByTag($tag_id)
    {
        $selected_tag = Tag::find($tag_id);

        $posts = $selected_tag->posts;

        if ($posts){
            return view('blog.tags.indexByTag', [
                'tag' => $selected_tag,
                'posts' => $posts,
            ]);
        } else { return back();}


    }

    /**
     * Show the form for creating a new Tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type, $id)
    {
        //
        return view('blog.tags.create', [
            'taggable_type' => $type,
            'taggable_id'=> $id,
        ]);
    }

    /**
     * Show the form for creating a new Tag.
     *
     * @return \Illuminate\Http\Response
     */

     public function chooseOrCreate($type, $id)
     {
         //List all tags
         $all_tags = Tag::all();

         $tagged_model = $this->types[$type]::find($id);

         $tags_exist = $tagged_model->tags;

        $tags = $all_tags->diff($tags_exist);


         return view('blog.tags.attach', [
            'taggable_type' => $type,
            'taggable_id'=> $id,
            'tags' =>$tags,
         ]);

     }

     public function remove($type, $id)
     {
        $tagged_model = $this->types[$type]::find($id);

        $tags = $tagged_model->tags;

        return view('blog.tags.detach', [
            'taggable_type' => $type,
            'taggable_id'=> $id,
            'tags' =>$tags,
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

        $tagged_model = $this->types[$request->taggable_type]::find($request->taggable_id);

        $new_tag = new Tag();

        $request->validate([
            'tag' => 'required|unique:tags|max:32',
        ]);

        $new_tag->tag = $request->tag;
        $tagged_model->tags()->save($new_tag);

        return redirect()->route('show_'.$request->taggable_type, $request->taggable_id );
    }

        /**
     * Attach resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function attach(Request $request)
    {
        //
        //Find out the model related to the tags
        $tagged_model = $this->types[$request->taggable_type]::find($request->taggable_id);
        //Find out

        // dd($request->request);


        // $new_tag->tag = $request->tag;
        // $tagged_model->tags()->save($new_tag);
        foreach ( $request->request as $key => $parameter){
            if (is_numeric($key)){
            //    dd($request);
            //    dd($request->$parameter);
            //    dd(Tag::find(intval($request->$parameter)));
                $new_tag = Tag::find($request->$parameter);
            //    dd($new_tag);
                $tagged_model->tags()->attach($new_tag);
            }
        }
        return redirect()->route('show_'.$request->taggable_type, $request->taggable_id );
    }


    public function detach(Request $request)
    {
        //detach tags with models
        $tagged_model = $this->types[$request->taggable_type]::find($request->taggable_id);
        //dd($request);
        $count = " ";
        foreach ( $request->request as $key => $parameter){
            if (is_numeric($key)){
            //    dd($parameter);
                $count = $count.$parameter;
            //    dd($request);
            //    dd($request->$parameter, $count);
            //    dd(Tag::find(intval($request->$parameter)));
                $new_tag = Tag::find($request->$parameter);
            //    dd($new_tag);
            //    $tagged_model->tags()->detach($new_tag);
                $tagged_model->tags()->detach($request->$parameter);

            //    return redirect()->route('show_'.$request->taggable_type, $request->taggable_id );
            }
        }
        //return to back()
        //dd($count);
        return redirect()->route('show_'.$request->taggable_type, $request->taggable_id );
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

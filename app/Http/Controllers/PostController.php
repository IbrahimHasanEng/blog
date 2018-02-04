<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
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
        $this->validate($request, array(
          'title' => 'required|min:5|max:255',
          'category_id' => 'required',
          'body' => 'required'
        ));

        $post = new Post;

        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->body = $request->body;

        $post->save();
        
        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'تم نشر المقال بنجاح');

        return redirect()->route('posts.show', $post->id);
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
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
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
        $post = Post::find($id);
        $categories = Category::all();
        $_categories = array();
        foreach($categories as $category) {
            $_categories[$category->id] = $category->name;
        }
        $tags = Tag::all();
        $_tags = array();
        foreach($tags as $tag) {
            $_tags[$tag->id] = $tag->name;
        }

        return view('posts.edit')
        ->withPost($post)
        ->withCategories($_categories)
        ->withTags($_tags);
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
        $post = Post::find($id);
        $categories = Category::all();

        $this->validate($request, array(
        'title' => 'required|min:5|max:255',
        'category_id' => 'required|integer',
        'body' => 'required'
        ));

        $post->title = $request->input('title');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');

        $post->save();

        if(isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync(array());
        }

        Session::flash('success', 'تم حفظ التعديلات بنجاح.');

        return redirect()->route('posts.show', $post->id);
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
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'تم حذف المقال بنجاح');

        return redirect()->route('posts.index');
    }
}

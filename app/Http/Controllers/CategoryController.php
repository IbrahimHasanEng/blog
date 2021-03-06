<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Session;

class CategoryController extends Controller
{
    public function __construct() 
    {
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
        $categories = Category::orderBy('id')->paginate(10);
        $posts = Post::all();

        return view('manage.categories.index')->withCategories($categories)->withPosts($posts);
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
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $category = new Category;

        $category->name = $request->name;

        $category->save();

        Session::flash('success', 'تم إنشاء قسم جديد بنجاح!');

        return redirect()->route('categories.index');
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
        $category = Category::find($id);

        return view('manage.categories.show')->withCategory($category);
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
        $category = Category::find($id);

        return view('manage.categories.edit')->withCategory($category);
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
        $category = Category::find($id);

        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $category->name = $request->name;

        $category->save();

        Session::flash('success', 'تم تعديل اسم القسم بنجاح');

        return redirect()->route('categories.show', $category->id);
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
        $category = Category::find($id);
        $posts = Post::where('category_id', '=', $category->id)->get();

        
        foreach($posts as $post) {
            $post->category_id = 1;
            $post->save();
        }
        
        $category->delete();

        Session::flash('success', 'تم حذف القسم بنجاح!');

        return redirect()->route('categories.index');
    }
}

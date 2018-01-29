<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{
    //
    public function getIndex() {
      $posts = Post::paginate(10);

      return view('blog.index')->withPosts($posts);
    }

    public function getSingle($id) {
      $post = Post::where('id', '=', $id)->first();

      return view('blog.single')->withPost($post);
    }
}

<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex() {
      $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
      return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout() {
      $first = 'Ibrahim';
      $last = 'Hasan';

      $fullname = $first . " " . $last;
      return view('pages.about')->withFullname($fullname);
    }

    public function getContact() {
      return view('pages.contact');
    }
}

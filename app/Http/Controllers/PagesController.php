<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex() {
      return view('pages.welcome');
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

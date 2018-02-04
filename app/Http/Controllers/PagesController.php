<?php

namespace App\Http\Controllers;

use App\Post;
use Session;
use Mail;
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

    public function postContact(Request $request) {

      $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required|min:5'
      ]);

      $data = [
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'messageBody' => $request->message
      ];

      Mail::send('emails.contact', $data, function($message) use ($data) {
        $message->from($data['email']);
        $message->to('ibrahim_hasan_eng@hotmail.com');
        $message->subject($data['subject']);
      });

      Session::flash('success', 'تم إرسال الرسالة بنجاح! شكراً لكم.');

      return redirect()->route('welcome');
    }
}

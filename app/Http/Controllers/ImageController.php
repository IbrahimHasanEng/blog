<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use File;
use App\Post;
use Session;

class ImageController extends Controller
{
    //
    public function deleteFeatureImage($id)
    {
        //
        $post = Post::find($id);
        
        File::delete('images/featured/' . $post->image);

        $post->image = null;

        Session::flash('success', 'تم حذف صورة المقال الرئيسية بنجاح');

        return redirect()->route('posts.edit');
    }
}

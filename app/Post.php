<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected function category() {
        return $this->belongsTo('App\Category');
    }

    protected function tags() {
        return $this->belongsToMany('App\Post');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
      return $this->belongsTo('App\User');
    }


  

    /**
    * Get the comments for the blog post.
    */
   public function comments()
   {
       return $this->hasMany('App\Comment');
   }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
  public function users()
  {
    return $this->hasMany('App\User');
  }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function store(Request $request)
  {
    $request->validate([
          'description'=>'required',
      ]);

      $input = $request->all();
      $input['user_id'] = auth()->user()->id;

      Comment::create($input);

      return back();
  }
}

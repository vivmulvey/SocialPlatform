<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

   public function index()
   {
     $posts = Post::all(); //get all books from database and put it in $books

     return view('user.posts.index')->with([
       'posts' => $posts
     ]);
   }

  public function create()
   {
     $user = Auth::user();

    return view('user.posts.create');
   }

 public function store(Request $request)
 {
    $request->validate(
    [
      'file' => 'required|file|image',
      'title' => 'required|max:100',
      'description' => 'required|max:1000',
]);

      $file = $request->file('file');
      $extension = $file->getClientOriginalExtension();
      $filename = date('Y-m-d-His') . '_' . $request->input('name') . '.' . $extension;
      $path = $file->storeAs('public/files' , $filename);

      $post = new Post();
      $post->file = $filename;
      $post->title = $request->input('title');
      $post->description = $request->input('description');


      $post->save();

      return redirect()->route('user.home');
  }

   public function show($id){
     $post = Post::findOrFail($id);

     return view('user.posts.show')->with([
       'post' => $post,

     ]);
   }

   public function edit($id)
   {
      $post = Post::findOrFail($id);
       return view('user.posts.edit')->with([
         'post' => $post,

   ]);
 }

 public function update(Request $request , $id){

   $post = Post::findOrFail($id);

   $request->validate([
     'file' => 'file|image',
     'title' => 'required|max:100',
     'description' => 'required|max:1000'
   ]);

   if($request->hasFile('file')){
     $file = $request->file('file');
     $extension = $file->getClientOriginalExtension();
     $filename = date('Y-m-d-His') . '_' . $request->input('name') . '.' . $extension;
     $path = $file->storeAs('public/files' , $filename);

     Storage::delete("public/files/{$post->file}");
     $post->file = $filename;
   }

    $post->title = $request->input('title');
    $post->description = $request->input('description');

    $post->save();

    return redirect()->route('user.posts.index');
 }
}

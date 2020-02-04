<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;

class ProfileController extends Controller
{
  public function __construct()
 {
     $this->middleware('auth');
 }

 public function edit(User $user)
 {
     $user = Auth::user();
     return view('user.profile.edit', compact('user'));
 }

 public function update(Request $request)
 {
   $user = Auth::user();



     $request->validate([
         'name' => 'required',
         'email' => 'unique:users,email,'.$user->id,
         // 'email' => 'sometimes|required|email|unique:users,'.$user1,
         'date_of_birth' => 'required|date',
         'phone_number' => 'required|min:10|max:10',
         'location' => 'required|max:100',
         'interest' => 'required|max:100',
         'bio' => 'required|max:1000',
         'profile_picture' => 'file|image',


     ]);

     if($request->hasFile('profile_picture')){
       $profile_picture = $request->file('profile_picture');
       $extension = $profile_picture->getClientOriginalExtension();
       $filename = date('Y-m-d-His') . '_' . $request->input('name') . '.' . $extension;
       $path = $profile_picture->storeAs('public/files' , $filename);

       Storage::delete("public/profile_pictures/{$user->profile_picture}");
       $user->profile_picture = $filename;

     }


     $user->name = request('name');
     $user->email = request('email');
     $user->password = bcrypt(request('password'));
     $user->date_of_birth = request('date_of_birth');
     $user->phone_number = request('phone_number');
     $user->location = request('location');
     $user->interest = request('interest');
     $user->bio = request('bio');


     $user->save();

     return redirect()->route('user.home');
 }

 public function search(Request $request){
   $search = $request->get('search');
   $users = DB::table('users')->where('name', 'like', '%'.$search.'%')->paginate(5);
   return view('user.search.index' , ['users' => $users]);

 }
}

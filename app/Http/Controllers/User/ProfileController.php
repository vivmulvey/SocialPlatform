<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use App\County;
use Auth;

class ProfileController extends Controller
{
  public function __construct()
 {
     $this->middleware('auth');
 }

 public function edit($id)
 {
     $user = Auth::user();
     $counties = County::all();

     return view('user.profile.edit')->with([
      'user' => $user,
      'counties' => $counties
    ]);
  }


 public function update(Request $request , $id)
 {
   $user = Auth::user();

    $request->validate([
         'name' => 'required',
         'email' => 'unique:users,email,'.$user->id,
         'date_of_birth' => 'required|date',
         'phone_number' => 'required|min:10|max:10',
         'county' => 'required|max:100',

         'interest' => 'required|max:100',
         'bio' => 'required|max:1000',
         'profile_picture' => 'file|image'


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
     //$user->password = bcrypt(request('password'));
     $user->date_of_birth = request('date_of_birth');
     $user->phone_number = request('phone_number');
     $user->county = request('county');

     $user->interest = request('interest');
     $user->bio = request('bio');


     $user->save();

     return redirect()->route('user.home');
 }

     public function search(Request $request){
       if($request->get('search')) {
         $search = $request->get('search');
         $users = DB::table('users')->where('name', 'like', '%'.$search.'%')->paginate(5);
         return view('user.search.index' ,with(['users' => $users]));
       }
       return view('user.search.index' ,with(['users' => []]));
     }

     public function searchByInterest(Request $request){
       if($request->get('searchByInterest')) {
         $search = $request->get('searchByInterest');
         $users = DB::table('users')->where('interest', 'like', '%'.$search.'%')->paginate(5);
         return view('user.search.byInterest' ,with(['users' => $users]));
       }
       return view('user.search.byInterest' ,with(['users' => []]));
     }

 /**
  * Follow the user.
  *
  * @param $profileId
  *
  */

  // public function isFollowing($id){
  //   $follower_id = User::Auth();
  //   $leader_id = User::findOrFai($id);
  //
  //   if($follower_id->isFollowing($leader_id)){
  //
  //   }else{
  //   };
  // }



   public function followUser($id)
    {
      $user = User::findOrFail($id);


      if(!$user) {

         return redirect()->back()->with('error', 'User does not exist.');

      }

      $user->followers()->attach(auth()->user()->id);

       return redirect()->back()->with('success', 'Successfully followed the user.');

      }


    public function isFollowing(User $user)
      {
      return !! $this->following()->where('follow_id', $user->id)->count();

      }

/**
   * unfollow the user.
   *
   *
   *
   */
    public function unFollowUser($id)
    {
      $user = User::findOrFail($id);


      if(!$user) {

         return redirect()->back()->with('error', 'User does not exist.');

        }
       $user->followers()->detach(auth()->user()->id);

       return redirect()->back()->with('success', 'Successfully unfollowed the user.');
        }


       public function show($id)
       {
        $user = User::findOrFail($id);
        $posts = $user->posts;

        $following = $user->followers()->where('follower_id', auth()->user()->id)->exists();


        return view('user.profile.show', with([
          'user' => $user,
          'posts' => $posts,
          'following' => $following
        ]));
      }


     public function followers($id)
       {
        $user = User::findOrFail($id);
        $followers = $user->followers;


        return view('user.profile.followers')->with([
         'user' => $user,
         'followers' => $followers

       ]);

       }

       public function followings($id)
         {
          $user = User::findOrFail($id);
          $followings = $user->followings;

          return view('user.profile.followings')->with([
           'user' => $user,
           'followings' => $followings
         ]);

     }
}

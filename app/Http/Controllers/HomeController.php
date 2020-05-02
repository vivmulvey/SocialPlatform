<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); //In order to use the below functions you need to be authorized
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = $request->user(); //See what role they have
        $home = 'user.home';

        if ($user->hasRole('admin')){
          $home = 'admin.home';
        }
        else{
          $home = 'user.home';
        }


        return redirect()->route($home);
    }

    public function getFriends()
    {
        return UserResource::collection(User::where('id', '!=', auth()->id())->get());
    }

    public function chats(){

      return view('user.chat.chat');

    }
}

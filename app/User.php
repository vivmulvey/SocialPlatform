<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',  'email', 'password' , 'date_of_birth' , 'phone_number' , 'county' , 'interest' , 'bio' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
      return $this->belongsToMany('App\Role', 'user_role');
    }


    public function posts(){
      return $this->hasMany('App\Post');
    }

    public function comments(){
      return $this->hasMany('App\Comment');
    }

    public function followers()
    {
    return $this->belongsToMany('App\User', 'followers', 'leader_id', 'follower_id')->withTimestamps();
    }

    public function followings()
    {
    return $this->belongsToMany('App\User', 'followers', 'follower_id', 'leader_id')->withTimestamps();
    }

    // public function isFollowing(User $user){
    //   return !! $this->followers()->where('follower_id', $user->id)->count();
    // }
    //
    // public function isFollowedBy(User $user)
    // {
    // return !! $this->followers()->where('leader_id', $user->id)->count();
    // }




    /**
     * A user can have many messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
      return $this->hasMany(Chat::class);
    }

    public function county(){
      return $this->belongsTo('App\County');
    }





    public function authorizeRoles($roles)  //checks what role they have
    {
      if(is_array($roles)){
        return $this->hasAnyRole($roles) || abort(401, 'This action is unauthorized'); // || = abort
      }
        return $this->hasRole($roles) || abort(401, 'This action is unauthorized');
    }



    public function hasRole($role)  //checks what role they have
    {
      return null !== $this->roles()->where('name' , $role)->first(); //not null !== (boolean) if role exists this is true
    }



    public function hasAnyRole($roles)  //checks what role they have
    {
      return null !== $this->roles()->whereIn('name' , $roles)->first(); //Array - if the user is none of the below admin subadmin employee false will be returned
    }

}

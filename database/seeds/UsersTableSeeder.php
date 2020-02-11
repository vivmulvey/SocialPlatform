<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = Role::where('name', 'admin')->first();
      $role_user = Role::where('name', 'user')->first();

      //User Model - Admin
      $admin = new User();
      $admin->name = 'Viv';
      $admin->email = 'viv@socialplatform.ie';
      $admin->password = bcrypt('secret');
      $admin->date_of_birth = '1990/01/01';
      $admin->phone_number = '0000000000';
      $admin->location ='Dublin';
      $admin->interest = 'admin';
      $admin->bio = 'admin';
      $admin->save();
      $admin->roles()->attach($role_admin);

      //User Model - User
      $user = new User();
      $user->name = 'Sample User';
      $user->email = 'sampleuser@socialplatform.ie';
      $user->password = bcrypt('secret');
      $user->date_of_birth = '1990/01/01';
      $user->phone_number = '0000000000';
      $user->location ='Dublin';
      $user->interest = 'user';
      $user->bio = 'user';
      $user->save();
      $user->roles()->attach($role_user);

 }
}

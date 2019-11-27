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
      $admin->first_name = 'Viv';
      $admin->last_name = 'Admin';
      $admin->phone_number = '0876754423';
      $admin->date_of_birth = '1997/09/17';
      $admin->interest = 'Admin';
      $admin->email = 'viv@socialplatform.ie';
      $admin->password = bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);

      //User Model - User
      $user = new User();
      $user->first_name = 'Sample';
      $user->last_name = 'User';
      $user->phone_number = '0876754423';
      $user->date_of_birth = '1998/08/12';
      $user->interest = 'Drawing';
      $user->email = 'sampleuser@socialplatform.ie';
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_user);
    }
}

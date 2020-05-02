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
      $admin->name = 'Help Service';
      $admin->email = 'viv@socialplatform.ie';
      $admin->password = bcrypt('secret');
      $admin->date_of_birth = '1990/01/01';
      $admin->phone_number = '0000000000';
      $admin->county ='Dublin';

      $admin->interest = 'admin';
      $admin->bio = 'admin';
      $admin->save();
      $admin->roles()->attach($role_admin);

      //User Model - User
      $user = new User();
      $user->name = 'Jane Doe';
      $user->email = 'janeDoe@socialplatform.ie';
      $user->password = bcrypt('secret');
      $user->date_of_birth = '1993/08/01';
      $user->phone_number = '0869856375';
      $user->County ='Dublin';
      $user->interest = 'Art';
      $user->bio = 'My name is Jane Doe! I am 27 years old from Dublin. This is my art showcase profile!';
      $user->save();
      $user->roles()->attach($role_user);

      $user = new User();
      $user->name = 'John Smith';
      $user->email = 'johnsmith@socialplatform.ie';
      $user->password = bcrypt('secret');
      $user->date_of_birth = '1998/09/22';
      $user->phone_number = '0876584465';
      $user->County ='Cork';
      $user->interest = 'Photography';
      $user->bio = 'Welcome to my photography page! Follow me!';
      $user->save();
      $user->roles()->attach($role_user);

      $user = new User();
      $user->name = 'Aoife Ryan';
      $user->email = 'aoiferyan@socialplatform.ie';
      $user->password = bcrypt('secret');
      $user->date_of_birth = '1997/03/19';
      $user->phone_number = '0869836652';
      $user->County ='Dublin';
      $user->interest = 'Journalist';
      $user->bio = 'Writing for the UCD newspaper , hope you guys enjoy! Follow me!';
      $user->save();
      $user->roles()->attach($role_user);

      $user = new User();
      $user->name = 'Rachel Murphy';
      $user->email = 'rachelmurphy@socialplatform.ie';
      $user->password = bcrypt('secret');
      $user->date_of_birth = '1996/01/01';
      $user->phone_number = '0863256234';
      $user->County ='Galway';
      $user->interest = 'Illustrator';
      $user->bio = 'A collection of my work!';
      $user->save();
      $user->roles()->attach($role_user);

 }
}

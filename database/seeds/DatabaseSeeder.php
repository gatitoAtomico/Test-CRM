<?php


use App\User;
use App\Roles;
use App\RoleUsers;
use App\Clients;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(array('name' => 'admin','email' => 'admin@admin.com', 'password' => Hash::make('password')));
        User::create(array('name'=>'user','email' => 'user@user.com', 'password' => Hash::make('password')));
        Roles::create(array('role' => 'admin'));
        Roles::create(array('role' => 'user'));
        RoleUsers::create(array('user_id' => '1', 'roles_id' => '1'));
        RoleUsers::create(array('user_id' => '2', 'roles_id' => '2'));
        Clients::create(array('name' => 'Mark Bottom', 'email' => 'mark@gmail.com', 'dob' => '2021-10-15', 'gender' => 'male', 'address' => 'some address',));
        Clients::create(array('name' => 'Fin Bottom', 'email' => 'fin@gmail.com', 'dob' => '2021-10-15', 'gender' => 'male', 'address' => 'some address',));
        Clients::create(array('name' => 'Vince Ro', 'email' => 'vince@gmail.com', 'dob' => '2021-10-15', 'gender' => 'male', 'address' => 'some address',));
        Clients::create(array('name' => 'Mary England', 'email' => 'mary@gmail.com', 'dob' => '2021-10-15', 'gender' => 'female', 'address' => 'some address',));
        Clients::create(array('name' => 'Tony Hawk', 'email' => 'tony@gmail.com', 'dob' => '2021-10-15', 'gender' => 'female', 'address' => 'some address',));
        Clients::create(array('name' => 'Harry Potter', 'email' => 'harry@gmail.com', 'dob' => '2021-10-15', 'gender' => 'male', 'address' => 'some address',));
        Clients::create(array('name' => 'Vince Carter', 'email' => 'carter@gmail.com', 'dob' => '2021-10-15', 'gender' => 'male', 'address' => 'some address',));
        Clients::create(array('name' => 'Maria Andreou', 'email' => 'maand@gmail.com', 'dob' => '2021-10-15', 'gender' => 'female', 'address' => 'some address',));
        // $this->call(UserSeeder::class);
    }
}

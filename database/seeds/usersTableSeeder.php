<?php

use Illuminate\Database\Seeder;
use App\User;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
          'name'      => 'Adriano Rabello',
          'email'     => 'adrianor.rabello@hotmail.com',
          'password'  =>  bcrypt('123')
        ]);

        User::create([
          'name'      => 'james Frances Ryan',
          'email'     => 'rabellocbmes@gmail.com',
          'password'  =>  bcrypt('123')
        ]);
    }
}

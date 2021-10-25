<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Marco';
        $user->email = 'marco@gmail.it';
        $user->password = bcrypt('password');
        $user->save();
    }
}

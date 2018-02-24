<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@our-forum.com',
            'avatar' => 'avatars/user.jpg',
            'password' => bcrypt('admin')
        ]);

        User::create([
            'name' => 'Nouwatin Jacob',
            'email' => 'jaysansa@yahoo.com',
            'avatar' => 'avatars/user.jpg',
            'password' => bcrypt('password')
        ]);
    }
}

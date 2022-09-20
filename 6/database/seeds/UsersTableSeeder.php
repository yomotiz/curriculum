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
            'name' => 'a',
            'email' => 'a@gmail.com',
            'password' => Hash::make('aaaaaaaa'),
        ]);
        User::create([
            'name' => 'b',
            'email' => 'b@gmail.com',
            'password' => Hash::make('bbbbbbbb'),
        ]);
        User::create([
            'name' => 'c',
            'email' => 'c@gmail.com',
            'password' => Hash::make('cccccccc'),
        ]);
    }
}

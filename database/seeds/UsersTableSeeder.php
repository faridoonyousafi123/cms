<?php

use Illuminate\Database\Seeder;
use \App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'admin@mail.com')->first();

        If (!$user) {
            User::create([
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'role' => 'admin',
                'password' => Hash::make('admin@321'),
            ]);
        }
    }
}

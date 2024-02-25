<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //User Seeder

        User::insert([

            [
               //User
               'name' => 'User',
               'email' => 'user@mail.com',
               'email_verified_at' => Carbon::now(),
               'password' => bcrypt('12345678'),
               'role_as' => '0',
           ],
            [
               //Admin
               'name' => 'Admin',
               'email' => 'admin@mail.com',
               'email_verified_at' => Carbon::now(),
               'password' => bcrypt('12345678'),
               'role_as' => '1',
            ],

            [
                //User
                'name' => 'demo',
                'email' => 'demo@mail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('12345678'),
                'role_as' => '0',
            ],

          ]);
    }
}

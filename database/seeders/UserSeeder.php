<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@hadassan.com',
            'password' => bcrypt('password'),
            'status' => 'admin',
        ]);

        User::create([
            'name' => 'Adit Gunawan',
            'email' => 'adit@gmail.com',
            'password' => bcrypt('password'),
            'status' => 'member',
        ]);

        User::create([
            'name' => 'Budi Darmawan',
            'email' => 'budi@gmail.com',
            'password' => bcrypt('password'),
            'status' => 'member',
        ]);

        User::create([
            'name' => 'Santi Astuti',
            'email' => 'santi@gmail.com',
            'password' => bcrypt('password'),
            'status' => 'member',
        ]);

        User::create([
            'name' => 'Dewi Laksana',
            'email' => 'dewi@gmail.com',
            'password' => bcrypt('password'),
                       'status' => 'member',
        ]);
    }
}
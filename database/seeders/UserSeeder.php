<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'users_id' => 1,
                'name' => 'Admin',
                'username' => 'admin',
                'birthdate' => '1990-01-01 00:00:00',
                'email' => 'johndoe@example.com',
                'password' => bcrypt('12345678'),
                'telp' => '081234567890',
                'level' => 'Admin',
                'img_url' => 'https://example.com/img/johndoe.jpg',
            ],
            [
                'users_id' => 2,
                'name' => 'User',
                'username' => 'user',
                'birthdate' => '1990-01-01 00:00:00',
                'email' => 'johndoe@example.com',
                'password' => bcrypt('12345678'),
                'telp' => '081234567890',
                'level' => 'User',
                'img_url' => 'https://example.com/img/johndoe.jpg',
            ],
        ]);
    }
}

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
                'name' => 'John Doe',
                'username' => 'johndoe',
                'birthdate' => '1990-01-01 00:00:00',
                'email' => 'johndoe@example.com',
                'password' => bcrypt('password123'),
                'telp' => '081234567890',
                'img_url' => 'https://example.com/img/johndoe.jpg',
            ],
        ]);
    }
}

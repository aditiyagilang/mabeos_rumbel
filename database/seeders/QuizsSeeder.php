<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('quizs')->insert([
            [
                'quizs_id' => 1,
                'types_id' => 1,
                'quizs_name' => 'PHP Basics Quiz',
                'start_date' => '2024-11-01 10:00:00',
                'end_date' => '2024-11-01 12:00:00',
                'status' => 'start',
                'token' => 'ABC123XYZ',
            ],
        ]);
    }
}

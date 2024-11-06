<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('scores')->insert([
            [
                'scores_id' => 1,
                'quizs_id' => 1,
                'users_id' => 1,
                'score' => 85.5,
            ],
        ]);
    }
}

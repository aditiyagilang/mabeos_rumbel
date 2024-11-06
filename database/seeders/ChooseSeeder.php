<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChooseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('choose')->insert([
            [
                'choose_id' => 1,
                'answers' => 'Answer 1',
                'questions_id' => 1,
            ],
            [
                'choose_id' => 2,
                'answers' => 'Answer 2',
                'questions_id' => 2,
            ],
        ]);
    }
}

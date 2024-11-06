<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
                'questions_id' => 1,
                'type' => 'choose',
                'questions' => 'What is Laravel?',
                'answers' => 'A PHP framework',
            ],
            [
                'questions_id' => 2,
                'type' => 'multiple choose',
                'questions' => 'Select the correct answers.',
                'answers' => 'Option A, Option B',
            ],
        ]);
    }
}

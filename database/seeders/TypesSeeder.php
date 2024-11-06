<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('types')->insert([
            [
                'types_id' => 1,
                'types_name' => 'General Knowledge',
            ],
            [
                'types_id' => 2,
                'types_name' => 'Technical',
            ],
        ]);
    }
}

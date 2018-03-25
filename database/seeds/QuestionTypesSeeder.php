<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class QuestionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           $types = [
            ['name' => 'Text'],
            ['name'=> 'Multiple Choice (Single Option)']
        ];
        DB::table('question_types')->insert($types);
    }
}

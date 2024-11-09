<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quizzes = [
            [
                'title' => 'Basic Cybersecurity Quiz',
                'course_id' => 1,
                'time_limit' => 60,
            ]
        ];


        DB::table('quizzes')->insert($quizzes);
    }
}

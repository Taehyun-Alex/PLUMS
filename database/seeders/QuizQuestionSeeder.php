<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quizQuestions = [];

        for ($i = 0; $i < 10; $i++) {
            $quizQuestions[] = [
                'quiz_id' => 1,
                'question_id' => 1 + $i,
            ];
        }

        DB::table('quiz_questions')->insert($quizQuestions);
    }
}

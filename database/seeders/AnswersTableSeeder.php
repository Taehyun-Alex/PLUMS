<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Answer;


class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = \App\Models\Question::all();

        foreach ($questions as $question) {
            Answer::create(['question_id' => $question->id, 'answer_text' => 'Sample Answer 1', 'is_correct' => true]);
            Answer::create(['question_id' => $question->id, 'answer_text' => 'Sample Answer 2', 'is_correct' => false]);
        }
    }
}

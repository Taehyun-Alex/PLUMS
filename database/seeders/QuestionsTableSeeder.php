<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = \App\Models\Section::all();

        foreach ($sections as $section) {
            Question::create(['section_id' => $section->id, 'question_text' => 'Sample Question', 'difficulty' => 'easy']);
        }
    }
}

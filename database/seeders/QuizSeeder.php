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
                'title' => 'Basic PHP Quiz',
                'course_id' => 1, // Assuming the course ID exists
                'level' => 'Beginner',
            ],
            [
                'title' => 'Advanced Laravel Quiz',
                'course_id' => 2, // Assuming the course ID exists
                'level' => 'Advanced',
            ],
            [
                'title' => 'JavaScript Fundamentals',
                'course_id' => 3, // Assuming the course ID exists
                'level' => 'Intermediate',
            ],
        ];
        // Sort courses by title in alphabetical order
        usort($quizzes, function ($a, $b) {
            return strcmp($a['title'], $b['title']);
        });

        // Insert sorted courses into the database
        DB::table('quizzes')->insert($quizzes);

    }
}

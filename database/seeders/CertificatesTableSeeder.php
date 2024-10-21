<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Certificate;

class CertificatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = \App\Models\Course::all();

        foreach ($courses as $course) {
            Certificate::create(['course_id' => $course->id, 'level' => 'Certificate III']);
            Certificate::create(['course_id' => $course->id, 'level' => 'Certificate IV']);
            Certificate::create(['course_id' => $course->id, 'level' => 'Diploma']);
        }
    }
}

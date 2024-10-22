<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create(['title' => 'Cyber Security']);
//        Course::create(['title' => 'Information Technology (General)']);
//        Course::create(['title' => 'Programming']);
//        Course::create(['title' => 'Web Development']);
    }
}

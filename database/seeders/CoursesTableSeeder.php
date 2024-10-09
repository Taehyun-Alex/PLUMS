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
        Course::create(['name' => 'Cyber Security']);
        Course::create(['name' => 'Information Technology (General)']);
        Course::create(['name' => 'Programming']);
        Course::create(['name' => 'Web Development']);
    }
}

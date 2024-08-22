<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Cert III in Information Technology',
                'description' => 'Foundation skills in supporting IT activities in the workplace',
            ],
            [
                'title' => 'Cert III in Cyber Security',
                'description' => 'Monitoring system security, managing network and data integrity.',
            ],
            [
                'title' => 'Cert III in Network Administration',
                'description' => 'Configure, secure and test system software for a small to medium business network.',
            ],
            [
                'title' => 'Cert IV in Programming',
                'description' => 'Websites, scripting and database design, as well as programming for mobile applications and games development.',
            ],
            [
                'title' => 'Cert III in Web Development',
                'description' => 'Fundamentals of programming and web development including web design, business focussed application development.',
            ],
        ];

        // Sort courses by title in alphabetical order
        usort($courses, function($a, $b) {
            return strcmp($a['title'], $b['title']);
        });

        // Insert sorted courses into the database
        DB::table('courses')->insert($courses);
    }
}

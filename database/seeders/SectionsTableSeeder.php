<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;
use App\Models\Certificate;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $certificates = \App\Models\Certificate::all();

        foreach ($certificates as $certificate) {
            Section::create([
                'course_id' => $certificate->course_id,
                'certificate_id' => $certificate->id,
                'section_name' => "Section for {$certificate->level}"]);
        }
    }
}

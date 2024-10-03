<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $certificates = \App\Models\Certificate::all();

        foreach ($certificates as $certificate) {
            Section::create(['certificate_id' => $certificate->id, 'title' => "Section for {$certificate->level}"]);
        }
    }
}

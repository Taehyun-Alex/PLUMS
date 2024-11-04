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
        Certificate::create(['cert_name' => 'Certificate III', 'threshold' => 50]);
        Certificate::create(['cert_name' => 'Certificate IV', 'threshold' => 60]);
        Certificate::create(['cert_name' => 'Diploma', 'threshold' => 70]);
    }
}

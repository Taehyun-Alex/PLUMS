<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            QuizSeeder::class,
            CoursesTableSeeder::class,
            CertificatesTableSeeder::class,
            SectionsTableSeeder::class,
            QuestionsTableSeeder::class,
            AnswersTableSeeder::class,
        ]);
    }
}

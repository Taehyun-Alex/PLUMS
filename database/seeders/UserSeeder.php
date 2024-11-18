<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run() : void
    {
        $superUser = User::factory()->create([
            'first_name' => 'Super',
            'last_name' => 'User',
            'email' => 'super@example.com',
            'password' => Hash::make('password123'),
        ]);

        $superUser->assignRole('super user');

        $admin = User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
        ]);

        $admin->assignRole('staff');

        $student = User::factory()->create([
            'first_name' => 'Student',
            'last_name' => 'User',
            'email' => 'student@example.com',
            'password' => Hash::make('password123'),
        ]);

        $student->assignRole('student');
    }
}

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

        $admin = User::factory()->create([
            'name' => 'Admin1 User',
            'email' => 'admin1@example.com',
            'password' => Hash::make('password123'),
        ]);
        $admin->assignRole('admin');

        $admin = User::factory()->create([
            'name' => 'Admin2 User',
            'email' => 'admin2@example.com',
            'password' => Hash::make('password123'),
        ]);
        $admin->assignRole('admin');

        $staff = User::factory()->create([
            'name' => 'Staff1 User',
            'email' => 'staff1@example.com',
            'password' => Hash::make('password123'), // Ensure you hash the password
        ]);
        $staff->assignRole('staff');

        $staff = User::factory()->create([
            'name' => 'Staff2 User',
            'email' => 'staff2@example.com',
            'password' => Hash::make('password123'), // Ensure you hash the password
        ]);
        $staff->assignRole('staff');

    }
}

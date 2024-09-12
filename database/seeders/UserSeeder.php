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
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
        ]);
        $admin->assignRole('admin');

        $staff = User::factory()->create([
            'first_name' => 'Staff',
            'last_name' => 'User',
            'email' => 'staff@example.com',
            'password' => Hash::make('password123'), // Ensure you hash the password
        ]);
        $staff->assignRole('staff');
    }
}

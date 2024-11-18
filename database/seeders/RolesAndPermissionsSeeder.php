<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $allPermissions = [
            // Quiz permissions
            'view quizzes',
            'create quizzes',
            'edit quizzes',
            'delete quizzes',
            'submit quizzes',
            
            // Course permissions
            'view courses',
            'create courses',
            'edit courses',
            'delete courses',
            
            // Question permissions
            'view questions',
            'create questions',
            'edit questions',
            'delete questions',
            
            // Answer permissions
            'view answers',
            'create answers',
            'edit answers',
            'delete answers',
            
            // Tag permissions
            'view tags',
            'create tags',
            'edit tags',
            'delete tags',
            
            // Certificate permissions
            'view certificates',
            'create certificates',
            'edit certificates',
            'delete certificates',
            
            // Quiz Results permissions
            'view quiz results',
            'view all quiz results',
            
            // User permissions
            'view users',
            'create users',
            'edit users',
            'delete users',

            // Mobile API permissions
            'mobile api current user',
            'mobile api update user',
            'mobile api update photo',
            
            // Telemetry permissions
            'view telemetry',
            
            // Additional specific permissions
            'manage quiz questions',
            'manage question tags',
            'view analytics',
            'export data'
        ];

        foreach ($allPermissions as $permission) {
                Permission::create(['name' => $permission]);
        }

        $studentPermissions = [
            'view quizzes',
            'view courses',
            'submit quizzes'
        ];

        $staffPermissions = [
            'view quizzes',
            'create quizzes',
            'edit quizzes',
            'delete quizzes',
            
            'view courses',
            'create courses',
            'edit courses',
            
            'view questions',
            'create questions',
            'edit questions',
            'delete questions',
            
            'view all quiz results',
            'manage quiz questions',
            'manage question tags',
            'view analytics',
            'view telemetry',
            'export data',
            
            'view certificates',
            'create certificates',
            'edit certificates'
        ];

        $studentRole = Role::create(['name' => 'student']);
        $studentRole->givePermissionTo($studentPermissions);

        $staffRole = Role::create(['name' => 'staff']);
        $staffRole->givePermissionTo($staffPermissions);

        $superUserRole = Role::create(['name' => 'super user']);
        $superUserRole->givePermissionTo($allPermissions);
    }
}

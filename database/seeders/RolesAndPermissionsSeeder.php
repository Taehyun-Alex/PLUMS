<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Define permissions
        $allPermissions = [
            'view', 'edit', 'create', 'delete', 'browse', 'show', 'add',
            'trash-recover', 'trash-remove', 'trash-empty', 'trash-restore',
            'view-users', 'create-user'
        ];

        // Create permissions if they don't exist
        foreach ($allPermissions as $permission) {
                Permission::create(['name' => $permission]);
        }

        $staffPermissions = [
            'view'
        ];

        // Create roles and assign permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo($allPermissions);

        $staffRole = Role::create(['name' => 'staff']);
        $staffRole->givePermissionTo($staffPermissions);

    }
}

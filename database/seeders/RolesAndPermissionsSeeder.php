<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'view admins']);
        Permission::create(['name' => 'edit admins']);
        Permission::create(['name' => 'create admins']);
        Permission::create(['name' => 'delete admins']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(['view admins', 'edit admins', 'create admins', 'delete admins']);

        $staff = Role::create(['name' => 'staff']);
        $staff->givePermissionTo(['view admins']);
    }
}

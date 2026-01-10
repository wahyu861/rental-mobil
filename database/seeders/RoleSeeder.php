<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat Role
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Membuat Permissions
        $viewDashboard = Permission::create(['name' => 'view dashboard']);
        $viewAllMenus = Permission::create(['name' => 'view all menus']);

        // Memberikan permissions ke role
        $adminRole->givePermissionTo($viewDashboard, $viewAllMenus);
        $userRole->givePermissionTo($viewDashboard);
    }
}

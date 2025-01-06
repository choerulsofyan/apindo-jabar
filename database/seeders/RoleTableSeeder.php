<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'ADMIN',
            'DEVELOPER',
            'MEMBER',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        // Sync all permissions to ADMIN and DEVELOPER
        $allPermissions = Permission::all(); // Retrieve all permissions

        $adminRole = Role::where('name', 'ADMIN')->first();
        $developerRole = Role::where('name', 'DEVELOPER')->first();

        if ($adminRole) {
            $adminRole->syncPermissions($allPermissions); // Assign all permissions to ADMIN
        }

        if ($developerRole) {
            $developerRole->syncPermissions($allPermissions); // Assign all permissions to DEVELOPER
        }
    }
}

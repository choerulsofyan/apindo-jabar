<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolesPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'GRUP_USER_ADD',
            'GRUP_USER_DELETE',
            'GRUP_USER_EDIT',
            'GRUP_USER_LIST',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}

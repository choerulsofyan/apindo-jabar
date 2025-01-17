<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'HAK_AKSES_ADD',
            'HAK_AKSES_DELETE',
            'HAK_AKSES_EDIT',
            'HAK_AKSES_LIST',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}

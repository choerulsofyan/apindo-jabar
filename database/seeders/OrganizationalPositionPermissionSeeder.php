<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class OrganizationalPositionPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'JABATAN_ADD',
            'JABATAN_DELETE',
            'JABATAN_EDIT',
            'JABATAN_LIST',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}

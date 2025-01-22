<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CouncilPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'DEWAN_ADD',
            'DEWAN_DELETE',
            'DEWAN_EDIT',
            'DEWAN_LIST',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}

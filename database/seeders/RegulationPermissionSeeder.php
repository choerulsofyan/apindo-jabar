<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RegulationPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'REGULASI_ADD',
            'REGULASI_DELETE',
            'REGULASI_EDIT',
            'REGULASI_LIST',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class ActivityPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'KEGIATAN_ADD',
            'KEGIATAN_DELETE',
            'KEGIATAN_EDIT',
            'KEGIATAN_LIST',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}

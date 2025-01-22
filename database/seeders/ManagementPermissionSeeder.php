<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class ManagementPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'KEPENGURUSAN_ADD',
            'KEPENGURUSAN_DELETE',
            'KEPENGURUSAN_EDIT',
            'KEPENGURUSAN_LIST',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}

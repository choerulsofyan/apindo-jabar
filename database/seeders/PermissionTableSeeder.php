<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'GRUP_USER_LIST',
            'GRUP_USER_ADD',
            'GRUP_USER_EDIT',
            'GRUP_USER_DELETE',
            'HAK_AKSES_LIST',
            'HAK_AKSES_ADD',
            'HAK_AKSES_EDIT',
            'HAK_AKSES_DELETE',
            'USER_LIST',
            'USER_ADD',
            'USER_EDIT',
            'USER_DELETE',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}

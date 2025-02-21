<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class MemberPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'KEANGGOTAAN_ADD',
            'KEANGGOTAAN_DELETE',
            'KEANGGOTAAN_EDIT',
            'KEANGGOTAAN_LIST',
            'ANGGOTA_MENU_VIEW',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}

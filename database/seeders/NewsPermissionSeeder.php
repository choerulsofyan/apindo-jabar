<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class NewsPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'BERITA_ADD',
            'BERITA_DELETE',
            'BERITA_EDIT',
            'BERITA_LIST',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}

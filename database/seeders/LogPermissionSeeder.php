<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class LogPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'LOG_LIST',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}

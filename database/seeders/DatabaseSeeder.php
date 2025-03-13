<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\OrganizationalPosition;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // permissions seeders
            NewsPermissionSeeder::class,
            CouncilPermissionSeeder::class,
            OrganizationalPositionPermissionSeeder::class,
            ManagementPermissionSeeder::class,
            MemberPermissionSeeder::class,
            RegulationPermissionSeeder::class,
            UserPermissionSeeder::class,
            RolesPermissionSeeder::class,
            PermissionPermissionSeeder::class,
            DashboardPermissionSeeder::class,
            ActivityPermissionSeeder::class,
            LogPermissionSeeder::class,
            // modules seeders
            // PermissionTableSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class,
            NewsSeeder::class,
            OrganizationalPositionSeeder::class,
            SectorSeeder::class,
            CouncilSeeder::class,
        ]);
    }
}

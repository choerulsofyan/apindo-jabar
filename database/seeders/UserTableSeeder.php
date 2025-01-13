<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Administrator User
        $adminUser = User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $adminRole = Role::where('name', 'ADMIN')->first();
        $adminUser->assignRole($adminRole);

        // Developer User
        $developerUser = User::create([
            'name' => 'Developer',
            'email' => 'developer@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $developerRole = Role::where('name', 'DEVELOPER')->first();
        $developerUser->assignRole($developerRole);

        // Member User
        $memberUser = User::create([
            'name' => 'Member',
            'email' => 'member@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $memberRole = Role::where('name', 'MEMBER')->first();
        $memberUser->assignRole($memberRole);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationalPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organizational_positions')->insert([
            ['name' => 'Ketua'],
            ['name' => 'Wakil Ketua'],
            ['name' => 'Sekretaris'],
            ['name' => 'Wakil Sekretaris 1'],
            ['name' => 'Bendahara'],
            ['name' => 'Wakil Bendahara'],
            ['name' => 'Anggota'],
            ['name' => 'Wakil Sekretaris 2'],
            ['name' => 'Pengurus'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouncilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('councils')->insert([
            ['name' => 'Dewan Pertimbangan'],
            ['name' => 'Dewan Penasihat'],
            ['name' => 'Dewan Pimpinan Harian'],
            ['name' => 'Pengurus Bidang Bidang'],
        ]);
    }
}

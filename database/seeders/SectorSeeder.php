<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sectors')->insert([
            ['name' => 'Bidang Industri'],
            ['name' => 'Bidang Organisasi, Keanggotaan dan Pembinaan Daerah'],
            ['name' => 'Bidang Perdagangan, Perhubungan dan Logistik'],
            ['name' => 'Bidang Pariwisata, Ekonomi Kreatif, IKM, UKM dan Koperasi'],
            ['name' => 'Bidang Pertanian, Perkebunan, Kehutanan dan Bina Lingkungan'],
            ['name' => 'Bidang Perbankan, Jasa Keuangan dan Perpajakan'],
            ['name' => 'Bidang Infrastruktur, Properti dan Konstruksi'],
            ['name' => 'Bidang Pengembangan Usaha dan Kemitraan'],
            ['name' => 'Bidang Investasi dan Hubungan Internasional'],
            ['name' => 'Bidang Ketenagakerjaan dan Jaminan Sosial Ketenagakerjaan'],
            ['name' => 'Bidang Advokasi dan Kebijakan Publik'],
            ['name' => 'Bidang Diklat, Litbang, Produktivitas, K3 dan Sertifikasi'],
            ['name' => 'Bidang Hubungan dan Kerjasama Antar Lembaga'],
        ]);
    }
}

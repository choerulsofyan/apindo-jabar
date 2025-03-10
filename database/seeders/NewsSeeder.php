<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert([
            [
                'title' => 'Jakarta Akan Terapkan Kebijakan Ganjil Genap Baru',
                'content' => 'Pemerintah DKI Jakarta mengumumkan perluasan area ganjil genap mulai bulan depan untuk mengurangi kemacetan.',
                'photo' => 'ganjil_genap.jpg',
                'place' => 'Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Erupsi Gunung Merapi, Warga Diminta Mengungsi',
                'content' => 'Gunung Merapi kembali erupsi pagi ini. Warga sekitar diminta segera mengungsi ke tempat aman.',
                'photo' => 'merapi_erupsi.jpg',
                'place' => 'Yogyakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Festival Kuliner Nusantara 2025 Dibuka di Bandung',
                'content' => 'Festival Kuliner Nusantara di Bandung menghadirkan lebih dari 200 stand makanan khas dari seluruh Indonesia.',
                'photo' => 'kuliner_bandung.jpg',
                'place' => 'Bandung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Gempa Magnitudo 5.6 Guncang Maluku',
                'content' => 'Gempa berkekuatan 5.6 mengguncang Maluku pagi ini. Belum ada laporan kerusakan besar atau korban jiwa.',
                'photo' => 'gempa_maluku.jpg',
                'place' => 'Maluku',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Panen Raya di Lombok Meningkat 30%',
                'content' => 'Hasil panen padi di Lombok tahun ini meningkat 30% dibandingkan tahun lalu, berkat cuaca yang mendukung.',
                'photo' => 'panen_lombok.jpg',
                'place' => 'Lombok',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Festival Batik Nasional Digelar di Solo',
                'content' => 'Kota Solo menjadi tuan rumah Festival Batik Nasional, menampilkan berbagai koleksi batik dari seluruh penjuru Indonesia.',
                'photo' => 'batik_solo.jpg',
                'place' => 'Solo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Proyek MRT Tahap 2 di Surabaya Resmi Dimulai',
                'content' => 'Proyek MRT tahap kedua di Surabaya resmi dimulai, dengan target selesai dalam waktu tiga tahun.',
                'photo' => 'mrt_surabaya.jpg',
                'place' => 'Surabaya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kapal Nelayan Tenggelam di Laut Sulawesi',
                'content' => 'Sebuah kapal nelayan dilaporkan tenggelam di Laut Sulawesi. Tim SAR masih melakukan pencarian korban.',
                'photo' => 'kapal_sulawesi.jpg',
                'place' => 'Sulawesi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Hutan Mangrove di Bali Direhabilitasi',
                'content' => 'Proyek rehabilitasi hutan mangrove di Bali berhasil menanam 50.000 bibit baru untuk menjaga ekosistem pesisir.',
                'photo' => 'mangrove_bali.jpg',
                'place' => 'Bali',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pembangunan Tol Sumatera Hampir Rampung',
                'content' => 'Tol Trans Sumatera diprediksi akan selesai tahun ini, mempersingkat waktu perjalanan lintas provinsi.',
                'photo' => 'tol_sumatera.jpg',
                'place' => 'Sumatera',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pasar Terapung Banjarmasin Menarik Wisatawan',
                'content' => 'Pasar Terapung di Banjarmasin kembali menjadi daya tarik wisata, dengan peningkatan jumlah pengunjung sebesar 20%.',
                'photo' => 'pasar_banjarmasin.jpg',
                'place' => 'Banjarmasin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Banjir di Semarang Rendam 1.000 Rumah',
                'content' => 'Hujan deras menyebabkan banjir di Semarang yang merendam lebih dari 1.000 rumah warga.',
                'photo' => 'banjir_semarang.jpg',
                'place' => 'Semarang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Peningkatan Ekspor Kopi Aceh',
                'content' => 'Ekspor kopi dari Aceh meningkat tajam tahun ini, dengan permintaan terbesar datang dari Eropa dan Amerika.',
                'photo' => 'kopi_aceh.jpg',
                'place' => 'Aceh',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Wisata Raja Ampat Diminati Wisatawan Mancanegara',
                'content' => 'Keindahan Raja Ampat terus menarik perhatian wisatawan mancanegara, dengan peningkatan kunjungan 15% tahun ini.',
                'photo' => 'raja_ampat.jpg',
                'place' => 'Raja Ampat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Karnaval Budaya Nusantara Digelar di Medan',
                'content' => 'Medan menjadi tuan rumah Karnaval Budaya Nusantara yang menampilkan berbagai kesenian daerah.',
                'photo' => 'karnaval_medan.jpg',
                'place' => 'Medan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Jembatan Ampera Jadi Ikon Baru Festival Lampung',
                'content' => 'Jembatan Ampera dihiasi dengan lampu-lampu cantik selama Festival Lampung berlangsung.',
                'photo' => 'jembatan_ampera.jpg',
                'place' => 'Palembang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Festival Danau Toba Diresmikan',
                'content' => 'Festival Danau Toba tahun ini diresmikan dengan pertunjukan seni budaya khas Batak.',
                'photo' => 'danau_toba.jpg',
                'place' => 'Danau Toba',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

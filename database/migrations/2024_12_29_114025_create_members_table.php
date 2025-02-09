<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('company_name'); // Nama Perusahaan
            $table->text('company_address'); // Alamat Perusahaan
            $table->string('city'); // Kota/Kabupaten
            $table->string('postal_code'); // Kode Pos
            $table->string('phone_number'); // No. Telepon
            $table->string('fax')->nullable(); // Fax
            $table->string('website')->nullable(); // Website
            $table->string('company_email'); // Email CP/Email Perusahaan
            $table->string('klbi')->nullable(); // KLBI
            $table->text('other_business_activities')->nullable(); // Kegiatan Usaha Lainnya
            $table->string('company_status'); // Status Perusahaan (BUMN, BUMD, Swasta Nasional, Swasta Asing)
            $table->string('investment_facilities')->nullable(); // Fasilitas Investasi (PMA, PMDN, Joint Venture)
            $table->integer('number_of_employees'); // Jumlah Tenaga Kerja
            $table->string('work_regulations'); // Peraturan Kerja (Peraturan Perusahaan (PP), Perjanjian Kerja Bersama (PKB))
            $table->string('work_regulation_others')->nullable(); // Peraturan Kerja Lainnya (Sebutkan)
            $table->string('bpjs')->nullable(); // BPJS (BPJS Kesehatan,  BPJS Ketenagakerjaan)
            $table->boolean('is_labor_union_exists'); // Serikat Pekerja (Ada, Belum Ada)
            $table->integer('monthly_contribution_period'); // Periode Iuran (1 Bulan, 3 Bulan, 6 Bulan, 12 Bulan)
            $table->string('how_they_learned_about_apindo')->nullable(); // Sumber Informasi Mengenai Apindo (Website APINDO)
            $table->string('how_they_learned_about_apindo_board_member')->nullable(); // Sumber Informasi Mengenai Apindo (Pengurus APINDO, Sebutkan)
            $table->string('how_they_learned_about_apindo_others')->nullable(); // Sumber Informasi Mengenai Apindo (Lainnya, Sebutkan)
            $table->string('declaration_letter')->nullable(); // Surat Pernyataan (Path to PDF)
            $table->string('pp_pkb')->nullable(); // PP & PKB (Path to PDF)
            $table->string('company_profile')->nullable(); // Profil Perusahaan (Path to PDF)
            $table->string('tdp')->nullable(); // TDP (Path to PDF)
            $table->string('contact_person'); // Contact Person
            $table->string('mobile_number'); // No. Handphone
            $table->boolean('is_extraordinary_member')->default(false); // Tipe Anggota
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relation to User
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};

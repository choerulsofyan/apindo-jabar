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
            $table->string('company_name');
            $table->text('company_address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('phone_number');
            $table->string('fax')->nullable();
            $table->string('website')->nullable();
            $table->string('email'); // Or company_email, consider which one is primary
            $table->string('klbi')->nullable();
            $table->text('other_business_activities')->nullable();
            $table->string('company_status'); // Store as string, use checkboxes for input in the form
            $table->string('investment_facilities')->nullable(); // Store as string, use checkboxes for input in the form
            $table->integer('number_of_employees');
            $table->string('work_regulations');
            $table->string('work_regulation_others')->nullable(); // To store "Others" specification for Work Regulations
            $table->string('bpjs')->nullable(); // Store as string, use checkboxes for input
            $table->enum('labor_union', ['Exists', 'Does Not Exist']);
            $table->enum('contribution_period', ['1 Month', '3 Months', '6 Months', '12 Months']);
            $table->string('how_they_learned_about_apindo')->nullable();
            $table->string('how_they_learned_about_apindo_board_member')->nullable(); // To store "APINDO Board Member" specification
            $table->string('how_they_learned_about_apindo_others')->nullable(); // To store "Others" specification for How They Learned
            $table->string('declaration_letter')->nullable(); // Path to PDF
            $table->string('pp_pkb')->nullable(); // Path to PDF
            $table->string('company_profile')->nullable(); // Path to PDF
            $table->string('tdp')->nullable(); // Path to PDF
            $table->string('contact_person');
            $table->string('mobile_number');
            $table->boolean('is_exraordinary_member')->default(false);
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

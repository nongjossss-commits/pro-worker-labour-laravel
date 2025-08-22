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
    Schema::create('employees', function (Blueprint $table) {
        $table->id(); // ID หลักของตาราง (ตัวเลขอัตโนมัติ)

        // --- Foreign Key สำหรับเชื่อมกับตาราง Employers ---
        $table->string('employer_id');
        $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');

        // --- ข้อมูลส่วนตัว (Personal Info) ---
        $table->string('title_th')->nullable();
        $table->string('name_th')->nullable();
        $table->string('title_en')->nullable();
        $table->string('name_en')->nullable();
        $table->date('dob')->nullable(); // Date of Birth
        $table->string('nationality')->nullable();
        $table->string('phone')->nullable();
        $table->string('position')->nullable();
        $table->date('start_date')->nullable();

        // --- ข้อมูลเอกสาร (Document Info) ---
        $table->string('passport_no')->nullable();
        $table->string('passport_type')->nullable(); // PJ or CI for Myanmar
        $table->date('passport_expiry_date')->nullable();
        $table->string('work_permit_no')->nullable();
        $table->date('work_permit_expiry_date')->nullable();
        $table->string('work_permit_mou_group')->nullable();
        $table->string('work_permit_mou_group_other')->nullable();
        $table->date('visa_expiry_date')->nullable();
        $table->date('ninety_day_report_date')->nullable();
        $table->string('pink_card_no')->nullable();

        // --- เลขอ้างอิงต่างๆ (Reference Numbers) ---
        $table->string('namelist_no')->nullable();
        $table->string('request_no')->nullable();
        $table->string('worker_ref_no')->nullable();
        $table->string('personal_id')->nullable();
        $table->string('company_worker_id')->nullable();
        $table->string('social_security_no')->nullable();
        $table->string('tax_id_no')->nullable();
        $table->string('designated_hospital')->nullable();
        
        // --- ที่อยู่ไฟล์ (File Paths) ---
        $table->string('photo_path')->nullable();
        $table->string('passport_file_path')->nullable();
        $table->string('work_permit_file_path')->nullable();
        $table->string('pink_card_file_path')->nullable();
        $table->string('myanmar_id_file_path')->nullable();
        $table->string('myanmar_house_reg_file_path')->nullable();

        $table->timestamps(); // สร้างคอลัมน์ created_at และ updated_at อัตโนมัติ
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

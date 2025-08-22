<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->string('id')->primary();
            
            // === เพิ่มคอลัมน์ทั้งหมดที่นี่ ===
            $table->string('name_th'); // ตั้งเป็น not null เพราะเป็นข้อมูลบังคับ
            $table->string('name_en')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('job_owner_id')->nullable();
            $table->string('business_type')->nullable();
            $table->date('reg_date')->nullable();
            $table->string('signer_name_th')->nullable();
            $table->string('signer_name_en')->nullable();
            $table->string('reg_capital')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('employer_document_file')->nullable();
            
            $table->timestamps(); // คอลัมน์ created_at และ updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employers');
    }
};
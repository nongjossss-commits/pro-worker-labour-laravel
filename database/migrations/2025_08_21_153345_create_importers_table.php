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
        Schema::create('importers', function (Blueprint $table) {
            // เราจะใช้ ID ที่เป็นข้อความ เช่น 'IM-0001' เหมือนเดิม
            $table->string('id')->primary();

            $table->string('name_th');
            $table->string('name_en')->nullable();
            $table->string('tax_id')->nullable()->unique();
            $table->string('license_no')->nullable();
            $table->date('license_issue_date')->nullable();
            $table->date('license_expiry_date')->nullable();
            $table->string('signer_name_th')->nullable();
            $table->string('signer_name_en')->nullable();
            
            // คอลัมน์ created_at และ updated_at อัตโนมัติ
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('importers');
    }
};

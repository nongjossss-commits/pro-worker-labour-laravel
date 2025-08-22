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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            $table->string('employer_id');
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');

            // ประเภทที่อยู่: 'registered' หรือ 'workplace'
            $table->string('address_type'); 

            // คอลัมน์สำหรับเก็บข้อมูลที่อยู่ต่างๆ (ตั้งให้เป็น nullable เพื่อความยืดหยุ่น)
            $table->string('addrNo')->nullable();
            $table->string('addrMoo')->nullable();
            $table->string('addrSoi')->nullable();
            $table->string('addrRoad')->nullable();
            $table->string('addrSubDistrict')->nullable();
            $table->string('addrDistrict')->nullable();
            $table->string('addrProvince')->nullable();
            $table->string('addrZipCode')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
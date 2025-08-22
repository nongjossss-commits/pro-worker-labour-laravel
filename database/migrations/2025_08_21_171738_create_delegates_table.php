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
    Schema::create('delegates', function (Blueprint $table) {
        $table->id();
        $table->string('name_th');
        $table->string('name_en')->nullable();
        $table->string('national_id')->unique();
        $table->string('employee_id')->unique();
        $table->date('card_issue_date')->nullable();
        $table->date('card_expiry_date')->nullable();
        $table->string('phone')->nullable();
        $table->string('email')->nullable();
        $table->string('photo_path')->nullable(); // สำหรับเก็บที่อยู่ของไฟล์รูปภาพ
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delegates');
    }
};

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
    Schema::create('agents', function (Blueprint $table) {
        $table->id(); // สร้างคอลัมน์ id เป็น Primary Key (ตัวเลขอัตโนมัติ)
        $table->string('agent_name_en'); // ชื่อเอเจนซี่ (อังกฤษ)
        $table->string('agent_license')->nullable(); // License
        $table->string('agent_phone')->nullable(); // เบอร์โทรศัพท์
        $table->string('agent_email')->nullable()->unique(); // อีเมล (ห้ามซ้ำ)
        $table->text('agent_address')->nullable(); // ที่อยู่
        $table->timestamps(); // สร้างคอลัมน์ created_at และ updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};

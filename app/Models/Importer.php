<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Importer extends Model
{
    use HasFactory;

    // ✨ บอก Laravel ว่า Primary Key ของเราไม่ใช่ id ที่เป็นตัวเลข และเราจะกำหนดเอง
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // ✨ แก้ไขชื่อคอลัมน์ทั้งหมดให้เป็น snake_case ตรงตามฐานข้อมูล
    protected $fillable = [
        'id',
        'name_th',
        'name_en',
        'tax_id',
        'license_no',
        'license_issue_date',
        'license_expiry_date',
        'signer_name_th',
        'signer_name_en',
    ];
}
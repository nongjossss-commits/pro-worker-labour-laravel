<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    // --- ⬇️ บรรทัดที่สำคัญที่สุดที่เพิ่มเข้ามา ⬇️ ---
    public $incrementing = false;
    protected $keyType = 'string';
    // --- ⬆️ สิ้นสุดส่วนที่สำคัญ ⬆️ ---

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', // <-- ยืนยันว่ามี 'id' อยู่ในนี้
        'name_th',
        'name_en',
        'tax_id',
        'job_owner_id',
        'business_type',
        'reg_date',
        'signer_name_th',
        'signer_name_en',
        'reg_capital',
        'contact_person',
        'phone_number',
        'employer_document_file',
    ];

    /**
     * ความสัมพันธ์: นายจ้าง 1 คน มีพนักงานได้หลายคน
     */
    public function employees()
    {
        return $this->hasMany(Employee::class, 'employer_id', 'id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'employeeNameTh',
        'employeeNameEn',
        'nationality',
        'passportNo',
        'passportExpireDate',
        'visaType',
        'visaExpireDate',
        'workPermitNo',
        'workPermitExpireDate',
        'ciNo',
        'ciExpireDate',
        '90daysReportDate',
        'photoPath',
    ];

    /**
     * สร้างความสัมพันธ์: พนักงานคนนี้เป็นของนายจ้างคนไหน (Many-to-One)
     */
    public function employer()
{
    return $this->belongsTo(Employer::class, 'employer_id', 'id');
}
}
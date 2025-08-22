<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'address_type',
        'addrNo',
        'addrMoo',
        'addrSoi',
        'addrRoad',
        'addrSubDistrict',
        'addrDistrict',
        'addrProvince',
        'addrZipCode',
    ];

    /**
     * สร้างความสัมพันธ์: ที่อยู่นี้เป็นของนายจ้างคนไหน (Many-to-One)
     */
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
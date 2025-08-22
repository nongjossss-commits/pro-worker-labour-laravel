<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delegate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_th',
        'name_en',
        'national_id',
        'employee_id',
        'card_issue_date',
        'card_expiry_date',
        'phone',
        'email',
        'photo_path',
    ];
}
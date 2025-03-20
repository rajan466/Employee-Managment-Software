<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    // protected $table = 'staff'; 

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'marital_status',
        'personal_email',
        'office_email',
        'mobile_no_1',
        'mobile_no_2',
        'home_address_1',
        'home_address_2',
        'emergency_name',
        'relationship',
        'emergency_phone',
        'bank_name',
        'account_number',
        'ifsc_code',
        'aadharcard_number',
        'pancard_number',
        'aadharcard_file',
        'pancard_file',
        'start_time',
        'end_time',
        'joining_date'
    ];
    
}

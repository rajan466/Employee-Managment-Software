<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'assigned_staff_id',
        'company_address',
        'contact1_name',
        'contact1_number',
        'contact2_name',
        'contact2_number',
        'contact3_name',
        'contact3_number',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'company_id', 'id');
    }
}

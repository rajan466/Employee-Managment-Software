<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'staff_id', 'project_name'];

    // Company Relationship
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Staff Relationship
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}

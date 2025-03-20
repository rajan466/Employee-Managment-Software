<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Staff;

class CompanySeeder extends Seeder
{
    public function run()
    {
        // Foreign Key Checks Disable
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // old data delete
        Company::truncate();

        // Foreign Key Checks Enable
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // fetch staff record firts
        $staff = Staff::first();

        // Company Records Insert
        Company::create([
            'company_name' => 'Tech Solutions Pvt Ltd',
            'company_address' => 'Bangalore, India',
            'contact1_name' => 'Rahul Kumar',
            'contact1_number' => '9876543210',
            'contact2_name' => 'Suresh Mehta',
            'contact2_number' => '9765432101',
            'contact3_name' => 'Ravi Singh',
            'contact3_number' => '9988776655',
            'assigned_staff_id' => $staff ? $staff->id : null,  // Assign Staff Member
        ]);

        Company::create([
            'company_name' => 'Innovatech Global',
            'company_address' => 'Mumbai, India',
            'contact1_name' => 'Anita Joshi',
            'contact1_number' => '8765432109',
            'contact2_name' => 'Neha Patel',
            'contact2_number' => '9123456780',
            'contact3_name' => 'Sunil Sharma',
            'contact3_number' => '9234567890',
            'assigned_staff_id' => $staff ? $staff->id : null,  // Assign Staff Member
        ]);
    }
}

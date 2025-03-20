<?php

namespace Database\Seeders;  

use Illuminate\Database\Seeder;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;


class StaffSeeder extends Seeder
{
    public function run()
    {
        // 🔹 Foreign key constraints disable
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // 🔹 Staff Table Ko 
        DB::table('staff')->truncate();

        // 🔹 Foreign key constraints enable
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Staff::create([
            'first_name' => 'Amit',
            'last_name' => 'Sharma',
            'date_of_birth' => '1990-05-12',
            'gender' => 'Male',
            'marital_status' => 'Married',
            'personal_email' => 'amit@example.com',  
            'office_email' => 'amit@office.com',
            'mobile_no_1' => '9876543210',
            'mobile_no_2' => '9876501234',
            'home_address_1' => 'Mumbai, India',
            'home_address_2' => 'Navi Mumbai, India',
            'emergency_name' => 'Rajesh Sharma',
            'relationship' => 'Brother',
            'emergency_phone' => '9898989898',
            'bank_name' => 'SBI Bank',
            'account_number' => '1234567890',
            'ifsc_code' => 'SBIN0001234',
            'aadharcard_number' => '123456789012',
            'pancard_number' => 'ABCDE1234F',
            'start_time' => '09:00:00',
            'end_time' => '18:00:00',
            'joining_date' => '2022-01-01',
        ]);

        Staff::create([
            'first_name' => 'Priya',
            'last_name' => 'Verma',
            'date_of_birth' => '1995-08-20',
            'gender' => 'Female',
            'marital_status' => 'Single',
            'personal_email' => 'priya@example.com',  // ✅ Alag Email
            'office_email' => 'priya@office.com',
            'mobile_no_1' => '9876512345',
            'mobile_no_2' => '9876598765',
            'home_address_1' => 'Delhi, India',
            'home_address_2' => 'South Delhi, India',
            'emergency_name' => 'Sunil Verma',
            'relationship' => 'Father',
            'emergency_phone' => '9898981234',
            'bank_name' => 'HDFC Bank',
            'account_number' => '9876543210',
            'ifsc_code' => 'HDFC0009876',
            'aadharcard_number' => '987654321012',
            'pancard_number' => 'XYZAB1234C',
            'start_time' => '10:00:00',
            'end_time' => '19:00:00',
            'joining_date' => '2022-02-01',
        ]);
    }
}

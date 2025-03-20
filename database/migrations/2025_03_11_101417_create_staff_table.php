<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('personal_email')->unique();
            $table->string('office_email')->unique()->nullable();
            $table->string('mobile_no_1')->unique();
            $table->string('mobile_no_2')->nullable();
            $table->text('home_address_1');
            $table->text('home_address_2')->nullable();
            $table->string('emergency_name');
            $table->string('relationship');
            $table->string('emergency_phone');
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('ifsc_code');
            $table->string('aadharcard_number')->unique();
            $table->string('pancard_number')->unique();
            $table->string('aadharcard_file')->nullable(); // ✅ File Path should be nullable
            $table->string('pancard_file')->nullable(); // ✅ File Path should be nullable
            $table->time('start_time')->nullable();  // ✅ Start Time
            $table->time('end_time')->nullable();
            $table->date('joining_date');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};

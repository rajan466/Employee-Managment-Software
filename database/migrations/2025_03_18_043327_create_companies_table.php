<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->unsignedBigInteger('assigned_staff_id')->nullable();
            $table->text('company_address');
            $table->string('contact1_name');
            $table->string('contact1_number');
            $table->string('contact2_name')->nullable();
            $table->string('contact2_number')->nullable();
            $table->string('contact3_name')->nullable();
            $table->string('contact3_number')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};

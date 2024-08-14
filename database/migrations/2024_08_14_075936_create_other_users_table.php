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
        Schema::create('other_users', function (Blueprint $table) {
            $table->id();
            $table->string('empId');
            $table->string('userrole')->nullable();
            $table->string('fullname')->nullable();
            $table->string('username')->nullable();
            $table->string('emailaddress')->nullable()->unique();
            $table->string('alternativeemail')->nullable()->unique();
            $table->string('mobileno')->nullable()->unique();
            $table->string('alternativephone')->unique()->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('profilepic')->nullable()->default("");
            $table->date('dob')->nullable();
            $table->boolean('marriedstatus')->nullable();
            $table->string('addharno')->nullable();
            $table->string('pancardno')->nullable();
            $table->string('passportno')->nullable();
            $table->string('depertment')->nullable();
            $table->string('location')->nullable();
            $table->string('designation')->nullable();
            $table->boolean('emptype')->nullable();
            $table->boolean('empstatus')->nullable();
            $table->enum('source_hire', ['0', '1', '2'])->nullable();
            $table->date('joinning_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_users');
    }
};

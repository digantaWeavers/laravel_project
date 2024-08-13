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
        Schema::table('users', function (Blueprint $table) {
            $table->string('empId')->after('id');
            $table->string('alternativeemail')->after('emailaddress')->unique();
            $table->string('alternativephone')->after('mobileno')->unique();
            $table->string('address')->after('password');
            $table->date('dob')->nullable();
            $table->boolean('marriedstatus');
            $table->string('addharno');
            $table->string('pancardno');
            $table->string('passportno');
            $table->string('depertment');
            $table->string('location');
            $table->string('designation');
            $table->boolean('emptype');
            $table->boolean('empstatus');
            $table->enum('source_hire', ['0', '1', '2']);
            $table->date('joinning_date')->nullable();

            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['empId', 'alternativeemail', 'alternativephone', 'address', 'dob', 'marriedstatus', 'addharno', 'pancardno', 'passportno', 'depertment', 'location', 'designation', 'emptype', 'empstatus', 'source_hire', 'joinning_date']);
        });
    }
};

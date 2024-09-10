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
        Schema::table('team_leads', function (Blueprint $table) {
            $table->unsignedBigInteger('manager_assign')->after('joinning_date')->nullable();
            $table->foreign('manager_assign')->references('id')->on('other_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('team_leads', function (Blueprint $table) {
            $table->dropForeign(['manager_assign']);
            $table->dropColumn('manager_assign');
        });
    }
};

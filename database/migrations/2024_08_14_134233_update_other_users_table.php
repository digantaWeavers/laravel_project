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
        Schema::table('other_users', function (Blueprint $table) {
            $table->unsignedBigInteger('added_by');
            $table->foreign('added_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('other_users', function (Blueprint $table) {
            // $table->dropForeign('added_by_foreign');
            // $table->dropColumn('added_by');
        });
    }
};

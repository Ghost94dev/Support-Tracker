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
        Schema::table('activity_updates', function (Blueprint $table) {
            $table->string('user_name');
            $table->string('user_role')->nullable();
            $table->string('user_department')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activity_updates', function (Blueprint $table) {
            $table->dropColumn(['user_name', 'user_role', 'user_department']);
        });
    }
};

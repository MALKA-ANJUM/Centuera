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
        Schema::table('course_schedules', function (Blueprint $table) {
            $table->string('trainner_name')->nullable()->after('end_time');
            $table->string('trainner_image')->nullable()->after('trainner_name');
            $table->string('language')->nullable()->after('trainner_image');
            $table->text('trainner_description')->nullable()->after('language');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_schedules', function (Blueprint $table) {
            $table->dropColumn(['trainner_name', 'trainner_image', 'language', 'trainner_description']);
        });
    }
};

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
        Schema::table('request_callbacks', function (Blueprint $table) {
            $table->string('message')->nullable()->after('policy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('request_callbacks', function (Blueprint $table) {
            $table->dropColumn('message');
        });
    }
};

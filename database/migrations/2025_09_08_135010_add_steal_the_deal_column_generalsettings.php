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
        Schema::table('generalsettings', function (Blueprint $table) {
            $table->string('steal_the_deal')->nullable()->after('display_offer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('generalsettings', function (Blueprint $table) {
            $table->dropColumn('steal_the_deal');
        });
    }
};

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
            $table->string('title')->after('id')->nullable();
            $table->string('middle_name')->after('first_name')->nullable();
            $table->string('gender')->after('password')->nullable();
            $table->string('dob')->after('gender')->nullable();
            $table->string('training_funded_by')->after('dob')->nullable();
            $table->string('linkedin')->after('training_funded_by')->nullable();
            $table->string('country')->after('country_code')->nullable();
            $table->string('state')->after('country')->nullable();
            $table->string('city')->after('state')->nullable();
            $table->string('address')->after('city')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};

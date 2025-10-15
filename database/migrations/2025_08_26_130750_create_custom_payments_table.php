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
        Schema::create('custom_payments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('country_code', 10)->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->string('currency', 10)->nullable();
            $table->decimal('amount', 12, 2)->nullable();
            $table->text('date')->nullable(); // store as comma-separated dates
            $table->string('referral')->nullable();
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_payments');
    }
};

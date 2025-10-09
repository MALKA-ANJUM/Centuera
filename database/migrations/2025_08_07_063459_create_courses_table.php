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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_description');
            $table->longText('description')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('overview')->nullable();
            $table->text('eligibility')->nullable();
            $table->text('prerequisites')->nullable();
            $table->string('certification_image')->nullable();
            $table->text('benefits')->nullable();
            $table->string('business_with_skilled')->nullable(); 
            $table->string('video_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

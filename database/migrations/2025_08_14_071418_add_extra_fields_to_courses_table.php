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
        Schema::table('courses', function (Blueprint $table) {
            $table->string('learner_field')->nullable()->after('training_course');
            $table->json('authorized_training_partner')->nullable()->after('learner_field');
            $table->string('rating')->nullable()->after('authorized_training_partner');
            $table->string('number_of_user_rating')->nullable()->after('rating');
            $table->text('exam_pass_guarantee')->nullable()->after('number_of_user_rating');
            $table->text('money_back_guarantee')->nullable()->after('exam_pass_guarantee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn([
                'learner_field',
                'authorized_training_partner',
                'rating',
                'number_of_user_rating',
                'exam_pass_guarantee',
                'money_back_guarantee'
            ]);
        });
    }
};

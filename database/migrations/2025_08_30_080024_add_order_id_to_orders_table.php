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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('orderId')->nullable()->after('fullname');
            $table->string('coupon_id')->nullable()->after('orderId');
            $table->string('discount')->nullable()->after('total_amount');
            $table->dropColumn('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
             $table->dropColumn('orderId');
             $table->dropColumn('coupon_id');
             $table->dropColumn('discount');
        });
    }
};

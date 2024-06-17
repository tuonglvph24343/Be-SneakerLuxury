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
        Schema::create('order_coupon', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('coupon_id');
            $table->timestamps();

            // $table->foreign('order_id')->references('id')->on('orders');
            // $table->foreign('coupon_id')->references('id')->on('coupons');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_coupon');
    }
};

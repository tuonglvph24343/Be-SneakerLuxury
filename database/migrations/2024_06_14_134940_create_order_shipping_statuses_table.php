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
        Schema::create('order_shipping_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('order_shipping_id');
            $table->string('description');
            // $table->timestamp('created_at')->useCurrent();
            // $table->unsignedBigInteger('created_by');
            $table->timestamps();
            // $table->foreign('order_shipping_id')->references('id')->on('order_shippings')->onDelete('cascade');//end
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_shipping_statuses');
    }
};

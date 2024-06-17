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
        Schema::create('variation_attribute_value', function (Blueprint $table) {
            $table->id();
            $table->integer('variation_id');
            $table->integer('attribute_value_id');
            $table->timestamps();

            // $table->foreign('variation_id')->references('id')->on('variations');
            // $table->foreign('attribute_value_id')->references('id')->on('attribute_values');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variation_attribute_value');
    }
};

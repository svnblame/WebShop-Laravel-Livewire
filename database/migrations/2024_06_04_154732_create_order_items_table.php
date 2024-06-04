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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_variant_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedInteger('price');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('amount_discount')->nullable();
            $table->unsignedInteger('amount_subtotal');
            $table->unsignedInteger('amount_tax');
            $table->unsignedInteger('amount_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};

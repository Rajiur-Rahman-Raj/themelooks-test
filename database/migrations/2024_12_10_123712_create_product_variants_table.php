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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->index()->nullable();
            $table->string('variant_name')->nullable();
            $table->string('variant_sku')->unique()->nullable();
            $table->decimal('purchase_price',8, 2)->nullable();
            $table->decimal('selling_price',8, 2)->nullable();
            $table->text('variants')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};

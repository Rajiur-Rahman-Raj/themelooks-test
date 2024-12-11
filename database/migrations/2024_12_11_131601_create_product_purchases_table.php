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
        Schema::create('product_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index()->nullable();
            $table->string('purchase_code')->nullable();
            $table->decimal('sub_total', 11, 2)->nullable();
            $table->decimal('discount', 11, 2)->nullable();
            $table->decimal('tax', 11, 2)->nullable();
            $table->decimal('grand_total', 11, 2)->nullable();
            $table->text('purchase_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_purchases');
    }
};

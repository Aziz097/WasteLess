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
        Schema::create('product', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('nama');
            $table->decimal('harga', 8, 2);
            $table->date('expired');
            $table->unsignedBigInteger('supermarket_id');
            $table->foreign('supermarket_id')->references('id')->on('supermarkets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};

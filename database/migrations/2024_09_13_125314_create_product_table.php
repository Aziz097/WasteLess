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
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id')->unique();
            //$table->timestamps();
            $table->string('nama');
            $table->string('deskripsi');
            $table->string('variasi');
            $table->decimal('harga');
            $table->decimal('diskon');
            $table->integer('stok');
            $table->string('masa_simpan');
            $table->date('expired');
            $table->decimal('berat');
            $table->integer('kode_BPOM');
            $table->timestamps();
            $table->integer('jumlah_beli')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_products');
    }
};

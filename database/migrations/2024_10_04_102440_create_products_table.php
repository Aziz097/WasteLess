<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary key (auto-increment ID)
            $table->unsignedBigInteger('supermarket_id'); // Foreign key to supermarkets
            $table->string('gambar')->nullable(); // Gambar produk (opsional)
            $table->string('nama_produk'); // Nama produk
            $table->text('deskripsi'); // Deskripsi produk
            $table->date('tanggal_kadaluarsa'); // Tanggal kadaluarsa
            $table->string('alamat_supermarket'); // Alamat supermarket
            $table->decimal('harga', 10, 2); // Harga produk
            $table->integer('stok'); // Stok produk
            $table->timestamps(); // Timestamps (created_at dan updated_at)

            // Set up foreign key constraint
            $table->foreign('supermarket_id')->references('id')->on('supermarkets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
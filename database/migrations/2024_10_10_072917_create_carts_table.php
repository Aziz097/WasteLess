<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id(); // ID untuk keranjang
            $table->unsignedBigInteger('product_id'); // Referensi ke produk
            $table->string('product_name');
            $table->integer('quantity'); // Jumlah produk dalam keranjang
            $table->decimal('price', 8, 2);
            $table->timestamps(); // Menyimpan waktu buat dan update

            // Foreign key constraint untuk product_id, menghubungkan ke tabel products
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}

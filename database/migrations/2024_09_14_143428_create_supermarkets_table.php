<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupermarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supermarkets', function (Blueprint $table) {
            $table->id(); // Primary key (ID otomatis)
            $table->string('nama_supermarket'); // Nama supermarket
            $table->text('alamat'); // Alamat supermarket
            $table->string('nama_lengkap'); // Nama lengkap pemilik atau pengelola
            $table->string('no_hp'); // Nomor HP
            $table->integer('otp_code')->nullable(); // Kode OTP (opsional)
            $table->string('password'); // Password
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supermarkets');
    }
}

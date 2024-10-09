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
        // Tabel users
        Schema::create('Users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nama lengkap atau nama supermarket
            $table->string('phone')->unique(); // nomor HP
            $table->string('password');
            $table->string('role'); // role untuk customer atau supermarket
            $table->string('npwp')->nullable(); // NPWP hanya untuk supermarket
            $table->string('address')->nullable(); // alamat hanya untuk supermarket
            $table->timestamps();
        });

        // Tabel sessions
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('users');
    }
};

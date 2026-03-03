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
        Schema::create('profil_desas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kepala_desa'); // Field untuk nama kepala desa
            $table->string('nama_kelurahan'); // Field untuk nama kelurahan
            $table->string('email')->unique(); // Field untuk email
            $table->string('kontak'); // Field untuk kontak
            $table->string('website')->nullable(); // Field untuk website
            $table->string('provinsi'); // Field untuk provinsi
            $table->string('kabupaten'); // Field untuk kabupaten
            $table->text('alamat'); // Field untuk alamat
            $table->string('logo')->nullable(); // Field untuk logo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_desas');
    }
};

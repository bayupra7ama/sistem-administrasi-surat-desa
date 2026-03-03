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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenis_surat_id'); // Relasi ke jenis_surat
            $table->unsignedBigInteger('penduduk_id');   // Relasi ke penduduk
            $table->string('status')->default('Menunggu'); // Status pengajuan: Menunggu, Disetujui, Ditolak
            $table->json('data');        // Data pengajuan dalam format JSON
            $table->string('nomor_surat')->nullable();  // Nomor surat setelah disetujui
            $table->string('file_surat')->nullable();   // Path file surat setelah dibuat
            $table->timestamps();

            // Menambahkan foreign key
            $table->foreign('jenis_surat_id')->references('id')->on('jenis_surats')->onDelete('cascade');
            $table->foreign('penduduk_id')->references('id')->on('users')->onDelete('cascade');

            // Menambahkan indeks untuk kolom yang sering digunakan dalam pencarian
            $table->index('jenis_surat_id');
            $table->index('penduduk_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};

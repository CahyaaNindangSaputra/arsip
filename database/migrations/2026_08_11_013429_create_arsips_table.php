<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arsips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Untuk mencatat bidang/pengirim
            $table->string('kode_klasifikasi');
            $table->string('nomor_berkas');
            $table->text('uraian_informasi_berkas');
            $table->text('uraian_informasi_arsip');
            $table->string('jumlah');
            $table->string('klasifikasi_keamanan_akses');
            $table->string('ket_lokasi_simpan');
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arsips');
    }
};
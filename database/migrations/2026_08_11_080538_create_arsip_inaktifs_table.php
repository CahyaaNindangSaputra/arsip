<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arsip_inaktifs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('kode_klasifikasi');
            $table->string('nomor_arsip_berkas');
            $table->text('uraian_informasi_arsip');
            $table->string('kurun_waktu');
            $table->string('jumlah');
            $table->string('tingkat_perkembangan');
            $table->string('keterangan_nomor_boks');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arsip_inaktifs');
    }
};
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $fillable = [
        'user_id', 
        'kode_klasifikasi', 
        'nomor_berkas', 
        'uraian_informasi_berkas', 
        'uraian_informasi_arsip', 
        'jumlah', 
        'klasifikasi_keamanan_akses', 
        'ket_lokasi_simpan'
    ];

    // TAMBAHKAN INI: Relasi ke tabel User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipInaktif extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit (opsional jika mengikuti konvensi Laravel)
    protected $table = 'arsip_inaktifs';

    // Kolom yang diizinkan untuk diisi secara massal (Mass Assignment)
    protected $fillable = [
        'kode_klasifikasi', 'nomor_berkas', 'uraian_informasi_arsip', 
        'jumlah', 'klasifikasi_keamanan_akses', 'ket_lokasi_simpan', 
        'pengirim', 'status', 'kurun_waktu', 'tingkat_perkembangan' // Tambahkan ini
    ];

    // Relasi ke tabel User (untuk mengetahui bidang/unit kerja pengirim)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $table = 'arsips';

    protected $fillable = [
        'user_id',
        'kode_klasifikasi',
        'nomor_berkas',
        'uraian_informasi_berkas',
        'uraian_informasi_arsip',
        'jumlah',
        'klasifikasi_keamanan_akses',
        'ket_lokasi_simpan',
        'status',
        'is_read', // <--- WAJIB ADA SUPAYA BISA DIUPDATE ADMIN
        'kurun_waktu',
        'tingkat_perkembangan',
        'nomor_boks',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
 
    public function histories()
    {
        // Kalau di database kolomnya misal 'id_arsip' atau 'arsips_id', ganti string kedua di bawah ini sesuai kolom aslinya di database!
        return $this->hasMany(ArsipHistory::class, 'arsip_id', 'id'); 
    }
}
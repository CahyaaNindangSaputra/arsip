<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $table = 'arsips';

    // Izinkan kolom-kolom ini diisi lewat form/update
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
        'kurun_waktu',
        'tingkat_perkembangan',
        'nomor_boks',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
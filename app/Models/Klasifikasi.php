<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    protected $fillable = ['parent_id', 'kode', 'nama'];

    // Relasi ke anak (Sub-klasifikasi)
    function subKlasifikasi() {
        return $this->hasMany(Klasifikasi::class, 'parent_id');
    }

    public function getCleanKodeAttribute()
    {
        // Mengubah string seperti LH.02inv.01 jadi LH.02.01 secara otomatis
        $kode = str_replace(['inv', 'eva', 'pen'], '', $this->kode);
        
        // Kalau mau lebih rapi lagi jadi format titik standar:
        return preg_replace('/LH\.02[a-z]+\./', 'LH.02.', $kode);
    }
    // Relasi ke induk
    function parent() {
        return $this->belongsTo(Klasifikasi::class, 'parent_id');
    }
}
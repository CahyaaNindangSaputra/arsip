<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipHistory extends Model
{
    use HasFactory;

    protected $fillable = ['arsip_id', 'status', 'keterangan'];

    public function arsip()
    {
        return $this->belongsTo(Arsip::class);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip; // Sesuaikan dengan nama model arsip Anda

class RakController extends Controller
{
    // Menampilkan daftar rak yang tersedia
    public function index()
    {
        $raks = Arsip::select('ket_lokasi_simpan')
                    ->whereNotNull('ket_lokasi_simpan')
                    ->distinct()
                    ->get()
                    ->map(function ($item) {
                        // Otomatis ubah semua teks lokasi rak menjadi huruf kapital agar seragam
                        return strtoupper(trim($item->ket_lokasi_simpan));
                    })
                    ->unique();
    
        return view('rak.index', compact('raks'));
    }
    
    public function show($namaRak)
    {
        // Mencari data dengan mencocokkan huruf besar/kecil di database
        $arsips = Arsip::whereRaw('UPPER(TRIM(ket_lokasi_simpan)) = ?', [strtoupper($namaRak)])->get();
    
        return view('rak.show', compact('arsips', 'namaRak'));
    }
}
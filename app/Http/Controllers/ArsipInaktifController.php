<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;

class ArsipInaktifController extends Controller
{
    // Menampilkan data arsip yang sudah dipindahkan (status = inaktif)
    public function index()
    {
        $arsips = Arsip::where('status', 'inaktif')->get();
        return view('arsip_inaktif.index', compact('arsips'));
    }

    // Fungsi logika memindahkan arsip dari aktif ke inaktif
    public function pindahkan(Request $request, $id)
    {
        $arsip = Arsip::findOrFail($id);
        
        // Update status dan simpan informasi pelengkap untuk format tabel inaktif
        $arsip->status = 'inaktif';
        $arsip->kurun_waktu = $request->kurun_waktu; // Diinput saat klik tombol pindah
        $arsip->tingkat_perkembangan = $request->tingkat_perkembangan ?? 'Asli';
        $arsip->save();
    
        return redirect()->back()->with('success', 'Arsip berhasil dipindahkan ke Daftar Arsip Inaktif.');
    }
}
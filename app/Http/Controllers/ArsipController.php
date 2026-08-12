<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use App\Models\Klasifikasi;

class ArsipController extends Controller
{
    // Menampilkan daftar arsip beserta nama pengirim (bidang)
    public function index(Request $request)
    {
        $query = Arsip::with('user');
        
        // JIKA BUKAN ADMIN (misal: pktu, skpk, sekretariat), 
        // maka data yang ditampilkan di tabel HANYA milik user yang sedang login saja!
        if (auth()->user()->role !== 'admin') {
            $query->where('user_id', auth()->id());
        }
        
        // Pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('uraian_informasi_berkas', 'like', "%{$search}%")
                  ->orWhere('nomor_berkas', 'like', "%{$search}%");
            });
        }
        
        $arsips = $query->latest()->get();
        
        return view('arsip.index', compact('arsips'));
    }
    // Menampilkan form tambah arsip
 // Menampilkan form tambah arsip
 public function create()
 {
     // Karena data di database sudah flat (tanpa parent_id), langsung ambil semua data
     $klasifikasis = Klasifikasi::all();
     
     return view('arsip.create', compact('klasifikasis'));
 }
    // Menyimpan data arsip ke database dengan menyertakan ID user yang login
    public function store(Request $request)
    {
        $request->validate([
            'kode_klasifikasi' => 'required',
            'nomor_berkas' => 'required',
            'uraian_informasi_berkas' => 'required',
            'uraian_informasi_arsip' => 'required',
            'jumlah' => 'required',
            'klasifikasi_keamanan_akses' => 'required',
            'ket_lokasi_simpan' => 'required',
        ]);
    
        // Simpan data dengan menyertakan auth()->id()
        $arsip = new Arsip();
        $arsip->user_id = auth()->id(); // Pastikan ini ada
        $arsip->kode_klasifikasi = $request->kode_klasifikasi;
        $arsip->nomor_berkas = $request->nomor_berkas;
        $arsip->uraian_informasi_berkas = $request->uraian_informasi_berkas;
        $arsip->uraian_informasi_arsip = $request->uraian_informasi_arsip;
        $arsip->jumlah = $request->jumlah;
        $arsip->klasifikasi_keamanan_akses = $request->klasifikasi_keamanan_akses;
        $arsip->ket_lokasi_simpan = $request->ket_lokasi_simpan;
        $arsip->save();
    
        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil dikirim!');
    }
    // Export data arsip ke Excel termasuk nama pengirimnya
    public function exportExcel()
    {
        // Jika admin, download semua data. Jika bidang lain, download miliknya saja.
        if (auth()->user()->role === 'admin') {
            $arsips = Arsip::with('user')->get();
        } else {
            $arsips = Arsip::with('user')->where('user_id', auth()->id())->get();
        }
        
        $fileName = "daftar-arsip-aktif-" . date('Y-m-d') . ".xls";
        
        $html = '<table border="1">
                    <thead>
                        <tr style="background-color: #d1d5db;">
                            <th>No</th>
                            <th>Kode Klasifikasi</th>
                            <th>Nomor Berkas</th>
                            <th>Uraian Informasi Berkas</th>
                            <th>Uraian Informasi Arsip</th>
                            <th>Jumlah</th>
                            <th>Klasifikasi Keamanan & Akses Arsip</th>
                            <th>Ket. Lokasi Simpan</th>
                            <th>Pengirim (Bidang)</th>
                        </tr>
                    </thead>
                    <tbody>';
                    
        foreach ($arsips as $index => $arsip) {
            $html .= '<tr>
                        <td>'.($index + 1).'</td>
                        <td>'.$arsip->kode_klasifikasi.'</td>
                        <td>'.$arsip->nomor_berkas.'</td>
                        <td>'.$arsip->uraian_informasi_berkas.'</td>
                        <td>'.$arsip->uraian_informasi_arsip.'</td>
                        <td>'.$arsip->jumlah.'</td>
                        <td>'.$arsip->klasifikasi_keamanan_akses.'</td>
                        <td>'.$arsip->ket_lokasi_simpan.'</td>
                        <td>'.($arsip->user ? $arsip->user->name : '-').'</td>
                      </tr>';
        }
        
        $html .= '</tbody></table>';
    
        return response($html)
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"');
    }
}
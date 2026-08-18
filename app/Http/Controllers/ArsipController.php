<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use App\Models\Klasifikasi;

class ArsipController extends Controller
{
    // Menampilkan daftar arsip aktif (Big Data)
    public function index(Request $request)
    {
        $query = Arsip::with('user'); 
        
        if (auth()->user()->role !== 'admin') {
            $query->where('user_id', auth()->id());
        }
        
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('uraian_informasi_berkas', 'like', "%{$search}%")
                  ->orWhere('nomor_berkas', 'like', "%{$search}%");
            });
        }
        
        // FITUR NOTIFIKASI ARSIP MASUK DARI BIDANG LAIN
        $arsipMasukLain = Arsip::with('user')
            ->where('user_id', '!=', auth()->id())
            ->where(function($q) {
                $q->where('status', 'aktif')->orWhereNull('status');
            })
            ->latest()
            ->get();
        
        $arsips = $query->latest()->get();
        return view('arsip.index', compact('arsips', 'arsipMasukLain'));
    }

    public function create()
    {
        $klasifikasis = Klasifikasi::all();
        return view('arsip.create', compact('klasifikasis'));
    }

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
    
        $arsip = new Arsip();
        $arsip->user_id = auth()->id();
        $arsip->kode_klasifikasi = $request->kode_klasifikasi;
        $arsip->nomor_berkas = $request->nomor_berkas;
        $arsip->uraian_informasi_berkas = $request->uraian_informasi_berkas;
        $arsip->uraian_informasi_arsip = $request->uraian_informasi_arsip;
        $arsip->jumlah = $request->jumlah;
        $arsip->klasifikasi_keamanan_akses = $request->klasifikasi_keamanan_akses;
        $arsip->ket_lokasi_simpan = $request->ket_lokasi_simpan;
        $arsip->status = 'aktif';
        $arsip->save();
    
 
        return redirect()->route('arsip.index')->with('success', 'Data arsip berhasil ditambahkan ke sistem!');
    }

    public function formPindah($id)
    {
        $arsip = Arsip::findOrFail($id);
        return view('arsip.form-pindah', compact('arsip'));
    }

    public function pindahkanInaktif(Request $request, $id)
    {
        $arsip = Arsip::findOrFail($id);
        $arsip->update([
            'status' => 'inaktif',
            'kurun_waktu' => $request->kurun_waktu,
            'tingkat_perkembangan' => $request->tingkat_perkembangan,
            'nomor_boks' => $request->nomor_boks,
        ]);
    
        return redirect()->route('arsip.aktif')->with('success', 'Status arsip diperbarui menjadi Pindah (Inaktif).');
    }

    public function formMusnah($id)
    {
        $arsip = Arsip::findOrFail($id);
        return view('arsip.form-musnah', compact('arsip'));
    }
    
    public function prosesMusnah(Request $request, $id)
    {
        $arsip = Arsip::findOrFail($id);
        $arsip->update([
            'status' => 'musnah',
            'kurun_waktu' => $request->kurun_waktu,
            'tingkat_perkembangan' => $request->tingkat_perkembangan,
            'nomor_boks' => $request->keterangan_nasib_akhir,
        ]);
    
        return redirect()->route('arsip.aktif')->with('success', 'Arsip berhasil diajukan ke Daftar Usul Musnah.');
    }

    public function formSerah($id)
    {
        $arsip = Arsip::findOrFail($id);
        return view('arsip.form-serah', compact('arsip'));
    }
    
    public function prosesSerah(Request $request, $id)
    {
        $arsip = Arsip::findOrFail($id);
        $arsip->update([
            'status' => 'serah',
            'kurun_waktu' => $request->kurun_waktu,
            'tingkat_perkembangan' => $request->tingkat_perkembangan,
            'nomor_boks' => $request->keterangan_nasib_akhir,
        ]);
    
        return redirect()->route('arsip.aktif')->with('success', 'Arsip berhasil diajukan ke Daftar Usul Serah.');
    }

    public function exportExcel()
    {
        $arsips = (auth()->user()->role === 'admin') 
                ? Arsip::with('user')->get() 
                : Arsip::with('user')->where('user_id', auth()->id())->get();
        
        $fileName = "daftar-arsip-aktif-" . date('Y-m-d') . ".xls";
        
        return response($this->generateHtmlExport($arsips))
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"');
    }

    public function aktif(Request $request)
    {
        $query = Arsip::with('user')->where(function($q) {
            $q->where('status', 'aktif')->orWhereNull('status');
        });

        if (auth()->user()->role !== 'admin') {
            $query->where('user_id', auth()->id());
        }

        // FITUR NOTIFIKASI ARSIP MASUK
        $arsipMasukLain = Arsip::with('user')
            ->where('user_id', '!=', auth()->id())
            ->where(function($q) {
                $q->where('status', 'aktif')->orWhereNull('status');
            })
            ->latest()
            ->get();

        // Mengambil semua data secara default, diurutkan dari yang terbaru
        $arsips = $query->latest()->get();
        return view('arsip.index', compact('arsips', 'arsipMasukLain'));
    }

    // ... (fungsi inaktif, musnah, serah, generateHtmlExport tetap ada di bawah ini, gak gue tulis ulang biar ringkas)
}
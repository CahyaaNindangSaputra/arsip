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
    
 
        return redirect()->route('dashboard')->with('success', 'Data arsip berhasil ditambahkan ke sistem!');
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

        // Mengambil semua data secara default, diurutkan dari yang terbaru
        $arsips = $query->latest()->get();
        
        // GANTI BAGIAN INI: Arahkan ke view arsip.aktif yang baru kita buat
        return view('arsip.aktif', compact('arsips'));
    }


 public function dashboard()
 {
     // 1. Hitung total semua arsip
     $totalArsip = Arsip::count();

     // 2. Hitung Arsip Aktif
     $arsipAktif = Arsip::where('status', 'aktif')->orWhereNull('status')->count();

     // 3. Hitung Arsip Inaktif / Pindah
     $arsipPindah = Arsip::whereIn('status', ['inaktif', 'pindah'])->count();

     // 4. Hitung Arsip Usul Musnah
     $arsipMusnah = Arsip::where('status', 'musnah')->count();

     // 5. Hitung Arsip Usul Serah
     $arsipSerah = Arsip::where('status', 'serah')->count();

     // 6. AMBIL SEMUA DATA (Tanpa filter status, biar tabel Big Data nampilin semuanya)
     $arsips = Arsip::with('user')->latest()->get();

     // Lempar semua datanya ke view dashboard.blade.php
     return view('dashboard', compact(
         'totalArsip', 
         'arsipAktif', 
         'arsipPindah', 
         'arsipMusnah', 
         'arsipSerah',
         'arsips'
     ));
 }
  // =====================================================================
    // FUNGSI ARSIP INAKTIF (PINDAH)
    // =====================================================================
    public function inaktif(Request $request)
    {
        $query = Arsip::with('user')->whereIn('status', ['inaktif', 'pindah']);

        if (auth()->user()->role !== 'admin') {
            $query->where('user_id', auth()->id());
        }

        // Simpan ke variabel $arsipInaktif (sesuai nama di inaktif.blade.php)
        $arsipInaktif = $query->latest()->get();
        
        // ARAHIN KE FILE inaktif.blade.php (Jangan ke index.blade.php lagi)
        return view('arsip.inaktif', compact('arsipInaktif'));
    }
    public function musnah(Request $request)
    {
        // Cari yang statusnya 'musnah'
        $query = Arsip::with('user')->where('status', 'musnah');

        if (auth()->user()->role !== 'admin') {
            $query->where('user_id', auth()->id());
        }

        $arsips = $query->latest()->get();
        
        // Lempar ke master tabel
        return view('arsip.index', compact('arsips'));
    }
    public function serah(Request $request)
    {
        // Cari yang statusnya 'serah'
        $query = Arsip::with('user')->where('status', 'serah');

        if (auth()->user()->role !== 'admin') {
            $query->where('user_id', auth()->id());
        }

        $arsips = $query->latest()->get();
        
        // Lempar ke master tabel
        return view('arsip.index', compact('arsips'));
    }
  
}
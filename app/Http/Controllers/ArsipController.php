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
        $user = auth()->user();
    
        // Pastikan query benar-benar memisahkan Admin dan User Biasa
        if ($user->role === 'admin') {
            $arsips = Arsip::with('user')->latest()->get();
        } else {
            $arsips = Arsip::with('user')
                ->where('user_id', $user->id)
                ->latest()
                ->get();
        }
    
        // Hitung statistik untuk kotak di atas
        $statQuery = $user->role === 'admin' 
            ? new Arsip() 
            : Arsip::where('user_id', $user->id);
    
        $totalArsip  = (clone $statQuery)->count();
        $arsipAktif  = (clone $statQuery)->where(function($q){ $q->where('status', 'aktif')->orWhereNull('status'); })->count();
        $arsipPindah = (clone $statQuery)->whereIn('status', ['inaktif', 'pindah'])->count();
        $arsipMusnah = (clone $statQuery)->where('status', 'musnah')->count();
        $arsipSerah  = (clone $statQuery)->where('status', 'serah')->count();
    
        return view('dashboard', compact(
            'arsips', 
            'totalArsip', 
            'arsipAktif', 
            'arsipPindah', 
            'arsipMusnah', 
            'arsipSerah'
        ));
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
    
        return redirect()->route('dashboard')->with('success', 'Status arsip diperbarui menjadi Pindah (Inaktif).');
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
    
        return redirect()->route('dashboard')->with('success', 'Arsip berhasil diajukan ke Daftar Usul Musnah.');
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

    private function generateHtmlExport($arsips)
    {
        $html = '<table border="1" cellpadding="5" cellspacing="0">';
        $html .= '<thead>
                    <tr style="background-color: #f8fafc; font-weight: bold;">
                        <th>No</th>
                        <th>Kode Klasifikasi</th>
                        <th>Nomor Berkas</th>
                        <th>Uraian Informasi Berkas</th>
                        <th>Uraian Informasi Arsip</th>
                        <th>Jumlah</th>
                        <th>Kurun Waktu</th>
                        <th>Tingkat Perkembangan</th>
                        <th>Nomor Boks</th>
                        <th>Sifat</th>
                        <th>Lokasi Simpan</th>
                        <th>Unit Pengolah</th>
                        <th>Status</th>
                    </tr>
                  </thead>';
        $html .= '<tbody>';
        
        foreach ($arsips as $index => $arsip) {
            $namaPengirim = $arsip->user ? $arsip->user->name : 'Admin';
            $statusArsip = strtoupper($arsip->status ?: 'AKTIF');
            
            $html .= '<tr>';
            $html .= '<td align="center">' . ($index + 1) . '</td>';
            $html .= '<td>' . $arsip->kode_klasifikasi . '</td>';
            $html .= '<td>' . $arsip->nomor_berkas . '</td>';
            $html .= '<td>' . $arsip->uraian_informasi_berkas . '</td>';
            $html .= '<td>' . $arsip->uraian_informasi_arsip . '</td>';
            $html .= '<td align="center">' . $arsip->jumlah . '</td>';
            $html .= '<td align="center">' . ($arsip->kurun_waktu ?? '-') . '</td>';
            $html .= '<td align="center">' . ($arsip->tingkat_perkembangan ?? '-') . '</td>';
            $html .= '<td align="center">' . ($arsip->nomor_boks ?? '-') . '</td>';
            $html .= '<td align="center">' . $arsip->klasifikasi_keamanan_akses . '</td>';
            $html .= '<td>' . $arsip->ket_lokasi_simpan . '</td>';
            $html .= '<td>' . $namaPengirim . '</td>';
            $html .= '<td align="center">' . $statusArsip . '</td>';
            $html .= '</tr>';
        }
        
        $html .= '</tbody></table>';

        return $html;
    }


    public function aktif(Request $request)
    {
        $query = Arsip::with('user')->where(function($q) {
            $q->where('status', 'aktif')->orWhereNull('status');
        });

        if (auth()->user()->role !== 'admin') {
            $query->where('user_id', auth()->id());
        }

       
        $arsips = $query->latest()->get();
       
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

        $arsipMusnah= $query->latest()->get();
        
        // Lempar ke master tabel
        return view('arsip.pemusnahan', compact('arsipMusnah'));
    }
    public function serah(Request $request)
    {
        // Cari yang statusnya 'serah'
        $query = Arsip::with('user')->where('status', 'serah');

        if (auth()->user()->role !== 'admin') {
            $query->where('user_id', auth()->id());
        }

        // Variabelnya namanya $arsips
        $arsips = $query->latest()->get();
        
        // Lempar ke master tabel (View serah), panggilnya juga harus $arsips
        return view('arsip.serah', compact('arsips'));
    }
  
}
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-extrabold text-xl text-gray-900 tracking-wide flex items-center gap-2">
                📂 <span class="text-blue-700">Daftar Arsip Aktif (Big Data)</span>
            </h2>
            <span style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%) !important; color: #ffffff !important; padding: 8px 16px; border-radius: 12px; font-weight: 900; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.35); display: inline-block; border: 1px solid rgba(255, 255, 255, 0.2);">
                Sistem Manajemen Kearsipan
            </span>
        </div>
    </x-slot>

    <!-- Alpine.js State untuk Filter Dropdown -->
    <div class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ search: '', selectedBagian: '', selectedStatus: '' }">
        
     <!-- Notifikasi Melayang Besar, Minimalis, dan Bergerak (Slide-in) -->
     @if(session('success'))
     <div x-data="{ show: true }" 
          x-init="setTimeout(() => show = false, 4000)" 
          x-show="show"
          x-transition:enter="transition ease-out duration-300"
          x-transition:enter-start="translate-y-[-20px] opacity-0"
          x-transition:enter-end="translate-y-0 opacity-100"
          x-transition:leave="transition ease-in duration-200"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
          style="position: fixed; top: 24px; right: 24px; z-index: 9999; background-color: #059669 !important; color: #ffffff !important; padding: 18px 28px; border-radius: 16px; font-weight: 900; font-size: 14px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2), 0 10px 10px -5px rgba(0, 0, 0, 0.1); display: flex; align-items: center; gap: 14px; border: 2px solid #34d399;">
         
         <span style="font-size: 20px;">✨</span>
         <div>
             <div style="font-size: 15px; font-weight: 900; letter-spacing: 0.5px;">BERHASIL!</div>
             <div style="font-size: 12px; font-weight: 700; opacity: 0.95; margin-top: 2px;">{{ session('success') }}</div>
         </div>
         
         <button @click="show = false" style="background: transparent; border: none; color: white; font-size: 16px; font-weight: bold; cursor: pointer; margin-left: 12px; opacity: 0.8;" class="hover:opacity-100">&times;</button>
     </div>
 @endif

        <!-- Card Container Utama -->
        <div class="bg-white rounded-3xl shadow-2xl border border-gray-300 overflow-hidden">
            
            <!-- Header Filter & Tombol Control -->
            <div class="p-6 border-b border-gray-300 bg-gray-100 flex flex-col xl:flex-row justify-between items-center gap-4">
                
                <!-- Filter & Search Group -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 w-full xl:w-2/3">
                    <!-- Pencarian -->
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-700 text-xs font-bold">🔍</span>
                        <input type="text" x-model="search" placeholder="Cari uraian, no berkas..." class="w-full pl-10 pr-4 py-3 bg-white border-2 border-gray-400 rounded-2xl shadow-inner text-xs font-bold text-gray-900 focus:ring-2 focus:ring-blue-700 focus:border-blue-700 transition">
                    </div>

                    <!-- Dropdown Filter Status -->
                    <div>
                        <select x-model="selectedStatus" class="w-full py-3 px-4 bg-white border-2 border-gray-400 rounded-2xl shadow-inner text-xs font-black text-gray-900 focus:ring-2 focus:ring-blue-700 focus:border-blue-700 transition">
                            <option value="">📂 Semua Status</option>
                            <option value="aktif">🟢 Aktif</option>
                            <option value="inaktif">🟡 Pindah</option>
                            <option value="musnah">🔴 Musnah</option>
                            <option value="serah">🔵 Serah</option>
                        </select>
                    </div>

                    <!-- Dropdown Filter Bidang -->
                    <div>
                        <select x-model="selectedBagian" class="w-full py-3 px-4 bg-white border-2 border-gray-400 rounded-2xl shadow-inner text-xs font-black text-gray-900 focus:ring-2 focus:ring-blue-700 focus:border-blue-700 transition">
                            <option value="">🏢 Semua Bidang</option>
                            @php $daftarBagian = \App\Models\User::where('role', '!=', 'admin')->pluck('name'); @endphp
                            @foreach($daftarBagian as $bagian)
                                <option value="{{ strtolower($bagian) }}">{{ $bagian }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Tombol Kanan Atas -->
                <div class="flex items-center gap-3 w-full xl:w-auto justify-end">
                    <a href="{{ route('arsip.exportExcel') }}" style="background-color: #15803d !important; color: white !important; padding: 12px 20px; border-radius: 12px; font-weight: 900; font-size: 12px; text-decoration: none; display: inline-block; box-shadow: 0 4px 6px rgba(0,0,0,0.15);">
                        📥 Export Excel
                    </a>
                    <a href="{{ route('arsip.create') }}" style="background-color: #1d4ed8 !important; color: white !important; padding: 12px 20px; border-radius: 12px; font-weight: 900; font-size: 12px; text-decoration: none; display: inline-block; box-shadow: 0 4px 6px rgba(0,0,0,0.15);">
                        + Tambah Arsip
                    </a>
                </div>
            </div>

            <!-- Tabel Data -->
            <div class="p-6">
                <div class="overflow-x-auto border-2 border-gray-300 rounded-2xl shadow-md">
                    <table class="w-full text-left text-xs border-collapse">
                        <thead class="bg-gray-800 text-white font-black uppercase tracking-wider text-center">
                            <tr>
                                <th class="p-3.5 border border-gray-700">No</th>
                                <th class="p-3.5 border border-gray-700">Kode</th>
                                <th class="p-3.5 border border-gray-700">No Berkas</th>
                                <th class="p-3.5 border border-gray-700 text-left">Uraian Berkas</th>
                                <th class="p-3.5 border border-gray-700 text-left">Uraian Arsip</th>
                                <th class="p-3.5 border border-gray-700">Jml</th>
                                <th class="p-3.5 border border-gray-700">Kurun</th>
                                <th class="p-3.5 border border-gray-700">Tingkat</th>
                                <th class="p-3.5 border border-gray-700">No Boks</th>
                                <th class="p-3.5 border border-gray-700">Sifat</th>
                                <th class="p-3.5 border border-gray-700">Lokasi</th>
                                <th class="p-3.5 border border-gray-700">Pengirim</th>
                                <th class="p-3.5 border border-gray-700">Status</th>
                                @if(auth()->user()->role == 'admin')
                                    <th class="p-3.5 border border-gray-700">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="divide-y-2 divide-gray-200 bg-white">
                            @forelse ($arsips as $index => $arsip)
                                @php
                                    $namaPengirim = $arsip->user ? strtolower($arsip->user->name) : '';
                                    // Memastikan status selalu terbaca, jika kosong otomatis 'aktif'
                                    $statusArsip = strtolower(trim($arsip->status ?? 'aktif')); 
                                @endphp
                                <tr class="hover:bg-blue-50 transition duration-150"
                                    x-show="(search === '' || 
                                            '{{ strtolower($arsip->uraian_informasi_berkas) }}'.includes(search.toLowerCase()) || 
                                            '{{ strtolower($arsip->nomor_berkas) }}'.includes(search.toLowerCase())) &&
                                            (selectedBagian === '' || '{{ $namaPengirim }}' === selectedBagian) &&
                                            (selectedStatus === '' || '{{ $statusArsip }}' === selectedStatus)">
                                    
                                    <td class="p-3.5 border border-gray-300 text-center font-bold text-gray-900">{{ $index + 1 }}</td>
                                    <td class="p-3.5 border border-gray-300 text-center font-black text-gray-900">{{ str_replace(['_inv', '_eva', '_pen', 'inv', 'eva', 'pen'], '', $arsip->kode_klasifikasi) }}</td>
                                    <td class="p-3.5 border border-gray-300 text-center font-bold text-gray-900">{{ $arsip->nomor_berkas }}</td>
                                    <td class="p-3.5 border border-gray-300 text-gray-900 font-bold">{{ $arsip->uraian_informasi_berkas }}</td>
                                    <td class="p-3.5 border border-gray-300 text-gray-900 font-medium">{{ $arsip->uraian_informasi_arsip }}</td>
                                    <td class="p-3.5 border border-gray-300 text-center font-black text-gray-900">{{ $arsip->jumlah }}</td>
                                    <td class="p-3.5 border border-gray-300 text-center text-gray-900 font-bold">{{ $arsip->kurun_waktu ?? '-' }}</td>
                                    <td class="p-3.5 border border-gray-300 text-center text-gray-900 font-bold">{{ $arsip->tingkat_perkembangan ?? '-' }}</td>
                                    <td class="p-3.5 border border-gray-300 text-center font-black text-gray-900">{{ $arsip->nomor_boks ?? '-' }}</td>
                                    <td class="p-3.5 border border-gray-300 text-center text-gray-900 font-bold">{{ $arsip->klasifikasi_keamanan_akses }}</td>
                                    <td class="p-3.5 border border-gray-300 text-center text-gray-900 font-bold">{{ $arsip->ket_lokasi_simpan }}</td>
                                    <td class="p-3.5 border border-gray-300 text-center font-black text-blue-800">{{ $arsip->user ? $arsip->user->name : '-' }}</td>
                                    
                                    <td class="p-3.5 border border-gray-300 text-center">
                                        @php
                                            $st = strtolower(trim($arsip->status ?? 'aktif'));
                                            if(empty($st)) { $st = 'aktif'; }
                                        @endphp
                                    
                                        @if($st == 'inaktif' || $st == 'pindah') 
                                            <span style="background-color: #f59e0b !important; color: #ffffff !important; padding: 5px 12px; border-radius: 6px; font-weight: 900; font-size: 10px; display: inline-block;">PINDAH</span>
                                        @elseif($st == 'musnah') 
                                            <span style="background-color: #dc2626 !important; color: #ffffff !important; padding: 5px 12px; border-radius: 6px; font-weight: 900; font-size: 10px; display: inline-block;">MUSNAH</span>
                                        @elseif($st == 'serah') 
                                            <span style="background-color: #059669 !important; color: #ffffff !important; padding: 5px 12px; border-radius: 6px; font-weight: 900; font-size: 10px; display: inline-block;">SERAH</span>
                                        @else 
                                            <span style="background-color: #1f2937 !important; color: #ffffff !important; padding: 5px 12px; border-radius: 6px; font-weight: 900; font-size: 10px; display: inline-block;">AKTIF</span> 
                                        @endif
                                    </td>

                                    <!-- Tombol Aksi Lifecycle Berwarna Penuh & Tegas -->
                                    @if(auth()->user()->role == 'admin')
                                        <td class="p-3.5 border border-gray-300 text-center">
                                            <div class="flex items-center justify-center gap-1.5">
                                                <a href="{{ route('arsip.form_pindah', $arsip->id) }}" style="background-color: #d97706; color: white; padding: 6px 10px; border-radius: 6px; font-weight: 900; font-size: 10px; text-decoration: none; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">PINDAH</a>
                                                <a href="{{ route('arsip.form_musnah', $arsip->id) }}" style="background-color: #dc2626; color: white; padding: 6px 10px; border-radius: 6px; font-weight: 900; font-size: 10px; text-decoration: none; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">MUSNAH</a>
                                                <a href="{{ route('arsip.form_serah', $arsip->id) }}" style="background-color: #059669; color: white; padding: 6px 10px; border-radius: 6px; font-weight: 900; font-size: 10px; text-decoration: none; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">SERAH</a>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ auth()->user()->role == 'admin' ? 14 : 13 }}" class="p-12 text-center text-gray-600 font-black italic">
                                        Belum ada data arsip yang tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
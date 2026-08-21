<x-app-layout>
    <div class="w-full p-4 sm:p-6 lg:p-8 pt-6" x-data="{ search: '', selectedBagian: '', selectedStatus: '' }">
        
        <!-- HEADER HALAMAN -->
        <div class="flex flex-col sm:flex-row items-center justify-between mb-6 gap-4">
            <h2 class="font-bold text-2xl text-slate-800 flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600">
                    <i class="fas fa-folder-open text-lg"></i>
                </div>
                <span>Daftar Arsip Aktif</span>
            </h2>
            <div class="bg-white border border-slate-200 px-4 py-2 rounded-lg text-xs font-semibold text-slate-500 shadow-sm">
                Sistem Manajemen Kearsipan
            </div>
        </div>

        <!-- Notifikasi -->
        @if(session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition class="fixed top-6 right-6 z-50 bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-lg shadow-lg flex items-center gap-3">
             <i class="fas fa-check-circle text-emerald-500 text-lg"></i>
             <div>
                 <p class="font-bold text-sm">Berhasil!</p>
                 <p class="text-xs">{{ session('success') }}</p>
             </div>
             <button @click="show = false" class="ml-4 text-emerald-500 hover:text-emerald-700"><i class="fas fa-times"></i></button>
        </div>
        @endif

        <!-- KARTU DATA -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            
            <!-- Filter & Pencarian -->
            <div class="p-5 border-b border-slate-200 bg-slate-50/50 flex flex-col xl:flex-row justify-between items-center gap-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 w-full xl:w-2/3">
                    
                    <!-- Pencarian -->
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <i class="fas fa-search text-sm"></i>
                        </span>
                        <input type="text" x-model="search" placeholder="Cari uraian, no berkas..." class="w-full pl-9 pr-3 py-2 bg-white border border-slate-300 rounded-md text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-shadow">
                    </div>

                    <!-- Dropdown Filter Status -->
                    <select x-model="selectedStatus" class="w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-shadow">
                        <option value="">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="inaktif">Pindah (Inaktif)</option>
                        <option value="musnah">Musnah</option>
                        <option value="serah">Serah</option>
                    </select>

                    <!-- Dropdown Filter Bidang -->
                    <select x-model="selectedBagian" class="w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-shadow">
                        <option value="">Semua Bidang</option>
                        @php $daftarBagian = \App\Models\User::where('role', '!=', 'admin')->pluck('name'); @endphp
                        @foreach($daftarBagian as $bagian)
                            <option value="{{ strtolower($bagian) }}">{{ $bagian }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tombol Action -->
                <div class="flex items-center gap-2 w-full xl:w-auto justify-end">
                    <a href="{{ route('arsip.exportExcel') }}" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-md text-xs font-semibold transition-colors shadow-sm">
                        <i class="fas fa-file-excel"></i> Export Excel
                    </a>
                    <a href="{{ route('arsip.create') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-xs font-semibold transition-colors shadow-sm">
                        <i class="fas fa-plus"></i> Tambah Arsip
                    </a>
                </div>
            </div>

            <!-- TABEL DATA -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm border-collapse min-w-[1200px]">
                    <thead class="bg-slate-100 text-slate-600 border-b border-slate-200">
                        <tr>
                            <th class="px-4 py-3 font-semibold w-16 text-center">No</th>
                            <th class="px-4 py-3 font-semibold text-center">Kode</th>
                            <th class="px-4 py-3 font-semibold">No Berkas</th>
                            <th class="px-4 py-3 font-semibold min-w-[200px]">Uraian Berkas</th>
                            <th class="px-4 py-3 font-semibold min-w-[200px]">Uraian Arsip</th>
                            <th class="px-4 py-3 font-semibold text-center">Jml</th>
                            <th class="px-4 py-3 font-semibold text-center">Kurun</th>
                            <th class="px-4 py-3 font-semibold text-center">Tingkat</th>
                            <th class="px-4 py-3 font-semibold text-center">No Boks</th>
                            <th class="px-4 py-3 font-semibold">Sifat</th>
                            <th class="px-4 py-3 font-semibold">Lokasi</th>
                            <th class="px-4 py-3 font-semibold">Pengirim</th>
                            <th class="px-4 py-3 font-semibold text-center">Status</th>
                            @if(auth()->user()->role == 'admin')
                                <th class="px-4 py-3 font-semibold text-center">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white text-slate-700">
                        @forelse ($arsips as $index => $arsip)
                            @php
                                $namaPengirim = $arsip->user ? strtolower($arsip->user->name) : '';
                                $statusArsip = strtolower(trim($arsip->status ?? 'aktif')); 
                            @endphp
                            <tr class="hover:bg-slate-50 transition-colors"
                                x-show="(search === '' || 
                                        '{{ strtolower($arsip->uraian_informasi_berkas) }}'.includes(search.toLowerCase()) || 
                                        '{{ strtolower($arsip->nomor_berkas) }}'.includes(search.toLowerCase())) &&
                                        (selectedBagian === '' || '{{ $namaPengirim }}' === selectedBagian) &&
                                        (selectedStatus === '' || '{{ $statusArsip }}' === selectedStatus)">
                                
                                <td class="px-4 py-3 text-center">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 text-center font-medium text-blue-600">{{ str_replace(['_inv', '_eva', '_pen', 'inv', 'eva', 'pen'], '', $arsip->kode_klasifikasi) }}</td>
                                <td class="px-4 py-3">{{ $arsip->nomor_berkas }}</td>
                                <td class="px-4 py-3">{{ $arsip->uraian_informasi_berkas }}</td>
                                <td class="px-4 py-3 text-slate-500">{{ $arsip->uraian_informasi_arsip }}</td>
                                <td class="px-4 py-3 text-center">{{ $arsip->jumlah }}</td>
                                <td class="px-4 py-3 text-center text-slate-500">{{ $arsip->kurun_waktu ?? '-' }}</td>
                                <td class="px-4 py-3 text-center text-slate-500">{{ $arsip->tingkat_perkembangan ?? '-' }}</td>
                                <td class="px-4 py-3 text-center font-medium">{{ $arsip->nomor_boks ?? '-' }}</td>
                                <td class="px-4 py-3 text-slate-500">{{ $arsip->klasifikasi_keamanan_akses }}</td>
                                <td class="px-4 py-3 text-slate-500">{{ $arsip->ket_lokasi_simpan }}</td>
                                <td class="px-4 py-3 font-medium">{{ $arsip->user ? $arsip->user->name : '-' }}</td>
                                
                                <td class="px-4 py-3 text-center">
                                    @php
                                        $st = strtolower(trim($arsip->status ?? 'aktif'));
                                        if(empty($st)) { $st = 'aktif'; }
                                    @endphp
                                    @if($st == 'inaktif' || $st == 'pindah') 
                                        <span class="bg-amber-100 text-amber-700 px-2.5 py-1 rounded-full text-[10px] font-bold">PINDAH</span>
                                    @elseif($st == 'musnah') 
                                        <span class="bg-rose-100 text-rose-700 px-2.5 py-1 rounded-full text-[10px] font-bold">MUSNAH</span>
                                    @elseif($st == 'serah') 
                                        <span class="bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-full text-[10px] font-bold">SERAH</span>
                                    @else 
                                        <span class="bg-slate-100 text-slate-700 px-2.5 py-1 rounded-full text-[10px] font-bold">AKTIF</span> 
                                    @endif
                                </td>

                                @if(auth()->user()->role == 'admin')
                                    <td class="px-4 py-3 text-center">
                                        <div class="flex items-center justify-center gap-1">
                                            <a href="{{ route('arsip.form_pindah', $arsip->id) }}" class="text-amber-600 hover:bg-amber-50 px-2 py-1 rounded text-xs font-semibold transition-colors">Pindah</a>
                                            <a href="{{ route('arsip.form_musnah', $arsip->id) }}" class="text-rose-600 hover:bg-rose-50 px-2 py-1 rounded text-xs font-semibold transition-colors">Musnah</a>
                                            <a href="{{ route('arsip.form_serah', $arsip->id) }}" class="text-emerald-600 hover:bg-emerald-50 px-2 py-1 rounded text-xs font-semibold transition-colors">Serah</a>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ auth()->user()->role == 'admin' ? 14 : 13 }}" class="px-4 py-12 text-center text-slate-400">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="fas fa-inbox text-3xl mb-2 text-slate-300"></i>
                                        <p class="text-sm">Belum ada data arsip yang tersedia.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
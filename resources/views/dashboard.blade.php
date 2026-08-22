<x-app-layout>
    <!-- Dummy Data Sementara -->
    @php
        $totalArsip = $totalArsip ?? \App\Models\Arsip::count();
        $arsipAktif = $arsipAktif ?? \App\Models\Arsip::where('status', 'aktif')->orWhereNull('status')->count();
        $arsipPindah = $arsipPindah ?? \App\Models\Arsip::whereIn('status', ['inaktif', 'pindah'])->count();
        $arsipMusnah = $arsipMusnah ?? \App\Models\Arsip::where('status', 'musnah')->count();
        $arsipSerah = $arsipSerah ?? \App\Models\Arsip::where('status', 'serah')->count();
        $arsips = $arsips ?? \App\Models\Arsip::latest()->get(); 
    @endphp

    <div class="w-full p-4 sm:p-6 lg:p-8 pt-6">
        
        <!-- HEADER DASHBOARD BIG DATA -->
        <div class="flex flex-col sm:flex-row items-center justify-between mb-6 gap-4">
            <div>
                <h2 class="font-bold text-2xl text-slate-800 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-blue-600 flex items-center justify-center text-white shadow-md">
                        <i class="fas fa-chart-pie text-lg"></i>
                    </div>
                    <span>Analisis <span class="text-blue-600">Big Data</span> Kearsipan</span>
                </h2>
            </div>
            <div class="bg-white border border-slate-200 px-4 py-2 rounded-lg text-xs font-semibold text-slate-500 shadow-sm flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Sistem Terkoneksi
            </div>
        </div>

        <!-- 5 KOTAK ANALISIS -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-8">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 text-xl shrink-0"><i class="fas fa-database"></i></div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Total Data</p>
                    <h3 class="text-xl font-black text-slate-800">{{ $totalArsip }}</h3>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 text-xl shrink-0"><i class="fas fa-folder-open"></i></div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Arsip Aktif</p>
                    <h3 class="text-xl font-black text-slate-800">{{ $arsipAktif }}</h3>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-amber-50 flex items-center justify-center text-amber-500 text-xl shrink-0"><i class="fas fa-box-archive"></i></div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Inaktif (Pindah)</p>
                    <h3 class="text-xl font-black text-slate-800">{{ $arsipPindah }}</h3>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-rose-50 flex items-center justify-center text-rose-600 text-xl shrink-0"><i class="fas fa-fire-alt"></i></div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Usul Musnah</p>
                    <h3 class="text-xl font-black text-slate-800">{{ $arsipMusnah }}</h3>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 text-xl shrink-0"><i class="fas fa-file-export"></i></div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Usul Serah</p>
                    <h3 class="text-xl font-black text-slate-800">{{ $arsipSerah }}</h3>
                </div>
            </div>
        </div>

        <!-- TABEL ARSIP -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden" x-data="{ search: '', selectedBagian: '', selectedStatus: '' }">
            
            <!-- Toolbar: Search, Filter, Buttons -->
            <div class="p-4 border-b border-slate-200 flex flex-col lg:flex-row justify-between items-center gap-4">
                <div class="flex flex-col sm:flex-row items-center gap-3 w-full lg:w-auto">
                    <div class="relative w-full sm:w-64">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400"><i class="fas fa-search text-sm"></i></span>
                        <input type="text" x-model="search" placeholder="Cari uraian, no berkas..." class="w-full pl-9 pr-3 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <select x-model="selectedStatus" class="w-full sm:w-40 px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="inaktif">Pindah</option>
                        <option value="musnah">Musnah</option>
                        <option value="serah">Serah</option>
                    </select>
                    <select x-model="selectedBagian" class="w-full sm:w-40 px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua Bidang</option>
                        @php $daftarBagian = \App\Models\User::where('role', '!=', 'admin')->pluck('name'); @endphp
                        @foreach($daftarBagian as $bagian)
                            <option value="{{ strtolower($bagian) }}">{{ $bagian }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center gap-2 w-full lg:w-auto justify-end">
                    <a href="{{ route('arsip.exportExcel') }}" class="inline-flex items-center gap-2 bg-[#10b981] hover:bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                        <i class="fas fa-file-excel"></i> Export Excel
                    </a>
                </div>
            </div>

            <!-- Tabel (Dengan Aksi dan Unit Pengolah) -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm border-collapse whitespace-nowrap min-w-[1300px]">
                    <thead class="bg-[#f8fafc] text-slate-600 border-b border-slate-200">
                        <tr>
                            <th class="px-5 py-3.5 font-semibold text-center w-16">No</th>
                            <th class="px-5 py-3.5 font-semibold">Kode</th>
                            <th class="px-5 py-3.5 font-semibold">No Berkas</th>
                            <th class="px-5 py-3.5 font-semibold">Uraian Berkas</th>
                            <th class="px-5 py-3.5 font-semibold">Uraian Arsip</th>
                            <th class="px-5 py-3.5 font-semibold text-center">Jml</th>
                            <th class="px-5 py-3.5 font-semibold text-center">Kurun</th>
                            <th class="px-5 py-3.5 font-semibold text-center">Tingkat</th>
                            <th class="px-5 py-3.5 font-semibold text-center">No Boks</th>
                            <th class="px-5 py-3.5 font-semibold text-center">Sifat</th>
                            <th class="px-5 py-3.5 font-semibold text-center">Lokasi</th>
                            <th class="px-5 py-3.5 font-semibold">Unit Pengolah</th>
                            <th class="px-5 py-3.5 font-semibold text-center">Status</th>
                            @if(auth()->user()->role == 'admin')
                                <th class="px-5 py-3.5 font-semibold text-center">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 bg-white text-slate-600">
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
                                
                                <td class="px-5 py-3 text-center">{{ $index + 1 }}</td>
                                <td class="px-5 py-3 font-medium text-blue-600">{{ str_replace(['_inv', '_eva', '_pen', 'inv', 'eva', 'pen'], '', $arsip->kode_klasifikasi) }}</td>
                                <td class="px-5 py-3 text-slate-700">{{ $arsip->nomor_berkas }}</td>
                                <td class="px-5 py-3 text-slate-700">{{ $arsip->uraian_informasi_berkas }}</td>
                                <td class="px-5 py-3 text-slate-400">{{ $arsip->uraian_informasi_arsip }}</td>
                                <td class="px-5 py-3 text-center text-slate-700">{{ $arsip->jumlah }}</td>
                                <td class="px-5 py-3 text-center text-slate-400">{{ $arsip->kurun_waktu ?? '-' }}</td>
                                <td class="px-5 py-3 text-center text-slate-400">{{ $arsip->tingkat_perkembangan ?? '-' }}</td>
                                <td class="px-5 py-3 text-center text-slate-400">{{ $arsip->nomor_boks ?? '-' }}</td>
                                <td class="px-5 py-3 text-center text-slate-400">{{ $arsip->klasifikasi_keamanan_akses }}</td>
                                <td class="px-5 py-3 text-center text-slate-400">{{ $arsip->ket_lokasi_simpan }}</td>
                                <td class="px-5 py-3 text-slate-700 font-medium">{{ $arsip->user ? $arsip->user->name : 'Admin' }}</td>
                                <td class="px-5 py-3 text-center">
                                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider shadow-sm">
                                        {{ $statusArsip ?: 'AKTIF' }}
                                    </span>
                                </td>
                                
                                <!-- Kembalinya Kolom Aksi -->
                                @if(auth()->user()->role == 'admin')
                                    <td class="px-5 py-3 text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            <a href="{{ route('arsip.form_pindah', $arsip->id) }}" class="text-orange-500 hover:text-orange-600 font-semibold text-xs transition-colors">Pindah</a>
                                            <a href="{{ route('arsip.form_musnah', $arsip->id) }}" class="text-rose-500 hover:text-rose-600 font-semibold text-xs transition-colors">Musnah</a>
                                            <a href="{{ route('arsip.form_serah', $arsip->id) }}" class="text-emerald-500 hover:text-emerald-600 font-semibold text-xs transition-colors">Serah</a>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="14" class="px-4 py-12 text-center text-slate-400">
                                    Belum ada data arsip yang tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
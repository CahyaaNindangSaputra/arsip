<x-app-layout>
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

        <!-- 5 KOTAK ANALISIS (OTOMATIS MENGIKUTI USER YANG LOGIN) -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-8">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 text-xl shrink-0"><i class="fas fa-database"></i></div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Total Data</p>
                    <h3 class="text-xl font-black text-slate-800">{{ $totalArsip ?? 0 }}</h3>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 text-xl shrink-0"><i class="fas fa-folder-open"></i></div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Arsip Aktif</p>
                    <h3 class="text-xl font-black text-slate-800">{{ $arsipAktif ?? 0 }}</h3>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-amber-50 flex items-center justify-center text-amber-500 text-xl shrink-0"><i class="fas fa-box-archive"></i></div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Inaktif (Pindah)</p>
                    <h3 class="text-xl font-black text-slate-800">{{ $arsipPindah ?? 0 }}</h3>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-rose-50 flex items-center justify-center text-rose-600 text-xl shrink-0"><i class="fas fa-fire-alt"></i></div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Usul Musnah</p>
                    <h3 class="text-xl font-black text-slate-800">{{ $arsipMusnah ?? 0 }}</h3>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 text-xl shrink-0"><i class="fas fa-file-export"></i></div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Usul Serah</p>
                    <h3 class="text-xl font-black text-slate-800">{{ $arsipSerah ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <!-- TABEL ARSIP DENGAN ALPINE.JS -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden" 
             x-data="{ 
                search: '', 
                selectedBagian: '', 
                selectedStatus: '',
                showHistoryModal: false,
                hist_no: '',
                hist_created: '',
                hist_updated: '',
                hist_status: '',
                openHistory(no, created, updated, status) {
                    this.hist_no = no;
                    this.hist_created = created;
                    this.hist_updated = updated;
                    this.hist_status = status || 'AKTIF';
                    this.showHistoryModal = true;
                }
             }">
            
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
                    @if(auth()->user()->role == 'admin')
                    <select x-model="selectedBagian" class="w-full sm:w-40 px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua Bidang</option>
                        @php $daftarBagian = \App\Models\User::where('role', '!=', 'admin')->pluck('name'); @endphp
                        @foreach($daftarBagian as $bagian)
                            <option value="{{ strtolower($bagian) }}">{{ $bagian }}</option>
                        @endforeach
                    </select>
                    @endif
                </div>
                <div class="flex items-center gap-2 w-full lg:w-auto justify-end">
                    <a href="{{ route('arsip.exportExcel') }}" class="inline-flex items-center gap-2 bg-[#10b981] hover:bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                        <i class="fas fa-file-excel"></i> Export Excel
                    </a>
                </div>
            </div>

            <!-- Tabel -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm border-collapse whitespace-nowrap min-w-[1300px]">
                    <thead class="bg-[#f8fafc] text-slate-600 border-b border-slate-200">
                        <tr>
                            <th class="px-5 py-3.5 font-semibold text-center w-16">No</th>
                            <th class="px-5 py-3.5 font-semibold">Kode Klasifikasi</th>
                            <th class="px-5 py-3.5 font-semibold">Nomor Berkas</th>
                            <th class="px-5 py-3.5 font-semibold">Uraian Berkas</th>
                            <th class="px-5 py-3.5 font-semibold">Uraian Arsip</th>
                            <th class="px-5 py-3.5 font-semibold text-center">Jumlah</th>
                            <th class="px-5 py-3.5 font-semibold text-center">Kurun Waktu</th>
                            <th class="px-5 py-3.5 font-semibold text-center">Tingkat Perkembangan</th>
                            <th class="px-5 py-3.5 font-semibold text-center">No Boks</th>
                            <th class="px-5 py-3.5 font-semibold text-center">Klasifikasi Keamanan & Akses Arsip</th>
                            <th class="px-5 py-3.5 font-semibold text-center">Ket. Lokasi Simpan</th>
                            @if(auth()->user()->role == 'admin')
                                <th class="px-5 py-3.5 font-semibold">Unit Pengolah</th>
                            @endif
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
                            
                            $bersihKode = str_replace(['_inv', '_eva', '_pen', 'inv', 'eva', 'pen'], '', $arsip->kode_klasifikasi);
                            
                            $current = \App\Models\Klasifikasi::where('kode', $bersihKode)->first();
                            
                            $jalurHierarki = [];
                            $itemIterasi = $current;
                            while ($itemIterasi) {
                                $jalurHierarki[] = "[" . $itemIterasi->kode . "] " . $itemIterasi->nama;
                                $itemIterasi = \App\Models\Klasifikasi::find($itemIterasi->parent_id);
                            }
                            
                            $jalurHierarki = array_reverse($jalurHierarki);
                            $keteranganKode = count($jalurHierarki) > 0 ? implode(" ➔ ", $jalurHierarki) : 'Penjelasan klasifikasi tidak ditemukan';
                        @endphp
                            <tr class="hover:bg-slate-50 transition-colors"
                                x-show="(search === '' || 
                                        '{{ strtolower($arsip->uraian_informasi_berkas) }}'.includes(search.toLowerCase()) || 
                                        '{{ strtolower($arsip->nomor_berkas) }}'.includes(search.toLowerCase())) &&
                                        (selectedBagian === '' || '{{ $namaPengirim }}' === selectedBagian) &&
                                        (selectedStatus === '' || '{{ $statusArsip }}' === selectedStatus)">
                                
                                <!-- NOMOR URUT DENGAN TOMBOL HISTORY -->
                                <td class="px-5 py-3 text-center">
                                    <button @click="openHistory(
                                                '{{ $index + 1 }}', 
                                                '{{ $arsip->created_at ? $arsip->created_at->format('d M Y, H:i') : '-' }}', 
                                                '{{ $arsip->updated_at ? $arsip->updated_at->format('d M Y, H:i') : '-' }}', 
                                                '{{ strtoupper($arsip->status ?: 'AKTIF') }}'
                                            )" 
                                            class="w-8 h-8 rounded-full bg-slate-100 hover:bg-blue-100 text-slate-700 hover:text-blue-600 font-bold flex items-center justify-center mx-auto transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm"
                                            title="Klik untuk lihat riwayat aktivitas">
                                        {{ $index + 1 }}
                                    </button>
                                </td>
                                
                                <td class="px-5 py-3 font-medium text-blue-600">
                                    <span title="{{ $keteranganKode }}" class="cursor-pointer underline decoration-dotted decoration-blue-300">
                                        {{ $bersihKode }}
                                    </span>
                                </td>

                                <td class="px-5 py-3 text-slate-700">{{ $arsip->nomor_berkas }}</td>
                                <td class="px-5 py-3 text-slate-700">{{ $arsip->uraian_informasi_berkas }}</td>
                                <td class="px-5 py-3 text-slate-400">{{ $arsip->uraian_informasi_arsip }}</td>
                                <td class="px-5 py-3 text-center text-slate-700">{{ $arsip->jumlah }}</td>
                                <td class="px-5 py-3 text-center text-slate-400">{{ $arsip->kurun_waktu ?? '-' }}</td>
                                <td class="px-5 py-3 text-center text-slate-400">{{ $arsip->tingkat_perkembangan ?? '-' }}</td>
                                <td class="px-5 py-3 text-center text-slate-400">{{ $arsip->nomor_boks ?? '-' }}</td>
                                <td class="px-5 py-3 text-center text-slate-400">{{ $arsip->klasifikasi_keamanan_akses }}</td>
                                <td class="px-5 py-3 text-center text-slate-400">{{ $arsip->ket_lokasi_simpan }}</td>
                                
                                @if(auth()->user()->role == 'admin')
                                    <td class="px-5 py-3 text-slate-700 font-medium">{{ $arsip->user ? $arsip->user->name : 'Admin' }}</td>
                                @endif

                                <td class="px-5 py-3 text-center">
                                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider shadow-sm">
                                        {{ $statusArsip ?: 'AKTIF' }}
                                    </span>
                                </td>
                                
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

            <!-- MODAL RIWAYAT AKTIVITAS (TIMELINE) -->
            <div x-show="showHistoryModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm" x-transition.opacity>
                <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all" 
                     x-show="showHistoryModal" 
                     x-transition:enter="ease-out duration-300" 
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                     @click.outside="showHistoryModal = false">
                    
                    <!-- Header Modal -->
                    <div class="bg-slate-50 border-b border-slate-100 px-6 py-4 flex justify-between items-center">
                        <h3 class="font-bold text-slate-800 text-lg flex items-center gap-2">
                            <i class="fas fa-clock text-blue-500"></i> Riwayat Arsip No. <span x-text="hist_no"></span>
                        </h3>
                        <button @click="showHistoryModal = false" class="text-slate-400 hover:text-rose-500 transition-colors rounded-full p-1 hover:bg-rose-50">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <!-- Body Modal (Timeline) -->
                    <div class="p-6 bg-white">
                        <div class="relative border-l-2 border-slate-200 ml-4 space-y-8">
                            
                            <!-- Item Timeline 1: Dibuat -->
                            <div class="relative">
                                <div class="absolute -left-[25px] bg-emerald-100 text-emerald-600 w-12 h-12 rounded-full flex items-center justify-center border-4 border-white shadow-sm">
                                    <i class="fas fa-file-circle-plus text-lg"></i>
                                </div>
                                <div class="ml-10">
                                    <p class="text-sm font-bold text-slate-800">Arsip Didaftarkan</p>
                                    <p class="text-xs text-slate-500 mt-0.5">Sistem mencatat arsip pertama kali masuk.</p>
                                    <div class="mt-2 inline-block bg-slate-50 text-slate-600 px-3 py-1 rounded-md text-xs font-medium border border-slate-200">
                                        <i class="far fa-calendar-alt mr-1"></i> <span x-text="hist_created"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Item Timeline 2: Diubah / Status Terakhir -->
                            <div class="relative">
                                <div class="absolute -left-[25px] bg-blue-100 text-blue-600 w-12 h-12 rounded-full flex items-center justify-center border-4 border-white shadow-sm">
                                    <i class="fas fa-exchange-alt text-lg"></i>
                                </div>
                                <div class="ml-10">
                                    <p class="text-sm font-bold text-slate-800">Status Terakhir</p>
                                    <p class="text-xs text-slate-500 mt-0.5">Status nasib akhir arsip saat ini:</p>
                                    
                                    <div class="mt-2 mb-2 inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider"
                                         :class="{
                                             'bg-emerald-100 text-emerald-700': hist_status === 'AKTIF',
                                             'bg-amber-100 text-amber-700': hist_status === 'INAKTIF' || hist_status === 'PINDAH',
                                             'bg-rose-100 text-rose-700': hist_status === 'MUSNAH',
                                             'bg-indigo-100 text-indigo-700': hist_status === 'SERAH'
                                         }" x-text="hist_status">
                                    </div>

                                    <div class="block bg-slate-50 text-slate-600 px-3 py-1 rounded-md text-xs font-medium border border-slate-200 w-max">
                                        <i class="far fa-calendar-check mr-1"></i> <span x-text="hist_updated"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Footer Modal -->
                    <div class="bg-slate-50 border-t border-slate-100 px-6 py-4 flex justify-end">
                        <button @click="showHistoryModal = false" class="bg-slate-200 hover:bg-slate-300 text-slate-700 px-5 py-2 rounded-lg text-sm font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-slate-400">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
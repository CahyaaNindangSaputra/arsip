<x-app-layout>
    <div class="w-full p-4 sm:p-6 lg:p-8 pt-6" 
         x-data="{ 
            showModal: false, 
            activeArsip: null,
            hist_no: '',
            hist_created: '',
            hist_updated: '',
            
            openDetail(arsipData, no, created, updated) {
                this.activeArsip = arsipData;
                this.hist_no = no;
                this.hist_created = created;
                this.hist_updated = updated;
                this.showModal = true;
            }
         }">
        
        <!-- Header Judul -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="font-bold text-2xl text-slate-800 flex items-center gap-2">
                <span class="text-amber-500">📦</span> Daftar Arsip Inaktif <span class="text-rose-600">Usul Musnah</span>
            </h2>
        </div>

        <!-- Tabel Data -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <table class="w-full text-left text-sm border-collapse">
                <thead class="bg-slate-50 text-slate-600 border-b border-slate-200">
                    <tr>
                        <th class="px-5 py-3.5 text-center w-16">No</th>
                        <th class="px-5 py-3.5">Jenis/Seri Arsip (Uraian)</th>
                        <th class="px-5 py-3.5 text-center">Tingkat Perkembangan</th>
                        <th class="px-5 py-3.5 text-center">Kurun Waktu</th>
                        <th class="px-5 py-3.5 text-center">Jumlah</th>
                        <th class="px-5 py-3.5 text-center">Keterangan Nasib Akhir</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($arsipMusnah as $index => $arsip)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-5 py-3 text-center font-semibold text-slate-500">{{ $index + 1 }}</td>
                            
                            <!-- JENIS/SERI ARSIP BISA DIKLIK BUAT LIHAT DETAIL & RIWAYAT -->
                            <td class="px-5 py-3">
                                <button @click="openDetail(
                                            @js($arsip),
                                            '{{ $index + 1 }}', 
                                            '{{ $arsip->created_at ? $arsip->created_at->format('d M Y, H:i') : '-' }}', 
                                            '{{ $arsip->updated_at ? $arsip->updated_at->format('d M Y, H:i') : '-' }}'
                                        )" 
                                        class="font-semibold text-blue-600 hover:text-blue-800 hover:underline text-left flex items-start gap-2 group outline-none">
                                    <i class="fas fa-history mt-0.5 text-xs text-slate-400 group-hover:text-blue-600 transition-colors"></i>
                                    <span class="line-clamp-2">{{ $arsip->uraian_informasi_berkas }}</span>
                                </button>
                                <span class="text-xs text-slate-400 block mt-1 ml-5">Kode: {{ $arsip->kode_klasifikasi }}</span>
                            </td>

                            <td class="px-5 py-3 text-center text-slate-600">{{ $arsip->tingkat_perkembangan ?? '-' }}</td>
                            <td class="px-5 py-3 text-center text-slate-600">{{ $arsip->kurun_waktu ?? '-' }}</td>
                            <td class="px-5 py-3 text-center text-slate-600">{{ $arsip->jumlah }}</td>
                            <td class="px-5 py-3 text-center">
                                <span class="bg-rose-100 text-rose-700 px-3 py-1 rounded-full text-xs font-bold uppercase">
                                    {{ $arsip->nomor_boks ?: 'Musnah' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-12 text-center text-slate-400">Belum ada arsip usul musnah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- MODAL DETAIL & TIMELINE RIWAYAT ARSIP -->
        <div x-show="showModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm" x-transition.opacity>
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl overflow-hidden transform transition-all flex flex-col max-h-[90vh]" @click.outside="showModal = false">
                
                <!-- Header Modal -->
                <div class="bg-slate-50 border-b border-slate-100 px-6 py-4 flex justify-between items-center shrink-0">
                    <h3 class="font-bold text-slate-800 text-lg flex items-center gap-2">
                        <i class="fas fa-info-circle text-blue-500"></i> Detail & Riwayat Arsip No. <span x-text="hist_no"></span>
                    </h3>
                    <button @click="showModal = false" class="text-slate-400 hover:text-rose-500 transition-colors rounded-full p-1 hover:bg-rose-50 outline-none">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <!-- Body Modal (Scrollable) -->
                <div class="p-6 bg-white overflow-y-auto">
                    
                    <template x-if="activeArsip">
                        <div class="space-y-6">
                            <!-- SECTION 1: DETAIL INFORMASI ARSIP -->
                            <div>
                                <h4 class="text-xs font-extrabold text-slate-400 uppercase tracking-wider mb-3">Informasi Detail Arsip</h4>
                                <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                                    
                                    <div class="sm:col-span-2">
                                        <p class="text-slate-500 text-xs mb-0.5">Uraian Informasi Berkas</p>
                                        <p class="font-semibold text-slate-800" x-text="activeArsip.uraian_informasi_berkas || '-'"></p>
                                    </div>
                                    
                                    <div class="sm:col-span-2">
                                        <p class="text-slate-500 text-xs mb-0.5">Uraian Informasi Arsip</p>
                                        <p class="font-semibold text-slate-800" x-text="activeArsip.uraian_informasi_arsip || '-'"></p>
                                    </div>

                                    <div>
                                        <p class="text-slate-500 text-xs mb-0.5">Kode Klasifikasi</p>
                                        <p class="font-semibold text-blue-600" x-text="activeArsip.kode_klasifikasi || '-'"></p>
                                    </div>

                                    <div>
                                        <p class="text-slate-500 text-xs mb-0.5">Nomor Berkas</p>
                                        <p class="font-semibold text-slate-800" x-text="activeArsip.nomor_berkas || '-'"></p>
                                    </div>

                                    <div>
                                        <p class="text-slate-500 text-xs mb-0.5">Jumlah</p>
                                        <p class="font-semibold text-slate-800" x-text="activeArsip.jumlah || '-'"></p>
                                    </div>

                                    <div>
                                        <p class="text-slate-500 text-xs mb-0.5">Kurun Waktu</p>
                                        <p class="font-semibold text-slate-800" x-text="activeArsip.kurun_waktu || '-'"></p>
                                    </div>
                                    
                                    <div>
                                        <p class="text-slate-500 text-xs mb-0.5">Tingkat Perkembangan</p>
                                        <p class="font-semibold text-slate-800" x-text="activeArsip.tingkat_perkembangan || '-'"></p>
                                    </div>
                                    
                                    <div>
                                        <p class="text-slate-500 text-xs mb-0.5">Lokasi Simpan / No Boks</p>
                                        <p class="font-semibold text-slate-800" x-text="activeArsip.ket_lokasi_simpan || activeArsip.nomor_boks || '-'"></p>
                                    </div>

                                </div>
                            </div>

                            <!-- SECTION 2: TIMELINE RIWAYAT -->
                            <div>
                                <h4 class="text-xs font-extrabold text-slate-400 uppercase tracking-wider mb-4">Riwayat Status (Timeline)</h4>
                                <div class="relative border-l-2 border-slate-200 ml-4 space-y-8">
                                    
                                    <!-- Item Timeline 1: Dibuat -->
                                    <div class="relative">
                                        <div class="absolute -left-[25px] bg-emerald-100 text-emerald-600 w-12 h-12 rounded-full flex items-center justify-center border-4 border-white shadow-sm">
                                            <i class="fas fa-file-circle-plus text-lg"></i>
                                        </div>
                                        <div class="ml-10">
                                            <p class="text-sm font-bold text-slate-800">Arsip Didaftarkan</p>
                                            <p class="text-xs text-slate-500 mt-0.5">Sistem mencatat arsip pertama kali masuk.</p>
                                            <div class="mt-2 inline-block bg-slate-50 text-slate-600 px-3 py-1.5 rounded-md text-xs font-medium border border-slate-200">
                                                <i class="far fa-calendar-alt mr-1"></i> <span x-text="hist_created"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Item Timeline 2: Status Terakhir -->
                                    <div class="relative">
                                        <div class="absolute -left-[25px] bg-blue-100 text-blue-600 w-12 h-12 rounded-full flex items-center justify-center border-4 border-white shadow-sm">
                                            <i class="fas fa-exchange-alt text-lg"></i>
                                        </div>
                                        <div class="ml-10">
                                            <p class="text-sm font-bold text-slate-800">Status Terakhir</p>
                                            <p class="text-xs text-slate-500 mt-0.5">Status nasib akhir arsip saat ini:</p>
                                            
                                            <div class="mt-2 mb-2 inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider bg-rose-100 text-rose-700" 
                                                 x-text="(activeArsip.status || 'MUSNAH').toUpperCase()">
                                            </div>

                                            <div class="block bg-slate-50 text-slate-600 px-3 py-1.5 rounded-md text-xs font-medium border border-slate-200 w-max">
                                                <i class="far fa-calendar-check mr-1"></i> <span x-text="hist_updated"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </template>
                    
                </div>

                <!-- Footer Modal -->
                <div class="bg-slate-50 border-t border-slate-100 px-6 py-4 flex justify-end shrink-0">
                    <button @click="showModal = false" class="bg-slate-200 hover:bg-slate-300 text-slate-700 px-5 py-2.5 rounded-lg text-sm font-semibold transition-colors outline-none focus:ring-2 focus:ring-slate-300">
                        Tutup
                    </button>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
<x-app-layout>
    <div class="w-full p-4 sm:p-6 lg:p-8 pt-6" x-data="{ search: '', selectedBagian: '' }">
        
        <!-- HEADER HALAMAN -->
        <div class="flex flex-col sm:flex-row items-center justify-between mb-6 gap-4">
            <h2 class="font-bold text-2xl text-slate-800 flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-amber-100 flex items-center justify-center text-amber-600 shadow-sm">
                    <i class="fas fa-box-archive text-lg"></i>
                </div>
                <span>Daftar Arsip Inaktif</span>
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
            
            <!-- Toolbar: Search, Filter & Pencarian -->
            <div class="p-4 border-b border-slate-200 bg-slate-50/50 flex flex-col lg:flex-row justify-between items-center gap-4">
                
                <div class="flex flex-col sm:flex-row items-center gap-3 w-full lg:w-auto">
                    <!-- Pencarian -->
                    <div class="relative w-full sm:w-64">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <i class="fas fa-search text-sm"></i>
                        </span>
                        <input type="text" x-model="search" placeholder="Cari uraian, no berkas..." class="w-full pl-9 pr-3 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 transition-shadow">
                    </div>

                    <!-- Dropdown Filter Bidang -->
                    <select x-model="selectedBagian" class="w-full sm:w-48 px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 transition-shadow">
                        <option value="">Semua Bidang</option>
                        @php $daftarBagian = \App\Models\User::where('role', '!=', 'admin')->pluck('name'); @endphp
                        @foreach($daftarBagian as $bagian)
                            <option value="{{ strtolower($bagian) }}">{{ $bagian }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tombol Action -->
                <div class="flex items-center gap-2 w-full lg:w-auto justify-end">
                    <a href="{{ route('arsip.exportExcel') }}" class="inline-flex items-center gap-2 bg-[#10b981] hover:bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors shadow-sm">
                        <i class="fas fa-file-excel"></i> Export Excel
                    </a>
                </div>
            </div>

            <!-- TABEL DATA INAKTIF (KOLOM BIDANG DITAMBAHKAN, AKSI DIHAPUS) -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm border-collapse min-w-[1200px]">
                    <thead class="bg-[#f8fafc] text-slate-600 border-b border-slate-200">
                        <tr>
                            <th class="px-5 py-3.5 font-semibold text-center w-16">No</th>
                            <th class="px-5 py-3.5 font-semibold text-center">Kode Klasifikasi</th>
                            <th class="px-5 py-3.5 font-semibold">Nomor Berkas</th>
                            <th class="px-5 py-3.5 font-semibold min-w-[250px]">Uraian Informasi Arsip</th>
                            <th class="px-5 py-3.5 font-semibold">Unit Pengolah</th>
                            <th class="px-5 py-3.5 font-semibold text-center">Kurun Waktu</th>
                            <th class="px-5 py-3.5 font-semibold text-center">Jumlah</th>
                            <th class="px-5 py-3.5 font-semibold text-center">Tingkat Perkembangan</th>
                            <th class="px-5 py-3.5 font-semibold text-center">No Boks</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 bg-white text-slate-700">
                        @forelse ($arsipInaktif as $index => $arsip)
                            @php
                                $namaPengirim = $arsip->user ? strtolower($arsip->user->name) : '';
                            @endphp
                            <tr class="hover:bg-slate-50 transition-colors"
                                x-show="(search === '' || 
                                        '{{ strtolower($arsip->uraian_informasi_arsip) }}'.includes(search.toLowerCase()) || 
                                        '{{ strtolower($arsip->nomor_berkas) }}'.includes(search.toLowerCase())) &&
                                        (selectedBagian === '' || '{{ $namaPengirim }}' === selectedBagian)">
                                
                                <td class="px-5 py-4 text-center">{{ $index + 1 }}</td>
                                <td class="px-5 py-4 text-center font-bold text-amber-600">{{ str_replace(['_inv', '_eva', '_pen', 'inv', 'eva', 'pen'], '', $arsip->kode_klasifikasi) }}</td>
                                <td class="px-5 py-4 font-medium">{{ $arsip->nomor_berkas }}</td>
                                <td class="px-5 py-4 whitespace-normal">{{ $arsip->uraian_informasi_arsip }}</td>
                         
                                <td class="px-5 py-4 font-medium text-slate-600">{{ $arsip->user ? $arsip->user->name : 'Admin' }}</td>
                                <td class="px-5 py-4 text-center text-slate-500">{{ $arsip->kurun_waktu ?? '-' }}</td>
                                <td class="px-5 py-4 text-center">{{ $arsip->jumlah }}</td>
                                <td class="px-5 py-4 text-center text-slate-500">{{ $arsip->tingkat_perkembangan ?? '-' }}</td>
                                <td class="px-5 py-4 text-center text-slate-500 font-medium">{{ $arsip->nomor_boks ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-4 py-16 text-center text-slate-400">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="fas fa-box-archive text-4xl mb-3 text-slate-200"></i>
                                        <p class="font-medium text-slate-500">Belum ada data arsip inaktif yang tersedia.</p>
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
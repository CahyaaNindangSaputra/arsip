<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Arsip Aktif') }}
        </h2>
    </x-slot>

    <!-- Alpine.js State untuk Search & Filter Bagian -->
    <div class="py-12" x-data="{ search: '', selectedBagian: '' }">
        <div class="w-full px-6 mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Header & Tombol Aksi -->
                    <div class="flex flex-col xl:flex-row justify-between items-center gap-4 mb-6">
                        
                        <!-- Kotak Pencarian & Tombol Filter -->
                        <div class="flex flex-col sm:flex-row items-center gap-3 w-full xl:w-2/3">
                            <!-- Kotak Pencarian Live Search -->
                            <div class="w-full sm:w-1/2">
                                <input type="text" x-model="search" placeholder="🔍 Cari uraian, no berkas, atau rak..." class="w-full border-gray-300 rounded-md shadow-sm p-2 text-sm border focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <!-- Tombol Filter Berdasarkan Bagian -->
                            <div class="w-full sm:w-1/2 flex items-center gap-1.5 overflow-x-auto pb-1">
                                <button type="button" @click="selectedBagian = ''" :class="selectedBagian === '' ? '!bg-blue-600 !text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'" class="px-3 py-2 rounded-md text-xs font-semibold transition whitespace-nowrap shadow-sm focus:outline-none">
                                    Semua
                                </button>
                                
                                @php
                                    $daftarBagian = \App\Models\User::where('role', '!=', 'admin')->pluck('name');
                                @endphp
                                
                                @foreach($daftarBagian as $bagian)
                                    <button type="button" @click="selectedBagian = '{{ strtolower($bagian) }}'" :class="selectedBagian === '{{ strtolower($bagian) }}' ? '!bg-blue-600 !text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'" class="px-3 py-2 rounded-md text-xs font-semibold transition whitespace-nowrap shadow-sm focus:outline-none">
                                        {{ $bagian }}
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <!-- Tombol Aksi Kanan -->
                        <div class="flex gap-2 w-full xl:w-auto justify-end">
                            <a href="{{ route('arsip.exportExcel') }}" style="background-color: #16a34a; color: white; padding: 8px 16px; border-radius: 6px; font-weight: 600; font-size: 14px; text-decoration: none;">📥 Export Excel</a>
                            <a href="{{ route('arsip.create') }}" style="background-color: #2563eb; color: white; padding: 8px 16px; border-radius: 6px; font-weight: 600; font-size: 14px; text-decoration: none;">+ Tambah Arsip</a>
                        </div>
                    </div>

                    <!-- TABEL FORMAT ARSIP AKTIF -->
                    <div class="overflow-x-auto border border-gray-400 rounded-lg shadow-sm">
                        <table class="w-full divide-y divide-gray-400 text-left text-xs">
                            <thead class="bg-gray-300 text-gray-900 font-bold text-center">
                                <tr>
                                    <th class="p-2 border border-gray-400" width="4%">No</th>
                                    <th class="p-2 border border-gray-400" width="10%">Kode Klasifikasi</th>
                                    <th class="p-2 border border-gray-400" width="10%">Nomor Berkas</th>
                                    <th class="p-2 border border-gray-400" width="16%">Uraian informasi Berkas</th>
                                    <th class="p-2 border border-gray-400" width="16%">Uraian Informasi Arsip</th>
                                    <th class="p-2 border border-gray-400" width="6%">Jumlah</th>
                                    <th class="p-2 border border-gray-400" width="12%">Sifat</th>
                                    <th class="p-2 border border-gray-400" width="10%">Ket. Lokasi Simpan</th>
                                    <th class="p-2 border border-gray-400" width="10%">Pengirim (Bidang)</th>
                                    <th class="p-2 border border-gray-400" width="16%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300 bg-white">
                                @forelse ($arsips as $index => $arsip)
                                    @php
                                        $namaPengirim = $arsip->user ? strtolower($arsip->user->name) : '';
                                        
                                        // Membersihkan kode di tabel agar tampil bersih murni standar (misal: LH.02.01)
                                        $cleanKode = str_replace(['_inv', '_eva', '_pen', 'inv', 'eva', 'pen'], '', $arsip->kode_klasifikasi);
                                    @endphp
                                    <tr class="hover:bg-gray-50"
                                        x-show="(search === '' || 
                                                '{{ strtolower($arsip->uraian_informasi_berkas) }}'.includes(search.toLowerCase()) || 
                                                '{{ strtolower($arsip->nomor_berkas) }}'.includes(search.toLowerCase()) ||
                                                '{{ strtolower($arsip->kode_klasifikasi) }}'.includes(search.toLowerCase()) ||
                                                '{{ strtolower($arsip->ket_lokasi_simpan) }}'.includes(search.toLowerCase())) &&
                                                (selectedBagian === '' || '{{ $namaPengirim }}' === selectedBagian)">
                                        
                                        <!-- 1. Kolom No -->
                                        <td class="p-2 border border-gray-300 text-center">{{ $index + 1 }}</td>
                                        
                                        <!-- 2. Kolom Kode Klasifikasi (Tampil bersih tanpa huruf tambahan) -->
                                        <td class="p-2 border border-gray-300 font-medium text-gray-900 text-center">{{ $cleanKode }}</td>
                                        
                                        <!-- 3. Kolom Nomor Berkas -->
                                        <td class="p-2 border border-gray-300 text-center">{{ $arsip->nomor_berkas }}</td>
                                        
                                        <!-- 4. Kolom Uraian Informasi Berkas -->
                                        <td class="p-2 border border-gray-300">{{ $arsip->uraian_informasi_berkas }}</td>
                                        
                                        <!-- 5. Kolom Uraian Informasi Arsip -->
                                        <td class="p-2 border border-gray-300">{{ $arsip->uraian_informasi_arsip }}</td>
                                        
                                        <!-- 6. Kolom Jumlah -->
                                        <td class="p-2 border border-gray-300 text-center">{{ $arsip->jumlah }}</td>
                                        
                                        <!-- 7. Kolom Klasifikasi Keamanan & Akses -->
                                        <td class="p-2 border border-gray-300 text-center">
                                            <span class="bg-cyan-100 text-cyan-800 px-2 py-0.5 rounded-full font-semibold">{{ $arsip->klasifikasi_keamanan_akses }}</span>
                                        </td>
                                        
                                        <!-- 8. Kolom Keterangan Lokasi Simpan -->
                                        <td class="p-2 border border-gray-300 text-center">{{ $arsip->ket_lokasi_simpan }}</td>
                                        
                                        <!-- 9. Kolom Pengirim (Bidang) -->
                                        <td class="p-2 border border-gray-300 font-bold text-blue-700 text-center">
                                            {{ $arsip->user ? $arsip->user->name : '-' }}
                                        </td>

                                        <!-- 10. Kolom Aksi (Tombol Pindah ke Inaktif) -->
                                        <td class="p-2 border border-gray-300 text-center align-middle">
                                            @if(auth()->check() && auth()->user()->role == 'admin')
                                                <form action="{{ route('arsip.pindahkan_inaktif', $arsip->id) }}" method="POST" onsubmit="return confirm('Pindahkan arsip ini ke Daftar Arsip Inaktif?')" class="flex items-center justify-center gap-1">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="text" name="kurun_waktu" placeholder="Tahun" class="text-xs border border-gray-300 rounded p-1 w-14 text-center" required>
                                                    <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white px-2 py-1 rounded text-xs font-semibold shadow-sm transition whitespace-nowrap">
                                                        Pindahkan
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-gray-400 text-xs italic">-</span>
                                            @endif
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="p-6 text-center text-gray-500 border border-gray-300">Data arsip aktif belum tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Arsip Aktif') }}
        </h2>
    </x-slot>

    <!-- KONDISI BACKGROUND: Halaman dibikin nge-blur tapi tetap estetik di belakang modal -->
    <div class="py-12 filter blur-[2px] pointer-events-none select-none opacity-60">
        <div class="w-full px-6 mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="h-96 flex items-center justify-center text-gray-400 font-medium">
                    Memuat halaman arsip aktif...
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL POP-UP FORM PEMINDAHAN (Melayang di tengah dengan latar belakang blur) -->
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm px-4">
        
        <div class="bg-white w-full max-w-xl rounded-xl shadow-2xl border border-gray-100 overflow-hidden">
            
            <!-- Header Modal -->
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                <h3 class="font-bold text-gray-800 text-sm flex items-center gap-2">
                    📦 Form Pemindahan Arsip ke Inaktif
                </h3>
                <a href="{{ route('arsip.index') }}" class="text-gray-400 hover:text-gray-600 font-bold text-lg">&times;</a>
            </div>

            <!-- Body Form -->
            <div class="p-6">
                <!-- Info Ringkas Arsip Asli -->
                <div class="mb-5 p-3 bg-blue-50/60 rounded-lg border border-blue-100 text-xs space-y-1 text-blue-900">
                    <p class="font-bold border-b border-blue-200 pb-1 mb-1">Detail Arsip Aktif:</p>
                    <div class="grid grid-cols-2 gap-1">
                        <p><strong>Klasifikasi:</strong> {{ $arsip->kode_klasifikasi }}</p>
                        <p><strong>No Berkas:</strong> {{ $arsip->nomor_berkas }}</p>
                    </div>
                    <p><strong>Uraian:</strong> {{ $arsip->uraian_informasi_arsip }}</p>
                    <p><strong>Jumlah:</strong> {{ $arsip->jumlah }}</p>
                </div>

                <form action="{{ route('arsip.pindahkan_inaktif', $arsip->id) }}" method="POST">
                    @csrf 
                    @method('PATCH')

                    <div class="mb-4">
                        <label class="block text-xs font-bold text-gray-700 mb-1">Kurun Waktu (Contoh: 2021-2024 atau 2024)</label>
                        <input type="text" name="kurun_waktu" class="w-full text-xs border-gray-300 rounded-md shadow-sm p-2.5 border focus:ring-blue-500 focus:border-blue-500" required placeholder="Masukkan kurun waktu...">
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-bold text-gray-700 mb-1">Tingkat Perkembangan</label>
                        <select name="tingkat_perkembangan" class="w-full text-xs border-gray-300 rounded-md shadow-sm p-2.5 border focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">-- Pilih Tingkat Perkembangan --</option>
                            <option value="Asli">Asli</option>
                            <option value="Salinan">Salinan</option>
                            <option value="Tembusan">Tembusan</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block text-xs font-bold text-gray-700 mb-1">Keterangan Nomor Boks</label>
                        <input type="text" name="nomor_boks" class="w-full text-xs border-gray-300 rounded-md shadow-sm p-2.5 border focus:ring-blue-500 focus:border-blue-500" required placeholder="Contoh: Boks 01">
                    </div>

                    <div class="flex justify-end gap-2 pt-4 mt-4 border-t border-gray-200">
                        <a href="{{ route('arsip.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg text-xs font-semibold transition">Batal</a>
                        <button type="submit" style="background-color: #f59e0b; color: #ffffff; padding: 8px 16px; border-radius: 8px; font-weight: 700; font-size: 12px; border: none; cursor: pointer;">
                            Proses Pindahkan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
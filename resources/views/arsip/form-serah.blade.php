<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Arsip Aktif (Big Data)') }}
        </h2>
    </x-slot>

    <!-- Background Blur Estetik -->
    <div class="py-12 filter blur-[2px] pointer-events-none select-none opacity-60">
        <div class="w-full px-6 mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="h-96 flex items-center justify-center text-gray-400">Memuat...</div>
            </div>
        </div>
    </div>

    <!-- Modal Form Usul Serah -->
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm px-4">
        <div class="bg-white w-full max-w-xl rounded-xl shadow-2xl border border-gray-100 overflow-hidden">
            
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                <h3 class="font-bold text-gray-800 text-sm flex items-center gap-2">
                    📦 Form Daftar Arsip Statis Usul Serah
                </h3>
                <a href="{{ route('arsip.index') }}" class="text-gray-400 hover:text-gray-600 font-bold text-lg">&times;</a>
            </div>

            <div class="p-6">
                <div class="mb-4 p-3 bg-green-50/60 rounded-lg border border-green-100 text-xs space-y-1 text-green-900">
                    <p class="font-bold border-b border-green-200 pb-1 mb-1">Detail Arsip:</p>
                    <p><strong>Uraian / Jenis Arsip:</strong> {{ $arsip->uraian_informasi_arsip ?? $arsip->uraian_informasi_berkas }}</p>
                    <p><strong>Jumlah:</strong> {{ $arsip->jumlah }}</p>
                </div>

                <form action="{{ route('arsip.proses_serah', $arsip->id) }}" method="POST">
                    @csrf 
                    @method('PATCH')

                    <div class="mb-4">
                        <label class="block text-xs font-bold text-gray-700 mb-1">Tingkat Perkembangan</label>
                        <select name="tingkat_perkembangan" class="w-full text-xs border-gray-300 rounded-md shadow-sm p-2.5 border" required>
                            <option value="">-- Pilih Tingkat Perkembangan --</option>
                            <option value="Asli">Asli</option>
                            <option value="Salinan">Salinan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-bold text-gray-700 mb-1">Kurun Waktu (Contoh: 2021-2023)</label>
                        <input type="text" name="kurun_waktu" class="w-full text-xs border-gray-300 rounded-md shadow-sm p-2.5 border" required placeholder="Masukkan kurun waktu...">
                    </div>

                    <div class="mb-6">
                        <label class="block text-xs font-bold text-gray-700 mb-1">Keterangan Nasib Akhir</label>
                        <input type="text" name="keterangan_nasib_akhir" value="Serah" class="w-full text-xs border-gray-300 rounded-md shadow-sm p-2.5 border bg-gray-50 font-bold text-green-600" readonly>
                    </div>

                    <div class="flex justify-end gap-2 pt-2 border-t border-gray-100">
                        <a href="{{ route('arsip.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-xs font-semibold">Batal</a>
                        <button type="submit" style="background-color: #16a34a; color: #ffffff; padding: 8px 16px; border-radius: 8px; font-weight: 700; font-size: 12px; border: none; cursor: pointer;">
                            Proses Usul Serah
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
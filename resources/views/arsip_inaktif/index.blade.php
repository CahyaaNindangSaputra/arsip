<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Arsip Inaktif Yang Dipindahkan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- Informasi Unit Pengolah -->
                <div class="mb-4 text-sm font-medium text-gray-700">
                    Nama Unit pengolah/unit kerja : <span class="border-b border-gray-400 pb-1 px-4 inline-block font-normal">Administrator / Unit Kearsipan</span>
                </div>

                @if(session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 border border-gray-400">
                        <thead class="bg-gray-300 text-gray-800 text-center text-xs font-bold uppercase">
                            <tr>
                                <th class="border border-gray-400 px-3 py-2">No</th>
                                <th class="border border-gray-400 px-3 py-2">Kode Klasifikasi</th>
                                <th class="border border-gray-400 px-3 py-2">Nomor Arsip/Berkas</th>
                                <th class="border border-gray-400 px-3 py-2">Uraian informasi Arsip</th>
                                <th class="border border-gray-400 px-3 py-2">Kurun waktu</th>
                                <th class="border border-gray-400 px-3 py-2">Jumlah</th>
                                <th class="border border-gray-400 px-3 py-2">Tingkat Perkembangan</th>
                                <th class="border border-gray-400 px-3 py-2">Keterangan Nomor Boks</th>
                            </tr>
                            <tr class="bg-gray-200 text-gray-600 font-normal text-xs">
                                <th class="border border-gray-400 py-1">(1)</th>
                                <th class="border border-gray-400 py-1">(2)</th>
                                <th class="border border-gray-400 py-1">(3)</th>
                                <th class="border border-gray-400 py-1">(4)</th>
                                <th class="border border-gray-400 py-1">(5)</th>
                                <th class="border border-gray-400 py-1">(6)</th>
                                <th class="border border-gray-400 py-1">(7)</th>
                                <th class="border border-gray-400 py-1">(8)</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
                            @forelse($arsips as $index => $arsip)
                                <tr>
                                    <td class="border border-gray-400 px-3 py-2 text-center">{{ $index + 1 }}</td>
                                    <td class="border border-gray-400 px-3 py-2 text-center font-medium">{{ $arsip->kode_klasifikasi }}</td>
                                    <td class="border border-gray-400 px-3 py-2 text-center">{{ $arsip->nomor_berkas }}</td>
                                    <td class="border border-gray-400 px-3 py-2">{{ $arsip->uraian_informasi_arsip }}</td>
                                    <td class="border border-gray-400 px-3 py-2 text-center">{{ $arsip->kurun_waktu ?? '-' }}</td>
                                    <td class="border border-gray-400 px-3 py-2 text-center">{{ $arsip->jumlah }}</td>
                                    <td class="border border-gray-400 px-3 py-2 text-center">{{ $arsip->tingkat_perkembangan ?? 'Asli' }}</td>
                                    <td class="border border-gray-400 px-3 py-2 text-center">{{ $arsip->ket_lokasi_simpan }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="border border-gray-400 px-6 py-6 text-center text-gray-500 italic">
                                        Belum ada data arsip inaktif yang dipindahkan.
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
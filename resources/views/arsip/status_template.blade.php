<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full px-6 mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-bold text-gray-700">Nama Unit pengolah/unit kerja : <span class="font-normal">Administrator / Unit Kearsipan</span></h3>
                    </div>

                    <div class="overflow-x-auto border border-gray-300 rounded-lg shadow-sm">
                        <table class="w-full divide-y divide-gray-300 text-left text-sm">
                            <thead class="bg-gray-100 text-gray-900 font-bold text-center">
                                <tr>
                                    <th class="p-3 border border-gray-300">NO</th>
                                    <th class="p-3 border border-gray-300">KODE KLASIFIKASI</th>
                                    <th class="p-3 border border-gray-300">NOMOR ARSIP/BERKAS</th>
                                    <th class="p-3 border border-gray-300">URAIAN INFORMASI ARSIP</th>
                                    <th class="p-3 border border-gray-300">KURUN WAKTU</th>
                                    <th class="p-3 border border-gray-300">JUMLAH</th>
                                    <th class="p-3 border border-gray-300">TINGKAT PERKEMBANGAN</th>
                                    <th class="p-3 border border-gray-300">KETERANGAN NOMOR BOKS</th>
                                    <th class="p-3 border border-gray-300">PENGIRIM / BIDANG</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300 bg-white text-center">
                                @forelse ($arsips as $index => $arsip)
                                    <tr class="hover:bg-gray-50">
                                        <td class="p-3 border border-gray-300">{{ $index + 1 }}</td>
                                        <td class="p-3 border border-gray-300">{{ str_replace(['_inv', '_eva', '_pen', 'inv', 'eva', 'pen'], '', $arsip->kode_klasifikasi) }}</td>
                                        <td class="p-3 border border-gray-300">{{ $arsip->nomor_berkas }}</td>
                                        <td class="p-3 border border-gray-300 text-left">{{ $arsip->uraian_informasi_arsip }}</td>
                                        <td class="p-3 border border-gray-300">{{ $arsip->kurun_waktu ?? '-' }}</td>
                                        <td class="p-3 border border-gray-300">{{ $arsip->jumlah }}</td>
                                        <td class="p-3 border border-gray-300">{{ $arsip->tingkat_perkembangan ?? '-' }}</td>
                                        <td class="p-3 border border-gray-300">{{ $arsip->nomor_boks ?? '-' }}</td>
                                        <td class="p-3 border border-gray-300 font-bold text-blue-700">{{ $arsip->user ? $arsip->user->name : '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="p-6 text-center text-gray-500">Tidak ada data arsip.</td>
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
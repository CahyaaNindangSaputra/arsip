<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Daftar Arsip Inaktif Yang Dipindahkan</h2></x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-4">
                <p class="font-bold">Nama Unit pengolah/unit kerja : ..............................</p>
            </div>
            <div class="overflow-x-auto bg-white shadow-sm rounded-lg p-6">
                <table class="w-full border-collapse border border-gray-800 text-xs text-center">
                    <thead class="bg-gray-400 font-bold">
                        <tr>
                            <th class="border border-gray-800 p-2">No</th>
                            <th class="border border-gray-800 p-2">Kode Klasifikasi</th>
                            <th class="border border-gray-800 p-2">Nomor Arsip/Berkas</th>
                            <th class="border border-gray-800 p-2">Uraian informasi Arsip</th>
                            <th class="border border-gray-800 p-2">Kurun waktu</th>
                            <th class="border border-gray-800 p-2">Jumlah</th>
                            <th class="border border-gray-800 p-2">Tingkat Perkembangan</th>
                            <th class="border border-gray-800 p-2">Keterangan Nomor Boks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($arsipInaktif as $index => $arsip)
                        <tr>
                            <td class="border border-gray-800 p-2">{{ $index + 1 }}</td>
                            <td class="border border-gray-800 p-2">{{ $arsip->kode_klasifikasi }}</td>
                            <td class="border border-gray-800 p-2">{{ $arsip->nomor_berkas }}</td>
                            <td class="border border-gray-800 p-2 text-left">{{ $arsip->uraian_informasi_arsip }}</td>
                            <td class="border border-gray-800 p-2">{{ $arsip->kurun_waktu }}</td>
                            <td class="border border-gray-800 p-2">{{ $arsip->jumlah }}</td>
                            <td class="border border-gray-800 p-2">{{ $arsip->tingkat_perkembangan }}</td>
                            <td class="border border-gray-800 p-2">{{ $arsip->nomor_boks }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
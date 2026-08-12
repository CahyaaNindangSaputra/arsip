<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Arsip pada: ') }} <span class="text-indigo-600">{{ $namaRak }}</span>
            </h2>
            <a href="{{ route('rak.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-sm">
                ← Kembali ke Daftar Rak
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full divide-y divide-gray-200 border">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Klasifikasi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor Berkas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Uraian informasi Berkas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Uraian Informasi Arsip</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Klasifikasi Keamanan & Akses</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ket. Lokasi Simpan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengirim (Bidang)</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($arsips as $index => $arsip)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $arsip->kode_klasifikasi }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $arsip->nomor_berkas }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $arsip->uraian_informasi_berkas ?? '-' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $arsip->uraian_informasi_arsip }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $arsip->jumlah }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $arsip->klasifikasi_keamanan_akses }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $arsip->ket_lokasi_simpan }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $arsip->pengirim ?? $arsip->user->name ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-6 py-4 text-center text-sm text-gray-500">
                                    Tidak ada arsip yang tersimpan di rak ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout> 
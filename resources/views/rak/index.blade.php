<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Lokasi Rak Penyimpanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($raks as $rak)
                    <a href="{{ route('rak.show', $rak) }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-indigo-50 transition border border-gray-200 flex items-center justify-between">
                        <div>
                            <span class="text-2xl font-bold text-indigo-600">📦</span>
                            <h3 class="text-lg font-medium text-gray-900 mt-2">{{ $rak }}</h3>
                            <p class="text-sm text-gray-500">Klik untuk melihat arsip</p>
                        </div>
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-500 bg-white shadow-sm sm:rounded-lg">
                        Belum ada data lokasi simpan rak yang tersedia.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
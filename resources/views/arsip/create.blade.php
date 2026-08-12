<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Arsip Aktif') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Kode Klasifikasi dengan Logic Bersih Tampilan & Aturan Klik -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Kode Klasifikasi</label>
                        <select name="kode_klasifikasi" id="kode_klasifikasi" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 border text-sm" required onchange="autofillSifat(this)">
                            <option value="">-- Pilih Kode Klasifikasi --</option>
                            
                            @php
                                $indukUtamas = App\Models\Klasifikasi::whereNull('parent_id')->get();
                            @endphp
                        
                            @foreach($indukUtamas as $utama)
                                <option value="{{ $utama->kode }}" class="font-bold bg-gray-300 text-gray-900" disabled>
                                    📂 [{{ $utama->kode }}] {{ $utama->nama }}
                                </option>
                        
                                @php
                                    $bidangs = App\Models\Klasifikasi::where('parent_id', $utama->id)->get();
                                @endphp
                        
                                @foreach($bidangs as $bidang)
                                    @php
                                        $cleanBidangKode = str_replace(['_inv', '_eva', '_pen', '_pantau', '_eval', '_hayati', '_perairan', '_pesisir', '_atmosfer', '_adaptasi', '_b3', '_verif', '_limbah', '_sampah', '_admin', '_sengketa', '_pidana', '_perjanjian', '_kom', '_inisiatif', '_peran', '_ormas'], '', $bidang->kode);
                                    @endphp
                        
                                    <option value="{{ $bidang->kode }}" class="font-semibold bg-gray-200 text-gray-800" disabled>
                                        &nbsp;&nbsp;&nbsp;&nbsp;📂 [{{ $cleanBidangKode }}] {{ $bidang->nama }}
                                    </option>
                        
                                    @php
                                        $babs = App\Models\Klasifikasi::where('parent_id', $bidang->id)->get();
                                    @endphp
                        
                                    @foreach($babs as $bab)
                                        @php
                                            $subAnaks = App\Models\Klasifikasi::where('parent_id', $bab->id)->get();
                                            $punyaSub = $subAnaks->count() > 0;
                                            $cleanBabKode = str_replace(['_inv', '_eva', '_pen', '_pantau', '_eval', '_hayati', '_perairan', '_pesisir', '_atmosfer', '_adaptasi', '_b3', '_verif', '_limbah', '_sampah', '_admin', '_sengketa', '_pidana', '_perjanjian', '_kom', '_inisiatif', '_peran', '_ormas'], '', $bab->kode);
                                        @endphp
                        
                                        @if(!$punyaSub)
                                            <option value="{{ $bab->kode }}" data-sifat="{{ $bab->sifat }}" class="text-gray-900 bg-white" {{ old('kode_klasifikasi') == $bab->kode ? 'selected' : '' }}>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[{{ $cleanBabKode }}] {{ $bab->nama }}
                                            </option>
                                        @else
                                            <option value="{{ $bab->kode }}" class="text-gray-700 bg-gray-50 italic font-medium" disabled>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[{{ $cleanBabKode }}] {{ $bab->nama }}
                                            </option>
                        
                                            @foreach($subAnaks as $anak)
                                                @php
                                                    $cleanAnakKode = str_replace(['inv', 'eva', 'pen'], '', $anak->kode);
                                                @endphp
                                                <option value="{{ $anak->kode }}" data-sifat="{{ $anak->sifat }}" class="text-gray-900 bg-white" {{ old('kode_klasifikasi') == $anak->kode ? 'selected' : '' }}>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;↳ [{{ $cleanAnakKode }}] {{ $anak->nama }}
                                                </option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endforeach
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Nomor Berkas</label>
                        <input type="text" name="nomor_berkas" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 border" required value="{{ old('nomor_berkas') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Uraian Informasi Berkas</label>
                        <textarea name="uraian_informasi_berkas" rows="3" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 border" required>{{ old('uraian_informasi_berkas') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Uraian Informasi Arsip</label>
                        <textarea name="uraian_informasi_arsip" rows="3" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 border" required>{{ old('uraian_informasi_arsip') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Jumlah</label>
                        <input type="text" name="jumlah" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 border" placeholder="Contoh: 1 Berkas / 10 Lembar" required value="{{ old('jumlah') }}">
                    </div>

                    <!-- Klasifikasi Keamanan & Akses (Sifat SR, R, T, B) -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Klasifikasi Keamanan & Akses (Sifat)</label>
                        <select name="klasifikasi_keamanan_akses" id="klasifikasi_keamanan_akses" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 border bg-gray-50" required>
                            <option value="B" {{ old('klasifikasi_keamanan_akses') == 'B' ? 'selected' : '' }}>B - Biasa</option>
                            <option value="T" {{ old('klasifikasi_keamanan_akses') == 'T' ? 'selected' : '' }}>T - Terbuka</option>
                            <option value="R" {{ old('klasifikasi_keamanan_akses') == 'R' ? 'selected' : '' }}>R - Rahasia</option>
                            <option value="SR" {{ old('klasifikasi_keamanan_akses') == 'SR' ? 'selected' : '' }}>SR - Sangat Rahasia</option>
                        </select>
                        <p class="text-xs text-gray-500 mt-1">*) Otomatis terpilih sesuai master klasifikasi (SR, R, T, B), namun bisa disesuaikan jika diperlukan.</p>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Keterangan Lokasi Simpan (Kolom 8)</label>
                        <input type="text" name="ket_lokasi_simpan" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 border" placeholder="Contoh: Lemari Arsip 01, Rak 2" required value="{{ old('ket_lokasi_simpan') }}">
                    </div>

                    <div class="flex justify-end gap-3 mt-6">
                        <a href="{{ route('arsip.index') }}" style="background-color: #6b7280; color: white; padding: 8px 16px; border-radius: 6px; font-weight: 600; font-size: 14px; text-decoration: none;">Batal</a>
                        <button type="submit" style="background-color: #16a34a; color: white; padding: 8px 20px; border-radius: 6px; font-weight: 600; font-size: 14px; border: none; cursor: pointer;">Simpan Arsip</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Script JavaScript Autofill Sifat SR, R, T, B -->
    <script>
        function autofillSifat(selectElement) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const sifat = selectedOption.getAttribute('data-sifat'); 
            const dropdownKeamanan = document.getElementById('klasifikasi_keamanan_akses');

            if (sifat) {
                dropdownKeamanan.value = sifat;
            }
        }
    </script>
</x-app-layout>
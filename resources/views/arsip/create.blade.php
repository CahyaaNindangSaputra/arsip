<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Arsip Aktif') }}
        </h2>
    </x-slot>

    <!-- CDN Select2 untuk Pencarian Klasifikasi -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <style>
        /* Styling Select2 agar menyatu rapi dengan desain minimalis standar */
        .select2-container .select2-selection--single {
            height: 38px !important;
            border: 1px solid #d1d5db !important;
            border-radius: 0.375rem !important;
            padding-top: 5px !important;
            background-color: #ffffff !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 36px !important;
        }
    </style>

    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 sm:p-8 border border-gray-100">
                
                <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <!-- Kode Klasifikasi -->
                    <div>
                        <label class="block font-medium text-xs text-gray-700 mb-1">Kode Klasifikasi</label>
                        <select name="kode_klasifikasi" id="kode_klasifikasi" class="w-full" required onchange="autofillSifat(this)">
                            <option value="">-- Pilih atau Cari Kode Klasifikasi --</option>
                            
                            @php
                                $indukUtamas = App\Models\Klasifikasi::whereNull('parent_id')->get();
                            @endphp
                        
                            @foreach($indukUtamas as $utama)
                                <option value="{{ $utama->kode }}" disabled class="font-bold bg-gray-200 text-gray-900">
                                    📂 [{{ $utama->kode }}] {{ $utama->nama }}
                                </option>
                        
                                @php
                                    $bidangs = App\Models\Klasifikasi::where('parent_id', $utama->id)->get();
                                @endphp
                        
                                @foreach($bidangs as $bidang)
                                    @php
                                        $cleanBidangKode = str_replace(['_inv', '_eva', '_pen', '_pantau', '_eval', '_hayati', '_perairan', '_pesisir', '_atmosfer', '_adaptasi', '_b3', '_verif', '_limbah', '_sampah', '_admin', '_sengketa', '_pidana', '_perjanjian', '_kom', '_inisiatif', '_peran', '_ormas'], '', $bidang->kode);
                                    @endphp
                        
                                    <option value="{{ $bidang->kode }}" disabled class="font-semibold bg-gray-100 text-gray-800">
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
                                            <option value="{{ $bab->kode }}" disabled class="text-gray-500 bg-gray-50 italic">
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

                    <!-- Nomor Berkas -->
                    <div>
                        <label class="block font-medium text-xs text-gray-700 mb-1">Nomor Berkas</label>
                        <input type="text" name="nomor_berkas" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 text-xs border" required value="{{ old('nomor_berkas') }}">
                    </div>

                    <!-- Uraian Informasi Berkas -->
                    <div>
                        <label class="block font-medium text-xs text-gray-700 mb-1">Uraian Informasi Berkas</label>
                        <textarea name="uraian_informasi_berkas" rows="3" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 text-xs border" required>{{ old('uraian_informasi_berkas') }}</textarea>
                    </div>

                    <!-- Uraian Informasi Arsip -->
                    <div>
                        <label class="block font-medium text-xs text-gray-700 mb-1">Uraian Informasi Arsip</label>
                        <textarea name="uraian_informasi_arsip" rows="3" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 text-xs border" required>{{ old('uraian_informasi_arsip') }}</textarea>
                    </div>

                    <!-- Jumlah -->
                    <div>
                        <label class="block font-medium text-xs text-gray-700 mb-1">Jumlah</label>
                        <input type="text" name="jumlah" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 text-xs border" placeholder="Contoh: 1 Berkas / 10 Lembar" required value="{{ old('jumlah') }}">
                    </div>

                    <!-- Klasifikasi Keamanan & Akses (Sifat SR, R, T, B) -->
                    <div>
                        <label class="block font-medium text-xs text-gray-700 mb-1">Klasifikasi Keamanan & Akses (Sifat)</label>
                        <select name="klasifikasi_keamanan_akses" id="klasifikasi_keamanan_akses" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 text-xs border bg-gray-50 font-semibold" required>
                            <option value="B" {{ old('klasifikasi_keamanan_akses') == 'B' ? 'selected' : '' }}>B - Biasa</option>
                            <option value="T" {{ old('klasifikasi_keamanan_akses') == 'T' ? 'selected' : '' }}>T - Terbuka</option>
                            <option value="R" {{ old('klasifikasi_keamanan_akses') == 'R' ? 'selected' : '' }}>R - Rahasia</option>
                            <option value="SR" {{ old('klasifikasi_keamanan_akses') == 'SR' ? 'selected' : '' }}>SR - Sangat Rahasia</option>
                        </select>
                        <p class="text-[11px] text-gray-500 mt-1">*) Otomatis terpilih sesuai master klasifikasi (SR, R, T, B), namun bisa disesuaikan jika diperlukan.</p>
                    </div>

                    <!-- Keterangan Lokasi Simpan -->
                    <div>
                        <label class="block font-medium text-xs text-gray-700 mb-1">Keterangan Lokasi Simpan (Kolom 8)</label>
                        <input type="text" name="ket_lokasi_simpan" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 text-xs border" placeholder="Contoh: Lemari Arsip 01, Rak 2" required value="{{ old('ket_lokasi_simpan') }}">
                    </div>

                    <!-- Tombol Aksi Bawah -->
                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200">
                        <a href="{{ route('arsip.index') }}" style="background-color: #6b7280; color: white; padding: 7px 16px; border-radius: 6px; font-weight: 600; font-size: 13px; text-decoration: none;">Batal</a>
                        <button type="submit" style="background-color: #16a34a; color: white; padding: 7px 18px; border-radius: 6px; font-weight: 600; font-size: 13px; border: none; cursor: pointer;">Simpan Arsip</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Script JavaScript Select2 & Autofill Sifat -->
    <script>
        $(document).ready(function() {
            $('#kode_klasifikasi').select2({
                placeholder: "-- Pilih atau Cari Kode Klasifikasi --",
                allowClear: true,
                width: '100%'
            });
        });

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
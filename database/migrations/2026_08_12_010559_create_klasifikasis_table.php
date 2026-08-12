<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('klasifikasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable(); 
            $table->string('kode')->unique(); 
            $table->string('nama'); 
            $table->string('sifat')->default('B'); 
            $table->timestamps();
        });

        // 1. Kolom Utama
        DB::table('klasifikasis')->insert([
            ['parent_id' => null, 'kode' => 'LH', 'nama' => 'URUSAN LINGKUNGAN HIDUP', 'sifat' => 'B'],
        ]);

        $id_lh = DB::table('klasifikasis')->where('kode', 'LH')->value('id');

        // 2. Kolom Kotak Kedua (Menggunakan inisial kode bidang persis seperti LH.PS, LH.PB, dll)
        DB::table('klasifikasis')->insert([
            ['parent_id' => $id_lh, 'kode' => 'LH.01', 'nama' => '1. TATA LINGKUNGAN', 'sifat' => 'B'],
            ['parent_id' => $id_lh, 'kode' => 'LH.02', 'nama' => '2. PENGENDALIAN PENCEMARAN LINGKUNGAN', 'sifat' => 'B'],
            ['parent_id' => $id_lh, 'kode' => 'LH.03', 'nama' => '3. PENGENDALIAN KERUSAKAN LINGKUNGAN DAN PERUBAHAN IKLIM', 'sifat' => 'B'],
            ['parent_id' => $id_lh, 'kode' => 'LH.PB', 'nama' => 'PB. PENGELOLAAN B3, LIMBAH, DAN SAMPAH', 'sifat' => 'B'],
            ['parent_id' => $id_lh, 'kode' => 'LH.HL', 'nama' => 'HL. HUKUM LINGKUNGAN', 'sifat' => 'B'],
            ['parent_id' => $id_lh, 'kode' => 'LH.KM', 'nama' => 'KM. KOMUNIKASI LINGKUNGAN DAN PEMBERDAYAAN MASYARAKAT', 'sifat' => 'B'],
            ['parent_id' => $id_lh, 'kode' => 'LH.PS', 'nama' => 'PS. PEMBINAAN SARANA TEKNIS LINGKUNGAN DAN PENINGKATAN KAPASITAS', 'sifat' => 'B'],
        ]);

        $id_b1 = DB::table('klasifikasis')->where('kode', 'LH.01')->value('id');
        $id_b2 = DB::table('klasifikasis')->where('kode', 'LH.02')->value('id');
        $id_b3 = DB::table('klasifikasis')->where('kode', 'LH.03')->value('id');
        $id_b4 = DB::table('klasifikasis')->where('kode', 'LH.PB')->value('id');
        $id_b5 = DB::table('klasifikasis')->where('kode', 'LH.HL')->value('id');
        $id_b6 = DB::table('klasifikasis')->where('kode', 'LH.KM')->value('id');
        $id_b7 = DB::table('klasifikasis')->where('kode', 'LH.PS')->value('id');

        // 3. Kolom Kotak Ketiga (Bab Utama)
        DB::table('klasifikasis')->insert([
            // Bidang 1
            ['parent_id' => $id_b1, 'kode' => 'LH.01.01', 'nama' => '01. Perencanaan Pemanfaatan Sumber Daya Alam dan Lingkungan Hidup', 'sifat' => 'B'],
            ['parent_id' => $id_b1, 'kode' => 'LH.01.02_inv', 'nama' => '02. Inventarisasi, penerapan ekoregion, dan rencana perlindungan dan pengelolaan lingkungan', 'sifat' => 'B'],
            ['parent_id' => $id_b1, 'kode' => 'LH.01.02_eva', 'nama' => '02. Evaluasi Pemanfaatan Sumber Daya Alam', 'sifat' => 'B'],
            ['parent_id' => $id_b1, 'kode' => 'LH.01.02_pen', 'nama' => '02. Penerapan Kebijakan Wilayah dan Sektor', 'sifat' => 'B'],
            ['parent_id' => $id_b1, 'kode' => 'LH.01.03', 'nama' => '03. Ekonomi Lingkungan', 'sifat' => 'B'],
            ['parent_id' => $id_b1, 'kode' => 'LH.01.04', 'nama' => '04. Dampak Lingkungan', 'sifat' => 'B'],

            // Bidang 2
            ['parent_id' => $id_b2, 'kode' => 'LH.02.01_pantau', 'nama' => '1. Pemantauan dan Pengawasan', 'sifat' => 'T'],
            ['parent_id' => $id_b2, 'kode' => 'LH.02.02_eval', 'nama' => '2. Evaluasi dan Pengembangan', 'sifat' => 'T'],

            // Bidang 3
            ['parent_id' => $id_b3, 'kode' => 'LH.03.01_hayati', 'nama' => '1. Keanekaragaman Hayati dan Pengendalian Kerusakan Lahan', 'sifat' => 'T'],
            ['parent_id' => $id_b3, 'kode' => 'LH.03.02_perairan', 'nama' => '2. Kerusakan Ekosistem Perairan Darat', 'sifat' => 'T'],
            ['parent_id' => $id_b3, 'kode' => 'LH.03.03_pesisir', 'nama' => '3. Pengendalian Kerusakan Pesisir dan Laut', 'sifat' => 'T'],
            ['parent_id' => $id_b3, 'kode' => 'LH.03.04_atmosfer', 'nama' => '4. Mitigasi dan Pelestarian Fungsi Atmosfer', 'sifat' => 'T'],
            ['parent_id' => $id_b3, 'kode' => 'LH.03.05_adaptasi', 'nama' => '5. Adaptasi Perubahan Iklim', 'sifat' => 'T'],

            // Bidang 4 (PB)
            ['parent_id' => $id_b4, 'kode' => 'LH.PB.01_b3', 'nama' => '1. Pengelolaan Bahan Berbahaya dan Beracun', 'sifat' => 'T'],
            ['parent_id' => $id_b4, 'kode' => 'LH.PB.02_verif', 'nama' => '2. Verifikasi Pengelolaan Limbah Bahan Berbahaya dan Beracun', 'sifat' => 'T'],
            ['parent_id' => $id_b4, 'kode' => 'LH.PB.03_limbah', 'nama' => '3. Pengelolaan Limbah B3 dan Pemulihan Kontaminasi Limbah B3', 'sifat' => 'T'],
            ['parent_id' => $id_b4, 'kode' => 'LH.PB.04_sampah', 'nama' => '4. Pengelolaan Sampah', 'sifat' => 'T'],

            // Bidang 5 (HL)
            ['parent_id' => $id_b5, 'kode' => 'LH.HL.01_admin', 'nama' => '1. Hukum Administrasi Lingkungan', 'sifat' => 'T'],
            ['parent_id' => $id_b5, 'kode' => 'LH.HL.02_sengketa', 'nama' => '2. Penyelesaian Sengketa Lingkungan', 'sifat' => 'T'],
            ['parent_id' => $id_b5, 'kode' => 'LH.HL.03_pidana', 'nama' => '3. Penegakan Hukum Pidana Lingkungan', 'sifat' => 'T'],
            ['parent_id' => $id_b5, 'kode' => 'LH.HL.04_perjanjian', 'nama' => '4. Perjanjian Internasional Lingkungan', 'sifat' => 'T'],

            // Bidang 6 (KM)
            ['parent_id' => $id_b6, 'kode' => 'LH.KM.01_kom', 'nama' => '1. Komunikasi Lingkungan', 'sifat' => 'T'],
            ['parent_id' => $id_b6, 'kode' => 'LH.KM.02_inisiatif', 'nama' => '2. Penguatan Inisiatif Masyarakat', 'sifat' => 'T'],
            ['parent_id' => $id_b6, 'kode' => 'LH.KM.03_peran', 'nama' => '3. Peningkatan Peran Masyarakat', 'sifat' => 'T'],
            ['parent_id' => $id_b6, 'kode' => 'LH.KM.04_ormas', 'nama' => '4. Peningkatan Peran Organisasi Kemasyarakatan', 'sifat' => 'T'],

            // Bidang 7 (PS)
            ['parent_id' => $id_b7, 'kode' => 'LH.PS.01', 'nama' => '1. Data dan Informasi Lingkungan', 'sifat' => 'T'],
            ['parent_id' => $id_b7, 'kode' => 'LH.PS.02', 'nama' => '2. Kelembagaan Lingkungan', 'sifat' => 'T'],
            ['parent_id' => $id_b7, 'kode' => 'LH.PS.03', 'nama' => '3. Standarisasi dan Teknologi', 'sifat' => 'T'],
            ['parent_id' => $id_b7, 'kode' => 'LH.PS.04', 'nama' => '4. Pusat Sarana Pengendalian Dampak Lingkungan', 'sifat' => 'T'],
        ]);

        // Ambil ID Induk Bab
        $id_inv = DB::table('klasifikasis')->where('kode', 'LH.01.02_inv')->value('id');
        $id_eva = DB::table('klasifikasis')->where('kode', 'LH.01.02_eva')->value('id');
        $id_pen = DB::table('klasifikasis')->where('kode', 'LH.01.02_pen')->value('id');
        $id_03  = DB::table('klasifikasis')->where('kode', 'LH.01.03')->value('id');
        $id_04  = DB::table('klasifikasis')->where('kode', 'LH.01.04')->value('id');

        $id_pantau = DB::table('klasifikasis')->where('kode', 'LH.02.01_pantau')->value('id');
        $id_eval   = DB::table('klasifikasis')->where('kode', 'LH.02.02_eval')->value('id');

        $id_hayati   = DB::table('klasifikasis')->where('kode', 'LH.03.01_hayati')->value('id');
        $id_perairan = DB::table('klasifikasis')->where('kode', 'LH.03.02_perairan')->value('id');
        $id_pesisir  = DB::table('klasifikasis')->where('kode', 'LH.03.03_pesisir')->value('id');
        $id_atmosfer = DB::table('klasifikasis')->where('kode', 'LH.03.04_atmosfer')->value('id');
        $id_adaptasi = DB::table('klasifikasis')->where('kode', 'LH.03.05_adaptasi')->value('id');

        $id_b4_1 = DB::table('klasifikasis')->where('kode', 'LH.PB.01_b3')->value('id');
        $id_b4_2 = DB::table('klasifikasis')->where('kode', 'LH.PB.02_verif')->value('id');
        $id_b4_3 = DB::table('klasifikasis')->where('kode', 'LH.PB.03_limbah')->value('id');
        $id_b4_4 = DB::table('klasifikasis')->where('kode', 'LH.PB.04_sampah')->value('id');

        $id_hl_1 = DB::table('klasifikasis')->where('kode', 'LH.HL.01_admin')->value('id');
        $id_hl_2 = DB::table('klasifikasis')->where('kode', 'LH.HL.02_sengketa')->value('id');
        $id_hl_3 = DB::table('klasifikasis')->where('kode', 'LH.HL.03_pidana')->value('id');
        $id_hl_4 = DB::table('klasifikasis')->where('kode', 'LH.HL.04_perjanjian')->value('id');

        $id_km_1 = DB::table('klasifikasis')->where('kode', 'LH.KM.01_kom')->value('id');
        $id_km_2 = DB::table('klasifikasis')->where('kode', 'LH.KM.02_inisiatif')->value('id');
        $id_km_3 = DB::table('klasifikasis')->where('kode', 'LH.KM.03_peran')->value('id');
        $id_km_4 = DB::table('klasifikasis')->where('kode', 'LH.KM.04_ormas')->value('id');

        $id_ps_1 = DB::table('klasifikasis')->where('kode', 'LH.PS.01')->value('id');
        $id_ps_2 = DB::table('klasifikasis')->where('kode', 'LH.PS.02')->value('id');
        $id_ps_3 = DB::table('klasifikasis')->where('kode', 'LH.PS.03')->value('id');
        $id_ps_4 = DB::table('klasifikasis')->where('kode', 'LH.PS.04')->value('id');

        // 4. Kolom Kotak Keempat: Sub-bab Anak (Mencetak format LH.PS.01.02 secara sempurna)
        DB::table('klasifikasis')->insert([
            // --- BIDANG 1 ---
            ['parent_id' => $id_inv, 'kode' => 'LH.01.02inv.01', 'nama' => '01 Dokumentasi Inventarisasi', 'sifat' => 'T'],
            ['parent_id' => $id_inv, 'kode' => 'LH.01.02inv.02', 'nama' => '02 Pedoman Inventarisasi', 'sifat' => 'B'],
            ['parent_id' => $id_inv, 'kode' => 'LH.01.02inv.03', 'nama' => '03 Penetapan Ekoregion', 'sifat' => 'B'],
            ['parent_id' => $id_inv, 'kode' => 'LH.01.02inv.04', 'nama' => '04 Rencana Perlindungan dan Pengelolaan Lingkungan Hidup (RPPLH) Nasional', 'sifat' => 'B'],
            ['parent_id' => $id_inv, 'kode' => 'LH.01.02inv.05', 'nama' => '05 Pedoman Penyusunan RPPLH Provinsi, RPPLH Kabupaten/Kota', 'sifat' => 'B'],
            
            ['parent_id' => $id_eva, 'kode' => 'LH.01.02eva.01', 'nama' => '01 Evaluasi pemanfaatan dan pencadangan sumber daya alam', 'sifat' => 'B'],
            ['parent_id' => $id_eva, 'kode' => 'LH.01.02eva.02', 'nama' => '02 Kebijakan pemanfaatan sumber daya alam', 'sifat' => 'B'],

            ['parent_id' => $id_pen, 'kode' => 'LH.01.02pen.01', 'nama' => '01 Evaluasi Penerapan', 'sifat' => 'B'],
            ['parent_id' => $id_pen, 'kode' => 'LH.01.02pen.02', 'nama' => '02 Perencanaan Lingkungan Hidup', 'sifat' => 'B'],

            ['parent_id' => $id_03, 'kode' => 'LH.01.03.01', 'nama' => '01 Perencanaan Evaluasi Ekonomi', 'sifat' => 'B'],
            ['parent_id' => $id_03, 'kode' => 'LH.01.03.02', 'nama' => '02 Perencanaan Internalisasi Lingkungan', 'sifat' => 'B'],
            ['parent_id' => $id_03, 'kode' => 'LH.01.03.03', 'nama' => '03 Insentif dan Pendanaan Lingkungan', 'sifat' => 'B'],

            ['parent_id' => $id_04, 'kode' => 'LH.01.04.01', 'nama' => '01 Bimtek Dampak Lingkungan', 'sifat' => 'B'],
            ['parent_id' => $id_04, 'kode' => 'LH.01.04.02', 'nama' => '02 Penerapan Sistem Kajian Dampak Lingkungan dalam Penilaian dokumen lingkungan', 'sifat' => 'B'],
            ['parent_id' => $id_04, 'kode' => 'LH.01.04.03', 'nama' => '03 Penerapan Sistem Kajian Dampak Lingkungan dalam Pemeriksaan dokumen lingkungan', 'sifat' => 'B'],
            ['parent_id' => $id_04, 'kode' => 'LH.01.04.04', 'nama' => '04 Evaluasi', 'sifat' => 'R'],
            ['parent_id' => $id_04, 'kode' => 'LH.01.04.05', 'nama' => '05 Tindak Lanjut Hasil Evaluasi', 'sifat' => 'B'],

            // --- BIDANG 2 ---
            ['parent_id' => $id_pantau, 'kode' => 'LH.02.01.01', 'nama' => '1 Industri Kimia', 'sifat' => 'T'],
            ['parent_id' => $id_pantau, 'kode' => 'LH.02.01.02', 'nama' => '2 Industri Logam, Elektronika dan Mesin', 'sifat' => 'T'],
            ['parent_id' => $id_pantau, 'kode' => 'LH.02.01.03', 'nama' => '3 Aneka Industri', 'sifat' => 'T'],
            ['parent_id' => $id_pantau, 'kode' => 'LH.02.01.04', 'nama' => '4 Prasarana dan Jasa', 'sifat' => 'T'],
            ['parent_id' => $id_pantau, 'kode' => 'LH.02.01.05', 'nama' => '5 Pertambangan, Energi, Minyak dan Gas', 'sifat' => 'T'],
            ['parent_id' => $id_pantau, 'kode' => 'LH.02.01.06', 'nama' => '6 Peternakan dan Perikanan', 'sifat' => 'T'],
            ['parent_id' => $id_pantau, 'kode' => 'LH.02.01.07', 'nama' => '7 Perkebunan', 'sifat' => 'T'],
            ['parent_id' => $id_pantau, 'kode' => 'LH.02.01.08', 'nama' => '8 Kehutanan dan Holtikultura', 'sifat' => 'T'],
            ['parent_id' => $id_pantau, 'kode' => 'LH.02.01.09', 'nama' => '9 Usaha Skala Kecil', 'sifat' => 'T'],
            ['parent_id' => $id_pantau, 'kode' => 'LH.02.01.10', 'nama' => '10 Transportasi Air dan Udara', 'sifat' => 'T'],
            ['parent_id' => $id_pantau, 'kode' => 'LH.02.01.11', 'nama' => '11 Transportasi Darat', 'sifat' => 'T'],
            ['parent_id' => $id_pantau, 'kode' => 'LH.02.01.12', 'nama' => '12 Transportasi Kereta Api dan Kendaraan Berat', 'sifat' => 'T'],

            ['parent_id' => $id_eval, 'kode' => 'LH.02.02.01', 'nama' => '1 Industri Kimia', 'sifat' => 'T'],
            ['parent_id' => $id_eval, 'kode' => 'LH.02.02.02', 'nama' => '2 Industri Logam, Elektronika dan Mesin', 'sifat' => 'T'],
            ['parent_id' => $id_eval, 'kode' => 'LH.02.02.03', 'nama' => '3 Aneka Industri', 'sifat' => 'T'],
            ['parent_id' => $id_eval, 'kode' => 'LH.02.02.04', 'nama' => '4 Prasarana dan Jasa', 'sifat' => 'T'],
            ['parent_id' => $id_eval, 'kode' => 'LH.02.02.05', 'nama' => '5 Pertambangan, Energi, Minyak dan Gas', 'sifat' => 'T'],
            ['parent_id' => $id_eval, 'kode' => 'LH.02.02.06', 'nama' => '6 Peternakan dan Perikanan', 'sifat' => 'T'],
            ['parent_id' => $id_eval, 'kode' => 'LH.02.02.07', 'nama' => '7 Perkebunan', 'sifat' => 'T'],
            ['parent_id' => $id_eval, 'kode' => 'LH.02.02.08', 'nama' => '8 Kehutanan dan Holtikultura', 'sifat' => 'T'],
            ['parent_id' => $id_eval, 'kode' => 'LH.02.02.09', 'nama' => '9 Usaha Skala Kecil', 'sifat' => 'T'],
            ['parent_id' => $id_eval, 'kode' => 'LH.02.02.10', 'nama' => '10 Transportasi Air dan Udara', 'sifat' => 'T'],
            ['parent_id' => $id_eval, 'kode' => 'LH.02.02.11', 'nama' => '11 Transportasi Darat', 'sifat' => 'T'],
            ['parent_id' => $id_eval, 'kode' => 'LH.02.02.12', 'nama' => '12 Transportasi Kereta Api dan Kendaraan Berat', 'sifat' => 'T'],

            // --- BIDANG 3 ---
            ['parent_id' => $id_hayati, 'kode' => 'LH.03.01.01', 'nama' => '1 Pengembangan Sumber Daya Genetik', 'sifat' => 'T'],
            ['parent_id' => $id_hayati, 'kode' => 'LH.03.01.02', 'nama' => '2 Pengembangan Keamanan Hayati', 'sifat' => 'T'],
            ['parent_id' => $id_hayati, 'kode' => 'LH.03.01.03', 'nama' => '3 Pemanfaatan Sumber Daya Genetik', 'sifat' => 'T'],
            ['parent_id' => $id_hayati, 'kode' => 'LH.03.01.04', 'nama' => '4 Pengelolaan Sumber Daya Genetik / Pengembangan dan Pemanfaatan', 'sifat' => 'T'],
            ['parent_id' => $id_hayati, 'kode' => 'LH.03.01.05', 'nama' => '5 Pemantauan dan Pengawasan Pengelolaan Sumber Daya Genetik', 'sifat' => 'T'],
            ['parent_id' => $id_hayati, 'kode' => 'LH.03.01.06', 'nama' => '6 Pengembangan dan Pengelolaan Keamanan Hayati', 'sifat' => 'T'],
            ['parent_id' => $id_hayati, 'kode' => 'LH.03.01.07', 'nama' => '7 Pemantauan dan Pengawasan Keamanan Hayati', 'sifat' => 'T'],
            ['parent_id' => $id_hayati, 'kode' => 'LH.03.01.08', 'nama' => '8 Pengendalian Kerusakan Lahan Budidaya', 'sifat' => 'T'],
            ['parent_id' => $id_hayati, 'kode' => 'LH.03.01.09', 'nama' => '9 Lahan Non Budidaya', 'sifat' => 'T'],

            ['parent_id' => $id_perairan, 'kode' => 'LH.03.02.01', 'nama' => '1 Kerusakan Ekosistem Sungai', 'sifat' => 'T'],
            ['parent_id' => $id_perairan, 'kode' => 'LH.03.02.02', 'nama' => '2 Pengelolaan Kualitas Air Sungai', 'sifat' => 'T'],
            ['parent_id' => $id_perairan, 'kode' => 'LH.03.02.03', 'nama' => '3 Pengendalian Kerusakan Ekosistem Danau', 'sifat' => 'T'],
            ['parent_id' => $id_perairan, 'kode' => 'LH.03.02.04', 'nama' => '4 Pengelolaan Kualitas Air Danau', 'sifat' => 'T'],
            ['parent_id' => $id_perairan, 'kode' => 'LH.03.02.05', 'nama' => '5 Kerusakan Ekosistem Rawa Gambut', 'sifat' => 'T'],
            ['parent_id' => $id_perairan, 'kode' => 'LH.03.02.06', 'nama' => '6 Kerusakan Ekosistem Rawa bukan gambut', 'sifat' => 'T'],

            ['parent_id' => $id_pesisir, 'kode' => 'LH.03.03.01', 'nama' => '1 Pencegahan', 'sifat' => 'T'],
            ['parent_id' => $id_pesisir, 'kode' => 'LH.03.03.02', 'nama' => '2 Penanggulangan', 'sifat' => 'T'],
            ['parent_id' => $id_pesisir, 'kode' => 'LH.03.03.03', 'nama' => '3 Pemulihan', 'sifat' => 'T'],

            ['parent_id' => $id_atmosfer, 'kode' => 'LH.03.04.01', 'nama' => '1 Perangkat Mitigasi', 'sifat' => 'T'],
            ['parent_id' => $id_atmosfer, 'kode' => 'LH.03.04.02', 'nama' => '2 Laporan inventarisasi GRK nasional', 'sifat' => 'T'],
            ['parent_id' => $id_atmosfer, 'kode' => 'LH.03.04.03', 'nama' => '3 Data bidang inventarisasi GRK', 'sifat' => 'T'],
            ['parent_id' => $id_atmosfer, 'kode' => 'LH.03.04.04', 'nama' => '4 Surat rekomendasi kepada importir terdaftar dan bahan perusak ozon', 'sifat' => 'T'],
            ['parent_id' => $id_atmosfer, 'kode' => 'LH.03.04.05', 'nama' => '5 Hibah bantuan luar negeri terkait program perlindungan lapisan Ozon', 'sifat' => 'T'],
            ['parent_id' => $id_atmosfer, 'kode' => 'LH.03.04.06', 'nama' => '6 Pengendalian Kerusakan Akibat Kebakaran Hutan dan Lahan', 'sifat' => 'T'],

            ['parent_id' => $id_adaptasi, 'kode' => 'LH.03.05.01', 'nama' => '1 Pengembangan perangkat adaptasi perubahan iklim', 'sifat' => 'T'],
            ['parent_id' => $id_adaptasi, 'kode' => 'LH.03.05.02', 'nama' => '2 Pemantauan dan evaluasi adaptasi perubahan iklim', 'sifat' => 'B'],
            ['parent_id' => $id_adaptasi, 'kode' => 'LH.03.05.03', 'nama' => '3 Identifikasi dan analisis kerentanan perubahan iklim', 'sifat' => 'B'],
            ['parent_id' => $id_adaptasi, 'kode' => 'LH.03.05.04', 'nama' => '4 Media kliring kerentanan perubahan iklim', 'sifat' => 'B'],

            // --- BIDANG 4 (PB) ---
            ['parent_id' => $id_b4_1, 'kode' => 'LH.PB.01.01', 'nama' => '1 Registrasi', 'sifat' => 'T'],
            ['parent_id' => $id_b4_1, 'kode' => 'LH.PB.01.02', 'nama' => '2 Notifikasi', 'sifat' => 'T'],
            ['parent_id' => $id_b4_1, 'kode' => 'LH.PB.01.03', 'nama' => '3 Pemantauan Sektor industri', 'sifat' => 'T'],
            ['parent_id' => $id_b4_1, 'kode' => 'LH.PB.01.04', 'nama' => '4 Pemantauan Sektor non industri', 'sifat' => 'T'],
            ['parent_id' => $id_b4_1, 'kode' => 'LH.PB.01.05', 'nama' => '5 Evaluasi dan Tindak Lanjut Sektor industri', 'sifat' => 'T'],
            ['parent_id' => $id_b4_1, 'kode' => 'LH.PB.01.06', 'nama' => '6 Evaluasi dan Tindak Lanjut Sektor non industri', 'sifat' => 'T'],

            ['parent_id' => $id_b4_2, 'kode' => 'LH.PB.02.01', 'nama' => '1 Pengumpulan dan Pemanfaatan', 'sifat' => 'T'],
            ['parent_id' => $id_b4_2, 'kode' => 'LH.PB.02.02', 'nama' => '2 Pengangkutan dan Pengolahan', 'sifat' => 'T'],
            ['parent_id' => $id_b4_2, 'kode' => 'LH.PB.02.03', 'nama' => '3 Penimbunan dan Dumping', 'sifat' => 'T'],
            ['parent_id' => $id_b4_2, 'kode' => 'LH.PB.02.04', 'nama' => '4 Notifikasi Limbah Lintas Batas', 'sifat' => 'T'],
            ['parent_id' => $id_b4_2, 'kode' => 'LH.PB.02.05', 'nama' => '5 Rekomendasi Limbah Lintas Batas', 'sifat' => 'T'],

            ['parent_id' => $id_b4_3, 'kode' => 'LH.PB.03.01', 'nama' => '1 Pemantauan Pertambangan, Energi, dan Minyak dan Gas', 'sifat' => 'T'],
            ['parent_id' => $id_b4_3, 'kode' => 'LH.PB.03.02', 'nama' => '2 Pemantauan Manufaktur', 'sifat' => 'T'],
            ['parent_id' => $id_b4_3, 'kode' => 'LH.PB.03.03', 'nama' => '3 Pemantauan Agroindustri', 'sifat' => 'T'],
            ['parent_id' => $id_b4_3, 'kode' => 'LH.PB.03.04', 'nama' => '4 Pemantauan Prasarana, Jasa, dan Non Institusi', 'sifat' => 'T'],
            ['parent_id' => $id_b4_3, 'kode' => 'LH.PB.03.05', 'nama' => '5 Tanggap Darurat dan Pemulihan Kontaminasi Pertambangan, Energi, dan Minyak dan Gas', 'sifat' => 'T'],
            ['parent_id' => $id_b4_3, 'kode' => 'LH.PB.03.06', 'nama' => '6 Tanggap Darurat dan Pemulihan Kontaminasi Manufaktur', 'sifat' => 'T'],
            ['parent_id' => $id_b4_3, 'kode' => 'LH.PB.03.07', 'nama' => '7 Tanggap Darurat dan Pemulihan Kontaminasi Agroindustri', 'sifat' => 'T'],
            ['parent_id' => $id_b4_3, 'kode' => 'LH.PB.03.08', 'nama' => '8 Tanggap Darurat dan Pemulihan Kontaminasi Prasarana, Jasa, dan Non Institusi', 'sifat' => 'T'],

            ['parent_id' => $id_b4_4, 'kode' => 'LH.PB.04.01', 'nama' => '1 Pembatasan Sampah', 'sifat' => 'T'],
            ['parent_id' => $id_b4_4, 'kode' => 'LH.PB.04.02', 'nama' => '2 Daur Ulang dan Pemanfaatan Sampah', 'sifat' => 'T'],
            ['parent_id' => $id_b4_4, 'kode' => 'LH.PB.04.03', 'nama' => '3 Pembentukan Dewan Adipura', 'sifat' => 'T'],
            ['parent_id' => $id_b4_4, 'kode' => 'LH.PB.04.04', 'nama' => '4 Penetapan Pemenang Adipura', 'sifat' => 'T'],

            // --- BIDANG 5 (HL) ---
            ['parent_id' => $id_hl_1, 'kode' => 'LH.HL.01.01', 'nama' => '1 Pengelolaan Pengaduan', 'sifat' => 'T'],
            ['parent_id' => $id_hl_1, 'kode' => 'LH.HL.01.02', 'nama' => '2 Pengembangan Pengaduan', 'sifat' => 'T'],
            ['parent_id' => $id_hl_1, 'kode' => 'LH.HL.01.03', 'nama' => '3 Penerapan hukum administrasi lingkungan', 'sifat' => 'T'],
            ['parent_id' => $id_hl_1, 'kode' => 'LH.HL.01.04', 'nama' => '4 Pengembangan hukum administrasi Lingkungan', 'sifat' => 'T'],

            ['parent_id' => $id_hl_2, 'kode' => 'LH.HL.02.01', 'nama' => '1 Administrasi Gugatan Penyelesaian Sengketa Melalui Pengadilan', 'sifat' => 'T'],
            ['parent_id' => $id_hl_2, 'kode' => 'LH.HL.02.02', 'nama' => '2 Gugatan Penyelesaian Sengketa Melalui Pengadilan', 'sifat' => 'T'],
            ['parent_id' => $id_hl_2, 'kode' => 'LH.HL.02.03', 'nama' => '3 Kerugian Negara dan Masyarakat Penyelesaian Sengketa Lingkungan di Luar Pengadilan', 'sifat' => 'T'],
            ['parent_id' => $id_hl_2, 'kode' => 'LH.HL.02.04', 'nama' => '4 Lembaga Penyedia Jasa Penyelesaian Sengketa Lingkungan Hidup Penyelesaian Sengketa Lingkungan di Luar Pengadilan', 'sifat' => 'T'],

            ['parent_id' => $id_hl_3, 'kode' => 'LH.HL.03.01', 'nama' => '1 Administrasi Penyidikan', 'sifat' => 'T'],
            ['parent_id' => $id_hl_3, 'kode' => 'LH.HL.03.02', 'nama' => '2 Pelaksanaan Penyidikan', 'sifat' => 'T'],
            ['parent_id' => $id_hl_3, 'kode' => 'LH.HL.03.03', 'nama' => '3 Koordinasi penuntutan', 'sifat' => 'T'],
            ['parent_id' => $id_hl_3, 'kode' => 'LH.HL.03.04', 'nama' => '4 Evaluasi dan tindak lanjut Koordinasi Penuntutan', 'sifat' => 'T'],
            ['parent_id' => $id_hl_3, 'kode' => 'LH.HL.03.05', 'nama' => '5 Koordinasi Pembinaan Penyidik Pegawai Negeri Sipil', 'sifat' => 'T'],

            ['parent_id' => $id_hl_4, 'kode' => 'LH.HL.04.01', 'nama' => '1 Pendapat Hukum Proses Pengesahan Perjanjian Internasional', 'sifat' => 'T'],
            ['parent_id' => $id_hl_4, 'kode' => 'LH.HL.04.02', 'nama' => '2 Tindak Lanjut Perjanjian Internasional', 'sifat' => 'T'],
            ['parent_id' => $id_hl_4, 'kode' => 'LH.HL.04.03', 'nama' => '3 Evaluasi Perjanjian Internasional Pencemaran', 'sifat' => 'T'],
            ['parent_id' => $id_hl_4, 'kode' => 'LH.HL.04.04', 'nama' => '4 Evaluasi Perjanjian Internasional Perusakan', 'sifat' => 'T'],

            // --- BIDANG 6 (KM) ---
            ['parent_id' => $id_km_1, 'kode' => 'LH.KM.01.01', 'nama' => '1 Program Pengembangan Komunikasi', 'sifat' => 'T'],
            ['parent_id' => $id_km_1, 'kode' => 'LH.KM.01.02', 'nama' => '2 Evaluasi Pengembangan Komunikasi', 'sifat' => 'T'],
            ['parent_id' => $id_km_1, 'kode' => 'LH.KM.01.03', 'nama' => '3 Publikasi', 'sifat' => 'T'],
            ['parent_id' => $id_km_1, 'kode' => 'LH.KM.01.04', 'nama' => '4 Kampanye', 'sifat' => 'T'],

            ['parent_id' => $id_km_2, 'kode' => 'LH.KM.02.01', 'nama' => '1 Pengembangan dan Bimbingan Komunitas Pendidikan Lingkungan', 'sifat' => 'T'],
            ['parent_id' => $id_km_2, 'kode' => 'LH.KM.02.02', 'nama' => '2 Evaluasi Komunitas Pendidikan Lingkungan', 'sifat' => 'T'],
            ['parent_id' => $id_km_2, 'kode' => 'LH.KM.02.03', 'nama' => '3 Inventarisasi Kearifan Lingkungan', 'sifat' => 'T'],
            ['parent_id' => $id_km_2, 'kode' => 'LH.KM.02.04', 'nama' => '4 Revitalisasi Kearifan Lingkungan', 'sifat' => 'T'],

            ['parent_id' => $id_km_3, 'kode' => 'LH.KM.03.01', 'nama' => '1 Masyarakat Kawasan Permukiman', 'sifat' => 'T'],
            ['parent_id' => $id_km_3, 'kode' => 'LH.KM.03.02', 'nama' => '2 Masyarakat Kawasan Rentan', 'sifat' => 'T'],
            ['parent_id' => $id_km_3, 'kode' => 'LH.KM.03.03', 'nama' => '3 Masyarakat Petani', 'sifat' => 'T'],
            ['parent_id' => $id_km_3, 'kode' => 'LH.KM.03.04', 'nama' => '4 Masyarakat Nelayan', 'sifat' => 'T'],

            ['parent_id' => $id_km_4, 'kode' => 'LH.KM.04.01', 'nama' => '1 Organisasi Sosial Dan Masyarakat', 'sifat' => 'T'],
            ['parent_id' => $id_km_4, 'kode' => 'LH.KM.04.02', 'nama' => '2 Organisasi Profesi dan Dunia Usaha', 'sifat' => 'T'],

            // --- BIDANG 7 (PS -> Cetak format LH.PS.01.02) ---
            ['parent_id' => $id_ps_1, 'kode' => 'LH.PS.01.01', 'nama' => '1 Pengumpulan dan Pengolahan Data', 'sifat' => 'T'],
            ['parent_id' => $id_ps_1, 'kode' => 'LH.PS.01.02', 'nama' => '2 Manajemen Basis Data', 'sifat' => 'T'],
            ['parent_id' => $id_ps_1, 'kode' => 'LH.PS.01.03', 'nama' => '3 Analisis Data dan Penyajian Informasi', 'sifat' => 'T'],
            ['parent_id' => $id_ps_1, 'kode' => 'LH.PS.01.04', 'nama' => '4 Pengelolaan Informasi melalui Perpustakaan', 'sifat' => 'T'],
            ['parent_id' => $id_ps_1, 'kode' => 'LH.PS.01.05', 'nama' => '5 Pengembangan Instrumen Layanan Informasi', 'sifat' => 'T'],
            ['parent_id' => $id_ps_1, 'kode' => 'LH.PS.01.06', 'nama' => '6 Pengembangan Instrumen Analisis Data', 'sifat' => 'T'],
            ['parent_id' => $id_ps_1, 'kode' => 'LH.PS.01.07', 'nama' => '7 Pengembangan Sistem Jaringan', 'sifat' => 'T'],
            ['parent_id' => $id_ps_1, 'kode' => 'LH.PS.01.08', 'nama' => '8 Pemeliharaan Jaringan', 'sifat' => 'T'],

            ['parent_id' => $id_ps_2, 'kode' => 'LH.PS.02.01', 'nama' => '1 Pengembangan Kelembagaan', 'sifat' => 'T'],
            ['parent_id' => $id_ps_2, 'kode' => 'LH.PS.02.02', 'nama' => '2 Tata Laksana', 'sifat' => 'T'],
            ['parent_id' => $id_ps_2, 'kode' => 'LH.PS.02.03', 'nama' => '3 Fasilitasi Standar Pelayanan Minimal Daerah Provinsi', 'sifat' => 'T'],
            ['parent_id' => $id_ps_2, 'kode' => 'LH.PS.02.04', 'nama' => '4 Fasilitasi Standar Pelayanan Minimal Kabupaten/Kota', 'sifat' => 'T'],

            ['parent_id' => $id_ps_3, 'kode' => 'LH.PS.03.01', 'nama' => '1 Standarisasi Perangkat Manajemen Lingkungan', 'sifat' => 'T'],
            ['parent_id' => $id_ps_3, 'kode' => 'LH.PS.03.02', 'nama' => '2 Standarisasi Pengujian Lingkungan', 'sifat' => 'T'],
            ['parent_id' => $id_ps_3, 'kode' => 'LH.PS.03.03', 'nama' => '3 Standarisasi Kompetensi Keahlian Lingkungan', 'sifat' => 'T'],
            ['parent_id' => $id_ps_3, 'kode' => 'LH.PS.03.04', 'nama' => '4 Standarisasi Kompetensi Lembaga Penyedia Jasa Lingkungan', 'sifat' => 'T'],
            ['parent_id' => $id_ps_3, 'kode' => 'LH.PS.03.05', 'nama' => '5 Pengembangan Kriteria Teknologi Ramah Lingkungan', 'sifat' => 'T'],
            ['parent_id' => $id_ps_3, 'kode' => 'LH.PS.03.06', 'nama' => '6 Verifikasi Teknologi Ramah Lingkungan', 'sifat' => 'T'],

            ['parent_id' => $id_ps_4, 'kode' => 'LH.PS.04.01', 'nama' => '1 Pemantauan Kualitas Lingkungan', 'sifat' => 'T'],
            ['parent_id' => $id_ps_4, 'kode' => 'LH.PS.04.02', 'nama' => '2 Kajian Kualitas Lingkungan', 'sifat' => 'T'],
            ['parent_id' => $id_ps_4, 'kode' => 'LH.PS.04.03', 'nama' => '3 Laboratorium Rujukan', 'sifat' => 'T'],
            ['parent_id' => $id_ps_4, 'kode' => 'LH.PS.04.04', 'nama' => '4 Laboratorium Pengujian dan Kalibrasi', 'sifat' => 'T'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('klasifikasis');
    }
};
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
            // HAPUS ->unique() DISINI BIAR BISA NERIMA KODE KEMBAR TANPA ERROR
            $table->string('kode'); 
            $table->string('nama'); 
            $table->string('sifat')->default('B'); 
            $table->timestamps();
        });

        // ==============================================================================
        // LEVEL 0: KATEGORI UTAMA (AKAR)
        // ==============================================================================
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => null, 'kode' => 'FAS', 'nama' => 'Urusan Fasilitatif', 'sifat' => 'B'],
            ['parent_id' => null, 'kode' => 'SUB', 'nama' => 'Urusan Subtantif', 'sifat' => 'B'],
        ]);

        $id_fas = DB::table('klasifikasis')->where('kode', 'FAS')->value('id');
        $id_sub = DB::table('klasifikasis')->where('kode', 'SUB')->value('id');

        // ==============================================================================
        // LEVEL 1: URUSAN FASILITATIF (15 URUSAN)
        // ==============================================================================
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_fas, 'kode' => 'HM', 'nama' => 'Hubungan Masyarakat', 'sifat' => 'B'],
            ['parent_id' => $id_fas, 'kode' => 'HK', 'nama' => 'Hukum', 'sifat' => 'B'],
            ['parent_id' => $id_fas, 'kode' => 'TU', 'nama' => 'Ketatausahaan', 'sifat' => 'B'],
            ['parent_id' => $id_fas, 'kode' => 'OT', 'nama' => 'Organisasi dan Tata Laksana', 'sifat' => 'B'],
            ['parent_id' => $id_fas, 'kode' => 'PL', 'nama' => 'Perlengkapan', 'sifat' => 'B'],
            ['parent_id' => $id_fas, 'kode' => 'RT', 'nama' => 'Kerumahtanggaan', 'sifat' => 'B'],
            ['parent_id' => $id_fas, 'kode' => 'PR', 'nama' => 'Perencanaan', 'sifat' => 'B'],
            ['parent_id' => $id_fas, 'kode' => 'LB', 'nama' => 'Penelitian dan Pengembangan', 'sifat' => 'B'],
            ['parent_id' => $id_fas, 'kode' => 'PW', 'nama' => 'Pengawasan', 'sifat' => 'B'],
            ['parent_id' => $id_fas, 'kode' => 'KPG', 'nama' => 'Kepegawaian', 'sifat' => 'B'],
            ['parent_id' => $id_fas, 'kode' => 'PSM', 'nama' => 'Pengembangan Sumber Daya Manusia', 'sifat' => 'B'],
            ['parent_id' => $id_fas, 'kode' => 'KU', 'nama' => 'Keuangan', 'sifat' => 'B'],
            ['parent_id' => $id_fas, 'kode' => 'AR', 'nama' => 'Kearsipan', 'sifat' => 'B'],
            ['parent_id' => $id_fas, 'kode' => 'ST', 'nama' => 'Statistik', 'sifat' => 'B'],
            ['parent_id' => $id_fas, 'kode' => 'SD', 'nama' => 'Persandian', 'sifat' => 'B'],
        ]);

        // ==============================================================================
        // LEVEL 1: URUSAN SUBTANTIF (42 URUSAN)
        // ==============================================================================
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_sub, 'kode' => 'KP', 'nama' => 'Kelautan dan Perikanan', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'PD', 'nama' => 'Pemerintah Daerah', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'KB', 'nama' => 'Kesatuan Bangsa dan Politik', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'PEM', 'nama' => 'Pemerintahan Umum', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'OD', 'nama' => 'Otonomi Daerah', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'PMD', 'nama' => 'Pemberdayaan Masyarakat Dan Desa', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'KH', 'nama' => 'Kehutanan', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'PT', 'nama' => 'Pertanian', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'LH', 'nama' => 'Lingkungan Hidup', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'PBLS', 'nama' => 'Pengelolaan B3, Limbah, Dan Sampah', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'BP', 'nama' => 'Bina Pembangunan', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'HL', 'nama' => 'Hukum Lingkungan', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'KM', 'nama' => 'Komunikasi Lingkungan Dan Pemberdayaan Masyarakat', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'PS', 'nama' => 'Pembinaan Sarana Teknis Lingkungan Dan Peningkatan Kapasitas', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'KUKM', 'nama' => 'Koperasi dan UMKM', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'PM', 'nama' => 'Penanaman Modal', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'DG', 'nama' => 'Perdagangan', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'PI', 'nama' => 'Perindustrian', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'IT', 'nama' => 'Perikanan Tangkap', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'IB', 'nama' => 'Perikanan Budidaya', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'PPI', 'nama' => 'Pengolahan dan Pemasaran Hasil Perikanan', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'KL', 'nama' => 'Kelautan, Pesisir, dan Pulau-Pulau Kecil', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'PSDK', 'nama' => 'Pengawasan Sumber Daya Kelautan dan Perikanan', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'KI', 'nama' => 'Karantina Ikan', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'PAR', 'nama' => 'Pariwisata', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'EKSB', 'nama' => 'Ekonomi Kreatif Berbasis Seni dan Budaya', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'EKM', 'nama' => 'Ekonomi Kreatif Berbasis Media, Desain, dan Iptek', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'PSDP', 'nama' => 'Pengembangan Sumber Daya Pariwisata dan Ekonomi Kreatif', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'PB', 'nama' => 'Penanggulangan Bencana', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'KOM', 'nama' => 'Komunikasi dan Informatika', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'HUB', 'nama' => 'Perhubungan', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'PDT', 'nama' => 'Pembangunan Daerah Tertinggal', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'TK', 'nama' => 'Urusan Tenaga Kerja dan Transmigrasi', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'KO', 'nama' => 'Urusan Kepemudaan dan Olahraga', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'KK', 'nama' => 'Kependudukan dan Keluarga Berencana', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'PA', 'nama' => 'Pemberdayaan Perempuan dan Perlindungan Anak', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'PK', 'nama' => 'Pendidikan', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'PUS', 'nama' => 'Urusan Perpustakaan', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'KS', 'nama' => 'Urusan Kesehatan', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'SS', 'nama' => 'Urusan Sosial', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'ES', 'nama' => 'Energi dan Sumber Daya Mineral', 'sifat' => 'B'],
            ['parent_id' => $id_sub, 'kode' => 'PUR', 'nama' => 'Pekerjaan Umum Dan Penataan Ruang', 'sifat' => 'B'],
        ]);

     // ==============================================================================
        // RINCIAN URUSAN FASILITATIF: HM (Hubungan Masyarakat)
        // ==============================================================================
        $id_hm = DB::table('klasifikasis')->where('kode', 'HM')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_hm, 'kode' => 'HM.01', 'nama' => 'Penerangan dan Publikasi', 'sifat' => 'B'],
            ['parent_id' => $id_hm, 'kode' => 'HM.02', 'nama' => 'Dengar pendapat/hearing', 'sifat' => 'B'],
            ['parent_id' => $id_hm, 'kode' => 'HM.02', 'nama' => 'Hubungan Antar Lembaga', 'sifat' => 'B'], 
            ['parent_id' => $id_hm, 'kode' => 'HM.03', 'nama' => 'Keprotokolan', 'sifat' => 'B'],
            ['parent_id' => $id_hm, 'kode' => 'HM.04', 'nama' => 'Dokumentasi dan Penerbitan', 'sifat' => 'B'],
            ['parent_id' => $id_hm, 'kode' => 'HM.05', 'nama' => 'Penghargaan/Tanda Kenang-kenangan', 'sifat' => 'B'],
            ['parent_id' => $id_hm, 'kode' => 'HM.06', 'nama' => 'Ucapan', 'sifat' => 'B'],
            ['parent_id' => $id_hm, 'kode' => 'HM.07', 'nama' => 'Dokumen Hosting', 'sifat' => 'B'],
        ]);

        // Karena kode kembar, tarik ID berdasarkan kode DAN nama
        $id_hm_2_2 = DB::table('klasifikasis')->where('kode', 'HM.02')->where('nama', 'Hubungan Antar Lembaga')->value('id');
        $id_hm_3 = DB::table('klasifikasis')->where('kode', 'HM.03')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // Anak dari HM.02 (Hubungan Antar Lembaga)
            ['parent_id' => $id_hm_2_2, 'kode' => 'HM.02.01', 'nama' => 'Forkompimda', 'sifat' => 'B'],
            ['parent_id' => $id_hm_2_2, 'kode' => 'HM.02.02', 'nama' => 'Organisasi Kearsipan Nasional dan Internasional', 'sifat' => 'B'],
            ['parent_id' => $id_hm_2_2, 'kode' => 'HM.02.03', 'nama' => 'Instansi Vertikal', 'sifat' => 'B'],
            ['parent_id' => $id_hm_2_2, 'kode' => 'HM.02.04', 'nama' => 'Organisasi Kemasyarakatan', 'sifat' => 'B'],
            ['parent_id' => $id_hm_2_2, 'kode' => 'HM.02.05', 'nama' => 'Perguruan Tinggi/Sekolah', 'sifat' => 'B'],
            ['parent_id' => $id_hm_2_2, 'kode' => 'HM.02.06', 'nama' => 'Partai Politik', 'sifat' => 'B'],
            ['parent_id' => $id_hm_2_2, 'kode' => 'HM.02.07', 'nama' => 'Swasta', 'sifat' => 'B'],
            ['parent_id' => $id_hm_2_2, 'kode' => 'HM.02.08', 'nama' => 'Bakohumas', 'sifat' => 'B'],

            // Anak dari HM.03 (Keprotokolan)
            ['parent_id' => $id_hm_3, 'kode' => 'HM.03.01', 'nama' => 'Upacara/Acara Kedinasan', 'sifat' => 'B'],
            ['parent_id' => $id_hm_3, 'kode' => 'HM.03.02', 'nama' => 'Kunjungan', 'sifat' => 'B'],
            ['parent_id' => $id_hm_3, 'kode' => 'HM.03.03', 'nama' => 'Agenda Pimpinan', 'sifat' => 'B'],
        ]);

        // ==============================================================================
        // RINCIAN URUSAN FASILITATIF: HK (Hukum)
        // ==============================================================================
        $id_hk = DB::table('klasifikasis')->where('kode', 'HK')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // Level Anak HK
            ['parent_id' => $id_hk, 'kode' => 'HK.01', 'nama' => 'Program Legislasi.', 'sifat' => 'B'],
            ['parent_id' => $id_hk, 'kode' => 'HK.02', 'nama' => 'Produk Hukum.', 'sifat' => 'B'],
            ['parent_id' => $id_hk, 'kode' => 'HK.02', 'nama' => 'Perjanjian Kerjasama.', 'sifat' => 'B'],
            ['parent_id' => $id_hk, 'kode' => 'HK.03', 'nama' => 'Bantuan Hukum.', 'sifat' => 'B'],
            ['parent_id' => $id_hk, 'kode' => 'HK.04', 'nama' => 'Telaah Hukum.', 'sifat' => 'B'],
            ['parent_id' => $id_hk, 'kode' => 'HK.05', 'nama' => 'Sosialisasi Hukum.', 'sifat' => 'B'],
            ['parent_id' => $id_hk, 'kode' => 'HK.06', 'nama' => 'Dokumentasi Hukum.', 'sifat' => 'B'],
            ['parent_id' => $id_hk, 'kode' => 'HK.07', 'nama' => 'Hak Atas Kekayaan Intelektual.', 'sifat' => 'B'],
            ['parent_id' => $id_hk, 'kode' => 'HK.08', 'nama' => 'Penegakan Hukum.', 'sifat' => 'B'],
            ['parent_id' => $id_hk, 'kode' => 'HK.09', 'nama' => 'Penyidik Pegawai Negeri Sipil.', 'sifat' => 'B'],
        ]);

        // Ambil ID anak untuk masukin Cucu
        $id_hk_1 = DB::table('klasifikasis')->where('kode', 'HK.01')->value('id');
        $id_hk_2 = DB::table('klasifikasis')->where('kode', 'HK.02')->where('nama', 'Produk Hukum.')->value('id');
        $id_hk_2_2 = DB::table('klasifikasis')->where('kode', 'HK.02')->where('nama', 'Perjanjian Kerjasama.')->value('id');
        $id_hk_3 = DB::table('klasifikasis')->where('kode', 'HK.03')->value('id');
        $id_hk_4 = DB::table('klasifikasis')->where('kode', 'HK.04')->value('id');
        $id_hk_6 = DB::table('klasifikasis')->where('kode', 'HK.06')->value('id');
        $id_hk_8 = DB::table('klasifikasis')->where('kode', 'HK.08')->value('id');
        $id_hk_9 = DB::table('klasifikasis')->where('kode', 'HK.09')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // Anak dari HK.01
            ['parent_id' => $id_hk_1, 'kode' => 'HK.01.01', 'nama' => 'Perencanaan Program Legislasi Daerah.', 'sifat' => 'B'],
            ['parent_id' => $id_hk_1, 'kode' => 'HK.01.02', 'nama' => 'Evaluasi Program Legislasi.', 'sifat' => 'B'],

            // Anak dari HK.02
            ['parent_id' => $id_hk_2, 'kode' => 'HK.02.01', 'nama' => 'Proses Penyusunan Peraturan Daerah.', 'sifat' => 'B'],
            ['parent_id' => $id_hk_2, 'kode' => 'HK.02.02', 'nama' => 'Proses Penyusunan Peraturan Gubernur.', 'sifat' => 'B'],
            ['parent_id' => $id_hk_2, 'kode' => 'HK.02.03', 'nama' => 'Proses Penyusunan Keputusan Gubernur.', 'sifat' => 'B'],

            // Anak dari HK.02 (Perjanjian Kerjasama)
            ['parent_id' => $id_hk_2_2, 'kode' => 'HK.02.01', 'nama' => 'Kerjasama Dalam Negeri.', 'sifat' => 'B'],
            ['parent_id' => $id_hk_2_2, 'kode' => 'HK.02.02', 'nama' => 'Kerjasama Luar Negeri.', 'sifat' => 'B'],

            // Anak dari HK.03
            ['parent_id' => $id_hk_3, 'kode' => 'HK.03.01', 'nama' => 'Bantuan Hukum Kasus Perdata.', 'sifat' => 'B'],
            ['parent_id' => $id_hk_3, 'kode' => 'HK.03.02', 'nama' => 'Bantuan Hukum Kasus Pidana.', 'sifat' => 'B'],
            ['parent_id' => $id_hk_3, 'kode' => 'HK.03.03', 'nama' => 'Bantuan Hukum Kasus Peradilan Tata Usaha Negara.', 'sifat' => 'B'],

            // Anak dari HK.04
            ['parent_id' => $id_hk_4, 'kode' => 'HK.04.01', 'nama' => 'Telaah Hukum Internal.', 'sifat' => 'B'],
            ['parent_id' => $id_hk_4, 'kode' => 'HK.04.02', 'nama' => 'Telaah Hukum Eksternal.', 'sifat' => 'B'],

            // Anak dari HK.06 (Sesuai typo di dokumen "HUkum")
            ['parent_id' => $id_hk_6, 'kode' => 'HK.06.01', 'nama' => 'Kegiatan Pengembangan Dokumentasi Hukum.', 'sifat' => 'B'],
            ['parent_id' => $id_hk_6, 'kode' => 'HK.06.02', 'nama' => 'Data Base Dokumentasi HUkum.', 'sifat' => 'B'],

            // Anak dari HK.08
            ['parent_id' => $id_hk_8, 'kode' => 'HK.08.01', 'nama' => 'Kegiatan Penegakan Peraturan Daerah.', 'sifat' => 'B'],
            ['parent_id' => $id_hk_8, 'kode' => 'HK.08.02', 'nama' => 'Tindak lanjut Kegiatan Penegakan Hukum.', 'sifat' => 'B'],

            // Anak dari HK.09
            ['parent_id' => $id_hk_9, 'kode' => 'HK.09.01', 'nama' => 'Program Pengembangan PPNS.', 'sifat' => 'B'],
            ['parent_id' => $id_hk_9, 'kode' => 'HK.09.02', 'nama' => 'Pembinaan Personal PPNS.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN FASILITATIF: TU (Ketatausahaan) & OT (Organisasi & Tata Laksana)
        // ==============================================================================
        $id_tu = DB::table('klasifikasis')->where('kode', 'TU')->value('id');
        $id_ot = DB::table('klasifikasis')->where('kode', 'OT')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // --- Level Anak TU (Ketatausahaan) ---
            ['parent_id' => $id_tu, 'kode' => 'TU.01', 'nama' => 'Persuratan.', 'sifat' => 'B'],
            ['parent_id' => $id_tu, 'kode' => 'TU.02', 'nama' => 'Penggandaan Surat Masuk.', 'sifat' => 'B'],
            ['parent_id' => $id_tu, 'kode' => 'TU.03', 'nama' => 'Agenda Kegiatan.', 'sifat' => 'B'],
            ['parent_id' => $id_tu, 'kode' => 'TU.04', 'nama' => 'Rapat/Rakor/Rakernis.', 'sifat' => 'B'],

            // --- Level Anak OT (Organisasi dan Tata Laksana) ---
            ['parent_id' => $id_ot, 'kode' => 'OT.01', 'nama' => 'Organisasi.', 'sifat' => 'B'],
            ['parent_id' => $id_ot, 'kode' => 'OT.02', 'nama' => 'Hubungan / Mekanisme Kerja.', 'sifat' => 'B'],
            ['parent_id' => $id_ot, 'kode' => 'OT.03', 'nama' => 'Ketatalaksanaan.', 'sifat' => 'B'],
        ]);

        // Ambil ID anak untuk masukin Cucu
        $id_tu_1 = DB::table('klasifikasis')->where('kode', 'TU.01')->value('id');
        $id_ot_1 = DB::table('klasifikasis')->where('kode', 'OT.01')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // --- Anak dari TU.01 ---
            ['parent_id' => $id_tu_1, 'kode' => 'TU.01.01', 'nama' => 'Pengurusan Surat Masuk.', 'sifat' => 'B'],
            ['parent_id' => $id_tu_1, 'kode' => 'TU.01.02', 'nama' => 'Pengurusan Surat Keluar.', 'sifat' => 'B'],
            ['parent_id' => $id_tu_1, 'kode' => 'TU.01.03', 'nama' => 'Korespondensi Internal.', 'sifat' => 'B'],

            // --- Anak dari OT.01 ---
            ['parent_id' => $id_ot_1, 'kode' => 'OT.01.01', 'nama' => 'Struktur Organisasi.', 'sifat' => 'B'],
            ['parent_id' => $id_ot_1, 'kode' => 'OT.01.02', 'nama' => 'Uraian Tugas.', 'sifat' => 'B'],
            ['parent_id' => $id_ot_1, 'kode' => 'OT.01.03', 'nama' => 'Analisis Jabatan dan Beban Kerja.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // LANJUTAN RINCIAN URUSAN FASILITATIF: PL (Perlengkapan)
        // ==============================================================================
        $id_pl = DB::table('klasifikasis')->where('kode', 'PL')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // Lanjutan Level Anak PL (04 - 08)
            ['parent_id' => $id_pl, 'kode' => 'PL.04', 'nama' => 'Penyimpanan/Pergudangan.', 'sifat' => 'B'],
            ['parent_id' => $id_pl, 'kode' => 'PL.05', 'nama' => 'Distribusi.', 'sifat' => 'B'],
            ['parent_id' => $id_pl, 'kode' => 'PL.06', 'nama' => 'Pemeliharaan.', 'sifat' => 'B'],
            ['parent_id' => $id_pl, 'kode' => 'PL.07', 'nama' => 'Inventarisasi.', 'sifat' => 'B'],
            ['parent_id' => $id_pl, 'kode' => 'PL.08', 'nama' => 'Penghapusan.', 'sifat' => 'B'],
        ]);

        // Ambil ID PL.03 untuk masukin sub-babnya
        $id_pl_3 = DB::table('klasifikasis')->where('kode', 'PL.03')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // Anak dari PL.03 (Penerimaan / Realisasi Pengadaan)
            ['parent_id' => $id_pl_3, 'kode' => 'PL.03.00', 'nama' => 'Alat Tulis Kantor.', 'sifat' => 'B'],
            ['parent_id' => $id_pl_3, 'kode' => 'PL.03.01', 'nama' => 'Perlengkapan Kantor.', 'sifat' => 'B'],
            ['parent_id' => $id_pl_3, 'kode' => 'PL.03.02', 'nama' => 'Tanah dan Bangunan.', 'sifat' => 'B'],
            ['parent_id' => $id_pl_3, 'kode' => 'PL.03.03', 'nama' => 'Kendaraan.', 'sifat' => 'B'],
            ['parent_id' => $id_pl_3, 'kode' => 'PL.03.04', 'nama' => 'Instalasi/Jaringan.', 'sifat' => 'B'],
            ['parent_id' => $id_pl_3, 'kode' => 'PL.03.05', 'nama' => 'Peralatan Kearsipan.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN FASILITATIF: RT (Kerumahtanggaan)
        // ==============================================================================
        $id_rt = DB::table('klasifikasis')->where('kode', 'RT')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // --- Level Anak RT (Kerumahtanggaan) ---
            ['parent_id' => $id_rt, 'kode' => 'RT.01', 'nama' => 'Perjalanan Dinas Pimpinan.', 'sifat' => 'B'],
            ['parent_id' => $id_rt, 'kode' => 'RT.02', 'nama' => 'Rapat Pimpinan.', 'sifat' => 'B'],
            ['parent_id' => $id_rt, 'kode' => 'RT.03', 'nama' => 'Kantor.', 'sifat' => 'B'],
            ['parent_id' => $id_rt, 'kode' => 'RT.04', 'nama' => 'Rumah Dinas.', 'sifat' => 'B'],
            ['parent_id' => $id_rt, 'kode' => 'RT.05', 'nama' => 'Fasilitas Pimpinan.', 'sifat' => 'B'],
        ]);

        // Ambil ID anak untuk masukin Cucu
        $id_rt_1 = DB::table('klasifikasis')->where('kode', 'RT.01')->value('id');
        $id_rt_2 = DB::table('klasifikasis')->where('kode', 'RT.02')->value('id');
        $id_rt_3 = DB::table('klasifikasis')->where('kode', 'RT.03')->value('id');
        $id_rt_4 = DB::table('klasifikasis')->where('kode', 'RT.04')->value('id');
        $id_rt_5 = DB::table('klasifikasis')->where('kode', 'RT.05')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // --- Anak dari RT.01 ---
            ['parent_id' => $id_rt_1, 'kode' => 'RT.01.01', 'nama' => 'Dalam Negeri.', 'sifat' => 'B'],
            ['parent_id' => $id_rt_1, 'kode' => 'RT.01.02', 'nama' => 'Luar Negeri.', 'sifat' => 'B'],

            // --- Anak dari RT.02 ---
            ['parent_id' => $id_rt_2, 'kode' => 'RT.02.01', 'nama' => 'Sarana dan Prasarana.', 'sifat' => 'B'],
            ['parent_id' => $id_rt_2, 'kode' => 'RT.02.02', 'nama' => 'Jamuan Rapat.', 'sifat' => 'B'],

            // --- Anak dari RT.03 ---
            ['parent_id' => $id_rt_3, 'kode' => 'RT.03.01', 'nama' => 'Pemeliharaan gedung.', 'sifat' => 'B'],
            ['parent_id' => $id_rt_3, 'kode' => 'RT.03.02', 'nama' => 'Perlengkapan Kantor.', 'sifat' => 'B'],
            ['parent_id' => $id_rt_3, 'kode' => 'RT.03.03', 'nama' => 'Air, Listrik dan Telekomunikasi.', 'sifat' => 'B'],
            ['parent_id' => $id_rt_3, 'kode' => 'RT.03.04', 'nama' => 'Keamanan Kantor.', 'sifat' => 'B'],
            ['parent_id' => $id_rt_3, 'kode' => 'RT.03.05', 'nama' => 'Kebersihan Kantor.', 'sifat' => 'B'],
            ['parent_id' => $id_rt_3, 'kode' => 'RT.03.06', 'nama' => 'Jamuan Tamu.', 'sifat' => 'B'],
            ['parent_id' => $id_rt_3, 'kode' => 'RT.03.07', 'nama' => 'Halaman dan Taman.', 'sifat' => 'B'],

            // --- Anak dari RT.04 ---
            ['parent_id' => $id_rt_4, 'kode' => 'RT.04.01', 'nama' => 'Pemeliharaan Gedung.', 'sifat' => 'B'],
            ['parent_id' => $id_rt_4, 'kode' => 'RT.04.02', 'nama' => 'Perlengkapan Rumah Dinas.', 'sifat' => 'B'],
            ['parent_id' => $id_rt_4, 'kode' => 'RT.04.03', 'nama' => 'Air, Listrik dan Telekomunikasi.', 'sifat' => 'B'],
            ['parent_id' => $id_rt_4, 'kode' => 'RT.04.04', 'nama' => 'Keamanan Rumah Dinas.', 'sifat' => 'B'],
            ['parent_id' => $id_rt_4, 'kode' => 'RT.04.05', 'nama' => 'Kebersihan Rumah Dinas.', 'sifat' => 'B'],
            ['parent_id' => $id_rt_4, 'kode' => 'RT.04.06', 'nama' => 'Jamuan Tamu.', 'sifat' => 'B'],
            ['parent_id' => $id_rt_4, 'kode' => 'RT.04.07', 'nama' => 'Halaman dan Taman.', 'sifat' => 'B'],

            // --- Anak dari RT.05 ---
            ['parent_id' => $id_rt_5, 'kode' => 'RT.05.01', 'nama' => 'Kendaraan Dinas.', 'sifat' => 'B'],
            ['parent_id' => $id_rt_5, 'kode' => 'RT.05.02', 'nama' => 'Pengawalan dan Pengamanan.', 'sifat' => 'B'],
            ['parent_id' => $id_rt_5, 'kode' => 'RT.05.03', 'nama' => 'Telekomunikasi.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN FASILITATIF: PR (Perencanaan)
        // ==============================================================================
        $id_pr = DB::table('klasifikasis')->where('kode', 'PR')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // --- Level Anak PR (Perencanaan) ---
            ['parent_id' => $id_pr, 'kode' => 'PR.01', 'nama' => 'Usulan Perencanaan.', 'sifat' => 'B'],
            ['parent_id' => $id_pr, 'kode' => 'PR.02', 'nama' => 'Pokok-Pokok Kebijakan dan Strategi Pembangunan.', 'sifat' => 'B'], 
            ['parent_id' => $id_pr, 'kode' => 'PR.03', 'nama' => 'Musyawarah Perencanaan Pembangunan (Musrenbang).', 'sifat' => 'B'],
            ['parent_id' => $id_pr, 'kode' => 'PR.04', 'nama' => 'Rencana Kerja Tahunan.', 'sifat' => 'B'],
            ['parent_id' => $id_pr, 'kode' => 'PR.05', 'nama' => 'Rencana Pembangunan Wilayah Startegis.', 'sifat' => 'B'], 
            ['parent_id' => $id_pr, 'kode' => 'PR.06', 'nama' => 'Pembangunan Daerah Perbatasan Provinsi Jawa Barat.', 'sifat' => 'B'],
            ['parent_id' => $id_pr, 'kode' => 'PR.07', 'nama' => 'Indikator Keberhasilan Pembangunan.', 'sifat' => 'B'],
            ['parent_id' => $id_pr, 'kode' => 'PR.08', 'nama' => 'Kerjasama Perencanaan.', 'sifat' => 'B'],
            ['parent_id' => $id_pr, 'kode' => 'PR.09', 'nama' => 'Pejabat Fungsional Perencanaan (Perencana).', 'sifat' => 'B'],
            ['parent_id' => $id_pr, 'kode' => 'PR.10', 'nama' => 'Laporan.', 'sifat' => 'B'],
            ['parent_id' => $id_pr, 'kode' => 'PR.11', 'nama' => 'Evaluasi Program / Kegiatan.', 'sifat' => 'B'],
            ['parent_id' => $id_pr, 'kode' => 'PR.12', 'nama' => 'Koordinasi dan Sinkronisasi Perencanaan Pembangunan.', 'sifat' => 'B'],
            ['parent_id' => $id_pr, 'kode' => 'PR.13', 'nama' => 'Konsultasi Perencanaan Pembangunan.', 'sifat' => 'B'],
            ['parent_id' => $id_pr, 'kode' => 'PR.14', 'nama' => 'Pemantauan, Evaluasi, Penilaian dan Pelaporan Perencanaan Pembangunan.', 'sifat' => 'B'],
            ['parent_id' => $id_pr, 'kode' => 'PR.15', 'nama' => 'Perencanaan Pendanaan Pembangunan.', 'sifat' => 'B'],
        ]);

        // Ambil ID anak untuk masukin Cucu
        $id_pr_1 = DB::table('klasifikasis')->where('kode', 'PR.01')->value('id');
        $id_pr_2 = DB::table('klasifikasis')->where('kode', 'PR.02')->value('id');
        $id_pr_3 = DB::table('klasifikasis')->where('kode', 'PR.03')->value('id');
        $id_pr_4 = DB::table('klasifikasis')->where('kode', 'PR.04')->value('id');
        $id_pr_5 = DB::table('klasifikasis')->where('kode', 'PR.05')->value('id');
        $id_pr_6 = DB::table('klasifikasis')->where('kode', 'PR.06')->value('id');
        $id_pr_7 = DB::table('klasifikasis')->where('kode', 'PR.07')->value('id');
        $id_pr_8 = DB::table('klasifikasis')->where('kode', 'PR.08')->value('id');
        $id_pr_9 = DB::table('klasifikasis')->where('kode', 'PR.09')->value('id');
        $id_pr_10 = DB::table('klasifikasis')->where('kode', 'PR.10')->value('id');
        $id_pr_11 = DB::table('klasifikasis')->where('kode', 'PR.11')->value('id');
        $id_pr_15 = DB::table('klasifikasis')->where('kode', 'PR.15')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // --- Anak dari PR.01 ---
            ['parent_id' => $id_pr_1, 'kode' => 'PR.01.01', 'nama' => 'Aspirasi DPRD.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_1, 'kode' => 'PR.01.02', 'nama' => 'Usulan langsung Masyarakat On Line dan manual.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_1, 'kode' => 'PR.01.03', 'nama' => 'Usulan Perangkat Daerah.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_1, 'kode' => 'PR.01.04', 'nama' => 'Usulan Unit Kerja dalam Perangkat Daerah.', 'sifat' => 'B'],

            // --- Anak dari PR.02 ---
            ['parent_id' => $id_pr_2, 'kode' => 'PR.02.01', 'nama' => 'Rencana Pembangunan Jangka Panjang Daerah (RPJPD).', 'sifat' => 'B'],
            ['parent_id' => $id_pr_2, 'kode' => 'PR.02.02', 'nama' => 'Rencana Pembangunan Jangka Menengah Daerah (RPJMD).', 'sifat' => 'B'],
            ['parent_id' => $id_pr_2, 'kode' => 'PR.02.03', 'nama' => 'Rencana Strategis Perangkat Daerah.', 'sifat' => 'B'],

            // --- Anak dari PR.03 ---
            ['parent_id' => $id_pr_3, 'kode' => 'PR.03.01', 'nama' => 'Musrenbang RPJP/RPJM.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_3, 'kode' => 'PR.03.02', 'nama' => 'Musrenbang RKPD.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_3, 'kode' => 'PR.03.03', 'nama' => 'Forum Perangkat Daerah.', 'sifat' => 'B'],

            // --- Anak dari PR.04 ---
            ['parent_id' => $id_pr_4, 'kode' => 'PR.04.01', 'nama' => 'Rencana Kerja Pemerintah Daerah (RKPD).', 'sifat' => 'B'],
            ['parent_id' => $id_pr_4, 'kode' => 'PR.04.02', 'nama' => 'Rencana Kerja Perangkat Daerah (Renja Perangkat Daerah).', 'sifat' => 'B'],
            ['parent_id' => $id_pr_4, 'kode' => 'PR.04.03', 'nama' => 'Rencana Kerja Tahunan Unit Kerja pada Perangkat Daerah.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_4, 'kode' => 'PR.04.04', 'nama' => 'Penetapan Kinerja Pimpinan Perangkat Daerah.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_4, 'kode' => 'PR.04.05', 'nama' => 'Penetapan Kinerja Pejabat Esselon 3 dan Esselon 4.', 'sifat' => 'B'],

            // --- Anak dari PR.05 ---
            ['parent_id' => $id_pr_5, 'kode' => 'PR.05.01', 'nama' => 'Pusat Pertumbuhan Nasional dan Regional.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_5, 'kode' => 'PR.05.02', 'nama' => 'Metro Politan Bandung dan Bodebekkapur.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_5, 'kode' => 'PR.05.03', 'nama' => 'Pembangunan Bagian Wilayah.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_5, 'kode' => 'PR.05.04', 'nama' => 'Pembangunan Tematik.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_5, 'kode' => 'PR.05.05', 'nama' => 'Pembangunan Sektoral.', 'sifat' => 'B'],

            // --- Anak dari PR.06 ---
            ['parent_id' => $id_pr_6, 'kode' => 'PR.06.01', 'nama' => 'Kajian Rencana Pembangunan Daerah Perbatasan Prov. Jawa Barat.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_6, 'kode' => 'PR.06.02', 'nama' => 'Dokumen Perencanaan Pembangunan Daerah Perbatasan Prov. Jawa Barat.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_6, 'kode' => 'PR.06.03', 'nama' => 'Kerja Sama Pembangunan Daerah Perbatasan Prov. Jawa Barat.', 'sifat' => 'B'],

            // --- Anak dari PR.07 ---
            ['parent_id' => $id_pr_7, 'kode' => 'PR.07.01', 'nama' => 'Kajian Penetapan Indikator Keberhasilan Pembangunan.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_7, 'kode' => 'PR.07.02', 'nama' => 'Evaluasi Capaian Indikator Keberhasilan Pembangunan.', 'sifat' => 'B'],

            // --- Anak dari PR.08 ---
            ['parent_id' => $id_pr_8, 'kode' => 'PR.08.01', 'nama' => 'Kegiatan Komite Perencanaan.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_8, 'kode' => 'PR.08.02', 'nama' => 'Rekomendasi Komite Perencana.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_8, 'kode' => 'PR.08.03', 'nama' => 'Kerjasama Perencanaan dengan Perguruan Tinggi.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_8, 'kode' => 'PR.08.04', 'nama' => 'Kerjasama Perencanaan dengan Pemerintah Daerah.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_8, 'kode' => 'PR.08.05', 'nama' => 'Kerjasama Perencanaan dengan Luar Negeri.', 'sifat' => 'B'],

            // --- Anak dari PR.09 ---
            ['parent_id' => $id_pr_9, 'kode' => 'PR.09.01', 'nama' => 'Kajian Pengembangan Perencana.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_9, 'kode' => 'PR.09.02', 'nama' => 'Pembinaan Perencana.', 'sifat' => 'B'],

            // --- Anak dari PR.10 ---
            ['parent_id' => $id_pr_10, 'kode' => 'PR.10.01', 'nama' => 'Laporan Berkala (Laporan Triwulan dan Semesteran).', 'sifat' => 'B'],
            ['parent_id' => $id_pr_10, 'kode' => 'PR.10.02', 'nama' => 'Laporan Tahunan Esselon 3.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_10, 'kode' => 'PR.10.03', 'nama' => 'Laporan Tahunan Perangkat Daerah.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_10, 'kode' => 'PR.10.04', 'nama' => 'Laporan Khusus.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_10, 'kode' => 'PR.10.05', 'nama' => 'Progress Report.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_10, 'kode' => 'PR.10.06', 'nama' => 'Laporan Akuntabilitas Kinerja Instansi Pemerintah (LAKIP).', 'sifat' => 'B'],

            // --- Anak dari PR.11 ---
            ['parent_id' => $id_pr_11, 'kode' => 'PR.11.01', 'nama' => 'Unit Kerja.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_11, 'kode' => 'PR.11.02', 'nama' => 'Lembaga/Instansi.', 'sifat' => 'B'],

            // --- Anak dari PR.15 ---
            ['parent_id' => $id_pr_15, 'kode' => 'PR.15.01', 'nama' => 'Pendanaan Luar Negeri dan Hibah.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_15, 'kode' => 'PR.15.02', 'nama' => 'Pendanaan Dalam Negeri.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_15, 'kode' => 'PR.15.03', 'nama' => 'Kerjasama Pembangunan Internasional.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_15, 'kode' => 'PR.15.04', 'nama' => 'Surat Berharga Syariah Negara.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_15, 'kode' => 'PR.15.05', 'nama' => 'Pendanaan On Top dan atau Inisiatif Baru.', 'sifat' => 'B'],
            ['parent_id' => $id_pr_15, 'kode' => 'PR.15.06', 'nama' => 'Corporate Social Responcibility (CSR).', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN FASILITATIF: LB (Penelitian dan Pengembangan)
        // ==============================================================================
        $id_lb = DB::table('klasifikasis')->where('kode', 'LB')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // --- Level Anak LB ---
            ['parent_id' => $id_lb, 'kode' => 'LB.01', 'nama' => 'Penelitian dan Pengembangan Pemerintahan Daerah.', 'sifat' => 'B'],
            ['parent_id' => $id_lb, 'kode' => 'LB.02', 'nama' => 'Penelitian dan Pengembangan Bidang Ekonomi.', 'sifat' => 'B'],
            ['parent_id' => $id_lb, 'kode' => 'LB.03', 'nama' => 'Penelitian dan Pengembangan Bidang Sosial Budaya.', 'sifat' => 'B'],
            ['parent_id' => $id_lb, 'kode' => 'LB.04', 'nama' => 'Penelitian dan Pengembangan Bidang Ilmu pengetahuan dan Teknologi.', 'sifat' => 'B'],
            ['parent_id' => $id_lb, 'kode' => 'LB.05', 'nama' => 'Penelitian dan Pengembangan Teknologi Tepat Guna.', 'sifat' => 'B'],
            
            ['parent_id' => $id_lb, 'kode' => 'LB.05', 'nama' => 'Kerjasama Penelitian dan Pengembangan.', 'sifat' => 'B'],
            
            ['parent_id' => $id_lb, 'kode' => 'LB.06', 'nama' => 'Hasil Penelitian dan Pengembangan.', 'sifat' => 'B'],
            ['parent_id' => $id_lb, 'kode' => 'LB.07', 'nama' => 'Pengembangan Inovasi Daerah.', 'sifat' => 'B'],
            ['parent_id' => $id_lb, 'kode' => 'LB.08', 'nama' => 'Sumberdaya Manusia Penelitian dan Pengembangan.', 'sifat' => 'B'],
        ]);

        // Ambil ID anak untuk masukin Cucu
        $id_lb_1 = DB::table('klasifikasis')->where('kode', 'LB.01')->value('id');
        $id_lb_2 = DB::table('klasifikasis')->where('kode', 'LB.02')->value('id');
        $id_lb_3 = DB::table('klasifikasis')->where('kode', 'LB.03')->value('id');
        $id_lb_4 = DB::table('klasifikasis')->where('kode', 'LB.04')->value('id');
        $id_lb_5 = DB::table('klasifikasis')->where('kode', 'LB.05')->where('nama', 'Penelitian dan Pengembangan Teknologi Tepat Guna.')->value('id');
        $id_lb_5_2 = DB::table('klasifikasis')->where('kode', 'LB.05')->where('nama', 'Kerjasama Penelitian dan Pengembangan.')->value('id');
        $id_lb_6 = DB::table('klasifikasis')->where('kode', 'LB.06')->value('id');
        $id_lb_7 = DB::table('klasifikasis')->where('kode', 'LB.07')->value('id');
        $id_lb_8 = DB::table('klasifikasis')->where('kode', 'LB.08')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // --- Anak dari LB.01 ---
            ['parent_id' => $id_lb_1, 'kode' => 'LB.01.01', 'nama' => 'Kegiatan Penelitian dan Pengembangan Pemerintahan Daerah.', 'sifat' => 'B'],
            ['parent_id' => $id_lb_1, 'kode' => 'LB.01.02', 'nama' => 'Laporan Hasil Penelitian dan Pengembangan Pemerintahan Daerah.', 'sifat' => 'B'],

            // --- Anak dari LB.02 ---
            ['parent_id' => $id_lb_2, 'kode' => 'LB.02.01', 'nama' => 'Kegiatan Penelitian dan Pengembangan Bidang Ekonomi.', 'sifat' => 'B'],
            ['parent_id' => $id_lb_2, 'kode' => 'LB.02.02', 'nama' => 'Laporan Hasil Penelitian dan Pengembangan Bidang Ekonomi.', 'sifat' => 'B'],

            // --- Anak dari LB.03 ---
            ['parent_id' => $id_lb_3, 'kode' => 'LB.03.01', 'nama' => 'Kegiatan Penelitian dan Pengembangan Bidang Sosial Budaya.', 'sifat' => 'B'],
            ['parent_id' => $id_lb_3, 'kode' => 'LB.03.02', 'nama' => 'Laporan Hasil Penelitian dan Pengembangan Bidang Sosial Budaya.', 'sifat' => 'B'],

            // --- Anak dari LB.04 ---
            ['parent_id' => $id_lb_4, 'kode' => 'LB.04.01', 'nama' => 'Kegiatan Penelitian dan Pengembangan Bidang Ilmu Pengetahuan dan Teknologi.', 'sifat' => 'B'],
            ['parent_id' => $id_lb_4, 'kode' => 'LB.04.02', 'nama' => 'Laporan Hasil Penelitian dan Pengembangan Bidang Ilmu Pengetahuan dan Teknologi.', 'sifat' => 'B'],

            // --- Anak dari LB.05 (Teknologi Tepat Guna) ---
            ['parent_id' => $id_lb_5, 'kode' => 'LB.05.01', 'nama' => 'Kegiatan Penelitian dan Pengembangan Teknologi Tepat Guna.', 'sifat' => 'B'],
            ['parent_id' => $id_lb_5, 'kode' => 'LB.05.02', 'nama' => 'Laporan Hasil Penelitian dan Pengembangan Teknologi Tepat Guna.', 'sifat' => 'B'],
            ['parent_id' => $id_lb_5, 'kode' => 'LB.05.03', 'nama' => 'Pemasyarakatan Hasil Penelitian dan Pengembangan Teknologi Tepat Guna.', 'sifat' => 'B'],

            // --- Anak dari LB.05 (Kerjasama) ---
            ['parent_id' => $id_lb_5_2, 'kode' => 'LB.05.01', 'nama' => 'Kerjasama Penelitian dan Pengembangan Antar Pemerintah Daerah.', 'sifat' => 'B'],
            ['parent_id' => $id_lb_5_2, 'kode' => 'LB.05.02', 'nama' => 'Kerjasama Penelitian dan Pengembangan Dengan Peguruan Tinggi.', 'sifat' => 'B'],
            ['parent_id' => $id_lb_5_2, 'kode' => 'LB.05.03', 'nama' => 'Kerjasama Penelitian dan Pengembangan dengan Swasta dan Masyarakat.', 'sifat' => 'B'],
            ['parent_id' => $id_lb_5_2, 'kode' => 'LB.05.04', 'nama' => 'Dewan Research Daerah.', 'sifat' => 'B'],

            // --- Anak dari LB.06 ---
            ['parent_id' => $id_lb_6, 'kode' => 'LB.06.01', 'nama' => 'Data Base Hasil Penelitian dan Pengembangan.', 'sifat' => 'B'],
            ['parent_id' => $id_lb_6, 'kode' => 'LB.06.02', 'nama' => 'Publikasi Hasil Penelitian dan Pengembangan.', 'sifat' => 'B'],
            ['parent_id' => $id_lb_6, 'kode' => 'LB.06.03', 'nama' => 'Penerbitan Jurnal.', 'sifat' => 'B'],

            // --- Anak dari LB.07 ---
            ['parent_id' => $id_lb_7, 'kode' => 'LB.07.01', 'nama' => 'Bantuan Penelitian dan Pengembangan Potensi Daerah.', 'sifat' => 'B'],
            ['parent_id' => $id_lb_7, 'kode' => 'LB.07.02', 'nama' => 'Penghargaan Inovasi Daerah.', 'sifat' => 'B'],

            // --- Anak dari LB.08 ---
            ['parent_id' => $id_lb_8, 'kode' => 'LB.08.01', 'nama' => 'Pengembangan Sumberdaya Manusia Penelitian dan Pengembangan.', 'sifat' => 'B'],
            ['parent_id' => $id_lb_8, 'kode' => 'LB.08.02', 'nama' => 'Pembinaan Peneliti.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN FASILITATIF: PW (Pengawasan)
        // ==============================================================================
        $id_pw = DB::table('klasifikasis')->where('kode', 'PW')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // --- Level Anak PW ---
            ['parent_id' => $id_pw, 'kode' => 'PW.01', 'nama' => 'Rencana Kegiatan Pengawasan.', 'sifat' => 'B'],
            ['parent_id' => $id_pw, 'kode' => 'PW.02', 'nama' => 'Pengawasan Tahunan.', 'sifat' => 'B'],
            ['parent_id' => $id_pw, 'kode' => 'PW.03', 'nama' => 'Pengawasan Khusus.', 'sifat' => 'B'],
            ['parent_id' => $id_pw, 'kode' => 'PW.04', 'nama' => 'Pengaduan Masyarakat.', 'sifat' => 'B'],
            
            ['parent_id' => $id_pw, 'kode' => 'PW.04', 'nama' => 'Pengawasan Melekat.', 'sifat' => 'B'],
            
            ['parent_id' => $id_pw, 'kode' => 'PW.05', 'nama' => 'Pemantauan.', 'sifat' => 'B'],
            ['parent_id' => $id_pw, 'kode' => 'PW.06', 'nama' => 'Pemantauan (Lanjutan).', 'sifat' => 'B'], 
            ['parent_id' => $id_pw, 'kode' => 'PW.07', 'nama' => 'Sumberdaya Manusia Pengawasan (Auditor).', 'sifat' => 'B'],
            ['parent_id' => $id_pw, 'kode' => 'PW.08', 'nama' => 'Pengembangan Akuntabilitas Publik.', 'sifat' => 'B'],
        ]);

        // Ambil ID anak untuk masukin Cucu
        $id_pw_1 = DB::table('klasifikasis')->where('kode', 'PW.01')->value('id');
        $id_pw_2 = DB::table('klasifikasis')->where('kode', 'PW.02')->value('id');
        $id_pw_3 = DB::table('klasifikasis')->where('kode', 'PW.03')->value('id');
        $id_pw_4 = DB::table('klasifikasis')->where('kode', 'PW.04')->where('nama', 'Pengaduan Masyarakat.')->value('id');
        $id_pw_4_2 = DB::table('klasifikasis')->where('kode', 'PW.04')->where('nama', 'Pengawasan Melekat.')->value('id');
        $id_pw_6 = DB::table('klasifikasis')->where('kode', 'PW.06')->value('id');
        $id_pw_7 = DB::table('klasifikasis')->where('kode', 'PW.07')->value('id');
        $id_pw_8 = DB::table('klasifikasis')->where('kode', 'PW.08')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // --- Anak dari PW.01 ---
            ['parent_id' => $id_pw_1, 'kode' => 'PW.01.01', 'nama' => 'Rencana Kegiatan Pengawasan Tahunan.', 'sifat' => 'B'],
            ['parent_id' => $id_pw_1, 'kode' => 'PW.01.02', 'nama' => 'Rencana Kegiatan Pengawasan Khusus.', 'sifat' => 'B'],

            // --- Anak dari PW.02 ---
            ['parent_id' => $id_pw_2, 'kode' => 'PW.02.01', 'nama' => 'Kegiatan Audit Keuangan dan Kinerja Tahun Berjalan.', 'sifat' => 'B'],
            ['parent_id' => $id_pw_2, 'kode' => 'PW.02.02', 'nama' => 'Laporan Hasil Audit Keuangan dan Kinerja Tahun Berjalan.', 'sifat' => 'B'],
            ['parent_id' => $id_pw_2, 'kode' => 'PW.02.03', 'nama' => 'Tindak Lanjut Hasil Audit.', 'sifat' => 'B'],

            // --- Anak dari PW.03 ---
            ['parent_id' => $id_pw_3, 'kode' => 'PW.03.01', 'nama' => 'Kegiatan Audit Khusus.', 'sifat' => 'B'],
            ['parent_id' => $id_pw_3, 'kode' => 'PW.03.02', 'nama' => 'Laporan Hasil Audit Khusus.', 'sifat' => 'B'],
            ['parent_id' => $id_pw_3, 'kode' => 'PW.03.03', 'nama' => 'Tindak Lanjut Hasil Audit Khusus.', 'sifat' => 'B'],

            // --- Anak dari PW.04 ---
            ['parent_id' => $id_pw_4, 'kode' => 'PW.04.01', 'nama' => 'Pusat Pengaduan Masyarakat.', 'sifat' => 'B'],
            ['parent_id' => $id_pw_4, 'kode' => 'PW.04.02', 'nama' => 'Penanganan/Tindak Lanjut Atas Pengaduan Masyarakat.', 'sifat' => 'B'],
            ['parent_id' => $id_pw_4, 'kode' => 'PW.04.03', 'nama' => 'Evaluasi Penanganan/Tindak Lanjut.', 'sifat' => 'B'],

            // --- Anak dari PW.04 (Pengawasan Melekat) ---
            ['parent_id' => $id_pw_4_2, 'kode' => 'PW.04.01', 'nama' => 'Sosialisasi.', 'sifat' => 'B'],
            ['parent_id' => $id_pw_4_2, 'kode' => 'PW.04.02', 'nama' => 'Kegiatan Pengawasan Melekat.', 'sifat' => 'B'],
            ['parent_id' => $id_pw_4_2, 'kode' => 'PW.04.03', 'nama' => 'Evaluasi Kegiatan Pengawasan Melekat.', 'sifat' => 'B'],

            // --- Anak dari PW.06 ---
            ['parent_id' => $id_pw_6, 'kode' => 'PW.06.01', 'nama' => 'Pemantauan Pelaksanaan Kegiatan/Program.', 'sifat' => 'B'],
            ['parent_id' => $id_pw_6, 'kode' => 'PW.06.02', 'nama' => 'Pemantauan Tindak Lanjut Laporan Hasil Pengawasan.', 'sifat' => 'B'],
            ['parent_id' => $id_pw_6, 'kode' => 'PW.06.03', 'nama' => 'Tuntutan Ganti Rugi.', 'sifat' => 'B'],

            // --- Anak dari PW.07 ---
            ['parent_id' => $id_pw_7, 'kode' => 'PW.07.01', 'nama' => 'Pengembangan Sumberdaya Manusia Pengawasan.', 'sifat' => 'B'],
            ['parent_id' => $id_pw_7, 'kode' => 'PW.07.02', 'nama' => 'Pembinaan Auditor.', 'sifat' => 'B'],

            // --- Anak dari PW.08 ---
            ['parent_id' => $id_pw_8, 'kode' => 'PW.08.01', 'nama' => 'Desk Akuntabilitas.', 'sifat' => 'B'],
            ['parent_id' => $id_pw_8, 'kode' => 'PW.08.02', 'nama' => 'Penyusunan Laporan Akuntabilitas Instansi Pemerintah.', 'sifat' => 'B'],
            ['parent_id' => $id_pw_8, 'kode' => 'PW.08.03', 'nama' => 'Pemantauan Akuntabilitas Instansi Pemerintah.', 'sifat' => 'B'],
            ['parent_id' => $id_pw_8, 'kode' => 'PW.08.04', 'nama' => 'Evaluasi Laporan Akuntabilitas Instansi Pemerintah.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN FASILITATIF: KPG (Kepegawaian)
        // ==============================================================================
        $id_kpg = DB::table('klasifikasis')->where('kode', 'KPG')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // --- Level Anak KPG ---
            ['parent_id' => $id_kpg, 'kode' => 'KPG.01', 'nama' => 'Formasi Pegawai (Usulan dari Unit Kerja/SKPD)', 'sifat' => 'B'],
            ['parent_id' => $id_kpg, 'kode' => 'KPG.02', 'nama' => 'Pengadaan Pegawai', 'sifat' => 'B'],
            ['parent_id' => $id_kpg, 'kode' => 'KPG.03', 'nama' => 'Pembinaan Karir Pegawai', 'sifat' => 'B'],
            ['parent_id' => $id_kpg, 'kode' => 'KPG.04', 'nama' => 'Mutasi Pegawai', 'sifat' => 'B'],
            ['parent_id' => $id_kpg, 'kode' => 'KPG.05', 'nama' => 'Mutasi Keluarga', 'sifat' => 'B'],
            ['parent_id' => $id_kpg, 'kode' => 'KPG.06', 'nama' => 'Usul kenaikan pangkat/golongan/jabatan', 'sifat' => 'B'],
            ['parent_id' => $id_kpg, 'kode' => 'KPG.07', 'nama' => 'Usul Pengangkatan dan Pemberhentian dalam Jabatan Struktural/Fungsional', 'sifat' => 'B'],
            ['parent_id' => $id_kpg, 'kode' => 'KPG.08', 'nama' => 'Usul Penetapan Perubahan Data Dasar/ Status/Kedudukan Hukum Pegawai', 'sifat' => 'B'],
            ['parent_id' => $id_kpg, 'kode' => 'KPG.09', 'nama' => 'Peninjauan Masa Kerja', 'sifat' => 'B'],
            ['parent_id' => $id_kpg, 'kode' => 'KPG.10', 'nama' => 'Berkas Baperjakat', 'sifat' => 'B'],
            ['parent_id' => $id_kpg, 'kode' => 'KPG.11', 'nama' => 'Administrasi Pegawai', 'sifat' => 'B'],
            ['parent_id' => $id_kpg, 'kode' => 'KPG.12', 'nama' => 'Dokumentasi Identitas Pegawai', 'sifat' => 'B'],
            ['parent_id' => $id_kpg, 'kode' => 'KPG.13', 'nama' => 'Berkas Kepegawaian dan Daftar Urut Kepangkatan (DUK)', 'sifat' => 'B'],
            ['parent_id' => $id_kpg, 'kode' => 'KPG.14', 'nama' => 'Berkas Pengurusan Kenaikan Gaji Berkala', 'sifat' => 'B'],
            ['parent_id' => $id_kpg, 'kode' => 'KPG.15', 'nama' => 'Kesejahteraan Pegawai', 'sifat' => 'B'],
            ['parent_id' => $id_kpg, 'kode' => 'KPG.16', 'nama' => 'Pemberhentian Pegawai Tanpa Hak Pensiun', 'sifat' => 'B'],
            ['parent_id' => $id_kpg, 'kode' => 'KPG.17', 'nama' => 'Berkas Perseorangan Pegawai Negeri Sipil', 'sifat' => 'B'],
            ['parent_id' => $id_kpg, 'kode' => 'KPG.18', 'nama' => 'Berkas Perseorangan Pejabat Negara Gubernur dan Wakil Gubernur Provinsi', 'sifat' => 'B'],
            ['parent_id' => $id_kpg, 'kode' => 'KPG.19', 'nama' => 'Berkas Perseorangan Pejabat Lainnya', 'sifat' => 'B'],
        ]);

        // Ambil ID anak KPG
        $id_kpg_1 = DB::table('klasifikasis')->where('kode', 'KPG.01')->value('id');
        $id_kpg_2 = DB::table('klasifikasis')->where('kode', 'KPG.02')->value('id');
        $id_kpg_3 = DB::table('klasifikasis')->where('kode', 'KPG.03')->value('id');
        $id_kpg_4 = DB::table('klasifikasis')->where('kode', 'KPG.04')->value('id');
        $id_kpg_5 = DB::table('klasifikasis')->where('kode', 'KPG.05')->value('id');
        $id_kpg_11 = DB::table('klasifikasis')->where('kode', 'KPG.11')->value('id');
        $id_kpg_12 = DB::table('klasifikasis')->where('kode', 'KPG.12')->value('id');
        $id_kpg_15 = DB::table('klasifikasis')->where('kode', 'KPG.15')->value('id');
        $id_kpg_16 = DB::table('klasifikasis')->where('kode', 'KPG.16')->value('id');
        $id_kpg_19 = DB::table('klasifikasis')->where('kode', 'KPG.19')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // --- Cucu dari KPG (Level 3) ---
            // Anak KPG.01
            ['parent_id' => $id_kpg_1, 'kode' => 'KPG.01.01', 'nama' => 'analisa jabatan', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_1, 'kode' => 'KPG.01.02', 'nama' => 'beban kerja', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_1, 'kode' => 'KPG.01.03', 'nama' => 'Usulan Permintaan Formasi kepada Menpan dan RB dan Kepala BKN', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_1, 'kode' => 'KPG.01.04', 'nama' => 'Persetujuan Menpan dan RB', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_1, 'kode' => 'KPG.01.05', 'nama' => 'Penetapan Formasi PNS', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_1, 'kode' => 'KPG.01.06', 'nama' => 'Penetapan Formasi Khusus', 'sifat' => 'B'],

            // Anak KPG.02
            ['parent_id' => $id_kpg_2, 'kode' => 'KPG.02.01', 'nama' => 'Penerimaan Pegawai meliputi:', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_2, 'kode' => 'KPG.02.02', 'nama' => 'Penetapan Pengumuman Kelulusan', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_2, 'kode' => 'KPG.02.03', 'nama' => 'Berkas Lamaran yang tidak diterima', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_2, 'kode' => 'KPG.02.04', 'nama' => 'Nota Usul dan Kelengkapan Penetapan NIP', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_2, 'kode' => 'KPG.02.05', 'nama' => 'Nota Usul Pengangkatan CPNS menjadi PNS lebih dari 2 tahun', 'sifat' => 'B'], 
            ['parent_id' => $id_kpg_2, 'kode' => 'KPG.02.06', 'nama' => 'SK CPNS/PNS Kolektif', 'sifat' => 'B'], 

            // Anak KPG.03
            ['parent_id' => $id_kpg_3, 'kode' => 'KPG.03.01', 'nama' => 'Diklat/Kursus/Magang/Tugas Belajar/Ujian Dinas/Ijin Belajar Pegawai:', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_3, 'kode' => 'KPG.03.02', 'nama' => 'Daftar Penilaian Pelaksanaan Pekerjaan (DP 3)/ Standar Kinerja Pegawai (SKP)', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_3, 'kode' => 'KPG.03.03', 'nama' => 'Daftar Usul Penetapan Angka Kredit', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_3, 'kode' => 'KPG.03.04', 'nama' => 'Disiplin Pegawai', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_3, 'kode' => 'KPG.03.05', 'nama' => 'Berkas Hukuman Disiplin', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_3, 'kode' => 'KPG.03.06', 'nama' => 'Penghargaan dan Tanda Jasa', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_3, 'kode' => 'KPG.03.07', 'nama' => 'Penyelesaian Pengelolaan Keberatan Pegawai', 'sifat' => 'B'],

            // Anak KPG.04
            ['parent_id' => $id_kpg_4, 'kode' => 'KPG.04.01', 'nama' => 'Alih Status, Pindah Instansi, Pindah Wilayah Kerja, Diperbantukan, Dipekerjakan, Penugasan Sementara, Mutasi antar Perwakilan, Mutasi ke dan dari Perwakilan, Pemindahan Sementara, Mutasi antar Unit', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_4, 'kode' => 'KPG.04.02', 'nama' => 'Nota Persetujuan/Pertimbangan Kepala BKN', 'sifat' => 'B'],

            // Anak KPG.05
            ['parent_id' => $id_kpg_5, 'kode' => 'KPG.05.01', 'nama' => 'Surat Izin Pernikahan/Perceraian', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_5, 'kode' => 'KPG.05.02', 'nama' => 'Surat Penolakan Izin Pernikahan/Perceraian', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_5, 'kode' => 'KPG.05.03', 'nama' => 'Surat Nikah /Cerai', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_5, 'kode' => 'KPG.05.04', 'nama' => 'Akte Kelahiran Anak', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_5, 'kode' => 'KPG.05.05', 'nama' => 'Surat Keterangan Adopsi Anak', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_5, 'kode' => 'KPG.05.06', 'nama' => 'Surat Keterangan Meninggal Dunia', 'sifat' => 'B'],

            // Anak KPG.11
            ['parent_id' => $id_kpg_11, 'kode' => 'KPG.11.01', 'nama' => 'Surat Perintah Dinas/Surat Tugas', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_11, 'kode' => 'KPG.11.02', 'nama' => 'Cuti Besar', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_11, 'kode' => 'KPG.11.03', 'nama' => 'Cuti Sakit, Cuti Bersalin, Cuti Tahunan', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_11, 'kode' => 'KPG.11.04', 'nama' => 'Cuti Alasan Penting', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_11, 'kode' => 'KPG.11.05', 'nama' => 'Cuti Diluar Tanggungan Negara (CLTN)', 'sifat' => 'B'],

            // Anak KPG.12
            ['parent_id' => $id_kpg_12, 'kode' => 'KPG.12.01', 'nama' => 'Usul Penetapan Karpeg/KPE/Karis/Karsu', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_12, 'kode' => 'KPG.12.02', 'nama' => 'Keanggotaan Organisasi Profesi/Kedinasan', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_12, 'kode' => 'KPG.12.03', 'nama' => 'Laporan Pajak Penghasilan Pribadi (LP2P)', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_12, 'kode' => 'KPG.12.04', 'nama' => 'Keterangan Penerimaan Pembayaran Penghasilan Pegawai (KP4)', 'sifat' => 'B'],

            
            // Anak KPG.15
            ['parent_id' => $id_kpg_15, 'kode' => 'KPG.15.01', 'nama' => 'Berkas tentang Layanan Pemeliharaan Kesehatan Pegawai', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_15, 'kode' => 'KPG.15.02', 'nama' => 'Berkas tentang Layanan Asuransi Pegawai/ASKES', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_15, 'kode' => 'KPG.15.03', 'nama' => 'Berkas tentang Layanan Tabungan Perumahan', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_15, 'kode' => 'KPG.15.04', 'nama' => 'Berkas tentang Layanan Bantuan Sosial', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_15, 'kode' => 'KPG.15.05', 'nama' => 'Berkas tentang Layanan Pakaian Dinas', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_15, 'kode' => 'KPG.15.06', 'nama' => 'Berkas tentang Layanan Pegawai yang meninggal karena dinas', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_15, 'kode' => 'KPG.15.07', 'nama' => 'Berkas tentang Pemberian Tali Kasih', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_15, 'kode' => 'KPG.15.08', 'nama' => 'Berkas tentang Pemberian Piagam Penghargaan dan Tanda Jasa', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_15, 'kode' => 'KPG.15.09', 'nama' => 'Berkas tentang Layanan Olahraga dan Rekreasi', 'sifat' => 'B'],

            // Anak KPG.16
            ['parent_id' => $id_kpg_16, 'kode' => 'KPG.16.01', 'nama' => 'Usul Pemberhentian dan Penetapan Pensiun Pegawai/Janda/Duda dan PNS yang Meninggal', 'sifat' => 'B'],

            // Anak KPG.19
            ['parent_id' => $id_kpg_19, 'kode' => 'KPG.19.01', 'nama' => 'Ketua, Wakil Ketua, Anggota KPUD, dan Panwaslu Kada', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_19, 'kode' => 'KPG.19.02', 'nama' => 'Ketua, Wakil Ketua, Anggota Komisi Lainnya', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_19, 'kode' => 'KPG.19.03', 'nama' => 'Ketua, Wakil Ketua, Anggota DPRD', 'sifat' => 'B'],
        ]);

        // Ambil ID cucu KPG untuk masukin Cicit (Level 4)
        $id_kpg_2_1 = DB::table('klasifikasis')->where('kode', 'KPG.02.01')->value('id');
        $id_kpg_2_4 = DB::table('klasifikasis')->where('kode', 'KPG.02.04')->value('id');
        $id_kpg_3_1 = DB::table('klasifikasis')->where('kode', 'KPG.03.01')->value('id');
        $id_kpg_3_4 = DB::table('klasifikasis')->where('kode', 'KPG.03.04')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // Cicit dari KPG.02.01
            ['parent_id' => $id_kpg_2_1, 'kode' => 'KPG.02.01.01', 'nama' => 'Pengumuman', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_2_1, 'kode' => 'KPG.02.01.02', 'nama' => 'Seleksi Administrasi', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_2_1, 'kode' => 'KPG.02.01.03', 'nama' => 'Pemanggilan Peserta Test', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_2_1, 'kode' => 'KPG.02.01.04', 'nama' => 'Pelaksanaan Ujian Tertulis', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_2_1, 'kode' => 'KPG.02.01.05', 'nama' => 'Keputusan Hasil Ujian', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_2_1, 'kode' => 'KPG.02.01.06', 'nama' => 'Wawancara', 'sifat' => 'B'],

            // Cicit dari KPG.02.04
            ['parent_id' => $id_kpg_2_4, 'kode' => 'KPG.02.04.01', 'nama' => 'Surat Lamaran', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_2_4, 'kode' => 'KPG.02.04.02', 'nama' => 'Ijazah', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_2_4, 'kode' => 'KPG.02.04.03', 'nama' => 'SKCK', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_2_4, 'kode' => 'KPG.02.04.04', 'nama' => 'Kartu Kuning', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_2_4, 'kode' => 'KPG.02.04.05', 'nama' => 'Surat Keterangan Kesehatan', 'sifat' => 'B'],

            // Cicit dari KPG.03.01
            ['parent_id' => $id_kpg_3_1, 'kode' => 'KPG.03.01.01', 'nama' => 'Surat Perintah/Surat Tugas/SK/Surat Ijin', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_3_1, 'kode' => 'KPG.03.01.02', 'nama' => 'Laporan Kegiatan Pengembangan Diri', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_3_1, 'kode' => 'KPG.03.01.03', 'nama' => 'Surat Tanda Tamat Pendidikan dan Pelatihan (STTPL)/Sertifikat', 'sifat' => 'B'],

            // Cicit dari KPG.03.04
            ['parent_id' => $id_kpg_3_4, 'kode' => 'KPG.03.04.01', 'nama' => 'Daftar Hadir', 'sifat' => 'B'],
            ['parent_id' => $id_kpg_3_4, 'kode' => 'KPG.03.04.02', 'nama' => 'Rekapitulasi Daftar Hadir', 'sifat' => 'B'],
        ]);

        // ==============================================================================
        // RINCIAN URUSAN FASILITATIF: PSM (Pengembangan Sumber Daya Manusia)
        // ==============================================================================
        $id_psm = DB::table('klasifikasis')->where('kode', 'PSM')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // --- Level Anak PSM ---
            ['parent_id' => $id_psm, 'kode' => 'PSM.01', 'nama' => 'Kebijakan Bidang Diklat', 'sifat' => 'B'],
            ['parent_id' => $id_psm, 'kode' => 'PSM.02', 'nama' => 'Pengembangan program dan pembinaan diklat', 'sifat' => 'B'],
            ['parent_id' => $id_psm, 'kode' => 'PSM.03', 'nama' => 'Standarisasi Pengembangan program dan pembinaan diklat', 'sifat' => 'B'],
            ['parent_id' => $id_psm, 'kode' => 'PSM.04', 'nama' => 'Akreditasi Pengembangan program dan pembinaan diklat', 'sifat' => 'B'],
            ['parent_id' => $id_psm, 'kode' => 'PSM.05', 'nama' => 'Kurikulum dan Modul', 'sifat' => 'B'],
            ['parent_id' => $id_psm, 'kode' => 'PSM.06', 'nama' => 'Sistem Informasi', 'sifat' => 'B'],
            ['parent_id' => $id_psm, 'kode' => 'PSM.07', 'nama' => 'Monitoring dan evaluasi', 'sifat' => 'B'],
            ['parent_id' => $id_psm, 'kode' => 'PSM.08', 'nama' => 'Konsultasi, advokasi, asistensi diklat', 'sifat' => 'B'],
            
            // PSM.09 lompat sesuai gambar
            ['parent_id' => $id_psm, 'kode' => 'PSM.10', 'nama' => 'Seleksi dan pengembangan Widyaiswara', 'sifat' => 'B'],
            ['parent_id' => $id_psm, 'kode' => 'PSM.11', 'nama' => 'Sertfikasi Widyaiswara', 'sifat' => 'B'],
            ['parent_id' => $id_psm, 'kode' => 'PSM.12', 'nama' => 'Monitoring dan evakuasi Widyaiswara', 'sifat' => 'B'],
            ['parent_id' => $id_psm, 'kode' => 'PSM.13', 'nama' => 'Penilaian Widyaiswara', 'sifat' => 'B'],
            ['parent_id' => $id_psm, 'kode' => 'PSM.14', 'nama' => 'Konsultasi, advokasi dan asistensi Widyaiswara', 'sifat' => 'B'],
            ['parent_id' => $id_psm, 'kode' => 'PSM.15', 'nama' => 'Sistem Informasi Widyaiswara', 'sifat' => 'B'],
            ['parent_id' => $id_psm, 'kode' => 'PSM.16', 'nama' => 'Perencanaan Penyelenggaraan Diklat', 'sifat' => 'B'],
            ['parent_id' => $id_psm, 'kode' => 'PSM.17', 'nama' => 'Monitoring dan Evaluasi', 'sifat' => 'B'],
            ['parent_id' => $id_psm, 'kode' => 'PSM.18', 'nama' => 'Alumni', 'sifat' => 'B'],
        ]);

        // Ambil ID anak PSM
        $id_psm_1 = DB::table('klasifikasis')->where('kode', 'PSM.01')->value('id');
        $id_psm_4 = DB::table('klasifikasis')->where('kode', 'PSM.04')->value('id');
        $id_psm_16 = DB::table('klasifikasis')->where('kode', 'PSM.16')->value('id');
        $id_psm_17 = DB::table('klasifikasis')->where('kode', 'PSM.17')->value('id');

        DB::table('klasifikasis')->insertOrIgnore([
            // --- Cucu dari PSM (Level 3) ---
            // Anak PSM.01
            ['parent_id' => $id_psm_1, 'kode' => 'PSM.01.01', 'nama' => 'Pengkajian dan pengusulan kebijakan', 'sifat' => 'B'],
            ['parent_id' => $id_psm_1, 'kode' => 'PSM.01.02', 'nama' => 'Penyiapan kebijakan', 'sifat' => 'B'],
            ['parent_id' => $id_psm_1, 'kode' => 'PSM.01.03', 'nama' => 'Perumusan kebijakan', 'sifat' => 'B'],
            ['parent_id' => $id_psm_1, 'kode' => 'PSM.01.04', 'nama' => 'Masukan dan dukungan kebijakan', 'sifat' => 'B'],
            ['parent_id' => $id_psm_1, 'kode' => 'PSM.01.05', 'nama' => 'Penetapan NSPK', 'sifat' => 'B'],

            // Anak PSM.04
            ['parent_id' => $id_psm_4, 'kode' => 'PSM.04.01', 'nama' => 'Institusi Penilai', 'sifat' => 'B'],
            ['parent_id' => $id_psm_4, 'kode' => 'PSM.04.02', 'nama' => 'Program/Institusi yang dinilai', 'sifat' => 'B'],

            // Anak PSM.16
            ['parent_id' => $id_psm_16, 'kode' => 'PSM.16.01', 'nama' => 'peserta, pengajar, penjadwalan', 'sifat' => 'B'],
            ['parent_id' => $id_psm_16, 'kode' => 'PSM.16.02', 'nama' => 'Penyelenggaraan', 'sifat' => 'B'],
            ['parent_id' => $id_psm_16, 'kode' => 'PSM.16.03', 'nama' => 'Konsultasi, advokasi, asistensi penyelenggaraan diklat', 'sifat' => 'B'],
            ['parent_id' => $id_psm_16, 'kode' => 'PSM.16.04', 'nama' => 'Pengembangan bahan ajar dan metodologi pembelajaran', 'sifat' => 'B'],
            ['parent_id' => $id_psm_16, 'kode' => 'PSM.16.05', 'nama' => 'Sistem informasi diklat', 'sifat' => 'B'],

            // Anak PSM.17
            ['parent_id' => $id_psm_17, 'kode' => 'PSM.17.01', 'nama' => 'Penyelenggara', 'sifat' => 'B'],
            ['parent_id' => $id_psm_17, 'kode' => 'PSM.17.02', 'nama' => 'Pasca diklat', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN FASILITATIF: KU (Keuangan)
        // (DATA SANGAT BESAR - 8 HALAMAN DOKUMEN)
        // ==============================================================================
        $id_ku = DB::table('klasifikasis')->where('kode', 'KU')->value('id');

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_ku, 'kode' => 'KU.01', 'nama' => 'Rencana Anggaran Pendapatan dan Belanja Daerah, dan Anggaran Pendapatan dan Belanja Daerah Perubahan', 'sifat' => 'B'],
            ['parent_id' => $id_ku, 'kode' => 'KU.02', 'nama' => 'Penyusunan Anggaran', 'sifat' => 'B'],
            ['parent_id' => $id_ku, 'kode' => 'KU.03', 'nama' => 'Pelaksanaan Anggaran', 'sifat' => 'B'],
            ['parent_id' => $id_ku, 'kode' => 'KU.04', 'nama' => 'Pembiayaan Daerah', 'sifat' => 'B'],
            ['parent_id' => $id_ku, 'kode' => 'KU.05', 'nama' => 'Dokumen Penatausahaan Keuangan', 'sifat' => 'B'],
            ['parent_id' => $id_ku, 'kode' => 'KU.06', 'nama' => 'Pertanggungjawaban Penggunaan Dana', 'sifat' => 'B'],
            ['parent_id' => $id_ku, 'kode' => 'KU.07', 'nama' => 'Daftar Gaji.', 'sifat' => 'B'],
            ['parent_id' => $id_ku, 'kode' => 'KU.08', 'nama' => 'Kartu Gaji.', 'sifat' => 'B'],
            ['parent_id' => $id_ku, 'kode' => 'KU.09', 'nama' => 'Data Rekening Bendahara Umum Daerah (BUD).', 'sifat' => 'B'],
            ['parent_id' => $id_ku, 'kode' => 'KU.10', 'nama' => 'Laporan Keuangan Tahunan', 'sifat' => 'B'],
            ['parent_id' => $id_ku, 'kode' => 'KU.11', 'nama' => 'Bantuan/Pinjaman Luar Negeri', 'sifat' => 'B'],
            ['parent_id' => $id_ku, 'kode' => 'KU.12', 'nama' => 'Pengelolaan APBD/Dana Pinjaman/Hibah Luar Negeri (PHLN).', 'sifat' => 'B'],
            ['parent_id' => $id_ku, 'kode' => 'KU.13', 'nama' => 'Sistem Akuntansi Keuangan Daerah (SAKD)', 'sifat' => 'B'],
            ['parent_id' => $id_ku, 'kode' => 'KU.14', 'nama' => 'Penyaluran Anggaran Tugas Pembantuan', 'sifat' => 'B'],
            ['parent_id' => $id_ku, 'kode' => 'KU.15', 'nama' => 'Penerimaan Anggaran Tugas Pembantuan', 'sifat' => 'B'],
            ['parent_id' => $id_ku, 'kode' => 'KU.16', 'nama' => 'Pengelolaan Anggaran Pemilu', 'sifat' => 'B'],
            ['parent_id' => $id_ku, 'kode' => 'KU.12', 'nama' => 'Pemeriksaan/Pengawasan Keuangan Daerah', 'sifat' => 'B'], 
        ]);

        $ku_1 = DB::table('klasifikasis')->where('kode', 'KU.01')->value('id');
        $ku_2 = DB::table('klasifikasis')->where('kode', 'KU.02')->value('id');
        $ku_3 = DB::table('klasifikasis')->where('kode', 'KU.03')->value('id');
        $ku_4 = DB::table('klasifikasis')->where('kode', 'KU.04')->value('id');
        $ku_5 = DB::table('klasifikasis')->where('kode', 'KU.05')->value('id');
        $ku_6 = DB::table('klasifikasis')->where('kode', 'KU.06')->value('id');
        $ku_10 = DB::table('klasifikasis')->where('kode', 'KU.10')->value('id');
        $ku_11 = DB::table('klasifikasis')->where('kode', 'KU.11')->value('id');
        $ku_12 = DB::table('klasifikasis')->where('kode', 'KU.12')->where('nama', 'Pengelolaan APBD/Dana Pinjaman/Hibah Luar Negeri (PHLN).')->value('id');
        $ku_13 = DB::table('klasifikasis')->where('kode', 'KU.13')->value('id');
        $ku_14 = DB::table('klasifikasis')->where('kode', 'KU.14')->value('id');
        $ku_15 = DB::table('klasifikasis')->where('kode', 'KU.15')->value('id');
        $ku_16 = DB::table('klasifikasis')->where('kode', 'KU.16')->value('id');
        $ku_12_2 = DB::table('klasifikasis')->where('kode', 'KU.12')->where('nama', 'Pemeriksaan/Pengawasan Keuangan Daerah')->value('id');

        // --- LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Anak KU.01
            ['parent_id' => $ku_1, 'kode' => 'KU.01.01', 'nama' => 'Penyusunan Prioritas Plafon Anggaran', 'sifat' => 'B'],
            ['parent_id' => $ku_1, 'kode' => 'KU.01.02', 'nama' => 'Penyusunan Rencana Kerja Anggaran Satuan Kerja Perangkat Daerah (RKA-SKPD)', 'sifat' => 'B'],
            ['parent_id' => $ku_1, 'kode' => 'KU.01.03', 'nama' => 'Penyampaian Rancangan Anggaran Pendapatan dan Belanja Daerah kepada Dewan Perwakilan Rakyat Daerah', 'sifat' => 'B'],
            ['parent_id' => $ku_1, 'kode' => 'KU.01.04', 'nama' => 'Anggaran Pendapatan dan Belanja Daerah Perubahan (RAPBD-P)', 'sifat' => 'B'],
            ['parent_id' => $ku_1, 'kode' => 'KU.01.05', 'nama' => 'Penyusunan Rencana Kerja Anggaran Satuan Kerja Perangkat Daerah (RKA-SKPD) Perubahan', 'sifat' => 'B'],
            ['parent_id' => $ku_1, 'kode' => 'KU.01.06', 'nama' => 'Penyampaian Rancangan Anggaran Pendapatan dan Belanja Daerah Perubahan kepada Dewan Perwakilan Rakyat Daerah (DPRD)', 'sifat' => 'B'],

            // Anak KU.02
            ['parent_id' => $ku_2, 'kode' => 'KU.02.01', 'nama' => 'Hasil Musyawarah Rencana Pembangunan (Musrenbang) Kecamatan.', 'sifat' => 'B'],
            ['parent_id' => $ku_2, 'kode' => 'KU.02.02', 'nama' => 'Hasil Musyawarah Rencana Pembangunan (Musrenbang) Kabupaten/Kota.', 'sifat' => 'B'],
            ['parent_id' => $ku_2, 'kode' => 'KU.02.03', 'nama' => 'Rancangan Dokumen Pelaksanaan Anggaran (RDPA) SKPD yang telah disetujui Sekretaris Daerah.', 'sifat' => 'B'],
            ['parent_id' => $ku_2, 'kode' => 'KU.02.04', 'nama' => 'Dokumen Pelaksanaan Anggaran (DPA) SKPD yang telah disahkan oleh Pejabat Pengelola Keuangan Daerah (PPKD).', 'sifat' => 'B'],

            // Anak KU.03
            ['parent_id' => $ku_3, 'kode' => 'KU.03.01', 'nama' => 'Surat Penyedia Dana (SPP, SPM dan SP2D): UP, GU, TU, LS.', 'sifat' => 'B'],
            ['parent_id' => $ku_3, 'kode' => 'KU.03.02', 'nama' => 'Pendapatan Asli Daerah', 'sifat' => 'B'],
            ['parent_id' => $ku_3, 'kode' => 'KU.03.03', 'nama' => 'Dokumen Penerimaan Dana Perimbangan', 'sifat' => 'B'],
            ['parent_id' => $ku_3, 'kode' => 'KU.03.04', 'nama' => 'Dokumen Penerimaan Lain-lain Pendapatan yang Sah', 'sifat' => 'B'],
            ['parent_id' => $ku_3, 'kode' => 'KU.03.05', 'nama' => 'Surat Setoran Bukan Pajak (SSBP).', 'sifat' => 'B'],
            ['parent_id' => $ku_3, 'kode' => 'KU.03.06', 'nama' => 'Penerimaan Sisa Lebih Perhitungan Anggaran (SiLPA).', 'sifat' => 'B'],
            ['parent_id' => $ku_3, 'kode' => 'KU.03.07', 'nama' => 'Dokumen Pengelolaan Barang Milik Negara/Daerah.', 'sifat' => 'B'],
            ['parent_id' => $ku_3, 'kode' => 'KU.03.08', 'nama' => 'Dokumen Piutang Daerah.', 'sifat' => 'B'],
            ['parent_id' => $ku_3, 'kode' => 'KU.03.09', 'nama' => 'Dokumen Pengelolaan Investasi.', 'sifat' => 'B'],
            ['parent_id' => $ku_3, 'kode' => 'KU.03.10', 'nama' => 'Dokumen Belanja Langsung', 'sifat' => 'B'],
            ['parent_id' => $ku_3, 'kode' => 'KU.03.11', 'nama' => 'Dokumen Belanja tidak langsung', 'sifat' => 'B'],

            // Anak KU.04
            ['parent_id' => $ku_4, 'kode' => 'KU.04.01', 'nama' => 'Bukti Penerimaan Pembiayaan', 'sifat' => 'B'],
            ['parent_id' => $ku_4, 'kode' => 'KU.04.02', 'nama' => 'Bukti Pengeluaran Pembiayaan', 'sifat' => 'B'],

            // Anak KU.05
            ['parent_id' => $ku_5, 'kode' => 'KU.05.01', 'nama' => 'Surat Penyediaan Dana (SPD).', 'sifat' => 'B'],
            ['parent_id' => $ku_5, 'kode' => 'KU.05.02', 'nama' => 'Surat Permohonan Pembayaran (SPP).', 'sifat' => 'B'],
            ['parent_id' => $ku_5, 'kode' => 'KU.05.03', 'nama' => 'Surat Perintah Membayar (SPM).', 'sifat' => 'B'],
            ['parent_id' => $ku_5, 'kode' => 'KU.05.04', 'nama' => 'Surat Perintah Pencairan Dana (SP2D).', 'sifat' => 'B'],

            // Anak KU.06
            ['parent_id' => $ku_6, 'kode' => 'KU.06.01', 'nama' => 'Buku Kas Umum (BKU).', 'sifat' => 'B'],
            ['parent_id' => $ku_6, 'kode' => 'KU.06.02', 'nama' => 'Buku Kas Pembantu (BKP).', 'sifat' => 'B'],
            ['parent_id' => $ku_6, 'kode' => 'KU.06.03', 'nama' => 'Ringkasan Perincian Pengeluaran Objek.', 'sifat' => 'B'],
            ['parent_id' => $ku_6, 'kode' => 'KU.06.04', 'nama' => 'Rekening Koran Bank.', 'sifat' => 'B'],
            ['parent_id' => $ku_6, 'kode' => 'KU.06.05', 'nama' => 'Pertanggungjawaban Fungsional dan Administrasi', 'sifat' => 'B'],
            ['parent_id' => $ku_6, 'kode' => 'KU.06.06', 'nama' => 'Bukti Penyetoran Pajak.', 'sifat' => 'B'],
            ['parent_id' => $ku_6, 'kode' => 'KU.06.07', 'nama' => 'Register Penutupan Kas.', 'sifat' => 'B'],
            ['parent_id' => $ku_6, 'kode' => 'KU.06.08', 'nama' => 'Berita Acara Pemeriksaan.', 'sifat' => 'B'],
            ['parent_id' => $ku_6, 'kode' => 'KU.06.09', 'nama' => 'Laporan Realisasi Anggaran (LRA), Neraca, Catatan Atas Laporan Keuangan (CaLK), Arsip Data Komputer (ADK).', 'sifat' => 'B'],
            ['parent_id' => $ku_6, 'kode' => 'KU.06.10', 'nama' => 'Laporan Pendapatan Negara.', 'sifat' => 'B'],
            ['parent_id' => $ku_6, 'kode' => 'KU.06.11', 'nama' => 'Laporan Keadaan Kredit Anggaran.', 'sifat' => 'B'],

            // Anak KU.10
            ['parent_id' => $ku_10, 'kode' => 'KU.10.01', 'nama' => 'Laporan Realisasi Anggaran (LRA)', 'sifat' => 'B'],
            ['parent_id' => $ku_10, 'kode' => 'KU.10.02', 'nama' => 'Neraca', 'sifat' => 'B'],
            ['parent_id' => $ku_10, 'kode' => 'KU.10.03', 'nama' => 'Laporan Arus Kas', 'sifat' => 'B'],
            ['parent_id' => $ku_10, 'kode' => 'KU.10.04', 'nama' => 'Catatan atas Laporan Keuangan (CaLK).', 'sifat' => 'B'],

            // Anak KU.11
            ['parent_id' => $ku_11, 'kode' => 'KU.11.01', 'nama' => 'Permohonan Pinjaman Luar Negeri (Blue Book).', 'sifat' => 'B'],
            ['parent_id' => $ku_11, 'kode' => 'KU.11.02', 'nama' => 'Dokumen Kesanggupan Negara Donor untuk Membiayai (Green Book).', 'sifat' => 'B'],
            ['parent_id' => $ku_11, 'kode' => 'KU.11.03', 'nama' => 'Dokumen Memorandum of Understanding (MoU), dan Dokumen Sejenisnya.', 'sifat' => 'B'],
            ['parent_id' => $ku_11, 'kode' => 'KU.11.04', 'nama' => 'Dokumen Loan Agreement (PHLN) seperti Draft Agreement, Legal Opinion, Surat Menyurat dengan Lender.', 'sifat' => 'B'],
            ['parent_id' => $ku_11, 'kode' => 'KU.11.05', 'nama' => 'Alokasi dan Relokasi Penggunaan Dana Luar Negeri, antara lain Usulan Luncuran Dana.', 'sifat' => 'B'],
            ['parent_id' => $ku_11, 'kode' => 'KU.11.06', 'nama' => 'Aplikasi Penarikan Dana BLN berikut Lampirannya', 'sifat' => 'B'],
            ['parent_id' => $ku_11, 'kode' => 'KU.11.07', 'nama' => 'Dokumen Otorisasi Penarikan Dana (Payment Advice).', 'sifat' => 'B'],
            ['parent_id' => $ku_11, 'kode' => 'KU.11.08', 'nama' => 'Dokumen Realisasi Pencairan Dana Bantuan Luar Negeri, yaitu: Surat Perintah Pencairan Dana, SPM beserta lampirannya, antara lain SPP, Kontrak, BA, dan Data Pendukung lainnya.', 'sifat' => 'B'],
            ['parent_id' => $ku_11, 'kode' => 'KU.11.09', 'nama' => 'Replenishment (permintaan penarikan dana dari negara donor) meliputi antara lain No Objection Letter (NOL), Project Implementation, Notification of Contract, Withdrawal Authorization (WA), Statement of Expenditure (SE).', 'sifat' => 'B'],
            ['parent_id' => $ku_11, 'kode' => 'KU.11.10', 'nama' => 'Staff Appraisal Report.', 'sifat' => 'B'],
            ['parent_id' => $ku_11, 'kode' => 'KU.11.11', 'nama' => 'Report/Laporan yang terdiri dari', 'sifat' => 'B'],
            ['parent_id' => $ku_11, 'kode' => 'KU.11.12', 'nama' => 'Laporan Hutang Daerah', 'sifat' => 'B'],
            ['parent_id' => $ku_11, 'kode' => 'KU.11.13', 'nama' => 'Completion Report/Annual Report.', 'sifat' => 'B'],
            ['parent_id' => $ku_11, 'kode' => 'KU.11.14', 'nama' => 'Ketentuan/Peraturan yang Menyangkut Bantuan/Pinjaman Luar Negeri.', 'sifat' => 'B'],

            // Anak KU.12
            ['parent_id' => $ku_12, 'kode' => 'KU.12.01', 'nama' => 'Keputusan Kepala Daerah tentang Penetapan', 'sifat' => 'B'],

            // Anak KU.13
            ['parent_id' => $ku_13, 'kode' => 'KU.13.01', 'nama' => 'Manual Implementasi Sistem Akuntansi Keuangan Daerah (SAKD).', 'sifat' => 'B'],
            ['parent_id' => $ku_13, 'kode' => 'KU.13.02', 'nama' => 'Kebijakan Akuntansi.', 'sifat' => 'B'],
            ['parent_id' => $ku_13, 'kode' => 'KU.13.03', 'nama' => 'Arsip Data Komputer dan Berita Acara Rekonsiliasi.', 'sifat' => 'B'],
            ['parent_id' => $ku_13, 'kode' => 'KU.13.04', 'nama' => 'Laporan Realisasi Anggaran dan Neraca Bulanan/Triwulanan/Semesteran.', 'sifat' => 'B'],

            // Anak KU.14
            ['parent_id' => $ku_14, 'kode' => 'KU.14.01', 'nama' => 'Penetapan Pemimpin Proyek/Bagian Proyek, Bendahara, atas Penggunaan Anggaran Kegiatan Pembantuan, termasuk Specimen Tanda Tangan.', 'sifat' => 'B'],
            ['parent_id' => $ku_14, 'kode' => 'KU.14.02', 'nama' => 'Berkas Permintaan Pembayaran (SPP) dan lampirannya', 'sifat' => 'B'],
            ['parent_id' => $ku_14, 'kode' => 'KU.14.03', 'nama' => 'Buku Rekening Bank.', 'sifat' => 'B'],
            ['parent_id' => $ku_14, 'kode' => 'KU.14.04', 'nama' => 'Keputusan Pembukuan Rekening.', 'sifat' => 'B'],
            ['parent_id' => $ku_14, 'kode' => 'KU.14.05', 'nama' => 'Pembukuan anggaran terdiri dari', 'sifat' => 'B'],

            // Anak KU.15
            ['parent_id' => $ku_15, 'kode' => 'KU.15.01', 'nama' => 'Berkas Penerimaan Keuangan Pelaksanaan dan Tugas. Pembantuan Termasuk Dana Sisa atau Pengeluaran Lainnya.', 'sifat' => 'B'],
            ['parent_id' => $ku_15, 'kode' => 'KU.15.02', 'nama' => 'Berkas Penerimaan Pajak termasuk PPh 21, PPh 22, PPh 23, dan PPn, dan Denda Keterlambatan Menyelesaikan Pekerjaan.', 'sifat' => 'B'],

            // Anak KU.16
            ['parent_id' => $ku_16, 'kode' => 'KU.16.01', 'nama' => 'Penyusunan Anggaran Pilkada dan Biaya Bantuan Pemilu dari APBD.', 'sifat' => 'B'],
            ['parent_id' => $ku_16, 'kode' => 'KU.16.10', 'nama' => 'Pelaksanaan Anggaran Pilkada Dan Anggaran Biaya Bantuan Pemilu', 'sifat' => 'B'],
            ['parent_id' => $ku_16, 'kode' => 'KU.16.11', 'nama' => 'Pelaksanaan Anggaran Operasional Pemilu', 'sifat' => 'B'],

            // Anak KU.12_2 (Pemeriksaan)
            ['parent_id' => $ku_12_2, 'kode' => 'KU.12.01', 'nama' => 'Laporan Hasil Pemeriksaan Badan Pemeriksa Keuangan Republik Indonesia atas Laporan Keuangan.', 'sifat' => 'B'],
            ['parent_id' => $ku_12_2, 'kode' => 'KU.12.02', 'nama' => 'Hasil Pengawasan dan Pemeriksaan Internal.', 'sifat' => 'B'],
            ['parent_id' => $ku_12_2, 'kode' => 'KU.12.03', 'nama' => 'Laporan Aparat Pemeriksa Fungsional', 'sifat' => 'B'],
            ['parent_id' => $ku_12_2, 'kode' => 'KU.12.04', 'nama' => 'Dokumen Penyelesaian Kerugian Daerah', 'sifat' => 'B'],
        ]);

        $ku_1_1 = DB::table('klasifikasis')->where('kode', 'KU.01.01')->value('id');
        $ku_1_2 = DB::table('klasifikasis')->where('kode', 'KU.01.02')->value('id');
        $ku_1_3 = DB::table('klasifikasis')->where('kode', 'KU.01.03')->value('id');
        $ku_1_4 = DB::table('klasifikasis')->where('kode', 'KU.01.04')->value('id');
        $ku_1_5 = DB::table('klasifikasis')->where('kode', 'KU.01.05')->value('id');
        $ku_1_6 = DB::table('klasifikasis')->where('kode', 'KU.01.06')->value('id');
        
        $ku_3_2 = DB::table('klasifikasis')->where('kode', 'KU.03.02')->value('id');
        $ku_3_3 = DB::table('klasifikasis')->where('kode', 'KU.03.03')->value('id');
        $ku_3_4 = DB::table('klasifikasis')->where('kode', 'KU.03.04')->value('id');
        $ku_3_10 = DB::table('klasifikasis')->where('kode', 'KU.03.10')->value('id');
        $ku_3_11 = DB::table('klasifikasis')->where('kode', 'KU.03.11')->value('id');

        $ku_4_1 = DB::table('klasifikasis')->where('kode', 'KU.04.01')->value('id');
        $ku_4_2 = DB::table('klasifikasis')->where('kode', 'KU.04.02')->value('id');

        $ku_11_6 = DB::table('klasifikasis')->where('kode', 'KU.11.06')->value('id');
        $ku_11_11 = DB::table('klasifikasis')->where('kode', 'KU.11.11')->value('id');
        $ku_11_12 = DB::table('klasifikasis')->where('kode', 'KU.11.12')->value('id');
        
        $ku_12_01 = DB::table('klasifikasis')->where('kode', 'KU.12.01')->value('id');
        
        $ku_14_2 = DB::table('klasifikasis')->where('kode', 'KU.14.02')->value('id');
        $ku_14_5 = DB::table('klasifikasis')->where('kode', 'KU.14.05')->value('id');
        
        $ku_16_1 = DB::table('klasifikasis')->where('kode', 'KU.16.01')->value('id');
        $ku_16_10 = DB::table('klasifikasis')->where('kode', 'KU.16.10')->value('id');
        $ku_16_11 = DB::table('klasifikasis')->where('kode', 'KU.16.11')->value('id');
        
        $ku_12_2_3 = DB::table('klasifikasis')->where('kode', 'KU.12.03')->value('id');
        $ku_12_2_4 = DB::table('klasifikasis')->where('kode', 'KU.12.04')->value('id');

        // --- LEVEL CICIT (Level 4) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah KU.01.01
            ['parent_id' => $ku_1_1, 'kode' => 'KU.01.01.01', 'nama' => 'Kebijakan Umum, Strategi, Prioritas dan Renstra', 'sifat' => 'B'],
            ['parent_id' => $ku_1_1, 'kode' => 'KU.01.01.02', 'nama' => 'Dokumen Rancangan Kebijakan Umum Anggaran (KUA) yang telah dibahas bersama antara DPRD dan Pemerintah Daerah.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_1, 'kode' => 'KU.01.01.03', 'nama' => 'KUA beserta Nota Kesepakatannya', 'sifat' => 'B'],
            ['parent_id' => $ku_1_1, 'kode' => 'KU.01.01.04', 'nama' => 'Dokumen Rancangan Prioritas Plafon Anggaran Sementara (PPAS)', 'sifat' => 'B'],
            ['parent_id' => $ku_1_1, 'kode' => 'KU.01.01.05', 'nama' => 'Nota Kesepakatan PPA.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_1, 'kode' => 'KU.01.01.06', 'nama' => 'Prioritas Plafon Anggaran.', 'sifat' => 'B'],
            // Bawah KU.01.02
            ['parent_id' => $ku_1_2, 'kode' => 'KU.01.02.01', 'nama' => 'Dokumen Pedoman Penyusunan RKA-SKPD yang telah disetujui Sekretaris Daerah,', 'sifat' => 'B'],
            ['parent_id' => $ku_1_2, 'kode' => 'KU.01.02.02', 'nama' => 'Dokumen RKA-SKPD.', 'sifat' => 'B'],
            // Bawah KU.01.03
            ['parent_id' => $ku_1_3, 'kode' => 'KU.01.03.01', 'nama' => 'Pengantar Nota Keuangan Pemerintah dan Rancangan Peraturan Daerah RAPBD.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_3, 'kode' => 'KU.01.03.02', 'nama' => 'Hasil Pembahasan Rencana Anggaran Pendapatan dan Belanja Daerah (RAPBD) oleh Dewan Perwakilan Rakyat Daerah (DPRD) dan Pemerintah Daerah.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_3, 'kode' => 'KU.01.03.03', 'nama' => 'Dokumen Persetujuan bersama antara DPRD dan Kepala Daerah tentang Raperda APBD.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_3, 'kode' => 'KU.01.03.04', 'nama' => 'Dokumen Rancangan Penjabaran APBD beserta Lampirannya.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_3, 'kode' => 'KU.01.03.05', 'nama' => 'Penyampaian Permohonan Evaluasi kepada Menteri Dalam Negeri tentang RAPBD beserta penjabarannya.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_3, 'kode' => 'KU.01.03.06', 'nama' => 'Hasil Evaluasi Menteri Dalam Negeri tentang RAPBD.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_3, 'kode' => 'KU.01.03.07', 'nama' => 'Penetapan Perda APBD oleh Gubernur beserta Penjabarannya.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_3, 'kode' => 'KU.01.03.08', 'nama' => 'Peraturan Daerah (PERDA) tentang APBD.', 'sifat' => 'B'],
            // Bawah KU.01.04
            ['parent_id' => $ku_1_4, 'kode' => 'KU.01.04.01', 'nama' => 'Kebijakan Umum, Strategi, Prioritas dan Renstra Perubahan (RKPD dan Renja Perangkat Daerah).', 'sifat' => 'B'],
            ['parent_id' => $ku_1_4, 'kode' => 'KU.01.04.02', 'nama' => 'Dokumen Rancangan Kebijakan Umum Anggaran (KUA) yang telah dibahas bersama antara DPRD dan Pemda.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_4, 'kode' => 'KU.01.04.03', 'nama' => 'KUA Perubahan beserta Nota Kesepakatannya.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_4, 'kode' => 'KU.01.04.04', 'nama' => 'Dokumen Rancangan Prioritas Plafon Anggaran Sementara (PPAS) Perubahan.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_4, 'kode' => 'KU.01.04.05', 'nama' => 'Nota Kesepakatan Prioritas Plafon Anggaran Perubahan.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_4, 'kode' => 'KU.01.04.06', 'nama' => 'Prioritas Plafon Anggaran Perubahan.', 'sifat' => 'B'],
            // Bawah KU.01.05
            ['parent_id' => $ku_1_5, 'kode' => 'KU.01.05.01', 'nama' => 'Dokumen Pedoman Penyusunan RKA-SKPD Perubahan yang telah disetujui Sekretaris Daerah.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_5, 'kode' => 'KU.01.05.02', 'nama' => 'Dokumen RKA-SKPD Perubahan.', 'sifat' => 'B'],
            // Bawah KU.01.06
            ['parent_id' => $ku_1_6, 'kode' => 'KU.01.06.01', 'nama' => 'Pengantar Nota Keuangan Pemerintah dan Rancangan Peraturan Daerah RAPBD Perubahan, Nota Keuangan Pemerintah dan Materi RAPBD.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_6, 'kode' => 'KU.01.06.02', 'nama' => 'Hasil Pembahasan Rencana Anggaran Pendapatan dan Belanja Daerah (RAPBD) Perubahan oleh Dewan Perwakilan Rakyat Daerah (DPRD) dan Pemerintah Daerah.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_6, 'kode' => 'KU.01.06.03', 'nama' => 'Dokumen Persetujuan Bersama antara DPRD dan Kepala Daerah tentang Raperda APBD Perubahan.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_6, 'kode' => 'KU.01.06.04', 'nama' => 'Dokumen Rancangan Penjabaran APBD beserta Lampirannya.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_6, 'kode' => 'KU.01.06.05', 'nama' => 'Penyampaian Permohonan Evaluasi kepada Menteri Dalam Negeri tentang RAPBD Perubahan beserta penjabarannya.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_6, 'kode' => 'KU.01.06.06', 'nama' => 'Hasil Evaluasi Menteri Dalam Negeri tentang RAPBD Perubahan.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_6, 'kode' => 'KU.01.06.07', 'nama' => 'Penetapan Perda APBD Perubahan oleh Gubernur beserta Penjabarannya.', 'sifat' => 'B'],
            ['parent_id' => $ku_1_6, 'kode' => 'KU.01.06.08', 'nama' => 'Peraturan Daerah (PERDA) tentang APBD Perubahan.', 'sifat' => 'B'],

            // Bawah KU.03.02 (Pendapatan Asli Daerah)
            ['parent_id' => $ku_3_2, 'kode' => 'KU.03.02.01', 'nama' => 'Surat Setoran Pajak (SSP) Daerah Pajak Kendaraan Bermotor.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_2, 'kode' => 'KU.03.02.02', 'nama' => 'Surat Setoran Pajak (SSP) Daerah Pajak Bea Balik Nama Kendaraan Bermotor (BBNKB).', 'sifat' => 'B'],
            ['parent_id' => $ku_3_2, 'kode' => 'KU.03.02.03', 'nama' => 'Surat Setoran Pajak (SSP) Daerah Pajak Bahan Bakar Kendaraan Bermotor (PBBKB).', 'sifat' => 'B'],
            ['parent_id' => $ku_3_2, 'kode' => 'KU.03.02.04', 'nama' => 'Surat Setoran Pajak (SSP) Daerah Pajak Air Permukaan.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_2, 'kode' => 'KU.03.02.05', 'nama' => 'Surat Setoran Pajak (SSP) Daerah Pajak Rokok.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_2, 'kode' => 'KU.03.02.06', 'nama' => 'Surat Ketetapan Retribusi Daerah.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_2, 'kode' => 'KU.03.02.07', 'nama' => 'Bukti Pembayaran Retribusi Jasa Umum.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_2, 'kode' => 'KU.03.02.08', 'nama' => 'Bukti Pembayaran Retribusi Jasa Usaha.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_2, 'kode' => 'KU.03.02.09', 'nama' => 'Bukti Pembayaran Retribusi Perijinan Tertentu.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_2, 'kode' => 'KU.03.02.10', 'nama' => 'Bukti Pembayaran Retribusi Pengendalian Lalu Lintas.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_2, 'kode' => 'KU.03.02.11', 'nama' => 'Bukti Pembayaran Retribusi Perpanjangan Ijin Mempekerjakan Tenaga Kerja Asing (IMTA).', 'sifat' => 'B'],
            ['parent_id' => $ku_3_2, 'kode' => 'KU.03.02.12', 'nama' => 'Bukti Penerimaan Jasa Layanan Kesehatan Masyarakat.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_2, 'kode' => 'KU.03.02.13', 'nama' => 'Dokumen Rasionalitas Hasil Pengelolaan Kekayaan Daerah.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_2, 'kode' => 'KU.03.02.14', 'nama' => 'Bukti Penerimaan SKPD dari Badan Layanan Umum.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_2, 'kode' => 'KU.03.02.15', 'nama' => 'Bukti Penerimaan dari Pengelolaan Dana Bergulir.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_2, 'kode' => 'KU.03.02.16', 'nama' => 'Bukti Penerimaan Bunga dan atau jasa Giro pada bank.', 'sifat' => 'B'],

            // Bawah KU.03.03
            ['parent_id' => $ku_3_3, 'kode' => 'KU.03.03.01', 'nama' => 'Dana Bagi Hasil yang Bersumber dari Pajak dan Bukan Pajak.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_3, 'kode' => 'KU.03.03.02', 'nama' => 'Dana Bagi Hasil Untuk Kabupaten /Kota.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_3, 'kode' => 'KU.03.03.03', 'nama' => 'Dana Alokasi Umum (DAU).', 'sifat' => 'B'],
            ['parent_id' => $ku_3_3, 'kode' => 'KU.03.03.04', 'nama' => 'Daerah yang Menerima DAU.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_3, 'kode' => 'KU.03.03.05', 'nama' => 'Dana Alokasi Khusus (DAK).', 'sifat' => 'B'],

            // Bawah KU.03.04
            ['parent_id' => $ku_3_4, 'kode' => 'KU.03.04.01', 'nama' => 'Alokasi Dana Penyesuaian.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_4, 'kode' => 'KU.03.04.02', 'nama' => 'Dana Otonomi Khusus dan Bantuan Operasional Sekolah', 'sifat' => 'B'],
            ['parent_id' => $ku_3_4, 'kode' => 'KU.03.04.03', 'nama' => 'Bagi Hasil Pajak dari Pemerintah Pusat.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_4, 'kode' => 'KU.03.04.04', 'nama' => 'Bantuan Keuangan Pemerintah Pusat.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_4, 'kode' => 'KU.03.04.05', 'nama' => 'Penerimaan Hibah Yang Bersumber dari APBN, Pemerintah Daerah Lainnya atau Sumbangan Pihak Ketiga.', 'sifat' => 'B'],

            // Bawah KU.03.10
            ['parent_id' => $ku_3_10, 'kode' => 'KU.03.10.01', 'nama' => 'Belanja Pegawai.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_10, 'kode' => 'KU.03.10.02', 'nama' => 'Belanja Barang Jasa.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_10, 'kode' => 'KU.03.10.03', 'nama' => 'Belanja Modal.', 'sifat' => 'B'],

            // Bawah KU.03.11
            ['parent_id' => $ku_3_11, 'kode' => 'KU.03.11.01', 'nama' => 'Pegawai.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_11, 'kode' => 'KU.03.11.02', 'nama' => 'Hibah.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_11, 'kode' => 'KU.03.11.03', 'nama' => 'Belanja Bagi Hasil.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_11, 'kode' => 'KU.03.11.04', 'nama' => 'Subsidi.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_11, 'kode' => 'KU.03.11.05', 'nama' => 'Bunga.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_11, 'kode' => 'KU.03.11.06', 'nama' => 'Bantuan Sosial.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_11, 'kode' => 'KU.03.11.07', 'nama' => 'Bantuan Keuangan Pemerintah Pusat.', 'sifat' => 'B'],
            ['parent_id' => $ku_3_11, 'kode' => 'KU.03.11.08', 'nama' => 'Belanja Tidak Terduga.', 'sifat' => 'B'],

            // Bawah KU.04.01
            ['parent_id' => $ku_4_1, 'kode' => 'KU.04.01.01', 'nama' => 'SiLPA.', 'sifat' => 'B'],
            ['parent_id' => $ku_4_1, 'kode' => 'KU.04.01.02', 'nama' => 'Dana Cadangan.', 'sifat' => 'B'],
            ['parent_id' => $ku_4_1, 'kode' => 'KU.04.01.03', 'nama' => 'Dana Bergulir.', 'sifat' => 'B'],
            ['parent_id' => $ku_4_1, 'kode' => 'KU.04.01.04', 'nama' => 'Pinjaman Daerah.', 'sifat' => 'B'],
            ['parent_id' => $ku_4_1, 'kode' => 'KU.04.01.05', 'nama' => 'Pengalihan Piutang PBB P2 menjadi PAD.', 'sifat' => 'B'],

            // Bawah KU.04.02
            ['parent_id' => $ku_4_2, 'kode' => 'KU.04.02.01', 'nama' => 'Investasi Jangka Panjang Dalam Bentuk Dana Bergulir.', 'sifat' => 'B'],
            ['parent_id' => $ku_4_2, 'kode' => 'KU.04.02.02', 'nama' => 'Penyertaan Modal Pada BUMD.', 'sifat' => 'B'],
            ['parent_id' => $ku_4_2, 'kode' => 'KU.04.02.03', 'nama' => 'Penambahan Penyertaan Modal pada BUMD.', 'sifat' => 'B'],
            ['parent_id' => $ku_4_2, 'kode' => 'KU.04.02.04', 'nama' => 'Pengeluaran Dari Dana Cadangan.', 'sifat' => 'B'],
            ['parent_id' => $ku_4_2, 'kode' => 'KU.04.02.05', 'nama' => 'Pembiayaan Bagi Usaha Masyarakat Kecil dan Menengah (UMKM).', 'sifat' => 'B'],
            ['parent_id' => $ku_4_2, 'kode' => 'KU.04.02.06', 'nama' => 'Penyertaan Modal Pada Bank Perkreditan Rakyat (BPR) Milik Pemda.', 'sifat' => 'B'],

            // Bawah KU.11.06
            ['parent_id' => $ku_11_6, 'kode' => 'KU.11.06.01', 'nama' => 'Reimbursement.', 'sifat' => 'B'],
            ['parent_id' => $ku_11_6, 'kode' => 'KU.11.06.02', 'nama' => 'Direct Payment/Transfer Procedure.', 'sifat' => 'B'],
            ['parent_id' => $ku_11_6, 'kode' => 'KU.11.06.03', 'nama' => 'Special Commitment/ L/C Opening.', 'sifat' => 'B'],
            ['parent_id' => $ku_11_6, 'kode' => 'KU.11.06.04', 'nama' => 'Special Account/Imprest Fund.', 'sifat' => 'B'],

            // Bawah KU.11.11
            ['parent_id' => $ku_11_11, 'kode' => 'KU.11.11.01', 'nama' => 'Progress Report.', 'sifat' => 'B'],
            ['parent_id' => $ku_11_11, 'kode' => 'KU.11.11.02', 'nama' => 'Monthly Report.', 'sifat' => 'B'],
            ['parent_id' => $ku_11_11, 'kode' => 'KU.11.11.03', 'nama' => 'Quarterly Report.', 'sifat' => 'B'],

            // Bawah KU.11.12
            ['parent_id' => $ku_11_12, 'kode' => 'KU.11.12.01', 'nama' => 'Laporan Pembayaran Hutang Daerah.', 'sifat' => 'B'],
            ['parent_id' => $ku_11_12, 'kode' => 'KU.11.12.02', 'nama' => 'Laporan Posisi Hutang Daerah.', 'sifat' => 'B'],

            // Bawah KU.12.01
            ['parent_id' => $ku_12_01, 'kode' => 'KU.12.01.01', 'nama' => 'Kuasa Pengguna Anggaran.', 'sifat' => 'B'],
            ['parent_id' => $ku_12_01, 'kode' => 'KU.12.01.02', 'nama' => 'Kuasa Pengguna Barang/Jasa.', 'sifat' => 'B'],
            ['parent_id' => $ku_12_01, 'kode' => 'KU.12.01.03', 'nama' => 'Pejabat Pembuat Komitmen.', 'sifat' => 'B'],
            ['parent_id' => $ku_12_01, 'kode' => 'KU.12.01.04', 'nama' => 'Pejabat Pembuat Daftar Gaji.', 'sifat' => 'B'],
            ['parent_id' => $ku_12_01, 'kode' => 'KU.12.01.05', 'nama' => 'Pejabat Penandatanganan SPM.', 'sifat' => 'B'],
            ['parent_id' => $ku_12_01, 'kode' => 'KU.12.01.06', 'nama' => 'Bendahara Penerimaan/Pengeluaran.', 'sifat' => 'B'],
            ['parent_id' => $ku_12_01, 'kode' => 'KU.12.01.07', 'nama' => 'Pengelola Barang.', 'sifat' => 'B'],
            ['parent_id' => $ku_12_01, 'kode' => 'KU.12.01.08', 'nama' => 'Berita Acara Serah Terima Jabatan.', 'sifat' => 'B'],

            // Bawah KU.14.02
            ['parent_id' => $ku_14_2, 'kode' => 'KU.14.02.01', 'nama' => 'SPP-SPP-Daftar Perincian Penggunaan SPPR-SPDR-L, SPM-LS, SPM-DU, bilyet giro, SPM Nihil.', 'sifat' => 'B'],
            ['parent_id' => $ku_14_2, 'kode' => 'KU.14.02.02', 'nama' => 'Penagihan/Invoice, Faktur Pajak, Bukti Penerimaan Kas/Bank beserta Bukti Pendukungnya antara lain Copy Faktur Pajak dan Nota Kredit Bank.', 'sifat' => 'B'],
            ['parent_id' => $ku_14_2, 'kode' => 'KU.14.02.03', 'nama' => 'Permintaan Pelayanan Jasa/Service Report dan Berita Acara Penyelesaian Pekerjaan.', 'sifat' => 'B'],

            // Bawah KU.14.05
            ['parent_id' => $ku_14_5, 'kode' => 'KU.14.05.01', 'nama' => 'Buku Kas Umum (BKU).', 'sifat' => 'B'],
            ['parent_id' => $ku_14_5, 'kode' => 'KU.14.05.02', 'nama' => 'Buku Pembantu.', 'sifat' => 'B'],
            ['parent_id' => $ku_14_5, 'kode' => 'KU.14.05.03', 'nama' => 'Register dan Buku Tambahan.', 'sifat' => 'B'],
            ['parent_id' => $ku_14_5, 'kode' => 'KU.14.05.04', 'nama' => 'Daftar Pembukuan Selama rekening masih aktif.', 'sifat' => 'B'],
            ['parent_id' => $ku_14_5, 'kode' => 'KU.14.05.05', 'nama' => 'Pencairan/Pengeluaran (DPP).', 'sifat' => 'B'],
            ['parent_id' => $ku_14_5, 'kode' => 'KU.14.05.06', 'nama' => 'Daftar Pembukuan Pencairan/Pengeluaran (DPP).', 'sifat' => 'B'],
            ['parent_id' => $ku_14_5, 'kode' => 'KU.14.05.07', 'nama' => 'Daftar Himpunan Pencairan (DHP).', 'sifat' => 'B'],
            ['parent_id' => $ku_14_5, 'kode' => 'KU.14.05.08', 'nama' => 'Rekening Koran.', 'sifat' => 'B'],

            // Bawah KU.16.01
            ['parent_id' => $ku_16_1, 'kode' => 'KU.16.01.01', 'nama' => 'Kebijakan Keuangan Pilkada dan Penyusunan Anggaran Bantuan Pemilu.', 'sifat' => 'B'],
            ['parent_id' => $ku_16_1, 'kode' => 'KU.16.01.02', 'nama' => 'Peraturan/Pedoman/Standar Belanja Pegawai, Barang dan Jasa, Operasional dan Kontingensi untuk Biaya Pilkada dan Bantuan Pemilu.', 'sifat' => 'B'],
            ['parent_id' => $ku_16_1, 'kode' => 'KU.16.01.03', 'nama' => 'Bahan Usulan Rencana Kegiatan dan Anggaran (RKA) Pilkada KPUD dan Panwasda Provinsi, PPK, PPS, KPPS dan Permohonan Pengajuan RKA KPUD dan Panwas.', 'sifat' => 'B'],
            ['parent_id' => $ku_16_1, 'kode' => 'KU.16.01.04', 'nama' => 'Berkas Pembahasan RKA Pilkada dan Bantuan Pemilu.', 'sifat' => 'B'],
            ['parent_id' => $ku_16_1, 'kode' => 'KU.16.01.05', 'nama' => 'Rencana Anggaran Satuan Kerja (RASK) Pilkada dan Bantuan Pemilu Provinsi.', 'sifat' => 'B'],
            ['parent_id' => $ku_16_1, 'kode' => 'KU.16.01.06', 'nama' => 'Dokumen Rancangan Anggaran Satuan Kerja (DRASK) Pilkada KPUD dan Panwas Provinsi dan Bantuan Biaya Pemilu dari APBD.', 'sifat' => 'B'],
            ['parent_id' => $ku_16_1, 'kode' => 'KU.16.01.07', 'nama' => 'Berkas Pembentukan Dana Cadangan Pilkada.', 'sifat' => 'B'],
            ['parent_id' => $ku_16_1, 'kode' => 'KU.16.01.08', 'nama' => 'Bahan Rapat Rancangan Peraturan Daerah tentang Pilkada, dan Bantuan Biaya Pemilu dari APBD.', 'sifat' => 'B'],
            ['parent_id' => $ku_16_1, 'kode' => 'KU.16.01.09', 'nama' => 'Nota Persetujuan DPRD tentang Perda APBD Pilkada dan Bantuan Biaya Pemilu dari APBD.', 'sifat' => 'B'],

            // Bawah KU.16.10
            ['parent_id' => $ku_16_10, 'kode' => 'KU.16.10.01', 'nama' => 'Berkas Penetapan Bendahara dan Atasan Langsung Bendahara KPUD, Bendahara Panwasda dan Bendahara pada Panitia Pilkada dan Pemilu.', 'sifat' => 'B'],
            ['parent_id' => $ku_16_10, 'kode' => 'KU.16.10.02', 'nama' => 'Berkas Penerimaan Komisi, Rabat Pembayaran Pengadaan Jasa, Bunga, Pelaksanaan Pilkada/Pemilu.', 'sifat' => 'B'],
            ['parent_id' => $ku_16_10, 'kode' => 'KU.16.10.03', 'nama' => 'Berkas Setor Sisa Dana Pilkada/Pemilu termasuk Setor Komisi Pengadaan Barang/Jasa, Rabat, Bunga, Jasa Giro.', 'sifat' => 'B'],
            ['parent_id' => $ku_16_10, 'kode' => 'KU.16.10.04', 'nama' => 'Berkas Penyaluran Biaya Pemilu termasuk diantaranya Bukti Transfer Bank.', 'sifat' => 'B'],
            ['parent_id' => $ku_16_10, 'kode' => 'KU.16.10.05', 'nama' => 'Pedoman Dokumen Penyediaan Pembiayaan Kegiatan Operasional (PPKO) Pemilu termasuk Perubahan/ Pergeseran/Revisinya.', 'sifat' => 'B'],

            // Bawah KU.16.11
            ['parent_id' => $ku_16_11, 'kode' => 'KU.16.11.01', 'nama' => 'Dokumen Penyediaan Pembiayaan Kegiatan Operasional (PPKO) Pemilu termasuk Perubahan/Pergeseran/Revisinya.', 'sifat' => 'B'],
            ['parent_id' => $ku_16_11, 'kode' => 'KU.16.11.02', 'nama' => 'Berkas Penetapan Bendahara dan Atasan Langsung Bendahara KPUD Provinsi, Panwasda dan Pemegang Uang Muka Cabang (PUMC) PPK dan Panwas.', 'sifat' => 'B'],
            ['parent_id' => $ku_16_11, 'kode' => 'KU.16.11.03', 'nama' => 'Berkas Penyaluran Biaya Pemilu ke PPK, PPS dan KPPS termasuk diantaranya Bukti Transfer Bank.', 'sifat' => 'B'],

            // Bawah KU.12_2.03
            ['parent_id' => $ku_12_2_3, 'kode' => 'KU.12.03.01', 'nama' => 'LHP (Laporan Hasil Pemeriksaan).', 'sifat' => 'B'],
            ['parent_id' => $ku_12_2_3, 'kode' => 'KU.12.03.02', 'nama' => 'MHP (Memorandum Hasil Pemeriksaan).', 'sifat' => 'B'],
            ['parent_id' => $ku_12_2_3, 'kode' => 'KU.12.03.03', 'nama' => 'Tindak Lanjut/ Tanggapan LHP.', 'sifat' => 'B'],

            // Bawah KU.12_2.04
            ['parent_id' => $ku_12_2_4, 'kode' => 'KU.12.04.01', 'nama' => 'Tuntutan Perbendaharaan.', 'sifat' => 'B'],
            ['parent_id' => $ku_12_2_4, 'kode' => 'KU.12.04.02', 'nama' => 'Tuntutan Ganti Rugi.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN FASILITATIF: AR (Kearsipan)
        // ==============================================================================
        $id_ar = DB::table('klasifikasis')->where('kode', 'AR')->value('id');

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_ar, 'kode' => 'AR.01', 'nama' => 'Kebijakan', 'sifat' => 'B'],
            ['parent_id' => $id_ar, 'kode' => 'AR.02', 'nama' => 'Pembinaan Kearsipan', 'sifat' => 'B'],
            ['parent_id' => $id_ar, 'kode' => 'AR.03', 'nama' => 'Pengelolaan Arsip Dinamis', 'sifat' => 'B'],
            ['parent_id' => $id_ar, 'kode' => 'AR.04', 'nama' => 'Pengelolaan Arsip Statis', 'sifat' => 'B'],
            ['parent_id' => $id_ar, 'kode' => 'AR.05', 'nama' => 'Jasa Kearsipan', 'sifat' => 'B'],
            ['parent_id' => $id_ar, 'kode' => 'AR.07', 'nama' => 'Pembinaan Dan Pengawasan Kearsipan', 'sifat' => 'B'], 
        ]);

        $ar_1 = DB::table('klasifikasis')->where('kode', 'AR.01')->value('id');
        $ar_2 = DB::table('klasifikasis')->where('kode', 'AR.02')->value('id');
        $ar_3 = DB::table('klasifikasis')->where('kode', 'AR.03')->value('id');
        $ar_4 = DB::table('klasifikasis')->where('kode', 'AR.04')->value('id');
        $ar_5 = DB::table('klasifikasis')->where('kode', 'AR.05')->value('id');
        $ar_7 = DB::table('klasifikasis')->where('kode', 'AR.07')->value('id');

        // --- LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah AR.01
            ['parent_id' => $ar_1, 'kode' => 'AR.01.01', 'nama' => 'Peraturan Daerah', 'sifat' => 'B'],
            ['parent_id' => $ar_1, 'kode' => 'AR.01.02', 'nama' => 'Tata Naskah Dinas', 'sifat' => 'B'],
            ['parent_id' => $ar_1, 'kode' => 'AR.01.03', 'nama' => 'Klasifikasi Arsip', 'sifat' => 'B'],
            ['parent_id' => $ar_1, 'kode' => 'AR.01.04', 'nama' => 'Jadwal Retensi Arsip', 'sifat' => 'B'],
            ['parent_id' => $ar_1, 'kode' => 'AR.01.05', 'nama' => 'Sistem Klasifikasi Keamanan dan Akses Arsip Dinamis', 'sifat' => 'B'],
            ['parent_id' => $ar_1, 'kode' => 'AR.01.06', 'nama' => 'Pedoman Pengelolaan Arsip Dinamis', 'sifat' => 'B'],
            ['parent_id' => $ar_1, 'kode' => 'AR.01.07', 'nama' => 'Pedoman Pengelolaan Arsip Statis', 'sifat' => 'B'],
            ['parent_id' => $ar_1, 'kode' => 'AR.01.08', 'nama' => 'Penetapan Organisasi Kearsipan', 'sifat' => 'B'],

            // Bawah AR.02
            ['parent_id' => $ar_2, 'kode' => 'AR.02.01', 'nama' => 'Akreditasi Kearsipan Lembaga Kearsipan, Unit Kearsipan, Lembaga Penyelenggara Kearsipan, dan Diklat Kearsipan', 'sifat' => 'B'],
            ['parent_id' => $ar_2, 'kode' => 'AR.02.02', 'nama' => 'Sertifikasi Arsiparis', 'sifat' => 'B'],
            ['parent_id' => $ar_2, 'kode' => 'AR.02.03', 'nama' => 'Bina Arsiparis', 'sifat' => 'B'],
            ['parent_id' => $ar_2, 'kode' => 'AR.02.04', 'nama' => 'Bimbingan dan Konsultasi', 'sifat' => 'B'],
            ['parent_id' => $ar_2, 'kode' => 'AR.02.05', 'nama' => 'Supervisi Dan Evaluasi', 'sifat' => 'B'],
            ['parent_id' => $ar_2, 'kode' => 'AR.02.06', 'nama' => 'Data Base Bimbingan Dan Konsultasi Dan Supervisi', 'sifat' => 'B'],
            ['parent_id' => $ar_2, 'kode' => 'AR.02.07', 'nama' => 'Fasilitas Kearsipan', 'sifat' => 'B'],
            ['parent_id' => $ar_2, 'kode' => 'AR.02.08', 'nama' => 'Lembaga/Unit Kearsipan Teladan', 'sifat' => 'B'],

            // Bawah AR.03
            ['parent_id' => $ar_3, 'kode' => 'AR.03.01', 'nama' => 'Penciptaan', 'sifat' => 'B'],
            ['parent_id' => $ar_3, 'kode' => 'AR.03.02', 'nama' => 'Penggunaan', 'sifat' => 'B'],
            ['parent_id' => $ar_3, 'kode' => 'AR.03.03', 'nama' => 'Pemeliharaan', 'sifat' => 'B'],
            ['parent_id' => $ar_3, 'kode' => 'AR.03.04', 'nama' => 'Penyimpanan', 'sifat' => 'B'],
            ['parent_id' => $ar_3, 'kode' => 'AR.03.05', 'nama' => 'Alih Media', 'sifat' => 'B'],
            ['parent_id' => $ar_3, 'kode' => 'AR.03.06', 'nama' => 'Program Arsip vital', 'sifat' => 'B'],
            ['parent_id' => $ar_3, 'kode' => 'AR.03.07', 'nama' => 'Autentikasi Arsip Dinamis', 'sifat' => 'B'],
            ['parent_id' => $ar_3, 'kode' => 'AR.03.09', 'nama' => 'Penyusutan', 'sifat' => 'B'], 
            ['parent_id' => $ar_3, 'kode' => 'AR.03.10', 'nama' => 'Data Base Pengelolaan Arsip Dinamis', 'sifat' => 'B'],

            // Bawah AR.04
            ['parent_id' => $ar_4, 'kode' => 'AR.04.01', 'nama' => 'Akuisisi', 'sifat' => 'B'],
            ['parent_id' => $ar_4, 'kode' => 'AR.04.02', 'nama' => 'Sejarah Lisan', 'sifat' => 'B'],
            ['parent_id' => $ar_4, 'kode' => 'AR.04.03', 'nama' => 'Daftar Pencarian Arsip Statis', 'sifat' => 'B'],
            ['parent_id' => $ar_4, 'kode' => 'AR.04.04', 'nama' => 'Penghargaan dan Imbalan.', 'sifat' => 'B'],
            ['parent_id' => $ar_4, 'kode' => 'AR.04.05', 'nama' => 'Pengolahan', 'sifat' => 'B'],
            ['parent_id' => $ar_4, 'kode' => 'AR.04.06', 'nama' => 'Preservasi Preventif', 'sifat' => 'B'],
            ['parent_id' => $ar_4, 'kode' => 'AR.04.07', 'nama' => 'Prefentif Kuratif', 'sifat' => 'B'],
            ['parent_id' => $ar_4, 'kode' => 'AR.04.08', 'nama' => 'Autentikasi Arsip Statis', 'sifat' => 'B'],
            ['parent_id' => $ar_4, 'kode' => 'AR.04.09', 'nama' => 'Akses Arsip Statis', 'sifat' => 'B'],

            // Bawah AR.05
            ['parent_id' => $ar_5, 'kode' => 'AR.05.01', 'nama' => 'Konsultasi Kearsipan.', 'sifat' => 'B'],
            ['parent_id' => $ar_5, 'kode' => 'AR.05.02', 'nama' => 'Manual Kearsipan.', 'sifat' => 'B'],
            ['parent_id' => $ar_5, 'kode' => 'AR.05.03', 'nama' => 'Penataan Arsip.', 'sifat' => 'B'],
            ['parent_id' => $ar_5, 'kode' => 'AR.05.04', 'nama' => 'Otomasi Kearsipan.', 'sifat' => 'B'],
            ['parent_id' => $ar_5, 'kode' => 'AR.05.05', 'nama' => 'Penyimpanan Arsip/Dokumen.', 'sifat' => 'B'],
            ['parent_id' => $ar_5, 'kode' => 'AR.05.06', 'nama' => 'Perawatan Arsip/Dokumen.', 'sifat' => 'B'],
            ['parent_id' => $ar_5, 'kode' => 'AR.05.07', 'nama' => 'Data Base Jasa Kearsipan.', 'sifat' => 'B'],

            // Bawah AR.07
            ['parent_id' => $ar_7, 'kode' => 'AR.07.01', 'nama' => 'Pembinaan Internal', 'sifat' => 'B'],
            ['parent_id' => $ar_7, 'kode' => 'AR.07.02', 'nama' => 'Pembinaan Eksternal', 'sifat' => 'B'],
            ['parent_id' => $ar_7, 'kode' => 'AR.07.03', 'nama' => 'Pengawasan Internal', 'sifat' => 'B'],
            ['parent_id' => $ar_7, 'kode' => 'AR.07.04', 'nama' => 'Pengawasan Eksternal', 'sifat' => 'B'],
        ]);

        $ar_1_1 = DB::table('klasifikasis')->where('kode', 'AR.01.01')->value('id');
        $ar_1_2 = DB::table('klasifikasis')->where('kode', 'AR.01.02')->value('id');
        $ar_1_3 = DB::table('klasifikasis')->where('kode', 'AR.01.03')->value('id');
        $ar_1_4 = DB::table('klasifikasis')->where('kode', 'AR.01.04')->value('id');
        $ar_1_5 = DB::table('klasifikasis')->where('kode', 'AR.01.05')->value('id');
        $ar_1_6 = DB::table('klasifikasis')->where('kode', 'AR.01.06')->value('id');
        $ar_1_7 = DB::table('klasifikasis')->where('kode', 'AR.01.07')->value('id');
        $ar_1_8 = DB::table('klasifikasis')->where('kode', 'AR.01.08')->value('id');

        $ar_2_1 = DB::table('klasifikasis')->where('kode', 'AR.02.01')->value('id');
        $ar_2_2 = DB::table('klasifikasis')->where('kode', 'AR.02.02')->value('id');
        $ar_2_3 = DB::table('klasifikasis')->where('kode', 'AR.02.03')->value('id');
        $ar_2_4 = DB::table('klasifikasis')->where('kode', 'AR.02.04')->value('id');
        $ar_2_5 = DB::table('klasifikasis')->where('kode', 'AR.02.05')->value('id');
        $ar_2_7 = DB::table('klasifikasis')->where('kode', 'AR.02.07')->value('id');
        $ar_2_8 = DB::table('klasifikasis')->where('kode', 'AR.02.08')->value('id');

        $ar_3_1 = DB::table('klasifikasis')->where('kode', 'AR.03.01')->value('id');
        $ar_3_2 = DB::table('klasifikasis')->where('kode', 'AR.03.02')->value('id');
        $ar_3_3 = DB::table('klasifikasis')->where('kode', 'AR.03.03')->value('id');
        $ar_3_4 = DB::table('klasifikasis')->where('kode', 'AR.03.04')->value('id');
        $ar_3_5 = DB::table('klasifikasis')->where('kode', 'AR.03.05')->value('id');
        $ar_3_6 = DB::table('klasifikasis')->where('kode', 'AR.03.06')->value('id');
        $ar_3_7 = DB::table('klasifikasis')->where('kode', 'AR.03.07')->value('id');
        $ar_3_9 = DB::table('klasifikasis')->where('kode', 'AR.03.09')->value('id');
        $ar_3_10 = DB::table('klasifikasis')->where('kode', 'AR.03.10')->value('id');

        $ar_4_1 = DB::table('klasifikasis')->where('kode', 'AR.04.01')->value('id');
        $ar_4_2 = DB::table('klasifikasis')->where('kode', 'AR.04.02')->value('id');
        $ar_4_3 = DB::table('klasifikasis')->where('kode', 'AR.04.03')->value('id');
        $ar_4_5 = DB::table('klasifikasis')->where('kode', 'AR.04.05')->value('id');
        $ar_4_6 = DB::table('klasifikasis')->where('kode', 'AR.04.06')->value('id');
        $ar_4_7 = DB::table('klasifikasis')->where('kode', 'AR.04.07')->value('id');
        $ar_4_8 = DB::table('klasifikasis')->where('kode', 'AR.04.08')->value('id');
        $ar_4_9 = DB::table('klasifikasis')->where('kode', 'AR.04.09')->value('id');

        $ar_7_1 = DB::table('klasifikasis')->where('kode', 'AR.07.01')->value('id');
        $ar_7_2 = DB::table('klasifikasis')->where('kode', 'AR.07.02')->value('id');
        $ar_7_3 = DB::table('klasifikasis')->where('kode', 'AR.07.03')->value('id');
        $ar_7_4 = DB::table('klasifikasis')->where('kode', 'AR.07.04')->value('id');

        // --- LEVEL CICIT (Level 4) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah AR.01.01
            ['parent_id' => $ar_1_1, 'kode' => 'AR.01.01.01', 'nama' => 'Pengkajian dan Pengusulan.', 'sifat' => 'B'],
            ['parent_id' => $ar_1_1, 'kode' => 'AR.01.01.02', 'nama' => 'Penyusunan Raperda.', 'sifat' => 'B'],
            ['parent_id' => $ar_1_1, 'kode' => 'AR.01.01.03', 'nama' => 'Pembahasan Raperda dan Persetujuan Raperda.', 'sifat' => 'B'],
            ['parent_id' => $ar_1_1, 'kode' => 'AR.01.01.04', 'nama' => 'Penetapan Perda.', 'sifat' => 'B'],
            ['parent_id' => $ar_1_1, 'kode' => 'AR.01.01.05', 'nama' => 'Sosialisasi Perda.', 'sifat' => 'B'],
            // Bawah AR.01.02
            ['parent_id' => $ar_1_2, 'kode' => 'AR.01.02.01', 'nama' => 'Pengkajian dan pembahasan Rapergub.', 'sifat' => 'B'],
            ['parent_id' => $ar_1_2, 'kode' => 'AR.01.02.02', 'nama' => 'Pengusulan dan Penetapan Pergub.', 'sifat' => 'B'],
            ['parent_id' => $ar_1_2, 'kode' => 'AR.01.02.03', 'nama' => 'Sosialisasi Pergub.', 'sifat' => 'B'],
            // Bawah AR.01.03
            ['parent_id' => $ar_1_3, 'kode' => 'AR.01.03.01', 'nama' => 'Pengkajian dan pembahasan Rapergub.', 'sifat' => 'B'],
            ['parent_id' => $ar_1_3, 'kode' => 'AR.01.03.02', 'nama' => 'Pengusulan dan Penetapan Pergub.', 'sifat' => 'B'],
            ['parent_id' => $ar_1_3, 'kode' => 'AR.01.03.03', 'nama' => 'Sosialisasi Pergub tentang Tata Naskah Dinas.', 'sifat' => 'B'],
            // Bawah AR.01.04
            ['parent_id' => $ar_1_4, 'kode' => 'AR.01.04.01', 'nama' => 'Pengkajian dan pembahasan Rapergub.', 'sifat' => 'B'],
            ['parent_id' => $ar_1_4, 'kode' => 'AR.01.04.02', 'nama' => 'Pengusulan dan Penetapan Pergub.', 'sifat' => 'B'],
            ['parent_id' => $ar_1_4, 'kode' => 'AR.01.04.03', 'nama' => 'Sosialisasi Pergub.', 'sifat' => 'B'],
            // Bawah AR.01.05
            ['parent_id' => $ar_1_5, 'kode' => 'AR.01.05.01', 'nama' => 'Pengkajian dan pembahasan Rapergub.', 'sifat' => 'B'],
            ['parent_id' => $ar_1_5, 'kode' => 'AR.01.05.02', 'nama' => 'Pengusulan dan Penetapan Pergub.', 'sifat' => 'B'],
            ['parent_id' => $ar_1_5, 'kode' => 'AR.01.05.03', 'nama' => 'Sosialisasi Pergub tentang Sistem Kalsifikasi Keamanan dan Akses Arsip Dinamis.', 'sifat' => 'B'],
            // Bawah AR.01.06
            ['parent_id' => $ar_1_6, 'kode' => 'AR.01.06.01', 'nama' => 'Pengkajian dan pembahasan Rapergub.', 'sifat' => 'B'],
            ['parent_id' => $ar_1_6, 'kode' => 'AR.01.06.02', 'nama' => 'Pengusulan dan Penetapan Pergub.', 'sifat' => 'B'],
            ['parent_id' => $ar_1_6, 'kode' => 'AR.01.06.03', 'nama' => 'Sosialisasi Pergub tentang Pedoman Pengelolaan Arsip Dinamis.', 'sifat' => 'B'],
            // Bawah AR.01.07
            ['parent_id' => $ar_1_7, 'kode' => 'AR.01.07.01', 'nama' => 'Pengkajian dan pembahasan Rapergub.', 'sifat' => 'B'],
            ['parent_id' => $ar_1_7, 'kode' => 'AR.01.07.02', 'nama' => 'Pengusulan dan Penetapan Pergub.', 'sifat' => 'B'],
            ['parent_id' => $ar_1_7, 'kode' => 'AR.01.07.03', 'nama' => 'Sosialisasi Pergub tentang Pedoman Pengelolaan Arsip Statis.', 'sifat' => 'B'],
            // Bawah AR.01.08
            ['parent_id' => $ar_1_8, 'kode' => 'AR.01.08.01', 'nama' => 'Unit Pengolah.', 'sifat' => 'B'],
            ['parent_id' => $ar_1_8, 'kode' => 'AR.01.08.02', 'nama' => 'Unit Kearsipan Perangkat Daerah.', 'sifat' => 'B'],
            ['parent_id' => $ar_1_8, 'kode' => 'AR.01.08.03', 'nama' => 'Unit Kearsipan Pemerintah Daerah.', 'sifat' => 'B'],

            // Bawah AR.02.01
            ['parent_id' => $ar_2_1, 'kode' => 'AR.02.01.01', 'nama' => 'Proses Akreditasi.', 'sifat' => 'B'],
            ['parent_id' => $ar_2_1, 'kode' => 'AR.02.01.02', 'nama' => 'Berkas Penetapan Sertifikasi Akreditasi.', 'sifat' => 'B'],
            ['parent_id' => $ar_2_1, 'kode' => 'AR.02.01.03', 'nama' => 'Data Base Akreditasi.', 'sifat' => 'B'],
            // Bawah AR.02.02
            ['parent_id' => $ar_2_2, 'kode' => 'AR.02.02.01', 'nama' => 'Proses Sertifikasi Arsiparis.', 'sifat' => 'B'],
            ['parent_id' => $ar_2_2, 'kode' => 'AR.02.02.02', 'nama' => 'Berkas Penetapan Sertifikasi Arsiparis.', 'sifat' => 'B'],
            ['parent_id' => $ar_2_2, 'kode' => 'AR.02.02.03', 'nama' => 'Data Base Sertifikasi Arsiparis.', 'sifat' => 'B'],
            // Bawah AR.02.03
            ['parent_id' => $ar_2_3, 'kode' => 'AR.02.03.01', 'nama' => 'Formasi Jabatan Arsiparis.', 'sifat' => 'B'],
            ['parent_id' => $ar_2_3, 'kode' => 'AR.02.03.02', 'nama' => 'Standar Kompetensi Arsiparis.', 'sifat' => 'B'],
            ['parent_id' => $ar_2_3, 'kode' => 'AR.02.03.03', 'nama' => 'Bimbingan Konsultasi Arsiparis.', 'sifat' => 'B'],
            ['parent_id' => $ar_2_3, 'kode' => 'AR.02.03.04', 'nama' => 'Penilaian Arsiparis.', 'sifat' => 'B'],
            ['parent_id' => $ar_2_3, 'kode' => 'AR.02.03.05', 'nama' => 'Penyelenggaraan Pemilihan Arsiparis Teladan.', 'sifat' => 'B'],
            ['parent_id' => $ar_2_3, 'kode' => 'AR.02.03.06', 'nama' => 'Berkas Penetapan Arsiparis Teladan.', 'sifat' => 'B'],
            ['parent_id' => $ar_2_3, 'kode' => 'AR.02.03.07', 'nama' => 'Data Base Arsiparis.', 'sifat' => 'B'],
            // Bawah AR.02.04
            ['parent_id' => $ar_2_4, 'kode' => 'AR.02.04.01', 'nama' => 'Penerapan Sistem (Klasifikasi Arsip, Tata Naskah Dinas, Klasifikasi Akses Keamanan.', 'sifat' => 'B'],
            ['parent_id' => $ar_2_4, 'kode' => 'AR.02.04.02', 'nama' => 'Penggunaan Sarana dan Prasarana Kearsipan.', 'sifat' => 'B'],
            ['parent_id' => $ar_2_4, 'kode' => 'AR.02.04.03', 'nama' => 'Unit Kearsipan.', 'sifat' => 'B'],
            ['parent_id' => $ar_2_4, 'kode' => 'AR.02.04.04', 'nama' => 'Sumberdaya Manusia.', 'sifat' => 'B'],
            // Bawah AR.02.05
            ['parent_id' => $ar_2_5, 'kode' => 'AR.02.05.01', 'nama' => 'Perencanaan.', 'sifat' => 'B'],
            ['parent_id' => $ar_2_5, 'kode' => 'AR.02.05.02', 'nama' => 'Pelaksanaan.', 'sifat' => 'B'],
            ['parent_id' => $ar_2_5, 'kode' => 'AR.02.05.03', 'nama' => 'Laporan hasil supervisi dan Evaluasi.', 'sifat' => 'B'],
            // Bawah AR.02.07
            ['parent_id' => $ar_2_7, 'kode' => 'AR.02.07.01', 'nama' => 'SDM Kearsipan.', 'sifat' => 'B'],
            ['parent_id' => $ar_2_7, 'kode' => 'AR.02.07.02', 'nama' => 'Prasarana dan Sarana.', 'sifat' => 'B'],
            // Bawah AR.02.08
            ['parent_id' => $ar_2_8, 'kode' => 'AR.02.08.01', 'nama' => 'Penyelenggaraan.', 'sifat' => 'B'],
            ['parent_id' => $ar_2_8, 'kode' => 'AR.02.08.02', 'nama' => 'Berkas Penetapan Lembaga/Unit Kearsipan Teladan.', 'sifat' => 'B'],

            // Bawah AR.03.01
            ['parent_id' => $ar_3_1, 'kode' => 'AR.03.01.01', 'nama' => 'Pencatatan ( Buku Agenda, Kartu Kendali dan Lembar Pengantar/Ekspedisi).', 'sifat' => 'B'],
            ['parent_id' => $ar_3_1, 'kode' => 'AR.03.01.02', 'nama' => 'Pendistribusian.', 'sifat' => 'B'],
            // Bawah AR.03.02
            ['parent_id' => $ar_3_2, 'kode' => 'AR.03.02.01', 'nama' => 'Pengklasifikasian Pengamanan dan Akses Arsip.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_2, 'kode' => 'AR.03.02.02', 'nama' => 'Peminjaman.', 'sifat' => 'B'],
            // Bawah AR.03.03
            ['parent_id' => $ar_3_3, 'kode' => 'AR.03.03.01', 'nama' => 'Pemberkasan : Daftar arsip aktif (daftar berkas dan isi berkas).', 'sifat' => 'B'],
            ['parent_id' => $ar_3_3, 'kode' => 'AR.03.03.02', 'nama' => 'Penataan Arsip Inaktif : Pengaturan Fisik, Pengolahan Informasi Arsip, Penyusunan daftar arsip inaktif.', 'sifat' => 'B'],
            // Bawah AR.03.04
            ['parent_id' => $ar_3_4, 'kode' => 'AR.03.04.01', 'nama' => 'Skema penyimpanan arsip aktif dan in aktif.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_4, 'kode' => 'AR.03.04.02', 'nama' => 'Pengamanan.', 'sifat' => 'B'],
            // Bawah AR.03.05
            ['parent_id' => $ar_3_5, 'kode' => 'AR.03.05.01', 'nama' => 'Kebijakan alih media.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_5, 'kode' => 'AR.03.05.02', 'nama' => 'Autentikasi.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_5, 'kode' => 'AR.03.05.03', 'nama' => 'Berita acara.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_5, 'kode' => 'AR.03.05.04', 'nama' => 'Daftar arsip yang alih mediakan.', 'sifat' => 'B'],
            // Bawah AR.03.06
            ['parent_id' => $ar_3_6, 'kode' => 'AR.03.06.01', 'nama' => 'Identifikasi.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_6, 'kode' => 'AR.03.06.02', 'nama' => 'Pelindungan dan pengamanan.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_6, 'kode' => 'AR.03.06.03', 'nama' => 'Penyelamatan dan pemulihan.', 'sifat' => 'B'],
            // Bawah AR.03.07
            ['parent_id' => $ar_3_7, 'kode' => 'AR.03.07.01', 'nama' => 'Pembuktian Autentisitas.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_7, 'kode' => 'AR.03.07.02', 'nama' => 'Pendapat tenaga ahli.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_7, 'kode' => 'AR.03.07.03', 'nama' => 'Pengujian.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_7, 'kode' => 'AR.03.07.04', 'nama' => 'Penetapan autentisitas arsip statis/surat pernyataan Pencipta Arsip.', 'sifat' => 'B'],
            // Bawah AR.03.09
            ['parent_id' => $ar_3_9, 'kode' => 'AR.03.09.01', 'nama' => 'Pemindahan Arsip Inaktif (Berita Acara dan Daftar Arsip Yang Dipindahkan).', 'sifat' => 'B'],
            ['parent_id' => $ar_3_9, 'kode' => 'AR.03.09.02', 'nama' => 'Pemusnahan arsip yang tidak bernilai guna', 'sifat' => 'B'],
            ['parent_id' => $ar_3_9, 'kode' => 'AR.03.09.03', 'nama' => 'Penyerahan arsip statis', 'sifat' => 'B'],
            // Bawah AR.03.10
            ['parent_id' => $ar_3_10, 'kode' => 'AR.03.10.01', 'nama' => 'Data Base Pengelolaan Arsip Aktif.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_10, 'kode' => 'AR.03.10.02', 'nama' => 'Data Base Pengelolaan Arsip Inaktif.', 'sifat' => 'B'],

            // Bawah AR.04.01
            ['parent_id' => $ar_4_1, 'kode' => 'AR.04.01.01', 'nama' => 'Monitoring fisik dan daftar.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_1, 'kode' => 'AR.04.01.02', 'nama' => 'Verifikasi terhadap daftar arsip.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_1, 'kode' => 'AR.04.01.03', 'nama' => 'Menetapkan status arsip statis.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_1, 'kode' => 'AR.04.01.04', 'nama' => 'Persetujuan untuk Penyerahan.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_1, 'kode' => 'AR.04.01.05', 'nama' => 'Penetapan arsip yang diserahkan.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_1, 'kode' => 'AR.04.01.06', 'nama' => 'Berita Acara Penyerahan Arsip.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_1, 'kode' => 'AR.04.01.07', 'nama' => 'Daftar arsip yang diserahkan.', 'sifat' => 'B'],
            // Bawah AR.04.02
            ['parent_id' => $ar_4_2, 'kode' => 'AR.04.02.01', 'nama' => 'Administrasi Pelaksanaan Sejarah Lisan.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_2, 'kode' => 'AR.04.02.02', 'nama' => 'Hasil Wawancara Sejarah Lisan', 'sifat' => 'B'],
            // Bawah AR.04.03
            ['parent_id' => $ar_4_3, 'kode' => 'AR.04.03.01', 'nama' => 'Pengumuman.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_3, 'kode' => 'AR.04.03.02', 'nama' => 'Akuisisi daftar pencarian arsip statis.', 'sifat' => 'B'],
            // Bawah AR.04.05
            ['parent_id' => $ar_4_5, 'kode' => 'AR.04.05.01', 'nama' => 'Menata Informasi.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_5, 'kode' => 'AR.04.05.02', 'nama' => 'Menata Fisik.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_5, 'kode' => 'AR.04.05.03', 'nama' => 'Menyusun Sarana Bantu Temu Balik :Daftar Arsip Statis, Inventaris Arsip Statis dan Guide.', 'sifat' => 'B'],
            // Bawah AR.04.06
            ['parent_id' => $ar_4_6, 'kode' => 'AR.04.06.01', 'nama' => 'Penyimpanan.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_6, 'kode' => 'AR.04.06.02', 'nama' => 'Pengendalian hama terpadu.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_6, 'kode' => 'AR.04.06.03', 'nama' => 'Reproduksi (Alih Media) : Berita Acara Alih Media dan Daftar Arsip yang dialihmediakan.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_6, 'kode' => 'AR.04.06.04', 'nama' => 'Perencanaan dan Penanggulangan Bencana.', 'sifat' => 'B'],
            // Bawah AR.04.07
            ['parent_id' => $ar_4_7, 'kode' => 'AR.04.07.01', 'nama' => 'Perawatan Arsip.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_7, 'kode' => 'AR.04.07.02', 'nama' => 'Laporan hasil Pengujian Mutu Preservasi.', 'sifat' => 'B'],
            // Bawah AR.04.08
            ['parent_id' => $ar_4_8, 'kode' => 'AR.04.08.01', 'nama' => 'Pembuktian Autentisitas.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_8, 'kode' => 'AR.04.08.02', 'nama' => 'Pendapat tenaga ahli.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_8, 'kode' => 'AR.04.08.03', 'nama' => 'Pengujian.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_8, 'kode' => 'AR.04.08.04', 'nama' => 'Penetapan autentisitas arsip statis/surat pernyataan.', 'sifat' => 'B'],
            // Bawah AR.04.09
            ['parent_id' => $ar_4_9, 'kode' => 'AR.04.09.01', 'nama' => 'Layanan Arsip.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_9, 'kode' => 'AR.04.09.02', 'nama' => 'Administrasi dan proses penyusunan Penerbitan Naskah Sumber.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_9, 'kode' => 'AR.04.09.03', 'nama' => 'hasil naskah sumber arsip.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_9, 'kode' => 'AR.04.09.03', 'nama' => 'Pameran arsip.', 'sifat' => 'B'], 

            // Bawah AR.07.01
            ['parent_id' => $ar_7_1, 'kode' => 'AR.07.01.01', 'nama' => 'Kegiatan pembinaan terhadap Perangkat Daerah.', 'sifat' => 'B'],
            ['parent_id' => $ar_7_1, 'kode' => 'AR.07.01.02', 'nama' => 'Laporan hasil Pembinaan terhadap Perangkat Daerah.', 'sifat' => 'B'],
            // Bawah AR.07.02
            ['parent_id' => $ar_7_2, 'kode' => 'AR.07.02.01', 'nama' => 'Kegiatan pembinaan terhadap LKD Kabupaten/Kota, BUMD, Orpol, Ormas, Swasta dan Masyarakat.', 'sifat' => 'B'],
            ['parent_id' => $ar_7_2, 'kode' => 'AR.07.02.02', 'nama' => 'Laporan Hasil Pembinaan Eksternal.', 'sifat' => 'B'],
            // Bawah AR.07.03
            ['parent_id' => $ar_7_3, 'kode' => 'AR.07.03.01', 'nama' => 'Kegiatan pengawasan terhadap Perangkat Daerah.', 'sifat' => 'B'],
            ['parent_id' => $ar_7_3, 'kode' => 'AR.07.03.02', 'nama' => 'Laporan Audit Kearsipan Internal terhadap Perangkat Daerah.', 'sifat' => 'B'],
            // Bawah AR.07.04
            ['parent_id' => $ar_7_4, 'kode' => 'AR.07.04.01', 'nama' => 'Kegiatan pengawasan Kearsipan Eksternal terhadap LKD Kabupaten/Kota, BUMD, Orpol, Ormas, Swasta dan Masyarakat.', 'sifat' => 'B'],
            ['parent_id' => $ar_7_4, 'kode' => 'AR.07.04.02', 'nama' => 'Laporan Hasil Audit Kearsipan Eksternal.', 'sifat' => 'B'],
        ]);

        // Mengambil ID untuk memasukkan Level 5 (Anak dari Strip "-")
        $ar_3_9_2 = DB::table('klasifikasis')->where('kode', 'AR.03.09.02')->value('id');
        $ar_3_9_3 = DB::table('klasifikasis')->where('kode', 'AR.03.09.03')->where('nama', 'Penyerahan arsip statis')->value('id');
        $ar_4_2_2 = DB::table('klasifikasis')->where('kode', 'AR.04.02.02')->value('id');

        // --- LEVEL CICIT KE-2 / LEVEL 5 ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Anak dari AR.03.09.02 (Pemusnahan arsip)
            ['parent_id' => $ar_3_9_2, 'kode' => 'AR.03.09.02.01', 'nama' => 'Panitia penilai.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_9_2, 'kode' => 'AR.03.09.02.02', 'nama' => 'Penilaian panitia penilai.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_9_2, 'kode' => 'AR.03.09.02.03', 'nama' => 'Permintaan persetujuan (Kepala ANRI, Kepala Lembaga Kearsipan).', 'sifat' => 'B'],
            ['parent_id' => $ar_3_9_2, 'kode' => 'AR.03.09.02.04', 'nama' => 'Penetapan arsip yang dimusnahkan.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_9_2, 'kode' => 'AR.03.09.02.05', 'nama' => 'Berita Acara Pemusnahan Arsip.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_9_2, 'kode' => 'AR.03.09.02.06', 'nama' => 'Daftar arsip yang dimusnahkan.', 'sifat' => 'B'],

            // Anak dari AR.03.09.03 (Penyerahan arsip statis)
            ['parent_id' => $ar_3_9_3, 'kode' => 'AR.03.09.03.01', 'nama' => 'Pembentukan Panitia Penilai.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_9_3, 'kode' => 'AR.03.09.03.02', 'nama' => 'Notulen Rapat Panitia.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_9_3, 'kode' => 'AR.03.09.03.03', 'nama' => 'Surat pertimbangan Panitia Penilai.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_9_3, 'kode' => 'AR.03.09.03.04', 'nama' => 'Surat persetujuan dari Kepala Lembaga Kearsipan.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_9_3, 'kode' => 'AR.03.09.03.05', 'nama' => 'Surat pernyataan autentik, terpercaya, utuh, dan dapat digunakan dari pencipta arsip.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_9_3, 'kode' => 'AR.03.09.03.06', 'nama' => 'Keputusan Penetapan Penyerahan.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_9_3, 'kode' => 'AR.03.09.03.07', 'nama' => 'Berita Acara Penyerahan Arsip.', 'sifat' => 'B'],
            ['parent_id' => $ar_3_9_3, 'kode' => 'AR.03.09.03.08', 'nama' => 'Daftar arsip yang diserahkan.', 'sifat' => 'B'],

            // Anak dari AR.04.02.02 (Hasil Wawancara Sejarah Lisan)
            ['parent_id' => $ar_4_2_2, 'kode' => 'AR.04.02.02.01', 'nama' => 'Berita Acara wawancara Sejarah Lisan.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_2_2, 'kode' => 'AR.04.02.02.02', 'nama' => 'Laporan Kegiatan.', 'sifat' => 'B'],
            ['parent_id' => $ar_4_2_2, 'kode' => 'AR.04.02.02.03', 'nama' => 'Hasil Wawancara (Kaset atau CD) dan transkrip.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN FASILITATIF: ST (Statistik)
        // ==============================================================================
        $id_st = DB::table('klasifikasis')->where('kode', 'ST')->value('id');

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_st, 'kode' => 'ST.01', 'nama' => 'Sensus Penduduk, Pertanian, dan Ekonomi:', 'sifat' => 'B'],
            ['parent_id' => $id_st, 'kode' => 'ST.02', 'nama' => 'Survei:', 'sifat' => 'B'],
            ['parent_id' => $id_st, 'kode' => 'ST.03', 'nama' => 'Konsolidasi Data Statistik:', 'sifat' => 'B'],
            ['parent_id' => $id_st, 'kode' => 'ST.04', 'nama' => 'Evaluasi dan Pelaporan Sensus, Survei dan Konsolidasi data statistik.', 'sifat' => 'B'],
        ]);

        $st_1 = DB::table('klasifikasis')->where('kode', 'ST.01')->value('id');
        $st_2 = DB::table('klasifikasis')->where('kode', 'ST.02')->value('id');
        $st_3 = DB::table('klasifikasis')->where('kode', 'ST.03')->value('id');

        // --- LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah ST.01 (Sensus)
            ['parent_id' => $st_1, 'kode' => 'ST.01.01', 'nama' => 'Perencanaan:', 'sifat' => 'B'],
            ['parent_id' => $st_1, 'kode' => 'ST.01.02', 'nama' => 'Persiapan:', 'sifat' => 'B'],
            ['parent_id' => $st_1, 'kode' => 'ST.01.03', 'nama' => 'Pelaksanaan Lapangan:', 'sifat' => 'B'],
            ['parent_id' => $st_1, 'kode' => 'ST.01.04', 'nama' => 'Pengolahan:', 'sifat' => 'B'],
            ['parent_id' => $st_1, 'kode' => 'ST.01.05', 'nama' => 'Analisis dan Penyajian Hasil Sensus:', 'sifat' => 'B'],
            ['parent_id' => $st_1, 'kode' => 'ST.01.06', 'nama' => 'Diseminasi hasil sensus:', 'sifat' => 'B'],

            // Bawah ST.02 (Survei)
            ['parent_id' => $st_2, 'kode' => 'ST.02.01', 'nama' => 'Perencanaan:', 'sifat' => 'B'],
            ['parent_id' => $st_2, 'kode' => 'ST.02.02', 'nama' => 'Persiapan:', 'sifat' => 'B'],
            ['parent_id' => $st_2, 'kode' => 'ST.02.03', 'nama' => 'Pelaksanaan Lapangan:', 'sifat' => 'B'],
            ['parent_id' => $st_2, 'kode' => 'ST.02.04', 'nama' => 'Pengolahan:', 'sifat' => 'B'],
            ['parent_id' => $st_2, 'kode' => 'ST.02.05', 'nama' => 'Analisis dan Penyajian Hasil Survei:', 'sifat' => 'B'],
            ['parent_id' => $st_2, 'kode' => 'ST.02.06', 'nama' => 'Diseminasi hasil survey:', 'sifat' => 'B'],

            // Bawah ST.03 (Konsolidasi Data Statistik)
            ['parent_id' => $st_3, 'kode' => 'ST.03.01', 'nama' => 'Kompilasi Data.', 'sifat' => 'B'],
            ['parent_id' => $st_3, 'kode' => 'ST.03.02', 'nama' => 'Analisis data.', 'sifat' => 'B'],
            ['parent_id' => $st_3, 'kode' => 'ST.03.03', 'nama' => 'Penyusunan Publikasi.', 'sifat' => 'B'],
        ]);

        $st_1_1 = DB::table('klasifikasis')->where('kode', 'ST.01.01')->value('id');
        $st_1_2 = DB::table('klasifikasis')->where('kode', 'ST.01.02')->value('id');
        $st_1_3 = DB::table('klasifikasis')->where('kode', 'ST.01.03')->value('id');
        $st_1_4 = DB::table('klasifikasis')->where('kode', 'ST.01.04')->value('id');
        $st_1_5 = DB::table('klasifikasis')->where('kode', 'ST.01.05')->value('id');
        $st_1_6 = DB::table('klasifikasis')->where('kode', 'ST.01.06')->value('id');

        $st_2_1 = DB::table('klasifikasis')->where('kode', 'ST.02.01')->value('id');
        $st_2_2 = DB::table('klasifikasis')->where('kode', 'ST.02.02')->value('id');
        $st_2_3 = DB::table('klasifikasis')->where('kode', 'ST.02.03')->value('id');
        $st_2_4 = DB::table('klasifikasis')->where('kode', 'ST.02.04')->value('id');
        $st_2_5 = DB::table('klasifikasis')->where('kode', 'ST.02.05')->value('id');
        $st_2_6 = DB::table('klasifikasis')->where('kode', 'ST.02.06')->value('id');

        // --- LEVEL CICIT (Level 4) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah ST.01.01
            ['parent_id' => $st_1_1, 'kode' => 'ST.01.01.01', 'nama' => 'Master Plan dan Network planning.', 'sifat' => 'B'],
            ['parent_id' => $st_1_1, 'kode' => 'ST.01.01.02', 'nama' => 'Penyiapan bahan penyusunan rancangan sensus.', 'sifat' => 'B'],
            ['parent_id' => $st_1_1, 'kode' => 'ST.01.01.03', 'nama' => 'Penyusunan metode pencacahan sensus.', 'sifat' => 'B'],
            ['parent_id' => $st_1_1, 'kode' => 'ST.01.01.04', 'nama' => 'Penentuan volume sensus.', 'sifat' => 'B'],
            ['parent_id' => $st_1_1, 'kode' => 'ST.01.01.05', 'nama' => 'Penyusunan desain penarikan sampel.', 'sifat' => 'B'],
            ['parent_id' => $st_1_1, 'kode' => 'ST.01.01.06', 'nama' => 'Penyusunan kerangka sampel.', 'sifat' => 'B'],
            ['parent_id' => $st_1_1, 'kode' => 'ST.01.01.07', 'nama' => 'Studi pendahuluan (desk study).', 'sifat' => 'B'],

            // Bawah ST.01.02
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.01', 'nama' => 'Penyusunan rancangan organisasi kegiatan sensus.', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.02', 'nama' => 'Penyusunan Kuesioner.', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.03', 'nama' => 'Penyusunan konsep dan definisi.', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.04', 'nama' => 'Inventarisasi, penyusunan dan pengembangan ukuran-ukuran yang digunakan dalam sensus.', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.05', 'nama' => 'Inventarisasi, penyusunan dan pengembangan lapangan usaha, jabatan, komoditas, perdesaan, perkotaan.', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.06', 'nama' => 'Penyusunan daftar nama dan kode pembagian wilayah administrasi.', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.07', 'nama' => 'Penyusunan buku pedoman pencacahan.', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.08', 'nama' => 'Penyusunan buku pedoman pengawasan.', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.09', 'nama' => 'Penyusunan buku pedoman pengolahan.', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.10', 'nama' => 'Penyusunan peta wilayah kerja dan muatan peta wilayah.', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.11', 'nama' => 'Penyusunan pedoman sosialisasi.', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.12', 'nama' => 'Sosialisasi kegiatan kepada stakeholder dan sumber data (leaflet, poster, pertemuan).', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.13', 'nama' => 'Pelaksanaan pertemuan koordinasi (intern dan eksterm).', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.14', 'nama' => 'Pelaksanaan pelatihan instruktur (TOT).', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.15', 'nama' => 'Pelaksanaan pelatihan petugas.', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.16', 'nama' => 'Penyusunan program pengolahan (rule validasi, pemeriksaan data entri, tabulasi).', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.17', 'nama' => 'Pelatihan petugas pengolahan.', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.18', 'nama' => 'Perancangan tabel.', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.19', 'nama' => 'Pelaksanaan Ujicoba kuesioner sensus (meliputi reliabilitas kuesioner dan sistem pengolahan).', 'sifat' => 'B'],
            ['parent_id' => $st_1_2, 'kode' => 'ST.01.02.20', 'nama' => 'Pelaksanaan Ujicoba metodologi sensus (meliputi ujicoba pelaksanaan pencacahan, organisasi lapangan dan jumlah sampel).', 'sifat' => 'B'],

            // Bawah ST.01.03
            ['parent_id' => $st_1_3, 'kode' => 'ST.01.03.01', 'nama' => 'Pelaksanaan listing.', 'sifat' => 'B'],
            ['parent_id' => $st_1_3, 'kode' => 'ST.01.03.02', 'nama' => 'Pemilihan sampel.', 'sifat' => 'B'],
            ['parent_id' => $st_1_3, 'kode' => 'ST.01.03.03', 'nama' => 'Pengumpulan data.', 'sifat' => 'B'],
            ['parent_id' => $st_1_3, 'kode' => 'ST.01.03.04', 'nama' => 'Pemeriksaan.', 'sifat' => 'B'],
            ['parent_id' => $st_1_3, 'kode' => 'ST.01.03.05', 'nama' => 'Pengawasan Lapangan.', 'sifat' => 'B'],
            ['parent_id' => $st_1_3, 'kode' => 'ST.01.03.06', 'nama' => 'Monitoring kualitas.', 'sifat' => 'B'],

            // Bawah ST.01.04
            ['parent_id' => $st_1_4, 'kode' => 'ST.01.04.01', 'nama' => 'Pengelolaan dokumen (penerimaan/pengiriman, pengelompokkan/Batching).', 'sifat' => 'B'],
            ['parent_id' => $st_1_4, 'kode' => 'ST.01.04.02', 'nama' => 'Pemeriksaan dokumen dan pengkodean (Editing/ Coding).', 'sifat' => 'B'],
            ['parent_id' => $st_1_4, 'kode' => 'ST.01.04.03', 'nama' => 'Perekaman data (entri, scanner).', 'sifat' => 'B'],
            ['parent_id' => $st_1_4, 'kode' => 'ST.01.04.04', 'nama' => 'Tabulasi Data.', 'sifat' => 'B'],
            ['parent_id' => $st_1_4, 'kode' => 'ST.01.04.05', 'nama' => 'Pemeriksaan tabulasi.', 'sifat' => 'B'],
            ['parent_id' => $st_1_4, 'kode' => 'ST.01.04.06', 'nama' => 'Laporan konsistensi tabulasi.', 'sifat' => 'B'],

            // Bawah ST.01.05
            ['parent_id' => $st_1_5, 'kode' => 'ST.01.05.01', 'nama' => 'Pembahasan angka hasil pengolahan.', 'sifat' => 'B'],
            ['parent_id' => $st_1_5, 'kode' => 'ST.01.05.02', 'nama' => 'Penyusunan angka sementara.', 'sifat' => 'B'],
            ['parent_id' => $st_1_5, 'kode' => 'ST.01.05.03', 'nama' => 'Penyusunan angka tetap.', 'sifat' => 'B'],
            ['parent_id' => $st_1_5, 'kode' => 'ST.01.05.04', 'nama' => 'Penyusunan/pembahasan draft publikasi.', 'sifat' => 'B'],
            ['parent_id' => $st_1_5, 'kode' => 'ST.01.05.05', 'nama' => 'Analisis data.', 'sifat' => 'B'],
            ['parent_id' => $st_1_5, 'kode' => 'ST.01.05.06', 'nama' => 'Penyusunan publikasi hasil sensus.', 'sifat' => 'B'],

            // Bawah ST.01.06
            ['parent_id' => $st_1_6, 'kode' => 'ST.01.06.01', 'nama' => 'Penyusunan bahan diseminasi berupa leaflet, booklet.', 'sifat' => 'B'],
            ['parent_id' => $st_1_6, 'kode' => 'ST.01.06.02', 'nama' => 'Penyusunan bahan diseminasi berupa website.', 'sifat' => 'B'],
            ['parent_id' => $st_1_6, 'kode' => 'ST.01.06.03', 'nama' => 'Penyusunan bahan diseminasi berupa penyusunan CD dan sejenisnya.', 'sifat' => 'B'],
            ['parent_id' => $st_1_6, 'kode' => 'ST.01.06.04', 'nama' => 'Sosialisasi hasil sensus melalui berbagai media.', 'sifat' => 'B'],
            ['parent_id' => $st_1_6, 'kode' => 'ST.01.06.05', 'nama' => 'Layanan dan promosi statistik.', 'sifat' => 'B'],

            // Bawah ST.02.01
            ['parent_id' => $st_2_1, 'kode' => 'ST.02.01.01', 'nama' => 'Master Plan dan Network planning.', 'sifat' => 'B'],
            ['parent_id' => $st_2_1, 'kode' => 'ST.02.01.02', 'nama' => 'Penyiapan bahan penyusunan rancangan survey.', 'sifat' => 'B'],
            ['parent_id' => $st_2_1, 'kode' => 'ST.02.01.03', 'nama' => 'Penyusunan metode pencacahan survey.', 'sifat' => 'B'],
            ['parent_id' => $st_2_1, 'kode' => 'ST.02.01.04', 'nama' => 'Penentuan volume survey.', 'sifat' => 'B'],
            ['parent_id' => $st_2_1, 'kode' => 'ST.02.01.05', 'nama' => 'Penyusunan desain penarikan sampel.', 'sifat' => 'B'],
            ['parent_id' => $st_2_1, 'kode' => 'ST.02.01.06', 'nama' => 'Penyusunan kerangka sampel.', 'sifat' => 'B'],
            ['parent_id' => $st_2_1, 'kode' => 'ST.02.01.07', 'nama' => 'Study pendahuluan (desk study)', 'sifat' => 'B'],

            // Bawah ST.02.02
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.01', 'nama' => 'Penyusunan rancangan organisasi kegiatan sensus.', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.02', 'nama' => 'Penyusunan Koesioner.', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.03', 'nama' => 'Penyusunan konsep dan definisi.', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.04', 'nama' => 'Inventarisasi, penyusunan dan pengembangan ukuran-ukuran yang digunakan dalam sensus.', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.05', 'nama' => 'Inventarisasi, penyusunan dan pengembangan lapangan usaha, jabatan, komoditas, perdesaan, perkotaan.', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.06', 'nama' => 'Penyusunan daftar nama dan kode pembagian wilayah administrasi.', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.07', 'nama' => 'Penyusunan buku pedoman pencacahan.', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.08', 'nama' => 'Penyusunan buku pedoman pengawasan.', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.09', 'nama' => 'Penyusunan buku pedoman pengolahan.', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.10', 'nama' => 'Penyusunan peta wilayah kerja dan muatan peta wilayah.', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.11', 'nama' => 'Penyusunan pedoman sosialisasi.', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.12', 'nama' => 'Sosialisasi kegiatan kepada stakeholder dan sumber data (leaflet, poster, pertemuan).', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.13', 'nama' => 'Pelaksanaan pertemuan koordinasi (intern dan eksterm).', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.14', 'nama' => 'Pelaksanaan pelatihan instruktur (TOT).', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.15', 'nama' => 'Pelaksanaan pelatihan petugas.', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.16', 'nama' => 'Penyusunan program pengolahan (rule validasi, pemeriksaan data entri, tabulasi).', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.17', 'nama' => 'Pelatihan petugas pengolahan.', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.18', 'nama' => 'Perancangan tabel.', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.19', 'nama' => 'Pelaksanaan Ujicoba koesioner survei (meliputi reliabilitas koesioner dan sistem pengolahan).', 'sifat' => 'B'],
            ['parent_id' => $st_2_2, 'kode' => 'ST.02.02.20', 'nama' => 'Pelaksanaan Ujicoba metodologi sensus (meliputi ujicoba pelaksanaan pencacahan, organisasi lapangan dan jumlah sampel).', 'sifat' => 'B'],

            // Bawah ST.02.03
            ['parent_id' => $st_2_3, 'kode' => 'ST.02.03.01', 'nama' => 'Pelaksanaan listing.', 'sifat' => 'B'],
            ['parent_id' => $st_2_3, 'kode' => 'ST.02.03.02', 'nama' => 'Pemilihan sampel.', 'sifat' => 'B'],
            ['parent_id' => $st_2_3, 'kode' => 'ST.02.03.03', 'nama' => 'Pengumpulan data.', 'sifat' => 'B'],
            ['parent_id' => $st_2_3, 'kode' => 'ST.02.03.04', 'nama' => 'Pemeriksaan.', 'sifat' => 'B'],
            ['parent_id' => $st_2_3, 'kode' => 'ST.02.03.05', 'nama' => 'Pengawasan Lapangan.', 'sifat' => 'B'],
            ['parent_id' => $st_2_3, 'kode' => 'ST.02.03.06', 'nama' => 'Monitoring kualitas.', 'sifat' => 'B'],

            // Bawah ST.02.04
            ['parent_id' => $st_2_4, 'kode' => 'ST.02.04.01', 'nama' => 'Pengelolaan dokumen (penerimaan/pengiriman, pengelompokkan/Batching).', 'sifat' => 'B'],
            ['parent_id' => $st_2_4, 'kode' => 'ST.02.04.02', 'nama' => 'Pemeriksaan dokumen dan pengkodean (Editing/Coding).', 'sifat' => 'B'],
            ['parent_id' => $st_2_4, 'kode' => 'ST.02.04.03', 'nama' => 'Perekaman data (entri, scanner).', 'sifat' => 'B'],
            ['parent_id' => $st_2_4, 'kode' => 'ST.02.04.04', 'nama' => 'Tabulasi Data.', 'sifat' => 'B'],
            ['parent_id' => $st_2_4, 'kode' => 'ST.02.04.05', 'nama' => 'Pemeriksaan tabulasi.', 'sifat' => 'B'],
            ['parent_id' => $st_2_4, 'kode' => 'ST.02.04.06', 'nama' => 'Laporan konsistensi tabulasi.', 'sifat' => 'B'],

            // Bawah ST.02.05
            ['parent_id' => $st_2_5, 'kode' => 'ST.02.05.01', 'nama' => 'Pembahasan angka hasil pengolahan.', 'sifat' => 'B'],
            ['parent_id' => $st_2_5, 'kode' => 'ST.02.05.02', 'nama' => 'Penyusunan angka sementara.', 'sifat' => 'B'],
            ['parent_id' => $st_2_5, 'kode' => 'ST.02.05.03', 'nama' => 'Penyusunan angka tetap.', 'sifat' => 'B'],
            ['parent_id' => $st_2_5, 'kode' => 'ST.02.05.04', 'nama' => 'Penyusunan/pembahasan draft publikasi.', 'sifat' => 'B'],
            ['parent_id' => $st_2_5, 'kode' => 'ST.02.05.05', 'nama' => 'Analisis data.', 'sifat' => 'B'],
            ['parent_id' => $st_2_5, 'kode' => 'ST.02.05.06', 'nama' => 'Penyusunan publikasi.', 'sifat' => 'B'],

            // Bawah ST.02.06
            ['parent_id' => $st_2_6, 'kode' => 'ST.02.06.01', 'nama' => 'Penyusunan bahan diseminasi berupa leaflet, booklet.', 'sifat' => 'B'],
            ['parent_id' => $st_2_6, 'kode' => 'ST.02.06.02', 'nama' => 'Penyusunan bahan diseminasi berupa penyusunan website.', 'sifat' => 'B'],
            ['parent_id' => $st_2_6, 'kode' => 'ST.02.06.03', 'nama' => 'Penyusunan bahan diseminasi berupa penyusunan CD dan sejenisnya.', 'sifat' => 'B'],
            ['parent_id' => $st_2_6, 'kode' => 'ST.02.06.04', 'nama' => 'Sosialisasi hasil survei melalui berbagai media.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN FASILITATIF: SD (Persandian) & URUSAN SUBTANTIF: KP, KB
        // ==============================================================================
        $id_sd = DB::table('klasifikasis')->where('kode', 'SD')->value('id');
        $id_kp = DB::table('klasifikasis')->where('kode', 'KP')->value('id');
        $id_kb = DB::table('klasifikasis')->where('kode', 'KB')->value('id');

        // --- LEVEL 2 (ANAK) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Anak SD (Persandian)
            ['parent_id' => $id_sd, 'kode' => 'SD.01', 'nama' => 'Pembinaan dan pengendalian persandian:', 'sifat' => 'B'],
            ['parent_id' => $id_sd, 'kode' => 'SD.02', 'nama' => 'Pengamanan persandian:', 'sifat' => 'B'],
            ['parent_id' => $id_sd, 'kode' => 'SD.03', 'nama' => 'Pengkajian persandian Kriptografi, Peralatan Sandi, Komunikasi Sandi:', 'sifat' => 'B'],

            // Anak KP (Kelautan dan Perikanan)
            ['parent_id' => $id_kp, 'kode' => 'KP.01', 'nama' => 'Tata Ruang Laut, Pesisir, dan Pulau-Pulau Kecil:', 'sifat' => 'B'],
            ['parent_id' => $id_kp, 'kode' => 'KP.02', 'nama' => 'Konservasi Kawasan dan Jenis Ikan:', 'sifat' => 'B'],
            ['parent_id' => $id_kp, 'kode' => 'KP.03', 'nama' => 'Pesisir dan Lautan:', 'sifat' => 'B'],
            ['parent_id' => $id_kp, 'kode' => 'KP.04', 'nama' => 'Pemberdayaan Masyarakat Pesisir dan Pengembangan Usaha:', 'sifat' => 'B'],
            ['parent_id' => $id_kp, 'kode' => 'KP.05', 'nama' => 'Pengawasan Sumber Daya Perikanan:', 'sifat' => 'B'],
            ['parent_id' => $id_kp, 'kode' => 'KP.06', 'nama' => 'Pengawasan Sumber Daya Kelautan:', 'sifat' => 'B'],
            ['parent_id' => $id_kp, 'kode' => 'KP.07', 'nama' => 'Kapal Pengawas:', 'sifat' => 'B'],
            ['parent_id' => $id_kp, 'kode' => 'KP.08', 'nama' => 'Pemantauan Sumber Daya Kelautan dan Perikanan dan Pengembangan Infrakstruktur:', 'sifat' => 'B'],
            ['parent_id' => $id_kp, 'kode' => 'KP.09', 'nama' => 'Penanganan pelanggaran:', 'sifat' => 'B'],
            ['parent_id' => $id_kp, 'kode' => 'KP.10', 'nama' => 'Tindak Karantina Ikan:', 'sifat' => 'B'],
            ['parent_id' => $id_kp, 'kode' => 'KP.11', 'nama' => 'Tertib Operasional:', 'sifat' => 'B'],
            ['parent_id' => $id_kp, 'kode' => 'KP.12', 'nama' => 'Pencegahan Penyakit:', 'sifat' => 'B'],
            ['parent_id' => $id_kp, 'kode' => 'KP.13', 'nama' => 'Pengawasan Karantina Ikan:', 'sifat' => 'B'],
            ['parent_id' => $id_kp, 'kode' => 'KP.14', 'nama' => 'Instalasi:', 'sifat' => 'B'],

            // Anak KB (Kesatuan Bangsa dan Politik)
            ['parent_id' => $id_kb, 'kode' => 'KB.01', 'nama' => 'Bina Ideologi dan Wawasan Kebangsaan:', 'sifat' => 'B'],
            ['parent_id' => $id_kb, 'kode' => 'KB.02', 'nama' => 'Kewaspadaan Nasional:', 'sifat' => 'B'],
            ['parent_id' => $id_kb, 'kode' => 'KB.03', 'nama' => 'Ketahanan Seni, Budaya, Adat, Agama dan Kemasyarakatan:', 'sifat' => 'B'],
            ['parent_id' => $id_kb, 'kode' => 'KB.04', 'nama' => 'Politik Dalam Negeri:', 'sifat' => 'B'],
            ['parent_id' => $id_kb, 'kode' => 'KB.05', 'nama' => 'Ketahanan Ekonomi:', 'sifat' => 'B'],
        ]);

        // Mengambil ID Level 2
        $sd_1 = DB::table('klasifikasis')->where('kode', 'SD.01')->value('id');
        $sd_2 = DB::table('klasifikasis')->where('kode', 'SD.02')->value('id');
        $sd_3 = DB::table('klasifikasis')->where('kode', 'SD.03')->value('id');

        $kp_1 = DB::table('klasifikasis')->where('kode', 'KP.01')->value('id');
        $kp_2 = DB::table('klasifikasis')->where('kode', 'KP.02')->value('id');
        $kp_3 = DB::table('klasifikasis')->where('kode', 'KP.03')->value('id');
        $kp_4 = DB::table('klasifikasis')->where('kode', 'KP.04')->value('id');
        $kp_5 = DB::table('klasifikasis')->where('kode', 'KP.05')->value('id');
        $kp_6 = DB::table('klasifikasis')->where('kode', 'KP.06')->value('id');
        $kp_7 = DB::table('klasifikasis')->where('kode', 'KP.07')->value('id');
        $kp_8 = DB::table('klasifikasis')->where('kode', 'KP.08')->value('id');
        $kp_9 = DB::table('klasifikasis')->where('kode', 'KP.09')->value('id');
        $kp_10 = DB::table('klasifikasis')->where('kode', 'KP.10')->value('id');
        $kp_11 = DB::table('klasifikasis')->where('kode', 'KP.11')->value('id');
        $kp_12 = DB::table('klasifikasis')->where('kode', 'KP.12')->value('id');
        $kp_13 = DB::table('klasifikasis')->where('kode', 'KP.13')->value('id');
        $kp_14 = DB::table('klasifikasis')->where('kode', 'KP.14')->value('id');

        $kb_1 = DB::table('klasifikasis')->where('kode', 'KB.01')->value('id');
        $kb_2 = DB::table('klasifikasis')->where('kode', 'KB.02')->value('id');
        $kb_3 = DB::table('klasifikasis')->where('kode', 'KB.03')->value('id');
        $kb_4 = DB::table('klasifikasis')->where('kode', 'KB.04')->value('id');
        $kb_5 = DB::table('klasifikasis')->where('kode', 'KB.05')->value('id');

        // --- LEVEL 3 (CUCU) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah SD.01
            ['parent_id' => $sd_1, 'kode' => 'SD.01.01', 'nama' => 'SDM:', 'sifat' => 'B'],
            ['parent_id' => $sd_1, 'kode' => 'SD.01.02', 'nama' => 'Materiil dan Jaring Komunikasi Sandi:', 'sifat' => 'B'],
            ['parent_id' => $sd_1, 'kode' => 'SD.01.03', 'nama' => 'Akreditasi dan Sertifikasi:', 'sifat' => 'B'],
            // Bawah SD.02
            ['parent_id' => $sd_2, 'kode' => 'SD.02.01', 'nama' => 'Pengamanan sinyal teknik sandi dan kripto.', 'sifat' => 'B'],
            ['parent_id' => $sd_2, 'kode' => 'SD.02.02', 'nama' => 'Analisis sinyal teknik sandi dan kripto:', 'sifat' => 'B'],
            ['parent_id' => $sd_2, 'kode' => 'SD.02.03', 'nama' => 'Materiil sandi sistem dan peralatan:', 'sifat' => 'B'],
            // Bawah SD.03
            ['parent_id' => $sd_3, 'kode' => 'SD.03.01', 'nama' => 'Perencanaan Pengkajian.', 'sifat' => 'B'],
            ['parent_id' => $sd_3, 'kode' => 'SD.03.02', 'nama' => 'Administrasi Pengkajian.', 'sifat' => 'B'],
            ['parent_id' => $sd_3, 'kode' => 'SD.03.03', 'nama' => 'Pelaksanaan.', 'sifat' => 'B'],
            ['parent_id' => $sd_3, 'kode' => 'SD.03.04', 'nama' => 'Pelaporan.', 'sifat' => 'B'],

            // Bawah KP.01
            ['parent_id' => $kp_1, 'kode' => 'KP.01.01', 'nama' => 'Rencana Tata Ruang Laut Nasional dan Perairan Yurisdiksi (rencana tata ruang laut nasional, rencana tata ruang laut lintas wilayah dan perairan).', 'sifat' => 'B'],
            ['parent_id' => $kp_1, 'kode' => 'KP.01.02', 'nama' => 'Rencana tata ruang dan zona wilayah I Jawa, Sumatera dan leuseur Sunda.', 'sifat' => 'B'],
            ['parent_id' => $kp_1, 'kode' => 'KP.01.03', 'nama' => 'Rencana tata ruang dan zona wilayah II (Kalimantan dan Maluku, zonasi wilayah Sulawesi dan Papua).', 'sifat' => 'B'],
            ['parent_id' => $kp_1, 'kode' => 'KP.01.04', 'nama' => 'Informasi dan evaluasi spasial.', 'sifat' => 'B'],
            // Bawah KP.02
            ['parent_id' => $kp_2, 'kode' => 'KP.02.01', 'nama' => 'Jejaring, data, dan informasi konservasi.', 'sifat' => 'B'],
            ['parent_id' => $kp_2, 'kode' => 'KP.02.02', 'nama' => 'Konservasi wawasan (perancangan konservasi kawasan, perlindungan dan pelestarian kawasan).', 'sifat' => 'B'],
            ['parent_id' => $kp_2, 'kode' => 'KP.02.03', 'nama' => 'Konservasi jenis ikan (perancangan konservasi jenis ikan, perlindungan dan plestarian jenis ikan).', 'sifat' => 'B'],
            ['parent_id' => $kp_2, 'kode' => 'KP.02.04', 'nama' => 'Pemanfaatan kawasan dan jenis ikan (pemanfaatan kawasan, pemanfaatan jenis ikan).', 'sifat' => 'B'],
            // Bawah KP.03
            ['parent_id' => $kp_3, 'kode' => 'KP.03.01', 'nama' => 'Mitigasi bencana lingkungan (mitigasi encana psisir dan lautan, adaptasi dampak perubahan iklim).', 'sifat' => 'B'],
            ['parent_id' => $kp_3, 'kode' => 'KP.03.02', 'nama' => 'Pendayagunaan sumber daya kelautan (benda muatan kapal tenggelam, jasa kelautan).', 'sifat' => 'B'],
            ['parent_id' => $kp_3, 'kode' => 'KP.03.03', 'nama' => 'Penanggulangan pencemaran sumber daya pesisir dan laut (penanggulangan pencemaran sumber daya pesisir, penanggulangan pencemaran sumer daya laut).', 'sifat' => 'B'],
            ['parent_id' => $kp_3, 'kode' => 'KP.03.04', 'nama' => 'Rehabilitasi dan reklamasi:', 'sifat' => 'B'],
            // Bawah KP.04
            ['parent_id' => $kp_4, 'kode' => 'KP.04.01', 'nama' => 'Akses permodalan ( akses perbankan, akses non Bank).', 'sifat' => 'B'],
            ['parent_id' => $kp_4, 'kode' => 'KP.04.02', 'nama' => 'Akses ilmu pengetahuan dan teknologi (identifikasi ilmu pengetahuan dan teknologi dan implementasi ilmu pengetahuan dan teknologi).', 'sifat' => 'B'],
            ['parent_id' => $kp_4, 'kode' => 'KP.04.03', 'nama' => 'Sosial budaya masyarakat (penguatan kelembagaan dan peningkatan peran serta masyarakat).', 'sifat' => 'B'],
            ['parent_id' => $kp_4, 'kode' => 'KP.04.04', 'nama' => 'Pengembangan usaha ( pelayanan usaha, usaha mikro).', 'sifat' => 'B'],
            // Bawah KP.05
            ['parent_id' => $kp_5, 'kode' => 'KP.05.01', 'nama' => 'Pengawasan penangkapan wilayah Barat (pengawasan penangkapan ika wilayah barat I, pengawasan penangkapan ikan wilayah barat II).', 'sifat' => 'B'],
            ['parent_id' => $kp_5, 'kode' => 'KP.05.02', 'nama' => 'Pengawasan penangkapan ikan wilayah Timur (pengawasan penangkapan ikan wilayah timur I dan II).', 'sifat' => 'B'],
            ['parent_id' => $kp_5, 'kode' => 'KP.05.03', 'nama' => 'Pengawasan pengangkutan, pengolahan, dan pemasaran (pengawasan usaha pngangkutan, pengolahan dan pemasaran wilayah barat, pengawasan usaha pengangkutan, pengolahan dan pemasaran wilayah timur).', 'sifat' => 'B'],
            ['parent_id' => $kp_5, 'kode' => 'KP.05.04', 'nama' => 'Pengawasan usaha budidaya wilayah barat dan wilayah timur.', 'sifat' => 'B'],
            // Bawah KP.06
            ['parent_id' => $kp_6, 'kode' => 'KP.06.01', 'nama' => 'Pengawasan ekosistem perairan dan kawasan konservasi.', 'sifat' => 'B'],
            ['parent_id' => $kp_6, 'kode' => 'KP.06.02', 'nama' => 'Pengawasan pencemaran perairan (pengawasan pencemaran pesisir laut dan pesisir pantai, pengawasan pencemaran perairan umum dan pedalaman).', 'sifat' => 'B'],
            ['parent_id' => $kp_6, 'kode' => 'KP.06.03', 'nama' => 'Pengawasan pesisir dan pulau-pulau terkecil.', 'sifat' => 'B'],
            ['parent_id' => $kp_6, 'kode' => 'KP.06.04', 'nama' => 'Pengawasan jasa kelautan dan sumber daya non hayati.', 'sifat' => 'B'],
            // Bawah KP.07
            ['parent_id' => $kp_7, 'kode' => 'KP.07.01', 'nama' => 'Logistik dan operasional wilayah Barat.', 'sifat' => 'B'],
            ['parent_id' => $kp_7, 'kode' => 'KP.07.02', 'nama' => 'Logistik operasional wilayah Timur.', 'sifat' => 'B'],
            ['parent_id' => $kp_7, 'kode' => 'KP.07.03', 'nama' => 'Perawatan kapal pengawas (wilayah barat dan timur).', 'sifat' => 'B'],
            ['parent_id' => $kp_7, 'kode' => 'KP.07.04', 'nama' => 'Pengawakan kapal pengawas (wilayah barat dan timur).', 'sifat' => 'B'],
            // Bawah KP.08
            ['parent_id' => $kp_8, 'kode' => 'KP.08.01', 'nama' => 'Sistem pemantauan (pengembangan sistem pemantauan, kerja sama pemantauan).', 'sifat' => 'B'],
            ['parent_id' => $kp_8, 'kode' => 'KP.08.02', 'nama' => 'Pemantauan pemanfaatan sumber daya kelautan (opersional sistem pemantauan pemanfaatan sumber, analisis hasil pemantauan pemanfaatan sumber daya kelautan).', 'sifat' => 'B'],
            ['parent_id' => $kp_8, 'kode' => 'KP.08.03', 'nama' => 'Pemantauan pemanfaatan sumber daya perikanan (analisis hasil pemantauan pemanfaatan sumber daya ikan).', 'sifat' => 'B'],
            ['parent_id' => $kp_8, 'kode' => 'KP.08.04', 'nama' => 'Pengembangan infrastruktur pengawasan (penyiapan infrastruktur, evaluasi infrastruktur).', 'sifat' => 'B'],
            // Bawah KP.09
            ['parent_id' => $kp_9, 'kode' => 'KP.09.01', 'nama' => 'Penyidikan (wilayah barat dan timur).', 'sifat' => 'B'],
            ['parent_id' => $kp_9, 'kode' => 'KP.09.02', 'nama' => 'Penanganan barang bukti dan awak kapal (wilayah barat dan timur).', 'sifat' => 'B'],
            ['parent_id' => $kp_9, 'kode' => 'KP.09.03', 'nama' => 'Kerjasama penegakan hukum dan fasilitas PPNS perikanan.', 'sifat' => 'B'],
            ['parent_id' => $kp_9, 'kode' => 'KP.09.04', 'nama' => 'Pemantauan dan evaluasi.', 'sifat' => 'B'],
            // Bawah KP.10
            ['parent_id' => $kp_10, 'kode' => 'KP.10.01', 'nama' => 'Pemeriksaan ikan.', 'sifat' => 'B'],
            ['parent_id' => $kp_10, 'kode' => 'KP.10.02', 'nama' => 'Penahanan.', 'sifat' => 'B'],
            ['parent_id' => $kp_10, 'kode' => 'KP.10.03', 'nama' => 'Pengasingan.', 'sifat' => 'B'],
            ['parent_id' => $kp_10, 'kode' => 'KP.10.04', 'nama' => 'Pengamatan.', 'sifat' => 'B'],
            ['parent_id' => $kp_10, 'kode' => 'KP.10.05', 'nama' => 'Pengamatan.', 'sifat' => 'B'], // Typo kembar di dokumen
            ['parent_id' => $kp_10, 'kode' => 'KP.10.06', 'nama' => 'Penolakan.', 'sifat' => 'B'],
            ['parent_id' => $kp_10, 'kode' => 'KP.10.07', 'nama' => 'Pemusnahan.', 'sifat' => 'B'],
            ['parent_id' => $kp_10, 'kode' => 'KP.10.08', 'nama' => 'Pelepasan/pembebasan.', 'sifat' => 'B'],
            // Bawah KP.11
            ['parent_id' => $kp_11, 'kode' => 'KP.11.01', 'nama' => 'Persyaratan lalulintas pemasukan.', 'sifat' => 'B'],
            ['parent_id' => $kp_11, 'kode' => 'KP.11.02', 'nama' => 'Persyaratan lalulintas pengeluaran.', 'sifat' => 'B'],
            ['parent_id' => $kp_11, 'kode' => 'KP.11.03', 'nama' => 'Permohonan sertifikat.', 'sifat' => 'B'],
            ['parent_id' => $kp_11, 'kode' => 'KP.11.04', 'nama' => 'Pemasukan formulir.', 'sifat' => 'B'],
            ['parent_id' => $kp_11, 'kode' => 'KP.11.05', 'nama' => 'Pemasukan sertifikat.', 'sifat' => 'B'],
            ['parent_id' => $kp_11, 'kode' => 'KP.11.06', 'nama' => 'Evaluasi dan monitoring sertifikat.', 'sifat' => 'B'],
            ['parent_id' => $kp_11, 'kode' => 'KP.11.07', 'nama' => 'Surat perintah.', 'sifat' => 'B'],
            ['parent_id' => $kp_11, 'kode' => 'KP.11.08', 'nama' => 'Rekomendasi.', 'sifat' => 'B'],
            // Bawah KP.12
            ['parent_id' => $kp_12, 'kode' => 'KP.12.01', 'nama' => 'Penutupan suatu area.', 'sifat' => 'B'],
            ['parent_id' => $kp_12, 'kode' => 'KP.12.02', 'nama' => 'Pelanggaran lalulintas ikan.', 'sifat' => 'B'],
            // Bawah KP.13
            ['parent_id' => $kp_13, 'kode' => 'KP.13.01', 'nama' => 'Pengawasan peraturan perkarantinaan.', 'sifat' => 'B'],
            ['parent_id' => $kp_13, 'kode' => 'KP.13.02', 'nama' => 'Pengawasan pelaksanaan operasional.', 'sifat' => 'B'],
            // Bawah KP.14
            ['parent_id' => $kp_14, 'kode' => 'KP.14.01', 'nama' => 'Instalasi karantina sementara.', 'sifat' => 'B'],
            ['parent_id' => $kp_14, 'kode' => 'KP.14.02', 'nama' => 'Lokasi karantina.', 'sifat' => 'B'],

            // Bawah KB.01
            ['parent_id' => $kb_1, 'kode' => 'KB.01.01', 'nama' => 'Ketahanan Ideologi Negara:', 'sifat' => 'B'],
            ['parent_id' => $kb_1, 'kode' => 'KB.01.02', 'nama' => 'Wawasan Kebangsaan:', 'sifat' => 'B'],
            ['parent_id' => $kb_1, 'kode' => 'KB.01.03', 'nama' => 'Bela Negara:', 'sifat' => 'B'],
            ['parent_id' => $kb_1, 'kode' => 'KB.01.04', 'nama' => 'Nilai - nilai Sejarah Kebangsaan:', 'sifat' => 'B'],
            ['parent_id' => $kb_1, 'kode' => 'KB.01.05', 'nama' => 'Pembauran dan Kewarganegaraan:', 'sifat' => 'B'],
            // Bawah KB.02
            ['parent_id' => $kb_2, 'kode' => 'KB.02.01', 'nama' => 'Fasilitasi dan Evaluasi Kewaspadaan Dini dan Kerjasama Intelijen Keamanan.', 'sifat' => 'B'],
            ['parent_id' => $kb_2, 'kode' => 'KB.02.02', 'nama' => 'Fasilitasi Bina Masyarakat Perbatasan Antar Negara dan Kehidupan Masyarakat Perbatasan.', 'sifat' => 'B'],
            ['parent_id' => $kb_2, 'kode' => 'KB.02.03', 'nama' => 'Fasilitasi dan Evaluasi Penanganan Konflik Pemerintahan', 'sifat' => 'B'],
            ['parent_id' => $kb_2, 'kode' => 'KB.02.04', 'nama' => 'Fasilitasi dan Laporan Penanganan Konflik Sosial (pedoman kewaspadaan nasional ).', 'sifat' => 'B'],
            ['parent_id' => $kb_2, 'kode' => 'KB.02.05', 'nama' => 'Fasilitasi Pengawasan Orang Asing dan Lembaga Asing (pelaksanaan pengawasan kegiatan orang asing dan lembaga asing, surat pemberitahuan penelitian orang asing).', 'sifat' => 'B'],
            // Bawah KB.03
            ['parent_id' => $kb_3, 'kode' => 'KB.03.01', 'nama' => 'Ketahanan Seni:', 'sifat' => 'B'],
            ['parent_id' => $kb_3, 'kode' => 'KB.03.02', 'nama' => 'Ketahanan Budaya:', 'sifat' => 'B'],
            ['parent_id' => $kb_3, 'kode' => 'KB.03.03', 'nama' => 'Agama dan Kepercayaan:', 'sifat' => 'B'],
            ['parent_id' => $kb_3, 'kode' => 'KB.03.04', 'nama' => 'Organisasi Kemasyarakatan:', 'sifat' => 'B'],
            ['parent_id' => $kb_3, 'kode' => 'KB.03.05', 'nama' => 'Masalah sosial Kemasyarakatan:', 'sifat' => 'B'],
            // Bawah KB.04
            ['parent_id' => $kb_4, 'kode' => 'KB.04.01', 'nama' => 'Implementasi Kebijakan Politik:', 'sifat' => 'B'],
            ['parent_id' => $kb_4, 'kode' => 'KB.04.02', 'nama' => 'Fasilitasi Kelembagaan Politik Pemerintahan:', 'sifat' => 'B'],
            ['parent_id' => $kb_4, 'kode' => 'KB.04.03', 'nama' => 'Fasilitasi Kelembagaan Partai Politik:', 'sifat' => 'B'],
            ['parent_id' => $kb_4, 'kode' => 'KB.04.04', 'nama' => 'Pendidikan Budaya Politik:', 'sifat' => 'B'],
            ['parent_id' => $kb_4, 'kode' => 'KB.04.05', 'nama' => 'Pemilihan Umum:', 'sifat' => 'B'],
            // Bawah KB.05
            ['parent_id' => $kb_5, 'kode' => 'KB.05.01', 'nama' => 'Ketahanan Sumberdaya Alam dan Kesenjangan Perekonomian:', 'sifat' => 'B'],
            ['parent_id' => $kb_5, 'kode' => 'KB.05.03', 'nama' => 'Ketahanan perdagangan investasi, fiskal dan moneter:', 'sifat' => 'B'], // Loncat dari 01 ke 03
            ['parent_id' => $kb_5, 'kode' => 'KB.05.04', 'nama' => 'Ketahanan Lembaga Sosial Ekonomi:', 'sifat' => 'B'],
        ]);

        // Mengambil ID Level 3 untuk cucu (Level 4)
        $sd_1_1 = DB::table('klasifikasis')->where('kode', 'SD.01.01')->value('id');
        $sd_1_2 = DB::table('klasifikasis')->where('kode', 'SD.01.02')->value('id');
        $sd_1_3 = DB::table('klasifikasis')->where('kode', 'SD.01.03')->value('id');
        $sd_2_1 = DB::table('klasifikasis')->where('kode', 'SD.02.01')->value('id');
        $sd_2_2 = DB::table('klasifikasis')->where('kode', 'SD.02.02')->value('id');
        $sd_2_3 = DB::table('klasifikasis')->where('kode', 'SD.02.03')->value('id');
        
        $kp_3_4 = DB::table('klasifikasis')->where('kode', 'KP.03.04')->value('id');

        $kb_1_1 = DB::table('klasifikasis')->where('kode', 'KB.01.01')->value('id');
        $kb_1_2 = DB::table('klasifikasis')->where('kode', 'KB.01.02')->value('id');
        $kb_1_3 = DB::table('klasifikasis')->where('kode', 'KB.01.03')->value('id');
        $kb_1_4 = DB::table('klasifikasis')->where('kode', 'KB.01.04')->value('id');
        $kb_1_5 = DB::table('klasifikasis')->where('kode', 'KB.01.05')->value('id');
        $kb_3_1 = DB::table('klasifikasis')->where('kode', 'KB.03.01')->value('id');
        $kb_3_2 = DB::table('klasifikasis')->where('kode', 'KB.03.02')->value('id');
        $kb_3_3 = DB::table('klasifikasis')->where('kode', 'KB.03.03')->value('id');
        $kb_3_4 = DB::table('klasifikasis')->where('kode', 'KB.03.04')->value('id');
        $kb_3_5 = DB::table('klasifikasis')->where('kode', 'KB.03.05')->value('id');
        $kb_4_1 = DB::table('klasifikasis')->where('kode', 'KB.04.01')->value('id');
        $kb_4_2 = DB::table('klasifikasis')->where('kode', 'KB.04.02')->value('id');
        $kb_4_3 = DB::table('klasifikasis')->where('kode', 'KB.04.03')->value('id');
        $kb_4_4 = DB::table('klasifikasis')->where('kode', 'KB.04.04')->value('id');
        $kb_4_5 = DB::table('klasifikasis')->where('kode', 'KB.04.05')->value('id');
        $kb_5_1 = DB::table('klasifikasis')->where('kode', 'KB.05.01')->value('id');
        $kb_5_3 = DB::table('klasifikasis')->where('kode', 'KB.05.03')->value('id');
        $kb_5_4 = DB::table('klasifikasis')->where('kode', 'KB.05.04')->value('id');

        // --- LEVEL 4 (CICIT) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah SD.01.01
            ['parent_id' => $sd_1_1, 'kode' => 'SD.01.01.01', 'nama' => 'Data Personil Sandi.', 'sifat' => 'B'],
            ['parent_id' => $sd_1_1, 'kode' => 'SD.01.01.02', 'nama' => 'Pembinaan Personil Sandi.', 'sifat' => 'B'],
            ['parent_id' => $sd_1_1, 'kode' => 'SD.01.01.03', 'nama' => 'Pengawasan dan Pengendalian.', 'sifat' => 'B'],
            // Bawah SD.01.02
            ['parent_id' => $sd_1_2, 'kode' => 'SD.01.02.01', 'nama' => 'Data Materiil dan JKS.', 'sifat' => 'B'],
            ['parent_id' => $sd_1_2, 'kode' => 'SD.01.02.02', 'nama' => 'Analisa Kebutuhan Materiil dan Jaringan Komunikasi Sandi.', 'sifat' => 'B'],
            // Bawah SD.01.03
            ['parent_id' => $sd_1_3, 'kode' => 'SD.01.03.01', 'nama' => 'Akreditasi Diklat.', 'sifat' => 'B'],
            ['parent_id' => $sd_1_3, 'kode' => 'SD.01.03.02', 'nama' => 'Sertifikasi Alat.', 'sifat' => 'B'],
            // Bawah SD.02.01
            ['parent_id' => $sd_2_1, 'kode' => 'SD.02.01.01', 'nama' => 'Pelaksanaan (Perencanaan Dan Administrasi).', 'sifat' => 'B'],
            ['parent_id' => $sd_2_1, 'kode' => 'SD.02.01.02', 'nama' => 'Pelaporan.', 'sifat' => 'B'],
            // Bawah SD.02.02
            ['parent_id' => $sd_2_2, 'kode' => 'SD.02.02.01', 'nama' => 'Pelaksanaan (Perencanaan Dan Administrasi).', 'sifat' => 'B'],
            ['parent_id' => $sd_2_2, 'kode' => 'SD.02.02.02', 'nama' => 'Pelaporan.', 'sifat' => 'B'],
            // Bawah SD.02.03
            ['parent_id' => $sd_2_3, 'kode' => 'SD.02.03.01', 'nama' => 'Pelaksanaan (Perencanaan dan Administrasi).', 'sifat' => 'B'],
            ['parent_id' => $sd_2_3, 'kode' => 'SD.02.03.02', 'nama' => 'Pelaporan.', 'sifat' => 'B'],

            // Bawah KP.03.04
            ['parent_id' => $kp_3_4, 'kode' => 'KP.03.04.01', 'nama' => 'Identifikasi pulau-pulau terkecil.', 'sifat' => 'B'],
            ['parent_id' => $kp_3_4, 'kode' => 'KP.03.04.02', 'nama' => 'Pengelolaan eksosistem pulau-pulau terkecil (rehailitasi, mitigasi dan adaptasi).', 'sifat' => 'B'],
            ['parent_id' => $kp_3_4, 'kode' => 'KP.03.04.03', 'nama' => 'Investasi dan promosi pulau-pulau terkecil.', 'sifat' => 'B'],
            ['parent_id' => $kp_3_4, 'kode' => 'KP.03.04.04', 'nama' => 'Sarana dan prasarana pulau-pulau terkecil.', 'sifat' => 'B'],

            // Bawah KB.01.01
            ['parent_id' => $kb_1_1, 'kode' => 'KB.01.01.01', 'nama' => 'Penguatan ideologi Negara.', 'sifat' => 'B'],
            ['parent_id' => $kb_1_1, 'kode' => 'KB.01.01.02', 'nama' => 'Implementasi ideologi Negara.', 'sifat' => 'B'],
            // Bawah KB.01.02
            ['parent_id' => $kb_1_2, 'kode' => 'KB.01.02.01', 'nama' => 'Penguatan wawasan kebangsaan.', 'sifat' => 'B'],
            ['parent_id' => $kb_1_2, 'kode' => 'KB.01.02.02', 'nama' => 'Pembinaan dan sosialisasi.', 'sifat' => 'B'],
            ['parent_id' => $kb_1_2, 'kode' => 'KB.01.02.03', 'nama' => 'Implementasi.', 'sifat' => 'B'],
            // Bawah KB.01.03
            ['parent_id' => $kb_1_3, 'kode' => 'KB.01.03.01', 'nama' => 'Pendidikan bela Negara.', 'sifat' => 'B'],
            ['parent_id' => $kb_1_3, 'kode' => 'KB.01.03.02', 'nama' => 'Pemberdayaan bela Negara.', 'sifat' => 'B'],
            // Bawah KB.01.04
            ['parent_id' => $kb_1_4, 'kode' => 'KB.01.04.01', 'nama' => 'Penguatan nilai-nilai sejarah.', 'sifat' => 'B'],
            ['parent_id' => $kb_1_4, 'kode' => 'KB.01.04.02', 'nama' => 'Pmplementasi nilai-nilai sejarah.', 'sifat' => 'B'], // Typo dokumen "Pmplementasi"
            ['parent_id' => $kb_1_4, 'kode' => 'KB.01.04.03', 'nama' => 'Penerbitan rekomendasi penelitian.', 'sifat' => 'B'],
            // Bawah KB.01.05
            ['parent_id' => $kb_1_5, 'kode' => 'KB.01.05.01', 'nama' => 'Pembauran,Kebangsaan dan Kewarganegaraan.', 'sifat' => 'B'],
            ['parent_id' => $kb_1_5, 'kode' => 'KB.01.05.02', 'nama' => 'Pembinaan kewarganegaraan.', 'sifat' => 'B'],

            // Bawah KB.03.01
            ['parent_id' => $kb_3_1, 'kode' => 'KB.03.01.01', 'nama' => 'Fasilitasi pelaksanaan pelestarian kesenian.', 'sifat' => 'B'],
            ['parent_id' => $kb_3_1, 'kode' => 'KB.03.01.02', 'nama' => 'Pelaksanaan dan perkembangan nilai-nilai kesenian.', 'sifat' => 'B'],
            // Bawah KB.03.02
            ['parent_id' => $kb_3_2, 'kode' => 'KB.03.02.01', 'nama' => 'Fasilitasi pelaksanaan pelestarian kebudayaan.', 'sifat' => 'B'],
            ['parent_id' => $kb_3_2, 'kode' => 'KB.03.02.02', 'nama' => 'Pelaksanaan dan perkembangan nilai-nilai kebudayaan.', 'sifat' => 'B'],
            // Bawah KB.03.03
            ['parent_id' => $kb_3_3, 'kode' => 'KB.03.03.01', 'nama' => 'Fasilitasi.', 'sifat' => 'B'],
            ['parent_id' => $kb_3_3, 'kode' => 'KB.03.03.02', 'nama' => 'Data Forum Komunikasi Umat Beragama (FKUB) Prov/Kab/Kota.', 'sifat' => 'B'],
            ['parent_id' => $kb_3_3, 'kode' => 'KB.03.03.03', 'nama' => 'Pelaksanaan kerukunan umat beragama dan kepercayaan. Pelestarian nilai-nilai keagamaan dan', 'sifat' => 'B'], // Sesuai typo pemenggalan
            ['parent_id' => $kb_3_3, 'kode' => 'KB.03.03.04', 'nama' => 'kepercayaan.', 'sifat' => 'B'],
            // Bawah KB.03.04
            ['parent_id' => $kb_3_4, 'kode' => 'KB.03.04.01', 'nama' => 'Pelaksanaan identifikasi dan kompilasi organisasi masyarakat (pendaftaran ormas, database ormas).', 'sifat' => 'B'],
            ['parent_id' => $kb_3_4, 'kode' => 'KB.03.04.02', 'nama' => 'Laporan hasil kerjasama kegiatan dengan ORMAS/LNL.', 'sifat' => 'B'],
            ['parent_id' => $kb_3_4, 'kode' => 'KB.03.04.03', 'nama' => 'Evaluasi aktifitas Ormas sanksi administrasi.', 'sifat' => 'B'],
            ['parent_id' => $kb_3_4, 'kode' => 'KB.03.04.04', 'nama' => 'Fasilitasi sengketa Ormas.', 'sifat' => 'B'],
            ['parent_id' => $kb_3_4, 'kode' => 'KB.03.04.05', 'nama' => 'Fasilitasi Ormas.', 'sifat' => 'B'],
            // Bawah KB.03.05
            ['parent_id' => $kb_3_5, 'kode' => 'KB.03.05.01', 'nama' => 'Fasilitasi pencegahan penyalahgunaan narkotika.', 'sifat' => 'B'],
            ['parent_id' => $kb_3_5, 'kode' => 'KB.03.05.02', 'nama' => 'Masalah sosial kemasyarakatan.', 'sifat' => 'B'],

            // Bawah KB.04.01
            ['parent_id' => $kb_4_1, 'kode' => 'KB.04.01.01', 'nama' => 'Implementasi kebijakan politik (sosialisasi dan publikasi best ractice dan inovasi).', 'sifat' => 'B'],
            ['parent_id' => $kb_4_1, 'kode' => 'KB.04.01.02', 'nama' => 'Pelaksanaan monitoring dan evaluasi.', 'sifat' => 'B'],
            // Bawah KB.04.02
            ['parent_id' => $kb_4_2, 'kode' => 'KB.04.02.01', 'nama' => 'Evaluasi kelembagaan politik pemerintahan di pusat (pendampingan kunjungan kerja DPR RI).', 'sifat' => 'B'],
            ['parent_id' => $kb_4_2, 'kode' => 'KB.04.02.02', 'nama' => 'Evaluasi kelembagaan politik pemerintahan daerah (rietasi anggota DPRD Provinsi).', 'sifat' => 'B'],
            // Bawah KB.04.03
            ['parent_id' => $kb_4_3, 'kode' => 'KB.04.03.01', 'nama' => 'Verifikasi dan evaluasi partai politik yang memperoleh kursi.', 'sifat' => 'B'],
            ['parent_id' => $kb_4_3, 'kode' => 'KB.04.03.02', 'nama' => 'Partai politik yang tidak memperoleh kursi.', 'sifat' => 'B'],
            ['parent_id' => $kb_4_3, 'kode' => 'KB.04.03.03', 'nama' => 'Pemerintah daerah.', 'sifat' => 'B'],
            ['parent_id' => $kb_4_3, 'kode' => 'KB.04.03.04', 'nama' => 'Database parpol.', 'sifat' => 'B'],
            // Bawah KB.04.04
            ['parent_id' => $kb_4_4, 'kode' => 'KB.04.04.01', 'nama' => 'Fasilitasi penyelenggaraan pendidikan budaya politik.', 'sifat' => 'B'],
            ['parent_id' => $kb_4_4, 'kode' => 'KB.04.04.02', 'nama' => 'Penyelenggaraan pendidikan budaya politik.', 'sifat' => 'B'],
            ['parent_id' => $kb_4_4, 'kode' => 'KB.04.04.03', 'nama' => 'Modul sebagai sarana penyelenggaraan pendidikan.', 'sifat' => 'B'],
            // Bawah KB.04.05
            ['parent_id' => $kb_4_5, 'kode' => 'KB.04.05.01', 'nama' => 'Fasilitasi Penyelengaraan Pemilu.', 'sifat' => 'B'],
            ['parent_id' => $kb_4_5, 'kode' => 'KB.04.05.02', 'nama' => 'Evaluasi pelaksanaan pemilihan umum wakil rakyat.', 'sifat' => 'B'],
            ['parent_id' => $kb_4_5, 'kode' => 'KB.04.05.03', 'nama' => 'Evaluasi pemilihan umum Presiden dan wakil presiden.', 'sifat' => 'B'],
            ['parent_id' => $kb_4_5, 'kode' => 'KB.04.05.04', 'nama' => 'Laporan hasil perkembangan politik di daerah.', 'sifat' => 'B'],
            ['parent_id' => $kb_4_5, 'kode' => 'KB.04.05.05', 'nama' => 'Laporan hasil kerjasama kegiatan dengan Ormas/LSM/LNL.', 'sifat' => 'B'],

            // Bawah KB.05.01
            ['parent_id' => $kb_5_1, 'kode' => 'KB.05.01.01', 'nama' => 'Penanganan kesenjangan perekonomian (sosialisasi dan publikasi bst practise dan inovasi).', 'sifat' => 'B'],
            ['parent_id' => $kb_5_1, 'kode' => 'KB.05.01.02', 'nama' => 'Penanganan kesenjangan perekonomian.', 'sifat' => 'B'],
            // Bawah KB.05.03
            ['parent_id' => $kb_5_3, 'kode' => 'KB.05.03.01', 'nama' => 'Fasilitasi identifikasi ketahanan di bidang perdagangan, investasi fiskal dan moneter.', 'sifat' => 'B'],
            ['parent_id' => $kb_5_3, 'kode' => 'KB.05.03.02', 'nama' => 'Penyiapan bahan perumusan kebijakan dan fasilitasi monitoring dan evaluasi.', 'sifat' => 'B'],
            // Bawah KB.05.04
            ['parent_id' => $kb_5_4, 'kode' => 'KB.05.04.01', 'nama' => 'Evaluasi pelaksanaan hubungan kerjasama penanganan kejahatan lembaga perekonomian.', 'sifat' => 'B'],
            ['parent_id' => $kb_5_4, 'kode' => 'KB.05.04.02', 'nama' => 'Evaluasi pelaksanaan koordinasi kebijakan lembaga perekonomian.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: PEM (Pemerintahan Umum)
        // ==============================================================================
        $id_pem = DB::table('klasifikasis')->where('kode', 'PEM')->value('id');

        // --- LEVEL ANAK (Level 2) ---
        // Referensi Dokumen: image_e19a63.png, image_e19d2a.png, image_e19d47.png, image_e19d4e.png
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_pem, 'kode' => 'PEM.01', 'nama' => 'Dekosentrasi dan Kerjasama:', 'sifat' => 'B'],
            ['parent_id' => $id_pem, 'kode' => 'PEM.02', 'nama' => 'Wilayah Administrasi dan Perbatasan:', 'sifat' => 'B'],
            ['parent_id' => $id_pem, 'kode' => 'PEM.03', 'nama' => 'Polisi Pamong Praja Perlindungan Masyarakat:', 'sifat' => 'B'],
            ['parent_id' => $id_pem, 'kode' => 'PEM.04', 'nama' => 'Kawasan dan Pertanahan:', 'sifat' => 'B'],
            ['parent_id' => $id_pem, 'kode' => 'PEM.05', 'nama' => 'Pencegahan dan Penanggulangan Bencana:', 'sifat' => 'B'],
        ]);

        $pem_1 = DB::table('klasifikasis')->where('kode', 'PEM.01')->value('id');
        $pem_2 = DB::table('klasifikasis')->where('kode', 'PEM.02')->value('id');
        $pem_3 = DB::table('klasifikasis')->where('kode', 'PEM.03')->value('id');
        $pem_4 = DB::table('klasifikasis')->where('kode', 'PEM.04')->value('id');
        $pem_5 = DB::table('klasifikasis')->where('kode', 'PEM.05')->value('id');

        // --- LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah PEM.01
            ['parent_id' => $pem_1, 'kode' => 'PEM.01.01', 'nama' => 'Evaluasi pelaksanaan hubungan kerjasama penanganan kejahatan lembaga perekonomian.', 'sifat' => 'B'],
            ['parent_id' => $pem_1, 'kode' => 'PEM.01.02', 'nama' => 'Evaluasi pelaksanaan koordinasi kebijakan lembaga perekonomian.', 'sifat' => 'B'],
            ['parent_id' => $pem_1, 'kode' => 'PEM.01.03', 'nama' => 'Fasilitasi, Koordinasi, Pembinaan dan Pengawasan, serta Monitoring dan Evaluasi Kerjasam.', 'sifat' => 'B'],
            ['parent_id' => $pem_1, 'kode' => 'PEM.01.04', 'nama' => 'Fasilitas Kecamatan:', 'sifat' => 'B'],
            ['parent_id' => $pem_1, 'kode' => 'PEM.01.05', 'nama' => 'Fasilitasi Pelayanan Umum:', 'sifat' => 'B'],

            // Bawah PEM.02
            ['parent_id' => $pem_2, 'kode' => 'PEM.02.01', 'nama' => 'Toponimi dan Data Wilayah:', 'sifat' => 'B'],
            ['parent_id' => $pem_2, 'kode' => 'PEM.02.02', 'nama' => 'Pengembangan dan Penataan Batas Antar Negara:', 'sifat' => 'B'],
            ['parent_id' => $pem_2, 'kode' => 'PEM.02.03', 'nama' => 'Batas Antar Daerah Wilayah:', 'sifat' => 'B'],

            // Bawah PEM.03
            ['parent_id' => $pem_3, 'kode' => 'PEM.03.01', 'nama' => 'Tata Operasional dan Sarana Prasarana Polisi Pamong Praja:', 'sifat' => 'B'],
            ['parent_id' => $pem_3, 'kode' => 'PEM.03.02', 'nama' => 'Peningkatan Kapasitas SDM Polisi Pamong Praja:', 'sifat' => 'B'],
            ['parent_id' => $pem_3, 'kode' => 'PEM.03.03', 'nama' => 'Perlindungan Masyarakat:', 'sifat' => 'B'],
            ['parent_id' => $pem_3, 'kode' => 'PEM.03.04', 'nama' => 'Penyidik Pegawai Negeri Sipil:', 'sifat' => 'B'],
            ['parent_id' => $pem_3, 'kode' => 'PEM.03.05', 'nama' => 'Perlindungan hak-hak sipil dan hak asasi manusia:', 'sifat' => 'B'],

            // Bawah PEM.04
            ['parent_id' => $pem_4, 'kode' => 'PEM.04.01', 'nama' => 'Kawasan Sumber Daya Alam:', 'sifat' => 'B'],
            ['parent_id' => $pem_4, 'kode' => 'PEM.04.02', 'nama' => 'Kawasan Sumber Daya Buatan:', 'sifat' => 'B'],
            ['parent_id' => $pem_4, 'kode' => 'PEM.04.03', 'nama' => 'Kawasan Ekonomi,Industri dan Perdagangan Bebas:', 'sifat' => 'B'],
            ['parent_id' => $pem_4, 'kode' => 'PEM.04.04', 'nama' => 'Pertanahan dan Kawasan Khusus:', 'sifat' => 'B'],
            ['parent_id' => $pem_4, 'kode' => 'PEM.04.05', 'nama' => 'Kawasan Perairan, Kelautan dan Kedirgantaraan:', 'sifat' => 'B'],

            // Bawah PEM.05
            ['parent_id' => $pem_5, 'kode' => 'PEM.05.01', 'nama' => 'Identifikasi Potensi Bencana:', 'sifat' => 'B'],
            ['parent_id' => $pem_5, 'kode' => 'PEM.05.02', 'nama' => 'Organisasi Sistem dan Prosedur:', 'sifat' => 'B'],
            ['parent_id' => $pem_5, 'kode' => 'PEM.05.03', 'nama' => 'Sarana dan Prasarana:', 'sifat' => 'B'],
            ['parent_id' => $pem_5, 'kode' => 'PEM.05.04', 'nama' => 'Pencegahan dan Penanggulangan Kebakaran:', 'sifat' => 'B'],
        ]);

        // Mengambil ID untuk memasukkan Level Cicit (Level 4)
        $pem_1_4 = DB::table('klasifikasis')->where('kode', 'PEM.01.04')->value('id');
        $pem_1_5 = DB::table('klasifikasis')->where('kode', 'PEM.01.05')->value('id');

        $pem_2_1 = DB::table('klasifikasis')->where('kode', 'PEM.02.01')->value('id');
        $pem_2_2 = DB::table('klasifikasis')->where('kode', 'PEM.02.02')->value('id');
        $pem_2_3 = DB::table('klasifikasis')->where('kode', 'PEM.02.03')->value('id');

        $pem_3_1 = DB::table('klasifikasis')->where('kode', 'PEM.03.01')->value('id');
        $pem_3_2 = DB::table('klasifikasis')->where('kode', 'PEM.03.02')->value('id');
        $pem_3_3 = DB::table('klasifikasis')->where('kode', 'PEM.03.03')->value('id');
        $pem_3_4 = DB::table('klasifikasis')->where('kode', 'PEM.03.04')->value('id');
        $pem_3_5 = DB::table('klasifikasis')->where('kode', 'PEM.03.05')->value('id');

        $pem_4_1 = DB::table('klasifikasis')->where('kode', 'PEM.04.01')->value('id');
        $pem_4_2 = DB::table('klasifikasis')->where('kode', 'PEM.04.02')->value('id');
        $pem_4_3 = DB::table('klasifikasis')->where('kode', 'PEM.04.03')->value('id');
        $pem_4_4 = DB::table('klasifikasis')->where('kode', 'PEM.04.04')->value('id');
        $pem_4_5 = DB::table('klasifikasis')->where('kode', 'PEM.04.05')->value('id');

        $pem_5_1 = DB::table('klasifikasis')->where('kode', 'PEM.05.01')->value('id');
        $pem_5_2 = DB::table('klasifikasis')->where('kode', 'PEM.05.02')->value('id');
        $pem_5_3 = DB::table('klasifikasis')->where('kode', 'PEM.05.03')->value('id');
        $pem_5_4 = DB::table('klasifikasis')->where('kode', 'PEM.05.04')->value('id');

        // --- LEVEL CICIT (Level 4) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah PEM.01.04
            ['parent_id' => $pem_1_4, 'kode' => 'PEM.01.04.01', 'nama' => 'Fasilitasi (database pembentukan kecamatan).', 'sifat' => 'B'],
            ['parent_id' => $pem_1_4, 'kode' => 'PEM.01.04.02', 'nama' => 'Koordinasi.', 'sifat' => 'B'],
            ['parent_id' => $pem_1_4, 'kode' => 'PEM.01.04.03', 'nama' => 'Pembinaan dan pengawasan.', 'sifat' => 'B'],
            ['parent_id' => $pem_1_4, 'kode' => 'PEM.01.04.04', 'nama' => 'Monitoring dan evaluasi (evaluasi kinerja kecamatan).', 'sifat' => 'B'],
            
            // Bawah PEM.01.05
            ['parent_id' => $pem_1_5, 'kode' => 'PEM.01.05.01', 'nama' => 'Fasilitasi pelayanan administrasi Kecamatan.', 'sifat' => 'B'],
            ['parent_id' => $pem_1_5, 'kode' => 'PEM.01.05.02', 'nama' => 'Koordinasi pelayanan administrasi Kecamatan.', 'sifat' => 'B'],
            ['parent_id' => $pem_1_5, 'kode' => 'PEM.01.05.03', 'nama' => 'Pembinaan dan pengawasan (pelayanan administrasi Kecamatan).', 'sifat' => 'B'],
            ['parent_id' => $pem_1_5, 'kode' => 'PEM.01.05.04', 'nama' => 'Monitoring dan evaluasi.', 'sifat' => 'B'],

            // Bawah PEM.02.01
            ['parent_id' => $pem_2_1, 'kode' => 'PEM.02.01.01', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi kegiatan toponimi.', 'sifat' => 'B'],
            ['parent_id' => $pem_2_1, 'kode' => 'PEM.02.01.02', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi pembakuan nama rupabumi unsur alami dan unsur buatan.', 'sifat' => 'B'],
            ['parent_id' => $pem_2_1, 'kode' => 'PEM.02.01.03', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi perubahan nama rupabumi unsur alami dan unsur buatan.', 'sifat' => 'B'],
            ['parent_id' => $pem_2_1, 'kode' => 'PEM.02.01.04', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi perubahan nama rupabumi unsur alami dan unsur buatan.', 'sifat' => 'B'], // Sesuai dengan duplikasi di dokumen asli
            ['parent_id' => $pem_2_1, 'kode' => 'PEM.02.01.05', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi kode dan data wilayah administrasi pemerintahan.', 'sifat' => 'B'],
            ['parent_id' => $pem_2_1, 'kode' => 'PEM.02.01.06', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi penghitungan luas wilayah.', 'sifat' => 'B'],
            
            // Bawah PEM.02.02
            ['parent_id' => $pem_2_2, 'kode' => 'PEM.02.02.01', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi pengembangan sarana dan prasarana pelayanan umum pemerintahan di wilayah perbatasan Negara.', 'sifat' => 'B'],
            ['parent_id' => $pem_2_2, 'kode' => 'PEM.02.02.02', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi penguatan kelembagaan di daerah dan kerjasama internasional antar perbatasan.', 'sifat' => 'B'],
            
            // Bawah PEM.02.03
            ['parent_id' => $pem_2_3, 'kode' => 'PEM.02.03.01', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi penetapan batas antar daerah.', 'sifat' => 'B'],
            ['parent_id' => $pem_2_3, 'kode' => 'PEM.02.03.02', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi penyelesaian sengketa batas antar daerah.', 'sifat' => 'B'],

            // Bawah PEM.03.01
            ['parent_id' => $pem_3_1, 'kode' => 'PEM.03.01.01', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi pelaksanaan tata operasional polisi pamong praja.', 'sifat' => 'B'],
            ['parent_id' => $pem_3_1, 'kode' => 'PEM.03.01.02', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi penyelesaian sengketa batas antar daerah.', 'sifat' => 'B'], // Disalin persis sesuai dokumen meskipun konteksnya aneh
            
            // Bawah PEM.03.02
            ['parent_id' => $pem_3_2, 'kode' => 'PEM.03.02.01', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi penyusunan program peningkatan kapasitas aparatur polisi pamong praja.', 'sifat' => 'B'],
            ['parent_id' => $pem_3_2, 'kode' => 'PEM.03.02.02', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi pengembangan dan evaluasi peningkatan kapasitas aparatur polisi pamong praja.', 'sifat' => 'B'],
            
            // Bawah PEM.03.03
            ['parent_id' => $pem_3_3, 'kode' => 'PEM.03.03.01', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi pelaksanaan perlindungan masyarakat.', 'sifat' => 'B'],
            ['parent_id' => $pem_3_3, 'kode' => 'PEM.03.03.02', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi pengembangan dan evaluasi peningkatan kapasitas aparatur polisi pamong praja.', 'sifat' => 'B'],
            ['parent_id' => $pem_3_3, 'kode' => 'PEM.03.03.03', 'nama' => 'Fasilitas,koordinasi,pembinaan dan pengawasan, serta monitoring dan evaluasi pembinaan aparatur dan kelembagaan perlindungan masyarakat.', 'sifat' => 'B'],
            
            // Bawah PEM.03.04
            ['parent_id' => $pem_3_4, 'kode' => 'PEM.03.04.01', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi pembinaan operasional penyidik PNS.', 'sifat' => 'B'],
            
            // Bawah PEM.03.05
            ['parent_id' => $pem_3_5, 'kode' => 'PEM.03.05.01', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi pelaksanaan supervisi hak asasi manusia.', 'sifat' => 'B'],
            ['parent_id' => $pem_3_5, 'kode' => 'PEM.03.05.02', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi konvensi internasional.', 'sifat' => 'B'],

            // Bawah PEM.04.01
            ['parent_id' => $pem_4_1, 'kode' => 'PEM.04.01.01', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi penyelenggaraan pemerintahan pada kawasan sumberdaya alam yang mencakup kawasan hutan, tambang, pertanian, dan lingkungan.', 'sifat' => 'B'],
            
            // Bawah PEM.04.02
            ['parent_id' => $pem_4_2, 'kode' => 'PEM.04.02.01', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi penyelenggaraan pemerintahan pada kawasan perhubungan darat, laut dan udara.', 'sifat' => 'B'],
            
            // Bawah PEM.04.03
            ['parent_id' => $pem_4_3, 'kode' => 'PEM.04.03.01', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi penyelenggaraan pemerintahan pada kawasa, mencakup kawasan hutan.', 'sifat' => 'B'],
            
            // Bawah PEM.04.04
            ['parent_id' => $pem_4_4, 'kode' => 'PEM.04.04.01', 'nama' => 'Penyelenggaraan urusan pertanahan.', 'sifat' => 'B'],
            ['parent_id' => $pem_4_4, 'kode' => 'PEM.04.04.02', 'nama' => 'Penyelesaian sengketa pertanahan.', 'sifat' => 'B'],
            ['parent_id' => $pem_4_4, 'kode' => 'PEM.04.04.03', 'nama' => 'Evaluasi penataan kawasan khusus.', 'sifat' => 'B'],
            
            // Bawah PEM.04.05
            ['parent_id' => $pem_4_5, 'kode' => 'PEM.04.05.01', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi penyelenggaraan pemerintahan pada kawasan perairan, kelautan dan kedirgantaraan.', 'sifat' => 'B'],
            ['parent_id' => $pem_4_5, 'kode' => 'PEM.04.05.02', 'nama' => 'Fasilitasi, koordinasi, pembinaan dan pengawasan, serta monitoring dan evaluasi pembinaan kawasan perairan, kelautan dan kedirgantaraan.', 'sifat' => 'B'],

            // Bawah PEM.05.01
            ['parent_id' => $pem_5_1, 'kode' => 'PEM.05.01.01', 'nama' => 'Evaluasi pelaksanaan pencegahan bencana dan mitigasi bencana.', 'sifat' => 'B'],
            
            // Bawah PEM.05.02
            ['parent_id' => $pem_5_2, 'kode' => 'PEM.05.02.01', 'nama' => 'Pengembangan kerjasama kelembagaan serta penaggulangan bencana ( fasilitasi, database rawan bencana,koordinasi, fasilitasi srta koordinasi tanggap darurat penanggulangan bencana).', 'sifat' => 'B'],
            
            // Bawah PEM.05.03
            ['parent_id' => $pem_5_3, 'kode' => 'PEM.05.03.01', 'nama' => 'Evaluasi standardisasi aplikasi peralatan penyelenggaraan penangulangan bencana.', 'sifat' => 'B'],
            ['parent_id' => $pem_5_3, 'kode' => 'PEM.05.03.02', 'nama' => 'Evaluasi pengembangan informasi dan teknologi penyelenggaraan penaggulangan bencana.', 'sifat' => 'B'],
            
            // Bawah PEM.05.04
            ['parent_id' => $pem_5_4, 'kode' => 'PEM.05.04.01', 'nama' => 'Evaluasi pengembangan pemberdayaan masyarakat dibidang pencegahan dan penanggulangan kebakaran.', 'sifat' => 'B'],
            ['parent_id' => $pem_5_4, 'kode' => 'PEM.05.04.02', 'nama' => 'Evaluasi peningkatan kapasitas aparatur pemadam kebakaran.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: OD, BP, PMD
        // ==============================================================================
        $id_od = DB::table('klasifikasis')->where('kode', 'OD')->value('id');
        $id_bp = DB::table('klasifikasis')->where('kode', 'BP')->value('id');
        $id_pmd = DB::table('klasifikasis')->where('kode', 'PMD')->value('id');

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Anak OD (Otonomi Daerah)
            ['parent_id' => $id_od, 'kode' => 'OD.01', 'nama' => 'Penyelenggaraan Pemerintah:', 'sifat' => 'B'],
            ['parent_id' => $id_od, 'kode' => 'OD.02', 'nama' => 'Fasilitasi, Monitoring, dan Evaluasi Penataan Daerah, Pembinaan Daerah Pemekaran.', 'sifat' => 'B'],
            ['parent_id' => $id_od, 'kode' => 'OD.03', 'nama' => 'Fasilitasi, Monitoring, dan Evaluasi Kepala Daerah, DPRD, dan Hubungan Antar Lembaga:', 'sifat' => 'B'],
            ['parent_id' => $id_od, 'kode' => 'OD.04', 'nama' => 'Fasilitasi, Monitoring, dan Evaluasi Peningkatan Kapasitas dan Evaluasi Kinerja Daerah:', 'sifat' => 'B'],

            // Anak BP (Bina Pembangunan)
            ['parent_id' => $id_bp, 'kode' => 'BP.01', 'nama' => 'Perencanaan Pembangunan Daerah / Per Wilayah.', 'sifat' => 'B'],
            ['parent_id' => $id_bp, 'kode' => 'BP.02', 'nama' => 'Pengembangan Wilayah:', 'sifat' => 'B'],
            ['parent_id' => $id_bp, 'kode' => 'BP.03', 'nama' => 'Fasilitasi Penataan Ruang dan Lingkungan Hidup:', 'sifat' => 'B'],
            ['parent_id' => $id_bp, 'kode' => 'BP.04', 'nama' => 'Pengembangan Ekonomi Daerah:', 'sifat' => 'B'],

            // Anak PMD (Pemberdayaan Masyarakat Dan Desa)
            ['parent_id' => $id_pmd, 'kode' => 'PMD.01', 'nama' => 'Pemerintahan Desa dan Kelurahan:', 'sifat' => 'B'],
            ['parent_id' => $id_pmd, 'kode' => 'PMD.02', 'nama' => 'Kelembagaan dan Pelatihan Masyarakat:', 'sifat' => 'B'],
            ['parent_id' => $id_pmd, 'kode' => 'PMD.03', 'nama' => 'Pemberdayaan Adat dan Sosial Budaya Masyarakat:', 'sifat' => 'B'],
            ['parent_id' => $id_pmd, 'kode' => 'PMD.04', 'nama' => 'Usaha Ekonomi Masyarakat:', 'sifat' => 'B'],
            // PMD.05 Hilang dari dokumen
            ['parent_id' => $id_pmd, 'kode' => 'PMD.06', 'nama' => 'Sumberdaya Alam dan Teknologi Tepat Guna Perdesaan:', 'sifat' => 'B'],
            ['parent_id' => $id_pmd, 'kode' => 'PMD.07', 'nama' => 'Kependudukan Dan Pencatatan Sipil', 'sifat' => 'B'], // Nyasar ke PMD
        ]);

        $od_1 = DB::table('klasifikasis')->where('kode', 'OD.01')->value('id');
        $od_3 = DB::table('klasifikasis')->where('kode', 'OD.03')->value('id');
        $od_4 = DB::table('klasifikasis')->where('kode', 'OD.04')->value('id');

        $bp_2 = DB::table('klasifikasis')->where('kode', 'BP.02')->value('id');
        $bp_3 = DB::table('klasifikasis')->where('kode', 'BP.03')->value('id');
        $bp_4 = DB::table('klasifikasis')->where('kode', 'BP.04')->value('id');

        $pmd_1 = DB::table('klasifikasis')->where('kode', 'PMD.01')->value('id');
        $pmd_2 = DB::table('klasifikasis')->where('kode', 'PMD.02')->value('id');
        $pmd_3 = DB::table('klasifikasis')->where('kode', 'PMD.03')->value('id');
        $pmd_4 = DB::table('klasifikasis')->where('kode', 'PMD.04')->value('id');
        $pmd_6 = DB::table('klasifikasis')->where('kode', 'PMD.06')->value('id');
        $pmd_7 = DB::table('klasifikasis')->where('kode', 'PMD.07')->value('id');

        // --- LEVEL 3 (CUCU) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah OD.01
            ['parent_id' => $od_1, 'kode' => 'OD.01.01', 'nama' => 'Fasilitasi, Bimbingan, Pengawasan, Monitoring dan Evaluasi:', 'sifat' => 'B'],
            // Bawah OD.03
            ['parent_id' => $od_3, 'kode' => 'OD.03.01', 'nama' => 'Penyelenggaraan pemilihan umum kepala daerah.', 'sifat' => 'B'],
            ['parent_id' => $od_3, 'kode' => 'OD.03.02', 'nama' => 'Administrasi kepala daerah dan DPRD.', 'sifat' => 'B'],
            ['parent_id' => $od_3, 'kode' => 'OD.03.03', 'nama' => 'Penyiapan perumusan kebijakan pemberdayaan kapasitas kepala daerah dan DPRD di bidang pemerintahan.', 'sifat' => 'B'],
            ['parent_id' => $od_3, 'kode' => 'OD.03.04', 'nama' => 'Hubungan antar lembaga daerah (pemerintah daerah dan DPRD).', 'sifat' => 'B'],
            ['parent_id' => $od_3, 'kode' => 'OD.03.05', 'nama' => 'Asosiasi Daerah.', 'sifat' => 'B'],
            // Bawah OD.04
            ['parent_id' => $od_4, 'kode' => 'OD.04.01', 'nama' => 'Kinerja penyelenggaraan pemerintahan daerah.', 'sifat' => 'B'],
            ['parent_id' => $od_4, 'kode' => 'OD.04.02', 'nama' => 'Kemampuan penyelenggaraan otonomi daerah.', 'sifat' => 'B'],
            ['parent_id' => $od_4, 'kode' => 'OD.04.03', 'nama' => 'Pengembangan kapasitas daerah.', 'sifat' => 'B'],

            // Bawah BP.02
            ['parent_id' => $bp_2, 'kode' => 'BP.02.01', 'nama' => 'Penyusunan pedoman penyerasian pengembangan wilayah.', 'sifat' => 'B'],
            ['parent_id' => $bp_2, 'kode' => 'BP.02.02', 'nama' => 'Penyusunan dan pemutahiran basis data dan informasi pengembangan wilayah.', 'sifat' => 'B'],
            ['parent_id' => $bp_2, 'kode' => 'BP.02.03', 'nama' => 'Penyusunan dan laporan evaluasi pelaksanaan kebijakan pengembangan wilayah.', 'sifat' => 'B'],
            ['parent_id' => $bp_2, 'kode' => 'BP.02.04', 'nama' => 'Kawasan Strategis dan Andalan ( Evaluasi pengembangan data, pengembangan kawasan strategis dan andalan ).', 'sifat' => 'B'],
            ['parent_id' => $bp_2, 'kode' => 'BP.02.05', 'nama' => 'Wilayah Tertinggal.', 'sifat' => 'B'],
            ['parent_id' => $bp_2, 'kode' => 'BP.02.06', 'nama' => 'Wilayah Pesisir Laut dan Pulau-Pulau Kecil:', 'sifat' => 'B'],
            // Bawah BP.03
            ['parent_id' => $bp_3, 'kode' => 'BP.03.01', 'nama' => 'Penataan Ruang dan Wilayah:', 'sifat' => 'B'],
            ['parent_id' => $bp_3, 'kode' => 'BP.03.02', 'nama' => 'Penataan Ruang Kawasan:', 'sifat' => 'B'],
            ['parent_id' => $bp_3, 'kode' => 'BP.03.03', 'nama' => 'Konservasi dan Rehabilitasi:', 'sifat' => 'B'],
            ['parent_id' => $bp_3, 'kode' => 'BP.03.04', 'nama' => 'Perencanaan dan Pemanfaatan Sumberdaya Air:', 'sifat' => 'B'],
            ['parent_id' => $bp_3, 'kode' => 'BP.03.05', 'nama' => 'Pengendalian Lingkungan Hidup:', 'sifat' => 'B'],
            // Bawah BP.04
            ['parent_id' => $bp_4, 'kode' => 'BP.04.01', 'nama' => 'Pengembangan Potensi Ekonomi Daerah.', 'sifat' => 'B'],
            ['parent_id' => $bp_4, 'kode' => 'BP.04.02', 'nama' => 'Promosi dan Investasi Daerah:', 'sifat' => 'B'],
            ['parent_id' => $bp_4, 'kode' => 'BP.04.03', 'nama' => 'Sarana dan Prasarana Perekonomian daerah:', 'sifat' => 'B'],
            ['parent_id' => $bp_4, 'kode' => 'BP.04.04', 'nama' => 'Kemitraan Usaha:', 'sifat' => 'B'],
            ['parent_id' => $bp_4, 'kode' => 'BP.04.05', 'nama' => 'Kelembagaan Ekonomi Daerah:', 'sifat' => 'B'],

            // Bawah PMD.01
            ['parent_id' => $pmd_1, 'kode' => 'PMD.01.01', 'nama' => 'Fasilitasi Pengembangan Desa dan Kelurahan:', 'sifat' => 'B'],
            ['parent_id' => $pmd_1, 'kode' => 'PMD.01.02', 'nama' => 'Administrasi Pemerintahan Desa dan Kelurahan:', 'sifat' => 'B'],
            ['parent_id' => $pmd_1, 'kode' => 'PMD.01.03', 'nama' => 'Fasilitasi Permusyawaratan Desa:', 'sifat' => 'B'],
            ['parent_id' => $pmd_1, 'kode' => 'PMD.01.04', 'nama' => 'Fasilitasi Pengelolaan Keuangan dan Aset Desa:', 'sifat' => 'B'],
            ['parent_id' => $pmd_1, 'kode' => 'PMD.01.05', 'nama' => 'Pengembangan Kapasitas Desa:', 'sifat' => 'B'],
            // Bawah PMD.02
            ['parent_id' => $pmd_2, 'kode' => 'PMD.02.01', 'nama' => 'Lembaga Masyarakat:', 'sifat' => 'B'],
            ['parent_id' => $pmd_2, 'kode' => 'PMD.02.02', 'nama' => 'Pembangunan Partisipatif:', 'sifat' => 'B'],
            ['parent_id' => $pmd_2, 'kode' => 'PMD.02.03', 'nama' => 'Pendataan Potensi Masyarakat:', 'sifat' => 'B'],
            ['parent_id' => $pmd_2, 'kode' => 'PMD.02.04', 'nama' => 'Pengembangan Kawasan Perdesaan:', 'sifat' => 'B'],
            ['parent_id' => $pmd_2, 'kode' => 'PMD.02.05', 'nama' => 'Pelatihan Masyarakat:', 'sifat' => 'B'],
            ['parent_id' => $pmd_2, 'kode' => 'PMD.02.06', 'nama' => 'Evaluasi pelatihan masyarakat:', 'sifat' => 'B'],
            // Bawah PMD.03
            ['parent_id' => $pmd_3, 'kode' => 'PMD.03.01', 'nama' => 'Budaya Nusantara:', 'sifat' => 'B'],
            ['parent_id' => $pmd_3, 'kode' => 'PMD.03.02', 'nama' => 'Pemberdayaan Perempuan:', 'sifat' => 'B'],
            ['parent_id' => $pmd_3, 'kode' => 'PMD.03.03', 'nama' => 'Pemberdayaan dan Kesejahteraan Keluarga:', 'sifat' => 'B'],
            ['parent_id' => $pmd_3, 'kode' => 'PMD.03.04', 'nama' => 'Kesejahteraan Sosial:', 'sifat' => 'B'],
            ['parent_id' => $pmd_3, 'kode' => 'PMD.03.05', 'nama' => 'Tenaga Kerja Perdesaan:', 'sifat' => 'B'],
            // Bawah PMD.04
            ['parent_id' => $pmd_4, 'kode' => 'PMD.04.01', 'nama' => 'Usaha Pertanian dan Pangan:', 'sifat' => 'B'],
            ['parent_id' => $pmd_4, 'kode' => 'PMD.04.02', 'nama' => 'Usaha Perkreditan dan Simpan Pinjam:', 'sifat' => 'B'],
            ['parent_id' => $pmd_4, 'kode' => 'PMD.04.03', 'nama' => 'Produksi dan Pemasaran:', 'sifat' => 'B'],
            ['parent_id' => $pmd_4, 'kode' => 'PMD.04.04', 'nama' => 'Usaha Ekonomi dan Keluarga:', 'sifat' => 'B'],
            ['parent_id' => $pmd_4, 'kode' => 'PMD.04.05', 'nama' => 'Ekonomi Perdesaan dan Masyarakat Tertinggal:', 'sifat' => 'B'],
            // Bawah PMD.06
            ['parent_id' => $pmd_6, 'kode' => 'PMD.06.01', 'nama' => 'Fasilitasi Konservasi dan Rehabilitasi Lingkungan Perdesaan:', 'sifat' => 'B'],
            ['parent_id' => $pmd_6, 'kode' => 'PMD.06.02', 'nama' => 'Fasilitasi Pemanfaatan lahan dan Pesisir Perdesaan:', 'sifat' => 'B'],
            ['parent_id' => $pmd_6, 'kode' => 'PMD.06.03', 'nama' => 'Fasilitasi Prasarana dan Sarana Perdesaan:', 'sifat' => 'B'],
            ['parent_id' => $pmd_6, 'kode' => 'PMD.06.04', 'nama' => 'Fasilitasi Pemetaan Kebutuhan dan Pengkajian Teknologi Perdesaan:', 'sifat' => 'B'],
            ['parent_id' => $pmd_6, 'kode' => 'PMD.06.05', 'nama' => 'Pemasyarakatan dan Kerjasama Teknologi Perdesaan:', 'sifat' => 'B'],
            // Bawah PMD.07
            ['parent_id' => $pmd_7, 'kode' => 'PMD.07.01', 'nama' => 'Identitas Penduduk', 'sifat' => 'B'],
            ['parent_id' => $pmd_7, 'kode' => 'PMD.07.02', 'nama' => 'Pindah Datang Penduduk dalam Wilayah NKRI', 'sifat' => 'B'],
            ['parent_id' => $pmd_7, 'kode' => 'PMD.07.03', 'nama' => 'Pindah Datang Penduduk Antar Negara', 'sifat' => 'B'],
            ['parent_id' => $pmd_7, 'kode' => 'PMD.07.04', 'nama' => 'Pendataan Penduduk Rentan', 'sifat' => 'B'],
        ]);

        // Mengambil ID Level 3 untuk cucu (Level 4)
        $od_1_1 = DB::table('klasifikasis')->where('kode', 'OD.01.01')->value('id');
        
        $bp_2_5 = DB::table('klasifikasis')->where('kode', 'BP.02.05')->value('id');
        $bp_2_6 = DB::table('klasifikasis')->where('kode', 'BP.02.06')->value('id');
        $bp_3_1 = DB::table('klasifikasis')->where('kode', 'BP.03.01')->value('id');
        $bp_3_2 = DB::table('klasifikasis')->where('kode', 'BP.03.02')->value('id');
        $bp_3_3 = DB::table('klasifikasis')->where('kode', 'BP.03.03')->value('id');
        $bp_3_4 = DB::table('klasifikasis')->where('kode', 'BP.03.04')->value('id');
        $bp_3_5 = DB::table('klasifikasis')->where('kode', 'BP.03.05')->value('id');
        $bp_4_1 = DB::table('klasifikasis')->where('kode', 'BP.04.01')->value('id');
        $bp_4_2 = DB::table('klasifikasis')->where('kode', 'BP.04.02')->value('id');
        $bp_4_3 = DB::table('klasifikasis')->where('kode', 'BP.04.03')->value('id');
        $bp_4_4 = DB::table('klasifikasis')->where('kode', 'BP.04.04')->value('id');
        $bp_4_5 = DB::table('klasifikasis')->where('kode', 'BP.04.05')->value('id');

        $pmd_1_1 = DB::table('klasifikasis')->where('kode', 'PMD.01.01')->value('id');
        $pmd_1_2 = DB::table('klasifikasis')->where('kode', 'PMD.01.02')->value('id');
        $pmd_1_3 = DB::table('klasifikasis')->where('kode', 'PMD.01.03')->value('id');
        $pmd_1_4 = DB::table('klasifikasis')->where('kode', 'PMD.01.04')->value('id');
        $pmd_1_5 = DB::table('klasifikasis')->where('kode', 'PMD.01.05')->value('id');
        
        $pmd_2_1 = DB::table('klasifikasis')->where('kode', 'PMD.02.01')->value('id');
        $pmd_2_2 = DB::table('klasifikasis')->where('kode', 'PMD.02.02')->value('id');
        $pmd_2_3 = DB::table('klasifikasis')->where('kode', 'PMD.02.03')->value('id');
        $pmd_2_4 = DB::table('klasifikasis')->where('kode', 'PMD.02.04')->value('id');
        $pmd_2_5 = DB::table('klasifikasis')->where('kode', 'PMD.02.05')->value('id');
        $pmd_2_6 = DB::table('klasifikasis')->where('kode', 'PMD.02.06')->value('id');
        
        $pmd_3_1 = DB::table('klasifikasis')->where('kode', 'PMD.03.01')->value('id');
        $pmd_3_2 = DB::table('klasifikasis')->where('kode', 'PMD.03.02')->value('id');
        $pmd_3_3 = DB::table('klasifikasis')->where('kode', 'PMD.03.03')->value('id');
        $pmd_3_4 = DB::table('klasifikasis')->where('kode', 'PMD.03.04')->value('id');
        $pmd_3_5 = DB::table('klasifikasis')->where('kode', 'PMD.03.05')->value('id');
        
        $pmd_4_1 = DB::table('klasifikasis')->where('kode', 'PMD.04.01')->value('id');
        $pmd_4_2 = DB::table('klasifikasis')->where('kode', 'PMD.04.02')->value('id');
        $pmd_4_3 = DB::table('klasifikasis')->where('kode', 'PMD.04.03')->value('id');
        $pmd_4_4 = DB::table('klasifikasis')->where('kode', 'PMD.04.04')->value('id');
        $pmd_4_5 = DB::table('klasifikasis')->where('kode', 'PMD.04.05')->value('id');
        
        $pmd_6_1 = DB::table('klasifikasis')->where('kode', 'PMD.06.01')->value('id');
        $pmd_6_2 = DB::table('klasifikasis')->where('kode', 'PMD.06.02')->value('id');
        $pmd_6_3 = DB::table('klasifikasis')->where('kode', 'PMD.06.03')->value('id');
        $pmd_6_4 = DB::table('klasifikasis')->where('kode', 'PMD.06.04')->value('id');
        $pmd_6_5 = DB::table('klasifikasis')->where('kode', 'PMD.06.05')->value('id'); 
        
        $pmd_7_1 = DB::table('klasifikasis')->where('kode', 'PMD.07.01')->value('id');
        $pmd_7_2 = DB::table('klasifikasis')->where('kode', 'PMD.07.02')->value('id');
        $pmd_7_3 = DB::table('klasifikasis')->where('kode', 'PMD.07.03')->value('id');

        

        // --- LEVEL 4 (CICIT) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah OD.01.01
            ['parent_id' => $od_1_1, 'kode' => 'OD.01.01.01', 'nama' => 'Pelaksanaan urusan pemerintahan daerah.', 'sifat' => 'B'],
            ['parent_id' => $od_1_1, 'kode' => 'OD.01.01.02', 'nama' => 'Penyusunan standar pelayanan minimal.', 'sifat' => 'B'],

            // Bawah BP.02.05
            ['parent_id' => $bp_2_5, 'kode' => 'BP.02.05.01', 'nama' => 'Penyusunan data dan pemutahiran basis dan data informasi pengembangan wilayah tertinggal.', 'sifat' => 'B'],
            ['parent_id' => $bp_2_5, 'kode' => 'BP.02.05.02', 'nama' => 'Penyusunan laporan evaluasi pelaksannaan kebijakan pengembangan wialayah tertinggal.', 'sifat' => 'B'], // Typo dokumen "pelaksannaan" & "wialayah"
            // Bawah BP.02.06
            ['parent_id' => $bp_2_6, 'kode' => 'BP.02.06.01', 'nama' => 'Penyusunan masterplan dan evaluasi pelaksanaan kebijakan pengembangan wilayah.', 'sifat' => 'B'],
            ['parent_id' => $bp_2_6, 'kode' => 'BP.02.06.02', 'nama' => 'Penyusunan dan pemutahiran basis data dan informasi pengembangan wilayah pesisir.', 'sifat' => 'B'],
            // Bawah BP.03.01
            ['parent_id' => $bp_3_1, 'kode' => 'BP.03.01.01', 'nama' => 'Evaluasi perencanaan, pemanfaatan tata ruang wilayah.', 'sifat' => 'B'],
            ['parent_id' => $bp_3_1, 'kode' => 'BP.03.01.02', 'nama' => 'Evaluasi pelaksanaan penyerasian dan pengendalian tata ruang wilayah.', 'sifat' => 'B'],
            ['parent_id' => $bp_3_1, 'kode' => 'BP.03.01.03', 'nama' => 'Implementasi pemanfaatan dan pengendalian tata ruang.', 'sifat' => 'B'],
            // Bawah BP.03.02
            ['parent_id' => $bp_3_2, 'kode' => 'BP.03.02.01', 'nama' => 'Evaluasi tata ruang kawasan.', 'sifat' => 'B'],
            ['parent_id' => $bp_3_2, 'kode' => 'BP.03.02.02', 'nama' => 'Pembinaan tata ruang kawasan.', 'sifat' => 'B'],
            ['parent_id' => $bp_3_2, 'kode' => 'BP.03.02.03', 'nama' => 'Implementasi.', 'sifat' => 'B'],
            // Bawah BP.03.03
            ['parent_id' => $bp_3_3, 'kode' => 'BP.03.03.01', 'nama' => 'Evaluasi pelaksanaan konservasi.', 'sifat' => 'B'],
            ['parent_id' => $bp_3_3, 'kode' => 'BP.03.03.02', 'nama' => 'Evaluasi pelaksanaan rehabilitasi.', 'sifat' => 'B'],
            ['parent_id' => $bp_3_3, 'kode' => 'BP.03.03.03', 'nama' => 'Implementasi.', 'sifat' => 'B'],
            // Bawah BP.03.04
            ['parent_id' => $bp_3_4, 'kode' => 'BP.03.04.01', 'nama' => 'Evaluasi pengembangan potensi sumber daya air.', 'sifat' => 'B'],
            ['parent_id' => $bp_3_4, 'kode' => 'BP.03.04.02', 'nama' => 'Evaluasi pemanfaatan sumber daya air.', 'sifat' => 'B'],
            ['parent_id' => $bp_3_4, 'kode' => 'BP.03.04.03', 'nama' => 'Implementasi.', 'sifat' => 'B'],
            // Bawah BP.03.05
            ['parent_id' => $bp_3_5, 'kode' => 'BP.03.05.01', 'nama' => 'Pengembangan instrumen kelembagaan lingkungan hidup.', 'sifat' => 'B'],
            ['parent_id' => $bp_3_5, 'kode' => 'BP.03.05.02', 'nama' => 'Analisis dan audit pengelolaan sumber daya alam dan lingkungan hidup.', 'sifat' => 'B'],
            // Bawah BP.04.01
            ['parent_id' => $bp_4_1, 'kode' => 'BP.04.01.01', 'nama' => 'Identifikasi produk unggulan dan analisis potensi ekonomi daerah.', 'sifat' => 'B'],
            ['parent_id' => $bp_4_1, 'kode' => 'BP.04.01.02', 'nama' => 'Pengembangan produk unggulan dan pemanfaatan potensi ekonomi daerah.', 'sifat' => 'B'],
            // Bawah BP.04.02
            ['parent_id' => $bp_4_2, 'kode' => 'BP.04.02.01', 'nama' => 'Pelaksanaan promosi ekonomi daerah.', 'sifat' => 'B'],
            ['parent_id' => $bp_4_2, 'kode' => 'BP.04.02.02', 'nama' => 'Pelaksanaan investasi daerah.', 'sifat' => 'B'],
            // Bawah BP.04.03
            ['parent_id' => $bp_4_3, 'kode' => 'BP.04.03.01', 'nama' => 'Pelaksanaan pengembangan perdagangan daerah.', 'sifat' => 'B'],
            ['parent_id' => $bp_4_3, 'kode' => 'BP.04.03.02', 'nama' => 'Pelaksanaan perindustrian daerah.', 'sifat' => 'B'],
            // Bawah BP.04.04
            ['parent_id' => $bp_4_4, 'kode' => 'BP.04.04.01', 'nama' => 'Perencanaan dan pengembangan kemitraan usaha ekonomi daerah.', 'sifat' => 'B'],
            ['parent_id' => $bp_4_4, 'kode' => 'BP.04.04.02', 'nama' => 'Pengelolaan kemitraan usaha ekonomi daerah.', 'sifat' => 'B'],
            // Bawah BP.04.05
            ['parent_id' => $bp_4_5, 'kode' => 'BP.04.05.01', 'nama' => 'Pelaksanaan pengembangan kelembagaan ekonomi daerah.', 'sifat' => 'B'],
            ['parent_id' => $bp_4_5, 'kode' => 'BP.04.05.02', 'nama' => 'Penguatan kapasitas kelembagaan ekonomi daerah.', 'sifat' => 'B'],

            // Bawah PMD.01.01
            ['parent_id' => $pmd_1_1, 'kode' => 'PMD.01.01.01', 'nama' => 'Fasilitasi Pengembangan Desa dan Kelurahan.', 'sifat' => 'B'],
            ['parent_id' => $pmd_1_1, 'kode' => 'PMD.01.01.01_2', 'nama' => 'Pelaksanaan pengembangan desa.', 'sifat' => 'B'], // Typo 01 kembar di dokumen
            ['parent_id' => $pmd_1_1, 'kode' => 'PMD.01.01.02', 'nama' => 'Pelaksanaan pengembangan kelurahan.', 'sifat' => 'B'],
            // Bawah PMD.01.02
            ['parent_id' => $pmd_1_2, 'kode' => 'PMD.01.02.01', 'nama' => 'Pembinaan administrasi pemerintahan desa.', 'sifat' => 'B'],
            ['parent_id' => $pmd_1_2, 'kode' => 'PMD.01.02.02', 'nama' => 'Pembinaan administrasi pemerintahan kelurahan.', 'sifat' => 'B'],
            // Bawah PMD.01.03
            ['parent_id' => $pmd_1_3, 'kode' => 'PMD.01.03.01', 'nama' => 'Pelaksanaan penataan kelembagaan badan permusyawaratan desa.', 'sifat' => 'B'],
            ['parent_id' => $pmd_1_3, 'kode' => 'PMD.01.03.02', 'nama' => 'Pelaksanaan penataan kewenangan badan permusyawaratan desa.', 'sifat' => 'B'],
            // Bawah PMD.01.04
            ['parent_id' => $pmd_1_4, 'kode' => 'PMD.01.04.01', 'nama' => 'Pembinaan pengelolaan keuangan desa.', 'sifat' => 'B'],
            ['parent_id' => $pmd_1_4, 'kode' => 'PMD.01.04.02', 'nama' => 'Pelaksanaan pengelolaan aset desa.', 'sifat' => 'B'],
            // Bawah PMD.01.05
            ['parent_id' => $pmd_1_5, 'kode' => 'PMD.01.05.01', 'nama' => 'Pelaksanaan pengembangan kapasitas pemerintahan desa dan kelurahan.', 'sifat' => 'B'],
            ['parent_id' => $pmd_1_5, 'kode' => 'PMD.01.05.02', 'nama' => 'Pelaksanaan pengembangan kapasitas badan permusyawaratan desa dan masyarakat.', 'sifat' => 'B'],
            
            // Bawah PMD.02.01
            ['parent_id' => $pmd_2_1, 'kode' => 'PMD.02.01.01', 'nama' => 'Pembinaan penataan lembaga masyarakat di desa.', 'sifat' => 'B'],
            ['parent_id' => $pmd_2_1, 'kode' => 'PMD.02.01.02', 'nama' => 'Pelaksanaan kerjasama lembaga masyarakat.', 'sifat' => 'B'],
            // Bawah PMD.02.02
            ['parent_id' => $pmd_2_2, 'kode' => 'PMD.02.02.01', 'nama' => 'Pelaksanaan pengembangan metode pembangunan partisipatif.', 'sifat' => 'B'],
            ['parent_id' => $pmd_2_2, 'kode' => 'PMD.02.02.02', 'nama' => 'Pelaporan kinerja pembangunan desa.', 'sifat' => 'B'],
            // Bawah PMD.02.03
            ['parent_id' => $pmd_2_3, 'kode' => 'PMD.02.03.01', 'nama' => 'Inventarisasi potensi masyarakat (profil desa).', 'sifat' => 'B'],
            ['parent_id' => $pmd_2_3, 'kode' => 'PMD.02.03.02', 'nama' => 'Evaluasi perkembangan masyarakat.', 'sifat' => 'B'],
            // Bawah PMD.02.04
            ['parent_id' => $pmd_2_4, 'kode' => 'PMD.02.04.01', 'nama' => 'Pelaksanaan identifikasi dan analisa penataan ruang kawasan perdesaan.', 'sifat' => 'B'],
            ['parent_id' => $pmd_2_4, 'kode' => 'PMD.02.04.02', 'nama' => 'Pelaksanaan penataan pengembangan terpadu kawasan perdesaan.', 'sifat' => 'B'],
            // Bawah PMD.02.05
            ['parent_id' => $pmd_2_5, 'kode' => 'PMD.02.05.01', 'nama' => 'Pelaksanaan penyusunan dan pengembangan kurikulum pelatihan masyarakat ( grand design pelatihan masyarakat, pedoman pelatihan masyarakat, fasilitasi, monitoring dan evaluasi pelatihan masyarakat, penyelenggaraan pelatihan dan monitoring dan evaluasi).', 'sifat' => 'B'],
            // Bawah PMD.02.06
            ['parent_id' => $pmd_2_6, 'kode' => 'PMD.02.06.01', 'nama' => 'Penyelenggaraan pelatihan.', 'sifat' => 'B'],
            ['parent_id' => $pmd_2_6, 'kode' => 'PMD.02.06.02', 'nama' => 'Monitoring dan evaluasi.', 'sifat' => 'B'],

            // Bawah PMD.03.01
            ['parent_id' => $pmd_3_1, 'kode' => 'PMD.03.01.01', 'nama' => 'Pelaksanaan pemberdayaan masyarakat.', 'sifat' => 'B'],
            ['parent_id' => $pmd_3_1, 'kode' => 'PMD.03.01.02', 'nama' => 'Pelaksanaan kerjasama adat istiadatat.', 'sifat' => 'B'],
            // Bawah PMD.03.02
            ['parent_id' => $pmd_3_2, 'kode' => 'PMD.03.02.01', 'nama' => 'Pelaksanaan peningkatan perberdayaan perempuan.', 'sifat' => 'B'],
            ['parent_id' => $pmd_3_2, 'kode' => 'PMD.03.02.02', 'nama' => 'Pembinaan, perlindungan hak-hak perempuan dan ketidaksetaraan gender.', 'sifat' => 'B'],
            // Bawah PMD.03.03
            ['parent_id' => $pmd_3_3, 'kode' => 'PMD.03.03.01', 'nama' => 'Pelaksanaan pemberdayaan keluarga.', 'sifat' => 'B'],
            ['parent_id' => $pmd_3_3, 'kode' => 'PMD.03.03.02', 'nama' => 'Pembinaandan peningkatan kesejahteraan keluarga.', 'sifat' => 'B'],
            // Bawah PMD.03.04
            ['parent_id' => $pmd_3_4, 'kode' => 'PMD.03.04.01', 'nama' => 'Pelaksanaan peningkatan ksejahteraan sosial.', 'sifat' => 'B'], // Typo dokumen "ksejahteraan"
            ['parent_id' => $pmd_3_4, 'kode' => 'PMD.03.04.02', 'nama' => 'Pelaksanaan penanganan masalah sosial.', 'sifat' => 'B'],
            // Bawah PMD.03.05
            ['parent_id' => $pmd_3_5, 'kode' => 'PMD.03.05.01', 'nama' => 'Fasilitasi dan evaluasi pembinaan dan pembinaan tenaga kerja.', 'sifat' => 'B'],
            ['parent_id' => $pmd_3_5, 'kode' => 'PMD.03.05.02', 'nama' => 'Fasilitasi dan evaluasi pelaksanaan perlindungan tenaga kerja.', 'sifat' => 'B'],

            // Bawah PMD.04.01
            ['parent_id' => $pmd_4_1, 'kode' => 'PMD.04.01.01', 'nama' => 'Pembinaan dan pengembangan usaha pertanian, agribisnis dan Lumbung Pangan (identifikasi data pertanian, fasilitasi, ,monioring dan evaluasi).', 'sifat' => 'B'], // Typo ",monioring"
            // Bawah PMD.04.02
            ['parent_id' => $pmd_4_2, 'kode' => 'PMD.04.02.01', 'nama' => 'Pelaksanaan peningkatan kerjasama dan permodalan usaha perkreditan dan simpan pinjam (inventarisasi lembaga keuangan mikro yang belum berbadan hukum, inventarisasi dan pemetaan potensi desa, inventarisasi badan usaha milik desa , usaha ekonomi desa simpan pinjam, fasilitasi pembinaan, pendampingan dan pengawasan, monitoring dan evaluasi).', 'sifat' => 'B'],
            ['parent_id' => $pmd_4_2, 'kode' => 'PMD.04.02.02', 'nama' => 'Pelaksanaan peningkatan kapasitas kelembagaan usaha perkreditan dan simpan pinjam (fasilitasi pembinaan, pendampingan dan pengawasan, monitoring dan evaluasi).', 'sifat' => 'B'],
            ['parent_id' => $pmd_4_2, 'kode' => 'PMD.04.02.03', 'nama' => 'Pelaksanaan peningkatan kapasitas kelembagaan usaha perkreditan dan simpan pinjam (fasilitasi pembinaan, pendampingan dan pengawasan, monitoring dan evaluasi (fasilitasi pmbinaan, pendampingan dan pengawasan, monitoring dan evaluasi).', 'sifat' => 'B'], // Typo berulang di dokumen asli
            // Bawah PMD.04.03
            ['parent_id' => $pmd_4_3, 'kode' => 'PMD.04.03.01', 'nama' => 'Pelaksanaan pengembangan informasi pasar (identifikasi produk unggulan perdesaan, fasilitasi, monitoring dan evaluasi).', 'sifat' => 'B'],
            ['parent_id' => $pmd_4_3, 'kode' => 'PMD.04.03.02', 'nama' => 'Pelaksanaan diversifikasi pasar ( fasilitasi pengelolaan pasar desa, fasilitasi sarana dan prasarana desa, sistem penilaian kinerja pasar desa/lomba pasar desa, monitoring dan evaluasi, data pasar desa).', 'sifat' => 'B'],
            // Bawah PMD.04.04
            ['parent_id' => $pmd_4_4, 'kode' => 'PMD.04.04.01', 'nama' => 'Pelaksanaan peningkatan kewirausahaan dan perkoperasian (fasilitasi pengembangan usaha ekonomi keluarga).', 'sifat' => 'B'],
            ['parent_id' => $pmd_4_4, 'kode' => 'PMD.04.04.02', 'nama' => 'Pelaksanaan pengembangan usaha jasa dan industri kecil (penyusunan modul, fasilitasi, monitoring dan evaluasi).', 'sifat' => 'B'],
            // Bawah PMD.04.05
            ['parent_id' => $pmd_4_5, 'kode' => 'PMD.04.05.01', 'nama' => 'Ekonomi perdesaan (identifikasi dan inventarisasi pengembangan usaha ekonomi perdesaan, fasilitasi pengembangan usaha ekonomi perdesaan).', 'sifat' => 'B'],
            ['parent_id' => $pmd_4_5, 'kode' => 'PMD.04.05.02', 'nama' => 'Masyarakat tertinggal (identifikasi dan inventarisasi pengembangan masyarakat dan desa tertinggal, monitoring dan evaluasi).', 'sifat' => 'B'],

            // Bawah PMD.06.01
            ['parent_id' => $pmd_6_1, 'kode' => 'PMD.06.01.01', 'nama' => 'Pembinaan pengelolaan konservasi kawasan.', 'sifat' => 'B'],
            ['parent_id' => $pmd_6_1, 'kode' => 'PMD.06.01.02', 'nama' => 'Pelaksanaan rehabilitasi lingkungan.', 'sifat' => 'B'],
            // Bawah PMD.06.02
            ['parent_id' => $pmd_6_2, 'kode' => 'PMD.06.02.01', 'nama' => 'Pelaksanaan pengembangan dan pendayagunaan sumberdaya lahan perdesaan.', 'sifat' => 'B'],
            ['parent_id' => $pmd_6_2, 'kode' => 'PMD.06.02.02', 'nama' => 'Pelaksanaan pengembangan dan pendayagunaan sumber daya pesisir perdesaan.', 'sifat' => 'B'],
            // Bawah PMD.06.03
            ['parent_id' => $pmd_6_3, 'kode' => 'PMD.06.03.01', 'nama' => 'Pembinaan pengelolaan prasarana air dan sanitasi lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $pmd_6_3, 'kode' => 'PMD.06.03.02', 'nama' => 'Pembinaan pengelolaan prasarana dan sarana pemukiman.', 'sifat' => 'B'],
            // Bawah PMD.06.04
            ['parent_id' => $pmd_6_4, 'kode' => 'PMD.06.04.01', 'nama' => 'Pelaksanaan pemetaan kebutuhan teknologi perdesaan.', 'sifat' => 'B'],
            ['parent_id' => $pmd_6_4, 'kode' => 'PMD.06.04.02', 'nama' => 'Pelaksanaan pengkajian pemanfaatan teknologi perdesaan.', 'sifat' => 'B'],
            // Bawah PMD.06.05
            ['parent_id' => $pmd_6_5, 'kode' => 'PMD.06.05.01', 'nama' => 'Pelaksanaan pemasyarakatan teknologi perdesaan.', 'sifat' => 'B'],
            ['parent_id' => $pmd_6_5, 'kode' => 'PMD.06.05.02', 'nama' => 'Pelaksanaan kerjasama pengelolaan teknologi perdesaan.', 'sifat' => 'B'],

            // Bawah PMD.07.01
            ['parent_id' => $pmd_7_1, 'kode' => 'PMD.07.01.01', 'nama' => 'Fasilitasi pelaksanaan pelayanan kartu keluarga dan kartu tanda penduduk', 'sifat' => 'B'],
            ['parent_id' => $pmd_7_1, 'kode' => 'PMD.07.01.02', 'nama' => 'Penyiapan pemberian nomor kendali kartu keluarga dan kartu tanda penduduk', 'sifat' => 'B'],
            ['parent_id' => $pmd_7_1, 'kode' => 'PMD.07.01.03', 'nama' => 'Fasilitasi pencetakan dan distribusi blangko dokumen kependudukan', 'sifat' => 'B'],
            // Bawah PMD.07.02
            ['parent_id' => $pmd_7_2, 'kode' => 'PMD.07.02.01', 'nama' => 'Fasilitasi pelaksanaan pindah datang penduduk WNI', 'sifat' => 'B'],
            ['parent_id' => $pmd_7_2, 'kode' => 'PMD.07.02.02', 'nama' => 'Fasilitasi pelaksanaan pindah datang penduduk orang asing', 'sifat' => 'B'],
            ['parent_id' => $pmd_7_2, 'kode' => 'PMD.07.02.03', 'nama' => 'Fasilitasi pelaksanaan perubahan alamat', 'sifat' => 'B'],
            // Bawah PMD.07.03
            ['parent_id' => $pmd_7_3, 'kode' => 'PMD.07.03.01', 'nama' => 'Fasilitasi pelaksanaan pendaftaran perpindahan penduduk Indonesia keluar Negeri dan WNI dari luar negeri', 'sifat' => 'B'],
            ['parent_id' => $pmd_7_3, 'kode' => 'PMD.07.03.02', 'nama' => 'Fasilitasi pelaksanaan pendaftaran orang asing tinggal terbatas', 'sifat' => 'B'],
        ]);

        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: KH (Kehutanan)
        // ==============================================================================
        $id_kh = DB::table('klasifikasis')->where('kode', 'KH')->value('id');

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_kh, 'kode' => 'KH.01', 'nama' => 'Penyuluhan:', 'sifat' => 'B'],
            ['parent_id' => $id_kh, 'kode' => 'KH.02', 'nama' => 'Planologi Kehutanan:', 'sifat' => 'B'],
            ['parent_id' => $id_kh, 'kode' => 'KH.03', 'nama' => 'Bina Usaha Kehutanan:', 'sifat' => 'B'],
            ['parent_id' => $id_kh, 'kode' => 'KH.04', 'nama' => 'Standarisasi Dan Lingkungan:', 'sifat' => 'B'],
            ['parent_id' => $id_kh, 'kode' => 'KH.05', 'nama' => 'Perlindungan Hutan Dan Konservasi Alam:', 'sifat' => 'B'],
            // KH.06 hilang / loncat dari dokumen asli
            ['parent_id' => $id_kh, 'kode' => 'KH.07', 'nama' => 'Bina Pengelolaan Daerah Aliran Sungai Dan Perhutanan Sosial:', 'sifat' => 'B'],
            ['parent_id' => $id_kh, 'kode' => 'KH.08', 'nama' => 'Penelitian dan Pengembangan Kehutanan:', 'sifat' => 'B'],
        ]);

        $kh_1 = DB::table('klasifikasis')->where('kode', 'KH.01')->value('id');
        $kh_2 = DB::table('klasifikasis')->where('kode', 'KH.02')->value('id');
        $kh_3 = DB::table('klasifikasis')->where('kode', 'KH.03')->value('id');
        $kh_4 = DB::table('klasifikasis')->where('kode', 'KH.04')->value('id');
        $kh_5 = DB::table('klasifikasis')->where('kode', 'KH.05')->value('id');
        $kh_7 = DB::table('klasifikasis')->where('kode', 'KH.07')->value('id');
        $kh_8 = DB::table('klasifikasis')->where('kode', 'KH.08')->value('id');

        // --- LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah KH.01
            ['parent_id' => $kh_1, 'kode' => 'KH.01.01', 'nama' => 'Program Kerja Penyuluhan.', 'sifat' => 'B'],
            ['parent_id' => $kh_1, 'kode' => 'KH.01.02', 'nama' => 'Materi Penyuluhan.', 'sifat' => 'B'],
            ['parent_id' => $kh_1, 'kode' => 'KH.01.03', 'nama' => 'Program Penyuluhan Kehutanan.', 'sifat' => 'B'],
            ['parent_id' => $kh_1, 'kode' => 'KH.01.04', 'nama' => 'Sarana Penyuluhan.', 'sifat' => 'B'],
            ['parent_id' => $kh_1, 'kode' => 'KH.01.05', 'nama' => 'Tenaga Penyuluhan.', 'sifat' => 'B'],
            ['parent_id' => $kh_1, 'kode' => 'KH.01.06', 'nama' => 'Pemberdayaan Masyarakat.', 'sifat' => 'B'],
            ['parent_id' => $kh_1, 'kode' => 'KH.01.07', 'nama' => 'Pelaksanaan Penyuluhan.', 'sifat' => 'B'],
            ['parent_id' => $kh_1, 'kode' => 'KH.01.08', 'nama' => 'Diseminasi.', 'sifat' => 'B'],
            ['parent_id' => $kh_1, 'kode' => 'KH.01.09', 'nama' => 'Evaluasi, Desiminasi dan Laporan.', 'sifat' => 'B'],

            // Bawah KH.02
            ['parent_id' => $kh_2, 'kode' => 'KH.02.01', 'nama' => 'Perencanaan Kawasan Hutan:', 'sifat' => 'B'],
            ['parent_id' => $kh_2, 'kode' => 'KH.02.02', 'nama' => 'Pengukuhan Dan Penatagunaan Kawasan Hutan:', 'sifat' => 'B'],
            ['parent_id' => $kh_2, 'kode' => 'KH.02.03', 'nama' => 'Inventarisasi dan Pemantauan Sumber Daya Hutan:', 'sifat' => 'B'],
            ['parent_id' => $kh_2, 'kode' => 'KH.02.04', 'nama' => 'Penggunaan Kawasan Hutan:', 'sifat' => 'B'],
            ['parent_id' => $kh_2, 'kode' => 'KH.02.05', 'nama' => 'Pengelolaan Dan Penyiapan Areal Pemanfaatan Hutan:', 'sifat' => 'B'],

            // Bawah KH.03
            ['parent_id' => $kh_3, 'kode' => 'KH.03.01', 'nama' => 'HPH/HTI/IUPHHK:', 'sifat' => 'B'],
            ['parent_id' => $kh_3, 'kode' => 'KH.03.02', 'nama' => 'Modal dan Peralatan:', 'sifat' => 'B'],
            ['parent_id' => $kh_3, 'kode' => 'KH.03.03', 'nama' => 'Rencana Karya:', 'sifat' => 'B'],
            ['parent_id' => $kh_3, 'kode' => 'KH.03.04', 'nama' => 'Perpanjangan HPH.', 'sifat' => 'B'],
            ['parent_id' => $kh_3, 'kode' => 'KH.03.05', 'nama' => 'Produksi:', 'sifat' => 'B'],
            ['parent_id' => $kh_3, 'kode' => 'KH.03.06', 'nama' => 'Industri:', 'sifat' => 'B'],
            ['parent_id' => $kh_3, 'kode' => 'KH.03.07', 'nama' => 'Pembangunan Hutan Tanaman Industri:', 'sifat' => 'B'],
            ['parent_id' => $kh_3, 'kode' => 'KH.03.08', 'nama' => 'Pelanggaran Dan Sanksi:', 'sifat' => 'B'],
            ['parent_id' => $kh_3, 'kode' => 'KH.03.09', 'nama' => 'Pemanfaatan Hutan Produksi:', 'sifat' => 'B'],
            ['parent_id' => $kh_3, 'kode' => 'KH.03.10', 'nama' => 'Pengembangan Hutan Alam:', 'sifat' => 'B'],
            ['parent_id' => $kh_3, 'kode' => 'KH.03.11', 'nama' => 'Pengembangan Hutan Tanaman:', 'sifat' => 'B'],
            ['parent_id' => $kh_3, 'kode' => 'KH.03.12', 'nama' => 'Iuran Kehutanan Dan Peredaran Hasil Hutan:', 'sifat' => 'B'],
            ['parent_id' => $kh_3, 'kode' => 'KH.03.13', 'nama' => 'Pengolahan Dan Pemasaran Hasil Hutan:', 'sifat' => 'B'],
            ['parent_id' => $kh_3, 'kode' => 'KH.03.14', 'nama' => 'Pembinaan Hutan:', 'sifat' => 'B'],

            // Bawah KH.04
            ['parent_id' => $kh_4, 'kode' => 'KH.04.01', 'nama' => 'Standarisasi:', 'sifat' => 'B'],
            ['parent_id' => $kh_4, 'kode' => 'KH.04.02', 'nama' => 'Sarana Pengujian Hasil Hutan:', 'sifat' => 'B'], // Tidak ada anaknya di dokumen
            ['parent_id' => $kh_4, 'kode' => 'KH.04.03', 'nama' => 'Pengembangan:', 'sifat' => 'B'],
            ['parent_id' => $kh_4, 'kode' => 'KH.04.04', 'nama' => 'Pemasaran Hasil Hutan:', 'sifat' => 'B'], // Tidak ada anaknya di dokumen
            ['parent_id' => $kh_4, 'kode' => 'KH.04.05', 'nama' => 'Pengendalian Lingkungan:', 'sifat' => 'B'],
            ['parent_id' => $kh_4, 'kode' => 'KH.04.06', 'nama' => 'Angkutan Hasil Hutan:', 'sifat' => 'B'],
            ['parent_id' => $kh_4, 'kode' => 'KH.04.07', 'nama' => 'Tata Usaha Hasil Hutan:', 'sifat' => 'B'],

            // Bawah KH.05
            ['parent_id' => $kh_5, 'kode' => 'KH.05.01', 'nama' => 'Konservasi Jenis Dan Genetik:', 'sifat' => 'B'],
            ['parent_id' => $kh_5, 'kode' => 'KH.05.02', 'nama' => 'Kawasan Konservasi:', 'sifat' => 'B'],
            ['parent_id' => $kh_5, 'kode' => 'KH.05.03', 'nama' => 'Pengamanan Hutan:', 'sifat' => 'B'],
            ['parent_id' => $kh_5, 'kode' => 'KH.05.04', 'nama' => 'Penyidikan dan Perlindungan Hutan:', 'sifat' => 'B'],
            ['parent_id' => $kh_5, 'kode' => 'KH.05.05', 'nama' => 'Pemanfaatan Jasa Lingkungan dan Wisata Alam:', 'sifat' => 'B'],
            ['parent_id' => $kh_5, 'kode' => 'KH.05.06', 'nama' => 'Bina Cinta Alam:', 'sifat' => 'B'],

            // Bawah KH.07
            ['parent_id' => $kh_7, 'kode' => 'KH.07.01', 'nama' => 'Perbenihan:', 'sifat' => 'B'],
            ['parent_id' => $kh_7, 'kode' => 'KH.07.02', 'nama' => 'Rehabilitasi Hutan dan Lahan:', 'sifat' => 'B'],
            ['parent_id' => $kh_7, 'kode' => 'KH.07.03', 'nama' => 'Tanaman Reboisasi:', 'sifat' => 'B'],
            ['parent_id' => $kh_7, 'kode' => 'KH.07.04', 'nama' => 'Pengelolaan Daerah Aliran Sungai (Das):', 'sifat' => 'B'],
            ['parent_id' => $kh_7, 'kode' => 'KH.07.05', 'nama' => 'Perhutanan Sosial:', 'sifat' => 'B'],
            ['parent_id' => $kh_7, 'kode' => 'KH.07.06', 'nama' => 'Pengendalian Perladangan:', 'sifat' => 'B'],

            // Bawah KH.08
            ['parent_id' => $kh_8, 'kode' => 'KH.08.01', 'nama' => 'Perencanaan Program Penelitian:', 'sifat' => 'B'],
            ['parent_id' => $kh_8, 'kode' => 'KH.08.02', 'nama' => 'Pelaksanaan Penelitian:', 'sifat' => 'B'],
            ['parent_id' => $kh_8, 'kode' => 'KH.08.03', 'nama' => 'Monitoring dan Evaluasi Penelitian:', 'sifat' => 'B'],
            ['parent_id' => $kh_8, 'kode' => 'KH.08.04', 'nama' => 'Diseminasi:', 'sifat' => 'B'],
        ]);

        // Mengambil ID untuk memasukkan Level Cicit (Level 4)
        $kh_2_1 = DB::table('klasifikasis')->where('kode', 'KH.02.01')->value('id');
        $kh_2_2 = DB::table('klasifikasis')->where('kode', 'KH.02.02')->value('id');
        $kh_2_3 = DB::table('klasifikasis')->where('kode', 'KH.02.03')->value('id');
        $kh_2_4 = DB::table('klasifikasis')->where('kode', 'KH.02.04')->value('id');
        $kh_2_5 = DB::table('klasifikasis')->where('kode', 'KH.02.05')->value('id');

        $kh_3_1 = DB::table('klasifikasis')->where('kode', 'KH.03.01')->value('id');
        $kh_3_2 = DB::table('klasifikasis')->where('kode', 'KH.03.02')->value('id');
        $kh_3_3 = DB::table('klasifikasis')->where('kode', 'KH.03.03')->value('id');
        $kh_3_5 = DB::table('klasifikasis')->where('kode', 'KH.03.05')->value('id');
        $kh_3_6 = DB::table('klasifikasis')->where('kode', 'KH.03.06')->value('id');
        $kh_3_7 = DB::table('klasifikasis')->where('kode', 'KH.03.07')->value('id');
        $kh_3_8 = DB::table('klasifikasis')->where('kode', 'KH.03.08')->value('id');
        $kh_3_9 = DB::table('klasifikasis')->where('kode', 'KH.03.09')->value('id');
        $kh_3_10 = DB::table('klasifikasis')->where('kode', 'KH.03.10')->value('id');
        $kh_3_11 = DB::table('klasifikasis')->where('kode', 'KH.03.11')->value('id');
        $kh_3_12 = DB::table('klasifikasis')->where('kode', 'KH.03.12')->value('id');
        $kh_3_13 = DB::table('klasifikasis')->where('kode', 'KH.03.13')->value('id');
        $kh_3_14 = DB::table('klasifikasis')->where('kode', 'KH.03.14')->value('id');

        $kh_4_1 = DB::table('klasifikasis')->where('kode', 'KH.04.01')->value('id');
        $kh_4_3 = DB::table('klasifikasis')->where('kode', 'KH.04.03')->value('id');
        $kh_4_5 = DB::table('klasifikasis')->where('kode', 'KH.04.05')->value('id');
        $kh_4_6 = DB::table('klasifikasis')->where('kode', 'KH.04.06')->value('id');
        $kh_4_7 = DB::table('klasifikasis')->where('kode', 'KH.04.07')->value('id');

        $kh_5_1 = DB::table('klasifikasis')->where('kode', 'KH.05.01')->value('id');
        $kh_5_2 = DB::table('klasifikasis')->where('kode', 'KH.05.02')->value('id');
        $kh_5_3 = DB::table('klasifikasis')->where('kode', 'KH.05.03')->value('id');
        $kh_5_4 = DB::table('klasifikasis')->where('kode', 'KH.05.04')->value('id');
        $kh_5_5 = DB::table('klasifikasis')->where('kode', 'KH.05.05')->value('id');
        $kh_5_6 = DB::table('klasifikasis')->where('kode', 'KH.05.06')->value('id');

        $kh_7_1 = DB::table('klasifikasis')->where('kode', 'KH.07.01')->value('id');
        $kh_7_2 = DB::table('klasifikasis')->where('kode', 'KH.07.02')->value('id');
        $kh_7_3 = DB::table('klasifikasis')->where('kode', 'KH.07.03')->value('id');
        $kh_7_4 = DB::table('klasifikasis')->where('kode', 'KH.07.04')->value('id');
        $kh_7_5 = DB::table('klasifikasis')->where('kode', 'KH.07.05')->value('id');
        $kh_7_6 = DB::table('klasifikasis')->where('kode', 'KH.07.06')->value('id');

        $kh_8_1 = DB::table('klasifikasis')->where('kode', 'KH.08.01')->value('id');
        $kh_8_2 = DB::table('klasifikasis')->where('kode', 'KH.08.02')->value('id');
        $kh_8_3 = DB::table('klasifikasis')->where('kode', 'KH.08.03')->value('id');
        $kh_8_4 = DB::table('klasifikasis')->where('kode', 'KH.08.04')->value('id');

        // --- LEVEL CICIT (Level 4) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah KH.02.01
            ['parent_id' => $kh_2_1, 'kode' => 'KH.02.01.01', 'nama' => 'Perencanaan Makro Kawasan Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_2_1, 'kode' => 'KH.02.01.02', 'nama' => 'Penataan Ruang Kawasan Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_2_1, 'kode' => 'KH.02.01.03', 'nama' => 'Statistik dan Jaringan Komunikasi Data Kehutanan.', 'sifat' => 'B'],
            // Bawah KH.02.02
            ['parent_id' => $kh_2_2, 'kode' => 'KH.02.02.01', 'nama' => 'Pengukuhan Kawasan Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_2_2, 'kode' => 'KH.02.02.02', 'nama' => 'Perubahan Fungsi dan Peruntukan Kawasan Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_2_2, 'kode' => 'KH.02.02.03', 'nama' => 'Informasi dan Dokumentasi Kawasan Hutan.', 'sifat' => 'B'],
            // Bawah KH.02.03
            ['parent_id' => $kh_2_3, 'kode' => 'KH.02.03.01', 'nama' => 'Inventarisasi Sumber Daya Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_2_3, 'kode' => 'KH.02.03.02', 'nama' => 'Pemantauan Sumber Daya Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_2_3, 'kode' => 'KH.02.03.03', 'nama' => 'Pemetaan Sumber Daya Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_2_3, 'kode' => 'KH.02.03.04', 'nama' => 'Jaringan Data Spasial.', 'sifat' => 'B'],
            // Bawah KH.02.04
            ['parent_id' => $kh_2_4, 'kode' => 'KH.02.04.01', 'nama' => 'Penggunaan Kawasan Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_2_4, 'kode' => 'KH.02.04.02', 'nama' => 'Penerimaan Negara Bukan Pajak (PNBP) Penggunaan Kawasan Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_2_4, 'kode' => 'KH.02.04.03', 'nama' => 'Informasi Penggunaan Kawasan Hutan.', 'sifat' => 'B'],
            // Bawah KH.02.05
            ['parent_id' => $kh_2_5, 'kode' => 'KH.02.05.01', 'nama' => 'Pembentukan Wilayah Pengelolaan Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_2_5, 'kode' => 'KH.02.05.02', 'nama' => 'Penyiapan Areal Pemantapan kawasan Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_2_5, 'kode' => 'KH.02.05.03', 'nama' => 'Informasi Wilayah Pengelolaan Dan Pemanfaatan Kawasan Hutan.', 'sifat' => 'B'],

            // Bawah KH.03.01
            ['parent_id' => $kh_3_1, 'kode' => 'KH.03.01.01', 'nama' => 'Data Areal HPH.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_1, 'kode' => 'KH.03.01.02', 'nama' => 'SK HPH/HTI/IUPHHK.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_1, 'kode' => 'KH.03.01.03', 'nama' => 'Kerjasama.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_1, 'kode' => 'KH.03.01.04', 'nama' => 'Pembatalan/Penolakan.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_1, 'kode' => 'KH.03.01.05', 'nama' => 'Perpanjangan.', 'sifat' => 'B'],
            // Bawah KH.03.02
            ['parent_id' => $kh_3_2, 'kode' => 'KH.03.02.01', 'nama' => 'Investasi Industri.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_2, 'kode' => 'KH.03.02.02', 'nama' => 'Peralatan.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_2, 'kode' => 'KH.03.02.03', 'nama' => 'Tenaga Kerja.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_2, 'kode' => 'KH.03.02.04', 'nama' => 'Pemegang Saham.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_2, 'kode' => 'KH.03.02.05', 'nama' => 'Neraca Perusahaan.', 'sifat' => 'B'],
            // Bawah KH.03.03
            ['parent_id' => $kh_3_3, 'kode' => 'KH.03.03.01', 'nama' => 'Kesatuan Pengelolaan Hutan Produksi (KPHP).', 'sifat' => 'B'],
            ['parent_id' => $kh_3_3, 'kode' => 'KH.03.03.02', 'nama' => 'Rencana Karya Pengusahaan Hutan (RKPH).', 'sifat' => 'B'],
            ['parent_id' => $kh_3_3, 'kode' => 'KH.03.03.03', 'nama' => 'Rencana Karya Tahunan Pengusahaan Hutan (RKT).', 'sifat' => 'B'],
            ['parent_id' => $kh_3_3, 'kode' => 'KH.03.03.04', 'nama' => 'Rencana Karya Lima Tahun Pengusahaan Hutan (RKL).', 'sifat' => 'B'],
            // Bawah KH.03.05
            ['parent_id' => $kh_3_5, 'kode' => 'KH.03.05.01', 'nama' => 'Target Produksi.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_5, 'kode' => 'KH.03.05.02', 'nama' => 'Produksi Kayu.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_5, 'kode' => 'KH.03.05.03', 'nama' => 'Produksi Non Kayu.', 'sifat' => 'B'],
            // Bawah KH.03.06
            ['parent_id' => $kh_3_6, 'kode' => 'KH.03.06.01', 'nama' => 'Industri Kayu HPH.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_6, 'kode' => 'KH.03.06.02', 'nama' => 'Industri Kayu Non HPH.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_6, 'kode' => 'KH.03.06.03', 'nama' => 'Industri Non Kayu.', 'sifat' => 'B'],
            // Bawah KH.03.07
            ['parent_id' => $kh_3_7, 'kode' => 'KH.03.07.01', 'nama' => 'Hutan Tanaman Industri Pulp.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_7, 'kode' => 'KH.03.07.02', 'nama' => 'Hutan Tanaman Industri Pertukangan.', 'sifat' => 'B'],
            // Bawah KH.03.08
            ['parent_id' => $kh_3_8, 'kode' => 'KH.03.08.01', 'nama' => 'Pemblokiran.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_8, 'kode' => 'KH.03.08.02', 'nama' => 'Denda.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_8, 'kode' => 'KH.03.08.03', 'nama' => 'Pencabutan Areal HPH/HTI/IUPHHK.', 'sifat' => 'B'],
            // Bawah KH.03.09
            ['parent_id' => $kh_3_9, 'kode' => 'KH.03.09.01', 'nama' => 'Pola Pemanfaatan Hutan Produksi.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_9, 'kode' => 'KH.03.09.02', 'nama' => 'Penataan Pemanfaatan Hutan Produksi.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_9, 'kode' => 'KH.03.09.03', 'nama' => 'Informasi Sumber Daya Hutan Produksi.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_9, 'kode' => 'KH.03.09.04', 'nama' => 'Pengembangan Investasi Usaha.', 'sifat' => 'B'],
            // Bawah KH.03.10
            ['parent_id' => $kh_3_10, 'kode' => 'KH.03.10.01', 'nama' => 'Penyiapan Pemanfaatan Hutan Alam.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_10, 'kode' => 'KH.03.10.02', 'nama' => 'Rencana Kerja Pemanfaatan Hutan Alam.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_10, 'kode' => 'KH.03.10.03', 'nama' => 'Produksi Hutan Alam.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_10, 'kode' => 'KH.03.10.04', 'nama' => 'Penilaian Kinerja Usaha Pemanfaatan Hutan Alam.', 'sifat' => 'B'],
            // Bawah KH.03.11
            ['parent_id' => $kh_3_11, 'kode' => 'KH.03.11.01', 'nama' => 'Hutan Tanaman Industri.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_11, 'kode' => 'KH.03.11.02', 'nama' => 'Hutan Tanaman Rakyat.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_11, 'kode' => 'KH.03.11.03', 'nama' => 'Rencana Kerja dan Produksi Hutan Tanaman.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_11, 'kode' => 'KH.03.11.04', 'nama' => 'Penilaian Kinerja Usaha Pemanfaatan Hutan Tanaman.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_11, 'kode' => 'KH.03.11.05', 'nama' => 'Pembiayaan Hutan Tanaman.', 'sifat' => 'B'],
            // Bawah KH.03.12
            ['parent_id' => $kh_3_12, 'kode' => 'KH.03.12.01', 'nama' => 'Penyiapan perumusan kebijakan, penyusunan standar, norma, pedoman, kriteria dan prosedur, serta penyiapan bimbingan teknis dan evaluasi.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_12, 'kode' => 'KH.03.12.02', 'nama' => 'Peredaran Hasil Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_12, 'kode' => 'KH.03.12.03', 'nama' => 'Pengukuran dan Pengujian Hasil Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_12, 'kode' => 'KH.03.12.04', 'nama' => 'Penertiban Peredaran Hasil Hutan.', 'sifat' => 'B'],
            // Bawah KH.03.13
            ['parent_id' => $kh_3_13, 'kode' => 'KH.03.13.01', 'nama' => 'Pemolaan Pengolahan Hasil Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_13, 'kode' => 'KH.03.13.02', 'nama' => 'Pengendalian Bahan Baku dan Industri Primer Hasil Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_13, 'kode' => 'KH.03.13.03', 'nama' => 'Penilaian Kinerja Industri dan Pemasaran Hasil Hutan.', 'sifat' => 'B'],
            // Bawah KH.03.14
            ['parent_id' => $kh_3_14, 'kode' => 'KH.03.14.01', 'nama' => 'Pembinaan HPH.', 'sifat' => 'B'],
            ['parent_id' => $kh_3_14, 'kode' => 'KH.03.14.02', 'nama' => 'Pembinaan TPTI.', 'sifat' => 'B'],

            // Bawah KH.04.01
            ['parent_id' => $kh_4_1, 'kode' => 'KH.04.01.01', 'nama' => 'Kayu.', 'sifat' => 'B'],
            ['parent_id' => $kh_4_1, 'kode' => 'KH.04.01.02', 'nama' => 'Non Kayu.', 'sifat' => 'B'],
            ['parent_id' => $kh_4_1, 'kode' => 'KH.04.01.03', 'nama' => 'Produk.', 'sifat' => 'B'],
            ['parent_id' => $kh_4_1, 'kode' => 'KH.04.01.04', 'nama' => 'Proses.', 'sifat' => 'B'],
            // Bawah KH.04.03
            ['parent_id' => $kh_4_3, 'kode' => 'KH.04.03.01', 'nama' => 'Pengembangan Perusahaan.', 'sifat' => 'B'],
            ['parent_id' => $kh_4_3, 'kode' => 'KH.04.03.02', 'nama' => 'Pengembangan Pemasaran.', 'sifat' => 'B'],
            // Bawah KH.04.05
            ['parent_id' => $kh_4_5, 'kode' => 'KH.04.05.01', 'nama' => 'Amdal di Dalam Kawasan Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_4_5, 'kode' => 'KH.04.05.02', 'nama' => 'Amdal di Luar Kawasan Hutan.', 'sifat' => 'B'],
            // Bawah KH.04.06
            ['parent_id' => $kh_4_6, 'kode' => 'KH.04.06.01', 'nama' => 'Sarana dan Prasarana.', 'sifat' => 'B'],
            ['parent_id' => $kh_4_6, 'kode' => 'KH.04.06.02', 'nama' => 'Pembinaan dan Peningkatan Daya Hutan.', 'sifat' => 'B'],
            // Bawah KH.04.07
            ['parent_id' => $kh_4_7, 'kode' => 'KH.04.07.01', 'nama' => 'Tanda Pengenal Perusahaan.', 'sifat' => 'B'],
            ['parent_id' => $kh_4_7, 'kode' => 'KH.04.07.02', 'nama' => 'Legalitas.', 'sifat' => 'B'],
            ['parent_id' => $kh_4_7, 'kode' => 'KH.04.07.03', 'nama' => 'Palu Tok Kualitas.', 'sifat' => 'B'],
            ['parent_id' => $kh_4_7, 'kode' => 'KH.04.07.04', 'nama' => 'Pass Angkutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_4_7, 'kode' => 'KH.04.07.05', 'nama' => 'Sertifikat Eksport Hasil Hutan.', 'sifat' => 'B'],

            // Bawah KH.05.01
            ['parent_id' => $kh_5_1, 'kode' => 'KH.05.01.01', 'nama' => 'Flora dan Fauna yang Dilindungi.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_1, 'kode' => 'KH.05.01.02', 'nama' => 'Flora dan Fauna yang Tidak Dilindungi.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_1, 'kode' => 'KH.05.01.03', 'nama' => 'Lembaga Konservasi /Kebun Binatang.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_1, 'kode' => 'KH.05.01.04', 'nama' => 'Konvensi Keanekaragaman Hayati.', 'sifat' => 'B'],
            // Bawah KH.05.02
            ['parent_id' => $kh_5_2, 'kode' => 'KH.05.02.01', 'nama' => 'Cagar Alam.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_2, 'kode' => 'KH.05.02.02', 'nama' => 'Suaka Margasatwa.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_2, 'kode' => 'KH.05.02.03', 'nama' => 'Taman Wisata.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_2, 'kode' => 'KH.05.02.04', 'nama' => 'Taman Buru.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_2, 'kode' => 'KH.05.02.05', 'nama' => 'Taman Nasional.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_2, 'kode' => 'KH.05.02.06', 'nama' => 'Taman Hutan Raya.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_2, 'kode' => 'KH.05.02.07', 'nama' => 'Hutan Lindung dan Suaka Alam.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_2, 'kode' => 'KH.05.02.08', 'nama' => 'Lahan Basah dan Konservasi Laut.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_2, 'kode' => 'KH.05.02.09', 'nama' => 'Gua/Karst.', 'sifat' => 'B'],
            // Bawah KH.05.03
            ['parent_id' => $kh_5_3, 'kode' => 'KH.05.03.01', 'nama' => 'Pelanggaran.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_3, 'kode' => 'KH.05.03.02', 'nama' => 'Bencana Alam.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_3, 'kode' => 'KH.05.03.03', 'nama' => 'Kebakaran Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_3, 'kode' => 'KH.05.03.04', 'nama' => 'Sengketa Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_3, 'kode' => 'KH.05.03.05', 'nama' => 'Hama dan Penyakit.', 'sifat' => 'B'],
            // Bawah KH.05.04
            ['parent_id' => $kh_5_4, 'kode' => 'KH.05.04.01', 'nama' => 'Program dan Evaluasi Penyidikan dan Perlindungan.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_4, 'kode' => 'KH.05.04.02', 'nama' => 'Penyidikan dan Perlindungan Wilayah.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_4, 'kode' => 'KH.05.04.03', 'nama' => 'Polisi Kehutanan dan Penyidik Pegawai Negeri Sipil (PPNS).', 'sifat' => 'B'],
            // Bawah KH.05.05
            ['parent_id' => $kh_5_5, 'kode' => 'KH.05.05.01', 'nama' => 'Pengembangan Jasa Lingkungan dan Wisata Alam.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_5, 'kode' => 'KH.05.05.02', 'nama' => 'Pemanfaatan Jasa Lingku.', 'sifat' => 'B'], // Typo dokumen "Lingku"
            ['parent_id' => $kh_5_5, 'kode' => 'KH.05.05.03', 'nama' => 'Pemanfaatan Wisata Alam.', 'sifat' => 'B'],
            // Bawah KH.05.06
            ['parent_id' => $kh_5_6, 'kode' => 'KH.05.06.01', 'nama' => 'Cinta Alam.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_6, 'kode' => 'KH.05.06.02', 'nama' => 'Kader Konservasi Sumber Daya Alam.', 'sifat' => 'B'],
            ['parent_id' => $kh_5_6, 'kode' => 'KH.05.06.03', 'nama' => 'Data organisasi pencinta alam dan kader konservasi SDA.', 'sifat' => 'B'],

            // Bawah KH.07.01
            ['parent_id' => $kh_7_1, 'kode' => 'KH.07.01.01', 'nama' => 'Pemuliaan Benih.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_1, 'kode' => 'KH.07.01.02', 'nama' => 'Kebun Benih.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_1, 'kode' => 'KH.07.01.03', 'nama' => 'Tegakan Benih.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_1, 'kode' => 'KH.07.01.04', 'nama' => 'Pengadaan Benih.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_1, 'kode' => 'KH.07.01.05', 'nama' => 'Pengujian dan Penyimpanan Benih.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_1, 'kode' => 'KH.07.01.06', 'nama' => 'Lalu Lintas Angkutan Benih.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_1, 'kode' => 'KH.07.01.07', 'nama' => 'Pembibitan.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_1, 'kode' => 'KH.07.01.08', 'nama' => 'Pengembangan Sumber Benih.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_1, 'kode' => 'KH.07.01.09', 'nama' => 'Pengembangan Usaha Perbenihan.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_1, 'kode' => 'KH.07.01.10', 'nama' => 'Pengendalian Peredaran Benih.', 'sifat' => 'B'],
            // Bawah KH.07.02
            ['parent_id' => $kh_7_2, 'kode' => 'KH.07.02.01', 'nama' => 'Pemolaan Rehabilitasi Hutan dan Lahan.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_2, 'kode' => 'KH.07.02.02', 'nama' => 'Rehabilitasi Hutan.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_2, 'kode' => 'KH.07.02.03', 'nama' => 'Rehabilitasi Lahan.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_2, 'kode' => 'KH.07.02.04', 'nama' => 'Pengelolaan Hutan Mangrove, Hutan Pantai, Rawa,dan Gambut.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_2, 'kode' => 'KH.07.02.05', 'nama' => 'Reklamasi Hutan dan Konservasi Tanah.', 'sifat' => 'B'],
            // Bawah KH.07.03
            ['parent_id' => $kh_7_3, 'kode' => 'KH.07.03.01', 'nama' => 'Reboisasi Lahan Kritis.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_3, 'kode' => 'KH.07.03.02', 'nama' => 'Reboisasi Areal HPH.', 'sifat' => 'B'],
            // Bawah KH.07.04
            ['parent_id' => $kh_7_4, 'kode' => 'KH.07.04.01', 'nama' => 'Pemolaan Pengelolaan DAS.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_4, 'kode' => 'KH.07.04.02', 'nama' => 'Pengembangan Kelembagaan Pengelolaan DAS.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_4, 'kode' => 'KH.07.04.03', 'nama' => 'Teknik Pengelolaan DAS.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_4, 'kode' => 'KH.07.04.04', 'nama' => 'Evaluasi Pengelolaan DAS.', 'sifat' => 'B'],
            // Bawah KH.07.05
            ['parent_id' => $kh_7_5, 'kode' => 'KH.07.05.01', 'nama' => 'Pemolaan.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_5, 'kode' => 'KH.07.05.02', 'nama' => 'Pengembangan Hutan Kemasyarakatan.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_5, 'kode' => 'KH.07.05.03', 'nama' => 'Pengembangan Hutan Desa.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_5, 'kode' => 'KH.07.05.04', 'nama' => 'Pengembangan Hutan Hak dan Kemitraan.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_5, 'kode' => 'KH.07.05.05', 'nama' => 'Pengembangan Usaha Perhutanan Sosial.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_5, 'kode' => 'KH.07.05.06', 'nama' => 'Hasil Hutan Bukan Kayu/Aneka Usaha Kehutanan (HHBK/AUK).', 'sifat' => 'B'],
            // Bawah KH.07.06
            ['parent_id' => $kh_7_6, 'kode' => 'KH.07.06.01', 'nama' => 'Penentuan Lokasi.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_6, 'kode' => 'KH.07.06.02', 'nama' => 'Pemupukan Lokasi.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_6, 'kode' => 'KH.07.06.03', 'nama' => 'Pengelolaan Tanah.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_6, 'kode' => 'KH.07.06.04', 'nama' => 'Pemindahan Penduduk.', 'sifat' => 'B'],
            ['parent_id' => $kh_7_6, 'kode' => 'KH.07.06.05', 'nama' => 'Pembuatan Sarana.', 'sifat' => 'B'],

            // Bawah KH.08.01
            ['parent_id' => $kh_8_1, 'kode' => 'KH.08.01.01', 'nama' => 'Penyusunan Rencana Anggaran Penelitian dan Pengembangan.', 'sifat' => 'B'],
            ['parent_id' => $kh_8_1, 'kode' => 'KH.08.01.02', 'nama' => 'Penyusunan Rencana Kegiatan Penelitian dan Pengembangan.', 'sifat' => 'B'],
            // Bawah KH.08.02
            ['parent_id' => $kh_8_2, 'kode' => 'KH.08.02.01', 'nama' => 'Ijin Penelitian.', 'sifat' => 'B'],
            ['parent_id' => $kh_8_2, 'kode' => 'KH.08.02.02', 'nama' => 'Data Mentah Hasil Penelitian.', 'sifat' => 'B'],
            ['parent_id' => $kh_8_2, 'kode' => 'KH.08.02.03', 'nama' => 'Analisa Hasil Penelitian.', 'sifat' => 'B'],
            ['parent_id' => $kh_8_2, 'kode' => 'KH.08.02.04', 'nama' => 'Laporan Hasil Penelitian.', 'sifat' => 'B'],
            // Bawah KH.08.03
            ['parent_id' => $kh_8_3, 'kode' => 'KH.08.03.01', 'nama' => 'Monitoring Penelitian.', 'sifat' => 'B'],
            ['parent_id' => $kh_8_3, 'kode' => 'KH.08.03.02', 'nama' => 'Evaluasi Penelitian.', 'sifat' => 'B'],
            ['parent_id' => $kh_8_3, 'kode' => 'KH.08.03.03', 'nama' => 'Rekomendasi.', 'sifat' => 'B'],
            // Bawah KH.08.04
            ['parent_id' => $kh_8_4, 'kode' => 'KH.08.04.01', 'nama' => 'Publikasi.', 'sifat' => 'B'],
            ['parent_id' => $kh_8_4, 'kode' => 'KH.08.04.02', 'nama' => 'Gelar Teknologi/Seminar/Lokakarya.', 'sifat' => 'B'],
            ['parent_id' => $kh_8_4, 'kode' => 'KH.08.04.03', 'nama' => 'Forum Komunikasi Penelitian dan Pengembangan.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: PT (Pertanian)
        // (URUSAN TERAKHIR & TERBESAR - 17 HALAMAN DOKUMEN)
        // ==============================================================================
        $id_pt = DB::table('klasifikasis')->where('kode', 'PT')->value('id');

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_pt, 'kode' => 'PT.01', 'nama' => 'Pertanian:', 'sifat' => 'B'], // Peternakan dan Kesehatan Hewan
            ['parent_id' => $id_pt, 'kode' => 'PT.02', 'nama' => 'Perkebunan:', 'sifat' => 'B'],
            ['parent_id' => $id_pt, 'kode' => 'PT.03', 'nama' => 'Hortikultura:', 'sifat' => 'B'],
            ['parent_id' => $id_pt, 'kode' => 'PT.04', 'nama' => 'Prasarana Dan Sarana Pertanian:', 'sifat' => 'B'],
            ['parent_id' => $id_pt, 'kode' => 'PT.05', 'nama' => 'Tanaman Pangan:', 'sifat' => 'B'],
            ['parent_id' => $id_pt, 'kode' => 'PT.06', 'nama' => 'Pengolahan dan Pemasaran Hasil Pertanian:', 'sifat' => 'B'],
            ['parent_id' => $id_pt, 'kode' => 'PT.07', 'nama' => 'Penelitian, Pengkajian, dan Pengembangan Pertanian:', 'sifat' => 'B'],
            ['parent_id' => $id_pt, 'kode' => 'PT.08', 'nama' => 'Hak Atas Kekayaan Intelektual (HKI):', 'sifat' => 'B'],
            ['parent_id' => $id_pt, 'kode' => 'PT.09', 'nama' => 'Ketahanan Pangan:', 'sifat' => 'B'],
            ['parent_id' => $id_pt, 'kode' => 'PT.10', 'nama' => 'Karantina Pertanian:', 'sifat' => 'B'],
        ]);

        $pt_1 = DB::table('klasifikasis')->where('kode', 'PT.01')->value('id');
        $pt_2 = DB::table('klasifikasis')->where('kode', 'PT.02')->value('id');
        $pt_3 = DB::table('klasifikasis')->where('kode', 'PT.03')->value('id');
        $pt_4 = DB::table('klasifikasis')->where('kode', 'PT.04')->value('id');
        $pt_5 = DB::table('klasifikasis')->where('kode', 'PT.05')->value('id');
        $pt_6 = DB::table('klasifikasis')->where('kode', 'PT.06')->value('id');
        $pt_7 = DB::table('klasifikasis')->where('kode', 'PT.07')->value('id');
        $pt_8 = DB::table('klasifikasis')->where('kode', 'PT.08')->value('id');
        $pt_9 = DB::table('klasifikasis')->where('kode', 'PT.09')->value('id');
        $pt_10 = DB::table('klasifikasis')->where('kode', 'PT.10')->value('id');

        // --- LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah PT.01 (Peternakan dan Kesehatan Hewan)
            ['parent_id' => $pt_1, 'kode' => 'PT.01.01', 'nama' => 'Perbibitan Ternak:', 'sifat' => 'B'],
            ['parent_id' => $pt_1, 'kode' => 'PT.01.02', 'nama' => 'Pakan Ternak:', 'sifat' => 'B'],
            ['parent_id' => $pt_1, 'kode' => 'PT.01.03', 'nama' => 'Budidaya Ternak:', 'sifat' => 'B'],
            ['parent_id' => $pt_1, 'kode' => 'PT.01.04', 'nama' => 'Kesehatan Hewan:', 'sifat' => 'B'],
            ['parent_id' => $pt_1, 'kode' => 'PT.01.05', 'nama' => 'Kesehatan Masyarakat Veteriner dan Pascapanen:', 'sifat' => 'B'],

            // Bawah PT.02 (Perkebunan)
            ['parent_id' => $pt_2, 'kode' => 'PT.02.01', 'nama' => 'Tanaman Semusim:', 'sifat' => 'B'],
            ['parent_id' => $pt_2, 'kode' => 'PT.02.02', 'nama' => 'Tanaman Rempah & Penyegar:', 'sifat' => 'B'],
            ['parent_id' => $pt_2, 'kode' => 'PT.02.03', 'nama' => 'Tanaman Tahunan:', 'sifat' => 'B'],
            ['parent_id' => $pt_2, 'kode' => 'PT.02.04', 'nama' => 'Perlindungan Perkebunan:', 'sifat' => 'B'],
            ['parent_id' => $pt_2, 'kode' => 'PT.02.05', 'nama' => 'Pascapanen dan Pembinaan Usaha:', 'sifat' => 'B'],

            // Bawah PT.03 (Hortikultura)
            ['parent_id' => $pt_3, 'kode' => 'PT.03.01', 'nama' => 'Perlindungan hortikultura:', 'sifat' => 'B'],
            ['parent_id' => $pt_3, 'kode' => 'PT.03.02', 'nama' => 'Perbenihan Hortikultura:', 'sifat' => 'B'],

            // Bawah PT.04 (Prasarana dan Sarana Pertanian)
            ['parent_id' => $pt_4, 'kode' => 'PT.04.01', 'nama' => 'Perluasan dan Pengelolaan Lahan:', 'sifat' => 'B'],
            ['parent_id' => $pt_4, 'kode' => 'PT.04.02', 'nama' => 'Pengelolaan Air Irigasi:', 'sifat' => 'B'],
            ['parent_id' => $pt_4, 'kode' => 'PT.04.03', 'nama' => 'Pembiayaan Pertanian:', 'sifat' => 'B'],
            ['parent_id' => $pt_4, 'kode' => 'PT.04.04', 'nama' => 'Pupuk Pestisida:', 'sifat' => 'B'],
            ['parent_id' => $pt_4, 'kode' => 'PT.04.05', 'nama' => 'Alat dan Mesin Pertanian:', 'sifat' => 'B'],

            // Bawah PT.05 (Tanaman Pangan)
            ['parent_id' => $pt_5, 'kode' => 'PT.05.01', 'nama' => 'Perbenihan Tanaman Pangan:', 'sifat' => 'B'],
            ['parent_id' => $pt_5, 'kode' => 'PT.05.02', 'nama' => 'Budidaya Serealia:', 'sifat' => 'B'],
            ['parent_id' => $pt_5, 'kode' => 'PT.05.03', 'nama' => 'Budidaya Aneka Kacang dan Umbi:', 'sifat' => 'B'],
            ['parent_id' => $pt_5, 'kode' => 'PT.05.04', 'nama' => 'Perlindungan Tanaman Pangan:', 'sifat' => 'B'],
            ['parent_id' => $pt_5, 'kode' => 'PT.05.05', 'nama' => 'Pascapanen Tanaman Pangan:', 'sifat' => 'B'],

            // Bawah PT.06 (Pengolahan dan Pemasaran Hasil Pertanian)
            ['parent_id' => $pt_6, 'kode' => 'PT.06.01', 'nama' => 'Pengolahan Hasil Pertanian:', 'sifat' => 'B'],
            ['parent_id' => $pt_6, 'kode' => 'PT.06.02', 'nama' => 'Mutu dan Standariasi:', 'sifat' => 'B'],
            ['parent_id' => $pt_6, 'kode' => 'PT.06.03', 'nama' => 'Pengembangan Usaha dan Investasi:', 'sifat' => 'B'],
            ['parent_id' => $pt_6, 'kode' => 'PT.06.04', 'nama' => 'Pemasaran Domestik:', 'sifat' => 'B'],
            ['parent_id' => $pt_6, 'kode' => 'PT.06.05', 'nama' => 'Pemasaran Internasional:', 'sifat' => 'B'],

            // Bawah PT.07 (Penelitian, Pengkajian, dan Pengembangan Pertanian)
            ['parent_id' => $pt_7, 'kode' => 'PT.07.01', 'nama' => 'Administrasi:', 'sifat' => 'B'],
            ['parent_id' => $pt_7, 'kode' => 'PT.07.02', 'nama' => 'Hasil Penelitian,Pengkajian, dan Pengembangan:', 'sifat' => 'B'],
            ['parent_id' => $pt_7, 'kode' => 'PT.07.03', 'nama' => 'Diseminasi:', 'sifat' => 'B'],
            ['parent_id' => $pt_7, 'kode' => 'PT.07.04', 'nama' => 'Publikasi Hasil Penelitian/ Pengkajian:', 'sifat' => 'B'],
            ['parent_id' => $pt_7, 'kode' => 'PT.07.05', 'nama' => 'Bimbingan Teknis Penelitian,Pengkajian, dan Pengembangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_7, 'kode' => 'PT.07.06', 'nama' => 'Forum Komunikasi Penelitian dan Pengembangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_7, 'kode' => 'PT.07.07', 'nama' => 'Data Penelitian dan Pengembangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_7, 'kode' => 'PT.07.08', 'nama' => 'Evaluasi Penelitian/ Pengkajian dan Pengembangan.', 'sifat' => 'B'],

            // Bawah PT.08 (Hak Atas Kekayaan Intelektual / HKI)
            ['parent_id' => $pt_8, 'kode' => 'PT.08.01', 'nama' => 'Hak Cipta.', 'sifat' => 'B'],
            ['parent_id' => $pt_8, 'kode' => 'PT.08.02', 'nama' => 'Hak Paten Sederhana.', 'sifat' => 'B'],
            ['parent_id' => $pt_8, 'kode' => 'PT.08.03', 'nama' => 'Hak Paten Biasa.', 'sifat' => 'B'],
            ['parent_id' => $pt_8, 'kode' => 'PT.08.04', 'nama' => 'Hak Merek.', 'sifat' => 'B'],
            ['parent_id' => $pt_8, 'kode' => 'PT.08.05', 'nama' => 'Pendaftaran Varietas Tanaman.', 'sifat' => 'B'],
            ['parent_id' => $pt_8, 'kode' => 'PT.08.06', 'nama' => 'Permohonan Hak PVTT Tanaman Semusim.', 'sifat' => 'B'],
            ['parent_id' => $pt_8, 'kode' => 'PT.08.07', 'nama' => 'Permohonan Hak PVTT Tanaman Tahunan.', 'sifat' => 'B'],
            ['parent_id' => $pt_8, 'kode' => 'PT.08.08', 'nama' => 'Permohonan HKI yang ditolak.', 'sifat' => 'B'],
            ['parent_id' => $pt_8, 'kode' => 'PT.08.09', 'nama' => 'Forum Komunikasi Penelitian dan Pengembangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_8, 'kode' => 'PT.08.10', 'nama' => 'Data Penelitian dan Pengembangan.', 'sifat' => 'B'],

            // Bawah PT.09 (Ketahanan Pangan)
            ['parent_id' => $pt_9, 'kode' => 'PT.09.01', 'nama' => 'Ketersediaan dan Kerawanan Pangan:', 'sifat' => 'B'],
            ['parent_id' => $pt_9, 'kode' => 'PT.09.02', 'nama' => 'Distribusi dan Cadangan Pangan:', 'sifat' => 'B'],
            ['parent_id' => $pt_9, 'kode' => 'PT.09.03', 'nama' => 'Penganekaragaman Konsumsi dan Ketahanan Pangan:', 'sifat' => 'B'],
            ['parent_id' => $pt_9, 'kode' => 'PT.09.04', 'nama' => 'Penguatan Kelembagaan Ketahanan Pangan:', 'sifat' => 'B'],

            // Bawah PT.10 (Karantina Pertanian)
            ['parent_id' => $pt_10, 'kode' => 'PT.10.01', 'nama' => 'Data karantina Hewan:', 'sifat' => 'B'],
            ['parent_id' => $pt_10, 'kode' => 'PT.10.02', 'nama' => 'Data Karantina Tumbuhan:', 'sifat' => 'B'],
            ['parent_id' => $pt_10, 'kode' => 'PT.10.03', 'nama' => 'Inventarisasi Penyakit Hewan:', 'sifat' => 'B'],
            ['parent_id' => $pt_10, 'kode' => 'PT.10.04', 'nama' => 'Inventarisasi Penyakit Tumbuhan:', 'sifat' => 'B'],
            ['parent_id' => $pt_10, 'kode' => 'PT.10.05', 'nama' => 'Tindakan Karantina Hewan:', 'sifat' => 'B'],
            ['parent_id' => $pt_10, 'kode' => 'PT.10.06', 'nama' => 'Tindakan Karantina Tumbuhan:', 'sifat' => 'B'],
            ['parent_id' => $pt_10, 'kode' => 'PT.10.07', 'nama' => 'Sertifikasi Pelepasan Karantina:', 'sifat' => 'B'],
            ['parent_id' => $pt_10, 'kode' => 'PT.10.08', 'nama' => 'Pemberantasan Penyakit Hewan:', 'sifat' => 'B'],
            ['parent_id' => $pt_10, 'kode' => 'PT.10.09', 'nama' => 'Pemberantasan Penyakit Tumbuhan:', 'sifat' => 'B'],
            ['parent_id' => $pt_10, 'kode' => 'PT.10.10', 'nama' => 'Keamanan Pangan:', 'sifat' => 'B'],
            ['parent_id' => $pt_10, 'kode' => 'PT.10.11', 'nama' => 'Tertib Operasional Karantina Hewan:', 'sifat' => 'B'],
            ['parent_id' => $pt_10, 'kode' => 'PT.10.12', 'nama' => 'Tertib Operasional Karantina Tumbuhan.', 'sifat' => 'B'],
        ]);

        // Mengambil ID untuk memasukkan Level Cicit (Level 4) - Bagian 1
        $pt_1_1 = DB::table('klasifikasis')->where('kode', 'PT.01.01')->value('id');
        $pt_1_2 = DB::table('klasifikasis')->where('kode', 'PT.01.02')->value('id');
        $pt_1_3 = DB::table('klasifikasis')->where('kode', 'PT.01.03')->value('id');
        $pt_1_4 = DB::table('klasifikasis')->where('kode', 'PT.01.04')->value('id');
        $pt_1_5 = DB::table('klasifikasis')->where('kode', 'PT.01.05')->value('id');

        $pt_2_1 = DB::table('klasifikasis')->where('kode', 'PT.02.01')->value('id');
        $pt_2_2 = DB::table('klasifikasis')->where('kode', 'PT.02.02')->value('id');
        $pt_2_3 = DB::table('klasifikasis')->where('kode', 'PT.02.03')->value('id');
        $pt_2_4 = DB::table('klasifikasis')->where('kode', 'PT.02.04')->value('id');
        $pt_2_5 = DB::table('klasifikasis')->where('kode', 'PT.02.05')->value('id');

        $pt_3_1 = DB::table('klasifikasis')->where('kode', 'PT.03.01')->value('id');
        $pt_3_2 = DB::table('klasifikasis')->where('kode', 'PT.03.02')->value('id');

        $pt_4_1 = DB::table('klasifikasis')->where('kode', 'PT.04.01')->value('id');
        $pt_4_2 = DB::table('klasifikasis')->where('kode', 'PT.04.02')->value('id');
        $pt_4_3 = DB::table('klasifikasis')->where('kode', 'PT.04.03')->value('id');
        $pt_4_4 = DB::table('klasifikasis')->where('kode', 'PT.04.04')->value('id');
        $pt_4_5 = DB::table('klasifikasis')->where('kode', 'PT.04.05')->value('id');

        $pt_5_1 = DB::table('klasifikasis')->where('kode', 'PT.05.01')->value('id');
        $pt_5_2 = DB::table('klasifikasis')->where('kode', 'PT.05.02')->value('id');
        $pt_5_3 = DB::table('klasifikasis')->where('kode', 'PT.05.03')->value('id');
        $pt_5_4 = DB::table('klasifikasis')->where('kode', 'PT.05.04')->value('id');
        $pt_5_5 = DB::table('klasifikasis')->where('kode', 'PT.05.05')->value('id');

        // --- LEVEL 4 (CICIT) BAGIAN 1 ---
        DB::table('klasifikasis')->insertOrIgnore([
            // PT.01.01 (Perbibitan Ternak)
            ['parent_id' => $pt_1_1, 'kode' => 'PT.01.01.01', 'nama' => 'Produksi Bibit Ternak Ruminansia Besar.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_1, 'kode' => 'PT.01.01.02', 'nama' => 'Produksi Bibit Ternak Ruminansia Kecil.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_1, 'kode' => 'PT.01.01.03', 'nama' => 'Produksi Bibit Ternak Unggas.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_1, 'kode' => 'PT.01.01.04', 'nama' => 'Produksi Bibit Aneka Ternak.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_1, 'kode' => 'PT.01.01.05', 'nama' => 'Penilaian Bibit Ternak.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_1, 'kode' => 'PT.01.01.06', 'nama' => 'Pelepasan Bibit Ternak.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_1, 'kode' => 'PT.01.01.07', 'nama' => 'Sertifikasi Bibit Ternak.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_1, 'kode' => 'PT.01.01.08', 'nama' => 'Pengawasan Mutu Bibit Ternak.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_1, 'kode' => 'PT.01.01.09', 'nama' => 'Analisis Pengembangan Bibit Ternak.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_1, 'kode' => 'PT.01.01.10', 'nama' => 'Kelembagaan Pengembangan Bibit Ternak.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_1, 'kode' => 'PT.01.01.11', 'nama' => 'Surat Rekomendasi & Persetujuan Pemasukan/Pengeluaran.', 'sifat' => 'B'],

            // PT.01.02 (Pakan Ternak)
            ['parent_id' => $pt_1_2, 'kode' => 'PT.01.02.01', 'nama' => 'Bahan Pakan Asal Hewan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_2, 'kode' => 'PT.01.02.02', 'nama' => 'Bahan Pakan Asal Tumbuhan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_2, 'kode' => 'PT.01.02.03', 'nama' => 'Budidaya Pakan Hijauan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_2, 'kode' => 'PT.01.02.04', 'nama' => 'Kawasan Penggembalaan dan Integrasi Ternak.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_2, 'kode' => 'PT.01.02.05', 'nama' => 'Produksi Pakan Olahan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_2, 'kode' => 'PT.01.02.06', 'nama' => 'Pengolahan Pakan Olahan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_2, 'kode' => 'PT.01.02.07', 'nama' => 'Sertifikasi Pakan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_2, 'kode' => 'PT.01.02.08', 'nama' => 'Pengawasan Pakan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_2, 'kode' => 'PT.01.02.09', 'nama' => 'Surat Rekomendasi & Persetujuan Pemasukan/Pengeluaran.', 'sifat' => 'B'],

            // PT.01.03 (Budidaya Ternak)
            ['parent_id' => $pt_1_3, 'kode' => 'PT.01.03.01', 'nama' => 'Ternak Sapi dan Kerbau Potong.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_3, 'kode' => 'PT.01.03.02', 'nama' => 'Ternak Kambing dan Domba Potong.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_3, 'kode' => 'PT.01.03.03', 'nama' => 'Ternak Sapi dan Kerbau Perah.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_3, 'kode' => 'PT.01.03.04', 'nama' => 'Ternak Kambing Perah.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_3, 'kode' => 'PT.01.03.05', 'nama' => 'Ternak Unggas.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_3, 'kode' => 'PT.01.03.06', 'nama' => 'Aneka Ternak dan Monogastrik.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_3, 'kode' => 'PT.01.03.07', 'nama' => 'Pemberdayaan Masyarakat/Lembaga (LM3).', 'sifat' => 'B'],
            ['parent_id' => $pt_1_3, 'kode' => 'PT.01.03.08', 'nama' => 'Sarjana Membangun Desa (SMD).', 'sifat' => 'B'],

            // PT.01.04 (Kesehatan Hewan)
            ['parent_id' => $pt_1_4, 'kode' => 'PT.01.04.01', 'nama' => 'Epidemiologi dan Ekonomi Veteriner.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_4, 'kode' => 'PT.01.04.02', 'nama' => 'Penyidikan Penyakit Hewan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_4, 'kode' => 'PT.01.04.03', 'nama' => 'Pencegahan Penyakit Hewan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_4, 'kode' => 'PT.01.04.04', 'nama' => 'Pemberantasan Penyakit Hewan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_4, 'kode' => 'PT.01.04.05', 'nama' => 'Perlindungan Hewan dengan Analisis Risiko Penyakit Eksotik.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_4, 'kode' => 'PT.01.04.06', 'nama' => 'Perlindungan Hewan dengan Kesiagaan Darurat Penyakit Hewan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_4, 'kode' => 'PT.01.04.07', 'nama' => 'Kelembagaan Kesehatan Hewan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_4, 'kode' => 'PT.01.04.08', 'nama' => 'Sumber Daya Kesehatan Hewan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_4, 'kode' => 'PT.01.04.09', 'nama' => 'Laporan THL.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_4, 'kode' => 'PT.01.04.10', 'nama' => 'Proposal Poskeswan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_4, 'kode' => 'PT.01.04.11', 'nama' => 'Mutu Obat Hewan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_4, 'kode' => 'PT.01.04.12', 'nama' => 'Peredaran Obat Hewan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_4, 'kode' => 'PT.01.04.13', 'nama' => 'Pendaftaran Obat Hewan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_4, 'kode' => 'PT.01.04.14', 'nama' => 'Rekomendasi Obat Hewan.', 'sifat' => 'B'],

            // PT.01.05 (Kesehatan Masyarakat Veteriner dan Pascapanen)
            ['parent_id' => $pt_1_5, 'kode' => 'PT.01.05.01', 'nama' => 'Teknologi Pascapanen.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_5, 'kode' => 'PT.01.05.02', 'nama' => 'Sarana Pascapanen.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_5, 'kode' => 'PT.01.05.03', 'nama' => 'Penerapan Higiene Sanitasi.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_5, 'kode' => 'PT.01.05.04', 'nama' => 'Inspeksi Higiene Sanitasi.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_5, 'kode' => 'PT.01.05.05', 'nama' => 'Pengawasan Sanitary.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_5, 'kode' => 'PT.01.05.06', 'nama' => 'Pengawasan Keamanan Produk Hewan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_5, 'kode' => 'PT.01.05.07', 'nama' => 'Zoonosis.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_5, 'kode' => 'PT.01.05.08', 'nama' => 'Kesejahteraan Hewan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_5, 'kode' => 'PT.01.05.09', 'nama' => 'Pengujian Produk Hewan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_5, 'kode' => 'PT.01.05.10', 'nama' => 'Sertifikasi Produk Hewan.', 'sifat' => 'B'],
            ['parent_id' => $pt_1_5, 'kode' => 'PT.01.05.11', 'nama' => 'Surat Rekomendasi & Persetujuan Pemasukan/Pengeluaran.', 'sifat' => 'B'],

            // PT.02.01 (Tanaman Semusim)
            ['parent_id' => $pt_2_1, 'kode' => 'PT.02.01.01', 'nama' => 'Identifikasi Sumber Daya Tanaman Semusim.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_1, 'kode' => 'PT.02.01.02', 'nama' => 'Pendayagunaan Sumber Daya Tanaman Semusim.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_1, 'kode' => 'PT.02.01.03', 'nama' => 'Penyiapan Perbenihan Tanaman Semusim.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_1, 'kode' => 'PT.02.01.04', 'nama' => 'Bimbingan Peredaran Benih Tanaman Semusim.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_1, 'kode' => 'PT.02.01.05', 'nama' => 'Penyiapan Teknologi Budidaya Tanaman Semusim.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_1, 'kode' => 'PT.02.01.06', 'nama' => 'Penerapan Teknologi Budidaya Tenaman Semusim.', 'sifat' => 'B'], // Typo dokumen "Tenaman"
            ['parent_id' => $pt_2_1, 'kode' => 'PT.02.01.07', 'nama' => 'Pemberdayaan Tanaman Semusim.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_1, 'kode' => 'PT.02.01.08', 'nama' => 'Kelembagaan Tanaman Semusim.', 'sifat' => 'B'],

            // PT.02.02 (Tanaman Rempah & Penyegar)
            ['parent_id' => $pt_2_2, 'kode' => 'PT.02.02.01', 'nama' => 'Identifikasi Sumber Daya Tanaman Rempah & Penyegar.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_2, 'kode' => 'PT.02.02.02', 'nama' => 'Pendayagunaan Sumber Daya Tanaman Rempah & Penyegar.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_2, 'kode' => 'PT.02.02.03', 'nama' => 'Penyiapan PerbenihanTanaman Rempah & Penyegar.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_2, 'kode' => 'PT.02.02.04', 'nama' => 'Bimbingan Peredaran Benih Tanaman Rempah & Penyegar.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_2, 'kode' => 'PT.02.02.05', 'nama' => 'Penyiapan Teknologi Budidaya Tanaman Rempah & Penyegar.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_2, 'kode' => 'PT.02.02.06', 'nama' => 'Penerapan Teknologi Budidaya Tanaman Rempah & Penyegar.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_2, 'kode' => 'PT.02.02.07', 'nama' => 'Pemberdayaan Tanaman Rempah & Penyegar.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_2, 'kode' => 'PT.02.02.08', 'nama' => 'Kelembagaan Tanaman Rempah & Penyegar.', 'sifat' => 'B'],

            // PT.02.03 (Tanaman Tahunan)
            ['parent_id' => $pt_2_3, 'kode' => 'PT.02.03.01', 'nama' => 'Identifikasi Sumber Daya Tanaman Tahunan.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_3, 'kode' => 'PT.02.03.02', 'nama' => 'Pendayagunaan Sumber Daya TanamanTahunan.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_3, 'kode' => 'PT.02.03.03', 'nama' => 'Penyiapan PerbenihanTanaman Tahunan.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_3, 'kode' => 'PT.02.03.04', 'nama' => 'Bimbingan Peredaran Benih Tanaman Tahunan.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_3, 'kode' => 'PT.02.03.05', 'nama' => 'Penyiapan Teknologi Budidaya Tanaman Tahunan.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_3, 'kode' => 'PT.02.03.06', 'nama' => 'Penerapan Teknologi Budidaya Tanaman Tahunan.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_3, 'kode' => 'PT.02.03.07', 'nama' => 'Pemberdayaan Tanaman Tahunan.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_3, 'kode' => 'PT.02.03.08', 'nama' => 'Kelembagaan Tanaman Tahunan.', 'sifat' => 'B'],

            // PT.02.04 (Perlindungan Perkebunan)
            ['parent_id' => $pt_2_4, 'kode' => 'PT.02.04.01', 'nama' => 'Identifikasi Organisme Pengganggu Tumbuhan Tanaman Semusim.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_4, 'kode' => 'PT.02.04.02', 'nama' => 'Pengendalian Organisme Pengganggu Tumbuhan Tanaman Semusim.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_4, 'kode' => 'PT.02.04.03', 'nama' => 'Identifikasi Organisme Pengganggu Tumbuhan Tanaman Rempah dan Penyegar.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_4, 'kode' => 'PT.02.04.04', 'nama' => 'Pengendalian Organisme Pengganggu Tumbuhan Tanaman Rempah dan Penyegar.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_4, 'kode' => 'PT.02.04.05', 'nama' => 'Identifikasi Organisme Pengganggu Tumbuhan Tanaman.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_4, 'kode' => 'PT.02.04.06', 'nama' => 'Pengendalian Organisme Pengganggu Tumbuhan Tanaman.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_4, 'kode' => 'PT.02.04.07', 'nama' => 'Dampak Perubahan Iklim.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_4, 'kode' => 'PT.02.04.08', 'nama' => 'Pencegahan Kebakaran.', 'sifat' => 'B'],

            // PT.02.05 (Pascapanen dan Pembinaan Usaha)
            ['parent_id' => $pt_2_5, 'kode' => 'PT.02.05.01', 'nama' => 'Teknologi Pascapanen Tanaman Semusim, Rempah dan Penyegar.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_5, 'kode' => 'PT.02.05.02', 'nama' => 'Penerapan Pascapanen Tanaman Semusim, Rempah dan Penyegar.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_5, 'kode' => 'PT.02.05.03', 'nama' => 'Teknologi Pascapanen Tanaman Tahunan.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_5, 'kode' => 'PT.02.05.04', 'nama' => 'Penerapan Pascapanen Tanaman Tahunan.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_5, 'kode' => 'PT.02.05.05', 'nama' => 'Bimbingan Usaha Perkebunan.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_5, 'kode' => 'PT.02.05.06', 'nama' => 'Bimbingan Perkebunan Berkelanjutan.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_5, 'kode' => 'PT.02.05.07', 'nama' => 'Gangguan Usaha.', 'sifat' => 'B'],
            ['parent_id' => $pt_2_5, 'kode' => 'PT.02.05.08', 'nama' => 'Penanganan Konflik.', 'sifat' => 'B'],

            // PT.03.01 (Perlindungan Hortikultura)
            ['parent_id' => $pt_3_1, 'kode' => 'PT.03.01.01', 'nama' => 'Teknologi Perlindungan Tanaman Buah.', 'sifat' => 'B'],
            ['parent_id' => $pt_3_1, 'kode' => 'PT.03.01.02', 'nama' => 'Pengendalian Organisme Pengganggu Tumbuhan. Teknologi Perlindungan Tanaman Sayuran dan Tanaman Obat.', 'sifat' => 'B'],
            ['parent_id' => $pt_3_1, 'kode' => 'PT.03.01.03', 'nama' => 'Pengendalian Organisme Tumbuhan Tanaman Sayuran dan Tanaman Obat.', 'sifat' => 'B'],
            ['parent_id' => $pt_3_1, 'kode' => 'PT.03.01.05', 'nama' => 'Teknologi Perlindungan Tanaman Florikultura. Pengendalian Organisme Pengganggu Tumbuhan', 'sifat' => 'B'],
            ['parent_id' => $pt_3_1, 'kode' => 'PT.03.01.06', 'nama' => 'Flirikultura.', 'sifat' => 'B'], // Typo dokumen "Flirikultura"
            ['parent_id' => $pt_3_1, 'kode' => 'PT.03.01.07', 'nama' => 'Pengelolaan Dampak iklim dan Lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $pt_3_1, 'kode' => 'PT.03.01.08', 'nama' => 'Informasi dan Persyaratan Teknis.', 'sifat' => 'B'],

            // PT.03.02 (Perbenihan Hortikultura)
            ['parent_id' => $pt_3_2, 'kode' => 'PT.03.02.01', 'nama' => 'Bahan Penyusunan Rencana Kerja dan Anggaran Seksi Penilaian Varietas.', 'sifat' => 'B'],
            ['parent_id' => $pt_3_2, 'kode' => 'PT.03.02.02', 'nama' => 'Bahan Penyiapan Bahan Penyusunan Kebijakan di Bidang Penilaian Varietas.', 'sifat' => 'B'],
            ['parent_id' => $pt_3_2, 'kode' => 'PT.03.02.03', 'nama' => 'Bahan Penyiapan Bahan Pelaksanaan Teknis di Bidang Penilaian Varietas.', 'sifat' => 'B'],
            ['parent_id' => $pt_3_2, 'kode' => 'PT.03.02.04', 'nama' => 'Bahan Penyiapan Bahan Penyusunan Norma, Standar, Prosedur dan Kriteria di Bidang Penilaian Varietas.', 'sifat' => 'B'],
            ['parent_id' => $pt_3_2, 'kode' => 'PT.03.02.05', 'nama' => 'Bahan Penyiapan Bahan Pemberian Bimbingan Teknis di Bidang Penilaian Varietas.', 'sifat' => 'B'],
            ['parent_id' => $pt_3_2, 'kode' => 'PT.03.02.06', 'nama' => 'Bahan Penyiapan Bahan Evaluasi di Bidang Penilaian Varietas.', 'sifat' => 'B'],
            ['parent_id' => $pt_3_2, 'kode' => 'PT.03.02.07', 'nama' => 'Bahan Tugas Kedinasan lain berdasarkan penugasan pimpinan baik lisan maupun tertulis.', 'sifat' => 'B'],
            ['parent_id' => $pt_3_2, 'kode' => 'PT.03.02.08', 'nama' => 'Bahan Penyusunan dan penyajian laporan kegiatan serta penyusunan pertanggungjawaban keuangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_3_2, 'kode' => 'PT.03.02.09', 'nama' => 'Bahan Penyiapan dan pemeliharaan dokumen seksi Penilaian Varietas.', 'sifat' => 'B'],

            // PT.04.01 (Perluasan dan Pengelolaan Lahan)
            ['parent_id' => $pt_4_1, 'kode' => 'PT.04.01.01', 'nama' => 'Identifikasi Lahan untuk Basis Data Lahan.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_1, 'kode' => 'PT.04.01.02', 'nama' => 'Analisis dan Penyajian Data Lahan.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_1, 'kode' => 'PT.04.01.03', 'nama' => 'Identifikasi dan Analisis Pengenadalian Lahan.', 'sifat' => 'B'], // Typo "Pengenadalian"
            ['parent_id' => $pt_4_1, 'kode' => 'PT.04.01.04', 'nama' => 'Rekomendasi Teknis pengendalian lahan.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_1, 'kode' => 'PT.04.01.05', 'nama' => 'Identifikasi dan Analisis optimasi, rehabilitasi dan konservasi lahan.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_1, 'kode' => 'PT.04.01.06', 'nama' => 'Bimbingan Teknis optimasi, rehabilitasi dan konservasi lahan.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_1, 'kode' => 'PT.04.01.07', 'nama' => 'Identifikasi dan Analisis perluasan kawasan tanaman pangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_1, 'kode' => 'PT.04.01.08', 'nama' => 'Bimbingan Teknis dan evaluasi perluasan kawasan tanaman pangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_1, 'kode' => 'PT.04.01.09', 'nama' => 'Identifikasi dan Analisis perluasan kawasan hortikultura, perkebunan dan peternakan.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_1, 'kode' => 'PT.04.01.10', 'nama' => 'Bimbingan Teknis dan evaluasi perluasan kawasan hortikultura, perkebunan dan peternakan.', 'sifat' => 'B'],

            // PT.04.02 (Pengelolaan Air Irigasi)
            ['parent_id' => $pt_4_2, 'kode' => 'PT.04.02.01', 'nama' => 'Pengembangan Sumber Air Permukaan.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_2, 'kode' => 'PT.04.02.02', 'nama' => 'Pengembangan Sumber Air Tanah.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_2, 'kode' => 'PT.04.02.03', 'nama' => 'Pengembangan Jaringan.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_2, 'kode' => 'PT.04.02.04', 'nama' => 'Optimasi Air.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_2, 'kode' => 'PT.04.02.05', 'nama' => 'Iklim.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_2, 'kode' => 'PT.04.02.06', 'nama' => 'Konservasi Air dan Lingkungan Hidup.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_2, 'kode' => 'PT.04.02.07', 'nama' => 'Identifikasi Kelembagaan.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_2, 'kode' => 'PT.04.02.08', 'nama' => 'Pengembangan Kelembagaan.', 'sifat' => 'B'],

            // PT.04.03 (Pembiayaan Pertanian)
            ['parent_id' => $pt_4_3, 'kode' => 'PT.04.03.01', 'nama' => 'Data dan Informasi pembiayaan program. Pendampingan dan Bimbingan Teknis pembiayaan program.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_3, 'kode' => 'PT.04.03.03', 'nama' => 'Pembiayaan Syariah.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_3, 'kode' => 'PT.04.03.04', 'nama' => 'Kerja Sama Pembiayaan Syariah.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_3, 'kode' => 'PT.04.03.05', 'nama' => 'Materi dan Verifikasi pembiayaan agribisnis.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_3, 'kode' => 'PT.04.03.06', 'nama' => 'Fasilitasi dan Pemantauan pembiayaan agribisnis.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_3, 'kode' => 'PT.04.03.07', 'nama' => 'Kelembagaan Agribisnis.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_3, 'kode' => 'PT.04.03.08', 'nama' => 'Pemberdayaan Agribisnis.', 'sifat' => 'B'],

            // PT.04.04 (Pupuk Pestisida)
            ['parent_id' => $pt_4_4, 'kode' => 'PT.04.04.01', 'nama' => 'Pupuk Organik dan Pembenah Tanah Tanaman Pangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_4, 'kode' => 'PT.04.04.02', 'nama' => 'Pupuk Organik dan Pembenah Tanah Hortikultura dan Perkebunan.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_4, 'kode' => 'PT.04.04.03', 'nama' => 'Pupuk Anorganik Tanaman Pangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_4, 'kode' => 'PT.04.04.04', 'nama' => 'Pupuk Anorganik Hortikultura dan Perkebunan.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_4, 'kode' => 'PT.04.04.05', 'nama' => 'Pestisida Kimia.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_4, 'kode' => 'PT.04.04.06', 'nama' => 'Pestisida Hayati.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_4, 'kode' => 'PT.04.04.07', 'nama' => 'Pengawasan Pupuk.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_4, 'kode' => 'PT.04.04.08', 'nama' => 'Pengawasan Pestisida.', 'sifat' => 'B'],

            // PT.04.05 (Alat dan Mesin Pertanian)
            ['parent_id' => $pt_4_5, 'kode' => 'PT.04.05.01', 'nama' => 'Pengembangan Alat dan Mesin Pertanian Tanaman Pangan dan Hortikultura.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_5, 'kode' => 'PT.04.05.02', 'nama' => 'Pengembangan Alat dan Mesin Pertanian Perkebunan dan Peternakan.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_5, 'kode' => 'PT.04.05.03', 'nama' => 'Pengawasan dan Peredaran Alat dan Mesin Pertanian Tanaman Pangan dan Hortikultura.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_5, 'kode' => 'PT.04.05.04', 'nama' => 'Pengawasan dan Peredaran Alat dan Mesin Pertanian Perkebunan dan Peternakan.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_5, 'kode' => 'PT.04.05.05', 'nama' => 'Kelembagaan Alat dan Mesin Pertanian.', 'sifat' => 'B'],
            ['parent_id' => $pt_4_5, 'kode' => 'PT.04.05.06', 'nama' => 'Pelayanan Alat dan Mesin Pertanian.', 'sifat' => 'B'],

            // PT.05.01 (Perbenihan Tanaman Pangan)
            ['parent_id' => $pt_5_1, 'kode' => 'PT.05.01.01', 'nama' => 'Penilaian Varietas.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_1, 'kode' => 'PT.05.01.02', 'nama' => 'Pengawasan Mutu Benih.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_1, 'kode' => 'PT.05.01.03', 'nama' => 'Produksi Benih Serealia Padi.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_1, 'kode' => 'PT.05.01.04', 'nama' => 'Produksi Benih Serealia Non Padi.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_1, 'kode' => 'PT.05.01.05', 'nama' => 'Produksi Benih Aneka Kacang.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_1, 'kode' => 'PT.05.01.06', 'nama' => 'Produksi Benih Umbi.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_1, 'kode' => 'PT.05.01.07', 'nama' => 'Kelembagaan Produksi.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_1, 'kode' => 'PT.05.01.08', 'nama' => 'Kelembagaan Pengawasan.', 'sifat' => 'B'],

            // PT.05.02 (Budidaya Serealia)
            ['parent_id' => $pt_5_2, 'kode' => 'PT.05.02.01', 'nama' => 'Padi Irigasi.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_2, 'kode' => 'PT.05.02.02', 'nama' => 'Padi Rawa.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_2, 'kode' => 'PT.05.02.03', 'nama' => 'Padi Tadah Hujan.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_2, 'kode' => 'PT.05.02.04', 'nama' => 'Padi Tadah Lahan Kering.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_2, 'kode' => 'PT.05.02.05', 'nama' => 'Intensifikasi Jagung.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_2, 'kode' => 'PT.05.02.06', 'nama' => 'Pengembangan Jagung.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_2, 'kode' => 'PT.05.02.07', 'nama' => 'Intensifikasi Serealia Lain.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_2, 'kode' => 'PT.05.02.08', 'nama' => 'Pengembangan Serealia Lain.', 'sifat' => 'B'],

            // PT.05.03 (Budidaya Aneka Kacang dan Umbi)
            ['parent_id' => $pt_5_3, 'kode' => 'PT.05.03.01', 'nama' => 'Intensifikasi Kedelai.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_3, 'kode' => 'PT.05.03.02', 'nama' => 'Pengembangan Kedelai.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_3, 'kode' => 'PT.05.03.03', 'nama' => 'Intensifikasi Ubi Kayu.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_3, 'kode' => 'PT.05.03.04', 'nama' => 'Pengembangan Ubi Kayu.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_3, 'kode' => 'PT.05.03.05', 'nama' => 'Intensifikasi Aneka Kacang.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_3, 'kode' => 'PT.05.03.06', 'nama' => 'Pengembangan Aneka Kacang.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_3, 'kode' => 'PT.05.03.07', 'nama' => 'Intensifikasi Aneka Umbi.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_3, 'kode' => 'PT.05.03.08', 'nama' => 'Pengembangan Aneka Umbi.', 'sifat' => 'B'],

            // PT.05.04 (Perlindungan Tanaman Pangan)
            ['parent_id' => $pt_5_4, 'kode' => 'PT.05.04.01', 'nama' => 'Monitoring dan Analisis Data organisme pengganggu tumbuhan.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_4, 'kode' => 'PT.05.04.02', 'nama' => 'Evaluasi dan Pelaporan data organisme pengganggu tumbuhan.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_4, 'kode' => 'PT.05.04.03', 'nama' => 'Adaptasi Dampak Perubahan Iklim.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_4, 'kode' => 'PT.05.04.04', 'nama' => 'Mitigasi dampak perubahan iklim.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_4, 'kode' => 'PT.05.04.05', 'nama' => 'Identifikasi teknologi pengendalian organisme pengganggu tumbuhan.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_4, 'kode' => 'PT.05.04.06', 'nama' => 'Verifikasi teknologi pengendalian organisme pengganggu tumbuhan.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_4, 'kode' => 'PT.05.04.07', 'nama' => 'Pemasyarakatan pengelolaan pengendalian hama terpadu, serta analisis mengenai dampak lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_4, 'kode' => 'PT.05.04.08', 'nama' => 'Kelembagaan pengelolaan pengendalian hama terpadu, serta analisis mengenai dampak lingkungan.', 'sifat' => 'B'],

            // PT.05.05 (Pascapanen Tanaman Pangan)
            ['parent_id' => $pt_5_5, 'kode' => 'PT.05.05.01', 'nama' => 'Teknologi pascapanen padi.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_5, 'kode' => 'PT.05.05.02', 'nama' => 'Sarana pascapanen padi.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_5, 'kode' => 'PT.05.05.03', 'nama' => 'Teknologi pascapanen jagung dan serealia lain.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_5, 'kode' => 'PT.05.05.04', 'nama' => 'Sarana pascapanen jagung dan serealia lain.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_5, 'kode' => 'PT.05.05.05', 'nama' => 'Teknologi pascapanen kedelai dan aneka kacang.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_5, 'kode' => 'PT.05.05.06', 'nama' => 'Sarana pascapanen kedelai dan aneka kacang.', 'sifat' => 'B'],
            ['parent_id' => $pt_5_5, 'kode' => 'PT.05.05.07', 'nama' => 'Teknologi pascapanen aneka umbi. Sarana pascapanen aneka umbi.', 'sifat' => 'B'],
        ]);

        // Mengambil ID untuk memasukkan Level Cicit (Level 4) - Bagian 2
        $pt_6_1 = DB::table('klasifikasis')->where('kode', 'PT.06.01')->value('id');
        $pt_6_2 = DB::table('klasifikasis')->where('kode', 'PT.06.02')->value('id');
        $pt_6_3 = DB::table('klasifikasis')->where('kode', 'PT.06.03')->value('id');
        $pt_6_4 = DB::table('klasifikasis')->where('kode', 'PT.06.04')->value('id');
        $pt_6_5 = DB::table('klasifikasis')->where('kode', 'PT.06.05')->value('id');

        $pt_7_1 = DB::table('klasifikasis')->where('kode', 'PT.07.01')->value('id');
        $pt_7_2 = DB::table('klasifikasis')->where('kode', 'PT.07.02')->value('id');
        $pt_7_4 = DB::table('klasifikasis')->where('kode', 'PT.07.04')->value('id');

        $pt_9_1 = DB::table('klasifikasis')->where('kode', 'PT.09.01')->value('id');
        $pt_9_2 = DB::table('klasifikasis')->where('kode', 'PT.09.02')->value('id');
        $pt_9_3 = DB::table('klasifikasis')->where('kode', 'PT.09.03')->value('id');
        $pt_9_4 = DB::table('klasifikasis')->where('kode', 'PT.09.04')->value('id');

        $pt_10_1 = DB::table('klasifikasis')->where('kode', 'PT.10.01')->value('id');
        $pt_10_2 = DB::table('klasifikasis')->where('kode', 'PT.10.02')->value('id');
        $pt_10_3 = DB::table('klasifikasis')->where('kode', 'PT.10.03')->value('id');
        $pt_10_4 = DB::table('klasifikasis')->where('kode', 'PT.10.04')->value('id');
        $pt_10_5 = DB::table('klasifikasis')->where('kode', 'PT.10.05')->value('id');
        $pt_10_6 = DB::table('klasifikasis')->where('kode', 'PT.10.06')->value('id');
        $pt_10_7 = DB::table('klasifikasis')->where('kode', 'PT.10.07')->value('id');
        $pt_10_8 = DB::table('klasifikasis')->where('kode', 'PT.10.08')->value('id');
        $pt_10_9 = DB::table('klasifikasis')->where('kode', 'PT.10.09')->value('id');
        $pt_10_10 = DB::table('klasifikasis')->where('kode', 'PT.10.10')->value('id');
        $pt_10_11 = DB::table('klasifikasis')->where('kode', 'PT.10.11')->value('id');

        // --- LEVEL 4 (CICIT) BAGIAN 2 ---
        DB::table('klasifikasis')->insertOrIgnore([
            // PT.06.01 (Pengolahan Hasil Pertanian)
            ['parent_id' => $pt_6_1, 'kode' => 'PT.06.01.01', 'nama' => 'Tanaman Pangan Serelia.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_1, 'kode' => 'PT.06.01.02', 'nama' => 'Tanaman Pangan Aneka Kacang dan Aneka Umbi.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_1, 'kode' => 'PT.06.01.03', 'nama' => 'Tanaman Buah dan Sayuran.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_1, 'kode' => 'PT.06.01.04', 'nama' => 'Tanaman Florakultura dan Tanaman Obat.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_1, 'kode' => 'PT.06.01.05', 'nama' => 'Tanaman Perkebunan Semusim.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_1, 'kode' => 'PT.06.01.06', 'nama' => 'Tanaman Perkebunan Tahunan.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_1, 'kode' => 'PT.06.01.07', 'nama' => 'Peternakan Ruminansia.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_1, 'kode' => 'PT.06.01.08', 'nama' => 'Peternakan Non Ruminansia.', 'sifat' => 'B'],

            // PT.06.02 (Mutu dan Standariasi)
            ['parent_id' => $pt_6_2, 'kode' => 'PT.06.02.01', 'nama' => 'Standardisasi Tanaman Pangan dan Hortikultura.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_2, 'kode' => 'PT.06.02.02', 'nama' => 'Standardisasi Perkebunan dan Peternakan.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_2, 'kode' => 'PT.06.02.03', 'nama' => 'Penerapan dan Pengawasan Jaminan Mutu Tanaman Pangan dan Hortikultura.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_2, 'kode' => 'PT.06.02.04', 'nama' => 'Penerapan dan Pengawasan Jaminan Mutu Perkebunan dan Peternakan.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_2, 'kode' => 'PT.06.02.05', 'nama' => 'Akreditasi dan Kelembagaan Tanaman Pangan dan Hortikultura.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_2, 'kode' => 'PT.06.02.06', 'nama' => 'Akreditasi dan Kelembagaan Perkebunan dan Peternakan.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_2, 'kode' => 'PT.06.02.07', 'nama' => 'Kerjasama dan Harmonisasi Tanaman Pangan dan Hortikultura.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_2, 'kode' => 'PT.06.02.08', 'nama' => 'Kerjasama dan Harmonisasi Perkebunan dan Peternakan.', 'sifat' => 'B'],

            // PT.06.03 (Pengembangan Usaha dan Investasi)
            ['parent_id' => $pt_6_3, 'kode' => 'PT.06.03.01', 'nama' => 'Kemitraan.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_3, 'kode' => 'PT.06.03.02', 'nama' => 'Kewirausahaan dan Ekonomi Kreatif.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_3, 'kode' => 'PT.06.03.03', 'nama' => 'Investasi Tanaman Pangan dan Hortikultura.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_3, 'kode' => 'PT.06.03.04', 'nama' => 'Investasi Perkebunan dan Peternakan.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_3, 'kode' => 'PT.06.03.05', 'nama' => 'Daya Saing Promosi Dalam Negeri.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_3, 'kode' => 'PT.06.03.06', 'nama' => 'Eksibisi dan Ekspo Promosi Dalam Negeri.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_3, 'kode' => 'PT.06.03.07', 'nama' => 'Daya Saing Promosi Luar Negeri.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_3, 'kode' => 'PT.06.03.08', 'nama' => 'Eksibisi dan Ekspo Promosi Luar Negeri.', 'sifat' => 'B'],

            // PT.06.04 (Pemasaran Domestik)
            ['parent_id' => $pt_6_4, 'kode' => 'PT.06.04.01', 'nama' => 'Analisis Informasi Pasar.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_4, 'kode' => 'PT.06.04.02', 'nama' => 'Deseminasi Informasi Pasar.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_4, 'kode' => 'PT.06.04.03', 'nama' => 'Pemantauan Pasar.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_4, 'kode' => 'PT.06.04.04', 'nama' => 'Stabilisasi Harga.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_4, 'kode' => 'PT.06.04.05', 'nama' => 'Sarana Pasar.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_4, 'kode' => 'PT.06.04.06', 'nama' => 'Kelembagaan Pasar.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_4, 'kode' => 'PT.06.04.07', 'nama' => 'Akses Pasar untuk Jaringan Pemasaran.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_4, 'kode' => 'PT.06.04.08', 'nama' => 'Sarana Pemasaran untuk Jaringan Pemasaran.', 'sifat' => 'B'],

            // PT.06.05 (Pemasaran Internasional)
            ['parent_id' => $pt_6_5, 'kode' => 'PT.06.05.01', 'nama' => 'Analisis Ekspor.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_5, 'kode' => 'PT.06.05.02', 'nama' => 'Pengembangan Ekspor.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_5, 'kode' => 'PT.06.05.03', 'nama' => 'Pemasaran Bilateral.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_5, 'kode' => 'PT.06.05.04', 'nama' => 'Pemasaran Regional.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_5, 'kode' => 'PT.06.05.05', 'nama' => 'Pemasaran Multilateral.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_5, 'kode' => 'PT.06.05.06', 'nama' => 'Kerjasama Komoditi Regional.', 'sifat' => 'B'],
            ['parent_id' => $pt_6_5, 'kode' => 'PT.06.05.07', 'nama' => 'Kerjasama Komoditi Multilateral dan Bilateral.', 'sifat' => 'B'],

            // PT.07.01 (Administrasi)
            ['parent_id' => $pt_7_1, 'kode' => 'PT.07.01.01', 'nama' => 'Rencana Kerja.', 'sifat' => 'B'],
            ['parent_id' => $pt_7_1, 'kode' => 'PT.07.01.02', 'nama' => 'TOR/ Proposal.', 'sifat' => 'B'],
            ['parent_id' => $pt_7_1, 'kode' => 'PT.07.01.03', 'nama' => 'Pembentukan Tim Kerja.', 'sifat' => 'B'],
            ['parent_id' => $pt_7_1, 'kode' => 'PT.07.01.04', 'nama' => 'Surat menyurat.', 'sifat' => 'B'],

            // PT.07.02 (Hasil Penelitian, Pengkajian, dan Pengembangan)
            ['parent_id' => $pt_7_2, 'kode' => 'PT.07.02.01', 'nama' => 'Hasil Penelitian dan Pengembangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_7_2, 'kode' => 'PT.07.02.02', 'nama' => 'Hasil Pengkajian dan Kebijakan dan Strategi.', 'sifat' => 'B'],

            // PT.07.04 (Publikasi Hasil Penelitian/ Pengkajian)
            ['parent_id' => $pt_7_4, 'kode' => 'PT.07.04.01', 'nama' => 'Pameran, Temu Lapang, Temu Bisnis,Demlot, Seminar Lokakarya,Temu Karya, Workshop.', 'sifat' => 'B'],
            ['parent_id' => $pt_7_4, 'kode' => 'PT.07.04.02', 'nama' => 'Jurnal, Buletin,Monograf,Prosiding,dan Publikasi lainnya.', 'sifat' => 'B'],

            // PT.09.01 (Ketersediaan dan Kerawanan Pangan)
            ['parent_id' => $pt_9_1, 'kode' => 'PT.09.01.01', 'nama' => 'Analisis Ketersediaan Pangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_9_1, 'kode' => 'PT.09.01.02', 'nama' => 'Sumberdaya Pangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_9_1, 'kode' => 'PT.09.01.03', 'nama' => 'Analisis Akses Pangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_9_1, 'kode' => 'PT.09.01.04', 'nama' => 'Pengembangan Akses Pangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_9_1, 'kode' => 'PT.09.01.05', 'nama' => 'Analisis Kerawanan Pangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_9_1, 'kode' => 'PT.09.01.06', 'nama' => 'Penanggulangan Kerawanan Pangan.', 'sifat' => 'B'],

            // PT.09.02 (Distribusi dan Cadangan Pangan)
            ['parent_id' => $pt_9_2, 'kode' => 'PT.09.02.01', 'nama' => 'Analisis Distribusi Pangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_9_2, 'kode' => 'PT.09.02.02', 'nama' => 'Kelembagaan Distribusi Pangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_9_2, 'kode' => 'PT.09.02.03', 'nama' => 'Analisis Harga Pangan Produsen.', 'sifat' => 'B'],
            ['parent_id' => $pt_9_2, 'kode' => 'PT.09.02.04', 'nama' => 'Analisis Harga Pangan Konsumen.', 'sifat' => 'B'],
            ['parent_id' => $pt_9_2, 'kode' => 'PT.09.02.05', 'nama' => 'Cadangan Pangan Pemerintah.', 'sifat' => 'B'],
            ['parent_id' => $pt_9_2, 'kode' => 'PT.09.02.06', 'nama' => 'Cadangan Pangan Masyarakat.', 'sifat' => 'B'],

            // PT.09.03 (Penganekaragaman Konsumsi dan Ketahanan Pangan)
            ['parent_id' => $pt_9_3, 'kode' => 'PT.09.03.01', 'nama' => 'Pola Konsumsi Pangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_9_3, 'kode' => 'PT.09.03.02', 'nama' => 'Kebutuhan Konsumsi Pangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_9_3, 'kode' => 'PT.09.03.03', 'nama' => 'Pengembangan Pangan Lokal.', 'sifat' => 'B'],
            ['parent_id' => $pt_9_3, 'kode' => 'PT.09.03.04', 'nama' => 'Promosi Penganekaragaman Pangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_9_3, 'kode' => 'PT.09.03.05', 'nama' => 'Pengawasan Keamanan Pangan Segar.', 'sifat' => 'B'],
            ['parent_id' => $pt_9_3, 'kode' => 'PT.09.03.06', 'nama' => 'Kelembagaan Keamanan Pangan Segar.', 'sifat' => 'B'],

            // PT.09.04 (Penguatan Kelembagaan Ketahanan Pangan)
            ['parent_id' => $pt_9_4, 'kode' => 'PT.09.04.01', 'nama' => 'Pengelolaan Lembaga Ketahanan Pangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_9_4, 'kode' => 'PT.09.04.02', 'nama' => 'Dewan Ketahanan Pangan.', 'sifat' => 'B'],
            ['parent_id' => $pt_9_4, 'kode' => 'PT.09.04.03', 'nama' => 'SOLID.', 'sifat' => 'B'],
            ['parent_id' => $pt_9_4, 'kode' => 'PT.09.04.04', 'nama' => 'Penghargaan Ketahan Pangan.', 'sifat' => 'B'],

            // PT.10.01 (Data karantina Hewan)
            ['parent_id' => $pt_10_1, 'kode' => 'PT.10.01.01', 'nama' => 'Data Penyakit Hewan.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_1, 'kode' => 'PT.10.01.02', 'nama' => 'Teknik dan Metode.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_1, 'kode' => 'PT.10.01.03', 'nama' => 'Data Kualitatif dan Kuantitatif.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_1, 'kode' => 'PT.10.01.04', 'nama' => 'Data Sarana/Laboratorium/Lokasi.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_1, 'kode' => 'PT.10.01.05', 'nama' => 'Laporan.', 'sifat' => 'B'],

            // PT.10.02 (Data Karantina Tumbuhan)
            ['parent_id' => $pt_10_2, 'kode' => 'PT.10.02.01', 'nama' => 'Data Penyakit Tumbuhan.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_2, 'kode' => 'PT.10.02.02', 'nama' => 'Teknik dan Metode.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_2, 'kode' => 'PT.10.02.03', 'nama' => 'Data Kualitatif dan Kuantitatif.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_2, 'kode' => 'PT.10.02.04', 'nama' => 'Data Sarana/Laboratorium/Lokasi.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_2, 'kode' => 'PT.10.02.05', 'nama' => 'Laporan.', 'sifat' => 'B'],

            // PT.10.03 (Inventarisasi Penyakit Hewan)
            ['parent_id' => $pt_10_3, 'kode' => 'PT.10.03.01', 'nama' => 'Survei.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_3, 'kode' => 'PT.10.03.02', 'nama' => 'Determinasi Penyakit/Daerah Pencar.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_3, 'kode' => 'PT.10.03.03', 'nama' => 'Pengamatan Penyakit di laboratorium/kandang uji diagnose.', 'sifat' => 'B'],

            // PT.10.04 (Inventarisasi Penyakit Tumbuhan)
            ['parent_id' => $pt_10_4, 'kode' => 'PT.10.04.01', 'nama' => 'Survei.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_4, 'kode' => 'PT.10.04.02', 'nama' => 'Determinasi Penyakit/Daerah Pencar. Pengamatan Penyakit di laboratorium/kandang uji diagnose.', 'sifat' => 'B'],

            // PT.10.05 (Tindakan Karantina Hewan)
            ['parent_id' => $pt_10_5, 'kode' => 'PT.10.05.01', 'nama' => 'Pemeriksaan.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_5, 'kode' => 'PT.10.05.02', 'nama' => 'Pengasingan.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_5, 'kode' => 'PT.10.05.03', 'nama' => 'Pengamatan.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_5, 'kode' => 'PT.10.05.04', 'nama' => 'Perlakuan.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_5, 'kode' => 'PT.10.05.05', 'nama' => 'Penahanan.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_5, 'kode' => 'PT.10.05.06', 'nama' => 'Penolakan.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_5, 'kode' => 'PT.10.05.07', 'nama' => 'Pemusnahan.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_5, 'kode' => 'PT.10.05.08', 'nama' => 'Pembebasan.', 'sifat' => 'B'],

            // PT.10.06 (Tindakan Karantina Tumbuhan)
            ['parent_id' => $pt_10_6, 'kode' => 'PT.10.06.01', 'nama' => 'Pemeriksaan.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_6, 'kode' => 'PT.10.06.02', 'nama' => 'Pengasingan.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_6, 'kode' => 'PT.10.06.03', 'nama' => 'Pengamatan.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_6, 'kode' => 'PT.10.06.04', 'nama' => 'Perlakuan.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_6, 'kode' => 'PT.10.06.05', 'nama' => 'Penahanan.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_6, 'kode' => 'PT.10.06.06', 'nama' => 'Penolakan.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_6, 'kode' => 'PT.10.06.07', 'nama' => 'Pemusnahan.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_6, 'kode' => 'PT.10.06.08', 'nama' => 'Pembebasan.', 'sifat' => 'B'],

            // PT.10.07 (Sertifikasi Pelepasan Karantina)
            ['parent_id' => $pt_10_7, 'kode' => 'PT.10.07.01', 'nama' => 'Sertifikasi Pelepasan Karantina Hewan.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_7, 'kode' => 'PT.10.07.02', 'nama' => 'Sertifikasi Pelepasan Karantina Tumbuhan.', 'sifat' => 'B'],

            // PT.10.08 (Pemberantasan Penyakit Hewan)
            ['parent_id' => $pt_10_8, 'kode' => 'PT.10.08.01', 'nama' => 'Penutupan Satu Daerah.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_8, 'kode' => 'PT.10.08.02', 'nama' => 'Pembatasan Gerak HPHK.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_8, 'kode' => 'PT.10.08.03', 'nama' => 'Pembinasaan HPHK.', 'sifat' => 'B'],

            // PT.10.09 (Pemberantasan Penyakit Tumbuhan)
            ['parent_id' => $pt_10_9, 'kode' => 'PT.10.09.01', 'nama' => 'Penutupan Satu Daerah.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_9, 'kode' => 'PT.10.09.02', 'nama' => 'Pembatasan Gerak OPHK.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_9, 'kode' => 'PT.10.09.03', 'nama' => 'Pembinasaan OPHK.', 'sifat' => 'B'],

            // PT.10.10 (Keamanan Pangan)
            ['parent_id' => $pt_10_10, 'kode' => 'PT.10.10.01', 'nama' => 'Pengawasan Keamanan PSAH (Pangan Segar Asal Hewan).', 'sifat' => 'B'],
            ['parent_id' => $pt_10_10, 'kode' => 'PT.10.10.02', 'nama' => 'Pengawasan Keamanan PSAT (Pangan Segar Asal Tumbuhan).', 'sifat' => 'B'],

            // PT.10.11 (Tertib Operasional Karantina Hewan)
            ['parent_id' => $pt_10_11, 'kode' => 'PT.10.11.01', 'nama' => 'Penelitian Data Laporan Operasional.', 'sifat' => 'B'],
            ['parent_id' => $pt_10_11, 'kode' => 'PT.10.11.02', 'nama' => 'Polisi Khusus/Ketertiban (PPNS).', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: LH (Lingkungan Hidup)
        // (Sesuai dengan dokumen yang baru dilampirkan, tanpa underscore!)
        // ==============================================================================
        $id_lh = DB::table('klasifikasis')->where('kode', 'LH')->value('id');

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_lh, 'kode' => 'LH.01', 'nama' => 'Tata Lingkungan:', 'sifat' => 'B'],
            ['parent_id' => $id_lh, 'kode' => 'LH.02', 'nama' => 'Pengendalian Pencemaran Lingkungan:', 'sifat' => 'B'],
            ['parent_id' => $id_lh, 'kode' => 'LH.03', 'nama' => 'Pengendalian Kerusakan Lingkungan Dan Perubahan Iklim:', 'sifat' => 'B'],
            ['parent_id' => $id_lh, 'kode' => 'LH.04', 'nama' => 'Dampak Lingkungan:', 'sifat' => 'B'],
        ]);

        $lh_1 = DB::table('klasifikasis')->where('kode', 'LH.01')->value('id');
        $lh_2 = DB::table('klasifikasis')->where('kode', 'LH.02')->value('id');
        $lh_3 = DB::table('klasifikasis')->where('kode', 'LH.03')->value('id');
        $lh_4 = DB::table('klasifikasis')->where('kode', 'LH.04')->value('id');

        // --- LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah LH.01 (Perhatikan ada kode 02 yang berulang 3 kali di dokumen)
            ['parent_id' => $lh_1, 'kode' => 'LH.01.01', 'nama' => 'Perencanaan Pemanfaatan Sumber Daya Alam dan Lingkungan Hidup.', 'sifat' => 'B'],
            ['parent_id' => $lh_1, 'kode' => 'LH.01.02', 'nama' => 'Inventarisasi, penerapan ekoregion, dan rencana perlindungan dan pengelolaan lingkungan:', 'sifat' => 'B'],
            ['parent_id' => $lh_1, 'kode' => 'LH.01.02', 'nama' => 'Evaluasi Pemanfaatan Sumber Daya Alam:', 'sifat' => 'B'], // Kode Kembar
            ['parent_id' => $lh_1, 'kode' => 'LH.01.02', 'nama' => 'Penerapan Kebijakan Wilayah dan Sektor:', 'sifat' => 'B'], // Kode Kembar
            ['parent_id' => $lh_1, 'kode' => 'LH.01.03', 'nama' => 'Ekonomi Lingkungan:', 'sifat' => 'B'],

            // Bawah LH.02
            ['parent_id' => $lh_2, 'kode' => 'LH.02.01', 'nama' => 'Pemantauan dan Pengawasan:', 'sifat' => 'B'],
            ['parent_id' => $lh_2, 'kode' => 'LH.02.02', 'nama' => 'Evaluasi dan Pengembangan:', 'sifat' => 'B'],

            // Bawah LH.03
            ['parent_id' => $lh_3, 'kode' => 'LH.03.01', 'nama' => 'Keanekaragaman Hayati dan Pengendalian Kerusakan Lahan:', 'sifat' => 'B'],
            ['parent_id' => $lh_3, 'kode' => 'LH.03.02', 'nama' => 'Kerusakan Ekosistem Perairan Darat:', 'sifat' => 'B'],
            ['parent_id' => $lh_3, 'kode' => 'LH.03.03', 'nama' => 'Pengendalian Kerusakan Pesisir dan Laut:', 'sifat' => 'B'],
            ['parent_id' => $lh_3, 'kode' => 'LH.03.04', 'nama' => 'Mitigasi dan Pelestarian Fungsi Atmosfer:', 'sifat' => 'B'],
            ['parent_id' => $lh_3, 'kode' => 'LH.03.05', 'nama' => 'Adaptasi Perubahan Iklim:', 'sifat' => 'B'],

            // Bawah LH.04
            ['parent_id' => $lh_4, 'kode' => 'LH.04.01', 'nama' => 'Bimtek Dampak Lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $lh_4, 'kode' => 'LH.04.02', 'nama' => 'Penerapan Sistem Kajian Dampak Lingkungan dalam Penilaian dokumen lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $lh_4, 'kode' => 'LH.04.03', 'nama' => 'Penerapan Sistem Kajian Dampak Lingkungan dalam Pemeriksaan dokumen lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $lh_4, 'kode' => 'LH.04.04', 'nama' => 'Evaluasi.', 'sifat' => 'B'],
            ['parent_id' => $lh_4, 'kode' => 'LH.04.05', 'nama' => 'Tindak Lanjut Hasil Evaluasi.', 'sifat' => 'B'],
        ]);

        // Mengambil ID untuk memasukkan Level Cicit (Level 4)
        // Karena ada kode kembar di LH.01.02, kita tarik ID-nya berdasarkan Nama juga biar spesifik
        $lh_1_2_inv = DB::table('klasifikasis')->where('kode', 'LH.01.02')->where('nama', 'like', 'Inventarisasi%')->value('id');
        $lh_1_2_eva = DB::table('klasifikasis')->where('kode', 'LH.01.02')->where('nama', 'like', 'Evaluasi Pemanfaatan%')->value('id');
        $lh_1_2_pen = DB::table('klasifikasis')->where('kode', 'LH.01.02')->where('nama', 'like', 'Penerapan Kebijakan%')->value('id');
        $lh_1_3 = DB::table('klasifikasis')->where('kode', 'LH.01.03')->value('id');

        $lh_2_1 = DB::table('klasifikasis')->where('kode', 'LH.02.01')->value('id');
        $lh_2_2 = DB::table('klasifikasis')->where('kode', 'LH.02.02')->value('id');

        $lh_3_1 = DB::table('klasifikasis')->where('kode', 'LH.03.01')->value('id');
        $lh_3_2 = DB::table('klasifikasis')->where('kode', 'LH.03.02')->value('id');
        $lh_3_3 = DB::table('klasifikasis')->where('kode', 'LH.03.03')->value('id');
        $lh_3_4 = DB::table('klasifikasis')->where('kode', 'LH.03.04')->value('id');
        $lh_3_5 = DB::table('klasifikasis')->where('kode', 'LH.03.05')->value('id');

        // --- LEVEL CICIT (Level 4) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah LH.01.02 (Inventarisasi)
            ['parent_id' => $lh_1_2_inv, 'kode' => 'LH.01.02.01', 'nama' => 'Dokumentasi Inventarisasi.', 'sifat' => 'B'],
            ['parent_id' => $lh_1_2_inv, 'kode' => 'LH.01.02.02', 'nama' => 'Pedoman Inventarisasi.', 'sifat' => 'B'],
            ['parent_id' => $lh_1_2_inv, 'kode' => 'LH.01.02.03', 'nama' => 'Penetapan Ekoregion.', 'sifat' => 'B'],
            ['parent_id' => $lh_1_2_inv, 'kode' => 'LH.01.02.04', 'nama' => 'Rencana Perlindungan dan Pengelolaan Lingkungan Hidup (RPPLH) Nasional.', 'sifat' => 'B'],
            ['parent_id' => $lh_1_2_inv, 'kode' => 'LH.01.02.05', 'nama' => 'Pedoman Penyusunan RPPLH Provinsi, RPPLH Kabupaten/Kota.', 'sifat' => 'B'],
            
            // Bawah LH.01.02 (Evaluasi)
            ['parent_id' => $lh_1_2_eva, 'kode' => 'LH.01.02.01', 'nama' => 'Evaluasi pemanfaatan dan pencadangan sumber daya alam.', 'sifat' => 'B'],
            ['parent_id' => $lh_1_2_eva, 'kode' => 'LH.01.02.02', 'nama' => 'Kebijakan pemanfaatan sumber daya alam.', 'sifat' => 'B'],

            // Bawah LH.01.02 (Penerapan)
            ['parent_id' => $lh_1_2_pen, 'kode' => 'LH.01.02.01', 'nama' => 'Evaluasi Penerapan.', 'sifat' => 'B'],
            ['parent_id' => $lh_1_2_pen, 'kode' => 'LH.01.02.02', 'nama' => 'Perencanaan Lingkungan Hidup.', 'sifat' => 'B'],

            // Bawah LH.01.03
            ['parent_id' => $lh_1_3, 'kode' => 'LH.01.03.01', 'nama' => 'Perencanaan Evaluasi Ekonomi.', 'sifat' => 'B'],
            ['parent_id' => $lh_1_3, 'kode' => 'LH.01.03.02', 'nama' => 'Perencanaan Internalisasi Lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $lh_1_3, 'kode' => 'LH.01.03.03', 'nama' => 'Insentif dan Pendanaan Lingkungan.', 'sifat' => 'B'],

            // Bawah LH.02.01
            ['parent_id' => $lh_2_1, 'kode' => 'LH.02.01.01', 'nama' => 'Industri Kimia.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_1, 'kode' => 'LH.02.01.02', 'nama' => 'Industri Logam, Elektronika dan Mesin.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_1, 'kode' => 'LH.02.01.03', 'nama' => 'Aneka Industri.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_1, 'kode' => 'LH.02.01.04', 'nama' => 'Prasarana dan Jasa.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_1, 'kode' => 'LH.02.01.05', 'nama' => 'Pertambangan, Energi, Minyak dan Gas.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_1, 'kode' => 'LH.02.01.06', 'nama' => 'Peternakan dan Perikanan.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_1, 'kode' => 'LH.02.01.07', 'nama' => 'Perkebunan.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_1, 'kode' => 'LH.02.01.08', 'nama' => 'Kehutanan dan Holtikultura.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_1, 'kode' => 'LH.02.01.09', 'nama' => 'Usaha Skala Kecil.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_1, 'kode' => 'LH.02.01.10', 'nama' => 'Transportasi Air dan Udara.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_1, 'kode' => 'LH.02.01.11', 'nama' => 'Transportasi Darat.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_1, 'kode' => 'LH.02.01.12', 'nama' => 'Transportasi Kereta Api dan Kendaraan Berat.', 'sifat' => 'B'],

            // Bawah LH.02.02
            ['parent_id' => $lh_2_2, 'kode' => 'LH.02.02.01', 'nama' => 'Industri Kimia.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_2, 'kode' => 'LH.02.02.02', 'nama' => 'Industri Logam, Elektronika dan Mesin.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_2, 'kode' => 'LH.02.02.03', 'nama' => 'Aneka Industri.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_2, 'kode' => 'LH.02.02.04', 'nama' => 'Prasarana dan Jasa.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_2, 'kode' => 'LH.02.02.05', 'nama' => 'Pertambangan, Energi, Minyak dan Gas.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_2, 'kode' => 'LH.02.02.06', 'nama' => 'Peternakan dan Perikanan.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_2, 'kode' => 'LH.02.02.07', 'nama' => 'Perkebunan.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_2, 'kode' => 'LH.02.02.08', 'nama' => 'Kehutanan dan Holtikultura.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_2, 'kode' => 'LH.02.02.09', 'nama' => 'Usaha Skala Kecil.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_2, 'kode' => 'LH.02.02.10', 'nama' => 'Transportasi Air dan Udara.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_2, 'kode' => 'LH.02.02.11', 'nama' => 'Transportasi Darat.', 'sifat' => 'B'],
            ['parent_id' => $lh_2_2, 'kode' => 'LH.02.02.12', 'nama' => 'Transportasi Kereta Api dan Kendaraan Berat.', 'sifat' => 'B'],

            // Bawah LH.03.01
            ['parent_id' => $lh_3_1, 'kode' => 'LH.03.01.01', 'nama' => 'Pengembangan Sumber Daya Genetik.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_1, 'kode' => 'LH.03.01.02', 'nama' => 'Pengembangan Keamanan Hayati.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_1, 'kode' => 'LH.03.01.03', 'nama' => 'Pemanfaatan Sumber Daya Genetik.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_1, 'kode' => 'LH.03.01.04', 'nama' => 'Pengelolaan Sumber Daya Genetik /Pengembangan dan Pemanfaatan.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_1, 'kode' => 'LH.03.01.05', 'nama' => 'Pemantauan dan Pengawasan Pengelolaan Sumber Daya Genetik.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_1, 'kode' => 'LH.03.01.06', 'nama' => 'Pengembangan dan Pengelolaan Keamanan Hayati.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_1, 'kode' => 'LH.03.01.07', 'nama' => 'Pemantauan dan Pengawasan Keamanan Hayati.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_1, 'kode' => 'LH.03.01.08', 'nama' => 'Pengendalian Kerusakan Lahan Budidaya.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_1, 'kode' => 'LH.03.01.09', 'nama' => 'Lahan Non Budidaya.', 'sifat' => 'B'],

            // Bawah LH.03.02
            ['parent_id' => $lh_3_2, 'kode' => 'LH.03.02.01', 'nama' => 'Kerusakan Ekosistem Sungai.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_2, 'kode' => 'LH.03.02.02', 'nama' => 'Pengelolaan Kualitas Air Sungai.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_2, 'kode' => 'LH.03.02.03', 'nama' => 'Pengendalian Kerusakan Ekosistem Danau.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_2, 'kode' => 'LH.03.02.04', 'nama' => 'Pengelolaan Kualitas Air Danau.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_2, 'kode' => 'LH.03.02.05', 'nama' => 'Kerusakan Ekosistem Rawa Gambut.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_2, 'kode' => 'LH.03.02.06', 'nama' => 'Kerusakan Ekosistem Rawa bukan Gambut.', 'sifat' => 'B'],

            // Bawah LH.03.03
            ['parent_id' => $lh_3_3, 'kode' => 'LH.03.03.01', 'nama' => 'Pencegahan.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_3, 'kode' => 'LH.03.03.02', 'nama' => 'Penanggulangan.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_3, 'kode' => 'LH.03.03.03', 'nama' => 'Pemulihan.', 'sifat' => 'B'],

            // Bawah LH.03.04
            ['parent_id' => $lh_3_4, 'kode' => 'LH.03.04.01', 'nama' => 'Perangkat Mitigasi.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_4, 'kode' => 'LH.03.04.02', 'nama' => 'Laporan inventarisasi GRK nasional.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_4, 'kode' => 'LH.03.04.03', 'nama' => 'Data bidang inventarisasi GRK.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_4, 'kode' => 'LH.03.04.04', 'nama' => 'Surat rekomendasi kepada importir terdaftar dan bahan perusak ozon.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_4, 'kode' => 'LH.03.04.05', 'nama' => 'Hibah bantuan luar negeri terkait program perlindungan lapisan Ozon.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_4, 'kode' => 'LH.03.04.06', 'nama' => 'Pengendalian Kerusakan Akibat Kebakaran Hutan dan Lahan.', 'sifat' => 'B'],

            // Bawah LH.03.05
            ['parent_id' => $lh_3_5, 'kode' => 'LH.03.05.01', 'nama' => 'Pengembangan perangkat adaptasi perubahan iklim.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_5, 'kode' => 'LH.03.05.02', 'nama' => 'Pemantauan dan evaluasi adaptasi perubahan iklim.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_5, 'kode' => 'LH.03.05.03', 'nama' => 'Identifikasi dan analisis kerentanan perubahan iklim.', 'sifat' => 'B'],
            ['parent_id' => $lh_3_5, 'kode' => 'LH.03.05.04', 'nama' => 'Media kliring kerentananan perubahan iklim.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: KM (Komunikasi Lingkungan Dan Pemberdayaan Masyarakat)
        // ==============================================================================
        $id_km = DB::table('klasifikasis')->where('kode', 'KM')->value('id');

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_km, 'kode' => 'KM.01', 'nama' => 'Komunikasi Lingkungan:', 'sifat' => 'B'],
            ['parent_id' => $id_km, 'kode' => 'KM.02', 'nama' => 'Penguatan Inisiatif Masyarakat:', 'sifat' => 'B'],
            ['parent_id' => $id_km, 'kode' => 'KM.03', 'nama' => 'Peningkatan Peran Masyarakat:', 'sifat' => 'B'],
            ['parent_id' => $id_km, 'kode' => 'KM.04', 'nama' => 'Peningkatan Peran Organisasi Kemasyarakatan:', 'sifat' => 'B'],
        ]);

        // Ambil ID anak untuk masukin Cucu
        $km_1 = DB::table('klasifikasis')->where('kode', 'KM.01')->value('id');
        $km_2 = DB::table('klasifikasis')->where('kode', 'KM.02')->value('id');
        $km_3 = DB::table('klasifikasis')->where('kode', 'KM.03')->value('id');
        $km_4 = DB::table('klasifikasis')->where('kode', 'KM.04')->value('id');

        // --- LEVEL CICIT (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah KM.01
            ['parent_id' => $km_1, 'kode' => 'KM.01.01', 'nama' => 'Program Pengembangan Komunikasi.', 'sifat' => 'B'],
            ['parent_id' => $km_1, 'kode' => 'KM.01.02', 'nama' => 'Evaluasi Pengembangan Komunikasi.', 'sifat' => 'B'],
            ['parent_id' => $km_1, 'kode' => 'KM.01.03', 'nama' => 'Publikasi.', 'sifat' => 'B'],
            ['parent_id' => $km_1, 'kode' => 'KM.01.04', 'nama' => 'Kampanye.', 'sifat' => 'B'],

            // Bawah KM.02
            ['parent_id' => $km_2, 'kode' => 'KM.02.01', 'nama' => 'Pengembangan dan Bimbingan Komunitas Pendidikan Lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $km_2, 'kode' => 'KM.02.02', 'nama' => 'Evaluasi Komunitas Pendidikan Lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $km_2, 'kode' => 'KM.02.03', 'nama' => 'Inventarisasi Kearifan Lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $km_2, 'kode' => 'KM.02.04', 'nama' => 'Revitalisasi Kearifan Lingkungan.', 'sifat' => 'B'],

            // Bawah KM.03
            ['parent_id' => $km_3, 'kode' => 'KM.03.01', 'nama' => 'Masyarakat Kawasan Permukiman.', 'sifat' => 'B'],
            ['parent_id' => $km_3, 'kode' => 'KM.03.02', 'nama' => 'Masyarakat Kawasan Rentan.', 'sifat' => 'B'],
            ['parent_id' => $km_3, 'kode' => 'KM.03.03', 'nama' => 'Masyarakat Petani.', 'sifat' => 'B'],
            ['parent_id' => $km_3, 'kode' => 'KM.03.04', 'nama' => 'Masyarakat Nelayan.', 'sifat' => 'B'],

            // Bawah KM.04
            ['parent_id' => $km_4, 'kode' => 'KM.04.01', 'nama' => 'Organisasi Sosial Dan Masyarakat.', 'sifat' => 'B'],
            ['parent_id' => $km_4, 'kode' => 'KM.04.02', 'nama' => 'Organisasi Profesi dan Dunia Usaha.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: PS (Pembinaan Sarana Teknis Lingkungan Dan Peningkatan Kapasitas)
        // ==============================================================================
        $id_ps = DB::table('klasifikasis')->where('kode', 'PS')->value('id');

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_ps, 'kode' => 'PS.01', 'nama' => 'Data dan Informasi Lingkungan:', 'sifat' => 'B'],
            ['parent_id' => $id_ps, 'kode' => 'PS.02', 'nama' => 'Kelembagaan Lingkungan:', 'sifat' => 'B'],
            ['parent_id' => $id_ps, 'kode' => 'PS.03', 'nama' => 'Standarisasi dan Teknologi:', 'sifat' => 'B'],
            ['parent_id' => $id_ps, 'kode' => 'PS.04', 'nama' => 'Pusat Sarana Pengendalian Dampak Lingkungan:', 'sifat' => 'B'],
        ]);

        // Ambil ID anak untuk masukin Cucu
        $ps_1 = DB::table('klasifikasis')->where('kode', 'PS.01')->value('id');
        $ps_2 = DB::table('klasifikasis')->where('kode', 'PS.02')->value('id');
        $ps_3 = DB::table('klasifikasis')->where('kode', 'PS.03')->value('id');
        $ps_4 = DB::table('klasifikasis')->where('kode', 'PS.04')->value('id');

        // --- LEVEL CICIT (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah PS.01
            ['parent_id' => $ps_1, 'kode' => 'PS.01.01', 'nama' => 'Pengumpulan dan Pengolahan Data.', 'sifat' => 'B'],
            ['parent_id' => $ps_1, 'kode' => 'PS.01.02', 'nama' => 'Manajemen Basis Data.', 'sifat' => 'B'],
            ['parent_id' => $ps_1, 'kode' => 'PS.01.03', 'nama' => 'Analisis Data dan Penyajian Informasi.', 'sifat' => 'B'],
            ['parent_id' => $ps_1, 'kode' => 'PS.01.04', 'nama' => 'Pengelolaan Informasi melalui Perpustakaan.', 'sifat' => 'B'],
            ['parent_id' => $ps_1, 'kode' => 'PS.01.05', 'nama' => 'Pengembangan Instrumen Layanan Informasi.', 'sifat' => 'B'],
            ['parent_id' => $ps_1, 'kode' => 'PS.01.06', 'nama' => 'Pengembangan Instrumen Analisis Data.', 'sifat' => 'B'],
            ['parent_id' => $ps_1, 'kode' => 'PS.01.07', 'nama' => 'Pengembangan Sistem Jaringan.', 'sifat' => 'B'],
            ['parent_id' => $ps_1, 'kode' => 'PS.01.08', 'nama' => 'Pemeliharaan Jaringan.', 'sifat' => 'B'],

            // Bawah PS.02
            ['parent_id' => $ps_2, 'kode' => 'PS.02.01', 'nama' => 'Pengembangan Kelembagaan.', 'sifat' => 'B'],
            ['parent_id' => $ps_2, 'kode' => 'PS.02.02', 'nama' => 'Tata Laksana.', 'sifat' => 'B'],
            ['parent_id' => $ps_2, 'kode' => 'PS.02.03', 'nama' => 'Fasilitasi Standar Pelayanan Minimal Daerah Provinsi.', 'sifat' => 'B'],
            ['parent_id' => $ps_2, 'kode' => 'PS.02.04', 'nama' => 'Fasilitasi Standar Pelayanan Minimal Daerah Kabupaten/Kota.', 'sifat' => 'B'],

            // Bawah PS.03
            ['parent_id' => $ps_3, 'kode' => 'PS.03.01', 'nama' => 'Standarisasi Perangkat Manajemen Lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $ps_3, 'kode' => 'PS.03.02', 'nama' => 'Standarisasi Pengujian Lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $ps_3, 'kode' => 'PS.03.03', 'nama' => 'Standarisasi Kompetensi Keahlian Lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $ps_3, 'kode' => 'PS.03.04', 'nama' => 'Standarisasi Kompetensi Lembaga Penyedia Jasa Lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $ps_3, 'kode' => 'PS.03.05', 'nama' => 'Pengembangan Kriteria Teknologi Ramah Lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $ps_3, 'kode' => 'PS.03.06', 'nama' => 'Verifikasi Teknologi Ramah Lingkungan.', 'sifat' => 'B'],

            // Bawah PS.04
            ['parent_id' => $ps_4, 'kode' => 'PS.04.01', 'nama' => 'Pemantauan Kualitas Lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $ps_4, 'kode' => 'PS.04.02', 'nama' => 'Kajian Kualitas Lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $ps_4, 'kode' => 'PS.04.03', 'nama' => 'Laboratorium Rujukan.', 'sifat' => 'B'],
            ['parent_id' => $ps_4, 'kode' => 'PS.04.04', 'nama' => 'Laboratorium Pengujian dan Kalibrasi.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: KUKM (Koperasi dan UMKM)
        // ==============================================================================
        $id_kukm = DB::table('klasifikasis')->where('kode', 'KUKM')->value('id');

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_kukm, 'kode' => 'KUKM.01', 'nama' => 'Kelembagaan Koperasi dan UKM:', 'sifat' => 'B'],
            ['parent_id' => $id_kukm, 'kode' => 'KUKM.02', 'nama' => 'Produksi:', 'sifat' => 'B'],
            ['parent_id' => $id_kukm, 'kode' => 'KUKM.03', 'nama' => 'Pembiayaan:', 'sifat' => 'B'],
            ['parent_id' => $id_kukm, 'kode' => 'KUKM.04', 'nama' => 'Pemasaran dan Jaringan Usaha:', 'sifat' => 'B'],
            ['parent_id' => $id_kukm, 'kode' => 'KUKM.05', 'nama' => 'Pengembangan Sumber Daya Manusia:', 'sifat' => 'B'],
            ['parent_id' => $id_kukm, 'kode' => 'KUKM.06', 'nama' => 'Pengembangan dan Restrukturisasi Usaha:', 'sifat' => 'B'],
            ['parent_id' => $id_kukm, 'kode' => 'KUKM.07', 'nama' => 'Pengkajian Sumber Daya UKMK:', 'sifat' => 'B'],
        ]);

        $kukm_1 = DB::table('klasifikasis')->where('kode', 'KUKM.01')->value('id');
        $kukm_2 = DB::table('klasifikasis')->where('kode', 'KUKM.02')->value('id');
        $kukm_3 = DB::table('klasifikasis')->where('kode', 'KUKM.03')->value('id');
        $kukm_4 = DB::table('klasifikasis')->where('kode', 'KUKM.04')->value('id');
        $kukm_5 = DB::table('klasifikasis')->where('kode', 'KUKM.05')->value('id');
        $kukm_6 = DB::table('klasifikasis')->where('kode', 'KUKM.06')->value('id');
        $kukm_7 = DB::table('klasifikasis')->where('kode', 'KUKM.07')->value('id');

        // --- LEVEL CUCU (Level 3) ---
        // Catatan: Dokumen ini unik karena sub-level dimulai dari angka 00, bukan 01.
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah KUKM.01
            ['parent_id' => $kukm_1, 'kode' => 'KUKM.01.00', 'nama' => 'Organisasi dan Badan Hukum Koperasi.', 'sifat' => 'B'],
            ['parent_id' => $kukm_1, 'kode' => 'KUKM.01.01', 'nama' => 'Peraturan Perundang-Undangan:', 'sifat' => 'B'],
            ['parent_id' => $kukm_1, 'kode' => 'KUKM.01.02', 'nama' => 'Tata Laksana Koperasi dan UKM:', 'sifat' => 'B'],
            ['parent_id' => $kukm_1, 'kode' => 'KUKM.01.03', 'nama' => 'Keanggotaan Koperasi:', 'sifat' => 'B'],
            ['parent_id' => $kukm_1, 'kode' => 'KUKM.01.04', 'nama' => 'Pengendalian dan Akuntabilitas Koperasi dan UKM:', 'sifat' => 'B'],

            // Bawah KUKM.02
            ['parent_id' => $kukm_2, 'kode' => 'KUKM.02.00', 'nama' => 'Pertanian Tanaman Pangan dan Hortikultura:', 'sifat' => 'B'],
            ['parent_id' => $kukm_2, 'kode' => 'KUKM.02.01', 'nama' => 'Kehutanan dan Perkebunan:', 'sifat' => 'B'],
            ['parent_id' => $kukm_2, 'kode' => 'KUKM.02.02', 'nama' => 'Perikanan dan Peternakan:', 'sifat' => 'B'],
            ['parent_id' => $kukm_2, 'kode' => 'KUKM.02.03', 'nama' => 'Industri, Kerajinan dan Pertambangan:', 'sifat' => 'B'],
            ['parent_id' => $kukm_2, 'kode' => 'KUKM.02.04', 'nama' => 'Ketenagalistrikan dan Aneka Usaha:', 'sifat' => 'B'],

            // Bawah KUKM.03
            ['parent_id' => $kukm_3, 'kode' => 'KUKM.03.00', 'nama' => 'Program Pendanaan:', 'sifat' => 'B'],
            ['parent_id' => $kukm_3, 'kode' => 'KUKM.03.01', 'nama' => 'Pengembangan dan Pengendalian Simpan Pinjam:', 'sifat' => 'B'],
            ['parent_id' => $kukm_3, 'kode' => 'KUKM.03.02', 'nama' => 'Urusan Permodalan:', 'sifat' => 'B'],
            ['parent_id' => $kukm_3, 'kode' => 'KUKM.03.03', 'nama' => 'Asuransi dan Jasa Keuangan:', 'sifat' => 'B'],
            ['parent_id' => $kukm_3, 'kode' => 'KUKM.03.04', 'nama' => 'Pembiayaan dan Penjaminan Kredit:', 'sifat' => 'B'],
            ['parent_id' => $kukm_3, 'kode' => 'KUKM.03.05', 'nama' => 'Lembaga Pengelola dan Bergulir KUKM (LPBD).', 'sifat' => 'B'],

            // Bawah KUKM.04
            ['parent_id' => $kukm_4, 'kode' => 'KUKM.04.00', 'nama' => 'Perdagangan Dalam Negeri:', 'sifat' => 'B'],
            ['parent_id' => $kukm_4, 'kode' => 'KUKM.04.01', 'nama' => 'Ekspor dan Impor:', 'sifat' => 'B'],
            ['parent_id' => $kukm_4, 'kode' => 'KUKM.04.02', 'nama' => 'Sarana Dan Prasarana Pemasaran:', 'sifat' => 'B'],
            ['parent_id' => $kukm_4, 'kode' => 'KUKM.04.03', 'nama' => 'Kemitraan dan Jaringan Usaha:', 'sifat' => 'B'],
            ['parent_id' => $kukm_4, 'kode' => 'KUKM.04.04', 'nama' => 'Informasi dan Publikasi Bisnis:', 'sifat' => 'B'],
            ['parent_id' => $kukm_4, 'kode' => 'KUKM.04.05', 'nama' => 'Lembaga Layanan Pemasaran LIP Koperasi dan UKM.', 'sifat' => 'B'],

            // Bawah KUKM.05
            ['parent_id' => $kukm_5, 'kode' => 'KUKM.05.00', 'nama' => 'Pengembangan Kewirausahaan:', 'sifat' => 'B'],
            ['parent_id' => $kukm_5, 'kode' => 'KUKM.05.01', 'nama' => 'Kebijakan Pendidikan Koperasi dan UKM:', 'sifat' => 'B'],
            ['parent_id' => $kukm_5, 'kode' => 'KUKM.05.02', 'nama' => 'Peran Serata Masyarakat:', 'sifat' => 'B'], // Typo dokumen asli "Serata"
            ['parent_id' => $kukm_5, 'kode' => 'KUKM.05.03', 'nama' => 'Monitoring dan Evaluasi Diklat KUKM.', 'sifat' => 'B'],
            ['parent_id' => $kukm_5, 'kode' => 'KUKM.05.04', 'nama' => 'Advokasi:', 'sifat' => 'B'],

            // Bawah KUKM.06
            ['parent_id' => $kukm_6, 'kode' => 'KUKM.06.01', 'nama' => 'Produktivitas dan Mutu.', 'sifat' => 'B'],
            ['parent_id' => $kukm_6, 'kode' => 'KUKM.06.02', 'nama' => 'Restrukturisasi Usaha:', 'sifat' => 'B'],
            ['parent_id' => $kukm_6, 'kode' => 'KUKM.06.03', 'nama' => 'Pemberdayaan Lembaga Pengembangan Bisnis (LPB).', 'sifat' => 'B'],
            ['parent_id' => $kukm_6, 'kode' => 'KUKM.06.04', 'nama' => 'Fasilitasi Investasi UKMK:', 'sifat' => 'B'],
            ['parent_id' => $kukm_6, 'kode' => 'KUKM.06.05', 'nama' => 'Pengembangan Sistem Bisnis:', 'sifat' => 'B'],

            // Bawah KUKM.07
            ['parent_id' => $kukm_7, 'kode' => 'KUKM.07.00', 'nama' => 'Penelitian Koperasi:', 'sifat' => 'B'],
            ['parent_id' => $kukm_7, 'kode' => 'KUKM.07.01', 'nama' => 'Penelitian UKM:', 'sifat' => 'B'],
            ['parent_id' => $kukm_7, 'kode' => 'KUKM.07.02', 'nama' => 'penelitian sumberdaya:', 'sifat' => 'B'],
            ['parent_id' => $kukm_7, 'kode' => 'KUKM.07.03', 'nama' => 'Pengembangan Perkaderan UKM:', 'sifat' => 'B'],
            ['parent_id' => $kukm_7, 'kode' => 'KUKM.07.04', 'nama' => 'Kerjasama Internasional dan Hubungan Antar Lembaga.', 'sifat' => 'B'],
        ]);

        // ==============================================================================
        // MENGAMBIL ID LEVEL 3 UNTUK MEMASUKAN LEVEL CICIT (LEVEL 4)
        // ==============================================================================
        $kukm_1_0 = DB::table('klasifikasis')->where('kode', 'KUKM.01.00')->value('id');
        $kukm_1_1 = DB::table('klasifikasis')->where('kode', 'KUKM.01.01')->value('id');
        $kukm_1_2 = DB::table('klasifikasis')->where('kode', 'KUKM.01.02')->value('id');
        $kukm_1_3 = DB::table('klasifikasis')->where('kode', 'KUKM.01.03')->value('id');
        $kukm_1_4 = DB::table('klasifikasis')->where('kode', 'KUKM.01.04')->value('id');

        $kukm_2_0 = DB::table('klasifikasis')->where('kode', 'KUKM.02.00')->value('id');
        $kukm_2_1 = DB::table('klasifikasis')->where('kode', 'KUKM.02.01')->value('id');
        $kukm_2_2 = DB::table('klasifikasis')->where('kode', 'KUKM.02.02')->value('id');
        $kukm_2_3 = DB::table('klasifikasis')->where('kode', 'KUKM.02.03')->value('id');
        $kukm_2_4 = DB::table('klasifikasis')->where('kode', 'KUKM.02.04')->value('id');

        $kukm_3_0 = DB::table('klasifikasis')->where('kode', 'KUKM.03.00')->value('id');
        $kukm_3_1 = DB::table('klasifikasis')->where('kode', 'KUKM.03.01')->value('id');
        $kukm_3_2 = DB::table('klasifikasis')->where('kode', 'KUKM.03.02')->value('id');
        $kukm_3_3 = DB::table('klasifikasis')->where('kode', 'KUKM.03.03')->value('id');
        $kukm_3_4 = DB::table('klasifikasis')->where('kode', 'KUKM.03.04')->value('id');

        $kukm_4_0 = DB::table('klasifikasis')->where('kode', 'KUKM.04.00')->value('id');
        $kukm_4_1 = DB::table('klasifikasis')->where('kode', 'KUKM.04.01')->value('id');
        $kukm_4_2 = DB::table('klasifikasis')->where('kode', 'KUKM.04.02')->value('id');
        $kukm_4_3 = DB::table('klasifikasis')->where('kode', 'KUKM.04.03')->value('id');
        $kukm_4_4 = DB::table('klasifikasis')->where('kode', 'KUKM.04.04')->value('id');

        $kukm_5_0 = DB::table('klasifikasis')->where('kode', 'KUKM.05.00')->value('id');
        $kukm_5_1 = DB::table('klasifikasis')->where('kode', 'KUKM.05.01')->value('id');
        $kukm_5_2 = DB::table('klasifikasis')->where('kode', 'KUKM.05.02')->value('id');
        $kukm_5_3 = DB::table('klasifikasis')->where('kode', 'KUKM.05.03')->value('id');
        $kukm_5_4 = DB::table('klasifikasis')->where('kode', 'KUKM.05.04')->value('id');

        $kukm_6_1 = DB::table('klasifikasis')->where('kode', 'KUKM.06.01')->value('id');
        $kukm_6_2 = DB::table('klasifikasis')->where('kode', 'KUKM.06.02')->value('id');
        $kukm_6_3 = DB::table('klasifikasis')->where('kode', 'KUKM.06.03')->value('id');
        $kukm_6_4 = DB::table('klasifikasis')->where('kode', 'KUKM.06.04')->value('id');
        $kukm_6_5 = DB::table('klasifikasis')->where('kode', 'KUKM.06.05')->value('id');

        $kukm_7_0 = DB::table('klasifikasis')->where('kode', 'KUKM.07.00')->value('id');
        $kukm_7_1 = DB::table('klasifikasis')->where('kode', 'KUKM.07.01')->value('id');
        $kukm_7_2 = DB::table('klasifikasis')->where('kode', 'KUKM.07.02')->value('id');
        $kukm_7_3 = DB::table('klasifikasis')->where('kode', 'KUKM.07.03')->value('id');

        // --- LEVEL CICIT (Level 4) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah KUKM.01.00
            ['parent_id' => $kukm_1_0, 'kode' => 'KUKM.01.00.00', 'nama' => 'Organisasi Koperasi dan UKM.', 'sifat' => 'B'],
            ['parent_id' => $kukm_1_0, 'kode' => 'KUKM.01.00.01', 'nama' => 'Badan Hukum Koperasi (Penata Usahaan Badan Hukum Koperasi, Evaluasi Badan Hukum Koperasi).', 'sifat' => 'B'],
            ['parent_id' => $kukm_1_0, 'kode' => 'KUKM.01.00.02', 'nama' => 'Penelaahan Kasus Hukum (Kasus Hukum Koperasi, Kasus Hukum UKM).', 'sifat' => 'B'],
            
            // Bawah KUKM.01.01
            ['parent_id' => $kukm_1_1, 'kode' => 'KUKM.01.01.00', 'nama' => 'Penyusunan Dan Evaluasi Peraturan Perundang-Undangan Koperasi.', 'sifat' => 'B'],
            ['parent_id' => $kukm_1_1, 'kode' => 'KUKM.01.01.01', 'nama' => 'Penyusunan Dan Evaluasi Peraturan Perundang-Undangan UKM.', 'sifat' => 'B'],
            ['parent_id' => $kukm_1_1, 'kode' => 'KUKM.01.01.02', 'nama' => 'Dokumentasi Peraturan Perundang-Undangan (Produk Peraturan Perundang-Undangan Pusat, Peraturan Daerah).', 'sifat' => 'B'],

            // Bawah KUKM.01.02
            ['parent_id' => $kukm_1_2, 'kode' => 'KUKM.01.02.00', 'nama' => 'Tata Laksana Koperasi (Tata Laksana Koperasi Primer, Tata Laksana Koperasi Sekunder).', 'sifat' => 'B'],
            ['parent_id' => $kukm_1_2, 'kode' => 'KUKM.01.02.01', 'nama' => 'Tata Laksana UKM (Tata Laksana Usaha Kecil, Tata Laksana Usaha Menegah).', 'sifat' => 'B'],
            ['parent_id' => $kukm_1_2, 'kode' => 'KUKM.01.02.02', 'nama' => 'Klasifikasi Koperasi dan UKM.', 'sifat' => 'B'],

            // Bawah KUKM.01.03
            ['parent_id' => $kukm_1_3, 'kode' => 'KUKM.01.03.00', 'nama' => 'Partisipasi Usaha dan Permodalan.', 'sifat' => 'B'],
            ['parent_id' => $kukm_1_3, 'kode' => 'KUKM.01.03.01', 'nama' => 'Partisipasi Pengawasan (Rapat Anggota, Pengawasan).', 'sifat' => 'B'],
            ['parent_id' => $kukm_1_3, 'kode' => 'KUKM.01.03.02', 'nama' => 'Pengembangan Anggota Kaderisasi, Penyuluhan.', 'sifat' => 'B'],

            // Bawah KUKM.01.04
            ['parent_id' => $kukm_1_4, 'kode' => 'KUKM.01.04.00', 'nama' => 'Pengendalian (Pengendalian Intern, Tindak Lanjut Hasil Pengendalian).', 'sifat' => 'B'],
            ['parent_id' => $kukm_1_4, 'kode' => 'KUKM.01.04.01', 'nama' => 'Akuntabilitas dan Akuntansi (Akuntabilitas, Akuntansi dan Audit).', 'sifat' => 'B'],
            ['parent_id' => $kukm_1_4, 'kode' => 'KUKM.01.04.02', 'nama' => 'Monitoring dan Evaluasi, Koperasi dan UKM: - Monitoring. - Evaluasi.', 'sifat' => 'B'],

            // Bawah KUKM.02.00
            ['parent_id' => $kukm_2_0, 'kode' => 'KUKM.02.00.00', 'nama' => 'Tanaman Pangan Padi, Palawija.', 'sifat' => 'B'],
            ['parent_id' => $kukm_2_0, 'kode' => 'KUKM.02.00.01', 'nama' => 'Hortikultura (Buah-Buahan dan Tanaman Obat, Tanaman Hias dan Sayur).', 'sifat' => 'B'],
            ['parent_id' => $kukm_2_0, 'kode' => 'KUKM.02.00.02', 'nama' => 'Sarana (Sarana Produksi, Sarana Pengolahan).', 'sifat' => 'B'],

            // Bawah KUKM.02.01
            ['parent_id' => $kukm_2_1, 'kode' => 'KUKM.02.01.00', 'nama' => 'Kehutanan (Hutan Produksi, Hutan Kemasyarakatan).', 'sifat' => 'B'],
            ['parent_id' => $kukm_2_1, 'kode' => 'KUKM.02.01.01', 'nama' => 'Perkebunan (Tanaman Semusim dan Rempah-Rempah, Tanaman Keras).', 'sifat' => 'B'],
            ['parent_id' => $kukm_2_1, 'kode' => 'KUKM.02.01.02', 'nama' => 'Sarana (Sarana Produksi, Sarana Pengolahan).', 'sifat' => 'B'],

            // Bawah KUKM.02.02
            ['parent_id' => $kukm_2_2, 'kode' => 'KUKM.02.02.00', 'nama' => 'Perikanan (Perikanan Tangkap, Perikanan Budidaya).', 'sifat' => 'B'],
            ['parent_id' => $kukm_2_2, 'kode' => 'KUKM.02.02.01', 'nama' => 'Peternakan (Ternak Besar, Ternak Kecil).', 'sifat' => 'B'],

            // Bawah KUKM.02.03
            ['parent_id' => $kukm_2_3, 'kode' => 'KUKM.02.03.00', 'nama' => 'Industri (Sandang, Logam dan Elektronik, Pangan, Kimia dan Aneka).', 'sifat' => 'B'],
            ['parent_id' => $kukm_2_3, 'kode' => 'KUKM.02.03.01', 'nama' => 'Kerajinan (Logam, Non Loga).', 'sifat' => 'B'],
            ['parent_id' => $kukm_2_3, 'kode' => 'KUKM.02.03.02', 'nama' => 'Pertambangan Umum dan Migas.', 'sifat' => 'B'],

            // Bawah KUKM.02.04
            ['parent_id' => $kukm_2_4, 'kode' => 'KUKM.02.04.00', 'nama' => 'Ketenagalistrikan dan Aneka Usaha (Listrik , Konstruksi).', 'sifat' => 'B'],
            ['parent_id' => $kukm_2_4, 'kode' => 'KUKM.02.04.01', 'nama' => 'Aneka Usaha (Jasa Umum, Angkutan).', 'sifat' => 'B'],
            ['parent_id' => $kukm_2_4, 'kode' => 'KUKM.02.04.02', 'nama' => 'Pariwisata, Pos dan Telekomunikasi.', 'sifat' => 'B'],

            // Bawah KUKM.03.00
            ['parent_id' => $kukm_3_0, 'kode' => 'KUKM.03.00.00', 'nama' => 'Program Pendanaan Jangka Pendek (Koperasi dan UKM Jangka Pendek).', 'sifat' => 'B'],
            ['parent_id' => $kukm_3_0, 'kode' => 'KUKM.03.00.01', 'nama' => 'Program Pendanaan Jangka Menengah dan Panjang.', 'sifat' => 'B'],
            ['parent_id' => $kukm_3_0, 'kode' => 'KUKM.03.00.02', 'nama' => 'Program Pendanaan Usaha Mikro dan Dana Bergulir.', 'sifat' => 'B'],

            // Bawah KUKM.03.01
            ['parent_id' => $kukm_3_1, 'kode' => 'KUKM.03.01.00', 'nama' => 'Pengembangan dan Pengendalian KSP.', 'sifat' => 'B'],
            ['parent_id' => $kukm_3_1, 'kode' => 'KUKM.03.01.01', 'nama' => 'Pengembangan dan Pengendalian USP Koperasi.', 'sifat' => 'B'],
            ['parent_id' => $kukm_3_1, 'kode' => 'KUKM.03.01.02', 'nama' => 'Pengembangan dan Pengendalian USP LKM.', 'sifat' => 'B'],

            // Bawah KUKM.03.02
            ['parent_id' => $kukm_3_2, 'kode' => 'KUKM.03.02.00', 'nama' => 'Pengembangan Permodalan Sendiri ( Koperasi dan UKM).', 'sifat' => 'B'],
            ['parent_id' => $kukm_3_2, 'kode' => 'KUKM.03.02.01', 'nama' => 'Pengembangan Permodalan Luar (Permodalan Bank, Non Bank)', 'sifat' => 'B'],
            ['parent_id' => $kukm_3_2, 'kode' => 'KUKM.03.02.02', 'nama' => 'Pengembangan Kredit Program (Bank, Non Bank).', 'sifat' => 'B'],

            // Bawah KUKM.03.03
            ['parent_id' => $kukm_3_3, 'kode' => 'KUKM.03.03.00', 'nama' => 'Asuransi (Koperasi, UKM).', 'sifat' => 'B'],
            ['parent_id' => $kukm_3_3, 'kode' => 'KUKM.03.03.01', 'nama' => 'Perpajakan ( Koperasi, UKM).', 'sifat' => 'B'],
            ['parent_id' => $kukm_3_3, 'kode' => 'KUKM.03.03.02', 'nama' => 'Jasa Keuangan dan Kredit Komersial (Bank dan Non Komersial Bank).', 'sifat' => 'B'],

            // Bawah KUKM.03.04
            ['parent_id' => $kukm_3_4, 'kode' => 'KUKM.03.04.00', 'nama' => 'Lembaga Pembiayaan (Modal Ventura, Sewa Guna Usaha dan Anak Piutang).', 'sifat' => 'B'],
            ['parent_id' => $kukm_3_4, 'kode' => 'KUKM.03.04.01', 'nama' => 'Penjaminan Kredit ( Penjaminan, Asuransi Kredit).', 'sifat' => 'B'],
            ['parent_id' => $kukm_3_4, 'kode' => 'KUKM.03.04.02', 'nama' => 'Pasar Modal (Obligasi, Modal Penyertaan).', 'sifat' => 'B'],

            // Bawah KUKM.04.00
            ['parent_id' => $kukm_4_0, 'kode' => 'KUKM.04.00.00', 'nama' => 'Pengadaan Sektor Formal dan Informal.', 'sifat' => 'B'],
            ['parent_id' => $kukm_4_0, 'kode' => 'KUKM.04.00.01', 'nama' => 'Distribusi Sektor Formal dan Informal.', 'sifat' => 'B'],
            ['parent_id' => $kukm_4_0, 'kode' => 'KUKM.04.00.02', 'nama' => 'Pengembangan Sektor Formal dan In Formal.', 'sifat' => 'B'],

            // Bawah KUKM.04.01
            ['parent_id' => $kukm_4_1, 'kode' => 'KUKM.04.01.00', 'nama' => 'Ekspor (Koperasi dan UKM).', 'sifat' => 'B'],
            ['parent_id' => $kukm_4_1, 'kode' => 'KUKM.04.01.01', 'nama' => 'Impor (Koperasi dan UKM).', 'sifat' => 'B'],
            ['parent_id' => $kukm_4_1, 'kode' => 'KUKM.04.01.02', 'nama' => 'Hubungan Perdagangan Internasional (Perdagangan Multilateral, Regional dan Bilateral).', 'sifat' => 'B'],

            // Bawah KUKM.04.02
            ['parent_id' => $kukm_4_2, 'kode' => 'KUKM.04.02.00', 'nama' => 'Sarana (Pengembangan Pasar Tradisional dan Sentra Pemasaran).', 'sifat' => 'B'],
            ['parent_id' => $kukm_4_2, 'kode' => 'KUKM.04.02.01', 'nama' => 'Prasarana (Lembaga Perantara dan Fasilitasi HAKI).', 'sifat' => 'B'],
            ['parent_id' => $kukm_4_2, 'kode' => 'KUKM.04.02.02', 'nama' => 'Pengembangan Potensi Pemasaran ( Koperasi dan UKM).', 'sifat' => 'B'],

            // Bawah KUKM.04.03
            ['parent_id' => $kukm_4_3, 'kode' => 'KUKM.04.03.00', 'nama' => 'Kemitraan (Koperasi dan UKM).', 'sifat' => 'B'],
            ['parent_id' => $kukm_4_3, 'kode' => 'KUKM.04.03.01', 'nama' => 'Jaringan Usaha (Usaha Koperasi dan UKM).', 'sifat' => 'B'],
            ['parent_id' => $kukm_4_3, 'kode' => 'KUKM.04.03.02', 'nama' => 'Pengembangan Kerjasama Kelembagaan Koperasi Dan UKM).', 'sifat' => 'B'],

            // Bawah KUKM.04.04
            ['parent_id' => $kukm_4_4, 'kode' => 'KUKM.04.04.00', 'nama' => 'Pengumpulan Informasi Koperasi dan UKM.', 'sifat' => 'B'],
            ['parent_id' => $kukm_4_4, 'kode' => 'KUKM.04.04.01', 'nama' => 'Pengolahan Informasi Koperasi dan UKM.', 'sifat' => 'B'],
            ['parent_id' => $kukm_4_4, 'kode' => 'KUKM.04.04.02', 'nama' => 'Publikasi dan Informasi (Koperasi dan UKM).', 'sifat' => 'B'],

            // Bawah KUKM.05.00
            ['parent_id' => $kukm_5_0, 'kode' => 'KUKM.05.00.00', 'nama' => 'Lembaga Kewirausahaan (Pengembangan Jaringan Kewirausahaan dan Peningkatan Sumber Daya Kewirausahaan).', 'sifat' => 'B'],
            ['parent_id' => $kukm_5_0, 'kode' => 'KUKM.05.00.01', 'nama' => 'Penumbuhan Kewirausahaan (Peningkatan Kemampuan Kewirausahaan Dan Evaluasi Kewirausahaan).', 'sifat' => 'B'],
            ['parent_id' => $kukm_5_0, 'kode' => 'KUKM.05.00.02', 'nama' => 'Sosialisasi Kewirausahaan (Perangkat Lunak dan Promosi Kewirausahaan).', 'sifat' => 'B'],

            // Bawah KUKM.05.01
            ['parent_id' => $kukm_5_1, 'kode' => 'KUKM.05.01.00', 'nama' => 'Diklat Formal dan In Formal.', 'sifat' => 'B'],
            ['parent_id' => $kukm_5_1, 'kode' => 'KUKM.05.01.01', 'nama' => 'Diklat Non Formal (Perangkat Lunak , Sarana dan Prasarana).', 'sifat' => 'B'],
            ['parent_id' => $kukm_5_1, 'kode' => 'KUKM.05.01.02', 'nama' => 'Kerjasama Lembaga Diklat (Hubungan Lembada Diklat Pemerintah dan Non Pemerintah).', 'sifat' => 'B'],

            // Bawah KUKM.05.02
            ['parent_id' => $kukm_5_2, 'kode' => 'KUKM.05.02.00', 'nama' => 'Peningkatan Dukungan Media Massa Terhadap Koperasi dan UKM.', 'sifat' => 'B'],
            ['parent_id' => $kukm_5_2, 'kode' => 'KUKM.05.02.01', 'nama' => 'Peningkatan Dukungan LSM Terhadap KUKM.', 'sifat' => 'B'],
            ['parent_id' => $kukm_5_2, 'kode' => 'KUKM.05.02.02', 'nama' => 'Peningkatan Dukungan Organisasi Profesi Koperasi dan UKM.', 'sifat' => 'B'],

            // Bawah KUKM.05.03
            ['parent_id' => $kukm_5_3, 'kode' => 'KUKM.05.03.00', 'nama' => 'Monitoring dan Evaluasi Diklat KUKM.', 'sifat' => 'B'],
            ['parent_id' => $kukm_5_3, 'kode' => 'KUKM.05.03.01', 'nama' => 'Monitoring dan Evaluasi Diklat Formal Dan Informal.', 'sifat' => 'B'],
            ['parent_id' => $kukm_5_3, 'kode' => 'KUKM.05.03.02', 'nama' => 'Monitoring dan Evaluasi Lembaga Diklat (Pemerintah dan Non Pemerintah).', 'sifat' => 'B'],

            // Bawah KUKM.05.04
            ['parent_id' => $kukm_5_4, 'kode' => 'KUKM.05.04.00', 'nama' => 'Advokasi Organisasi dan Manajemen.', 'sifat' => 'B'],
            ['parent_id' => $kukm_5_4, 'kode' => 'KUKM.05.04.01', 'nama' => 'Advokasi Kemitraan dan Teknologi.', 'sifat' => 'B'],
            ['parent_id' => $kukm_5_4, 'kode' => 'KUKM.05.04.02', 'nama' => 'Advokasi Peraturan Perundang-Undangan (Kajian Penerangan dan Sosialisasi Perundanga-Undangan).', 'sifat' => 'B'],

            // Bawah KUKM.06.01
            ['parent_id' => $kukm_6_1, 'kode' => 'KUKM.06.01.00', 'nama' => 'Produktivitas (Inkubator Teknologi dan Pengembangan Klaster)', 'sifat' => 'B'],
            ['parent_id' => $kukm_6_1, 'kode' => 'KUKM.06.01.01', 'nama' => 'Peningkatan Mutu (Disain dan Standarisasi).', 'sifat' => 'B'],
            ['parent_id' => $kukm_6_1, 'kode' => 'KUKM.06.01.02', 'nama' => 'Sertifikasi Produk (Sertifikasi , Label dan Merek).', 'sifat' => 'B'],

            // Bawah KUKM.06.02
            ['parent_id' => $kukm_6_2, 'kode' => 'KUKM.06.02.00', 'nama' => 'Restrukturisasi Manajemen (Koperasi dan UKM).', 'sifat' => 'B'],
            ['parent_id' => $kukm_6_2, 'kode' => 'KUKM.06.02.01', 'nama' => 'Restrukturisasi Pendanaan ( Koperasi dan UKM).', 'sifat' => 'B'],
            ['parent_id' => $kukm_6_2, 'kode' => 'KUKM.06.02.02', 'nama' => 'Restrukturisasi Kelembagaan ( Koperasi dan UKM).', 'sifat' => 'B'],

            // Bawah KUKM.06.03
            ['parent_id' => $kukm_6_3, 'kode' => 'KUKM.06.03.00', 'nama' => 'Kelembagaan Lembaga Pengembangan Bisnis (LPB) (Asosiasi dan Manajemen LPB, Akreditasi LPB).', 'sifat' => 'B'],
            ['parent_id' => $kukm_6_3, 'kode' => 'KUKM.06.03.01', 'nama' => 'Pengembangan Bisnis LPB ( Peningkatan Kerjasama LPB dan Kerja Sama Layanan LPB).', 'sifat' => 'B'],
            ['parent_id' => $kukm_6_3, 'kode' => 'KUKM.06.03.02', 'nama' => 'Pengembangan Jaringan LPB (Kerja Sama Kelembagaan dan Teknologi).', 'sifat' => 'B'],

            // Bawah KUKM.06.04
            ['parent_id' => $kukm_6_4, 'kode' => 'KUKM.06.04.00', 'nama' => 'Investasi Klaster UKMK (Fasilitasi Investasi Ukmk Argo Bisnis dan UKMK Non Agro Bisnis).', 'sifat' => 'B'],
            ['parent_id' => $kukm_6_4, 'kode' => 'KUKM.06.04.01', 'nama' => 'Pengembangan Kerjasama Investasi Usaha (Pangan Dan Non Pangan).', 'sifat' => 'B'],
            ['parent_id' => $kukm_6_4, 'kode' => 'KUKM.06.04.02', 'nama' => 'Fasilitas Investasi Aneka Usaha UKMK.', 'sifat' => 'B'],

            // Bawah KUKM.06.05
            ['parent_id' => $kukm_6_5, 'kode' => 'KUKM.06.05.00', 'nama' => 'Fasilitasi transaksi (Dalam dan Luar Negeri).', 'sifat' => 'B'],
            ['parent_id' => $kukm_6_5, 'kode' => 'KUKM.06.05.01', 'nama' => 'Kerjasama usaha (Pertukaran Koperasi dan UKM).', 'sifat' => 'B'],
            ['parent_id' => $kukm_6_5, 'kode' => 'KUKM.06.05.02', 'nama' => 'Jaringan komunikasi bisnis (Pengembangan Sarana Komunikasi Bisnis).', 'sifat' => 'B'],

            // Bawah KUKM.07.00
            ['parent_id' => $kukm_7_0, 'kode' => 'KUKM.07.00.00', 'nama' => 'perencanaan dan pengendalian (Perencanaan, Evaluasi dan Pelaporan).', 'sifat' => 'B'],
            ['parent_id' => $kukm_7_0, 'kode' => 'KUKM.07.00.01', 'nama' => 'Penyelenggaraan Kelembagaan (Koperasi dan Bisnis Koperasi).', 'sifat' => 'B'],
            ['parent_id' => $kukm_7_0, 'kode' => 'KUKM.07.00.02', 'nama' => 'Tatalaksana Penelitian (Temu Ilmiah dan Pengembangan Metodologi, Sarana dan Prasarana).', 'sifat' => 'B'],

            // Bawah KUKM.07.01
            ['parent_id' => $kukm_7_1, 'kode' => 'KUKM.07.01.00', 'nama' => 'Perencanaan dan pengendalian (perencanaan , evaluasi dan pelaporan).', 'sifat' => 'B'],
            ['parent_id' => $kukm_7_1, 'kode' => 'KUKM.07.01.01', 'nama' => 'Penyelenggaraan kelembagaan (koperasi dan bisnis koperasi).', 'sifat' => 'B'],
            ['parent_id' => $kukm_7_1, 'kode' => 'KUKM.07.01.02', 'nama' => 'Tatalaksana penelitian (temu ilmiah dan pengembangan metodologi, sarana dan prasarana).', 'sifat' => 'B'],

            // Bawah KUKM.07.02
            ['parent_id' => $kukm_7_2, 'kode' => 'KUKM.07.02.00', 'nama' => 'Perencanaan dan pengendalian (perencanaan , evaluasi dan pelaporan).', 'sifat' => 'B'],
            ['parent_id' => $kukm_7_2, 'kode' => 'KUKM.07.02.01', 'nama' => 'Penyelenggaraan kelembagaan (sumber daya manusia dan pembiayaan).', 'sifat' => 'B'],
            ['parent_id' => $kukm_7_2, 'kode' => 'KUKM.07.02.02', 'nama' => 'Tatalaksana penelitian (temu ilmiah dan pengembangan metodologi, sarana dan prasarana).', 'sifat' => 'B'],

            // Bawah KUKM.07.03
            ['parent_id' => $kukm_7_3, 'kode' => 'KUKM.07.03.00', 'nama' => 'Penyuluhan (penyelenggara dan materi penyuluhan).', 'sifat' => 'B'],
            ['parent_id' => $kukm_7_3, 'kode' => 'KUKM.07.03.01', 'nama' => 'Perkaderan (penilaian dan pengembangan).', 'sifat' => 'B'],
            ['parent_id' => $kukm_7_3, 'kode' => 'KUKM.07.03.02', 'nama' => 'Kerjasama jaringan lembaga pemerintahan dan non pemerintahan.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // LANJUTAN URUSAN SUBTANTIF: PM (Penanaman Modal) - Bagian 2
        // ==============================================================================

        // --- TAMBAHAN LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_pm, 'kode' => 'PM.03', 'nama' => 'Promosi Penanaman Modal:', 'sifat' => 'B'],
            ['parent_id' => $id_pm, 'kode' => 'PM.04', 'nama' => 'Kerja Sama Penanaman Modal:', 'sifat' => 'B'],
            ['parent_id' => $id_pm, 'kode' => 'PM.05', 'nama' => 'Pelayanan Penanaman Modal:', 'sifat' => 'B'],
            ['parent_id' => $id_pm, 'kode' => 'PM.06', 'nama' => 'Pengendalian Pelaksanaan Penanaman Modal:', 'sifat' => 'B'],
        ]);

        $pm_2 = DB::table('klasifikasis')->where('kode', 'PM.02')->value('id'); // Ambil PM.02 dari seeder sebelumnya
        $pm_3 = DB::table('klasifikasis')->where('kode', 'PM.03')->value('id');
        $pm_4 = DB::table('klasifikasis')->where('kode', 'PM.04')->value('id');
        $pm_5 = DB::table('klasifikasis')->where('kode', 'PM.05')->value('id');
        $pm_6 = DB::table('klasifikasis')->where('kode', 'PM.06')->value('id');

        // --- TAMBAHAN LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah PM.02 (Lanjutan)
            ['parent_id' => $pm_2, 'kode' => 'PM.02.02', 'nama' => 'Pengembangan Peluang Potensi Daerah:', 'sifat' => 'B'],
            ['parent_id' => $pm_2, 'kode' => 'PM.02.03', 'nama' => 'Pemberdayaan Usaha:', 'sifat' => 'B'],

            // Bawah PM.03
            ['parent_id' => $pm_3, 'kode' => 'PM.03.01', 'nama' => 'Pengembangan Promosi:', 'sifat' => 'B'],
            ['parent_id' => $pm_3, 'kode' => 'PM.03.02', 'nama' => 'Promosi Sektoral:', 'sifat' => 'B'],
            ['parent_id' => $pm_3, 'kode' => 'PM.03.03', 'nama' => 'Fasilitasi Promosi Wilayah Jawa Barat, DKI dan Banten:', 'sifat' => 'B'],
            ['parent_id' => $pm_3, 'kode' => 'PM.03.04', 'nama' => 'Pameran Dan Sarana Promosi:', 'sifat' => 'B'],

            // Bawah PM.04
            ['parent_id' => $pm_4, 'kode' => 'PM.04.01', 'nama' => 'Kerjasama Bilateral dan Multilateral:', 'sifat' => 'B'],
            ['parent_id' => $pm_4, 'kode' => 'PM.04.02', 'nama' => 'Kerja Sama Regional Asean:', 'sifat' => 'B'],
            ['parent_id' => $pm_4, 'kode' => 'PM.04.03', 'nama' => 'Kerja Sama Dunia Usaha Internasional:', 'sifat' => 'B'],

            // Bawah PM.05
            ['parent_id' => $pm_5, 'kode' => 'PM.05.01', 'nama' => 'Pelayanan Aplikasi:', 'sifat' => 'B'],
            ['parent_id' => $pm_5, 'kode' => 'PM.05.02', 'nama' => 'Pelayanan Perizinan:', 'sifat' => 'B'],
            ['parent_id' => $pm_5, 'kode' => 'PM.05.03', 'nama' => 'Pelayanan Fasilitas:', 'sifat' => 'B'],

            // Bawah PM.06 (Unik: PM.06 langsung berisi daftar isi, seolah Level 3)
            ['parent_id' => $pm_6, 'kode' => 'PM.06.01', 'nama' => 'BAP Pemantauan Penanaman Modal.', 'sifat' => 'B'],
            ['parent_id' => $pm_6, 'kode' => 'PM.06.02', 'nama' => 'Laporan Triwulan/Semester Pemantauan Penanaman Modal.', 'sifat' => 'B'],
            ['parent_id' => $pm_6, 'kode' => 'PM.06.03', 'nama' => 'Helpdesk Pemantauan Penanaman Modal.', 'sifat' => 'B'],
            ['parent_id' => $pm_6, 'kode' => 'PM.06.04', 'nama' => 'Bimbingan Sosialisasi Ketentuan Penanaman Modal dan PTSP.', 'sifat' => 'B'],
            ['parent_id' => $pm_6, 'kode' => 'PM.06.05', 'nama' => 'Saksi Fasilitasi Penyelesaian PMPTSP.', 'sifat' => 'B'],
            ['parent_id' => $pm_6, 'kode' => 'PM.06.06', 'nama' => 'Pembelaan Fasilitasi Penyelesaian PMPTSP.', 'sifat' => 'B'],
            ['parent_id' => $pm_6, 'kode' => 'PM.06.07', 'nama' => 'Pemberi Keterangan FSP.', 'sifat' => 'B'],
            ['parent_id' => $pm_6, 'kode' => 'PM.06.08', 'nama' => 'Analisis PMPTSP.', 'sifat' => 'B'],
            ['parent_id' => $pm_6, 'kode' => 'PM.06.09', 'nama' => 'Pengawasan Penanaman Modal 5 Tahun Musnah.', 'sifat' => 'B'],
            ['parent_id' => $pm_6, 'kode' => 'PM.06.10', 'nama' => 'Pencabutan/Pembatalan Perizinan Penanaman Modal.', 'sifat' => 'B'],
            ['parent_id' => $pm_6, 'kode' => 'PM.06.11', 'nama' => 'Naskah dan Dokumen Izin.', 'sifat' => 'B'],
            ['parent_id' => $pm_6, 'kode' => 'PM.06.12', 'nama' => 'Naskah dan Dokumen Izin Kadaluarsa.', 'sifat' => 'B'],
            ['parent_id' => $pm_6, 'kode' => 'PM.06.13', 'nama' => 'Izin Investasi Strategis Penanaman Modal.', 'sifat' => 'B'],
            ['parent_id' => $pm_6, 'kode' => 'PM.06.14', 'nama' => 'Perizinan Lainnya Sesuai Jenisnya.', 'sifat' => 'B'],
            ['parent_id' => $pm_6, 'kode' => 'PM.06.15', 'nama' => 'Pencabutan/Pembalatalan/Perbaikan Perizinan Penanaman Modal.', 'sifat' => 'B'], // Typo sesuai asli
            ['parent_id' => $pm_6, 'kode' => 'PM.06.16', 'nama' => 'Administrasi PMPTSP.', 'sifat' => 'B'],
            ['parent_id' => $pm_6, 'kode' => 'PM.06.17', 'nama' => 'Kualifikasi Pelayanan Terpadu Satu Pintu (PTSP) di Bidang Penanaman Modal.', 'sifat' => 'B'],
            ['parent_id' => $pm_6, 'kode' => 'PM.06.18', 'nama' => 'Workshop/Bintek/Diklat PMPTSP.', 'sifat' => 'B'],
        ]);

        // Mengambil ID untuk memasukkan Level Cicit (Level 4)
        $pm_2_2 = DB::table('klasifikasis')->where('kode', 'PM.02.02')->value('id');
        $pm_2_3 = DB::table('klasifikasis')->where('kode', 'PM.02.03')->value('id');

        $pm_3_1 = DB::table('klasifikasis')->where('kode', 'PM.03.01')->value('id');
        $pm_3_2 = DB::table('klasifikasis')->where('kode', 'PM.03.02')->value('id');
        $pm_3_4 = DB::table('klasifikasis')->where('kode', 'PM.03.04')->value('id');

        $pm_4_1 = DB::table('klasifikasis')->where('kode', 'PM.04.01')->value('id');
        $pm_4_2 = DB::table('klasifikasis')->where('kode', 'PM.04.02')->value('id');
        $pm_4_3 = DB::table('klasifikasis')->where('kode', 'PM.04.03')->value('id');

        $pm_5_1 = DB::table('klasifikasis')->where('kode', 'PM.05.01')->value('id');
        $pm_5_2 = DB::table('klasifikasis')->where('kode', 'PM.05.02')->value('id');
        $pm_5_3 = DB::table('klasifikasis')->where('kode', 'PM.05.03')->value('id');

        // --- TAMBAHAN LEVEL CICIT (Level 4) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah PM.02.02
            ['parent_id' => $pm_2_2, 'kode' => 'PM.02.02.01', 'nama' => 'Sektor primer.', 'sifat' => 'B'],
            ['parent_id' => $pm_2_2, 'kode' => 'PM.02.02.02', 'nama' => 'Sektor tersier.', 'sifat' => 'B'],
            ['parent_id' => $pm_2_2, 'kode' => 'PM.02.02.03', 'nama' => 'Sektor sekunder industri logam, mesin, transportasi dan telematika.', 'sifat' => 'B'],
            ['parent_id' => $pm_2_2, 'kode' => 'PM.02.02.04', 'nama' => 'Sektor sekunder agro, kimia, tekstil dan aneka.', 'sifat' => 'B'],

            // Bawah PM.02.03
            ['parent_id' => $pm_2_3, 'kode' => 'PM.02.03.01', 'nama' => 'Pembinaan.', 'sifat' => 'B'],
            ['parent_id' => $pm_2_3, 'kode' => 'PM.02.03.02', 'nama' => 'Penyuluhan.', 'sifat' => 'B'],
            ['parent_id' => $pm_2_3, 'kode' => 'PM.02.03.03', 'nama' => 'Sektor primer dan tersier.', 'sifat' => 'B'],
            ['parent_id' => $pm_2_3, 'kode' => 'PM.02.03.04', 'nama' => 'Sektor sekunder.', 'sifat' => 'B'],
            ['parent_id' => $pm_2_3, 'kode' => 'PM.02.03.05', 'nama' => 'Pelayanan usaha sektor primer dan tersier.', 'sifat' => 'B'],
            ['parent_id' => $pm_2_3, 'kode' => 'PM.02.03.06', 'nama' => 'Pelayanan usaha sektor sekunder.', 'sifat' => 'B'],
            ['parent_id' => $pm_2_3, 'kode' => 'PM.02.03.07', 'nama' => 'W orkshop dan sosialisasi.', 'sifat' => 'B'], // Typo spasi asli

            // Bawah PM.03.01
            ['parent_id' => $pm_3_1, 'kode' => 'PM.03.01.01', 'nama' => 'Analisis Target Strategi Promosi.', 'sifat' => 'B'],
            ['parent_id' => $pm_3_1, 'kode' => 'PM.03.01.02', 'nama' => 'Analisis Strategi Daya Saing Promosi.', 'sifat' => 'B'],
            ['parent_id' => $pm_3_1, 'kode' => 'PM.03.01.03', 'nama' => 'O.', 'sifat' => 'B'], // Sesuai asli dokumen
            ['parent_id' => $pm_3_1, 'kode' => 'PM.03.01.03', 'nama' => 'Fasilitaslayah Promosi Wilayah Pasifik dan Afrika.', 'sifat' => 'B'], // Typo dan kode kembar 03
            ['parent_id' => $pm_3_1, 'kode' => 'PM.03.01.04', 'nama' => 'Fasilitasi Fromosi Wilayah Jawa Barat.', 'sifat' => 'B'], // Typo Fromosi

            // Bawah PM.03.02
            ['parent_id' => $pm_3_2, 'kode' => 'PM.03.02.01', 'nama' => 'Promosi Industri Sumber Daya Alam.', 'sifat' => 'B'],
            ['parent_id' => $pm_3_2, 'kode' => 'PM.03.02.02', 'nama' => 'E.', 'sifat' => 'B'], // Sesuai asli dokumen
            ['parent_id' => $pm_3_2, 'kode' => 'PM.03.02.02', 'nama' => 'Industri Logam, Barang Logam, Mesin dan Elektronik.', 'sifat' => 'B'], // Kode kembar 02
            ['parent_id' => $pm_3_2, 'kode' => 'PM.03.02.03', 'nama' => 'Industri Manufaktur Lainnya.', 'sifat' => 'B'],
            ['parent_id' => $pm_3_2, 'kode' => 'PM.03.02.04', 'nama' => 'Promosi Infrastruktur Transportasi, Jalan, dan Jembatan.', 'sifat' => 'B'],
            ['parent_id' => $pm_3_2, 'kode' => 'PM.03.02.05', 'nama' => 'Promosi Infrastruktur Energi, Sumber Daya Air, dan Infrastruktur Lainnya.', 'sifat' => 'B'],

            // Bawah PM.03.04
            ['parent_id' => $pm_3_4, 'kode' => 'PM.03.04.01', 'nama' => 'Pameran dalam Penyusunan Program dan Monitoring..', 'sifat' => 'B'],
            ['parent_id' => $pm_3_4, 'kode' => 'PM.03.04.02', 'nama' => 'Pameran dalam Penyelenggaraan dan Evaluasi', 'sifat' => 'B'],
            ['parent_id' => $pm_3_4, 'kode' => 'PM.03.04.03', 'nama' => 'Media Cetak.', 'sifat' => 'B'],
            ['parent_id' => $pm_3_4, 'kode' => 'PM.03.04.04', 'nama' => 'Materi Promosi Media Cetak.', 'sifat' => 'B'],
            ['parent_id' => $pm_3_4, 'kode' => 'PM.03.04.05', 'nama' => 'Publikasi dan Distribusi Media Cetak.', 'sifat' => 'B'],
            ['parent_id' => $pm_3_4, 'kode' => 'PM.03.04.06', 'nama' => 'Pameran Luar Negeri Publikasi dan Distribusi.', 'sifat' => 'B'],
            ['parent_id' => $pm_3_4, 'kode' => 'PM.03.04.07', 'nama' => 'Materi Promosi Media Elektronik.', 'sifat' => 'B'],
            ['parent_id' => $pm_3_4, 'kode' => 'PM.03.04.08', 'nama' => 'Pelayanan Informasi Media Elektronik.', 'sifat' => 'B'],

            // Bawah PM.04.01
            ['parent_id' => $pm_4_1, 'kode' => 'PM.04.01.01', 'nama' => 'Kerja Wilayah Amerika.', 'sifat' => 'B'],
            ['parent_id' => $pm_4_1, 'kode' => 'PM.04.01.02', 'nama' => 'Kerjasama Wilayah Eropa.', 'sifat' => 'B'],
            ['parent_id' => $pm_4_1, 'kode' => 'PM.04.01.03', 'nama' => 'Kerjasama Wilayah Asia.', 'sifat' => 'B'],
            ['parent_id' => $pm_4_1, 'kode' => 'PM.04.01.04', 'nama' => 'Kerjasama Wilayah Pasifik dan Afrika.', 'sifat' => 'B'],
            ['parent_id' => $pm_4_1, 'kode' => 'PM.04.01.05', 'nama' => 'Kerjasama Organisasi PBB.', 'sifat' => 'B'],
            ['parent_id' => $pm_4_1, 'kode' => 'PM.04.01.06', 'nama' => 'Kerjasama Organisasi Non PBB.', 'sifat' => 'B'],

            // Bawah PM.04.02
            ['parent_id' => $pm_4_2, 'kode' => 'PM.04.02.01', 'nama' => 'Kerjasama Asean.', 'sifat' => 'B'],
            ['parent_id' => $pm_4_2, 'kode' => 'PM.04.02.02', 'nama' => 'Kerjasama Sub Regional Asean.', 'sifat' => 'B'],
            ['parent_id' => $pm_4_2, 'kode' => 'PM.04.02.03', 'nama' => 'Kerjasama Sub Regional Asean Wilayah Barat Indonesia.', 'sifat' => 'B'],
            ['parent_id' => $pm_4_2, 'kode' => 'PM.04.02.04', 'nama' => 'Kerjasama Sub Regional Asean Wilayah Timur Indonesia.', 'sifat' => 'B'],
            ['parent_id' => $pm_4_2, 'kode' => 'PM.04.02.05', 'nama' => 'Kerjasama Apec.', 'sifat' => 'B'],
            ['parent_id' => $pm_4_2, 'kode' => 'PM.04.02.06', 'nama' => 'Kerjasama Asean dan Kawasan Lainnya.', 'sifat' => 'B'],
            ['parent_id' => $pm_4_2, 'kode' => 'PM.04.02.07', 'nama' => 'Kerjasama Asean dan Kawasan Lainnya.', 'sifat' => 'B'], // Ada duplikat penulisan di dokumen asli

            // Bawah PM.04.03
            ['parent_id' => $pm_4_3, 'kode' => 'PM.04.03.01', 'nama' => 'Asosiasi Bisnis.', 'sifat' => 'B'],
            ['parent_id' => $pm_4_3, 'kode' => 'PM.04.03.02', 'nama' => 'Lembaga Bisnis.', 'sifat' => 'B'],
            ['parent_id' => $pm_4_3, 'kode' => 'PM.04.03.03', 'nama' => 'Lembaga Perbankan.', 'sifat' => 'B'],
            ['parent_id' => $pm_4_3, 'kode' => 'PM.04.03.04', 'nama' => 'Lembaga Non Perbankan.', 'sifat' => 'B'],

            // Bawah PM.05.01
            ['parent_id' => $pm_5_1, 'kode' => 'PM.05.01.01', 'nama' => 'Aplikasi Baru Sektor Primer dan Tersier.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_1, 'kode' => 'PM.05.01.02', 'nama' => 'Aplikasi Perluasan Sektor Primer dan Tersier.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_1, 'kode' => 'PM.05.01.03', 'nama' => 'Aplikasi Perubahan Sektor Primer dan Tersier.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_1, 'kode' => 'PM.05.01.04', 'nama' => 'Aplikasi Baru Sektor Sekunder.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_1, 'kode' => 'PM.05.01.05', 'nama' => 'Aplikasi Perluasan Sektor Sekunder.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_1, 'kode' => 'PM.05.01.06', 'nama' => 'Aplikasi Perubahan Sektor Sekunder.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_1, 'kode' => 'PM.05.01.07', 'nama' => 'Aplikasi Sektor Tersier.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_1, 'kode' => 'PM.05.01.08', 'nama' => 'Pengolahan Data Penanaman Modal.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_1, 'kode' => 'PM.05.01.09', 'nama' => 'Laporan PMPTSP.', 'sifat' => 'B'],

            // Bawah PM.05.02
            ['parent_id' => $pm_5_2, 'kode' => 'PM.05.02.01', 'nama' => 'Perizinan Sektor Primer dan Tersierpertanian, Peternakan, Perkebunan, Pariwisata dan Prasarana.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_2, 'kode' => 'PM.05.02.02', 'nama' => 'Perizinan Sektor Primer dan Tersier Kehutanan, Perikanan, Perhubungan dan Telekomunikasi.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_2, 'kode' => 'PM.05.02.03', 'nama' => 'Perizinan Sektor Primer dan Tersierpertambangan dan Energi, Pertambangan dan Aneka Jasa.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_2, 'kode' => 'PM.05.02.04', 'nama' => 'Perizinan Sektor Sekunder Industri Mesin, Logam dan Barang Logam.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_2, 'kode' => 'PM.05.02.05', 'nama' => 'Perizinan Sektor Sekunder Industri Kimia dan Barang Kimia.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_2, 'kode' => 'PM.05.02.06', 'nama' => 'Perizinan Sektor Sekunder Industri Aneka.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_2, 'kode' => 'PM.05.02.07', 'nama' => 'Verifikasi/Validasi.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_2, 'kode' => 'PM.05.02.08', 'nama' => 'Pertimbangan Teknis.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_2, 'kode' => 'PM.05.02.09', 'nama' => 'Tim Teknis.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_2, 'kode' => 'PM.05.02.10', 'nama' => 'Penerbitan Naskah Izin.', 'sifat' => 'B'],

            // Bawah PM.05.03
            ['parent_id' => $pm_5_3, 'kode' => 'PM.05.03.01', 'nama' => 'Pelayanan Sektor Primer dan Tersier Pertanian, Peternakan, Perkebunan, Pariwisata dan Prasarana.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_3, 'kode' => 'PM.05.03.02', 'nama' => 'Pelayanan Sektor Primer dan Tersier Kehutanan, Perikanan, Perhubungan dan Telekomunikasi.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_3, 'kode' => 'PM.05.03.03', 'nama' => 'Pelayanan Sektor Sektor Primer dan Tersier Pertambangan dan Energi, Pertambangan dan Aneka Jasa.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_3, 'kode' => 'PM.05.03.04', 'nama' => 'Perizinan Sektor Sekunder Industri Mesin, Logam dan Barang Logam.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_3, 'kode' => 'PM.05.03.05', 'nama' => 'Perizinan Sektor Sekunder Industri Kimia dan Barang Kimia.', 'sifat' => 'B'],
            ['parent_id' => $pm_5_3, 'kode' => 'PM.05.03.06', 'nama' => 'Perizinan Sektor Sekunder Industri Aneka.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: DG (Perdagangan)
        // ==============================================================================
        $id_dg = DB::table('klasifikasis')->where('kode', 'DG')->value('id');

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_dg, 'kode' => 'DG.01', 'nama' => 'Perdagangan Dalam Negeri:', 'sifat' => 'B'],
            ['parent_id' => $id_dg, 'kode' => 'DG.02', 'nama' => 'Standarisasi dan Perlindungan Konsumen:', 'sifat' => 'B'],
            ['parent_id' => $id_dg, 'kode' => 'DG.03', 'nama' => 'Perdagangan Luar Negeri:', 'sifat' => 'B'],
            ['parent_id' => $id_dg, 'kode' => 'DG.04', 'nama' => 'Kerjasama Perdagangan Internasional:', 'sifat' => 'B'],
            ['parent_id' => $id_dg, 'kode' => 'DG.05', 'nama' => 'Pengembangan Ekspor Nasional:', 'sifat' => 'B'],
            ['parent_id' => $id_dg, 'kode' => 'DG.06', 'nama' => 'Perdagangan Berjangka Komoditi:', 'sifat' => 'B'],
        ]);

        $dg_1 = DB::table('klasifikasis')->where('kode', 'DG.01')->value('id');
        $dg_2 = DB::table('klasifikasis')->where('kode', 'DG.02')->value('id');
        $dg_3 = DB::table('klasifikasis')->where('kode', 'DG.03')->value('id');
        $dg_4 = DB::table('klasifikasis')->where('kode', 'DG.04')->value('id');
        $dg_5 = DB::table('klasifikasis')->where('kode', 'DG.05')->value('id');
        $dg_6 = DB::table('klasifikasis')->where('kode', 'DG.06')->value('id');

        // --- LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah DG.01
            ['parent_id' => $dg_1, 'kode' => 'DG.01.01', 'nama' => 'Bina Usaha:', 'sifat' => 'B'],
            ['parent_id' => $dg_1, 'kode' => 'DG.01.02', 'nama' => 'Dagang Kecil Menengah dan Produk Dalam Negeri:', 'sifat' => 'B'],
            ['parent_id' => $dg_1, 'kode' => 'DG.01.03', 'nama' => 'Logistik dan Sarana Distribusi:', 'sifat' => 'B'],
            ['parent_id' => $dg_1, 'kode' => 'DG.01.04', 'nama' => 'Bahan Pokok dan Barang Strategis:', 'sifat' => 'B'],

            // Bawah DG.02 (Sesuai dokumen, loncat dari 02 ke 04)
            ['parent_id' => $dg_2, 'kode' => 'DG.02.01', 'nama' => 'Standardisasi:', 'sifat' => 'B'],
            ['parent_id' => $dg_2, 'kode' => 'DG.02.02', 'nama' => 'Pemberdayaan Konsumen:', 'sifat' => 'B'],
            ['parent_id' => $dg_2, 'kode' => 'DG.02.04', 'nama' => 'Pengawasan Barang Beredar dan Jasa:', 'sifat' => 'B'],
            ['parent_id' => $dg_2, 'kode' => 'DG.02.05', 'nama' => 'Metrologi:', 'sifat' => 'B'],

            // Bawah DG.03
            ['parent_id' => $dg_3, 'kode' => 'DG.03.01', 'nama' => 'Ekspor Produk Pertanian dan Kehutanan:', 'sifat' => 'B'],
            ['parent_id' => $dg_3, 'kode' => 'DG.03.02', 'nama' => 'Ekspor Produk Industri dan Pertambangan:', 'sifat' => 'B'],
            ['parent_id' => $dg_3, 'kode' => 'DG.03.03', 'nama' => 'Impor:', 'sifat' => 'B'],
            ['parent_id' => $dg_3, 'kode' => 'DG.03.04', 'nama' => 'Fasilitasi Ekspor dan Impor:', 'sifat' => 'B'],
            ['parent_id' => $dg_3, 'kode' => 'DG.03.05', 'nama' => 'Pengamanan Perdagangan:', 'sifat' => 'B'],

            // Bawah DG.04
            ['parent_id' => $dg_4, 'kode' => 'DG.04.01', 'nama' => 'Multilateral:', 'sifat' => 'B'],
            ['parent_id' => $dg_4, 'kode' => 'DG.04.02', 'nama' => 'ASEAN:', 'sifat' => 'B'],
            ['parent_id' => $dg_4, 'kode' => 'DG.04.03', 'nama' => 'APEC dan Organisasi Internasional Lainnya:', 'sifat' => 'B'],
            ['parent_id' => $dg_4, 'kode' => 'DG.04.04', 'nama' => 'Bilateral:', 'sifat' => 'B'],
            ['parent_id' => $dg_4, 'kode' => 'DG.04.05', 'nama' => 'Perundingan Perdagangan Jasa:', 'sifat' => 'B'],

            // Bawah DG.05
            ['parent_id' => $dg_5, 'kode' => 'DG.05.01', 'nama' => 'Pasar dan Informasi Ekspor:', 'sifat' => 'B'],
            ['parent_id' => $dg_5, 'kode' => 'DG.05.02', 'nama' => 'Produk ekspor dan ekonomi kreatif:', 'sifat' => 'B'],
            ['parent_id' => $dg_5, 'kode' => 'DG.05.03', 'nama' => 'Kerja Sama Pengembangan Ekspor:', 'sifat' => 'B'],
            ['parent_id' => $dg_5, 'kode' => 'DG.05.04', 'nama' => 'Promosi dan Citra:', 'sifat' => 'B'],

            // Bawah DG.06
            ['parent_id' => $dg_6, 'kode' => 'DG.06.01', 'nama' => 'Perniagaan:', 'sifat' => 'B'],
            ['parent_id' => $dg_6, 'kode' => 'DG.06.02', 'nama' => 'Analisis Pasar:', 'sifat' => 'B'],
            ['parent_id' => $dg_6, 'kode' => 'DG.06.03', 'nama' => 'Pasar Fisik dan Jasa:', 'sifat' => 'B'],
        ]);

        // ==============================================================================
        // MENGAMBIL ID LEVEL 3 UNTUK MEMASUKAN LEVEL CICIT (LEVEL 4)
        // ==============================================================================
        $dg_1_1 = DB::table('klasifikasis')->where('kode', 'DG.01.01')->value('id');
        $dg_1_2 = DB::table('klasifikasis')->where('kode', 'DG.01.02')->value('id');
        $dg_1_3 = DB::table('klasifikasis')->where('kode', 'DG.01.03')->value('id');
        $dg_1_4 = DB::table('klasifikasis')->where('kode', 'DG.01.04')->value('id');

        $dg_2_1 = DB::table('klasifikasis')->where('kode', 'DG.02.01')->value('id');
        $dg_2_2 = DB::table('klasifikasis')->where('kode', 'DG.02.02')->value('id');
        $dg_2_4 = DB::table('klasifikasis')->where('kode', 'DG.02.04')->value('id');
        $dg_2_5 = DB::table('klasifikasis')->where('kode', 'DG.02.05')->value('id');

        $dg_3_1 = DB::table('klasifikasis')->where('kode', 'DG.03.01')->value('id');
        $dg_3_2 = DB::table('klasifikasis')->where('kode', 'DG.03.02')->value('id');
        $dg_3_3 = DB::table('klasifikasis')->where('kode', 'DG.03.03')->value('id');
        $dg_3_4 = DB::table('klasifikasis')->where('kode', 'DG.03.04')->value('id');
        $dg_3_5 = DB::table('klasifikasis')->where('kode', 'DG.03.05')->value('id');

        $dg_4_1 = DB::table('klasifikasis')->where('kode', 'DG.04.01')->value('id');
        $dg_4_2 = DB::table('klasifikasis')->where('kode', 'DG.04.02')->value('id');
        $dg_4_3 = DB::table('klasifikasis')->where('kode', 'DG.04.03')->value('id');
        $dg_4_4 = DB::table('klasifikasis')->where('kode', 'DG.04.04')->value('id');
        $dg_4_5 = DB::table('klasifikasis')->where('kode', 'DG.04.05')->value('id');

        $dg_5_1 = DB::table('klasifikasis')->where('kode', 'DG.05.01')->value('id');
        $dg_5_2 = DB::table('klasifikasis')->where('kode', 'DG.05.02')->value('id');
        $dg_5_3 = DB::table('klasifikasis')->where('kode', 'DG.05.03')->value('id');
        $dg_5_4 = DB::table('klasifikasis')->where('kode', 'DG.05.04')->value('id');

        $dg_6_1 = DB::table('klasifikasis')->where('kode', 'DG.06.01')->value('id');
        $dg_6_2 = DB::table('klasifikasis')->where('kode', 'DG.06.02')->value('id');
        $dg_6_3 = DB::table('klasifikasis')->where('kode', 'DG.06.03')->value('id');

        // --- LEVEL CICIT (Level 4) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah DG.01.01
            ['parent_id' => $dg_1_1, 'kode' => 'DG.01.01.01', 'nama' => 'Kelembagaan.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_1, 'kode' => 'DG.01.01.02', 'nama' => 'Penguatan usaha.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_1, 'kode' => 'DG.01.01.03', 'nama' => 'Jasa Perdagangan berbasis elektronik.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_1, 'kode' => 'DG.01.01.04', 'nama' => 'Jasa Perdagangan berbasis jasa distribusi dan bisnis.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_1, 'kode' => 'DG.01.01.05', 'nama' => 'Usaha dagang asing.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_1, 'kode' => 'DG.01.01.06', 'nama' => 'Keagenan.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_1, 'kode' => 'DG.01.01.07', 'nama' => 'Informasi Pendaftaran perusahaan.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_1, 'kode' => 'DG.01.01.08', 'nama' => 'Informasi Seksi analisa LKTP.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_1, 'kode' => 'DG.01.01.09', 'nama' => 'Pelaku pasar Pengecer.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_1, 'kode' => 'DG.01.01.10', 'nama' => 'Pelaku pasar Pemasok.', 'sifat' => 'B'],

            // Bawah DG.01.02
            ['parent_id' => $dg_1_2, 'kode' => 'DG.01.02.01', 'nama' => 'Iklim usaha.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_2, 'kode' => 'DG.01.02.02', 'nama' => 'Bimbingan teknis.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_2, 'kode' => 'DG.01.02.03', 'nama' => 'Fasilitasi usah produktif.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_2, 'kode' => 'DG.01.02.04', 'nama' => 'Fasilitasi usaha dan pemasaran.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_2, 'kode' => 'DG.01.02.05', 'nama' => 'Penelaahan potensi produk dalam rangka pengembangan produk lokal.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_2, 'kode' => 'DG.01.02.06', 'nama' => 'Fasilitasi penguatan produk dalam rangka pengembangan potensi produk.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_2, 'kode' => 'DG.01.02.07', 'nama' => 'Kerja sama peningkatan penggunaan produk dalam negeri pencitraan produk dalam negeri.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_2, 'kode' => 'DG.01.02.08', 'nama' => 'Peningkatan promosi pencitraan produk dalam negeri.', 'sifat' => 'B'],

            // Bawah DG.01.03
            ['parent_id' => $dg_1_3, 'kode' => 'DG.01.03.01', 'nama' => 'Perencanaan Pengembangan sarana distribusi.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_3, 'kode' => 'DG.01.03.02', 'nama' => 'Bimbingan teknis Pengembangan sarana distribusi.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_3, 'kode' => 'DG.01.03.03', 'nama' => 'Bimbingan teknis pengelolaan sarana distribusi.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_3, 'kode' => 'DG.01.03.04', 'nama' => 'Evaluasi pengelolaan sarana distribusi.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_3, 'kode' => 'DG.01.03.05', 'nama' => 'Lerja sama pengembangan sistem logistik dengan Pemerintah.', 'sifat' => 'B'], // Typo asli
            ['parent_id' => $dg_1_3, 'kode' => 'DG.01.03.06', 'nama' => 'Kerja sama pengembangan sistem logistik dengan lembaga non pemerintah.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_3, 'kode' => 'DG.01.03.07', 'nama' => 'Informasi logistik.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_3, 'kode' => 'DG.01.03.08', 'nama' => 'Bimbingan teknis penyedia jasa logistik.', 'sifat' => 'B'],

            // Bawah DG.01.04
            ['parent_id' => $dg_1_4, 'kode' => 'DG.01.04.01', 'nama' => 'Informasi Harga (Pengumpulan, Pengolahan, Penyiapan, Penyajian Informasi, Analisis).', 'sifat' => 'B'],
            ['parent_id' => $dg_1_4, 'kode' => 'DG.01.04.02', 'nama' => 'Informasi Non Harga (Pengumpulan, Pengolahan, Penyiapan, Penyajian Informasi, Analisis).', 'sifat' => 'B'],
            ['parent_id' => $dg_1_4, 'kode' => 'DG.01.04.03', 'nama' => 'Hasil Industri berupa gula dan tepung.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_4, 'kode' => 'DG.01.04.04', 'nama' => 'Hasil industri berupa minyak goreng dan garam.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_4, 'kode' => 'DG.01.04.05', 'nama' => 'Barang strategis hasil agro.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_4, 'kode' => 'DG.01.04.06', 'nama' => 'Barang strategis hasil industri.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_4, 'kode' => 'DG.01.04.07', 'nama' => 'Barang pokok agro serelia.', 'sifat' => 'B'],
            ['parent_id' => $dg_1_4, 'kode' => 'DG.01.04.08', 'nama' => 'Barang pokok agro hewan dan non serelia.', 'sifat' => 'B'],

            // Bawah DG.02.01
            ['parent_id' => $dg_2_1, 'kode' => 'DG.02.01.01', 'nama' => 'Hubungan kelembagaan.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_1, 'kode' => 'DG.02.01.02', 'nama' => 'Informasi standar.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_1, 'kode' => 'DG.02.01.03', 'nama' => 'Kerjasama standarisasi regional.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_1, 'kode' => 'DG.02.01.04', 'nama' => 'Kerjasama standarisasi bilateral dan multilateral.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_1, 'kode' => 'DG.02.01.05', 'nama' => 'Penetapan standar.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_1, 'kode' => 'DG.02.01.06', 'nama' => 'Perumusan Standar.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_1, 'kode' => 'DG.02.01.07', 'nama' => 'Tata Usaha kepegawaian.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_1, 'kode' => 'DG.02.01.08', 'nama' => 'Tata usaha keuangan.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_1, 'kode' => 'DG.02.01.09', 'nama' => 'Tata usaha perencanaan dan program.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_1, 'kode' => 'DG.02.01.10', 'nama' => 'Tata usaha inventaris kantor/BMAN.', 'sifat' => 'B'],

            // Bawah DG.02.02
            ['parent_id' => $dg_2_2, 'kode' => 'DG.02.02.01', 'nama' => 'Kerjasama.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_2, 'kode' => 'DG.02.02.02', 'nama' => 'Informasi, dan publikasi.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_2, 'kode' => 'DG.02.02.03', 'nama' => 'Konsultasi hukum analisa penyelenggara pelindungan konsumen.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_2, 'kode' => 'DG.02.02.04', 'nama' => 'Analisis penyelenggara pelindungan konsumen.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_2, 'kode' => 'DG.02.02.05', 'nama' => 'Bimbingan konsumen.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_2, 'kode' => 'DG.02.02.06', 'nama' => 'Bimbingan pelaku usaha.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_2, 'kode' => 'DG.02.02.07', 'nama' => 'Fasilitas pemberdayaan lembaga perlindungan konsumen swadaya masyarakat.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_2, 'kode' => 'DG.02.02.08', 'nama' => 'Fasilitas pemberdayaan badan penyelesaian sengketa konsumen.', 'sifat' => 'B'],

            // Bawah DG.02.04
            ['parent_id' => $dg_2_4, 'kode' => 'DG.02.04.01', 'nama' => 'Produk pertambangan dan olahan.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_4, 'kode' => 'DG.02.04.02', 'nama' => 'Produk aneka industri.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_4, 'kode' => 'DG.02.04.03', 'nama' => 'Produk pertanian dan kehutanan.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_4, 'kode' => 'DG.02.04.04', 'nama' => 'Produk kimia dan olahan.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_4, 'kode' => 'DG.02.04.05', 'nama' => 'Jasa distribusi.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_4, 'kode' => 'DG.02.04.06', 'nama' => 'Jasa bisnis.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_4, 'kode' => 'DG.02.04.07', 'nama' => 'Kerjasama lembaga pemerintah.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_4, 'kode' => 'DG.02.04.08', 'nama' => 'Kerjasama lembaga non pemerintah.', 'sifat' => 'B'],

            // Bawah DG.02.05
            ['parent_id' => $dg_2_5, 'kode' => 'DG.02.05.01', 'nama' => 'Sarana metrologi legal.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_5, 'kode' => 'DG.02.05.02', 'nama' => 'Kerjasama metrologi legal.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_5, 'kode' => 'DG.02.05.03', 'nama' => 'Kelembagaan metrologi legal.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_5, 'kode' => 'DG.02.05.04', 'nama' => 'Penilaian metrologi legal.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_5, 'kode' => 'DG.02.05.05', 'nama' => 'Bsaran massa, listrik, tekanan dan suhu.', 'sifat' => 'B'], // Typo asli
            ['parent_id' => $dg_2_5, 'kode' => 'DG.02.05.06', 'nama' => 'Besaran arus, panjang dan volume.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_5, 'kode' => 'DG.02.05.07', 'nama' => 'Pengawasan alat ukur, takar, timbang dan perlengkapannya.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_5, 'kode' => 'DG.02.05.08', 'nama' => 'Pengawasan barang dalam keadaan terbungkus dan satuan internasional.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_5, 'kode' => 'DG.02.05.09', 'nama' => 'Bimbingan Mutu Balai Pengelolaan Standar Nasional Satuan Ukuran (SNSU).', 'sifat' => 'B'],
            ['parent_id' => $dg_2_5, 'kode' => 'DG.02.05.10', 'nama' => 'Pelayanan Teknis Balai Pengelolaan Standar Nasional Satuan Ukuran (SNSU).', 'sifat' => 'B'],
            ['parent_id' => $dg_2_5, 'kode' => 'DG.02.05.11', 'nama' => 'Bimbingan Mutu Balai Pengujian UTTP.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_5, 'kode' => 'DG.02.05.12', 'nama' => 'Pelayanan Teknis Balai Pengujian UTTP.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_5, 'kode' => 'DG.02.05.13', 'nama' => 'Bimbingan Kemetrologian Bali SML Regional 1 Medan.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_5, 'kode' => 'DG.02.05.14', 'nama' => 'Pelayanan Kemetrologian Bali SML Regional 1 Medan.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_5, 'kode' => 'DG.02.05.15', 'nama' => 'Bimbingan Kemetrologian Bali SML Regional 1 Jogjakarta.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_5, 'kode' => 'DG.02.05.16', 'nama' => 'Pelayanan Kemetrologian Bali SML Regional 1 Jogjakarta.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_5, 'kode' => 'DG.02.05.17', 'nama' => 'Bimbingan Kemetrologian Bali SML Regional 1 Makassar.', 'sifat' => 'B'],
            ['parent_id' => $dg_2_5, 'kode' => 'DG.02.05.18', 'nama' => 'Pelayanan Kemetrologian Bali SML Regional 1 Makassar.', 'sifat' => 'B'],

            // Bawah DG.03.01
            ['parent_id' => $dg_3_1, 'kode' => 'DG.03.01.01', 'nama' => 'Ekspor produk tanaman pangan.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_1, 'kode' => 'DG.03.01.02', 'nama' => 'Ekspor produk perikanan, dan peternakan.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_1, 'kode' => 'DG.03.01.03', 'nama' => 'Tanaman Perkebunan Tahunan.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_1, 'kode' => 'DG.03.01.04', 'nama' => 'Tanaman Perkebunan Musiman.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_1, 'kode' => 'DG.03.01.05', 'nama' => 'Hortikultura.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_1, 'kode' => 'DG.03.01.06', 'nama' => 'Rempah-rempah dan tanaman obat.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_1, 'kode' => 'DG.03.01.07', 'nama' => 'Hasil hutan berupa kayu dan produk kayu.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_1, 'kode' => 'DG.03.01.08', 'nama' => 'Hasil hutan bukan kayu.', 'sifat' => 'B'],

            // Bawah DG.03.02
            ['parent_id' => $dg_3_2, 'kode' => 'DG.03.02.01', 'nama' => 'Produk TPT (Tekstil dan Produk Tekstil).', 'sifat' => 'B'],
            ['parent_id' => $dg_3_2, 'kode' => 'DG.03.02.02', 'nama' => 'Produk Aneka dan jasa.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_2, 'kode' => 'DG.03.02.03', 'nama' => 'Produk Logam dan mesin.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_2, 'kode' => 'DG.03.02.04', 'nama' => 'Produk alat transportasi dan elektronika.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_2, 'kode' => 'DG.03.02.05', 'nama' => 'Produk industri agro.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_2, 'kode' => 'DG.03.02.06', 'nama' => 'Produk kimia.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_2, 'kode' => 'DG.03.02.07', 'nama' => 'Produk migas.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_2, 'kode' => 'DG.03.02.08', 'nama' => 'Produk pertambangan.', 'sifat' => 'B'],

            // Bawah DG.03.03
            ['parent_id' => $dg_3_3, 'kode' => 'DG.03.03.01', 'nama' => 'Impor Barang Modal Mesin dan peralatan mesin.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_3, 'kode' => 'DG.03.03.02', 'nama' => 'Impor Barang Modal alat angkut.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_3, 'kode' => 'DG.03.03.03', 'nama' => 'Barang pertanian dan kehutanan.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_3, 'kode' => 'DG.03.03.04', 'nama' => 'Barang kelautan, dan perikanan.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_3, 'kode' => 'DG.03.03.05', 'nama' => 'Barang aneka industri.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_3, 'kode' => 'DG.03.03.06', 'nama' => 'Barang bahan baku industri.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_3, 'kode' => 'DG.03.03.07', 'nama' => 'Barang konsumsi tahan lama.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_3, 'kode' => 'DG.03.03.08', 'nama' => 'Barang konsumsi tidak tahan lama.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_3, 'kode' => 'DG.03.03.09', 'nama' => 'Barang kimia dan bahan berbahaya.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_3, 'kode' => 'DG.03.03.10', 'nama' => 'Barang tambang dan limbah.', 'sifat' => 'B'],

            // Bawah DG.03.04
            ['parent_id' => $dg_3_4, 'kode' => 'DG.03.04.01', 'nama' => 'Kerjasama multilateral dan regional, termasuk bilate', 'sifat' => 'B'], // Kepotong di asli
            ['parent_id' => $dg_3_4, 'kode' => 'DG.03.04.02', 'nama' => 'Pembiayaan perdagangan dalam kerjasama internasi', 'sifat' => 'B'], // Kepotong di asli
            ['parent_id' => $dg_3_4, 'kode' => 'DG.03.04.03', 'nama' => 'Sumber pembiayaan dan sistem pembayaran.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_4, 'kode' => 'DG.03.04.04', 'nama' => 'Prosedur ekspor dan impor.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_4, 'kode' => 'DG.03.04.05', 'nama' => 'Dokumen ekspor dan impor. Sarana dan prasarana Penunjang Perdagangan', 'sifat' => 'B'], // Disambung dari teks baris baru
            ['parent_id' => $dg_3_4, 'kode' => 'DG.03.04.06', 'nama' => 'Internasional.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_4, 'kode' => 'DG.03.04.07', 'nama' => 'Regulasi Penunjang Perdagangan Internasional.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_4, 'kode' => 'DG.03.04.08', 'nama' => 'Analisa pelayanan perdagangan.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_4, 'kode' => 'DG.03.04.09', 'nama' => 'Fasilitasi pelayanan perdagangan.', 'sifat' => 'B'],

            // Bawah DG.03.05
            ['parent_id' => $dg_3_5, 'kode' => 'DG.03.05.01', 'nama' => 'Monitoring Hambatan Perdagangan.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_5, 'kode' => 'DG.03.05.02', 'nama' => 'Evaluasi Monitoring Hambatan Perdagangan.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_5, 'kode' => 'DG.03.05.03', 'nama' => 'Penanganan Hambatan Teknis Perdagangan.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_5, 'kode' => 'DG.03.05.04', 'nama' => 'Penanganan Tuduhan Dumping.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_5, 'kode' => 'DG.03.05.05', 'nama' => 'Penanganan Tuduhan Subsidi.', 'sifat' => 'B'],
            ['parent_id' => $dg_3_5, 'kode' => 'DG.03.05.06', 'nama' => 'Penanganan Tuduhan Safeguard.', 'sifat' => 'B'],

            // Bawah DG.04.01
            ['parent_id' => $dg_4_1, 'kode' => 'DG.04.01.01', 'nama' => 'Tarif barang pertanian.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_1, 'kode' => 'DG.04.01.02', 'nama' => 'Non Tarif barang pertanian.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_1, 'kode' => 'DG.04.01.03', 'nama' => 'Tarif barang non pertanian.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_1, 'kode' => 'DG.04.01.04', 'nama' => 'Non Tarif barang non pertanian.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_1, 'kode' => 'DG.04.01.05', 'nama' => 'Akses pasar barang non pertanian.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_1, 'kode' => 'DG.04.01.06', 'nama' => 'Aturan perdagangan.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_1, 'kode' => 'DG.04.01.07', 'nama' => 'Hak Kekayaan Intelektual (HKI)dan investasi.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_1, 'kode' => 'DG.04.01.08', 'nama' => 'Lingkungan dan isu baru.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_1, 'kode' => 'DG.04.01.09', 'nama' => 'Tinjauan Ketentuan perdagangan.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_1, 'kode' => 'DG.04.01.10', 'nama' => 'Notifikasi.', 'sifat' => 'B'],

            // Bawah DG.04.02
            ['parent_id' => $dg_4_2, 'kode' => 'DG.04.02.01', 'nama' => 'Perdagangan barang Masyarakat Ekonomi ASEAN I. Fasilitas perdagangan barang Masyarakat Ekonomi', 'sifat' => 'B'], // Digabung
            ['parent_id' => $dg_4_2, 'kode' => 'DG.04.02.02', 'nama' => 'ASEAN I.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_2, 'kode' => 'DG.04.02.03', 'nama' => 'Perdagangan barang Masyarakat Ekonomi ASEAN II. Fasilitas perdagangan barang Masyarakat Ekonomi', 'sifat' => 'B'], // Digabung
            ['parent_id' => $dg_4_2, 'kode' => 'DG.04.02.04', 'nama' => 'ASEAN II.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_2, 'kode' => 'DG.04.02.05', 'nama' => 'ASEAN mitra dialog.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_2, 'kode' => 'DG.04.02.06', 'nama' => 'Kerjasama antar dan sub regional.', 'sifat' => 'B'],

            // Bawah DG.04.03
            ['parent_id' => $dg_4_3, 'kode' => 'DG.04.03.01', 'nama' => 'Akses perdagangan Barang APEC.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_3, 'kode' => 'DG.04.03.02', 'nama' => 'Akses investasi APEC.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_3, 'kode' => 'DG.04.03.03', 'nama' => 'Fasilitasi perdagangan APEC.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_3, 'kode' => 'DG.04.03.04', 'nama' => 'Fasilitasi investasi APEC.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_3, 'kode' => 'DG.04.03.05', 'nama' => 'Badan-badan PBB dan Non PBB.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_3, 'kode' => 'DG.04.03.06', 'nama' => 'Organisasi komoditi internasional.', 'sifat' => 'B'],

            // Bawah DG.04.04
            ['parent_id' => $dg_4_4, 'kode' => 'DG.04.04.01', 'nama' => 'Kerja sama bilateral dengan berbagai negara-negara.', 'sifat' => 'B'],

            // Bawah DG.04.05
            ['parent_id' => $dg_4_5, 'kode' => 'DG.04.05.01', 'nama' => 'Jasa bisnis dan distribusi.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_5, 'kode' => 'DG.04.05.02', 'nama' => 'Jasa keuangan. Jasa konstruksi, pariwisata, rekreasi budaya dan olah', 'sifat' => 'B'], // Digabung
            ['parent_id' => $dg_4_5, 'kode' => 'DG.04.05.03', 'nama' => 'raga.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_5, 'kode' => 'DG.04.05.04', 'nama' => 'Jasa transportasi.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_5, 'kode' => 'DG.04.05.05', 'nama' => 'Jasa pendidikan.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_5, 'kode' => 'DG.04.05.06', 'nama' => 'Jasa kesehatan.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_5, 'kode' => 'DG.04.05.07', 'nama' => 'Jasa komunikasi.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_5, 'kode' => 'DG.04.05.08', 'nama' => 'Jasa lingkungan dan jasa lainnya.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_5, 'kode' => 'DG.04.05.09', 'nama' => 'Rules dan peraturan domestik.', 'sifat' => 'B'],
            ['parent_id' => $dg_4_5, 'kode' => 'DG.04.05.10', 'nama' => 'Penyusunan analisis informasi.', 'sifat' => 'B'],

            // Bawah DG.05.01
            ['parent_id' => $dg_5_1, 'kode' => 'DG.05.01.01', 'nama' => 'Pengembangan pasar.', 'sifat' => 'B'],
            ['parent_id' => $dg_5_1, 'kode' => 'DG.05.01.02', 'nama' => 'Pengelolaan data pada sistem informasi ekspor.', 'sifat' => 'B'],
            ['parent_id' => $dg_5_1, 'kode' => 'DG.05.01.03', 'nama' => 'Pengembangan sistem informasi ekspor.', 'sifat' => 'B'],
            ['parent_id' => $dg_5_1, 'kode' => 'DG.05.01.04', 'nama' => 'Pelayanan pelaku usaha ekspor.', 'sifat' => 'B'],
            ['parent_id' => $dg_5_1, 'kode' => 'DG.05.01.05', 'nama' => 'Publikasi informasi ekspor.', 'sifat' => 'B'],

            // Bawah DG.05.02
            ['parent_id' => $dg_5_2, 'kode' => 'DG.05.02.01', 'nama' => 'Hasil industri manufaktur berupa Mesin, logam, elektronika dan telematika.', 'sifat' => 'B'],
            ['parent_id' => $dg_5_2, 'kode' => 'DG.05.02.02', 'nama' => 'Hasil industri manufaktur berupa Pangan, tekstil dan produk tekstil, alat kesehatan dan aneka.', 'sifat' => 'B'],
            ['parent_id' => $dg_5_2, 'kode' => 'DG.05.02.03', 'nama' => 'Produk agro berupa kehutanan dan perkebunan.', 'sifat' => 'B'],
            ['parent_id' => $dg_5_2, 'kode' => 'DG.05.02.04', 'nama' => 'Produk agro berupa pertanian dan perikanan.', 'sifat' => 'B'],
            ['parent_id' => $dg_5_2, 'kode' => 'DG.05.02.05', 'nama' => 'Jasa bisnis dan profesi.', 'sifat' => 'B'],
            ['parent_id' => $dg_5_2, 'kode' => 'DG.05.02.06', 'nama' => 'Jasa konstruksi dan distribusi.', 'sifat' => 'B'],
            ['parent_id' => $dg_5_2, 'kode' => 'DG.05.02.07', 'nama' => 'Media dan iptek Ekonomi kreatif.', 'sifat' => 'B'],
            ['parent_id' => $dg_5_2, 'kode' => 'DG.05.02.08', 'nama' => 'Seni budaya dan desain ekonomi kreatif.', 'sifat' => 'B'],

            // Bawah DG.05.03
            ['parent_id' => $dg_5_3, 'kode' => 'DG.05.03.01', 'nama' => 'Pemerintah luar negeri.', 'sifat' => 'B'],
            ['parent_id' => $dg_5_3, 'kode' => 'DG.05.03.02', 'nama' => 'Non pemerintah luar negeri.', 'sifat' => 'B'],
            ['parent_id' => $dg_5_3, 'kode' => 'DG.05.03.03', 'nama' => 'Pemerintah dalam negeri.', 'sifat' => 'B'],
            ['parent_id' => $dg_5_3, 'kode' => 'DG.05.03.04', 'nama' => 'Non pemerintah dalam negeri.', 'sifat' => 'B'],

            // Bawah DG.05.04
            ['parent_id' => $dg_5_4, 'kode' => 'DG.05.04.01', 'nama' => 'Promosi.', 'sifat' => 'B'],
            ['parent_id' => $dg_5_4, 'kode' => 'DG.05.04.02', 'nama' => 'Perencanaan citra.', 'sifat' => 'B'],
            ['parent_id' => $dg_5_4, 'kode' => 'DG.05.04.03', 'nama' => 'Pemantauan dan evaluasi citra.', 'sifat' => 'B'],
            ['parent_id' => $dg_5_4, 'kode' => 'DG.05.04.04', 'nama' => 'Penerapan citra dalam dan luar negeri.', 'sifat' => 'B'],

            // Bawah DG.06.01
            ['parent_id' => $dg_6_1, 'kode' => 'DG.06.01.01', 'nama' => 'Bina Usaha kelembagaan dan pelaku penunjang.', 'sifat' => 'B'],
            ['parent_id' => $dg_6_1, 'kode' => 'DG.06.01.02', 'nama' => 'Bina Usaha pelaku pasar. Pengawasan Transaksi kelembagaab dan pelaku', 'sifat' => 'B'], // Digabung
            ['parent_id' => $dg_6_1, 'kode' => 'DG.06.01.03', 'nama' => 'penunjang.', 'sifat' => 'B'],
            ['parent_id' => $dg_6_1, 'kode' => 'DG.06.01.04', 'nama' => 'Pengawasan Transaksi pelaku pasar.', 'sifat' => 'B'],
            ['parent_id' => $dg_6_1, 'kode' => 'DG.06.01.05', 'nama' => 'Pemantauan dan evaluasi keuangan dalam rangka Pengawasan keuangan dan audit.', 'sifat' => 'B'],
            ['parent_id' => $dg_6_1, 'kode' => 'DG.06.01.06', 'nama' => 'Audit kepatuhan dan keuangan dalam rangka Pengawasan keuangan dan audit.', 'sifat' => 'B'],

            // Bawah DG.06.02
            ['parent_id' => $dg_6_2, 'kode' => 'DG.06.02.01', 'nama' => 'Pengkajian pasar fisik dan penyerahan.', 'sifat' => 'B'],
            ['parent_id' => $dg_6_2, 'kode' => 'DG.06.02.02', 'nama' => 'Posisi dan pelaporan pengkajian pasar.', 'sifat' => 'B'],
            ['parent_id' => $dg_6_2, 'kode' => 'DG.06.02.03', 'nama' => 'Kelembagaan dan produk Pengembangan pasar.', 'sifat' => 'B'],
            ['parent_id' => $dg_6_2, 'kode' => 'DG.06.02.04', 'nama' => 'Tata tertib dan kontrak pengembangan pasar.', 'sifat' => 'B'],
            ['parent_id' => $dg_6_2, 'kode' => 'DG.06.02.05', 'nama' => 'Teknologi Informasi pada Sistem informasi.', 'sifat' => 'B'],
            ['parent_id' => $dg_6_2, 'kode' => 'DG.06.02.06', 'nama' => 'Data pada Sistem Informasi.', 'sifat' => 'B'],

            // Bawah DG.06.03
            ['parent_id' => $dg_6_3, 'kode' => 'DG.06.03.01', 'nama' => 'Pembinaan penyelenggaraan dan pelaku pasar lelang.', 'sifat' => 'B'],
            ['parent_id' => $dg_6_3, 'kode' => 'DG.06.03.02', 'nama' => 'Pembinaan pelaku sistem resi gudang.', 'sifat' => 'B'],
            ['parent_id' => $dg_6_3, 'kode' => 'DG.06.03.03', 'nama' => 'Pengawasan transaksi pasar lelang.', 'sifat' => 'B'],
            ['parent_id' => $dg_6_3, 'kode' => 'DG.06.03.04', 'nama' => 'Pengawasan penyelenggara dan pelaku pasar lelang.', 'sifat' => 'B'],
            ['parent_id' => $dg_6_3, 'kode' => 'DG.06.03.05', 'nama' => 'Pengawasan pengelola agunan dan lembaga sertifikasi pada sistem resi gudang.', 'sifat' => 'B'],
            ['parent_id' => $dg_6_3, 'kode' => 'DG.06.03.06', 'nama' => 'Pengawasan lembaga penjamin dan agen penjual pada sistem resi gudang.', 'sifat' => 'B'],
            ['parent_id' => $dg_6_3, 'kode' => 'DG.06.03.07', 'nama' => 'Bimbingan Teknis.', 'sifat' => 'B'],
            ['parent_id' => $dg_6_3, 'kode' => 'DG.06.03.08', 'nama' => 'Evaluasi.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: PI (Perindustrian)
        // ==============================================================================
        $id_pi = DB::table('klasifikasis')->where('kode', 'PI')->value('id');

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_pi, 'kode' => 'PI.01', 'nama' => 'Iklim Usaha dan Kerjasama:', 'sifat' => 'B'],
            ['parent_id' => $id_pi, 'kode' => 'PI.02', 'nama' => 'Promosi Industri:', 'sifat' => 'B'],
            ['parent_id' => $id_pi, 'kode' => 'PI.03', 'nama' => 'Standarisasi dan Teknologi:', 'sifat' => 'B'],
            ['parent_id' => $id_pi, 'kode' => 'PI.04', 'nama' => 'Hak dan Kekayaan Intelektual:', 'sifat' => 'B'],
            ['parent_id' => $id_pi, 'kode' => 'PI.05', 'nama' => 'Industri Hijau:', 'sifat' => 'B'],
            ['parent_id' => $id_pi, 'kode' => 'PI.05', 'nama' => 'Analisis Industri Unggulan Provinsi:', 'sifat' => 'B'], // Kode Kembar Sesuai Dokumen
            ['parent_id' => $id_pi, 'kode' => 'PI.06', 'nama' => 'Monitoring dan Evaluasi Kompetensi Inti Industri (Provinsi dan Daerah Kabupaten/Kota):', 'sifat' => 'B'],
            ['parent_id' => $id_pi, 'kode' => 'PI.07', 'nama' => 'Pengembangan Infrastruktur Pendukung:', 'sifat' => 'B'],
            ['parent_id' => $id_pi, 'kode' => 'PI.08', 'nama' => 'Fasilitasi Pengembangan Kawasan Industri:', 'sifat' => 'B'],
            ['parent_id' => $id_pi, 'kode' => 'PI.09', 'nama' => 'Kerjasama Industri Internasional:', 'sifat' => 'B'],
            ['parent_id' => $id_pi, 'kode' => 'PI.10', 'nama' => 'Standarisasi:', 'sifat' => 'B'],
            ['parent_id' => $id_pi, 'kode' => 'PI.11', 'nama' => 'Pengkajian Kebijakan dan Iklim Usaha Industri:', 'sifat' => 'B'],
            ['parent_id' => $id_pi, 'kode' => 'PI.12', 'nama' => 'Pengkajian Industri Hijau dan Lingkungan Hidup:', 'sifat' => 'B'],
            ['parent_id' => $id_pi, 'kode' => 'PI.13', 'nama' => 'Teknologi dan Hak Kekayaan Intelektual:', 'sifat' => 'B'],
        ]);

        $pi_1 = DB::table('klasifikasis')->where('kode', 'PI.01')->value('id');
        $pi_2 = DB::table('klasifikasis')->where('kode', 'PI.02')->value('id');
        $pi_3 = DB::table('klasifikasis')->where('kode', 'PI.03')->value('id');
        $pi_4 = DB::table('klasifikasis')->where('kode', 'PI.04')->value('id');
        $pi_5_hijau = DB::table('klasifikasis')->where('kode', 'PI.05')->where('nama', 'like', 'Industri Hijau%')->value('id');
        $pi_5_analisis = DB::table('klasifikasis')->where('kode', 'PI.05')->where('nama', 'like', 'Analisis Industri%')->value('id');
        $pi_6 = DB::table('klasifikasis')->where('kode', 'PI.06')->value('id');
        $pi_7 = DB::table('klasifikasis')->where('kode', 'PI.07')->value('id');
        $pi_8 = DB::table('klasifikasis')->where('kode', 'PI.08')->value('id');
        $pi_9 = DB::table('klasifikasis')->where('kode', 'PI.09')->value('id');
        $pi_10 = DB::table('klasifikasis')->where('kode', 'PI.10')->value('id');
        $pi_11 = DB::table('klasifikasis')->where('kode', 'PI.11')->value('id');
        $pi_12 = DB::table('klasifikasis')->where('kode', 'PI.12')->value('id');
        $pi_13 = DB::table('klasifikasis')->where('kode', 'PI.13')->value('id');

        // --- LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah PI.01
            ['parent_id' => $pi_1, 'kode' => 'PI.01.01', 'nama' => 'Industri Manufaktur:', 'sifat' => 'B'],
            ['parent_id' => $pi_1, 'kode' => 'PI.01.02', 'nama' => 'Industri Agro:', 'sifat' => 'B'],
            ['parent_id' => $pi_1, 'kode' => 'PI.01.03', 'nama' => 'Industri Unggulan Berbasis Teknologi Tinggi:', 'sifat' => 'B'],
            ['parent_id' => $pi_1, 'kode' => 'PI.01.04', 'nama' => 'Industri Kecil dan Menengah:', 'sifat' => 'B'],

            // Bawah PI.02
            ['parent_id' => $pi_2, 'kode' => 'PI.02.01', 'nama' => 'Industri Manufaktur:', 'sifat' => 'B'],
            ['parent_id' => $pi_2, 'kode' => 'PI.02.02', 'nama' => 'Industri Agro:', 'sifat' => 'B'],
            ['parent_id' => $pi_2, 'kode' => 'PI.02.03', 'nama' => 'Industri Unggulan Berbasis Teknologi Tinggi:', 'sifat' => 'B'],
            ['parent_id' => $pi_2, 'kode' => 'PI.02.04', 'nama' => 'Industri Kecil dan Menengah:', 'sifat' => 'B'],

            // Bawah PI.03
            ['parent_id' => $pi_3, 'kode' => 'PI.03.01', 'nama' => 'Industri Manufaktur:', 'sifat' => 'B'],
            ['parent_id' => $pi_3, 'kode' => 'PI.03.02', 'nama' => 'Industri Agro:', 'sifat' => 'B'],
            ['parent_id' => $pi_3, 'kode' => 'PI.03.03', 'nama' => 'Industri Unggulan Berbasis Teknologi Tinggi:', 'sifat' => 'B'],
            ['parent_id' => $pi_3, 'kode' => 'PI.03.04', 'nama' => 'Industri Kecil dan Menengah:', 'sifat' => 'B'],

            // Bawah PI.04
            ['parent_id' => $pi_4, 'kode' => 'PI.04.01', 'nama' => 'Industri Manufaktur:', 'sifat' => 'B'],
            ['parent_id' => $pi_4, 'kode' => 'PI.04.02', 'nama' => 'Industri Agro:', 'sifat' => 'B'],
            ['parent_id' => $pi_4, 'kode' => 'PI.04.03', 'nama' => 'Industri Unggulan Berbasis Teknologi Tinggi:', 'sifat' => 'B'],
            ['parent_id' => $pi_4, 'kode' => 'PI.04.04', 'nama' => 'Industri Kecil dan Menengah:', 'sifat' => 'B'],

            // Bawah PI.05 (Industri Hijau)
            ['parent_id' => $pi_5_hijau, 'kode' => 'PI.05.01', 'nama' => 'Industri Manufaktur:', 'sifat' => 'B'],
            ['parent_id' => $pi_5_hijau, 'kode' => 'PI.05.02', 'nama' => 'Industri Agro:', 'sifat' => 'B'],
            ['parent_id' => $pi_5_hijau, 'kode' => 'PI.05.03', 'nama' => 'Industri Unggulan Berbasis Teknologi Tinggi:', 'sifat' => 'B'],
            ['parent_id' => $pi_5_hijau, 'kode' => 'PI.05.04', 'nama' => 'Industri Kecil dan Menengah:', 'sifat' => 'B'],

            // Bawah PI.05 (Analisis Industri Unggulan)
            ['parent_id' => $pi_5_analisis, 'kode' => 'PI.05.01', 'nama' => 'Kerjasama Industri Unggulan Provinsi:', 'sifat' => 'B'],

            // Bawah PI.06
            ['parent_id' => $pi_6, 'kode' => 'PI.06.01', 'nama' => 'Kerjasama Industri Unggulan Provinsi:', 'sifat' => 'B'],
            ['parent_id' => $pi_6, 'kode' => 'PI.06.02', 'nama' => 'Kerja sama Industri Unggulan Daerah Kabupaten/Kota:', 'sifat' => 'B'],

            // Bawah PI.07
            ['parent_id' => $pi_7, 'kode' => 'PI.07.01', 'nama' => 'Kawasan Industri Wilayah Industri I.', 'sifat' => 'B'],
            ['parent_id' => $pi_7, 'kode' => 'PI.07.02', 'nama' => 'Kawasan Industri Wilayah Industri II.', 'sifat' => 'B'],
            ['parent_id' => $pi_7, 'kode' => 'PI.07.03', 'nama' => 'Kawasan Industri Wilayah Industri III.', 'sifat' => 'B'],

            // Bawah PI.08
            ['parent_id' => $pi_8, 'kode' => 'PI.08.01', 'nama' => 'Kawasan Industri Wilayah Industri I.', 'sifat' => 'B'],
            ['parent_id' => $pi_8, 'kode' => 'PI.08.02', 'nama' => 'Kawasan Industri Wilayah Industri II.', 'sifat' => 'B'],
            ['parent_id' => $pi_8, 'kode' => 'PI.08.03', 'nama' => 'Kawasan Industri Wilayah Industri III.', 'sifat' => 'B'],

            // Bawah PI.09
            ['parent_id' => $pi_9, 'kode' => 'PI.09.01', 'nama' => 'Kerjasama Industri Internasional Wilayah I (Amerika, Eropa, Timur Tengah,Dan Fora Multilateral).', 'sifat' => 'B'],
            ['parent_id' => $pi_9, 'kode' => 'PI.09.02', 'nama' => 'Kerjasama Industri Internasional Wilayah Asia Timur, Asia Barat, Asia Selatan, Pasifik, Australia, Afrika, Dan Fora Regional:', 'sifat' => 'B'],
            ['parent_id' => $pi_9, 'kode' => 'PI.09.03', 'nama' => 'Ketahanan Industri:', 'sifat' => 'B'],

            // Bawah PI.10
            ['parent_id' => $pi_10, 'kode' => 'PI.10.01', 'nama' => 'Standar:', 'sifat' => 'B'],
            ['parent_id' => $pi_10, 'kode' => 'PI.10.02', 'nama' => 'Penyiapan Penerapan:', 'sifat' => 'B'],
            ['parent_id' => $pi_10, 'kode' => 'PI.10.03', 'nama' => 'Infrastruktur Standar:', 'sifat' => 'B'],

            // Bawah PI.11
            ['parent_id' => $pi_11, 'kode' => 'PI.11.01', 'nama' => 'Kebijakan Industri:', 'sifat' => 'B'],
            ['parent_id' => $pi_11, 'kode' => 'PI.11.02', 'nama' => 'Perpajakan dan Tarif:', 'sifat' => 'B'],
            ['parent_id' => $pi_11, 'kode' => 'PI.11.03', 'nama' => 'Pengembangan Model Industrial:', 'sifat' => 'B'],

            // Bawah PI.12
            ['parent_id' => $pi_12, 'kode' => 'PI.12.01', 'nama' => 'Industri Hijau:', 'sifat' => 'B'],
            ['parent_id' => $pi_12, 'kode' => 'PI.12.02', 'nama' => 'Lingkungan Hidup:', 'sifat' => 'B'],
            ['parent_id' => $pi_12, 'kode' => 'PI.12.03', 'nama' => 'Energi:', 'sifat' => 'B'],

            // Bawah PI.13
            ['parent_id' => $pi_13, 'kode' => 'PI.13.01', 'nama' => 'Pengkajian dan Penerapan Kebijakan Teknologi Industri:', 'sifat' => 'B'],
            ['parent_id' => $pi_13, 'kode' => 'PI.13.02', 'nama' => 'Pengkajian dan Penerapan Inovasi Teknologi Industri:', 'sifat' => 'B'],
            ['parent_id' => $pi_13, 'kode' => 'PI.13.03', 'nama' => 'Pengembangan Hak Kekayaan Intelektual:', 'sifat' => 'B'],
        ]);

        // ==============================================================================
        // MENGAMBIL ID LEVEL 3 UNTUK MEMASUKAN LEVEL CICIT (LEVEL 4)
        // ==============================================================================
        
        // Ambil ID anak PI.01 sampai PI.05 (Hanya yang punya turunan level 4)
        $pi_1_1 = DB::table('klasifikasis')->where('parent_id', $pi_1)->where('kode', 'PI.01.01')->value('id');
        $pi_1_2 = DB::table('klasifikasis')->where('parent_id', $pi_1)->where('kode', 'PI.01.02')->value('id');
        $pi_1_3 = DB::table('klasifikasis')->where('parent_id', $pi_1)->where('kode', 'PI.01.03')->value('id');
        $pi_1_4 = DB::table('klasifikasis')->where('parent_id', $pi_1)->where('kode', 'PI.01.04')->value('id');

        $pi_2_1 = DB::table('klasifikasis')->where('parent_id', $pi_2)->where('kode', 'PI.02.01')->value('id');
        $pi_2_2 = DB::table('klasifikasis')->where('parent_id', $pi_2)->where('kode', 'PI.02.02')->value('id');
        $pi_2_3 = DB::table('klasifikasis')->where('parent_id', $pi_2)->where('kode', 'PI.02.03')->value('id');
        $pi_2_4 = DB::table('klasifikasis')->where('parent_id', $pi_2)->where('kode', 'PI.02.04')->value('id');

        $pi_3_1 = DB::table('klasifikasis')->where('parent_id', $pi_3)->where('kode', 'PI.03.01')->value('id');
        $pi_3_2 = DB::table('klasifikasis')->where('parent_id', $pi_3)->where('kode', 'PI.03.02')->value('id');
        $pi_3_3 = DB::table('klasifikasis')->where('parent_id', $pi_3)->where('kode', 'PI.03.03')->value('id');
        $pi_3_4 = DB::table('klasifikasis')->where('parent_id', $pi_3)->where('kode', 'PI.03.04')->value('id');

        $pi_4_1 = DB::table('klasifikasis')->where('parent_id', $pi_4)->where('kode', 'PI.04.01')->value('id');
        $pi_4_2 = DB::table('klasifikasis')->where('parent_id', $pi_4)->where('kode', 'PI.04.02')->value('id');
        $pi_4_3 = DB::table('klasifikasis')->where('parent_id', $pi_4)->where('kode', 'PI.04.03')->value('id');
        $pi_4_4 = DB::table('klasifikasis')->where('parent_id', $pi_4)->where('kode', 'PI.04.04')->value('id');

        $pi_5_hijau_1 = DB::table('klasifikasis')->where('parent_id', $pi_5_hijau)->where('kode', 'PI.05.01')->value('id');
        $pi_5_hijau_2 = DB::table('klasifikasis')->where('parent_id', $pi_5_hijau)->where('kode', 'PI.05.02')->value('id');
        $pi_5_hijau_3 = DB::table('klasifikasis')->where('parent_id', $pi_5_hijau)->where('kode', 'PI.05.03')->value('id');
        $pi_5_hijau_4 = DB::table('klasifikasis')->where('parent_id', $pi_5_hijau)->where('kode', 'PI.05.04')->value('id');

        $pi_5_analisis_1 = DB::table('klasifikasis')->where('parent_id', $pi_5_analisis)->where('kode', 'PI.05.01')->value('id');

        $pi_6_1 = DB::table('klasifikasis')->where('parent_id', $pi_6)->where('kode', 'PI.06.01')->value('id');
        $pi_6_2 = DB::table('klasifikasis')->where('parent_id', $pi_6)->where('kode', 'PI.06.02')->value('id');

        $pi_9_1 = DB::table('klasifikasis')->where('parent_id', $pi_9)->where('kode', 'PI.09.01')->value('id');
        $pi_9_2 = DB::table('klasifikasis')->where('parent_id', $pi_9)->where('kode', 'PI.09.02')->value('id');
        $pi_9_3 = DB::table('klasifikasis')->where('parent_id', $pi_9)->where('kode', 'PI.09.03')->value('id');

        $pi_10_1 = DB::table('klasifikasis')->where('parent_id', $pi_10)->where('kode', 'PI.10.01')->value('id');
        $pi_10_2 = DB::table('klasifikasis')->where('parent_id', $pi_10)->where('kode', 'PI.10.02')->value('id');
        $pi_10_3 = DB::table('klasifikasis')->where('parent_id', $pi_10)->where('kode', 'PI.10.03')->value('id');

        $pi_11_1 = DB::table('klasifikasis')->where('parent_id', $pi_11)->where('kode', 'PI.11.01')->value('id');
        $pi_11_2 = DB::table('klasifikasis')->where('parent_id', $pi_11)->where('kode', 'PI.11.02')->value('id');
        $pi_11_3 = DB::table('klasifikasis')->where('parent_id', $pi_11)->where('kode', 'PI.11.03')->value('id');

        $pi_12_1 = DB::table('klasifikasis')->where('parent_id', $pi_12)->where('kode', 'PI.12.01')->value('id');
        $pi_12_2 = DB::table('klasifikasis')->where('parent_id', $pi_12)->where('kode', 'PI.12.02')->value('id');
        $pi_12_3 = DB::table('klasifikasis')->where('parent_id', $pi_12)->where('kode', 'PI.12.03')->value('id');

        $pi_13_1 = DB::table('klasifikasis')->where('parent_id', $pi_13)->where('kode', 'PI.13.01')->value('id');
        $pi_13_2 = DB::table('klasifikasis')->where('parent_id', $pi_13)->where('kode', 'PI.13.02')->value('id');
        $pi_13_3 = DB::table('klasifikasis')->where('parent_id', $pi_13)->where('kode', 'PI.13.03')->value('id');

        // --- LEVEL CICIT (Level 4) ---
        // Biar efisien, format sub anak (01, 02, 03, 04) ini sama untuk PI.01 sampai PI.05 (Hijau).
        $sub_manufaktur = [
            ['kode' => '01', 'nama' => 'Industri Material Logam (Logam Besi, Logam Bukan Besi, dan Logam Lainnya).'],
            ['kode' => '02', 'nama' => 'Industri Kimia Dasar (Anorganik Dasar, Organik dasar, dan dasar lainnya).'],
            ['kode' => '03', 'nama' => 'Industri Kimia Hilir (Kimia Anorganik, Organik, dan Kimia hilir lainnya).'],
            ['kode' => '04', 'nama' => 'Industri Tekstil dan Aneka (Tekstil, Pakaian jadi, tekstil lainnya, alas kaki, kulit, dan aneka).'],
        ];
        $sub_agro = [
            ['kode' => '01', 'nama' => 'Industri Hasil Hutan dan Perkebunan.'],
            ['kode' => '02', 'nama' => 'Industri Makanan, Hasil Laut, Dan Perikanan.'],
            ['kode' => '03', 'nama' => 'Industri Minuman dan Tembakau.'],
        ];
        $sub_tinggi = [
            ['kode' => '01', 'nama' => 'Alat Transportasi Darat.'],
            ['kode' => '02', 'nama' => 'Industri Maritim, Kedirgantaraan, dan Alat Pertahanan.'],
            ['kode' => '03', 'nama' => 'Elektronika dan Telematika.'],
            ['kode' => '04', 'nama' => 'Permesinan dan Alat Mesin Pertanian.'],
        ];
        $sub_ukm = [
            ['kode' => '01', 'nama' => 'Industri Pangan, Kimia dan Bahan Bangunan.'],
            ['kode' => '02', 'nama' => 'Industri Kerajinan dan Sandang.'],
            ['kode' => '03', 'nama' => 'Industri Produk Logam, Alat Angkut dan Kreatif Telematika.'],
        ];

        $parents_manufaktur = ['PI.01.01' => $pi_1_1, 'PI.02.01' => $pi_2_1, 'PI.03.01' => $pi_3_1, 'PI.04.01' => $pi_4_1, 'PI.05.01' => $pi_5_hijau_1];
        $parents_agro = ['PI.01.02' => $pi_1_2, 'PI.02.02' => $pi_2_2, 'PI.03.02' => $pi_3_2, 'PI.04.02' => $pi_4_2, 'PI.05.02' => $pi_5_hijau_2];
        $parents_tinggi = ['PI.01.03' => $pi_1_3, 'PI.02.03' => $pi_2_3, 'PI.03.03' => $pi_3_3, 'PI.04.03' => $pi_4_3, 'PI.05.03' => $pi_5_hijau_3];
        $parents_ukm = ['PI.01.04' => $pi_1_4, 'PI.02.04' => $pi_2_4, 'PI.03.04' => $pi_3_4, 'PI.04.04' => $pi_4_4, 'PI.05.04' => $pi_5_hijau_4];

        foreach($parents_manufaktur as $parent_kode => $p_id) {
            foreach($sub_manufaktur as $sub) DB::table('klasifikasis')->insertOrIgnore(['parent_id' => $p_id, 'kode' => $parent_kode.'.'.$sub['kode'], 'nama' => $sub['nama'], 'sifat' => 'B']);
        }
        foreach($parents_agro as $parent_kode => $p_id) {
            foreach($sub_agro as $sub) DB::table('klasifikasis')->insertOrIgnore(['parent_id' => $p_id, 'kode' => $parent_kode.'.'.$sub['kode'], 'nama' => $sub['nama'], 'sifat' => 'B']);
        }
        foreach($parents_tinggi as $parent_kode => $p_id) {
            foreach($sub_tinggi as $sub) DB::table('klasifikasis')->insertOrIgnore(['parent_id' => $p_id, 'kode' => $parent_kode.'.'.$sub['kode'], 'nama' => $sub['nama'], 'sifat' => 'B']);
        }
        foreach($parents_ukm as $parent_kode => $p_id) {
            foreach($sub_ukm as $sub) DB::table('klasifikasis')->insertOrIgnore(['parent_id' => $p_id, 'kode' => $parent_kode.'.'.$sub['kode'], 'nama' => $sub['nama'], 'sifat' => 'B']);
        }

        // --- SISA LEVEL CICIT LAINNYA (Mulai dari PI.05 Analisis Industri) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah PI.05.01 (Analisis Industri Unggulan)
            ['parent_id' => $pi_5_analisis_1, 'kode' => 'PI.05.01.01', 'nama' => 'Kerjasama Industri Unggulan Provinsi Wilayah Industri I.', 'sifat' => 'B'],
            ['parent_id' => $pi_5_analisis_1, 'kode' => 'PI.05.01.02', 'nama' => 'Kerjasama Industri Unggulan Provinsi Wilayah Industri II.', 'sifat' => 'B'],
            ['parent_id' => $pi_5_analisis_1, 'kode' => 'PI.05.01.03', 'nama' => 'Kerjasama Industri Unggulan Provinsi Wilayah Industri III.', 'sifat' => 'B'],

            // Bawah PI.06.01
            ['parent_id' => $pi_6_1, 'kode' => 'PI.06.01.01', 'nama' => 'Kerjasama Industri Unggulan Provinsi Wilayah Industri I.', 'sifat' => 'B'],
            ['parent_id' => $pi_6_1, 'kode' => 'PI.06.01.02', 'nama' => 'Kerjasama Industri Unggulan Provinsi Wilayah Industri II.', 'sifat' => 'B'],
            ['parent_id' => $pi_6_1, 'kode' => 'PI.06.01.03', 'nama' => 'Kerjasama Industri Unggulan Provinsi Wilayah Industri III.', 'sifat' => 'B'],

            // Bawah PI.06.02
            ['parent_id' => $pi_6_2, 'kode' => 'PI.06.02.01', 'nama' => 'Kerja sama Industri Unggulan Daerah Kabupaten/Kota Wilayah Industri I.', 'sifat' => 'B'],
            ['parent_id' => $pi_6_2, 'kode' => 'PI.06.02.02', 'nama' => 'Kerjasama Industri Unggulan Daerah Kabupaten/Kota Wilayah Industri II.', 'sifat' => 'B'],
            ['parent_id' => $pi_6_2, 'kode' => 'PI.06.02.03', 'nama' => 'Kerjasama Industri Unggulan Kabupaten/Kota Wilayah Industri III.', 'sifat' => 'B'],

            // Bawah PI.09.01
            ['parent_id' => $pi_9_1, 'kode' => 'PI.09.01.01', 'nama' => 'Akses Industri Wilayah Amerika.', 'sifat' => 'B'],
            ['parent_id' => $pi_9_1, 'kode' => 'PI.09.01.02', 'nama' => 'Akses Industri Wilayah Eropa dan Timur Tengah.', 'sifat' => 'B'],
            ['parent_id' => $pi_9_1, 'kode' => 'PI.09.01.03', 'nama' => 'Kerjasama Teknik dan Promosi Industri Wilayah Amerika.', 'sifat' => 'B'],
            ['parent_id' => $pi_9_1, 'kode' => 'PI.09.01.04', 'nama' => 'Kerjasama Teknik dan Promosi Industri Wilayah Eropa dan Timur Tengah.', 'sifat' => 'B'],
            ['parent_id' => $pi_9_1, 'kode' => 'PI.09.01.05', 'nama' => 'Kerjasama Multilateral dengan WTO dan Organisasi Komoditas.', 'sifat' => 'B'],
            ['parent_id' => $pi_9_1, 'kode' => 'PI.09.01.06', 'nama' => 'Fora Multilateral Lainnya.', 'sifat' => 'B'],

            // Bawah PI.09.02
            ['parent_id' => $pi_9_2, 'kode' => 'PI.09.02.01', 'nama' => 'Akses Industri Wilayah Asia Timur, Pasifik dan Australia.', 'sifat' => 'B'],
            ['parent_id' => $pi_9_2, 'kode' => 'PI.09.02.02', 'nama' => 'Akses Industri Wilayah Asia Barat, Asia Selatan, dan Afrika.', 'sifat' => 'B'],
            ['parent_id' => $pi_9_2, 'kode' => 'PI.09.02.03', 'nama' => 'Kerjasama Teknik dan Promosi Industri Wilayah Asia Timur, Pasifik dan Australia.', 'sifat' => 'B'],
            ['parent_id' => $pi_9_2, 'kode' => 'PI.09.02.04', 'nama' => 'Kerjasama Teknik dan Promosi Industri Wilayah Asia Barat, Asia Selatan, dan Afrika.', 'sifat' => 'B'],
            ['parent_id' => $pi_9_2, 'kode' => 'PI.09.02.05', 'nama' => 'Kerjasama Regional APEC dan Regional Lainnya.', 'sifat' => 'B'],
            ['parent_id' => $pi_9_2, 'kode' => 'PI.09.02.06', 'nama' => 'Kerjasama Regional ASEAN dan Mitra Dialog.', 'sifat' => 'B'],

            // Bawah PI.09.03
            ['parent_id' => $pi_9_3, 'kode' => 'PI.09.03.01', 'nama' => 'Penanganan Hambatan Industri Wilayah I (Amerika, Eropa, Timur Tengah, dan Fora Multilateral).', 'sifat' => 'B'],
            ['parent_id' => $pi_9_3, 'kode' => 'PI.09.03.02', 'nama' => 'Penanganan Hambatan Industri Wilayah II (Asia Timur, Asia Barat, Asia Selatan, Pasifik, Australia, Afrika, dan Fora Multilateral).', 'sifat' => 'B'],
            ['parent_id' => $pi_9_3, 'kode' => 'PI.09.03.03', 'nama' => 'Pengamanan Basis Industri Manufaktur.', 'sifat' => 'B'],
            ['parent_id' => $pi_9_3, 'kode' => 'PI.09.03.04', 'nama' => 'Pengamanan Industri Unggulan Berbasis Teknologi Tinggi.', 'sifat' => 'B'],
            ['parent_id' => $pi_9_3, 'kode' => 'PI.09.03.05', 'nama' => 'Pengamanan Industri Agro.', 'sifat' => 'B'],
            ['parent_id' => $pi_9_3, 'kode' => 'PI.09.03.06', 'nama' => 'Pengamanan Industri Kecil dan Menengah.', 'sifat' => 'B'],

            // Bawah PI.10.01
            ['parent_id' => $pi_10_1, 'kode' => 'PI.10.01.01', 'nama' => 'Standar Industri Manufaktur.', 'sifat' => 'B'],
            ['parent_id' => $pi_10_1, 'kode' => 'PI.10.01.02', 'nama' => 'Standar Industri Agro dan Teknologi Tinggi.', 'sifat' => 'B'],
            // Bawah PI.10.02
            ['parent_id' => $pi_10_2, 'kode' => 'PI.10.02.01', 'nama' => 'Penyiapan Penerapan Standar.', 'sifat' => 'B'],
            ['parent_id' => $pi_10_2, 'kode' => 'PI.10.02.02', 'nama' => 'Kerja sama Standarisasi.', 'sifat' => 'B'],
            // Bawah PI.10.03
            ['parent_id' => $pi_10_3, 'kode' => 'PI.10.03.01', 'nama' => 'Pengembangan Infrastruktur Standar.', 'sifat' => 'B'],
            ['parent_id' => $pi_10_3, 'kode' => 'PI.10.03.02', 'nama' => 'Pengawasan Lembaga Penilaian Kesuaian.', 'sifat' => 'B'],

            // Bawah PI.11.01
            ['parent_id' => $pi_11_1, 'kode' => 'PI.11.01.01', 'nama' => 'Kebijakan Sektoral.', 'sifat' => 'B'],
            ['parent_id' => $pi_11_1, 'kode' => 'PI.11.01.02', 'nama' => 'Kebijakan Kewilayahan.', 'sifat' => 'B'],
            // Bawah PI.11.02
            ['parent_id' => $pi_11_2, 'kode' => 'PI.11.02.01', 'nama' => 'Perpajakan dan Tarif.', 'sifat' => 'B'],
            ['parent_id' => $pi_11_2, 'kode' => 'PI.11.02.02', 'nama' => 'Tarif dan Non Tarif.', 'sifat' => 'B'],
            // Bawah PI.11.03
            ['parent_id' => $pi_11_3, 'kode' => 'PI.11.03.01', 'nama' => 'Pemrograman Model.', 'sifat' => 'B'],
            ['parent_id' => $pi_11_3, 'kode' => 'PI.11.03.02', 'nama' => 'Aplikasi Model.', 'sifat' => 'B'],

            // Bawah PI.12.01
            ['parent_id' => $pi_12_1, 'kode' => 'PI.12.01.01', 'nama' => 'Pengembangan Industri Hijau.', 'sifat' => 'B'],
            ['parent_id' => $pi_12_1, 'kode' => 'PI.12.01.02', 'nama' => 'Kerja Sama Industri Hijau.', 'sifat' => 'B'],
            // Bawah PI.12.02
            ['parent_id' => $pi_12_2, 'kode' => 'PI.12.02.01', 'nama' => 'Lingkungan Global.', 'sifat' => 'B'],
            ['parent_id' => $pi_12_2, 'kode' => 'PI.12.02.02', 'nama' => 'Pengendalian Lingkungan Hidup.', 'sifat' => 'B'],
            // Bawah PI.12.03
            ['parent_id' => $pi_12_3, 'kode' => 'PI.12.03.01', 'nama' => 'Konservasi Energi.', 'sifat' => 'B'],
            ['parent_id' => $pi_12_3, 'kode' => 'PI.12.03.02', 'nama' => 'Diversifikasi Energi.', 'sifat' => 'B'],

            // Bawah PI.13.01
            ['parent_id' => $pi_13_1, 'kode' => 'PI.13.01.01', 'nama' => 'Pengkajian Kebijakan Teknologi Industri.', 'sifat' => 'B'],
            ['parent_id' => $pi_13_1, 'kode' => 'PI.13.01.02', 'nama' => 'Penerapan Kebijakan Teknologi Industri.', 'sifat' => 'B'],
            // Bawah PI.13.02
            ['parent_id' => $pi_13_2, 'kode' => 'PI.13.02.01', 'nama' => 'Pengkajian Inovasi Teknologi Industri.', 'sifat' => 'B'],
            ['parent_id' => $pi_13_2, 'kode' => 'PI.13.02.02', 'nama' => 'Penerapan Inovasi Teknologi Industri.', 'sifat' => 'B'],
            // Bawah PI.13.03
            ['parent_id' => $pi_13_3, 'kode' => 'PI.13.03.01', 'nama' => 'Fasilitasi Hak Kekayaan Intelektual.', 'sifat' => 'B'],
            ['parent_id' => $pi_13_3, 'kode' => 'PI.13.03.02', 'nama' => 'Komersialisasi Hak Kekayaan Intelektual.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: PERIKANAN DAN KELAUTAN (PI, IB, PPI, KL, PSDK)
        // ==============================================================================
        
        // Ambil ID Parent Utama (Khusus PI, dicari yang namanya Perikanan Tangkap biar gak bentrok sama Perindustrian)
        $id_pi_tangkap = DB::table('klasifikasis')->where('kode', 'PI')->where('nama', 'like', '%Perikanan Tangkap%')->value('id');
        $id_ib = DB::table('klasifikasis')->where('kode', 'IB')->value('id');
        $id_ppi = DB::table('klasifikasis')->where('kode', 'PPI')->value('id');
        $id_kl = DB::table('klasifikasis')->where('kode', 'KL')->value('id');
        $id_psdk = DB::table('klasifikasis')->where('kode', 'PSDK')->value('id');

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // PI: Perikanan Tangkap
            ['parent_id' => $id_pi_tangkap, 'kode' => 'PI.01', 'nama' => 'Sumber Daya Ikan:', 'sifat' => 'B'],
            ['parent_id' => $id_pi_tangkap, 'kode' => 'PI.02', 'nama' => 'Pelabuhan Perikanan:', 'sifat' => 'B'],
            ['parent_id' => $id_pi_tangkap, 'kode' => 'PI.03', 'nama' => 'Kapal Perikanan dan Alat Penangkap Ikan:', 'sifat' => 'B'],
            ['parent_id' => $id_pi_tangkap, 'kode' => 'PI.04', 'nama' => 'Pelayanan Usaha Penangkapan Ikan:', 'sifat' => 'B'],
            ['parent_id' => $id_pi_tangkap, 'kode' => 'PI.05', 'nama' => 'Pengembangan Usaha Penangkapan:', 'sifat' => 'B'],

            // IB: Perikanan Budidaya
            ['parent_id' => $id_ib, 'kode' => 'IB.01', 'nama' => 'Prasarana dan Sarana Budidaya:', 'sifat' => 'B'],
            ['parent_id' => $id_ib, 'kode' => 'IB.02', 'nama' => 'Perbenihan:', 'sifat' => 'B'],
            ['parent_id' => $id_ib, 'kode' => 'IB.03', 'nama' => 'Produksi:', 'sifat' => 'B'],
            ['parent_id' => $id_ib, 'kode' => 'IB.04', 'nama' => 'Kesehatan Ikan dan Lingkungan:', 'sifat' => 'B'],
            ['parent_id' => $id_ib, 'kode' => 'IB.05', 'nama' => 'Usaha Budidaya:', 'sifat' => 'B'],

            // PPI: Pengolahan dan Pemasaran Hasil Perikanan
            ['parent_id' => $id_ppi, 'kode' => 'PPI.01', 'nama' => 'Pengolahan Hasil:', 'sifat' => 'B'],
            ['parent_id' => $id_ppi, 'kode' => 'PPI.02', 'nama' => 'Pengembangan Produk Non Konsumsi:', 'sifat' => 'B'],
            ['parent_id' => $id_ppi, 'kode' => 'PPI.03', 'nama' => 'Pemasaran Dalam Negeri:', 'sifat' => 'B'],
            ['parent_id' => $id_ppi, 'kode' => 'PPI.04', 'nama' => 'Pemasaran Luar Negeri:', 'sifat' => 'B'],
            ['parent_id' => $id_ppi, 'kode' => 'PPI.05', 'nama' => 'Usaha dan investasi:', 'sifat' => 'B'],

            // KL: Kelautan, Pesisir, dan Pulau-Pulau Kecil
            ['parent_id' => $id_kl, 'kode' => 'KL.01', 'nama' => 'Tata Ruang Laut, Pesisir, dan Pulau-Pulau Kecil:', 'sifat' => 'B'],
            ['parent_id' => $id_kl, 'kode' => 'KL.02', 'nama' => 'Konservasi Kawasan dan Jenis Ikan:', 'sifat' => 'B'],
            ['parent_id' => $id_kl, 'kode' => 'KL.03', 'nama' => 'Pesisir dan Lautan:', 'sifat' => 'B'],
            ['parent_id' => $id_kl, 'kode' => 'KL.05', 'nama' => 'Pemberdayaan Masyarakat Pesisir dan Pengembangan Usaha:', 'sifat' => 'B'], // Loncat ke 05 sesuai foto

            // PSDK: Pengawasan Sumber Daya Kelautan dan Perikanan
            ['parent_id' => $id_psdk, 'kode' => 'PSDK.01', 'nama' => 'Pengawasan Sumber Daya Perikanan:', 'sifat' => 'B'],
            ['parent_id' => $id_psdk, 'kode' => 'PSDK.02', 'nama' => 'Pengawasan Sumber Daya Kelautan:', 'sifat' => 'B'],
            ['parent_id' => $id_psdk, 'kode' => 'PSDK.03', 'nama' => 'Kapal Pengawas:', 'sifat' => 'B'],
            ['parent_id' => $id_psdk, 'kode' => 'PSDK.04', 'nama' => 'Pemantauan Sumber Daya Kelautan dan Perikanan dan Pengembangan Infrastruktur:', 'sifat' => 'B'],
            ['parent_id' => $id_psdk, 'kode' => 'PSDK.05', 'nama' => 'Penanganan pelanggaran:', 'sifat' => 'B'],
        ]);

        // Mengambil ID Level 2 dengan hati-hati (menggunakan parent_id agar akurat)
        $pi_t_1 = DB::table('klasifikasis')->where('parent_id', $id_pi_tangkap)->where('kode', 'PI.01')->value('id');
        $pi_t_2 = DB::table('klasifikasis')->where('parent_id', $id_pi_tangkap)->where('kode', 'PI.02')->value('id');
        $pi_t_3 = DB::table('klasifikasis')->where('parent_id', $id_pi_tangkap)->where('kode', 'PI.03')->value('id');
        $pi_t_4 = DB::table('klasifikasis')->where('parent_id', $id_pi_tangkap)->where('kode', 'PI.04')->value('id');
        $pi_t_5 = DB::table('klasifikasis')->where('parent_id', $id_pi_tangkap)->where('kode', 'PI.05')->value('id');

        $ib_1 = DB::table('klasifikasis')->where('kode', 'IB.01')->value('id');
        $ib_2 = DB::table('klasifikasis')->where('kode', 'IB.02')->value('id');
        $ib_3 = DB::table('klasifikasis')->where('kode', 'IB.03')->value('id');
        $ib_4 = DB::table('klasifikasis')->where('kode', 'IB.04')->value('id');
        $ib_5 = DB::table('klasifikasis')->where('kode', 'IB.05')->value('id');

        $ppi_1 = DB::table('klasifikasis')->where('kode', 'PPI.01')->value('id');
        $ppi_2 = DB::table('klasifikasis')->where('kode', 'PPI.02')->value('id');
        $ppi_3 = DB::table('klasifikasis')->where('kode', 'PPI.03')->value('id');
        $ppi_4 = DB::table('klasifikasis')->where('kode', 'PPI.04')->value('id');
        $ppi_5 = DB::table('klasifikasis')->where('kode', 'PPI.05')->value('id');

        $kl_1 = DB::table('klasifikasis')->where('kode', 'KL.01')->value('id');
        $kl_2 = DB::table('klasifikasis')->where('kode', 'KL.02')->value('id');
        $kl_3 = DB::table('klasifikasis')->where('kode', 'KL.03')->value('id');
        $kl_5 = DB::table('klasifikasis')->where('kode', 'KL.05')->value('id');

        $psdk_1 = DB::table('klasifikasis')->where('kode', 'PSDK.01')->value('id');
        $psdk_2 = DB::table('klasifikasis')->where('kode', 'PSDK.02')->value('id');
        $psdk_3 = DB::table('klasifikasis')->where('kode', 'PSDK.03')->value('id');
        $psdk_4 = DB::table('klasifikasis')->where('kode', 'PSDK.04')->value('id');
        $psdk_5 = DB::table('klasifikasis')->where('kode', 'PSDK.05')->value('id');

        // --- LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah PI.01 (Perikanan Tangkap)
            ['parent_id' => $pi_t_1, 'kode' => 'PI.01.01', 'nama' => 'Data dan Statistik Perikanan Tangkap (pengumpulan dan pengolahan, analisis dan penyajian).', 'sifat' => 'B'],
            ['parent_id' => $pi_t_1, 'kode' => 'PI.01.02', 'nama' => 'Sumber Daya Ikan Perairan Umum Pemulihan sumber daya ikan perairan umum, tata kelola sumber daya ikan laut teritorial dan perairan.', 'sifat' => 'B'],
            ['parent_id' => $pi_t_1, 'kode' => 'PI.01.03', 'nama' => 'Sumber Daya Ikan Laut Teritorial dan Perairan Kepulauan (pemulihan sumber daya ikan laut teritorial dan perairan, tata kelola sumber daya ikan laut teritorial dan perairan kepulauan).', 'sifat' => 'B'],
            ['parent_id' => $pi_t_1, 'kode' => 'PI.01.04', 'nama' => 'Sumber Daya Ikan Zona Ekonomi Ekslusif Indonesia dan Laut Lepas.', 'sifat' => 'B'],
            ['parent_id' => $pi_t_1, 'kode' => 'PI.01.05', 'nama' => 'Evaluasi Pengelolaan Sumber Daya Ikan (Evaluasi pengelolaan data sumber daya ikan, analisis pengelolaan sumber daya ikan).', 'sifat' => 'B'],

            // Bawah PI.02
            ['parent_id' => $pi_t_2, 'kode' => 'PI.02.01', 'nama' => 'Identifikasi dan Penyiapan Pelabuhan Perikanan (identifikasi dan analisis, penyiapan bangunan).', 'sifat' => 'B'],
            ['parent_id' => $pi_t_2, 'kode' => 'PI.02.02', 'nama' => 'Tata Operasional Pelabuhan Perikanan (tata laksana pelabuhan perikanan, pengusahaan dan pelayanan).', 'sifat' => 'B'],
            ['parent_id' => $pi_t_2, 'kode' => 'PI.02.03', 'nama' => 'Pengendalian Pembangunan Pelabuhan Perikanan (bimbingan pembangunan PPS, PPN, dan PPP, bimbingan pembangunan PPI dan Pelabuhan swasta).', 'sifat' => 'B'],
            ['parent_id' => $pi_t_2, 'kode' => 'PI.02.04', 'nama' => 'Kesyahbandaran Pelabuhan Perikanan (tata laksana dan sarana, keselamatan pelayaran).', 'sifat' => 'B'],
            ['parent_id' => $pi_t_2, 'kode' => 'PI.02.05', 'nama' => 'Pemantauan dan Evaluasi Pelabuhan Perikanan (pemantauan dan evaluasi PPS, PPN, dan PPP, pemantauan dan evaluasi PPI dan peabuhan swasta).', 'sifat' => 'B'], // Typo asli peabuhan

            // Bawah PI.03
            ['parent_id' => $pi_t_3, 'kode' => 'PI.03.01', 'nama' => 'Rancang Bangun dan Kelaikan Kapal Perikanan rancang bangun kapal perikanan, kelaikan kapal perikanan.', 'sifat' => 'B'],
            ['parent_id' => $pi_t_3, 'kode' => 'PI.03.02', 'nama' => 'Rancang Bangun dan Kelaikan Alat Penangkapan Ikan.', 'sifat' => 'B'],
            ['parent_id' => $pi_t_3, 'kode' => 'PI.03.03', 'nama' => 'Pendaftaran Kapal Perikanan (identifikasi dan pengukuran, pencatatan dan dokumentasi).', 'sifat' => 'B'],
            ['parent_id' => $pi_t_3, 'kode' => 'PI.03.04', 'nama' => 'Pengawakan Kapal dan Ketenagakerjaan Perikanan.', 'sifat' => 'B'],
            ['parent_id' => $pi_t_3, 'kode' => 'PI.03.05', 'nama' => 'Pemantauan dan Evaluasi Kapal Perikanan dan Alat Penangkapan Ikan dan pelaporan.', 'sifat' => 'B'],

            // Bawah PI.04
            ['parent_id' => $pi_t_4, 'kode' => 'PI.04.01', 'nama' => 'Alokasi Usaha Penangkapan Ikan (verifikasi alokasi usaha penangkapan ikan, pelayanan alokasi usaha penangkapan ikan).', 'sifat' => 'B'],
            ['parent_id' => $pi_t_4, 'kode' => 'PI.04.02', 'nama' => 'Tata Pengusahaan Penangkapan Ikan (verifikasi pengusahaan penangkapan ikan, administrasi pengusahaan penangkapan ikan).', 'sifat' => 'B'],
            ['parent_id' => $pi_t_4, 'kode' => 'PI.04.03', 'nama' => 'Verifikasi Dokumen Penangkapan Ikan (verifikasi dokumen penangkapan ikan perusahaan berbadan hukum , verifikasi dokumen penangkapan ikan perusahaan perorangan dan koperasi, pemantauan dan evaluasi pelayanan usaha penangkapan ikan, pemantauan pelayanan usaha penangkapan ikan, evaluasi pelayanan usaha penangkapan ikan).', 'sifat' => 'B'],
            ['parent_id' => $pi_t_4, 'kode' => 'PI.04.04', 'nama' => 'Pelayanan Dokumen Penangkapan Ikan (pemantauan pelayanan usaha penangkapan ikan, evaluasi pelayanan usaha penangkapan ikan).', 'sifat' => 'B'],
            ['parent_id' => $pi_t_4, 'kode' => 'PI.04.05', 'nama' => 'Pemantauan dan evaluasi Pelayanan Usaha Penangkapan Ikan (pemantauan pelayanan usaha penangkapan ikan, evaluasi pelayanan usaha penangkapan ikan).', 'sifat' => 'B'],

            // Bawah PI.05
            ['parent_id' => $pi_t_5, 'kode' => 'PI.05.01', 'nama' => 'Kelembagaan Usaha (tata laksana kelembagaan, kerja sama usaha).', 'sifat' => 'B'],
            ['parent_id' => $pi_t_5, 'kode' => 'PI.05.02', 'nama' => 'Investasi dan Pemodalan Usaha (tata laksana investasi dan pemodalan usaha, bimbingan investasi dan pemodalan usaha).', 'sifat' => 'B'],
            ['parent_id' => $pi_t_5, 'kode' => 'PI.05.03', 'nama' => 'Kenelayanan (identifikasi dan kapasitas nelayan, bimbingan nelayan).', 'sifat' => 'B'],
            ['parent_id' => $pi_t_5, 'kode' => 'PI.05.04', 'nama' => 'Pembinaan pengelolaan usaha (bimbingan pengelolaan usaha, bimbingan diversifikasi usaha).', 'sifat' => 'B'],
            ['parent_id' => $pi_t_5, 'kode' => 'PI.05.05', 'nama' => 'Pemantauan dan Evaluasi Usaha Penangkapan Ikan.', 'sifat' => 'B'],

            // Bawah IB.01
            ['parent_id' => $ib_1, 'kode' => 'IB.01.01', 'nama' => 'Lahan dan Air (identifikasi potensi, penataan).', 'sifat' => 'B'],
            ['parent_id' => $ib_1, 'kode' => 'IB.01.02', 'nama' => 'Prasarana dan Sarana Budidaya Air Tawar (standarisasi, pemantauan dan evaluasi).', 'sifat' => 'B'],
            ['parent_id' => $ib_1, 'kode' => 'IB.01.03', 'nama' => 'Prasarana dan Sarana Budidaya Air Payau (standarisasi, pemantauan dan evaluasi).', 'sifat' => 'B'],
            ['parent_id' => $ib_1, 'kode' => 'IB.01.04', 'nama' => 'Prasarana dan Sarana Budidaya Air Laut (standarisasi, pemantauan dan evaluasi).', 'sifat' => 'B'],
            ['parent_id' => $ib_1, 'kode' => 'IB.01.05', 'nama' => 'Minapolitan Budidaya (identifikasi potensi, pemanfaatan potensi).', 'sifat' => 'B'],

            // Bawah IB.02
            ['parent_id' => $ib_2, 'kode' => 'IB.02.01', 'nama' => 'Induk (pengelolaan induk ikan air tawar, pengelolaan induk ikan air payau dan laut).', 'sifat' => 'B'],
            ['parent_id' => $ib_2, 'kode' => 'IB.02.02', 'nama' => 'Perbenihan Skala Kecil ikan air tawar dan ikan air laut.', 'sifat' => 'B'],
            ['parent_id' => $ib_2, 'kode' => 'IB.02.03', 'nama' => 'Perbenihan Skala Besar (perbenihan skala besar ikan air tawar, perbenihan skala besar ikan air payau dan laut).', 'sifat' => 'B'],
            ['parent_id' => $ib_2, 'kode' => 'IB.02.04', 'nama' => 'Standarisasi dan Sertifikasi Perbenihan.', 'sifat' => 'B'],
            ['parent_id' => $ib_2, 'kode' => 'IB.02.05', 'nama' => 'Informasi dan Distribusi Perbenihan.', 'sifat' => 'B'],

            // Bawah IB.03
            ['parent_id' => $ib_3, 'kode' => 'IB.03.01', 'nama' => 'Budidaya air tawar (standarisasi dan penerapan teknologi budidaya air tawar).', 'sifat' => 'B'],
            ['parent_id' => $ib_3, 'kode' => 'IB.03.02', 'nama' => 'Budidaya air payau dan laut (standarisasi, penerapan teknologi budidaya air payau dan laut).', 'sifat' => 'B'],
            ['parent_id' => $ib_3, 'kode' => 'IB.03.03', 'nama' => 'Budidaya ikan hias (standarisasi, penerapan teknologi budidaya ikan hias).', 'sifat' => 'B'],
            ['parent_id' => $ib_3, 'kode' => 'IB.03.04', 'nama' => 'Sertifikasi (monitoring dan evaluasi sertifikasi).', 'sifat' => 'B'],
            ['parent_id' => $ib_3, 'kode' => 'IB.03.05', 'nama' => 'Data dan statistik perikanan budidaya (pengumpulan dan pengolahan data, analisa dan penyajian data statistik).', 'sifat' => 'B'],

            // Bawah IB.04
            ['parent_id' => $ib_4, 'kode' => 'IB.04.01', 'nama' => 'Hama dan penyakit ikan (metode dan sistem pengendalian hama dan penyakit, monitoring dan evaluasi hama dan penyakit ikan).', 'sifat' => 'B'],
            ['parent_id' => $ib_4, 'kode' => 'IB.04.02', 'nama' => 'Perlindungan lingkungan budidaya (pengendalian lingkungan budidaya, rehabilitasi lingkungan budidaya).', 'sifat' => 'B'],
            ['parent_id' => $ib_4, 'kode' => 'IB.04.03', 'nama' => 'Standarisasi dan kesehatan dan lingkungan (dan standarisasi mode uji kesehatan ikan dan lingkungan).', 'sifat' => 'B'],
            ['parent_id' => $ib_4, 'kode' => 'IB.04.04', 'nama' => 'Obat ikan, kimia, dan bahan biologi (monitoring dan evaluasi obat ikan kimia dan bahan biologi).', 'sifat' => 'B'],
            ['parent_id' => $ib_4, 'kode' => 'IB.04.05', 'nama' => 'Pengendalian residu (Perencanaan dan tindak lanjut pengendalian residu).', 'sifat' => 'B'],

            // Bawah IB.05
            ['parent_id' => $ib_5, 'kode' => 'IB.05.01', 'nama' => 'Investasi dan permodalan.', 'sifat' => 'B'],
            ['parent_id' => $ib_5, 'kode' => 'IB.05.02', 'nama' => 'Kewirausahaan (bimbingan usaha dan kemitraan).', 'sifat' => 'B'],
            ['parent_id' => $ib_5, 'kode' => 'IB.05.03', 'nama' => 'Pelayanan usaha (perizinan, pemantauan dan evaluasi).', 'sifat' => 'B'],
            ['parent_id' => $ib_5, 'kode' => 'IB.05.04', 'nama' => 'Kelembagaan dan ketenagakerjaan.', 'sifat' => 'B'],
            ['parent_id' => $ib_5, 'kode' => 'IB.05.05', 'nama' => 'Infomasi usaha dan promosi.', 'sifat' => 'B'], // Typo asli "Infomasi"

            // Bawah PPI.01
            ['parent_id' => $ppi_1, 'kode' => 'PPI.01.01', 'nama' => 'Standarisasi (analisis standar, penerapan standar).', 'sifat' => 'B'],
            ['parent_id' => $ppi_1, 'kode' => 'PPI.01.02', 'nama' => 'Pengembangan produk (skala mikro, kecil, menengah, pengembangan produk skala besar).', 'sifat' => 'B'],
            ['parent_id' => $ppi_1, 'kode' => 'PPI.01.03', 'nama' => 'Pengembangan usaha mikro, kecil, dan menengah (bimbingan teknis usaha mikro, kecil dan menengah, kerja sama usaha mikro, kecil dan menengah).', 'sifat' => 'B'],
            ['parent_id' => $ppi_1, 'kode' => 'PPI.01.04', 'nama' => 'Industri pengolahan (bimbingan teknis industri pengolahan, kerjasama asosiasi dan industri penolahan).', 'sifat' => 'B'], // Typo asli "penolahan"
            ['parent_id' => $ppi_1, 'kode' => 'PPI.01.05', 'nama' => 'Sarana dan prasarana.', 'sifat' => 'B'],

            // Bawah PPI.02
            ['parent_id' => $ppi_2, 'kode' => 'PPI.02.01', 'nama' => 'standarisasi (analisis standar, penerapan standar).', 'sifat' => 'B'],
            ['parent_id' => $ppi_2, 'kode' => 'PPI.02.02', 'nama' => 'promosi dan jaringan pasar ikan hias.', 'sifat' => 'B'],
            ['parent_id' => $ppi_2, 'kode' => 'PPI.02.03', 'nama' => 'pengembangan usaha mikro, kecil, dan menengah (bimbingan teknis usaha mikro, kecil dan menengah, identifikasi dan evaluasi sentra pengolahan produk).', 'sifat' => 'B'],
            ['parent_id' => $ppi_2, 'kode' => 'PPI.02.04', 'nama' => 'pengembangan industri (kerja sama industri).', 'sifat' => 'B'],
            ['parent_id' => $ppi_2, 'kode' => 'PPI.02.05', 'nama' => 'sarana dan prasarana.', 'sifat' => 'B'],

            // Bawah PPI.03
            ['parent_id' => $ppi_3, 'kode' => 'PPI.03.01', 'nama' => 'Kelembagaan (kelembagaan pelaku pasar hasil perikanan, kelembagaan pasar hasil perikanan).', 'sifat' => 'B'],
            ['parent_id' => $ppi_3, 'kode' => 'PPI.03.02', 'nama' => 'Analisis dan informasi pasar dalam negeri.', 'sifat' => 'B'],
            ['parent_id' => $ppi_3, 'kode' => 'PPI.03.03', 'nama' => 'Jaringan distribusi dan kemitraan.', 'sifat' => 'B'],
            ['parent_id' => $ppi_3, 'kode' => 'PPI.03.04', 'nama' => 'Promosi dan kerja sama.', 'sifat' => 'B'],
            ['parent_id' => $ppi_3, 'kode' => 'PPI.03.05', 'nama' => 'Sarana dan prasarana.', 'sifat' => 'B'],

            // Bawah PPI.04
            ['parent_id' => $ppi_4, 'kode' => 'PPI.04.01', 'nama' => 'Kelembagaan (analisis kelembagaan, kerjasaa kelembagaan).', 'sifat' => 'B'], // Typo "kerjasaa"
            ['parent_id' => $ppi_4, 'kode' => 'PPI.04.02', 'nama' => 'Analisis dan informasi pasar luar negeri dan kebutuhan import).', 'sifat' => 'B'],
            ['parent_id' => $ppi_4, 'kode' => 'PPI.04.03', 'nama' => 'Pengembangan ekspor (peningkatan akses pasar, pengamanan dan perlindungan akses pasar).', 'sifat' => 'B'],
            ['parent_id' => $ppi_4, 'kode' => 'PPI.04.04', 'nama' => 'Pengendalian impor (analisis kebutuhan impor, pemantauan evaluasi impor).', 'sifat' => 'B'],
            ['parent_id' => $ppi_4, 'kode' => 'PPI.04.05', 'nama' => 'Promosi dan kerjasama.', 'sifat' => 'B'],

            // Bawah PPI.05
            ['parent_id' => $ppi_5, 'kode' => 'PPI.05.01', 'nama' => 'Pelayanan usaha (mikro, kecil dan menengah, pelayanan usaha besar).', 'sifat' => 'B'],
            ['parent_id' => $ppi_5, 'kode' => 'PPI.05.02', 'nama' => 'Kemitraan usaha (usaha kecil dan menengah, kemitraan usaha besar).', 'sifat' => 'B'],
            ['parent_id' => $ppi_5, 'kode' => 'PPI.05.03', 'nama' => 'Ketenagakerjaan pengolahan dan pemasaran.', 'sifat' => 'B'],
            ['parent_id' => $ppi_5, 'kode' => 'PPI.05.04', 'nama' => 'Investasi dan permodalan.', 'sifat' => 'B'],
            ['parent_id' => $ppi_5, 'kode' => 'PPI.05.05', 'nama' => 'Informasi dan promosi.', 'sifat' => 'B'],

            // Bawah KL.01
            ['parent_id' => $kl_1, 'kode' => 'KL.01.01', 'nama' => 'Rencana Tata Ruang Laut Nasional dan Perairan Yurisdiksi (rencana tata ruang laut nasional, rencana tata ruang laut lintas wilayah dan perairan).', 'sifat' => 'B'],
            ['parent_id' => $kl_1, 'kode' => 'KL.01.02', 'nama' => 'Rencana tata ruang dan zona wilayah I Jawa, sumatera dan leuseur sunda.', 'sifat' => 'B'],
            ['parent_id' => $kl_1, 'kode' => 'KL.01.03', 'nama' => 'Rencana tata ruang dan zona wilayah II (kalimantan dan maluku, zonasi wilayah sulawesi dan papua).', 'sifat' => 'B'],
            ['parent_id' => $kl_1, 'kode' => 'KL.01.04', 'nama' => 'Informasi dan evaluasi spasial.', 'sifat' => 'B'],

            // Bawah KL.02
            ['parent_id' => $kl_2, 'kode' => 'KL.02.01', 'nama' => 'Jejaring, data, dan informasi konservasi.', 'sifat' => 'B'],
            ['parent_id' => $kl_2, 'kode' => 'KL.02.02', 'nama' => 'Konservasi wawasan (perancangan konservasi kawasan, perlindungan dan pelestarian kawasan).', 'sifat' => 'B'],
            ['parent_id' => $kl_2, 'kode' => 'KL.02.03', 'nama' => 'Konservasi jenis ikan (perancangan konservasi jenis ikan, perlindungan dan plestarian jenis ikan).', 'sifat' => 'B'], // Typo "plestarian"
            ['parent_id' => $kl_2, 'kode' => 'KL.02.04', 'nama' => 'Pemanfaatan kawasan dan jenis ikan (pemanfaatan kawasan, pemanfaatan jenis ikan).', 'sifat' => 'B'],

            // Bawah KL.03
            ['parent_id' => $kl_3, 'kode' => 'KL.03.01', 'nama' => 'Mitigasi bencana lingkungan (mitigasi rencana pesisir dan lautan, adaptasi dampak perubahan iklim).', 'sifat' => 'B'],
            ['parent_id' => $kl_3, 'kode' => 'KL.03.02', 'nama' => 'Pendayagunaan sumber daya kelautan (benda muatan kapal tenggelam, jasa kelautan).', 'sifat' => 'B'],
            ['parent_id' => $kl_3, 'kode' => 'KL.03.03', 'nama' => 'Penanggulangan pencemaran sumber daya pesisir dan laut (penanggulangan pencemaran sumber daya pesisir, penanggulangan pencemaran sumer daya laut).', 'sifat' => 'B'], // Typo "sumer"
            ['parent_id' => $kl_3, 'kode' => 'KL.03.04', 'nama' => 'Rehabilitasi dan reklamasi.', 'sifat' => 'B'],
            ['parent_id' => $kl_3, 'kode' => 'KL.03.05', 'nama' => 'Identifikasi pulau-pulau terkecil.', 'sifat' => 'B'],
            ['parent_id' => $kl_3, 'kode' => 'KL.03.06', 'nama' => 'Pengelolaan ekosistem pulau-pulau terkecil (rehailitasi, mitigasi dan adaptasi).', 'sifat' => 'B'], // Typo "rehailitasi"
            ['parent_id' => $kl_3, 'kode' => 'KL.03.07', 'nama' => 'Investasi dan promosi pulau-pulau terkecil.', 'sifat' => 'B'],
            ['parent_id' => $kl_3, 'kode' => 'KL.03.08', 'nama' => 'Sarana dan prasarana pulau-pulau terkecil.', 'sifat' => 'B'],

            // Bawah KL.05
            ['parent_id' => $kl_5, 'kode' => 'KL.05.01', 'nama' => 'Akses permodalan (akses perbankan, akses non Bank).', 'sifat' => 'B'],
            ['parent_id' => $kl_5, 'kode' => 'KL.05.02', 'nama' => 'Akses ilmu pengetahuan dan teknologi (identifikasi ilmu pengetahuan dan teknologi dan implementasi ilmu pengetahuan dan teknologi).', 'sifat' => 'B'],
            ['parent_id' => $kl_5, 'kode' => 'KL.05.03', 'nama' => 'Sosial budaya masyarakat (penguatan kelembagaan dan peningkatan peran serta masyarakat).', 'sifat' => 'B'],
            ['parent_id' => $kl_5, 'kode' => 'KL.05.04', 'nama' => 'Pengembangan usaha (pelayanan usaha, usaha mikro).', 'sifat' => 'B'],

            // Bawah PSDK.01
            ['parent_id' => $psdk_1, 'kode' => 'PSDK.01.01', 'nama' => 'Pengawasan penangkapan wilayah Barat (pengawasan penangkapan ikan wilayah barat I, pengawasan penangkapan ikan wilayah barat II).', 'sifat' => 'B'],
            ['parent_id' => $psdk_1, 'kode' => 'PSDK.01.02', 'nama' => 'Pengawasan penangkapan ikan wilayah Timur (pengawasan penangkapan ikan wilayah timur I dan II).', 'sifat' => 'B'],
            ['parent_id' => $psdk_1, 'kode' => 'PSDK.01.03', 'nama' => 'Pengawasan pengangkutan, pengolahan, dan pemasaran (pengawasan usaha pengangkutan, pengolahan dan pemasaran wilayah barat, pengawasan usaha pengangkutan, pengolahan dan pemasaran wilayah timur).', 'sifat' => 'B'],
            ['parent_id' => $psdk_1, 'kode' => 'PSDK.01.04', 'nama' => 'Pengawasan usaha budidaya wilayah barat dan wilayah timur.', 'sifat' => 'B'],

            // Bawah PSDK.02
            ['parent_id' => $psdk_2, 'kode' => 'PSDK.02.01', 'nama' => 'Pengawasan ekosistem perairan dan kawasan konservasi', 'sifat' => 'B'],
            ['parent_id' => $psdk_2, 'kode' => 'PSDK.02.02', 'nama' => 'Pengawasan pencemaran perairan (pengawasan pencemaran pesisir laut dan pesisir pantai, pengawasan pencemaran perairan umum dan pedalaman).', 'sifat' => 'B'],
            ['parent_id' => $psdk_2, 'kode' => 'PSDK.02.03', 'nama' => 'Pengawasan pesisir dan pulau-pulau terkecil.', 'sifat' => 'B'],
            ['parent_id' => $psdk_2, 'kode' => 'PSDK.02.04', 'nama' => 'Pengawasan jasa kelautan dan sumber daya non hayati.', 'sifat' => 'B'],

            // Bawah PSDK.03
            ['parent_id' => $psdk_3, 'kode' => 'PSDK.03.01', 'nama' => 'Logistik dan operasional wilayah Barat.', 'sifat' => 'B'],
            ['parent_id' => $psdk_3, 'kode' => 'PSDK.03.02', 'nama' => 'Logistik operasional wilayah Timur.', 'sifat' => 'B'],
            ['parent_id' => $psdk_3, 'kode' => 'PSDK.03.03', 'nama' => 'Perawatan kapal pengawas (wilayah barat dan timur).', 'sifat' => 'B'],
            ['parent_id' => $psdk_3, 'kode' => 'PSDK.03.04', 'nama' => 'Pengawakan kapal pengawas (wilayah barat dan timur).', 'sifat' => 'B'],

            // Bawah PSDK.04
            ['parent_id' => $psdk_4, 'kode' => 'PSDK.04.01', 'nama' => 'Sistem pemantauan (pengembangan sistem pemantauan, kerja sama pemantauan).', 'sifat' => 'B'],
            ['parent_id' => $psdk_4, 'kode' => 'PSDK.04.02', 'nama' => 'Pemantauan pemanfaatan sumber daya kelautan (opersional sistem pemantauan pemanfaatan sumber, analisis hasil pemantauan pemanfaatan sumber daya kelautan).', 'sifat' => 'B'],
            ['parent_id' => $psdk_4, 'kode' => 'PSDK.04.03', 'nama' => 'Pemantauan pemanfaatan sumber daya perikanan (analisis hasil pemantauan pemanfaatan sumber daya ikan).', 'sifat' => 'B'],
            ['parent_id' => $psdk_4, 'kode' => 'PSDK.04.04', 'nama' => 'Pengembangan infrastruktur pengawasan (penyiapan infrastruktur, evaluasi infrastruktur).', 'sifat' => 'B'],

            // Bawah PSDK.05
            ['parent_id' => $psdk_5, 'kode' => 'PSDK.05.01', 'nama' => 'Penyidikan (wilayah barat dan timur).', 'sifat' => 'B'],
            ['parent_id' => $psdk_5, 'kode' => 'PSDK.05.02', 'nama' => 'Penanganan barang bukti dan awak kapal (wilayah barat dan timur).', 'sifat' => 'B'],
            ['parent_id' => $psdk_5, 'kode' => 'PSDK.05.03', 'nama' => 'Kerjasama penegakan hukum dan fasilitas PPNS perikanan.', 'sifat' => 'B'],
            ['parent_id' => $psdk_5, 'kode' => 'PSDK.05.04', 'nama' => 'Pemantauan dan evaluasi.', 'sifat' => 'B'],
        ]);

        // ==============================================================================
        // MENGAMBIL ID LEVEL 3 UNTUK MEMASUKAN LEVEL CICIT (LEVEL 4)
        // (Khusus yang memiliki turunan lebih lanjut di dokumen)
        // ==============================================================================
        $pi_t_1_4 = DB::table('klasifikasis')->where('parent_id', $pi_t_1)->where('kode', 'PI.01.04')->value('id');
        $ppi_3_4 = DB::table('klasifikasis')->where('kode', 'PPI.03.04')->value('id');
        $ppi_4_5 = DB::table('klasifikasis')->where('kode', 'PPI.04.05')->value('id');

        // --- LEVEL CICIT (Level 4 Khusus Sub-Anak Tambahan) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Anak dari PI.01.04 (Sumber Daya Ikan Zona Ekonomi Ekslusif)
            ['parent_id' => $pi_t_1_4, 'kode' => 'PI.01.04.01', 'nama' => 'identifikasi sumber daya ikan zona ekonomi eksklusif.', 'sifat' => 'B'],
            ['parent_id' => $pi_t_1_4, 'kode' => 'PI.01.04.02', 'nama' => 'tata kelola sumer daya ikan zona ekonomi eksklusif.', 'sifat' => 'B'], // Typo sumer

            // Anak dari PPI.03.04 (Promosi dan kerja sama Dalam Negeri)
            ['parent_id' => $ppi_3_4, 'kode' => 'PPI.03.04.01', 'nama' => 'Promosi.', 'sifat' => 'B'],
            ['parent_id' => $ppi_3_4, 'kode' => 'PPI.03.04.02', 'nama' => 'Kerjasama.', 'sifat' => 'B'],

            // Anak dari PPI.04.05 (Promosi dan kerjasama Luar Negeri)
            ['parent_id' => $ppi_4_5, 'kode' => 'PPI.04.05.01', 'nama' => 'Promosi.', 'sifat' => 'B'],
            ['parent_id' => $ppi_4_5, 'kode' => 'PPI.04.05.02', 'nama' => 'Kerjasama.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: KI (Karantina Ikan)
        // ==============================================================================
        $id_ki = DB::table('klasifikasis')->where('kode', 'KI')->value('id');

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_ki, 'kode' => 'KI.01', 'nama' => 'Tindak Karantina Ikan:', 'sifat' => 'B'],
            ['parent_id' => $id_ki, 'kode' => 'KI.02', 'nama' => 'Tertib Operasional:', 'sifat' => 'B'],
            ['parent_id' => $id_ki, 'kode' => 'KI.03', 'nama' => 'Pencegahan Penyakit:', 'sifat' => 'B'],
            ['parent_id' => $id_ki, 'kode' => 'KI.04', 'nama' => 'Pengawasan Karantina Ikan:', 'sifat' => 'B'],
            ['parent_id' => $id_ki, 'kode' => 'KI.05', 'nama' => 'Instalasi:', 'sifat' => 'B'],
        ]);

        // Mengambil ID untuk memasukkan Level Cucu
        $ki_1 = DB::table('klasifikasis')->where('kode', 'KI.01')->value('id');
        $ki_2 = DB::table('klasifikasis')->where('kode', 'KI.02')->value('id');
        $ki_3 = DB::table('klasifikasis')->where('kode', 'KI.03')->value('id');
        $ki_4 = DB::table('klasifikasis')->where('kode', 'KI.04')->value('id');
        $ki_5 = DB::table('klasifikasis')->where('kode', 'KI.05')->value('id');

        // --- LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah KI.01
            ['parent_id' => $ki_1, 'kode' => 'KI.01.01', 'nama' => 'Pemeriksaan ikan.', 'sifat' => 'B'],
            ['parent_id' => $ki_1, 'kode' => 'KI.01.02', 'nama' => 'Penahanan.', 'sifat' => 'B'],
            ['parent_id' => $ki_1, 'kode' => 'KI.01.03', 'nama' => 'Pengasingan.', 'sifat' => 'B'],
            ['parent_id' => $ki_1, 'kode' => 'KI.01.04', 'nama' => 'Pengamatan.', 'sifat' => 'B'],
            ['parent_id' => $ki_1, 'kode' => 'KI.01.05', 'nama' => 'Penolakan.', 'sifat' => 'B'],
            ['parent_id' => $ki_1, 'kode' => 'KI.01.06', 'nama' => 'Pemusnahan.', 'sifat' => 'B'],
            ['parent_id' => $ki_1, 'kode' => 'KI.01.07', 'nama' => 'Pelepasan/pembebasan.', 'sifat' => 'B'],

            // Bawah KI.02
            ['parent_id' => $ki_2, 'kode' => 'KI.02.01', 'nama' => 'Persyaratan lalu lintas pemasukan.', 'sifat' => 'B'],
            ['parent_id' => $ki_2, 'kode' => 'KI.02.02', 'nama' => 'Persyaratan lalu lintas pengeluaran.', 'sifat' => 'B'],
            ['parent_id' => $ki_2, 'kode' => 'KI.02.03', 'nama' => 'Permohonan sertifikat.', 'sifat' => 'B'],
            ['parent_id' => $ki_2, 'kode' => 'KI.02.04', 'nama' => 'Pemasukan formulir.', 'sifat' => 'B'],
            ['parent_id' => $ki_2, 'kode' => 'KI.02.05', 'nama' => 'Pemasukan sertifikat.', 'sifat' => 'B'],
            ['parent_id' => $ki_2, 'kode' => 'KI.02.06', 'nama' => 'Evaluasi dan monitoring sertifikat.', 'sifat' => 'B'],
            ['parent_id' => $ki_2, 'kode' => 'KI.02.07', 'nama' => 'Surat perintah.', 'sifat' => 'B'],
            ['parent_id' => $ki_2, 'kode' => 'KI.02.08', 'nama' => 'Rekomendasi.', 'sifat' => 'B'],

            // Bawah KI.03
            ['parent_id' => $ki_3, 'kode' => 'KI.03.01', 'nama' => 'Penutupan suatu area.', 'sifat' => 'B'],
            ['parent_id' => $ki_3, 'kode' => 'KI.03.02', 'nama' => 'Pelanggaran lalu lintas ikan.', 'sifat' => 'B'],

            // Bawah KI.04
            ['parent_id' => $ki_4, 'kode' => 'KI.04.01', 'nama' => 'Pengawasan peraturan perkarantinaan.', 'sifat' => 'B'],
            ['parent_id' => $ki_4, 'kode' => 'KI.04.02', 'nama' => 'Pengawasan pelaksanaan operasional.', 'sifat' => 'B'],

            // Bawah KI.05
            ['parent_id' => $ki_5, 'kode' => 'KI.05.01', 'nama' => 'Instalasi karantina sementara.', 'sifat' => 'B'],
            ['parent_id' => $ki_5, 'kode' => 'KI.05.02', 'nama' => 'Lokasi karantina.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: PAR (Pariwisata)
        // ==============================================================================
        $id_par = DB::table('klasifikasis')->where('kode', 'PAR')->value('id');

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_par, 'kode' => 'PAR.01', 'nama' => 'Pengembangan Destinasi Pariwisata:', 'sifat' => 'B'],
            ['parent_id' => $id_par, 'kode' => 'PAR.02', 'nama' => 'Pemasaran Pariwisata:', 'sifat' => 'B'],
        ]);

        $par_1 = DB::table('klasifikasis')->where('kode', 'PAR.01')->value('id');
        $par_2 = DB::table('klasifikasis')->where('kode', 'PAR.02')->value('id');

        // --- LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah PAR.01
            ['parent_id' => $par_1, 'kode' => 'PAR.01.01', 'nama' => 'Perancangan Destinasi dan Investasi Pariwisata:', 'sifat' => 'B'],
            ['parent_id' => $par_1, 'kode' => 'PAR.01.02', 'nama' => 'Pengembangan Daya Tarik Wisata:', 'sifat' => 'B'],
            ['parent_id' => $par_1, 'kode' => 'PAR.01.03', 'nama' => 'Industri Pariwisata:', 'sifat' => 'B'],
            ['parent_id' => $par_1, 'kode' => 'PAR.01.04', 'nama' => 'Pemberdayaan Masyarakat Destinasi Pariwisata:', 'sifat' => 'B'],
            ['parent_id' => $par_1, 'kode' => 'PAR.01.05', 'nama' => 'Pengembangan Wisata Minat Khusus, Konvensi, Insentif, dan Event:', 'sifat' => 'B'],

            // Bawah PAR.02
            ['parent_id' => $par_2, 'kode' => 'PAR.02.01', 'nama' => 'Pengembangan Pasar dan Informasi Pariwisata:', 'sifat' => 'B'],
            ['parent_id' => $par_2, 'kode' => 'PAR.02.02', 'nama' => 'Promosi Pariwisata Luar Negeri:', 'sifat' => 'B'],
            ['parent_id' => $par_2, 'kode' => 'PAR.02.03', 'nama' => 'Promosi Pariwisata Dalam Negeri.', 'sifat' => 'B'],
            ['parent_id' => $par_2, 'kode' => 'PAR.02.04', 'nama' => 'Pencitraan Indonesia:', 'sifat' => 'B'],
            ['parent_id' => $par_2, 'kode' => 'PAR.02.05', 'nama' => 'Promosi Konvensi, Insentif, Event, dan Minat Khusus:', 'sifat' => 'B'],
        ]);

        // Mengambil ID untuk memasukkan Level Cicit (Level 4)
        $par_1_1 = DB::table('klasifikasis')->where('kode', 'PAR.01.01')->value('id');
        $par_1_2 = DB::table('klasifikasis')->where('kode', 'PAR.01.02')->value('id');
        $par_1_3 = DB::table('klasifikasis')->where('kode', 'PAR.01.03')->value('id');
        $par_1_4 = DB::table('klasifikasis')->where('kode', 'PAR.01.04')->value('id');
        $par_1_5 = DB::table('klasifikasis')->where('kode', 'PAR.01.05')->value('id');

        $par_2_1 = DB::table('klasifikasis')->where('kode', 'PAR.02.01')->value('id');
        $par_2_2 = DB::table('klasifikasis')->where('kode', 'PAR.02.02')->value('id');
        $par_2_4 = DB::table('klasifikasis')->where('kode', 'PAR.02.04')->value('id');
        $par_2_5 = DB::table('klasifikasis')->where('kode', 'PAR.02.05')->value('id');

        // --- LEVEL CICIT (Level 4) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah PAR.01.01
            ['parent_id' => $par_1_1, 'kode' => 'PAR.01.01.01', 'nama' => 'Kawasan Ekonomi Khusus Pariwisata (Kawasan Strategis Pariwisata).', 'sifat' => 'B'],
            ['parent_id' => $par_1_1, 'kode' => 'PAR.01.01.02', 'nama' => 'Kawasan Pengembangan Destinasi Pariwisata (Perancangan Destinasi Pariwisata).', 'sifat' => 'B'],
            ['parent_id' => $par_1_1, 'kode' => 'PAR.01.01.03', 'nama' => 'Pengembangan Zona Kreatif Berbasis Seni dan Budaya.', 'sifat' => 'B'],
            ['parent_id' => $par_1_1, 'kode' => 'PAR.01.01.04', 'nama' => 'Pengembangan Zona Kreatif Berbasis Media, Desain dan IPTEK.', 'sifat' => 'B'],
            ['parent_id' => $par_1_1, 'kode' => 'PAR.01.01.05', 'nama' => 'Pengembangan Potensi dan Promosi Investasi Pariwisata.', 'sifat' => 'B'],

            // Bawah PAR.01.02
            ['parent_id' => $par_1_2, 'kode' => 'PAR.01.02.01', 'nama' => 'Bimtek Daya Tarik Wisata 5 Tahun.', 'sifat' => 'B'],
            ['parent_id' => $par_1_2, 'kode' => 'PAR.01.02.02', 'nama' => 'Fasilitasi Pengembangan Daya Tarik Wisata.', 'sifat' => 'B'],
            ['parent_id' => $par_1_2, 'kode' => 'PAR.01.02.03', 'nama' => 'Pengembangan daya tarik wisata kota pusaka.', 'sifat' => 'B'],
            ['parent_id' => $par_1_2, 'kode' => 'PAR.01.02.04', 'nama' => 'Penilaian Kelayakan Tugas Pembantuan.', 'sifat' => 'B'],
            ['parent_id' => $par_1_2, 'kode' => 'PAR.01.02.05', 'nama' => 'Penghargaan Pengelolaan Daya Tarik Wisata (Cipta Award).', 'sifat' => 'B'],

            // Bawah PAR.01.03
            ['parent_id' => $par_1_3, 'kode' => 'PAR.01.03.01', 'nama' => 'Sarana Pariwisata. - usaha daya tarik wisata dan kawasan pariwisata. - penyediaan akomodasi, jasa makanan dan minuman, serta tirta dan spa.', 'sifat' => 'B'],
            ['parent_id' => $par_1_3, 'kode' => 'PAR.01.03.02', 'nama' => 'Jasa Pariwisata: - jasa transportasi wisata. - jasa informasi pariwisata. - penyelenggaraan kegiatan hiburan dan rekreasi. - jasa perjalanan wisata. - jasa konsultan pariwisata. - jasa pramuwisata dan penyelenggaraan pertemuan. - insentif. - konvensi. - pameran.', 'sifat' => 'B'],
            ['parent_id' => $par_1_3, 'kode' => 'PAR.01.03.03', 'nama' => 'Pengembangan Produk dan Pelayanan.', 'sifat' => 'B'],

            // Bawah PAR.01.04
            ['parent_id' => $par_1_4, 'kode' => 'PAR.01.04.01', 'nama' => 'Perancangan dan Pemantauan Pemberdayaan Pariwisata.', 'sifat' => 'B'],
            ['parent_id' => $par_1_4, 'kode' => 'PAR.01.04.02', 'nama' => 'Peningkatan Kapasitas Masyarakat Desa.', 'sifat' => 'B'],
            ['parent_id' => $par_1_4, 'kode' => 'PAR.01.04.03', 'nama' => 'Kemitraan dan Kelembagaan Masyarakat.', 'sifat' => 'B'],

            // Bawah PAR.01.05
            ['parent_id' => $par_1_5, 'kode' => 'PAR.01.05.01', 'nama' => 'Pengembangan Wisata Kulier dan Belanja.', 'sifat' => 'B'], // Typo asli "Kulier"
            ['parent_id' => $par_1_5, 'kode' => 'PAR.01.05.02', 'nama' => 'Pengembangan Rekreasi dan Hiburan.', 'sifat' => 'B'],
            ['parent_id' => $par_1_5, 'kode' => 'PAR.01.05.03', 'nama' => 'Pengembangan Wisata Alam dan Budaya.', 'sifat' => 'B'],
            ['parent_id' => $par_1_5, 'kode' => 'PAR.01.05.04', 'nama' => 'Pengembangan Wisata Konvensi, Insentif dan Event.', 'sifat' => 'B'],

            // Bawah PAR.02.01
            ['parent_id' => $par_2_1, 'kode' => 'PAR.02.01.01', 'nama' => 'Informasi Pasar Dalam Negeri.', 'sifat' => 'B'],
            ['parent_id' => $par_2_1, 'kode' => 'PAR.02.01.02', 'nama' => 'Diseminasi Informasi Pasar Pariwisata Luar Negeri.', 'sifat' => 'B'],
            ['parent_id' => $par_2_1, 'kode' => 'PAR.02.01.03', 'nama' => 'Informasi Pasar Luar Negeri.', 'sifat' => 'B'],
            ['parent_id' => $par_2_1, 'kode' => 'PAR.02.01.04', 'nama' => 'Hubungan Lembaga Pariwisata dan Widya Wisata.', 'sifat' => 'B'],
            ['parent_id' => $par_2_1, 'kode' => 'PAR.02.01.05', 'nama' => 'Perancangan Pemasaran Pariwisata.', 'sifat' => 'B'],

            // Bawah PAR.02.02
            ['parent_id' => $par_2_2, 'kode' => 'PAR.02.02.01', 'nama' => 'Wilayah ASEAN.', 'sifat' => 'B'],
            ['parent_id' => $par_2_2, 'kode' => 'PAR.02.02.02', 'nama' => 'Wilayah Asia.', 'sifat' => 'B'],
            ['parent_id' => $par_2_2, 'kode' => 'PAR.02.02.03', 'nama' => 'Wilayah Timur Tengah dan Afrika.', 'sifat' => 'B'],
            ['parent_id' => $par_2_2, 'kode' => 'PAR.02.02.04', 'nama' => 'Wilayah Amerika dan Pasifik.', 'sifat' => 'B'],
            ['parent_id' => $par_2_2, 'kode' => 'PAR.02.02.05', 'nama' => 'Wilayah Eropa.', 'sifat' => 'B'],

            // Bawah PAR.02.04
            ['parent_id' => $par_2_4, 'kode' => 'PAR.02.04.01', 'nama' => 'Strategi Pencitraan Indonesia (Perencanaan Pencitraan Indonesia,Pemantauan dan evaluasi pencitraan Indonesia).', 'sifat' => 'B'],
            ['parent_id' => $par_2_4, 'kode' => 'PAR.02.04.02', 'nama' => 'Komunikasi Media Cetak, Media Elektronik dan Digital, dan Media Ruang: - promosi media. - sarana dan distribusi media.', 'sifat' => 'B'],
            ['parent_id' => $par_2_4, 'kode' => 'PAR.02.04.03', 'nama' => 'Kerjasama dan Kemitraan Antar Lembaga Pemerintah dan non Lembaga Pemerintah.', 'sifat' => 'B'],

            // Bawah PAR.02.05
            ['parent_id' => $par_2_5, 'kode' => 'PAR.02.05.01', 'nama' => 'Promosi KIE Korporasi: - korporasi dalam negeri. - korporasi luar negeri.', 'sifat' => 'B'],
            ['parent_id' => $par_2_5, 'kode' => 'PAR.02.05.02', 'nama' => 'Promosi KIE Pemerintah dan Non Pemerintah.', 'sifat' => 'B'],
            ['parent_id' => $par_2_5, 'kode' => 'PAR.02.05.03', 'nama' => 'Promosi Minat Khusus wisata bahari dan wisata non bahari.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: EKSB, EKM, PSDP
        // ==============================================================================
        $id_eksb = DB::table('klasifikasis')->where('kode', 'EKSB')->value('id') ?? DB::table('klasifikasis')->insertGetId(['kode' => 'EKSB', 'nama' => 'Ekonomi Kreatif Berbasis Seni dan Budaya:', 'sifat' => 'B']);
        $id_ekm = DB::table('klasifikasis')->where('kode', 'EKM')->value('id') ?? DB::table('klasifikasis')->insertGetId(['kode' => 'EKM', 'nama' => 'Ekonomi Kreatif Berbasis Media, Desain, dan Iptek:', 'sifat' => 'B']);
        $id_psdp = DB::table('klasifikasis')->where('kode', 'PSDP')->value('id') ?? DB::table('klasifikasis')->insertGetId(['kode' => 'PSDP', 'nama' => 'Pengembangan Sumber Daya Pariwisata dan Ekonomi Kreatif:', 'sifat' => 'B']);

        // --- LEVEL ANAK (Level 2) - EKSB, EKM, PSDP ---
        DB::table('klasifikasis')->insertOrIgnore([
            // EKSB
            ['parent_id' => $id_eksb, 'kode' => 'EKSB.01', 'nama' => 'Pengembangan industri Perfilman:', 'sifat' => 'B'],
            ['parent_id' => $id_eksb, 'kode' => 'EKSB.02', 'nama' => 'Pengembangan Seni Pertunjukan dan Industri Musik:', 'sifat' => 'B'],
            ['parent_id' => $id_eksb, 'kode' => 'EKSB.03', 'nama' => 'Pengembangan Seni Rupa:', 'sifat' => 'B'],
            // EKM
            ['parent_id' => $id_ekm, 'kode' => 'EKM.01', 'nama' => 'Pengembangan Ekonomi Kreatif Berbasis Media:', 'sifat' => 'B'],
            ['parent_id' => $id_ekm, 'kode' => 'EKM.02', 'nama' => 'Desain dan Arsitektur:', 'sifat' => 'B'],
            ['parent_id' => $id_ekm, 'kode' => 'EKM.03', 'nama' => 'Kerjasama dan Fasilitasi:', 'sifat' => 'B'],
            // PSDP
            ['parent_id' => $id_psdp, 'kode' => 'PSDP.01', 'nama' => 'Penelitian dan Pengembangan Kebijakan Kepariwisataan:', 'sifat' => 'B'],
            ['parent_id' => $id_psdp, 'kode' => 'PSDP.02', 'nama' => 'Penelitian dan Pengembangan Kebijakan Ekonomi Kreatif:', 'sifat' => 'B'],
            ['parent_id' => $id_psdp, 'kode' => 'PSDP.03', 'nama' => 'Pengembangan SDM Kepariwisataan dan Ekonomi Kreatif:', 'sifat' => 'B'],
            ['parent_id' => $id_psdp, 'kode' => 'PSDP.04', 'nama' => 'Kompetensi Kepariwisataan dan Ekonomi Kreatif:', 'sifat' => 'B'],
        ]);

        $eksb_1 = DB::table('klasifikasis')->where('kode', 'EKSB.01')->value('id');
        $eksb_2 = DB::table('klasifikasis')->where('kode', 'EKSB.02')->value('id');
        $eksb_3 = DB::table('klasifikasis')->where('kode', 'EKSB.03')->value('id');

        $ekm_1 = DB::table('klasifikasis')->where('kode', 'EKM.01')->value('id');
        $ekm_2 = DB::table('klasifikasis')->where('kode', 'EKM.02')->value('id');
        $ekm_3 = DB::table('klasifikasis')->where('kode', 'EKM.03')->value('id');

        $psdp_1 = DB::table('klasifikasis')->where('kode', 'PSDP.01')->value('id');
        $psdp_2 = DB::table('klasifikasis')->where('kode', 'PSDP.02')->value('id');
        $psdp_3 = DB::table('klasifikasis')->where('kode', 'PSDP.03')->value('id');
        $psdp_4 = DB::table('klasifikasis')->where('kode', 'PSDP.04')->value('id');

        // --- LEVEL CUCU (Level 3) - EKSB, EKM, PSDP ---
        DB::table('klasifikasis')->insertOrIgnore([
            // EKSB
            ['parent_id' => $eksb_1, 'kode' => 'EKSB.01.01', 'nama' => 'Fasilitasi Industri Perfilman.', 'sifat' => 'B'],
            ['parent_id' => $eksb_1, 'kode' => 'EKSB.01.02', 'nama' => 'Festival dan Eksibisi Film.', 'sifat' => 'B'],
            ['parent_id' => $eksb_1, 'kode' => 'EKSB.01.03', 'nama' => 'Produksi.', 'sifat' => 'B'],
            ['parent_id' => $eksb_1, 'kode' => 'EKSB.01.04', 'nama' => 'Pemasaran Film.', 'sifat' => 'B'],

            ['parent_id' => $eksb_2, 'kode' => 'EKSB.02.01', 'nama' => 'Pengembangan Seni Pertunjukan.', 'sifat' => 'B'],
            ['parent_id' => $eksb_2, 'kode' => 'EKSB.02.02', 'nama' => 'Pengembangan Industri Musik.', 'sifat' => 'B'],
            ['parent_id' => $eksb_2, 'kode' => 'EKSB.02.03', 'nama' => 'Pemasaran Seni Pertunjukan dan Industri Musik.', 'sifat' => 'B'],
            ['parent_id' => $eksb_2, 'kode' => 'EKSB.02.04', 'nama' => 'Infrastruktur dan Dokumentasi Seni Pertunjukan dan Industri Musik.', 'sifat' => 'B'],

            ['parent_id' => $eksb_3, 'kode' => 'EKSB.03.01', 'nama' => 'Pengembangan Seni Rupa Murni, Seni Rupa Terapan, Fotografi. - kreasi dan produksi karya seni. - fasilitasi pengembangan seni.', 'sifat' => 'B'],
            ['parent_id' => $eksb_3, 'kode' => 'EKSB.03.02', 'nama' => 'Pemasaran dan Pengembangan Apresiasi: - distribusi dan komersialisasi karya seni rupa. - apresiasi karya seni rupa.', 'sifat' => 'B'],

            // EKM
            ['parent_id' => $ekm_1, 'kode' => 'EKM.01.01', 'nama' => 'Pengembangan Film Animasi dan Komik.', 'sifat' => 'B'],
            ['parent_id' => $ekm_1, 'kode' => 'EKM.01.02', 'nama' => 'Pengembangan Tulisan Fiksi dan Non Fiksi.', 'sifat' => 'B'],
            ['parent_id' => $ekm_1, 'kode' => 'EKM.01.03', 'nama' => 'Pengembangan Karya Kreatif Audio dan Video.', 'sifat' => 'B'],
            ['parent_id' => $ekm_1, 'kode' => 'EKM.01.04', 'nama' => 'Pengembangan Karya Kreatif Periklanan iklan cetak dan elektronik.', 'sifat' => 'B'],

            ['parent_id' => $ekm_2, 'kode' => 'EKM.02.01', 'nama' => 'Arsitektur dan Desain Interior.', 'sifat' => 'B'],
            ['parent_id' => $ekm_2, 'kode' => 'EKM.02.02', 'nama' => 'Komunikasi Visual.', 'sifat' => 'B'],
            ['parent_id' => $ekm_2, 'kode' => 'EKM.02.03', 'nama' => 'Desain Produk dan Kemasan.', 'sifat' => 'B'],
            ['parent_id' => $ekm_2, 'kode' => 'EKM.02.04', 'nama' => 'Mode.', 'sifat' => 'B'],

            ['parent_id' => $ekm_3, 'kode' => 'EKM.03.01', 'nama' => 'Lisensi Teknologi,pengembangan teknologi dan pemanfaatan teknologi.', 'sifat' => 'B'],
            ['parent_id' => $ekm_3, 'kode' => 'EKM.03.02', 'nama' => 'Sentra Inovasi dan Inkubator bisnis.', 'sifat' => 'B'],
            ['parent_id' => $ekm_3, 'kode' => 'EKM.03.03', 'nama' => 'Pengembangan Sentra Kreatif dan pengelolaan sentra kreatif.', 'sifat' => 'B'],
            ['parent_id' => $ekm_3, 'kode' => 'EKM.03.04', 'nama' => 'Akses Pembiayaan bank dan non bank.', 'sifat' => 'B'],

            // PSDP
            ['parent_id' => $psdp_1, 'kode' => 'PSDP.01.01', 'nama' => 'Program dan Evaluasi.', 'sifat' => 'B'],
            ['parent_id' => $psdp_1, 'kode' => 'PSDP.01.02', 'nama' => 'Data dan Publikasi.', 'sifat' => 'B'],
            ['parent_id' => $psdp_2, 'kode' => 'PSDP.02.01', 'nama' => 'Program dan Evaluasi.', 'sifat' => 'B'],
            ['parent_id' => $psdp_2, 'kode' => 'PSDP.02.02', 'nama' => 'Data dan Publikasi.', 'sifat' => 'B'],
            ['parent_id' => $psdp_3, 'kode' => 'PSDP.03.01', 'nama' => 'Program dan Evaluasi.', 'sifat' => 'B'],
            ['parent_id' => $psdp_3, 'kode' => 'PSDP.03.02', 'nama' => 'Penyelenggaraan dan Kerjasama.', 'sifat' => 'B'],
            ['parent_id' => $psdp_4, 'kode' => 'PSDP.04.01', 'nama' => 'Program dan Evaluasi.', 'sifat' => 'B'],
            ['parent_id' => $psdp_4, 'kode' => 'PSDP.04.02', 'nama' => 'Evaluasi dan Kerjasama.', 'sifat' => 'B'],
        ]);

        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: PB (Penanggulangan Bencana)
        // ==============================================================================
        $id_pb = DB::table('klasifikasis')->where('kode', 'PB')->value('id') ?? DB::table('klasifikasis')->insertGetId(['kode' => 'PB', 'nama' => 'Penanggulangan Bencana:', 'sifat' => 'B']);

        // --- LEVEL ANAK (Level 2) - PB ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_pb, 'kode' => 'PB.01', 'nama' => 'Pencegahan dan Kesiapsiagaan:', 'sifat' => 'B'],
            ['parent_id' => $id_pb, 'kode' => 'PB.02', 'nama' => 'Penanganan Darurat:', 'sifat' => 'B'],
            ['parent_id' => $id_pb, 'kode' => 'PB.03', 'nama' => 'Rehabilitasi dan Rekonstruksi:', 'sifat' => 'B'],
            ['parent_id' => $id_pb, 'kode' => 'PB.04', 'nama' => 'Logistik dan Peralatan:', 'sifat' => 'B'],
        ]);

        $pb_1 = DB::table('klasifikasis')->where('kode', 'PB.01')->value('id');
        $pb_2 = DB::table('klasifikasis')->where('kode', 'PB.02')->value('id');
        $pb_3 = DB::table('klasifikasis')->where('kode', 'PB.03')->value('id');
        $pb_4 = DB::table('klasifikasis')->where('kode', 'PB.04')->value('id');

        // --- LEVEL CUCU (Level 3) - PB ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah PB.01
            ['parent_id' => $pb_1, 'kode' => 'PB.01.01', 'nama' => 'Pengurangan Resiko Bencana:', 'sifat' => 'B'],
            ['parent_id' => $pb_1, 'kode' => 'PB.01.02', 'nama' => 'Pemberdayaan Masyarakat:', 'sifat' => 'B'],
            ['parent_id' => $pb_1, 'kode' => 'PB.01.03', 'nama' => 'Kesiapsiagaan:', 'sifat' => 'B'],
            // Bawah PB.02
            ['parent_id' => $pb_2, 'kode' => 'PB.02.01', 'nama' => 'Tanggap Darurat:', 'sifat' => 'B'],
            ['parent_id' => $pb_2, 'kode' => 'PB.02.02', 'nama' => 'Bantuan Darurat:', 'sifat' => 'B'],
            ['parent_id' => $pb_2, 'kode' => 'PB.02.03', 'nama' => 'Perbaikan Darurat:', 'sifat' => 'B'],
            // Bawah PB.03
            ['parent_id' => $pb_3, 'kode' => 'PB.03.01', 'nama' => 'Penilaian Kerusakan:', 'sifat' => 'B'],
            ['parent_id' => $pb_3, 'kode' => 'PB.03.02', 'nama' => 'Pemulihan dan Peningkatan Fisik:', 'sifat' => 'B'],
            ['parent_id' => $pb_3, 'kode' => 'PB.03.03', 'nama' => 'Pemulihan dan Peningkatan Sosial Ekonomi:', 'sifat' => 'B'],
            ['parent_id' => $pb_3, 'kode' => 'PB.03.04', 'nama' => 'Penanganan Pengungsi:', 'sifat' => 'B'],
            // Bawah PB.04
            ['parent_id' => $pb_4, 'kode' => 'PB.04.01', 'nama' => 'Logistik:', 'sifat' => 'B'],
            ['parent_id' => $pb_4, 'kode' => 'PB.04.02', 'nama' => 'Peralatan:', 'sifat' => 'B'],
        ]);

        $pb_1_1 = DB::table('klasifikasis')->where('kode', 'PB.01.01')->value('id');
        $pb_1_2 = DB::table('klasifikasis')->where('kode', 'PB.01.02')->value('id');
        $pb_1_3 = DB::table('klasifikasis')->where('kode', 'PB.01.03')->value('id');
        $pb_2_1 = DB::table('klasifikasis')->where('kode', 'PB.02.01')->value('id');
        $pb_2_2 = DB::table('klasifikasis')->where('kode', 'PB.02.02')->value('id');
        $pb_2_3 = DB::table('klasifikasis')->where('kode', 'PB.02.03')->value('id');
        $pb_3_1 = DB::table('klasifikasis')->where('kode', 'PB.03.01')->value('id');
        $pb_3_2 = DB::table('klasifikasis')->where('kode', 'PB.03.02')->value('id');
        $pb_3_3 = DB::table('klasifikasis')->where('kode', 'PB.03.03')->value('id');
        $pb_3_4 = DB::table('klasifikasis')->where('kode', 'PB.03.04')->value('id');
        $pb_4_1 = DB::table('klasifikasis')->where('kode', 'PB.04.01')->value('id');
        $pb_4_2 = DB::table('klasifikasis')->where('kode', 'PB.04.02')->value('id');

        // --- LEVEL CICIT (Level 4) - PB ---
        DB::table('klasifikasis')->insertOrIgnore([
            // PB.01.01
            ['parent_id' => $pb_1_1, 'kode' => 'PB.01.01.01', 'nama' => 'Pencegahan Pengkajian Resiko.', 'sifat' => 'B'],
            ['parent_id' => $pb_1_1, 'kode' => 'PB.01.01.02', 'nama' => 'Pencegahan Pengelolaan Resiko.', 'sifat' => 'B'],
            ['parent_id' => $pb_1_1, 'kode' => 'PB.01.01.03', 'nama' => 'Mitigasi Struktur.', 'sifat' => 'B'],
            ['parent_id' => $pb_1_1, 'kode' => 'PB.01.01.04', 'nama' => 'Mitigasi Non Struktur.', 'sifat' => 'B'],
            // PB.01.02
            ['parent_id' => $pb_1_2, 'kode' => 'PB.01.02.01', 'nama' => 'Peran Lembaga Usaha Padat Modal.', 'sifat' => 'B'],
            ['parent_id' => $pb_1_2, 'kode' => 'PB.01.02.02', 'nama' => 'Peran Lembaga Usaha Padat Karya.', 'sifat' => 'B'],
            ['parent_id' => $pb_1_2, 'kode' => 'PB.01.02.03', 'nama' => 'Peran Organisasi Internasional.', 'sifat' => 'B'],
            ['parent_id' => $pb_1_2, 'kode' => 'PB.01.02.04', 'nama' => 'Peran Organisasi Sosial Masyarakat Nasional.', 'sifat' => 'B'],
            ['parent_id' => $pb_1_2, 'kode' => 'PB.01.02.05', 'nama' => 'Peran Peningkatan Kesadaran Masyarakat.', 'sifat' => 'B'],
            ['parent_id' => $pb_1_2, 'kode' => 'PB.01.02.06', 'nama' => 'Peran Peningkatan Ketahanan Masyarakat.', 'sifat' => 'B'],
            // PB.01.03
            ['parent_id' => $pb_1_3, 'kode' => 'PB.01.03.01', 'nama' => 'Peringatan Pemaduan Sistem Jaringan.', 'sifat' => 'B'],
            ['parent_id' => $pb_1_3, 'kode' => 'PB.01.03.02', 'nama' => 'Pemantauan dan Peringatan.', 'sifat' => 'B'],
            ['parent_id' => $pb_1_3, 'kode' => 'PB.01.03.03', 'nama' => 'Perencanaan Kebutuhan dan Potensi Sumber Daya.', 'sifat' => 'B'],
            ['parent_id' => $pb_1_3, 'kode' => 'PB.01.03.04', 'nama' => 'Perencanaan Penerapan Rencana Strategis.', 'sifat' => 'B'],
            ['parent_id' => $pb_1_3, 'kode' => 'PB.01.03.05', 'nama' => 'Penyediaan dan Penyiapan Sumber Daya.', 'sifat' => 'B'],
            ['parent_id' => $pb_1_3, 'kode' => 'PB.01.03.06', 'nama' => 'Penyiapan Pengendalian Sumber Daya.', 'sifat' => 'B'],
            
            // PB.02.01
            ['parent_id' => $pb_2_1, 'kode' => 'PB.02.01.01', 'nama' => 'Perencanaan Pendataan Darurat.', 'sifat' => 'B'],
            ['parent_id' => $pb_2_1, 'kode' => 'PB.02.01.02', 'nama' => 'Perencanaan Operasi.', 'sifat' => 'B'],
            ['parent_id' => $pb_2_1, 'kode' => 'PB.02.01.03', 'nama' => 'Pengendalian Pengorganisasian Pos Komando.', 'sifat' => 'B'],
            ['parent_id' => $pb_2_1, 'kode' => 'PB.02.01.04', 'nama' => 'Pengendalian Sarana dan Prasarana.', 'sifat' => 'B'],
            ['parent_id' => $pb_2_1, 'kode' => 'PB.02.01.05', 'nama' => 'Penyelamatan.', 'sifat' => 'B'],
            ['parent_id' => $pb_2_1, 'kode' => 'PB.02.01.06', 'nama' => 'Evakuasi.', 'sifat' => 'B'],
            // PB.02.02
            ['parent_id' => $pb_2_2, 'kode' => 'PB.02.02.01', 'nama' => 'Bantuan Sandang.', 'sifat' => 'B'],
            ['parent_id' => $pb_2_2, 'kode' => 'PB.02.02.02', 'nama' => 'Bantuan Pangan.', 'sifat' => 'B'],
            ['parent_id' => $pb_2_2, 'kode' => 'PB.02.02.03', 'nama' => 'Bantuan Kesehatan.', 'sifat' => 'B'],
            ['parent_id' => $pb_2_2, 'kode' => 'PB.02.02.04', 'nama' => 'Bantuan Air Bersih.', 'sifat' => 'B'],
            ['parent_id' => $pb_2_2, 'kode' => 'PB.02.02.05', 'nama' => 'Bantuan Pembangunan Hunian Sementara.', 'sifat' => 'B'],
            ['parent_id' => $pb_2_2, 'kode' => 'PB.02.02.06', 'nama' => 'Bantuan Pendukung Hunian Sementara.', 'sifat' => 'B'],
            // PB.02.03
            ['parent_id' => $pb_2_3, 'kode' => 'PB.02.03.01', 'nama' => 'Penyiapan Peralatan.', 'sifat' => 'B'],
            ['parent_id' => $pb_2_3, 'kode' => 'PB.02.03.02', 'nama' => 'Angkutan.', 'sifat' => 'B'],
            ['parent_id' => $pb_2_3, 'kode' => 'PB.02.03.03', 'nama' => 'Perbaikan Prasarana Sosial.', 'sifat' => 'B'],
            ['parent_id' => $pb_2_3, 'kode' => 'PB.02.03.04', 'nama' => 'Perbaikan Prasarana Ekonomi.', 'sifat' => 'B'],
            ['parent_id' => $pb_2_3, 'kode' => 'PB.02.03.05', 'nama' => 'Pemantauan.', 'sifat' => 'B'],
            ['parent_id' => $pb_2_3, 'kode' => 'PB.02.03.06', 'nama' => 'Pelaporan.', 'sifat' => 'B'],

            // PB.03.01
            ['parent_id' => $pb_3_1, 'kode' => 'PB.03.01.01', 'nama' => 'Inventarisasi Kerusakan Fisik.', 'sifat' => 'B'],
            ['parent_id' => $pb_3_1, 'kode' => 'PB.03.01.02', 'nama' => 'Inventarisasi Kerusakan Sosial Ekonomi.', 'sifat' => 'B'],
            ['parent_id' => $pb_3_1, 'kode' => 'PB.03.01.03', 'nama' => 'Estimasi Pembiayaan Pembangunan.', 'sifat' => 'B'],
            ['parent_id' => $pb_3_1, 'kode' => 'PB.03.01.04', 'nama' => 'Estimasi Pembiayaan Sosial Ekonomi.', 'sifat' => 'B'],
            // PB.03.02
            ['parent_id' => $pb_3_2, 'kode' => 'PB.03.02.01', 'nama' => 'Rehabilitasi Fasilitas Umum.', 'sifat' => 'B'],
            ['parent_id' => $pb_3_2, 'kode' => 'PB.03.02.02', 'nama' => 'Rekonstruksi Fasilitas Umum.', 'sifat' => 'B'],
            ['parent_id' => $pb_3_2, 'kode' => 'PB.03.02.03', 'nama' => 'Rehabilitasi Fasilitas Sosial.', 'sifat' => 'B'],
            ['parent_id' => $pb_3_2, 'kode' => 'PB.03.02.04', 'nama' => 'Rekonstruksi Fasilitas Sosial.', 'sifat' => 'B'],
            ['parent_id' => $pb_3_2, 'kode' => 'PB.03.02.05', 'nama' => 'Rehabilitasi Rekonstruksi Perumahan Berat.', 'sifat' => 'B'],
            ['parent_id' => $pb_3_2, 'kode' => 'PB.03.02.06', 'nama' => 'Rehabilitasi Rekonstruksi Perumahan Ringan.', 'sifat' => 'B'],
            // PB.03.03
            ['parent_id' => $pb_3_3, 'kode' => 'PB.03.03.01', 'nama' => 'Pemulihan dan Peningkatan Sosial Budaya.', 'sifat' => 'B'],
            ['parent_id' => $pb_3_3, 'kode' => 'PB.03.03.02', 'nama' => 'Pemulihan dan Peningkatan Kesehatan.', 'sifat' => 'B'],
            ['parent_id' => $pb_3_3, 'kode' => 'PB.03.03.03', 'nama' => 'Pemulihan Ekonomi.', 'sifat' => 'B'],
            ['parent_id' => $pb_3_3, 'kode' => 'PB.03.03.04', 'nama' => 'Peningkatan Ekonomi.', 'sifat' => 'B'],
            // PB.03.04
            ['parent_id' => $pb_3_4, 'kode' => 'PB.03.04.01', 'nama' => 'Perlindungan Pengungsi.', 'sifat' => 'B'],
            ['parent_id' => $pb_3_4, 'kode' => 'PB.03.04.02', 'nama' => 'Pemberdayaan Pengungsi.', 'sifat' => 'B'],
            ['parent_id' => $pb_3_4, 'kode' => 'PB.03.04.03', 'nama' => 'Kompensasi Pengungsi.', 'sifat' => 'B'],
            ['parent_id' => $pb_3_4, 'kode' => 'PB.03.04.04', 'nama' => 'Pengembalian Hak Pengungsi.', 'sifat' => 'B'],
            ['parent_id' => $pb_3_4, 'kode' => 'PB.03.04.05', 'nama' => 'Pemulangan dan Repatriasi Pengungsi.', 'sifat' => 'B'],
            ['parent_id' => $pb_3_4, 'kode' => 'PB.03.04.06', 'nama' => 'Relokasi/Pengalihan Pengungsi.', 'sifat' => 'B'],

            // PB.04.01
            ['parent_id' => $pb_4_1, 'kode' => 'PB.04.01.01', 'nama' => 'Inventarisasi Analisis Kebutuhan.', 'sifat' => 'B'],
            ['parent_id' => $pb_4_1, 'kode' => 'PB.04.01.02', 'nama' => 'Inventarisasi Pengadaan.', 'sifat' => 'B'],
            ['parent_id' => $pb_4_1, 'kode' => 'PB.04.01.03', 'nama' => 'Penyimpanan.', 'sifat' => 'B'],
            ['parent_id' => $pb_4_1, 'kode' => 'PB.04.01.04', 'nama' => 'Distribusi.', 'sifat' => 'B'],
            // PB.04.02
            ['parent_id' => $pb_4_2, 'kode' => 'PB.04.02.01', 'nama' => 'Inventarisasi Analisis Kebutuhan.', 'sifat' => 'B'],
            ['parent_id' => $pb_4_2, 'kode' => 'PB.04.02.02', 'nama' => 'Inventarisasi Pengadaan.', 'sifat' => 'B'],
            ['parent_id' => $pb_4_2, 'kode' => 'PB.04.02.03', 'nama' => 'Penyimpanan.', 'sifat' => 'B'],
            ['parent_id' => $pb_4_2, 'kode' => 'PB.04.02.04', 'nama' => 'Pemeliharaan.', 'sifat' => 'B'],
            ['parent_id' => $pb_4_2, 'kode' => 'PB.04.02.05', 'nama' => 'Pengerahan.', 'sifat' => 'B'],
            ['parent_id' => $pb_4_2, 'kode' => 'PB.04.02.06', 'nama' => 'Distribusi.', 'sifat' => 'B'],
        ]);

        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: KOM (Komunikasi dan Informatika)
        // ==============================================================================
        $id_kom = DB::table('klasifikasis')->where('kode', 'KOM')->value('id') ?? DB::table('klasifikasis')->insertGetId(['kode' => 'KOM', 'nama' => 'Komunikasi dan Informatika:', 'sifat' => 'B']);

        // --- LEVEL ANAK (Level 2) - KOM ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_kom, 'kode' => 'KOM.01', 'nama' => 'Sumber Daya dan Perangkat Pos dan Informatika:', 'sifat' => 'B'],
            ['parent_id' => $id_kom, 'kode' => 'KOM.02', 'nama' => 'Penyelenggaraan Pos dan Informatika:', 'sifat' => 'B'],
            ['parent_id' => $id_kom, 'kode' => 'KOM.03', 'nama' => 'Aplikasi Informatika:', 'sifat' => 'B'],
            ['parent_id' => $id_kom, 'kode' => 'KOM.04', 'nama' => 'Informasi dan Komunikasi Publik:', 'sifat' => 'B'],
            ['parent_id' => $id_kom, 'kode' => 'KOM.05', 'nama' => 'Pusat Data dan Sarana Informatika:', 'sifat' => 'B'],
        ]);

        $kom_1 = DB::table('klasifikasis')->where('kode', 'KOM.01')->value('id');
        $kom_2 = DB::table('klasifikasis')->where('kode', 'KOM.02')->value('id');
        $kom_3 = DB::table('klasifikasis')->where('kode', 'KOM.03')->value('id');
        $kom_4 = DB::table('klasifikasis')->where('kode', 'KOM.04')->value('id');
        $kom_5 = DB::table('klasifikasis')->where('kode', 'KOM.05')->value('id');

        // --- LEVEL CUCU (Level 3) - KOM ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah KOM.01
            ['parent_id' => $kom_1, 'kode' => 'KOM.01.01', 'nama' => 'Penataan Sumber Daya:', 'sifat' => 'B'],
            ['parent_id' => $kom_1, 'kode' => 'KOM.01.02', 'nama' => 'Operasi Sumber Daya:', 'sifat' => 'B'],
            ['parent_id' => $kom_1, 'kode' => 'KOM.01.03', 'nama' => 'Pengendalian Sumber Daya dan Perangkat Pos dan Informatika:', 'sifat' => 'B'],
            ['parent_id' => $kom_1, 'kode' => 'KOM.01.04', 'nama' => 'Standardisasi Perangkat Pos dan Informatika:', 'sifat' => 'B'],

            // Bawah KOM.02
            ['parent_id' => $kom_2, 'kode' => 'KOM.02.01', 'nama' => 'POS:', 'sifat' => 'B'],
            ['parent_id' => $kom_2, 'kode' => 'KOM.02.02', 'nama' => 'Telekomunikasi:', 'sifat' => 'B'],
            ['parent_id' => $kom_2, 'kode' => 'KOM.02.03', 'nama' => 'Penyiaran:', 'sifat' => 'B'],
            ['parent_id' => $kom_2, 'kode' => 'KOM.02.04', 'nama' => 'Telekomunikasi Khusus Penyiaran Publik dan Kewajiban Universal:', 'sifat' => 'B'],
            ['parent_id' => $kom_2, 'kode' => 'KOM.02.05', 'nama' => 'Pengendalian Pos dan Informatika:', 'sifat' => 'B'],

            // Bawah KOM.03
            ['parent_id' => $kom_3, 'kode' => 'KOM.03.01', 'nama' => 'E-Government:', 'sifat' => 'B'],
            ['parent_id' => $kom_3, 'kode' => 'KOM.03.02', 'nama' => 'E- Business:', 'sifat' => 'B'],
            ['parent_id' => $kom_3, 'kode' => 'KOM.03.03', 'nama' => 'Pemberdayaan Informatika:', 'sifat' => 'B'],
            ['parent_id' => $kom_3, 'kode' => 'KOM.03.04', 'nama' => 'Pemberdayaan Industri Informatika:', 'sifat' => 'B'],
            ['parent_id' => $kom_3, 'kode' => 'KOM.03.05', 'nama' => 'Keamanan Informasi:', 'sifat' => 'B'],

            // Bawah KOM.04
            ['parent_id' => $kom_4, 'kode' => 'KOM.04.01', 'nama' => 'Komunikasi Publik:', 'sifat' => 'B'],
            ['parent_id' => $kom_4, 'kode' => 'KOM.04.02', 'nama' => 'Pengolahan dan Penyediaan Informasi:', 'sifat' => 'B'],
            ['parent_id' => $kom_4, 'kode' => 'KOM.04.03', 'nama' => 'Pengelolaan Media Publik:', 'sifat' => 'B'],
            ['parent_id' => $kom_4, 'kode' => 'KOM.04.04', 'nama' => 'Kemitraan Komunikasi:', 'sifat' => 'B'],
            ['parent_id' => $kom_4, 'kode' => 'KOM.04.05', 'nama' => 'Layanan Informasi Internasional:', 'sifat' => 'B'],

            // Bawah KOM.05
            ['parent_id' => $kom_5, 'kode' => 'KOM.05.01', 'nama' => 'Infrastruktur Informatika:', 'sifat' => 'B'],
            ['parent_id' => $kom_5, 'kode' => 'KOM.05.02', 'nama' => 'Sistem dan Data:', 'sifat' => 'B'],
            ['parent_id' => $kom_5, 'kode' => 'KOM.05.03', 'nama' => 'Pusat Kerjasama Internasional:', 'sifat' => 'B'],
            ['parent_id' => $kom_5, 'kode' => 'KOM.05.04', 'nama' => 'Pusat Informasi dan Hubungan Masyarakat:', 'sifat' => 'B'],
        ]);

        $kom_1_1 = DB::table('klasifikasis')->where('kode', 'KOM.01.01')->value('id');
        $kom_1_2 = DB::table('klasifikasis')->where('kode', 'KOM.01.02')->value('id');
        $kom_1_3 = DB::table('klasifikasis')->where('kode', 'KOM.01.03')->value('id');
        $kom_1_4 = DB::table('klasifikasis')->where('kode', 'KOM.01.04')->value('id');
        
        $kom_2_1 = DB::table('klasifikasis')->where('kode', 'KOM.02.01')->value('id');
        $kom_2_2 = DB::table('klasifikasis')->where('kode', 'KOM.02.02')->value('id');
        $kom_2_3 = DB::table('klasifikasis')->where('kode', 'KOM.02.03')->value('id');
        $kom_2_4 = DB::table('klasifikasis')->where('kode', 'KOM.02.04')->value('id');
        $kom_2_5 = DB::table('klasifikasis')->where('kode', 'KOM.02.05')->value('id');

        $kom_3_1 = DB::table('klasifikasis')->where('kode', 'KOM.03.01')->value('id');
        $kom_3_2 = DB::table('klasifikasis')->where('kode', 'KOM.03.02')->value('id');
        $kom_3_3 = DB::table('klasifikasis')->where('kode', 'KOM.03.03')->value('id');
        $kom_3_4 = DB::table('klasifikasis')->where('kode', 'KOM.03.04')->value('id');
        $kom_3_5 = DB::table('klasifikasis')->where('kode', 'KOM.03.05')->value('id');

        $kom_4_1 = DB::table('klasifikasis')->where('kode', 'KOM.04.01')->value('id');
        $kom_4_2 = DB::table('klasifikasis')->where('kode', 'KOM.04.02')->value('id');
        $kom_4_3 = DB::table('klasifikasis')->where('kode', 'KOM.04.03')->value('id');
        $kom_4_4 = DB::table('klasifikasis')->where('kode', 'KOM.04.04')->value('id');
        $kom_4_5 = DB::table('klasifikasis')->where('kode', 'KOM.04.05')->value('id');

        $kom_5_1 = DB::table('klasifikasis')->where('kode', 'KOM.05.01')->value('id');
        $kom_5_2 = DB::table('klasifikasis')->where('kode', 'KOM.05.02')->value('id');
        $kom_5_3 = DB::table('klasifikasis')->where('kode', 'KOM.05.03')->value('id');
        $kom_5_4 = DB::table('klasifikasis')->where('kode', 'KOM.05.04')->value('id');

        // --- LEVEL CICIT (Level 4) - KOM ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah KOM.01.01
            ['parent_id' => $kom_1_1, 'kode' => 'KOM.01.01.01', 'nama' => 'Penataan Alokasi Spektrum Dinas Tetap.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_1, 'kode' => 'KOM.01.01.02', 'nama' => 'Penataan Alokasi Spektrum Dinas Bergerak Darat.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_1, 'kode' => 'KOM.01.01.03', 'nama' => 'Alokasi Dinas Bergerak Darat.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_1, 'kode' => 'KOM.01.01.04', 'nama' => 'Penataan Alokasi Spektrum Non Dinas Penyiaran.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_1, 'kode' => 'KOM.01.01.05', 'nama' => 'Penataan Alokasi Spektrum Non Dinas Penerbangan, Maritim dan Satelit.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_1, 'kode' => 'KOM.01.01.06', 'nama' => 'Pengelolaan Orbit Satelit Notifikasi dan Penataan Filing Satelit.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_1, 'kode' => 'KOM.01.01.07', 'nama' => 'Pengelolaan Orbit Satelit Tata Kelola Hubungan Antarpenyelenggara.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_1, 'kode' => 'KOM.01.01.08', 'nama' => 'Ekonomi Sumber Daya Analisa Industri dan Ekonomi.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_1, 'kode' => 'KOM.01.01.09', 'nama' => 'Ekonomi Sumber Daya Penanganan Izin Pita.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_1, 'kode' => 'KOM.01.01.10', 'nama' => 'Harmonisasi Teknik Spektrum Teknik Spektrum Antar lembaga.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_1, 'kode' => 'KOM.01.01.11', 'nama' => 'Harmonisasi Teknik Spektrum Harmonisasi dan Notifikasi.', 'sifat' => 'B'],

            // Bawah KOM.01.02
            ['parent_id' => $kom_1_2, 'kode' => 'KOM.01.02.01', 'nama' => 'Pelayanan Alokasi Spektrum Dinas Tetap.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_2, 'kode' => 'KOM.01.02.02', 'nama' => 'Pelayanan Alokasi Spektrum Dinas Bergerak Darat.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_2, 'kode' => 'KOM.01.02.03', 'nama' => 'Pelayanan Alokasi Spektrum Non Dinas Penyiaran.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_2, 'kode' => 'KOM.01.02.04', 'nama' => 'Pelayanan Alokasi Spektrum Non Dinas Penerbangan, Maritim, dan Satelit.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_2, 'kode' => 'KOM.01.02.05', 'nama' => 'Sertifikasi Operator Radio Pelayanan Amatir Radio dan Komunikasi Radio Antarpenduduk.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_2, 'kode' => 'KOM.01.02.06', 'nama' => 'Sertifikasi Operator Radio Pelayanan Operator Radio.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_2, 'kode' => 'KOM.01.02.07', 'nama' => 'Penanganan Biaya Piutang Biaya Hak Penggunaan Frekuensi Radio.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_2, 'kode' => 'KOM.01.02.08', 'nama' => 'Penanganan Biaya Analisa dan Evaluasi Biaya Hak Penggunaan Frekuensi Radio.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_2, 'kode' => 'KOM.01.02.09', 'nama' => 'Konsultasi dan Informasi Data Operasi Sumber Daya.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_2, 'kode' => 'KOM.01.02.10', 'nama' => 'Konsultasi Pengelolaan Data Operasi Sumber Daya.', 'sifat' => 'B'],

            // Bawah KOM.01.03
            ['parent_id' => $kom_1_3, 'kode' => 'KOM.01.03.01', 'nama' => 'Pengelolaan Sistem Monitoring Spektrum Rancang Bangun Teknologi Monitoring Spektrum.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_3, 'kode' => 'KOM.01.03.02', 'nama' => 'Pengelolaan Sistem Monitoring Spektrum Pemeliharaan Sistem Informasi Monitoring Spektrum.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_3, 'kode' => 'KOM.01.03.03', 'nama' => 'Pengelolaan Sistem Informasi Manajemen Spektrum Rancang Bangun Sistem Informasi Manajemen Spektrum.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_3, 'kode' => 'KOM.01.03.04', 'nama' => 'Pengelolaan Sistem Informasi Manajemen Spektrum Pemeliharaan Sistem Informasi Manajemen Spektrum.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_3, 'kode' => 'KOM.01.03.05', 'nama' => 'Monitoring dan Penertiban Spektrum Dinas Bergerak Tetap dan Bergerak Terestrial.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_3, 'kode' => 'KOM.01.03.06', 'nama' => 'Monitoring dan Penertiban Spektrum Dinas Non Bergerak Tetap dan Bergerak Terestrial.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_3, 'kode' => 'KOM.01.03.07', 'nama' => 'Monitoring Standar Perangkat Pos dan Informatika.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_3, 'kode' => 'KOM.01.03.08', 'nama' => 'Penertiban Standar Perangkat Pos dan Informatika.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_3, 'kode' => 'KOM.01.03.09', 'nama' => 'Monitoring Frekuensi Radio.', 'sifat' => 'B'],

            // Bawah KOM.01.04
            ['parent_id' => $kom_1_4, 'kode' => 'KOM.01.04.01', 'nama' => 'Teknik Pos dan Telekomunikasi.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_4, 'kode' => 'KOM.01.04.02', 'nama' => 'Teknik Komunikasi Radio.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_4, 'kode' => 'KOM.01.04.03', 'nama' => 'Penerapan Standar Pos dan Telekomunikasi.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_4, 'kode' => 'KOM.01.04.04', 'nama' => 'Kualitas Pelayanan dan Harmonisasi Standar.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_4, 'kode' => 'KOM.01.04.05', 'nama' => 'Standar dan Audit Perangkat Lunak.', 'sifat' => 'B'],
            ['parent_id' => $kom_1_4, 'kode' => 'KOM.01.04.06', 'nama' => 'Pengujian Perangkat Telekomunikasi.', 'sifat' => 'B'],

            // Bawah KOM.02.01
            ['parent_id' => $kom_2_1, 'kode' => 'KOM.02.01.01', 'nama' => 'Layanan Pos Universal.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_1, 'kode' => 'KOM.02.01.02', 'nama' => 'Penerapan Layanan Pos Universal.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_1, 'kode' => 'KOM.02.01.03', 'nama' => 'Layanan Pos Komersial Tata Kelola Layanan.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_1, 'kode' => 'KOM.02.01.04', 'nama' => 'Layanan Pos Komersial Data dan Informasi Layanan.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_1, 'kode' => 'KOM.02.01.05', 'nama' => 'Prangko.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_1, 'kode' => 'KOM.02.01.06', 'nama' => 'Filateli.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_1, 'kode' => 'KOM.02.01.07', 'nama' => 'Iklim Usaha Pos Universal.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_1, 'kode' => 'KOM.02.01.08', 'nama' => 'Iklim Usaha Pos Komersial.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_1, 'kode' => 'KOM.02.01.09', 'nama' => 'Pentarifan Pos Layanan Pos Universal.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_1, 'kode' => 'KOM.02.01.10', 'nama' => 'Pentarifan Pos Komersial.', 'sifat' => 'B'],

            // Bawah KOM.02.02 (Note: Di dokumen asli loncat dari 03 ke 05)
            ['parent_id' => $kom_2_2, 'kode' => 'KOM.02.02.01', 'nama' => 'Layanan Jaringan Telekomunikasi Akses.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_2, 'kode' => 'KOM.02.02.02', 'nama' => 'Layanan Jaringan Telekomunikasi Backbone.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_2, 'kode' => 'KOM.02.02.03', 'nama' => 'Layanan Jasa Telekomunikasi Teleponi Dasar, Nilai Tambah Teleponi, Sistem dan Transaksi.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_2, 'kode' => 'KOM.02.02.05', 'nama' => 'Penomoran Telekomunikasi.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_2, 'kode' => 'KOM.02.02.06', 'nama' => 'Penomoran Informatika.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_2, 'kode' => 'KOM.02.02.07', 'nama' => 'Tarif Telekomunikasi.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_2, 'kode' => 'KOM.02.02.08', 'nama' => 'Interkoneksi Telekomunikasi.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_2, 'kode' => 'KOM.02.02.09', 'nama' => 'Kelayakan Sistem Telekomunikasi Jaringan dan Jasa.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_2, 'kode' => 'KOM.02.02.10', 'nama' => 'Kelayakan Penerapan Sistem Teknologi Telekomunikasi.', 'sifat' => 'B'],

            // Bawah KOM.02.03
            ['parent_id' => $kom_2_3, 'kode' => 'KOM.02.03.01', 'nama' => 'Pemetaan Penyelenggaraan Radio dan Televisi.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_3, 'kode' => 'KOM.02.03.02', 'nama' => 'Database Penyelenggaraan Radio dan Televisi.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_3, 'kode' => 'KOM.02.03.03', 'nama' => 'Verifikasi dan Uji Coba Siaran Radio.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_3, 'kode' => 'KOM.02.03.04', 'nama' => 'Verifikasi dan Uji Coba Siaran Televisi.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_3, 'kode' => 'KOM.02.03.05', 'nama' => 'Lembaga Penyiaran Komunitas dan Lembaga Penyiaran Asing Radio.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_3, 'kode' => 'KOM.02.03.06', 'nama' => 'Lembaga Penyiaran Swasta Radio.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_3, 'kode' => 'KOM.02.03.07', 'nama' => 'Lembaga Penyiaran Komunitas, Lembaga Penyiaran Berlangganan dan Lembaga Penyiaran Televisi.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_3, 'kode' => 'KOM.02.03.08', 'nama' => 'Lembaga Penyiaran Komunitas, Lembaga Penyiaran Berlangganan dan Lembaga Penyiaran Asing Televisi.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_3, 'kode' => 'KOM.02.03.09', 'nama' => 'Lembaga Penyiaran Swasta Televisi.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_3, 'kode' => 'KOM.02.03.10', 'nama' => 'Iklim Usaha Penyiaran Penyusunan dan Evaluasi Regulasi Penyiaran.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_3, 'kode' => 'KOM.02.03.11', 'nama' => 'Iklim Usaha Penyiaran Penerapan Kewajiban Lembaga Penyiaran.', 'sifat' => 'B'],

            // Bawah KOM.02.04
            ['parent_id' => $kom_2_4, 'kode' => 'KOM.02.04.01', 'nama' => 'Analisa Penyelenggaraan Telekomunikasi Khusus Pemerintah.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_4, 'kode' => 'KOM.02.04.02', 'nama' => 'Pelayanan Telekomunikasi Khusus Pemerintah.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_4, 'kode' => 'KOM.02.04.03', 'nama' => 'Analisa Penyelenggaraan Telekomunikasi Khusus Non Pemerintah.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_4, 'kode' => 'KOM.02.04.04', 'nama' => 'Pelayanan Telekomunikasi Khusus Non Pemerintah.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_4, 'kode' => 'KOM.02.04.05', 'nama' => 'Layanan Khusus Penyiaran Publik Radio.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_4, 'kode' => 'KOM.02.04.06', 'nama' => 'Layanan Khusus Penyiaran Publik Televisi.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_4, 'kode' => 'KOM.02.04.07', 'nama' => 'Perencanaan Pembangunan Pelayanan Kewajiban Universal.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_4, 'kode' => 'KOM.02.04.08', 'nama' => 'Monitoring dan Evaluasi Pelayanan Kewajiban Universal.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_4, 'kode' => 'KOM.02.04.09', 'nama' => 'Perencanaan Pengembangan Infrastruktur.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_4, 'kode' => 'KOM.02.04.10', 'nama' => 'Analisa Ekonomis Pengembangan Infrastruktur.', 'sifat' => 'B'],

            // Bawah KOM.02.05
            ['parent_id' => $kom_2_5, 'kode' => 'KOM.02.05.01', 'nama' => 'Monitoring Pos.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_5, 'kode' => 'KOM.02.05.02', 'nama' => 'Evaluasi Pos.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_5, 'kode' => 'KOM.02.05.03', 'nama' => 'Analisa Ekonomis Infrastruktur.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_5, 'kode' => 'KOM.02.05.04', 'nama' => 'Monitoring Jasa Telekomunikasi.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_5, 'kode' => 'KOM.02.05.05', 'nama' => 'Evaluasi Jasa telekomunikasi.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_5, 'kode' => 'KOM.02.05.06', 'nama' => 'Monitoring Penyiaran.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_5, 'kode' => 'KOM.02.05.07', 'nama' => 'Evaluasi Penyiaran.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_5, 'kode' => 'KOM.02.05.08', 'nama' => 'Pencegahan.', 'sifat' => 'B'],
            ['parent_id' => $kom_2_5, 'kode' => 'KOM.02.05.09', 'nama' => 'Penertiban.', 'sifat' => 'B'],

            // Bawah KOM.03.01
            ['parent_id' => $kom_3_1, 'kode' => 'KOM.03.01.01', 'nama' => 'Tata Kelola Program e-Government.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_1, 'kode' => 'KOM.03.01.02', 'nama' => 'Tata Kelola Evaluasi e-Government.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_1, 'kode' => 'KOM.03.01.03', 'nama' => 'Teknologi e-Government.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_1, 'kode' => 'KOM.03.01.04', 'nama' => 'Infrastruktur e-Government.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_1, 'kode' => 'KOM.03.01.05', 'nama' => 'Interoperabilitas e-Government.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_1, 'kode' => 'KOM.03.01.06', 'nama' => 'Interkonektivitas e-Government.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_1, 'kode' => 'KOM.03.01.07', 'nama' => 'Aplikasi Layanan Kepemerintahan Pusat.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_1, 'kode' => 'KOM.03.01.08', 'nama' => 'Aplikasi Layanan Kepemerintahan Daerah.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_1, 'kode' => 'KOM.03.01.09', 'nama' => 'Inisiasi Aplikasi Layanan Publik.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_1, 'kode' => 'KOM.03.01.10', 'nama' => 'Fasilitasi Aplikasi Layanan Publik.', 'sifat' => 'B'],

            // Bawah KOM.03.02
            ['parent_id' => $kom_3_2, 'kode' => 'KOM.03.02.01', 'nama' => 'Tata Kelola Program e-Business.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_2, 'kode' => 'KOM.03.02.02', 'nama' => 'Tata Kelola Evaluasi e-Business.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_2, 'kode' => 'KOM.03.02.03', 'nama' => 'Teknologi e-Business.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_2, 'kode' => 'KOM.03.02.04', 'nama' => 'Interoperabilitas e-Business.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_2, 'kode' => 'KOM.03.02.05', 'nama' => 'Interkonektivitas e-Business.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_2, 'kode' => 'KOM.03.02.06', 'nama' => 'Aplikasi Layanan E-Business Bidang Usaha Kecil dan Mikro.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_2, 'kode' => 'KOM.03.02.07', 'nama' => 'Aplikasi Layanan E-Business Bidang Usaha Menengah dan Besar.', 'sifat' => 'B'],

            // Bawah KOM.03.03
            ['parent_id' => $kom_3_3, 'kode' => 'KOM.03.03.01', 'nama' => 'Perancangan Model Pemberdayaan Informatika Masyarakat Perkotaan.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_3, 'kode' => 'KOM.03.03.02', 'nama' => 'Penerapan Model Pemberdayaan Informatika Masyarakat Perkotaan.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_3, 'kode' => 'KOM.03.03.03', 'nama' => 'Pengembangan Model Pemberdayaan Informatika Masyarakat Pedesaan.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_3, 'kode' => 'KOM.03.03.04', 'nama' => 'Penerapan Model Pemberdayaan Informatika Masyarakat Pedesaan.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_3, 'kode' => 'KOM.03.03.05', 'nama' => 'Pengembangan Model Pemberdayaan Informatika Masyarakat Perbatasan dan Pulau Terluar.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_3, 'kode' => 'KOM.03.03.06', 'nama' => 'Penerapan Model Pemberdayaan Informatika Masyarakat Perbatasan dan Pulau Terluar.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_3, 'kode' => 'KOM.03.03.07', 'nama' => 'Pengembangan Model Pemberdayaan Informatika Masyarakat Khusus.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_3, 'kode' => 'KOM.03.03.08', 'nama' => 'Penerapan Model Pemberdayaan Informatika Masyarakat Khusus.', 'sifat' => 'B'],

            // Bawah KOM.03.04
            ['parent_id' => $kom_3_4, 'kode' => 'KOM.03.04.01', 'nama' => 'Pemberdayaan Industri Infrastruktur dan Layanan Aplikasi Informatika.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_4, 'kode' => 'KOM.03.04.02', 'nama' => 'Promosi Industri Infrastruktur dan Layanan Aplikasi Informatika.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_4, 'kode' => 'KOM.03.04.03', 'nama' => 'Pemberdayaan Industri Perangkat Informatika Pengguna.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_4, 'kode' => 'KOM.03.04.04', 'nama' => 'Pengembangan Produk Industri Perangkat Informatika Pengguna.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_4, 'kode' => 'KOM.03.04.05', 'nama' => 'Pemberdayaan Industri Perangkat Lunak.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_4, 'kode' => 'KOM.03.04.06', 'nama' => 'Pengembangan Produk Industri Perangkat Lunak.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_4, 'kode' => 'KOM.03.04.07', 'nama' => 'Pemberdayaan Industri Konten Multimedia.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_4, 'kode' => 'KOM.03.04.08', 'nama' => 'Pengembangan Produk Industri Konten Multimedia.', 'sifat' => 'B'],

            // Bawah KOM.03.05
            ['parent_id' => $kom_3_5, 'kode' => 'KOM.03.05.01', 'nama' => 'Tata Kelola Keamanan Informasi Kelembagaan.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_5, 'kode' => 'KOM.03.05.02', 'nama' => 'Tata Kelola Keamanan Informasi Manajemen Risiko.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_5, 'kode' => 'KOM.03.05.03', 'nama' => 'Teknologi Keamanan Informasi Infrastruktur.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_5, 'kode' => 'KOM.03.05.04', 'nama' => 'Teknologi Keamanan Informasi Aplikasi.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_5, 'kode' => 'KOM.03.05.05', 'nama' => 'Monitoring, Evaluasi dan Tanggap Darurat Keamanan Informasi Infrastruktur.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_5, 'kode' => 'KOM.03.05.06', 'nama' => 'Monitoring, Evaluasi dan Tanggap Darurat Keamanan Informasi Aplikasi.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_5, 'kode' => 'KOM.03.05.07', 'nama' => 'Penyidikan dan Penindakan Monitoring dan Evaluasi Keamanan Informasi.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_5, 'kode' => 'KOM.03.05.08', 'nama' => 'Penyidikan dan Penindakan Tanggap Darurat Peristiwa Keamanan Informasi.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_5, 'kode' => 'KOM.03.05.09', 'nama' => 'Penyidikan Budaya Keamanan Informasi.', 'sifat' => 'B'],
            ['parent_id' => $kom_3_5, 'kode' => 'KOM.03.05.10', 'nama' => 'Penindakan Budaya Keamanan Informasi.', 'sifat' => 'B'],

            // Bawah KOM.04.01
            ['parent_id' => $kom_4_1, 'kode' => 'KOM.04.01.01', 'nama' => 'Tata Kelola Program Komunikasi Publik.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_1, 'kode' => 'KOM.04.01.02', 'nama' => 'Tata Kelola Monitoring dan Evaluasi.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_1, 'kode' => 'KOM.04.01.03', 'nama' => 'Pengelolaan Pengumpulan Opini Publik.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_1, 'kode' => 'KOM.04.01.04', 'nama' => 'Pengelolaan Pengolahan Opini Publik.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_1, 'kode' => 'KOM.04.01.05', 'nama' => 'Pengumpulan Data Layanan Komunikasi Publik.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_1, 'kode' => 'KOM.04.01.06', 'nama' => 'Pengolahan Data Layanan Komunikasi Publik.', 'sifat' => 'B'],

            // Bawah KOM.04.02
            ['parent_id' => $kom_4_2, 'kode' => 'KOM.04.02.01', 'nama' => 'Informasi Politik dan Kemanan.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_2, 'kode' => 'KOM.04.02.02', 'nama' => 'Informasi Hukum dan Hak Asasi Manusia.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_2, 'kode' => 'KOM.04.02.03', 'nama' => 'Informasi Perekonomian Keuangan, Perbankan, dan Jasa.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_2, 'kode' => 'KOM.04.02.04', 'nama' => 'Informasi Perekonomian Industri dan Perdagangan.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_2, 'kode' => 'KOM.04.02.05', 'nama' => 'Informasi Kesejahteraan Agama, Sosial, dan Budaya.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_2, 'kode' => 'KOM.04.02.06', 'nama' => 'Informasi Kesejahteraan Pendidikan, Kesehatan, dan Lingkungan.', 'sifat' => 'B'],

            // Bawah KOM.04.03
            ['parent_id' => $kom_4_3, 'kode' => 'KOM.04.03.01', 'nama' => 'Media Cetak.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_3, 'kode' => 'KOM.04.03.02', 'nama' => 'Media Online.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_3, 'kode' => 'KOM.04.03.03', 'nama' => 'Media Audio Visual dan Luar Ruang.', 'sifat' => 'B'],

            // Bawah KOM.04.04
            ['parent_id' => $kom_4_4, 'kode' => 'KOM.04.04.01', 'nama' => 'Program Kemitraan Pemerintah dan Lembaga Negara.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_4, 'kode' => 'KOM.04.04.02', 'nama' => 'Monitoring dan Evaluasi Kemitraan Pemerintah dan Lembaga Negara.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_4, 'kode' => 'KOM.04.04.03', 'nama' => 'Program Kemitraan Media dan Dunia Usaha.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_4, 'kode' => 'KOM.04.04.04', 'nama' => 'Monitoring dan Evaluasi Kemitraan Media dan Dunia Usaha.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_4, 'kode' => 'KOM.04.04.05', 'nama' => 'Program Kemitraan Organisasi Kemasyarakatan dan Profesi.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_4, 'kode' => 'KOM.04.04.06', 'nama' => 'Monitoring dan Evaluasi Kemitraan Organisasi Kemasyarakatan dan Profesi.', 'sifat' => 'B'],

            // Bawah KOM.04.05
            ['parent_id' => $kom_4_5, 'kode' => 'KOM.04.05.01', 'nama' => 'Program Layanan Informasi Media Asing.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_5, 'kode' => 'KOM.04.05.02', 'nama' => 'Monitoring dan Evaluasi Layanan Informasi Media Asing.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_5, 'kode' => 'KOM.04.05.03', 'nama' => 'Program Layanan Informasi Perwakilan Negara Asing dan Lembaga Internasional.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_5, 'kode' => 'KOM.04.05.04', 'nama' => 'Monitoring dan Evaluasi Informasi Perwakilan Negara Asing dan Lembaga Internasional.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_5, 'kode' => 'KOM.04.05.05', 'nama' => 'Program Layanan Informasi Masyarakat Luar Negeri.', 'sifat' => 'B'],
            ['parent_id' => $kom_4_5, 'kode' => 'KOM.04.05.06', 'nama' => 'Monitoring dan Evaluasi Layanan Informasi Masyarakat Luar Negeri.', 'sifat' => 'B'],

            // Bawah KOM.05.01
            ['parent_id' => $kom_5_1, 'kode' => 'KOM.05.01.01', 'nama' => 'Jaringan Infrastruktur Informatika.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_1, 'kode' => 'KOM.05.01.02', 'nama' => 'Piranti Teknologi Infrastruktur Informatika.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_1, 'kode' => 'KOM.05.01.03', 'nama' => 'Keamanan Infrastruktur Informatika.', 'sifat' => 'B'],

            // Bawah KOM.05.02
            ['parent_id' => $kom_5_2, 'kode' => 'KOM.05.02.01', 'nama' => 'Sistem Portal dan Konten.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_2, 'kode' => 'KOM.05.02.02', 'nama' => 'Sistem Pengumpulan dan Pengolahan Data.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_2, 'kode' => 'KOM.05.02.03', 'nama' => 'Sistem Pengembangan Aplikasi.', 'sifat' => 'B'],

            // Bawah KOM.05.03 (Note: Dokumen asli duplicate 07)
            ['parent_id' => $kom_5_3, 'kode' => 'KOM.05.03.01', 'nama' => 'Kerjasama Sumber Daya dan Perangkat Pos dan Informatika dan Penelitian dan Pengembangan Sumber Daya Manusia Multilateral.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_3, 'kode' => 'KOM.05.03.02', 'nama' => 'Kerjasama Penyelenggaraan Pos dan Informatika, Aplikasi Informatika, dan Informasi dan Komunikasi Publik Multilateral.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_3, 'kode' => 'KOM.05.03.03', 'nama' => 'Kerjasama Investasi dan Pasar Teknologi Informasi dan Komunikasi Multilateral.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_3, 'kode' => 'KOM.05.03.04', 'nama' => 'Kerjasama Sumber Daya dan Perangkat Pos dan Informatika dan Penelitian dan Pengembangan Sumber Daya Manusia Regional.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_3, 'kode' => 'KOM.05.03.05', 'nama' => 'Kerjasama Penyelenggaraan Pos dan Informatika, Aplikasi Informatika, dan Informasi dan Komunikasi Publik Regional.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_3, 'kode' => 'KOM.05.03.06', 'nama' => 'Kerjasama Investasi dan Pasar Teknologi Informasi dan Komunikasi Regional.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_3, 'kode' => 'KOM.05.03.07', 'nama' => 'Kerjasama Sumber Daya dan Perangkat Pos dan Informatika dan Penelitian dan Pengembangan Sumber Daya Manusia Bilateral.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_3, 'kode' => 'KOM.05.03.07', 'nama' => 'Kerjasama Penyelenggaraan Pos dan Informatika, Aplikasi Informatika, dan Informasi dan Komunikasi Publik Bilateral.', 'sifat' => 'B'], // Disimpan sesuai typo asli

            // Bawah KOM.05.04
            ['parent_id' => $kom_5_4, 'kode' => 'KOM.05.04.01', 'nama' => 'Pelayanan Informasi Media Baru.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_4, 'kode' => 'KOM.05.04.02', 'nama' => 'Pelayanan Informasi Media Konvensional.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_4, 'kode' => 'KOM.05.04.03', 'nama' => 'Pelayanan Informasi Dokumentasi dan Perpustakaan.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_4, 'kode' => 'KOM.05.04.04', 'nama' => 'Publikasi Hubungan Masyarakat.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_4, 'kode' => 'KOM.05.04.05', 'nama' => 'Analisis Berita Hubungan masyarakat dan Pengelolaan Opini Publik.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_4, 'kode' => 'KOM.05.04.06', 'nama' => 'Hubungan Masyarakat Internal dan Eksternal.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_4, 'kode' => 'KOM.05.04.07', 'nama' => 'Bimbingan Teknis Sumber Daya dan Perangkat Pos dan Informatika, Penyelenggaraan Pos.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_4, 'kode' => 'KOM.05.04.08', 'nama' => 'Bimbingan Teknis Informatika, Aplikasi Informatika, Informasi dan Komunikasi Publik, Data dan Sarana informatika, Informasi dan Humas.', 'sifat' => 'B'],
            ['parent_id' => $kom_5_4, 'kode' => 'KOM.05.04.09', 'nama' => 'Evaluasi Sumber Daya dan Perangkat Pos dan Informatika, Penyelenggaraan Pos dan Informatika, Aplikasi Informatika, Informasi dan Komunikasi Publik, Data dan Sarana informatika, Informasi dan Humas.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: HUB (Perhubungan)
        // ==============================================================================
        $id_hub = DB::table('klasifikasis')->where('kode', 'HUB')->value('id');

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_hub, 'kode' => 'HUB.01', 'nama' => 'Kebijakan:', 'sifat' => 'B'],
            ['parent_id' => $id_hub, 'kode' => 'HUB.02', 'nama' => 'Perhubungan Darat:', 'sifat' => 'B'],
            ['parent_id' => $id_hub, 'kode' => 'HUB.03', 'nama' => 'Perhubungan Laut:', 'sifat' => 'B'],
            ['parent_id' => $id_hub, 'kode' => 'HUB.04', 'nama' => 'Perhubungan Udara:', 'sifat' => 'B'],
        ]);

        $hub_1 = DB::table('klasifikasis')->where('kode', 'HUB.01')->value('id');
        $hub_2 = DB::table('klasifikasis')->where('kode', 'HUB.02')->value('id');
        $hub_3 = DB::table('klasifikasis')->where('kode', 'HUB.03')->value('id');
        $hub_4 = DB::table('klasifikasis')->where('kode', 'HUB.04')->value('id');

        // --- LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah HUB.01
            ['parent_id' => $hub_1, 'kode' => 'HUB.01.01', 'nama' => 'Kebijakan mengenai Perhubungan Darat, Perhubungan Laut, Perhubungan Udara dan Perkeretaapian:', 'sifat' => 'B'],

            // Bawah HUB.02 (Perhubungan Darat)
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.01', 'nama' => 'Jaringan Transfortasi Jalan:', 'sifat' => 'B'],
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.02', 'nama' => 'Sarana Angkutan Barang:', 'sifat' => 'B'],
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.03', 'nama' => 'Lalu lintas jalan:', 'sifat' => 'B'],
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.04', 'nama' => 'Angkutan jalan:', 'sifat' => 'B'],
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.05', 'nama' => 'Pengendalian operasi:', 'sifat' => 'B'],
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.06', 'nama' => 'Jaringan transportasi sungai, danau dan penyebrangan:', 'sifat' => 'B'],
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.07', 'nama' => 'Sarana Angkutan Sungai, Danau, dan Penyebrangan:', 'sifat' => 'B'],
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.08', 'nama' => 'Pelabuhan Sungai, Danau dan Penyebrangan:', 'sifat' => 'B'],
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.09', 'nama' => 'Lalu listas Sungai, Danau dan Penyebrangan:', 'sifat' => 'B'],
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.10', 'nama' => 'Angkutan sungai, danau dan penyebrangan:', 'sifat' => 'B'],
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.11', 'nama' => 'Jaringan transportasi perkotaan:', 'sifat' => 'B'],
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.12', 'nama' => 'Lalu Lintas Perkotaan:', 'sifat' => 'B'],
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.13', 'nama' => 'Angkutan Perkotaan:', 'sifat' => 'B'],
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.14', 'nama' => 'Pemaduan Moda Transportasi Perkotaan:', 'sifat' => 'B'],
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.15', 'nama' => 'Dampak Transporasi Perkotaan:', 'sifat' => 'B'],
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.16', 'nama' => 'Manajemen Keselamatan:', 'sifat' => 'B'],
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.17', 'nama' => 'Promosi dan kemitraan keselamatan:', 'sifat' => 'B'],
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.18', 'nama' => 'Bina keselamatan angkutan umum:', 'sifat' => 'B'],
            ['parent_id' => $hub_2, 'kode' => 'HUB.02.19', 'nama' => 'Audit dan inspeksi keselamatan:', 'sifat' => 'B'],

            // Bawah HUB.03 (Perhubungan Laut)
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.01', 'nama' => 'Angkutan laut dalam negeri:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.02', 'nama' => 'Angkutan Laut Luar Negeri:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.03', 'nama' => 'Angkutan laut khusus dan penunjang angkutan laut:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.04', 'nama' => 'Pengembangan Usaha Angkutan Laut:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.05', 'nama' => 'Pengembangan Sistem dan Informasi Angkutan Laut:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.06', 'nama' => 'Pengembangan Pelabuhan:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.07', 'nama' => 'Perancangan Fasilitas Pelabuhan:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.08', 'nama' => 'Pengerukan dan Reklamasi:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.09', 'nama' => 'Pemanduan dan Penundaan Kapal:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.10', 'nama' => 'Bimbingan Pelayanan Jasa dan Operasional Pelabuhan:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.11', 'nama' => 'Kelaikan kapal:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.12', 'nama' => 'Pengukuran, pendaftaran dan kebangsaan kapal:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.13', 'nama' => 'Nautis, Teknis dan Radio kapal:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.14', 'nama' => 'Pencemaran dan Manajemen Keselamatan Kapal:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.15', 'nama' => 'Kepelautan:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.16', 'nama' => 'Perambuan:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.17', 'nama' => 'Telekomunikasi Pelayaran:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.18', 'nama' => 'Kapal Negara Kenavigasian:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.19', 'nama' => 'Pangkalan Kenavigasian:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.20', 'nama' => 'Sarana dan Prasarana:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.21', 'nama' => 'Patroli dan Pengamanan:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.22', 'nama' => 'Pengawasan Keselamatan dan Penyidik Pegawai Negeri Sipil:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.23', 'nama' => 'Tertib Pelayaran:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.24', 'nama' => 'Penanggulangan Musibah dan Pekerjaan Bawah Air:', 'sifat' => 'B'],
            ['parent_id' => $hub_3, 'kode' => 'HUB.03.25', 'nama' => 'Sarana dan Prasarana:', 'sifat' => 'B'], // Ada dua nama Sarana dan Prasarana (20 & 25)

            // Bawah HUB.04 (Perhubungan Udara)
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.01', 'nama' => 'Sistem Informasi dan Pelayanan Angkutan Udara:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.02', 'nama' => 'Angkutan Udara Niaga Berjadwal:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.03', 'nama' => 'Angkutan Udara Niaga Tidak Berjadwal dan Non Niaga:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.04', 'nama' => 'Kerjasama Angkutan Udara:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.05', 'nama' => 'Pengembangan dan Pembinaan Usaha Angkutan Udara:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.06', 'nama' => 'Tatanan Kebandarudaraan dan Lingkungan:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.07', 'nama' => 'Prasarana Bandar Udara:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.08', 'nama' => 'Peralatan dan Utilitas Bandar Udara:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.09', 'nama' => 'Personel dan Operasi Bandar Udara:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.10', 'nama' => 'Penyelenggaraan Bandar Udara:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.11', 'nama' => 'Standarisasi, Kerjasama dan Program Keamanan Penerbangan:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.12', 'nama' => 'Pelayanan Darurat:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.13', 'nama' => 'Penyidik Pegawai Negeri Sipil dan Personel Keamanan Penerbangan:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.14', 'nama' => 'Fasilitas Keamanan Penerbangan dan Pengangkutan Barang Berbahaya:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.15', 'nama' => 'Standarisasi:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.16', 'nama' => 'Kendali Mutu Keamanan Penerbangan:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.17', 'nama' => 'Manajemen Lalu Lintas Penerbangan:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.18', 'nama' => 'Manajemen Informasi Aeronautika:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.19', 'nama' => 'Komunikasi Penerbangan:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.20', 'nama' => 'Fasilitas Bantu Navigasi dan Pengamatan Penerbangan:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.21', 'nama' => 'Standarisasi dan Sertifikasi Navigasi Penerbangan:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.22', 'nama' => 'Standarisasi:', 'sifat' => 'B'], // Ada dua standarisasi (15 & 22)
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.23', 'nama' => 'Rekayasa:', 'sifat' => 'B'],
        ]);

        // ==============================================================================
        // MENGAMBIL ID LEVEL 3 UNTUK MEMASUKAN LEVEL CICIT (LEVEL 4)
        // ==============================================================================
        $hub_1_01 = DB::table('klasifikasis')->where('kode', 'HUB.01.01')->value('id');
        
        $hub_2_01 = DB::table('klasifikasis')->where('kode', 'HUB.02.01')->value('id');
        $hub_2_02 = DB::table('klasifikasis')->where('kode', 'HUB.02.02')->value('id');
        $hub_2_03 = DB::table('klasifikasis')->where('kode', 'HUB.02.03')->value('id');
        $hub_2_04 = DB::table('klasifikasis')->where('kode', 'HUB.02.04')->value('id');
        $hub_2_05 = DB::table('klasifikasis')->where('kode', 'HUB.02.05')->value('id');
        $hub_2_06 = DB::table('klasifikasis')->where('kode', 'HUB.02.06')->value('id');
        $hub_2_07 = DB::table('klasifikasis')->where('kode', 'HUB.02.07')->value('id');
        $hub_2_08 = DB::table('klasifikasis')->where('kode', 'HUB.02.08')->value('id');
        $hub_2_09 = DB::table('klasifikasis')->where('kode', 'HUB.02.09')->value('id');
        $hub_2_10 = DB::table('klasifikasis')->where('kode', 'HUB.02.10')->value('id');
        $hub_2_11 = DB::table('klasifikasis')->where('kode', 'HUB.02.11')->value('id');
        $hub_2_12 = DB::table('klasifikasis')->where('kode', 'HUB.02.12')->value('id');
        $hub_2_13 = DB::table('klasifikasis')->where('kode', 'HUB.02.13')->value('id');
        $hub_2_14 = DB::table('klasifikasis')->where('kode', 'HUB.02.14')->value('id');
        $hub_2_15 = DB::table('klasifikasis')->where('kode', 'HUB.02.15')->value('id');
        $hub_2_16 = DB::table('klasifikasis')->where('kode', 'HUB.02.16')->value('id');
        $hub_2_17 = DB::table('klasifikasis')->where('kode', 'HUB.02.17')->value('id');
        $hub_2_18 = DB::table('klasifikasis')->where('kode', 'HUB.02.18')->value('id');
        $hub_2_19 = DB::table('klasifikasis')->where('kode', 'HUB.02.19')->value('id');

        // Pastikan ambil ID spesifik kalau ada nama yang kembar seperti Sarana Prasarana (HUB.03.20 dan HUB.03.25)
        $hub_3_01 = DB::table('klasifikasis')->where('kode', 'HUB.03.01')->value('id');
        $hub_3_02 = DB::table('klasifikasis')->where('kode', 'HUB.03.02')->value('id');
        $hub_3_03 = DB::table('klasifikasis')->where('kode', 'HUB.03.03')->value('id');
        $hub_3_04 = DB::table('klasifikasis')->where('kode', 'HUB.03.04')->value('id');
        $hub_3_05 = DB::table('klasifikasis')->where('kode', 'HUB.03.05')->value('id');
        $hub_3_06 = DB::table('klasifikasis')->where('kode', 'HUB.03.06')->value('id');
        $hub_3_07 = DB::table('klasifikasis')->where('kode', 'HUB.03.07')->value('id');
        $hub_3_08 = DB::table('klasifikasis')->where('kode', 'HUB.03.08')->value('id');
        $hub_3_09 = DB::table('klasifikasis')->where('kode', 'HUB.03.09')->value('id');
        $hub_3_10 = DB::table('klasifikasis')->where('kode', 'HUB.03.10')->value('id');
        $hub_3_11 = DB::table('klasifikasis')->where('kode', 'HUB.03.11')->value('id');
        $hub_3_12 = DB::table('klasifikasis')->where('kode', 'HUB.03.12')->value('id');
        $hub_3_13 = DB::table('klasifikasis')->where('kode', 'HUB.03.13')->value('id');
        $hub_3_14 = DB::table('klasifikasis')->where('kode', 'HUB.03.14')->value('id');
        $hub_3_15 = DB::table('klasifikasis')->where('kode', 'HUB.03.15')->value('id');
        $hub_3_16 = DB::table('klasifikasis')->where('kode', 'HUB.03.16')->value('id');
        $hub_3_17 = DB::table('klasifikasis')->where('kode', 'HUB.03.17')->value('id');
        $hub_3_18 = DB::table('klasifikasis')->where('kode', 'HUB.03.18')->value('id');
        $hub_3_19 = DB::table('klasifikasis')->where('kode', 'HUB.03.19')->value('id');
        $hub_3_20 = DB::table('klasifikasis')->where('kode', 'HUB.03.20')->value('id');
        $hub_3_21 = DB::table('klasifikasis')->where('kode', 'HUB.03.21')->value('id');
        $hub_3_22 = DB::table('klasifikasis')->where('kode', 'HUB.03.22')->value('id');
        $hub_3_23 = DB::table('klasifikasis')->where('kode', 'HUB.03.23')->value('id');
        $hub_3_24 = DB::table('klasifikasis')->where('kode', 'HUB.03.24')->value('id');
        $hub_3_25 = DB::table('klasifikasis')->where('kode', 'HUB.03.25')->value('id');

        $hub_4_01 = DB::table('klasifikasis')->where('kode', 'HUB.04.01')->value('id');
        $hub_4_02 = DB::table('klasifikasis')->where('kode', 'HUB.04.02')->value('id');
        $hub_4_03 = DB::table('klasifikasis')->where('kode', 'HUB.04.03')->value('id');
        $hub_4_04 = DB::table('klasifikasis')->where('kode', 'HUB.04.04')->value('id');
        $hub_4_05 = DB::table('klasifikasis')->where('kode', 'HUB.04.05')->value('id');
        $hub_4_06 = DB::table('klasifikasis')->where('kode', 'HUB.04.06')->value('id');
        $hub_4_07 = DB::table('klasifikasis')->where('kode', 'HUB.04.07')->value('id');
        $hub_4_08 = DB::table('klasifikasis')->where('kode', 'HUB.04.08')->value('id');
        $hub_4_09 = DB::table('klasifikasis')->where('kode', 'HUB.04.09')->value('id');
        $hub_4_10 = DB::table('klasifikasis')->where('kode', 'HUB.04.10')->value('id');
        $hub_4_11 = DB::table('klasifikasis')->where('kode', 'HUB.04.11')->value('id');
        $hub_4_12 = DB::table('klasifikasis')->where('kode', 'HUB.04.12')->value('id');
        $hub_4_13 = DB::table('klasifikasis')->where('kode', 'HUB.04.13')->value('id');
        $hub_4_14 = DB::table('klasifikasis')->where('kode', 'HUB.04.14')->value('id');
        $hub_4_15 = DB::table('klasifikasis')->where('kode', 'HUB.04.15')->value('id');
        $hub_4_16 = DB::table('klasifikasis')->where('kode', 'HUB.04.16')->value('id');
        $hub_4_17 = DB::table('klasifikasis')->where('kode', 'HUB.04.17')->value('id');
        $hub_4_18 = DB::table('klasifikasis')->where('kode', 'HUB.04.18')->value('id');
        $hub_4_19 = DB::table('klasifikasis')->where('kode', 'HUB.04.19')->value('id');
        $hub_4_20 = DB::table('klasifikasis')->where('kode', 'HUB.04.20')->value('id');
        $hub_4_21 = DB::table('klasifikasis')->where('kode', 'HUB.04.21')->value('id');
        $hub_4_22 = DB::table('klasifikasis')->where('kode', 'HUB.04.22')->value('id');
        $hub_4_23 = DB::table('klasifikasis')->where('kode', 'HUB.04.23')->value('id');

        // --- LEVEL CICIT (Level 4) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah HUB.01.01
            ['parent_id' => $hub_1_01, 'kode' => 'HUB.01.01.01', 'nama' => 'Pengkajian dan pengusulan kegiatan.', 'sifat' => 'B'],
            ['parent_id' => $hub_1_01, 'kode' => 'HUB.01.01.02', 'nama' => 'Penyiapan kebijakan.', 'sifat' => 'B'],
            ['parent_id' => $hub_1_01, 'kode' => 'HUB.01.01.03', 'nama' => 'Perumusan dan penyusunan bahan.', 'sifat' => 'B'],
            ['parent_id' => $hub_1_01, 'kode' => 'HUB.01.01.04', 'nama' => 'Pemberian masukan dan dukungan dalam penyusunan kebijakan.', 'sifat' => 'B'],
            ['parent_id' => $hub_1_01, 'kode' => 'HUB.01.01.05', 'nama' => 'Penetapan dalam bentuk NSPK.', 'sifat' => 'B'],

            // ==========================================
            // BAWAH HUB.02 (Perhubungan Darat)
            // ==========================================
            ['parent_id' => $hub_2_01, 'kode' => 'HUB.02.01.01', 'nama' => 'Jaringan Prasarana dan Pelayanan (penentuan dan penetapan lokasi terminal barang, terminal penumpang, terminal barang utama).', 'sifat' => 'B'],
            ['parent_id' => $hub_2_01, 'kode' => 'HUB.02.01.02', 'nama' => 'Jaringan Prasarana dan Pelayanan (Jaringan trayek angkutan antar kota/propinsi, jaringan jalan primer, jaringan transportasi jalan skunder, kualifikasi teknis petugas terminal).', 'sifat' => 'B'],
            ['parent_id' => $hub_2_01, 'kode' => 'HUB.02.01.03', 'nama' => 'Penetapan kelas jalan primer.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_01, 'kode' => 'HUB.02.01.04', 'nama' => 'Pengembangan Transportasi Jalan (sistem informasi dan komunikasi lalu lintas dan angkutan jalan).', 'sifat' => 'B'],
            ['parent_id' => $hub_2_01, 'kode' => 'HUB.02.01.05', 'nama' => 'Pengebangan transportasi jalan.', 'sifat' => 'B'],

            ['parent_id' => $hub_2_02, 'kode' => 'HUB.02.02.01', 'nama' => 'Pengujian kendaraan bermotor (pengesahan dan setifikasi uji tipe kendaraan bermotor).', 'sifat' => 'B'],
            ['parent_id' => $hub_2_02, 'kode' => 'HUB.02.02.02', 'nama' => 'Pengujian kendaraan bermotor (akreditasi unit pengujian kendaraan bermotor', 'sifat' => 'B'],
            ['parent_id' => $hub_2_02, 'kode' => 'HUB.02.02.03', 'nama' => 'Teknologi kendaraan bermotor (sertifikasi, persyaratan teknis laik jalan, dan harmonisasi dan standar regulasi).', 'sifat' => 'B'],
            ['parent_id' => $hub_2_02, 'kode' => 'HUB.02.02.04', 'nama' => 'Teknologi kendaraan bermotor (pelaksana kalibrasi peralatan uji kendaraan bermotor).', 'sifat' => 'B'],

            ['parent_id' => $hub_2_03, 'kode' => 'HUB.02.03.01', 'nama' => 'Analisa dampak lalu lintas jalan nasional di luar kawasan perkotaan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_03, 'kode' => 'HUB.02.03.02', 'nama' => 'Manajemen dan rekayasa lalu lintas di jalan nasional baik jalan tol/nan-tol).', 'sifat' => 'B'],
            ['parent_id' => $hub_2_03, 'kode' => 'HUB.02.03.03', 'nama' => 'Pedoma teknis perlengkapan jalan, akreditasi unit penimbangan kendaraan bermotor).', 'sifat' => 'B'],
            ['parent_id' => $hub_2_03, 'kode' => 'HUB.02.03.04', 'nama' => 'Kualifikasi teknis petugas penimbangan kendaraan bermotor.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_03, 'kode' => 'HUB.02.03.05', 'nama' => 'Penimbangan kendaraan bermotor di jalan,.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_03, 'kode' => 'HUB.02.03.06', 'nama' => 'Pengadaan, pemasangan, perbaikan dan pemeliharaan perlengkapan di jalan nasional.', 'sifat' => 'B'],

            ['parent_id' => $hub_2_04, 'kode' => 'HUB.02.04.01', 'nama' => 'Tarif angkutan penumpang kelas ekonomi.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_04, 'kode' => 'HUB.02.04.02', 'nama' => 'Izin trayek angkutan lintas batas negara, antar kota antar propinsi.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_04, 'kode' => 'HUB.02.04.03', 'nama' => 'Izin operasi angkuta pariwisata dan angkutan penumpang tidak dalam trayek linta batas negara dan antar kota antar propinsi.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_04, 'kode' => 'HUB.02.04.04', 'nama' => 'Penilaian kinerja perusahaan angkutan umum dan pemberian subsidi angkuta umum.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_04, 'kode' => 'HUB.02.04.05', 'nama' => 'Angkutan perintis.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_04, 'kode' => 'HUB.02.04.06', 'nama' => 'Penghargaan perusahaan angkutan umum, pembinaan angkutan barang.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_04, 'kode' => 'HUB.02.04.07', 'nama' => 'Sistem informasi dan komunikasi lalu lintas dan angkutan jalan raya, tarif angkutan barang.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_04, 'kode' => 'HUB.02.04.08', 'nama' => 'Izin operasi angkutan barang tertentu.', 'sifat' => 'B'],

            ['parent_id' => $hub_2_05, 'kode' => 'HUB.02.05.01', 'nama' => 'Monitoring operational.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_05, 'kode' => 'HUB.02.05.02', 'nama' => 'Pedoman Tenis Bimbingn teknis PPNS.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_05, 'kode' => 'HUB.02.05.03', 'nama' => 'Penyidikan pelanggaran lalu lintas dan angkutan jalan oleh PPNS.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_05, 'kode' => 'HUB.02.05.04', 'nama' => 'Bimtek PPNS, dan pengusulan pengangkatan dan pemberhentian PPNS.', 'sifat' => 'B'],

            ['parent_id' => $hub_2_06, 'kode' => 'HUB.02.06.01', 'nama' => 'Analisa dan Evaluasi Jaringan transportasi sungai, danau dan penyebrangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_06, 'kode' => 'HUB.02.06.02', 'nama' => 'Pengembangan jaringan transportasi sungai, danau dan penyebrangan (peta jaringan, blueprint jaringan).', 'sifat' => 'B'],
            ['parent_id' => $hub_2_06, 'kode' => 'HUB.02.06.03', 'nama' => 'Pengembangan SIM transportasi sungai, danau dan penyebrangan.', 'sifat' => 'B'],

            ['parent_id' => $hub_2_07, 'kode' => 'HUB.02.07.01', 'nama' => 'Rancang bangun sarana transportasi sungai, danau dan penyebrangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_07, 'kode' => 'HUB.02.07.02', 'nama' => 'Perawatan dan pemeliharaan sarana sungai, danau dan penyebrangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_07, 'kode' => 'HUB.02.07.03', 'nama' => 'Pengawakan dan registrasi sarana angkutan sungai, danau dan penyebrangan.', 'sifat' => 'B'],

            ['parent_id' => $hub_2_08, 'kode' => 'HUB.02.08.01', 'nama' => 'Perencanaan dan pembagunan pelabuhan sungai, danau dan penyebrangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_08, 'kode' => 'HUB.02.08.02', 'nama' => 'Pemberian sertifikasi pelabuhan penyebrangan, rekomendasi penetapan lokasi pelabuhan penyebrangan di lintas nasional dan internasional.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_08, 'kode' => 'HUB.02.08.03', 'nama' => 'Penyelenggaraan, pemeliharaan, perawatan dan perbaikan pelabuhan sungai, danau, dan penyebrangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_08, 'kode' => 'HUB.02.08.04', 'nama' => 'Kualifikasi teknis petugas pelabuhan sungai, danau dan penyebrangan.', 'sifat' => 'B'],

            ['parent_id' => $hub_2_09, 'kode' => 'HUB.02.09.01', 'nama' => 'Manajemen lalu lintas.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_09, 'kode' => 'HUB.02.09.02', 'nama' => 'PPNS bidang lalu listas dan angkutan sungai, danau.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_09, 'kode' => 'HUB.02.09.03', 'nama' => 'Sertifikasi inspektur sungai, danau dan pejabat pemberangkatan angkutan sungai dan danau.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_09, 'kode' => 'HUB.02.09.04', 'nama' => 'Pengukuran alur pelayaran sungai, danau, dan kolam pelabuhan penyebrangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_09, 'kode' => 'HUB.02.09.05', 'nama' => 'Penetapan kelas alur dan peta alur pelayaran sungai dan danau.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_09, 'kode' => 'HUB.02.09.06', 'nama' => 'Perambuan sungai, danau dan penyebrangan.', 'sifat' => 'B'],

            ['parent_id' => $hub_2_10, 'kode' => 'HUB.02.10.01', 'nama' => 'Penyelenggaraan angkutan sungai, danau dan penyebrangan, persetujuan operasi kapal penyebrangan lintas nasional dan internasional.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_10, 'kode' => 'HUB.02.10.02', 'nama' => 'Perhitungan tarif, pemantauan tarif angkutan dan jasa pelabuhan sungai, danau dan penyebrangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_10, 'kode' => 'HUB.02.10.03', 'nama' => 'Kriteria dan pelaksanaan pelayanan keperintisan.', 'sifat' => 'B'],

            ['parent_id' => $hub_2_11, 'kode' => 'HUB.02.11.01', 'nama' => 'Jaringan transportasi perkotaan yang berbasis jalan, jalan rel dan perairan daratan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_11, 'kode' => 'HUB.02.11.02', 'nama' => 'Transportasi perkotaan untuk kawasan perkotaan yang melebihi satu wilayah administrasi provinsi.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_11, 'kode' => 'HUB.02.11.03', 'nama' => 'Sistem Informasi Manajemen (SIM) jaringan transportasi perkotaan.', 'sifat' => 'B'],

            ['parent_id' => $hub_2_12, 'kode' => 'HUB.02.12.01', 'nama' => 'Manajemen dan rekayasa lalu lintas perkotaan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_12, 'kode' => 'HUB.02.12.02', 'nama' => 'Manajemen dan rekayasa lalu lintas perkotaan di jalan nasional dalam kawasan perkotaan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_12, 'kode' => 'HUB.02.12.03', 'nama' => 'Penanganan lalu lintas perkotaan berbasis teknologi di wilayah.', 'sifat' => 'B'],

            ['parent_id' => $hub_2_13, 'kode' => 'HUB.02.13.01', 'nama' => 'Penyelenggaraan angkutan perkotaan dalam trayek.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_13, 'kode' => 'HUB.02.13.02', 'nama' => 'Jaringan trayek perkotaan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_13, 'kode' => 'HUB.02.13.03', 'nama' => 'Penentuan dan pemenuhan alokasi kebutuhan angkutan perkotaan dalam trayek yang wilayah pelayanannya melebihi satu wilayah administrasi propinsi.', 'sifat' => 'B'],

            ['parent_id' => $hub_2_14, 'kode' => 'HUB.02.14.01', 'nama' => 'Penyelenggaraan angkutan perkotaan tidak dalam trayek untuk angkutan penumpang/barang.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_14, 'kode' => 'HUB.02.14.02', 'nama' => 'Pemandu moda transportasi perkotaan yang menghubungkan antar simpul di kawasan perkotaan yang melebihi satu wilayah.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_14, 'kode' => 'HUB.02.14.03', 'nama' => 'Penentuan dan pemenuhan alokasi kebutuhan angkutan perkotaan dalam trayek yang wilayah pelayanannya melebihi satu wilayah administrasi provinsi.', 'sifat' => 'B'],

            ['parent_id' => $hub_2_15, 'kode' => 'HUB.02.15.01', 'nama' => 'Penyelenggaraan trasportasi perkotaan berwawasan lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_15, 'kode' => 'HUB.02.15.02', 'nama' => 'Penanganan dampak trasportasi di kawasan perkotaan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_15, 'kode' => 'HUB.02.15.03', 'nama' => 'Masterplan pengembangan teknologi transportasi ramah lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_15, 'kode' => 'HUB.02.15.04', 'nama' => 'Pelaksanaan analisis dampak lalu lintas di jalan nasional dalam kawasan kota.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_15, 'kode' => 'HUB.02.15.05', 'nama' => 'Rekomendasi hasil analisis dampak lalu lintas di jalan nasional dalam kawasan perkotaan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_15, 'kode' => 'HUB.02.15.06', 'nama' => 'Masteplan trasportasi perkotaan.', 'sifat' => 'B'],

            ['parent_id' => $hub_2_16, 'kode' => 'HUB.02.16.01', 'nama' => 'Monitoring dan evaluasi data kecelakaan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_16, 'kode' => 'HUB.02.16.02', 'nama' => 'Kualifikasi unit pengkajian.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_16, 'kode' => 'HUB.02.16.03', 'nama' => 'Pengembangan sistem informasi manajemen keselamatan lalu lintas dan angkutan jalan, sungai, danau dan penyebrangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_16, 'kode' => 'HUB.02.16.04', 'nama' => 'Program keselamatan lalu lintas dan angkutan jalan, sungai,danau dan penyebrangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_16, 'kode' => 'HUB.02.16.05', 'nama' => 'Harmonisasi kebijakan.', 'sifat' => 'B'],

            ['parent_id' => $hub_2_17, 'kode' => 'HUB.02.17.01', 'nama' => 'Promosi keselamatan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_17, 'kode' => 'HUB.02.17.02', 'nama' => 'Penyuluhan, publikasi dan deseminasi keselamatan lalu lintas dan angkutan jalan, sungai, danau, dan penyebrangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_17, 'kode' => 'HUB.02.17.03', 'nama' => 'Kemitraan keselamatan antar lembaga dan masyarakat di bidang keselamatan lalu lintas dan angkutan jalan, sungai, danau dan penyebrangan.', 'sifat' => 'B'],

            ['parent_id' => $hub_2_18, 'kode' => 'HUB.02.18.01', 'nama' => 'Keselamatan pengusaha angkutan umum.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_18, 'kode' => 'HUB.02.18.02', 'nama' => 'Keselamatan awak kendaraan angkutan umum dan awak kapal sungai dan danau.', 'sifat' => 'B'],

            ['parent_id' => $hub_2_19, 'kode' => 'HUB.02.19.01', 'nama' => 'Pedoman audit keselamatan sarana, prasarana, sumber daya manusia.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_19, 'kode' => 'HUB.02.19.02', 'nama' => 'Identifikasi daerah rawan kecelakaan jalan dan pelaku transportasi jalan dan sungai, danau dan penyebrangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_19, 'kode' => 'HUB.02.19.03', 'nama' => 'Audit faktor keselamatan lalu lintas dan angkutan jalan, sungai, danau dan penyebrangan serta laik fungsi jalan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_19, 'kode' => 'HUB.02.19.04', 'nama' => 'Pedoman keselamatan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_19, 'kode' => 'HUB.02.19.05', 'nama' => 'Inspeksi keselamatan sarana, prasarana, sumber daya manusia, dan pelaku ransportasi jalan sungai, danau dan penyebrangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_2_19, 'kode' => 'HUB.02.19.06', 'nama' => 'Investigasi kecelakaan sungai, danau dan penyebrangan serta laik fungsi jalan.', 'sifat' => 'B'],

            // ==========================================
            // BAWAH HUB.03 (Perhubungan Laut)
            // ==========================================
            ['parent_id' => $hub_3_01, 'kode' => 'HUB.03.01.01', 'nama' => 'Jaringan trayek berjadwal tetap dan teratur angkutan laut dalam negeri.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_01, 'kode' => 'HUB.03.01.02', 'nama' => 'Penempatan kapal dan pemberian persetujuan penetapan dispensasi syarat bendera kapal asing.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_01, 'kode' => 'HUB.03.01.03', 'nama' => 'Trayek tidak terjadwal tetap dan tidak teratur (trampel) angkutan laut dalam negeri.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_01, 'kode' => 'HUB.03.01.04', 'nama' => 'Usaha pelayaran rakyat.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_02, 'kode' => 'HUB.03.02.01', 'nama' => 'Pelayaran nasional dan asing yang menyelenggarakan angkutan laut dari Indonesia ke Negara-Negara Amerika, Eropa, Afrika dan sebaliknya.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_02, 'kode' => 'HUB.03.02.02', 'nama' => 'Kerjasama bilateral, regional dan multilateral di bidang angkutan laut.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_02, 'kode' => 'HUB.03.02.03', 'nama' => 'Persetujuan penetapan persyaratan agen umum dan perwakilan perusahaan pelayaran asing.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_02, 'kode' => 'HUB.03.02.04', 'nama' => 'Pelayaran nasional dan asing yang menyelenggarakan angkutan laut dari indonesia ke negara-negara di asia pasifik, australia dan sebaliknya.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_02, 'kode' => 'HUB.03.02.05', 'nama' => 'Kerjasama bilateral, sub-regional, regional dan multilateral di bidang angkutan laut.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_02, 'kode' => 'HUB.03.02.06', 'nama' => 'Persetujuan penetapan persyaratan agen umum dan perwakilan perusahaan pelayaran asing.', 'sifat' => 'B'], // Disimpan sesuai typo duplicate asli

            ['parent_id' => $hub_3_03, 'kode' => 'HUB.03.03.01', 'nama' => 'Operasional angkutan laut khusus pertambangan dan lepas pantai pariwisata dan tenaga kerja bongkar muat', 'sifat' => 'B'],
            ['parent_id' => $hub_3_03, 'kode' => 'HUB.03.03.02', 'nama' => 'Persetujuan penetapan dispensasi syarat bendera kapal asing angkutan laut khusus yang beroperasi di perairan Indonesia.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_03, 'kode' => 'HUB.03.03.03', 'nama' => 'Operasional angkutan laut khusus aneka industri, kehutanan, perikanan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_03, 'kode' => 'HUB.03.03.04', 'nama' => 'Persetujuan penetapan dispensasi syarat bendera kapal asing angkutan laut khusus yang beroperasi di perairan Indonesia serta penunjang angkutan laut.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_04, 'kode' => 'HUB.03.04.01', 'nama' => 'Pengembangan armada.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_04, 'kode' => 'HUB.03.04.02', 'nama' => 'Analisis ekonomis kebutuhan armada.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_04, 'kode' => 'HUB.03.04.03', 'nama' => 'Usaha angkutan laut dan tarif angkutan laut.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_04, 'kode' => 'HUB.03.04.04', 'nama' => 'Perizinan penyelenggaraan usaha pelayaran antar Provinsi/Internasional.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_04, 'kode' => 'HUB.03.04.05', 'nama' => 'Izin operasi angkutan laut khusus serta izin usaha angkutan multimoda.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_05, 'kode' => 'HUB.03.05.01', 'nama' => 'Pengolahan Data dan Informasi rencana kebutuhan angkutan laut pada waktu dan atau kondisi tertentu.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_05, 'kode' => 'HUB.03.05.02', 'nama' => 'Pengolahan Data dan Informasi angkutan bahan pokok.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_05, 'kode' => 'HUB.03.05.03', 'nama' => 'Evaluasi pelaksanaan kegiatan angkutan laut pada waktu dan atau kondisi tertentu.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_05, 'kode' => 'HUB.03.05.04', 'nama' => 'Evaluasi angkutan bahan pokok untuk kelancaran angkutan laut.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_06, 'kode' => 'HUB.03.06.01', 'nama' => 'Tatanan kepelabuhanan nasional.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_06, 'kode' => 'HUB.03.06.02', 'nama' => 'Pengumpulan dan evaluasi data dan informasi kepelabuhan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_06, 'kode' => 'HUB.03.06.03', 'nama' => 'Persetujuan penetapan lokasi pelabuhan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_06, 'kode' => 'HUB.03.06.04', 'nama' => 'Penyusunan laporan Direktorat.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_06, 'kode' => 'HUB.03.06.05', 'nama' => 'Rencana induk dan pengembangan pelabuhan.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_07, 'kode' => 'HUB.03.07.01', 'nama' => 'Perancangan teknis fasilitas dan peralatan pelabuhan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_07, 'kode' => 'HUB.03.07.02', 'nama' => 'Survei topografi dan hidro-oceanografi dan geoteknik.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_07, 'kode' => 'HUB.03.07.03', 'nama' => 'Persetujuan desain, pembangunan fasilitas dan peralatan pelabuhan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_07, 'kode' => 'HUB.03.07.04', 'nama' => 'Pembangunan dan perawatan fasilitas dan peralatan pelabuhan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_07, 'kode' => 'HUB.03.07.05', 'nama' => 'Sertifikasi fasilitas dan peralatan pelabuhan.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_08, 'kode' => 'HUB.03.08.01', 'nama' => 'Perancangan dan survei teknis pelaksanaan pengerukan dan reklamasi.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_08, 'kode' => 'HUB.03.08.02', 'nama' => 'Perizinan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_08, 'kode' => 'HUB.03.08.03', 'nama' => 'Penggunaan kapal dan alat bantu keruk.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_08, 'kode' => 'HUB.03.08.04', 'nama' => 'Pekerjaan pengerukan dan reklamasi.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_09, 'kode' => 'HUB.03.09.01', 'nama' => 'Penetapan wilayah perairan pandu.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_09, 'kode' => 'HUB.03.09.02', 'nama' => 'Standar pelayanan pemanduan dan penundaan kapal.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_09, 'kode' => 'HUB.03.09.03', 'nama' => 'Kualifikasi dan sertifikasi tenaga pandu.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_09, 'kode' => 'HUB.03.09.04', 'nama' => 'Standardisasi sarana bantu pemanduan.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_10, 'kode' => 'HUB.03.10.01', 'nama' => 'Tarif jasa kepelabuhan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_10, 'kode' => 'HUB.03.10.02', 'nama' => 'Kinerja pelayaran pelabuhan dan penetapan pelabuhan terbuka untuk perdagangan luar negeri.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_10, 'kode' => 'HUB.03.10.03', 'nama' => 'Penetapan batas daerah lingkungan kerja dan daerah lingkungan kepentingn.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_10, 'kode' => 'HUB.03.10.04', 'nama' => 'Penggunaan atas tanah dan perairan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_10, 'kode' => 'HUB.03.10.05', 'nama' => 'Kerjasama pelabuhan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_10, 'kode' => 'HUB.03.10.06', 'nama' => 'Persetujuan pengoperasian pelabuhan.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_11, 'kode' => 'HUB.03.11.01', 'nama' => 'Konstruksi dan Stabilitas Kapal.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_11, 'kode' => 'HUB.03.11.02', 'nama' => 'Rancang bangun dan pemasukan kapal.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_12, 'kode' => 'HUB.03.12.01', 'nama' => 'Pengukuran kapal.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_12, 'kode' => 'HUB.03.12.02', 'nama' => 'Pendaftaran dan kebangsaan kapal.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_13, 'kode' => 'HUB.03.13.01', 'nama' => 'Penilikan Keselamatan Kapal.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_13, 'kode' => 'HUB.03.13.02', 'nama' => 'Sertifikasi Keselamatan Kapal.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_14, 'kode' => 'HUB.03.14.01', 'nama' => 'Pencegahan dan Ganti Rugi Pencemaran.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_14, 'kode' => 'HUB.03.14.02', 'nama' => 'Manajemen Keselamatan Kapal.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_15, 'kode' => 'HUB.03.15.01', 'nama' => 'Pengawakan dan Perlindungan Awak Kapal', 'sifat' => 'B'],
            ['parent_id' => $hub_3_15, 'kode' => 'HUB.03.15.02', 'nama' => 'Standardisasi dan Sertifikasi Pelaut', 'sifat' => 'B'],

            ['parent_id' => $hub_3_16, 'kode' => 'HUB.03.16.01', 'nama' => 'Pemberian ijin spesifikasi teknis sarana bantu navigasi pelayaran.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_16, 'kode' => 'HUB.03.16.02', 'nama' => 'Pengamatan laut dan survei alur pelayaran.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_16, 'kode' => 'HUB.03.16.03', 'nama' => 'Penandaan daerah terbatas dan terlarang.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_16, 'kode' => 'HUB.03.16.04', 'nama' => 'Daerah ship to ship.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_16, 'kode' => 'HUB.03.16.05', 'nama' => 'Maklumat pelayaran bahaya navigasi.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_16, 'kode' => 'HUB.03.16.06', 'nama' => 'Design sistem rute dan tata cara berlalu lintas.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_16, 'kode' => 'HUB.03.16.07', 'nama' => 'Peralatan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_16, 'kode' => 'HUB.03.16.08', 'nama' => 'Perencanaan pembangunan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_16, 'kode' => 'HUB.03.16.09', 'nama' => 'Replacement.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_16, 'kode' => 'HUB.03.16.10', 'nama' => 'Perbaikan dan pemeliharaan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_16, 'kode' => 'HUB.03.16.11', 'nama' => 'Gambar design konstruksi.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_16, 'kode' => 'HUB.03.16.12', 'nama' => 'Kelainan dan keandalan sarana bantu navigasi pelayaran dan koreksi peta laut.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_17, 'kode' => 'HUB.03.17.01', 'nama' => 'Penyusunan kinerja stasiun radio pantai.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_17, 'kode' => 'HUB.03.17.02', 'nama' => 'Stasiun radio kapal dan sarana bantu navigasi pelayaran elektronika.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_17, 'kode' => 'HUB.03.17.03', 'nama' => 'Pemberian rekomendasi ijin radio telekomunikasi pelayaran.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_17, 'kode' => 'HUB.03.17.04', 'nama' => 'Ijin identifikasi untuk dinas bergerak pelayaran.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_17, 'kode' => 'HUB.03.17.05', 'nama' => 'Ijin kuasa perhitungan jasa telekomunikasi pelayaran.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_17, 'kode' => 'HUB.03.17.06', 'nama' => 'Perencanaan bangunan gedung.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_17, 'kode' => 'HUB.03.17.07', 'nama' => 'Sistem jaringan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_17, 'kode' => 'HUB.03.17.08', 'nama' => 'Peralatan dan suku cadang.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_17, 'kode' => 'HUB.03.17.09', 'nama' => 'Pemeliharaan dan perbaikan peralatan telekomunikasi pelayaran.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_17, 'kode' => 'HUB.03.17.07', 'nama' => 'Penilaian teknis.', 'sifat' => 'B'], // Disimpan sesuai typo duplicate asli nomor 07

            ['parent_id' => $hub_3_18, 'kode' => 'HUB.03.18.01', 'nama' => 'Pengoperasian, pengawakan dan perbekalan kapal.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_18, 'kode' => 'HUB.03.18.02', 'nama' => 'Formasi dan penempatan kapal negara kenavigasian.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_18, 'kode' => 'HUB.03.18.03', 'nama' => 'Rancang bangun dan pembangunan kapal.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_18, 'kode' => 'HUB.03.18.03', 'nama' => 'Pemeliharaan dan penilaian teknis penghapusan kapal.', 'sifat' => 'B'], // Disimpan sesuai typo duplicate asli nomor 03
            ['parent_id' => $hub_3_18, 'kode' => 'HUB.03.18.04', 'nama' => 'Perlengkapan dan suku cadang kapal negara kenavigasian.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_19, 'kode' => 'HUB.03.19.01', 'nama' => 'Pemeliharaaan bangunan gedung:', 'sifat' => 'B'],
            ['parent_id' => $hub_3_19, 'kode' => 'HUB.03.19.02', 'nama' => 'Lokasi pembangunan dan fasilitas pangkalan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_19, 'kode' => 'HUB.03.19.03', 'nama' => 'Penilaian teknis fasilitas pangkalan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_19, 'kode' => 'HUB.03.19.04', 'nama' => 'Rencana kebutuhan peralatan suku cadang bengkel.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_19, 'kode' => 'HUB.03.19.05', 'nama' => 'Pemeliharaan, perbaikan dan penilaian teknis.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_19, 'kode' => 'HUB.03.19.06', 'nama' => 'Peralatan galangan dan bengkel.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_20, 'kode' => 'HUB.03.20.01', 'nama' => 'Penyusunan rencana dan program kerja.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_20, 'kode' => 'HUB.03.20.02', 'nama' => 'Penyusunan rencana anggaran sarana dan prasarana kenavigasian.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_20, 'kode' => 'HUB.03.20.03', 'nama' => 'Pelaporan pelaksanaan rencana dan program kerja.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_20, 'kode' => 'HUB.03.20.04', 'nama' => 'Pelaporan pelaksanaan anggaran dan pembangunan sarana dan prasarana kenavigasian.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_21, 'kode' => 'HUB.03.21.01', 'nama' => 'Patroli.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_21, 'kode' => 'HUB.03.21.02', 'nama' => 'Penanganan perompakan dan pembajakan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_21, 'kode' => 'HUB.03.21.03', 'nama' => 'Sistem pelaporan kapal (Ships Reporting System).', 'sifat' => 'B'],
            ['parent_id' => $hub_3_21, 'kode' => 'HUB.03.21.04', 'nama' => 'Analisa kerawanan wilayah.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_21, 'kode' => 'HUB.03.21.05', 'nama' => 'Penegakkan peraturan perundang-undangan di laut, pantai dan pelabuhan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_21, 'kode' => 'HUB.03.21.06', 'nama' => 'Penetapan kualifikasi teknis petugas patroli.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_21, 'kode' => 'HUB.03.21.07', 'nama' => 'Pengamanan sarana dan prasarana transportasi (ISPS Code) di laut, pantai, dan pelabuhan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_21, 'kode' => 'HUB.03.21.08', 'nama' => 'Perijinan penggunaan, pendistribusian amunisi dan senjata api.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_21, 'kode' => 'HUB.03.21.09', 'nama' => 'Penetapan kualifikasi teknis petugas pengamanan.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_22, 'kode' => 'HUB.03.22.01', 'nama' => 'Advokasi dan diseminasi pengawasan keselamatan pelayaran.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_22, 'kode' => 'HUB.03.22.02', 'nama' => 'Penetapan kualifikasi teknis petugas advokasi dan diseminasi.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_22, 'kode' => 'HUB.03.22.03', 'nama' => 'Penyelidikan, penyidikan, dan serta pengajuan berkas perkara pelanggaran dan tindak pidana pelayaran.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_22, 'kode' => 'HUB.03.22.04', 'nama' => 'Penetapan kualifikasi teknis petugas Penyidik Pegawai Negeri Sipil.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_23, 'kode' => 'HUB.03.23.01', 'nama' => 'Pengawasan penanganan muatan berbahaya.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_23, 'kode' => 'HUB.03.23.02', 'nama' => 'Tertib lalulintas kapal dan tertib Bandar.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_23, 'kode' => 'HUB.03.23.03', 'nama' => 'Izin berlayar.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_23, 'kode' => 'HUB.03.23.04', 'nama' => 'Pengawasan kapal asing.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_23, 'kode' => 'HUB.03.23.05', 'nama' => 'Penetapan kualifikasi teknis petugas kesyahbandaran.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_23, 'kode' => 'HUB.03.23.06', 'nama' => 'Port State Control Officer.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_23, 'kode' => 'HUB.03.23.07', 'nama' => 'Pengawasan penanganan muatan berbahaya.', 'sifat' => 'B'], // Disimpan sesuai typo duplicate asli nomor 07
            ['parent_id' => $hub_3_23, 'kode' => 'HUB.03.23.08', 'nama' => 'Pengusutan kecelakaan dan bencana kapal.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_23, 'kode' => 'HUB.03.23.09', 'nama' => 'Pengajuan pemeriksaan lanjutan perkara pelaksanaan eksekusi putusan Mahkamah Pelayaran dan pelaporan ke International Maritime Organization.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_23, 'kode' => 'HUB.03.23.10', 'nama' => 'Penetapan kualifikasi teknis petugas penanganan pemrosesan kecelakaan kapal.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_24, 'kode' => 'HUB.03.24.01', 'nama' => 'Search and rescue.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_24, 'kode' => 'HUB.03.24.02', 'nama' => 'Penanggulangan pencemaran.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_24, 'kode' => 'HUB.03.24.03', 'nama' => 'Tuntutan ganti kerugian pencemaran dan pemadaman kebakaran penetapan kualifikasi teknis petugas Search And Rescue, pemadam kebakaran.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_24, 'kode' => 'HUB.03.24.04', 'nama' => 'Pendirian perubahan dan pembongkaran bangunan dan instalasi di perairan.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_24, 'kode' => 'HUB.03.24.05', 'nama' => 'Kegiatan penyelaman.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_24, 'kode' => 'HUB.03.24.06', 'nama' => 'Penanganan kerangka kapal dan salvage.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_24, 'kode' => 'HUB.03.24.07', 'nama' => 'Penetapan kualifikasi teknis petugas penyelam.', 'sifat' => 'B'],

            ['parent_id' => $hub_3_25, 'kode' => 'HUB.03.25.01', 'nama' => 'Pengadaan dan pemeliharaan sarana dan prasarana operasional Kesatuan Penjagaan Laut dan Pantai.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_25, 'kode' => 'HUB.03.25.02', 'nama' => 'Pemeliharaan senjata api.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_25, 'kode' => 'HUB.03.25.03', 'nama' => 'Peningkatan kuantitas dan kualitas petugas di bidang awak kapal Penjagaan Laut dan Pantai.', 'sifat' => 'B'],
            ['parent_id' => $hub_3_25, 'kode' => 'HUB.03.25.04', 'nama' => 'Penyiapan rencana, program kerja dan laporan Direktorat.', 'sifat' => 'B'],

            // ==========================================
            // BAWAH HUB.04 (Perhubungan Udara)
            // ==========================================
            ['parent_id' => $hub_4_01, 'kode' => 'HUB.04.01.01', 'nama' => 'Sistem, rute, jaringan penerbangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_01, 'kode' => 'HUB.04.01.02', 'nama' => 'Kapasitas angkutan udara.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_01, 'kode' => 'HUB.04.01.03', 'nama' => 'Angkutan multimoda.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_01, 'kode' => 'HUB.04.01.04', 'nama' => 'Logistik dan National Single Window (NSW).', 'sifat' => 'B'],
            ['parent_id' => $hub_4_01, 'kode' => 'HUB.04.01.05', 'nama' => 'Pelayanan penunjang angkutan udara.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_01, 'kode' => 'HUB.04.01.06', 'nama' => 'On time performance perusahaan angkutan udara.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_01, 'kode' => 'HUB.04.01.07', 'nama' => 'Pelayanan pengangkutan kargo.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_01, 'kode' => 'HUB.04.01.08', 'nama' => 'Angkutan multimoda dan logistic.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_01, 'kode' => 'HUB.04.01.09', 'nama' => 'Ranking peningkatan kinerja pelayanan angkutan udara.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_02, 'kode' => 'HUB.04.02.01', 'nama' => 'Angkutan Udara Niaga Berjadwal Dalam Negeri.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_02, 'kode' => 'HUB.04.02.02', 'nama' => 'Angkutan Udara Niaga Berjadwal Luar Negeri.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_03, 'kode' => 'HUB.04.03.01', 'nama' => 'Angkutan Udara Niaga Tidak Berjadwal dan Non Niaga Dalam Negeri.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_03, 'kode' => 'HUB.04.03.02', 'nama' => 'Angkutan Udara Niaga Tidak Berjadwal dan Non Niaga Luar Negeri.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_04, 'kode' => 'HUB.04.04.01', 'nama' => 'Pemberian persetujuan kerjasama bilateral di bidang angkutan udara dan - kerjasama perusahaan angkutan udara.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_04, 'kode' => 'HUB.04.04.02', 'nama' => 'Pengawasan dan penegakan hukum.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_04, 'kode' => 'HUB.04.04.03', 'nama' => 'Perjanjian dan kerjasama multilateral dan lembaga internasional di bidang angkutan udara.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_04, 'kode' => 'HUB.04.04.04', 'nama' => 'Koordinasi dan pertemuan dengan instansi terkait untuk fasilitasi pelayanan angkutan udara internasional.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_05, 'kode' => 'HUB.04.05.01', 'nama' => 'Bimbingan Usaha Angkutan Udara .', 'sifat' => 'B'],
            ['parent_id' => $hub_4_05, 'kode' => 'HUB.04.05.02', 'nama' => 'Tarif Jasa Pelayanan Angkutan Udara.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_06, 'kode' => 'HUB.04.06.01', 'nama' => 'Pemberian ijin dan/atau persetujuan dan/atau rekomendasi di bidang tata bandar udara.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_06, 'kode' => 'HUB.04.06.02', 'nama' => 'Pengawasan dan penegakan hukum.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_06, 'kode' => 'HUB.04.06.03', 'nama' => 'Pemberian ijin dan/atau persetujuan dan/atau rekomendasi di bidang tata lingkungan dan kawasan bandar udara.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_06, 'kode' => 'HUB.04.06.04', 'nama' => 'Pengawasan dan penegakan hukum.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_07, 'kode' => 'HUB.04.07.01', 'nama' => 'Pengawasan dan penegakan hokum.', 'sifat' => 'B'], // Typo asli hokum
            ['parent_id' => $hub_4_07, 'kode' => 'HUB.04.07.02', 'nama' => 'Program dan standarisasi prasarana bandar udara.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_07, 'kode' => 'HUB.04.07.03', 'nama' => 'Pemberian ijin dan/atau sertifikasi di bidang verifikasi prasarana bandar udara.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_07, 'kode' => 'HUB.04.07.04', 'nama' => 'Pengawasan dan penegakan hukum.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_08, 'kode' => 'HUB.04.08.01', 'nama' => 'Program dan standarisasi peralatan dan utilitas Bandar udara.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_08, 'kode' => 'HUB.04.08.02', 'nama' => 'Pemberian sertifikasi dan/atau perijinan di bidang verifikasi peralatan dan utilitas bandar udara.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_08, 'kode' => 'HUB.04.08.03', 'nama' => 'Pengawasan dan penegakan hukum.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_09, 'kode' => 'HUB.04.09.01', 'nama' => 'Pemberian lisensi/validasi dan/atau sertifikasi/register di bidang sertifikasi personel dan operasi bandar udara.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_09, 'kode' => 'HUB.04.09.02', 'nama' => 'Pengawasan Personel dan Operasi Bandar Udara.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_10, 'kode' => 'HUB.04.10.01', 'nama' => 'Pemberian ijin di bidang kerjasama penyelenggaraan bandar udara.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_10, 'kode' => 'HUB.04.10.02', 'nama' => 'Pengawasan, pengendalian dan penegakan.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_10, 'kode' => 'HUB.04.10.03', 'nama' => 'Verifikasi penyelenggaraan bandar udara.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_10, 'kode' => 'HUB.04.10.04', 'nama' => 'Pengawasan, pengendalian dan penegakan.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_11, 'kode' => 'HUB.04.11.01', 'nama' => 'Pemberian persetujuan di bidang standarisasi keamanan penerbangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_11, 'kode' => 'HUB.04.11.02', 'nama' => 'Penanganan pengangkutan barang berbahaya dan pelayanan darurat.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_11, 'kode' => 'HUB.04.11.03', 'nama' => 'Pemberian ijin dan/atau persetujuan di bidang keamanan penerbangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_11, 'kode' => 'HUB.04.11.04', 'nama' => 'Program keamanan bandar udara (airport contingency plan).', 'sifat' => 'B'],

            ['parent_id' => $hub_4_12, 'kode' => 'HUB.04.12.01', 'nama' => 'Pemberian sertifikasi di bidang personel PKP-PK dan salvage.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_12, 'kode' => 'HUB.04.12.02', 'nama' => 'Pemberian lisensi dan persetujuan di bidang personel PKP-PK dan salvage.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_12, 'kode' => 'HUB.04.12.03', 'nama' => 'Pemberian sertifikasi di bidang fasilitas pelayanan darurat.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_13, 'kode' => 'HUB.04.13.01', 'nama' => 'Bimbingan Teknis Penyidik Pegawai Negeri Sipil.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_13, 'kode' => 'HUB.04.13.02', 'nama' => 'Personel Keamanan Penerbangan.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_14, 'kode' => 'HUB.04.14.01', 'nama' => 'Pemberian sertifikasi di bidang fasilitas keamanan penerbangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_14, 'kode' => 'HUB.04.14.02', 'nama' => 'Pengendalian di bidang fasilitas keamanan penerbangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_14, 'kode' => 'HUB.04.14.03', 'nama' => 'Pemberian lisensi di bidang personel fasilitas keamanan penerbangan dan personel penanganan pengangkutan barang berbahaya.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_15, 'kode' => 'HUB.04.15.01', 'nama' => 'Regulated agent.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_15, 'kode' => 'HUB.04.15.02', 'nama' => 'Ijin Penyelenggaraan Diklat KP dan DG.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_15, 'kode' => 'HUB.04.15.03', 'nama' => 'Kerjasama Luar Negeri.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_15, 'kode' => 'HUB.04.15.04', 'nama' => 'Pas Bandara.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_15, 'kode' => 'HUB.04.15.05', 'nama' => 'ICAO, JICA, CASP, Air Marshall.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_15, 'kode' => 'HUB.04.15.06', 'nama' => 'Undangan.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_16, 'kode' => 'HUB.04.16.01', 'nama' => 'Kendali mutu keamanan bandar udara, pengangkutan barang berbahaya, dan pelayanan darurat.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_16, 'kode' => 'HUB.04.16.02', 'nama' => 'Pengawasan, pengendalian dan penegakan hukum.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_16, 'kode' => 'HUB.04.16.03', 'nama' => 'Kendali mutu keamanan angkutan udara, pengangktan barang berbahaya, dan pelayanan darurat.', 'sifat' => 'B'], // Typo asli pengangktan
            ['parent_id' => $hub_4_16, 'kode' => 'HUB.04.16.04', 'nama' => 'Pengawasan, pengendalian dan penegakan hukum.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_17, 'kode' => 'HUB.04.17.01', 'nama' => 'Manajemen Ruang Udara.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_17, 'kode' => 'HUB.04.17.02', 'nama' => 'Pelayanan Lalu Lintas Penerbangan.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_18, 'kode' => 'HUB.04.18.01', 'nama' => 'Kartografi Penerbangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_18, 'kode' => 'HUB.04.18.02', 'nama' => 'Publikasi Infomasi Aeronautika.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_19, 'kode' => 'HUB.04.19.01', 'nama' => 'Operasi Komunikasi Penerbangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_19, 'kode' => 'HUB.04.19.02', 'nama' => 'Jaringan dan Peralatan Komunikasi Penerbangan.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_20, 'kode' => 'HUB.04.20.01', 'nama' => 'Fasilitas Bantu Navigasi Penerbangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_20, 'kode' => 'HUB.04.20.02', 'nama' => 'Fasilitas Pengamatan Penerbangan.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_21, 'kode' => 'HUB.04.21.01', 'nama' => 'Standarisasi Navigasi Penerbangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_21, 'kode' => 'HUB.04.21.02', 'nama' => 'Sertifikasi Navigasi Penerbangan.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_22, 'kode' => 'HUB.04.22.01', 'nama' => 'Pemberian sertifikasi di bidang standarisasi teknik.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_22, 'kode' => 'HUB.04.22.02', 'nama' => 'Program pencegahan insiden dan kecelakaan.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_22, 'kode' => 'HUB.04.22.03', 'nama' => 'Pengawasan dan penegakan hukum.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_22, 'kode' => 'HUB.04.22.04', 'nama' => 'Pemberian sertifikasi di bidang standarisasi operasi penerbangan.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_22, 'kode' => 'HUB.04.22.05', 'nama' => 'Pengawasan dan penegakan hukum.', 'sifat' => 'B'],

            ['parent_id' => $hub_4_23, 'kode' => 'HUB.04.23.01', 'nama' => 'Pengawasan Proses Rekayasa.', 'sifat' => 'B'],
            
        ]);
        // ==============================================================================
        // LANJUTAN URUSAN SUBTANTIF: HUB (Perhubungan Udara & Perkeretaapian)
        // ==============================================================================
        $id_hub = DB::table('klasifikasis')->where('kode', 'HUB')->value('id');
        $hub_4 = DB::table('klasifikasis')->where('kode', 'HUB.04')->value('id');

        // --- TAMBAHAN LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_hub, 'kode' => 'HUB.05', 'nama' => 'Perkeretaapian:', 'sifat' => 'B'],
        ]);

        $hub_5 = DB::table('klasifikasis')->where('kode', 'HUB.05')->value('id');

        // --- TAMBAHAN LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Sisa dari HUB.04 (Perhubungan Udara)
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.24', 'nama' => 'Produk Aeronautika:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.25', 'nama' => 'Operasi Pesawat Udara:', 'sifat' => 'B'],
            ['parent_id' => $hub_4, 'kode' => 'HUB.04.26', 'nama' => 'Perawatan:', 'sifat' => 'B'],

            // Bawah HUB.05 (Perkeretaapian)
            ['parent_id' => $hub_5, 'kode' => 'HUB.05.01', 'nama' => 'Jaringan:', 'sifat' => 'B'],
            ['parent_id' => $hub_5, 'kode' => 'HUB.05.02', 'nama' => 'Lalu Lintas:', 'sifat' => 'B'],
            ['parent_id' => $hub_5, 'kode' => 'HUB.05.03', 'nama' => 'Angkutan:', 'sifat' => 'B'],
            ['parent_id' => $hub_5, 'kode' => 'HUB.05.04', 'nama' => 'Investasi:', 'sifat' => 'B'],
            ['parent_id' => $hub_5, 'kode' => 'HUB.05.05', 'nama' => 'Jalur dan Bangunan Kereta Api:', 'sifat' => 'B'],
            ['parent_id' => $hub_5, 'kode' => 'HUB.05.06', 'nama' => 'Fasilitas Operasi Kereta Api:', 'sifat' => 'B'],
            ['parent_id' => $hub_5, 'kode' => 'HUB.05.07', 'nama' => 'Pengujian dan Sertifikasi Jalur dan Bangunan Kereta Api:', 'sifat' => 'B'],
            ['parent_id' => $hub_5, 'kode' => 'HUB.05.08', 'nama' => 'Pengujian dan Sertifikasi Fasilitas Operasi Kereta Api:', 'sifat' => 'B'],
            ['parent_id' => $hub_5, 'kode' => 'HUB.05.09', 'nama' => 'Pengembangan Sarana:', 'sifat' => 'B'],
            ['parent_id' => $hub_5, 'kode' => 'HUB.05.10', 'nama' => 'Pengawasan Sarana:', 'sifat' => 'B'],
            ['parent_id' => $hub_5, 'kode' => 'HUB.05.11', 'nama' => 'Pengelolaan Sarana Milik Negara:', 'sifat' => 'B'],
            ['parent_id' => $hub_5, 'kode' => 'HUB.05.12', 'nama' => 'Pengujian dan Sertifikasi Sarana Wilayah I:', 'sifat' => 'B'],
            ['parent_id' => $hub_5, 'kode' => 'HUB.05.13', 'nama' => 'Audit dan Peningkatan Keselamatan:', 'sifat' => 'B'],
            ['parent_id' => $hub_5, 'kode' => 'HUB.05.14', 'nama' => 'Analisis dan Penanganan Kecelakaan:', 'sifat' => 'B'],
            ['parent_id' => $hub_5, 'kode' => 'HUB.05.15', 'nama' => 'Akreditasi Kelembagaan dan Sertifikasi SDM:', 'sifat' => 'B'],
            ['parent_id' => $hub_5, 'kode' => 'HUB.05.16', 'nama' => 'Penegakan Hukum:', 'sifat' => 'B'],
        ]);

        // ==============================================================================
        // MENGAMBIL ID LEVEL 3 UNTUK MEMASUKAN LEVEL CICIT (LEVEL 4)
        // ==============================================================================
        $hub_4_23 = DB::table('klasifikasis')->where('kode', 'HUB.04.23')->value('id'); // Ambil dari seeder sebelumnya
        $hub_4_24 = DB::table('klasifikasis')->where('kode', 'HUB.04.24')->value('id');
        $hub_4_25 = DB::table('klasifikasis')->where('kode', 'HUB.04.25')->value('id');
        $hub_4_26 = DB::table('klasifikasis')->where('kode', 'HUB.04.26')->value('id');

        $hub_5_01 = DB::table('klasifikasis')->where('kode', 'HUB.05.01')->value('id');
        $hub_5_02 = DB::table('klasifikasis')->where('kode', 'HUB.05.02')->value('id');
        $hub_5_03 = DB::table('klasifikasis')->where('kode', 'HUB.05.03')->value('id');
        $hub_5_04 = DB::table('klasifikasis')->where('kode', 'HUB.05.04')->value('id');
        $hub_5_05 = DB::table('klasifikasis')->where('kode', 'HUB.05.05')->value('id');
        $hub_5_06 = DB::table('klasifikasis')->where('kode', 'HUB.05.06')->value('id');
        $hub_5_07 = DB::table('klasifikasis')->where('kode', 'HUB.05.07')->value('id');
        $hub_5_08 = DB::table('klasifikasis')->where('kode', 'HUB.05.08')->value('id');
        $hub_5_09 = DB::table('klasifikasis')->where('kode', 'HUB.05.09')->value('id');
        $hub_5_10 = DB::table('klasifikasis')->where('kode', 'HUB.05.10')->value('id');
        $hub_5_11 = DB::table('klasifikasis')->where('kode', 'HUB.05.11')->value('id');
        $hub_5_12 = DB::table('klasifikasis')->where('kode', 'HUB.05.12')->value('id');
        $hub_5_13 = DB::table('klasifikasis')->where('kode', 'HUB.05.13')->value('id');
        $hub_5_14 = DB::table('klasifikasis')->where('kode', 'HUB.05.14')->value('id');
        $hub_5_15 = DB::table('klasifikasis')->where('kode', 'HUB.05.15')->value('id');
        $hub_5_16 = DB::table('klasifikasis')->where('kode', 'HUB.05.16')->value('id');

        // --- TAMBAHAN LEVEL CICIT (Level 4) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Lanjutan HUB.04.23 (dari foto sebelumnya yang nyempil di atas halaman)
            ['parent_id' => $hub_4_23, 'kode' => 'HUB.04.23.02', 'nama' => 'Uji Terbang dan Kemampuan Pesawat Udara.', 'sifat' => 'B'],

            // Bawah HUB.04.24
            ['parent_id' => $hub_4_24, 'kode' => 'HUB.04.24.01', 'nama' => 'Pengawasan Mutu dan Proses Produksi.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_24, 'kode' => 'HUB.04.24.02', 'nama' => 'Pengesahan Produksi.', 'sifat' => 'B'],

            // Bawah HUB.04.25
            ['parent_id' => $hub_4_25, 'kode' => 'HUB.04.25.01', 'nama' => 'Pengawasan Operasi Pesawat Udara.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_25, 'kode' => 'HUB.04.25.02', 'nama' => 'Personel Operasi Pesawat Udara.', 'sifat' => 'B'],

            // Bawah HUB.04.26
            ['parent_id' => $hub_4_26, 'kode' => 'HUB.04.26.01', 'nama' => 'Perawatan Pesawat Udara.', 'sifat' => 'B'],
            ['parent_id' => $hub_4_26, 'kode' => 'HUB.04.26.02', 'nama' => 'Personel Teknik Perawatan.', 'sifat' => 'B'],

            // ==========================================
            // BAWAH HUB.05 (Perkeretaapian)
            // ==========================================
            // Bawah HUB.05.01
            ['parent_id' => $hub_5_01, 'kode' => 'HUB.05.01.01', 'nama' => 'Penataan Jaringan.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_01, 'kode' => 'HUB.05.01.02', 'nama' => 'Pengembangan Jaringan.', 'sifat' => 'B'],

            // Bawah HUB.05.02
            ['parent_id' => $hub_5_02, 'kode' => 'HUB.05.02.01', 'nama' => 'Lalu Lintas Antarkota.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_02, 'kode' => 'HUB.05.02.02', 'nama' => 'Lalu Lintas Perkotaan.', 'sifat' => 'B'],

            // Bawah HUB.05.03
            ['parent_id' => $hub_5_03, 'kode' => 'HUB.05.03.01', 'nama' => 'Angkutan Antarkota.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_03, 'kode' => 'HUB.05.03.02', 'nama' => 'Angkutan Perkotaan.', 'sifat' => 'B'],

            // Bawah HUB.05.04
            ['parent_id' => $hub_5_04, 'kode' => 'HUB.05.04.01', 'nama' => 'Penyelenggaraan Kerjasama.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_04, 'kode' => 'HUB.05.04.02', 'nama' => 'Pengembangan Usaha.', 'sifat' => 'B'],

            // Bawah HUB.05.05
            ['parent_id' => $hub_5_05, 'kode' => 'HUB.05.05.01', 'nama' => 'Pembangunan, perawatan dan pengusahaan jalan rel dan tanah kereta api perhitungan biaya perawatan, pengoperasian dan pengusahaan jalan rel dan tanah kereta api.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_05, 'kode' => 'HUB.05.05.02', 'nama' => 'Penetapan rancang bangun.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_05, 'kode' => 'HUB.05.05.03', 'nama' => 'Penempatan dan atau penyimpanan peralatan suku cadang jalan rel.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_05, 'kode' => 'HUB.05.05.04', 'nama' => 'Pengesahan kualitas material baru jalan rel.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_05, 'kode' => 'HUB.05.05.05', 'nama' => 'Akreditasi pelaksana jasa konsultansi serta konstruksi.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_05, 'kode' => 'HUB.05.05.06', 'nama' => 'Pembangunan, perawatan dan pengusahaan jalan rel dan tanah kereta api perhitungan biaya perawatan, pengoperasian dan pengusahaan jalan rel.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_05, 'kode' => 'HUB.05.05.07', 'nama' => 'Tanah kereta api.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_05, 'kode' => 'HUB.05.05.08', 'nama' => 'Penetapan rancang bangun.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_05, 'kode' => 'HUB.05.05.09', 'nama' => 'Penempatan dan atau penyimpanan peralatan suku cadang jalan rel.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_05, 'kode' => 'HUB.05.05.10', 'nama' => 'Pengesahan kualitas material baru jalan rel.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_05, 'kode' => 'HUB.05.05.11', 'nama' => 'Akreditasi pelaksana jasa konsultansi serta konstruksi.', 'sifat' => 'B'],

            // Bawah HUB.05.06
            ['parent_id' => $hub_5_06, 'kode' => 'HUB.05.06.01', 'nama' => 'Pembangunan, pengoperasian, perawatan dan pengusahaan persinyalan.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_06, 'kode' => 'HUB.05.06.02', 'nama' => 'Pelistrikan perhitungan dan perawatan, pengoperasian dan pengusahaan telekomunikasi.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_06, 'kode' => 'HUB.05.06.03', 'nama' => 'Penetapan rancang bangun.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_06, 'kode' => 'HUB.05.06.04', 'nama' => 'Penempatan dan atau penyimpanan peralatan suku cadang telekomunikasi dan pelistrikan.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_06, 'kode' => 'HUB.05.06.05', 'nama' => 'Pengesahan kualitas material baru telekomunikasi dan pelistrikan.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_06, 'kode' => 'HUB.05.06.06', 'nama' => 'Akreditasi pelaksana jasa konsultansi serta konstruksi telekomunikasi dan pelistrikan.', 'sifat' => 'B'],

            // Bawah HUB.05.07
            ['parent_id' => $hub_5_07, 'kode' => 'HUB.05.07.01', 'nama' => 'Pengujian pertama jalur dan bangunan serta stasiun kereta api.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_07, 'kode' => 'HUB.05.07.02', 'nama' => 'Pengesahan hasil uji.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_07, 'kode' => 'HUB.05.07.03', 'nama' => 'Pengesahan kualitas material untuk jalur dan bangunan serta stasiun kereta api yang digunakan dalam pengujian jalur dan bangunan kereta api serta stasiun kereta api.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_07, 'kode' => 'HUB.05.07.04', 'nama' => 'Penyusunan kebutuhan suku cadang dan komponen peralatan pengujian jalur dan bangunan kereta api serta stasiun kereta api.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_07, 'kode' => 'HUB.05.07.05', 'nama' => 'Pengusahaan fasilitas peralatan pengujian jalur dan bangunan kereta api serta stasiun kereta api.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_07, 'kode' => 'HUB.05.07.06', 'nama' => 'Penyiapan kebutuhan atau pemberdayaan kembali suku cadang fasilitas pengujian jalur dan bangunan kereta api serta stasiun kereta api.', 'sifat' => 'B'],

            // Bawah HUB.05.08
            ['parent_id' => $hub_5_08, 'kode' => 'HUB.05.08.01', 'nama' => 'Pemeliharaan, pemeriksaan dan pengujian fasilitas operasi kereta api.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_08, 'kode' => 'HUB.05.08.02', 'nama' => 'Pengesahan hasil uji.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_08, 'kode' => 'HUB.05.08.03', 'nama' => 'Pengesahan kualitas material untuk fasilitas operasi kereta api.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_08, 'kode' => 'HUB.05.08.04', 'nama' => 'Penyusunan kebutuhan suku cadang dan komponen peralatan pengujian jalur dan bangunan kereta api serta stasiun kereta api fasilitas operasi kereta api.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_08, 'kode' => 'HUB.05.08.05', 'nama' => 'Pengusahaan fasilitas peralatan pengujian fasilitas operasi kereta api.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_08, 'kode' => 'HUB.05.08.06', 'nama' => 'Penyiapan kebutuhan atau pemberdayaan kembali suku cadang fasilitas pengujian jalur dan bangunan kereta api serta stasiun kereta api.', 'sifat' => 'B'],

            // Bawah HUB.05.09
            ['parent_id' => $hub_5_09, 'kode' => 'HUB.05.09.01', 'nama' => 'Rancang Bangun dan Rekayasa.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_09, 'kode' => 'HUB.05.09.02', 'nama' => 'Pengendalian Mutu.', 'sifat' => 'B'],

            // Bawah HUB.05.10
            ['parent_id' => $hub_5_10, 'kode' => 'HUB.05.10.01', 'nama' => 'Pengawasan pengujian, pemeriksaan dan perawatan sarana.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_10, 'kode' => 'HUB.05.10.02', 'nama' => 'Pelaksanaan pengawasan pengujian, pemeriksaan dan perawatan sarana.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_10, 'kode' => 'HUB.05.10.03', 'nama' => 'Database dan pengembangan sistem informasi.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_10, 'kode' => 'HUB.05.10.04', 'nama' => 'Penyusunan standar peralatan dan fasilitas pendukung di balai yasa, depo, dan tempat pengujian.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_10, 'kode' => 'HUB.05.10.05', 'nama' => 'Database dan sistem informasi bidang fasilitas sarana perkeretaapian.', 'sifat' => 'B'],

            // Bawah HUB.05.11
            ['parent_id' => $hub_5_11, 'kode' => 'HUB.05.11.01', 'nama' => 'Pengoperasian sarana milik Negara.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_11, 'kode' => 'HUB.05.11.02', 'nama' => 'Pengadaan dan rehabilitasi sarana milik Negara.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_11, 'kode' => 'HUB.05.11.03', 'nama' => 'Database dan pengembangan sistem informasi sarana milik Negara.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_11, 'kode' => 'HUB.05.11.04', 'nama' => 'Pemeliharaan sarana milik Negara.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_11, 'kode' => 'HUB.05.11.05', 'nama' => 'Database dan pengembangan sistim informasi sarana milik Negara.', 'sifat' => 'B'], // Typo sistim

            // Bawah HUB.05.12
            ['parent_id' => $hub_5_12, 'kode' => 'HUB.05.12.01', 'nama' => 'Pengujian dan Sertifikasi Sarana Penggerak.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_12, 'kode' => 'HUB.05.12.02', 'nama' => 'Pengujian dan Sertifikasi Sarana Tanpa Penggerak.', 'sifat' => 'B'],

            // Bawah HUB.05.13
            ['parent_id' => $hub_5_13, 'kode' => 'HUB.05.13.01', 'nama' => 'Audit Keselamatan.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_13, 'kode' => 'HUB.05.13.02', 'nama' => 'Peningkatan Keselamatan.', 'sifat' => 'B'],

            // Bawah HUB.05.14
            ['parent_id' => $hub_5_14, 'kode' => 'HUB.05.14.01', 'nama' => 'Analisis Kecelakaan.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_14, 'kode' => 'HUB.05.14.02', 'nama' => 'Penanganan Kecelakaan.', 'sifat' => 'B'],

            // Bawah HUB.05.15
            ['parent_id' => $hub_5_15, 'kode' => 'HUB.05.15.01', 'nama' => 'Akreditasi Kelembagaan.', 'sifat' => 'B'],
            ['parent_id' => $hub_5_15, 'kode' => 'HUB.05.15.02', 'nama' => 'Sertifikasi Sumber Daya Manusia.', 'sifat' => 'B'],

            // Bawah HUB.05.16
            ['parent_id' => $hub_5_16, 'kode' => 'HUB.05.16.01', 'nama' => 'Bimbingan Teknis Penyidik Pegawai Negeri Sipil.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: PDT (Pembangunan Daerah Tertinggal)
        // ==============================================================================
        $id_pdt = DB::table('klasifikasis')->where('kode', 'PDT')->value('id') ?? DB::table('klasifikasis')->insertGetId(['kode' => 'PDT', 'nama' => 'Pembangunan Daerah Tertinggal:', 'sifat' => 'B']);

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_pdt, 'kode' => 'PDT.01', 'nama' => 'Pengembangan Sumber Daya:', 'sifat' => 'B'],
            ['parent_id' => $id_pdt, 'kode' => 'PDT.02', 'nama' => 'Peningkatan Infrastruktur:', 'sifat' => 'B'],
            ['parent_id' => $id_pdt, 'kode' => 'PDT.03', 'nama' => 'Pembinaan Ekonomi dan Dunia Usaha:', 'sifat' => 'B'],
            ['parent_id' => $id_pdt, 'kode' => 'PDT.04', 'nama' => 'Pembinaan Lembaga Sosial dan Budaya:', 'sifat' => 'B'],
            ['parent_id' => $id_pdt, 'kode' => 'PDT.05', 'nama' => 'Pengembangan Daerah Khusus:', 'sifat' => 'B'],
        ]);

        $pdt_1 = DB::table('klasifikasis')->where('kode', 'PDT.01')->value('id');
        $pdt_2 = DB::table('klasifikasis')->where('kode', 'PDT.02')->value('id');
        $pdt_3 = DB::table('klasifikasis')->where('kode', 'PDT.03')->value('id');
        $pdt_4 = DB::table('klasifikasis')->where('kode', 'PDT.04')->value('id');
        $pdt_5 = DB::table('klasifikasis')->where('kode', 'PDT.05')->value('id');

        // --- LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah PDT.01
            ['parent_id' => $pdt_1, 'kode' => 'PDT.01.01', 'nama' => 'Fasilitasi Pengembangan Sumberdaya:', 'sifat' => 'B'],
            ['parent_id' => $pdt_1, 'kode' => 'PDT.01.02', 'nama' => 'Koordinasi pelaksanaan kebijakan pengembangan sumber daya.', 'sifat' => 'B'],
            ['parent_id' => $pdt_1, 'kode' => 'PDT.01.03', 'nama' => 'Pemantauan dan evaluasi.', 'sifat' => 'B'],

            // Bawah PDT.02
            ['parent_id' => $pdt_2, 'kode' => 'PDT.02.01', 'nama' => 'Fasilitasi Peningkatan Infrastruktur.', 'sifat' => 'B'],
            ['parent_id' => $pdt_2, 'kode' => 'PDT.02.02', 'nama' => 'Koordinasi pelaksanaan kebijakan peningkatan infrastruktur.', 'sifat' => 'B'],
            ['parent_id' => $pdt_2, 'kode' => 'PDT.02.03', 'nama' => 'Pemantauan dan evaluasi.', 'sifat' => 'B'],

            // Bawah PDT.03
            ['parent_id' => $pdt_3, 'kode' => 'PDT.03.01', 'nama' => 'Fasilitasi Pembinaan Ekonomi dan Dunia Usaha:', 'sifat' => 'B'],
            ['parent_id' => $pdt_3, 'kode' => 'PDT.03.02', 'nama' => 'Koordinasi pelaksanaan kebijakan pembinaan ekonomi dan dunia usaha.', 'sifat' => 'B'],
            ['parent_id' => $pdt_3, 'kode' => 'PDT.03.03', 'nama' => 'Pemantauan dan evaluasi.', 'sifat' => 'B'],

            // Bawah PDT.04
            ['parent_id' => $pdt_4, 'kode' => 'PDT.04.01', 'nama' => 'Fasilitasi Pembinaan:', 'sifat' => 'B'],
            ['parent_id' => $pdt_4, 'kode' => 'PDT.04.02', 'nama' => 'Koordinasi pelaksanaan kebijakan pembinaan lembaga sosial dan budaya.', 'sifat' => 'B'],
            ['parent_id' => $pdt_4, 'kode' => 'PDT.04.03', 'nama' => 'Pemantauan dan evaluasi.', 'sifat' => 'B'],

            // Bawah PDT.05
            ['parent_id' => $pdt_5, 'kode' => 'PDT.05.01', 'nama' => 'Fasilitasi Pegembangan Daerah Khusus:', 'sifat' => 'B'], // Typo asli dokumen
            ['parent_id' => $pdt_5, 'kode' => 'PDT.05.02', 'nama' => 'Koordinasi pelaksanaan kebijakan pengembangan daerah khusus.', 'sifat' => 'B'],
            ['parent_id' => $pdt_5, 'kode' => 'PDT.05.03', 'nama' => 'Pemantauan dan evaluasi.', 'sifat' => 'B'],
        ]);

        $pdt_1_1 = DB::table('klasifikasis')->where('kode', 'PDT.01.01')->value('id');
        $pdt_2_1 = DB::table('klasifikasis')->where('kode', 'PDT.02.01')->value('id');
        $pdt_3_1 = DB::table('klasifikasis')->where('kode', 'PDT.03.01')->value('id');
        $pdt_4_1 = DB::table('klasifikasis')->where('kode', 'PDT.04.01')->value('id');
        $pdt_5_1 = DB::table('klasifikasis')->where('kode', 'PDT.05.01')->value('id');

        // --- LEVEL CICIT (Level 4) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah PDT.01.01
            ['parent_id' => $pdt_1_1, 'kode' => 'PDT.01.01.01', 'nama' => 'Fasilitasi Pengembangan Sumberdaya Pendidikan dan Ketrampilan.', 'sifat' => 'B'], // Typo asli
            ['parent_id' => $pdt_1_1, 'kode' => 'PDT.01.01.02', 'nama' => 'Fasilitasi Pengembangan Sumberdaya Kesehatan.', 'sifat' => 'B'],
            ['parent_id' => $pdt_1_1, 'kode' => 'PDT.01.01.03', 'nama' => 'Fasilitasi Pengembangan Sumberdaya Hayati.', 'sifat' => 'B'],
            ['parent_id' => $pdt_1_1, 'kode' => 'PDT.01.01.04', 'nama' => 'Fasilitasi Pengembangan Sumberdaya Mineral, Energi dan Lingkungan Hidup.', 'sifat' => 'B'],
            ['parent_id' => $pdt_1_1, 'kode' => 'PDT.01.01.05', 'nama' => 'Teknologi dan Inovasi.', 'sifat' => 'B'],

            // Bawah PDT.02.01
            ['parent_id' => $pdt_2_1, 'kode' => 'PDT.02.01.01', 'nama' => 'Fasilitasi Peningkatan Infrastruktur Transportasi.', 'sifat' => 'B'],
            ['parent_id' => $pdt_2_1, 'kode' => 'PDT.02.01.02', 'nama' => 'Fasilitasi Peningkatan Infrastruktur Informasi dan Telekomunikasi.', 'sifat' => 'B'],
            ['parent_id' => $pdt_2_1, 'kode' => 'PDT.02.01.03', 'nama' => 'Fasilitasi Peningkatan Infrastruktur Sosial.', 'sifat' => 'B'],
            ['parent_id' => $pdt_2_1, 'kode' => 'PDT.02.01.04', 'nama' => 'Fasilitasi Peningkatan Infrastruktur Ekonomi.', 'sifat' => 'B'],
            ['parent_id' => $pdt_2_1, 'kode' => 'PDT.02.01.05', 'nama' => 'Fasilitasi Peningkatan Infrastruktur Energi.', 'sifat' => 'B'],

            // Bawah PDT.03.01
            ['parent_id' => $pdt_3_1, 'kode' => 'PDT.03.01.01', 'nama' => 'Investasi Fasilitasi Pembinaan Ekonomi dan Dunia Usaha.', 'sifat' => 'B'], // Disambung dari halaman terpotong
            ['parent_id' => $pdt_3_1, 'kode' => 'PDT.03.01.02', 'nama' => 'Pembinaan Kelembagaan Ekonomi dan Dunia Usaha.', 'sifat' => 'B'],
            ['parent_id' => $pdt_3_1, 'kode' => 'PDT.03.01.03', 'nama' => 'Pembinaan Ekonomi dan Dunia Usaha Mikro, Kecil dan Menengah.', 'sifat' => 'B'],
            ['parent_id' => $pdt_3_1, 'kode' => 'PDT.03.01.04', 'nama' => 'Kemitraan Pembinaan Ekonomi dan Dunia Usaha.', 'sifat' => 'B'],
            ['parent_id' => $pdt_3_1, 'kode' => 'PDT.03.01.05', 'nama' => 'Pembinaan Ekonomi dan Dunia Usaha Pengembangan Komoditas Unggulan.', 'sifat' => 'B'],

            // Bawah PDT.04.01
            ['parent_id' => $pdt_4_1, 'kode' => 'PDT.04.01.01', 'nama' => 'Fasilitasi Pembinaan Penguatan Kapasitas Lembaga Lokal.', 'sifat' => 'B'],
            ['parent_id' => $pdt_4_1, 'kode' => 'PDT.04.01.02', 'nama' => 'Fasilitasi Pembinaan Penguatan Organisasi Masyarakat.', 'sifat' => 'B'],
            ['parent_id' => $pdt_4_1, 'kode' => 'PDT.04.01.03', 'nama' => 'Fasilitasi Pembinaan Pemberdayaan Masyarakat.', 'sifat' => 'B'],
            ['parent_id' => $pdt_4_1, 'kode' => 'PDT.04.01.04', 'nama' => 'Fasilitasi Pembinaan Kerjasama Antar Lembaga Sosial dan Budaya.', 'sifat' => 'B'],
            ['parent_id' => $pdt_4_1, 'kode' => 'PDT.04.01.05', 'nama' => 'Fasilitasi Pembinaan Ketenagakerjaan.', 'sifat' => 'B'],

            // Bawah PDT.05.01
            ['parent_id' => $pdt_5_1, 'kode' => 'PDT.05.01.01', 'nama' => 'Fasilitasi Pegembangan Daerah Khusus Perbatasan.', 'sifat' => 'B'], // Typo asli
            ['parent_id' => $pdt_5_1, 'kode' => 'PDT.05.01.02', 'nama' => 'Fasilitasi Pegembangan Daerah Khusus Daerah Rawan Konflik dan Bencana.', 'sifat' => 'B'], // Typo asli
            ['parent_id' => $pdt_5_1, 'kode' => 'PDT.05.01.03', 'nama' => 'Fasilitasi Pegembangan Daerah Khusus Perdesaan.', 'sifat' => 'B'], // Typo asli
            ['parent_id' => $pdt_5_1, 'kode' => 'PDT.05.01.04', 'nama' => 'Fasilitasi Pegembangan Daerah Khusus Daerah Pulau Terpencil dan Terluar.', 'sifat' => 'B'], // Typo asli
            ['parent_id' => $pdt_5_1, 'kode' => 'PDT.05.01.05', 'nama' => 'Fasilitasi Pegembangan Daerah Khusus Wilayah Strategis.', 'sifat' => 'B'], // Typo asli
        ]);
        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: TK (Tenaga Kerja dan Transmigrasi)
        // ==============================================================================
        $id_tk = DB::table('klasifikasis')->where('kode', 'TK')->value('id') ?? DB::table('klasifikasis')->insertGetId(['kode' => 'TK', 'nama' => 'Tenaga Kerja dan Transmigrasi:', 'sifat' => 'B']);

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_tk, 'kode' => 'TK.01', 'nama' => 'Perencanaan Tenaga Kerja:', 'sifat' => 'B'],
            ['parent_id' => $id_tk, 'kode' => 'TK.02', 'nama' => 'Pembinaan Penempatan Tenaga Kerja:', 'sifat' => 'B'],
            ['parent_id' => $id_tk, 'kode' => 'TK.03', 'nama' => 'Pembinaan Hubungan Industrial Dan Jaminan Sosial Tenaga Kerja:', 'sifat' => 'B'],
            ['parent_id' => $id_tk, 'kode' => 'TK.04', 'nama' => 'Pembinaan Pengawasan Ketenagakerjaan:', 'sifat' => 'B'],
            ['parent_id' => $id_tk, 'kode' => 'TK.05', 'nama' => 'Keselamatan Dan Kesehatan Kerja:', 'sifat' => 'B'],
        ]);

        $tk_1 = DB::table('klasifikasis')->where('kode', 'TK.01')->value('id');
        $tk_2 = DB::table('klasifikasis')->where('kode', 'TK.02')->value('id');
        $tk_3 = DB::table('klasifikasis')->where('kode', 'TK.03')->value('id');
        $tk_4 = DB::table('klasifikasis')->where('kode', 'TK.04')->value('id');
        $tk_5 = DB::table('klasifikasis')->where('kode', 'TK.05')->value('id');

        // --- LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah TK.01
            ['parent_id' => $tk_1, 'kode' => 'TK.01.01', 'nama' => 'Perencanaan Tenaga Kerja Makro:', 'sifat' => 'B'],
            ['parent_id' => $tk_1, 'kode' => 'TK.01.02', 'nama' => 'Perencanaan Tenaga Kerja Mikro:', 'sifat' => 'B'],
            ['parent_id' => $tk_1, 'kode' => 'TK.01.03', 'nama' => 'Pembinaan Pelatihan dan Produktivitas:', 'sifat' => 'B'],
            ['parent_id' => $tk_1, 'kode' => 'TK.01.04', 'nama' => 'Bina Lembaga dan Sarana Pelatihan Kerja:', 'sifat' => 'B'],
            ['parent_id' => $tk_1, 'kode' => 'TK.01.05', 'nama' => 'Bina Instruktur dan Tenaga Pelatihan:', 'sifat' => 'B'],
            ['parent_id' => $tk_1, 'kode' => 'TK.01.06', 'nama' => 'Pelatihan 4 Bina Pemagangan:', 'sifat' => 'B'], // Typo bawaan asli "4"
            ['parent_id' => $tk_1, 'kode' => 'TK.01.07', 'nama' => 'Produktivitas dan Kewirausahaan:', 'sifat' => 'B'],

            // Bawah TK.02
            ['parent_id' => $tk_2, 'kode' => 'TK.02.01', 'nama' => 'Pengembangan Pasar Kerja:', 'sifat' => 'B'],
            ['parent_id' => $tk_2, 'kode' => 'TK.02.02', 'nama' => 'Penempatan Tenaga Kerja Dalam Negeri:', 'sifat' => 'B'],
            ['parent_id' => $tk_2, 'kode' => 'TK.02.03', 'nama' => 'Penempatan Tenaga Kerja Luar Negeri:', 'sifat' => 'B'],
            ['parent_id' => $tk_2, 'kode' => 'TK.02.04', 'nama' => 'Perluasan Kesempatan Kerja dan Pengembangan Tenaga Kerja Sektor Informal:', 'sifat' => 'B'],
            ['parent_id' => $tk_2, 'kode' => 'TK.02.05', 'nama' => 'Pengendalian Penggunaan Tenaga Kerja Asing:', 'sifat' => 'B'],
            ['parent_id' => $tk_2, 'kode' => 'TK.02.06', 'nama' => 'Standardisasi Profesi:', 'sifat' => 'B'],

            // Bawah TK.03 (Awas ada DUPLIKAT KODE 02 dan 03 dari dokumen asli)
            ['parent_id' => $tk_3, 'kode' => 'TK.03.01', 'nama' => 'Persyaratan Kerja, Kesejahteraan, dan Analisis Diskriminasi:', 'sifat' => 'B'],
            ['parent_id' => $tk_3, 'kode' => 'TK.03.02', 'nama' => 'Kelembagaan dan Pemasyarakatan Hubungan Industrial:', 'sifat' => 'B'],
            ['parent_id' => $tk_3, 'kode' => 'TK.03.03', 'nama' => 'Pengupahan dan Penyelesaian Perselisihan Hubungan Industrial:', 'sifat' => 'B'],
            ['parent_id' => $tk_3, 'kode' => 'TK.03.04', 'nama' => 'Pencegahan dan Penyelesaian Pelestarian Hubungan Industrial:', 'sifat' => 'B'],
            ['parent_id' => $tk_3, 'kode' => 'TK.03.02', 'nama' => 'Penyelenggaraan Penyelesaian Perselisihan Hubungan Industrial:', 'sifat' => 'B'], // Duplikat 02
            ['parent_id' => $tk_3, 'kode' => 'TK.03.03', 'nama' => 'Pemberdayaan Kelembagaan dan Tenaga Penyelesaian Perselisihan Hubungan Industrial:', 'sifat' => 'B'], // Duplikat 03

            // Bawah TK.04
            ['parent_id' => $tk_4, 'kode' => 'TK.04.01', 'nama' => 'Pengawasan Norma Kerja dan Jaminan Sosial Tenaga Kerja:', 'sifat' => 'B'],
            ['parent_id' => $tk_4, 'kode' => 'TK.04.02', 'nama' => 'Pengawasan Norma Kerja Perempuan dan Anak:', 'sifat' => 'B'],
            ['parent_id' => $tk_4, 'kode' => 'TK.04.03', 'nama' => 'Pengawasan Norma Keselamatan dan Kesehatan Kerja:', 'sifat' => 'B'],
            ['parent_id' => $tk_4, 'kode' => 'TK.04.04', 'nama' => 'Laporan Hasil Pengawasan Ketenagakerjaan.', 'sifat' => 'B'],
            ['parent_id' => $tk_4, 'kode' => 'TK.04.05', 'nama' => 'Bina Penegakan Hukum:', 'sifat' => 'B'],

            // Bawah TK.05
            ['parent_id' => $tk_5, 'kode' => 'TK.05.01', 'nama' => 'Pengkajian dan Bimbingan Teknis Pelayanan Keselamatan dan Kesehatan Kerja (K3):', 'sifat' => 'B'],
            ['parent_id' => $tk_5, 'kode' => 'TK.05.02', 'nama' => 'Pengembangan SDM dan Kompetensi K3:', 'sifat' => 'B'],
        ]);

        // Mengambil ID untuk memasukkan Level Cicit (Level 4)
        $tk_1_01 = DB::table('klasifikasis')->where('kode', 'TK.01.01')->value('id');
        $tk_1_02 = DB::table('klasifikasis')->where('kode', 'TK.01.02')->value('id');
        $tk_1_03 = DB::table('klasifikasis')->where('kode', 'TK.01.03')->value('id');
        $tk_1_04 = DB::table('klasifikasis')->where('kode', 'TK.01.04')->value('id');
        $tk_1_05 = DB::table('klasifikasis')->where('kode', 'TK.01.05')->value('id');
        $tk_1_06 = DB::table('klasifikasis')->where('kode', 'TK.01.06')->value('id');
        $tk_1_07 = DB::table('klasifikasis')->where('kode', 'TK.01.07')->value('id');

        $tk_2_01 = DB::table('klasifikasis')->where('kode', 'TK.02.01')->value('id');
        $tk_2_02 = DB::table('klasifikasis')->where('kode', 'TK.02.02')->value('id');
        $tk_2_03 = DB::table('klasifikasis')->where('kode', 'TK.02.03')->value('id');
        $tk_2_04 = DB::table('klasifikasis')->where('kode', 'TK.02.04')->value('id');
        $tk_2_05 = DB::table('klasifikasis')->where('kode', 'TK.02.05')->value('id');
        $tk_2_06 = DB::table('klasifikasis')->where('kode', 'TK.02.06')->value('id');

        $tk_3_01 = DB::table('klasifikasis')->where('kode', 'TK.03.01')->value('id');
        $tk_3_02_1 = DB::table('klasifikasis')->where('kode', 'TK.03.02')->where('nama', 'like', 'Kelembagaan%')->value('id');
        $tk_3_03_1 = DB::table('klasifikasis')->where('kode', 'TK.03.03')->where('nama', 'like', 'Pengupahan%')->value('id');
        $tk_3_04 = DB::table('klasifikasis')->where('kode', 'TK.03.04')->value('id');
        $tk_3_02_2 = DB::table('klasifikasis')->where('kode', 'TK.03.02')->where('nama', 'like', 'Penyelenggaraan%')->value('id');
        $tk_3_03_2 = DB::table('klasifikasis')->where('kode', 'TK.03.03')->where('nama', 'like', 'Pemberdayaan%')->value('id');

        $tk_4_01 = DB::table('klasifikasis')->where('kode', 'TK.04.01')->value('id');
        $tk_4_02 = DB::table('klasifikasis')->where('kode', 'TK.04.02')->value('id');
        $tk_4_03 = DB::table('klasifikasis')->where('kode', 'TK.04.03')->value('id');
        // TK.04.04 tidak punya sub-item
        $tk_4_05 = DB::table('klasifikasis')->where('kode', 'TK.04.05')->value('id');

        $tk_5_01 = DB::table('klasifikasis')->where('kode', 'TK.05.01')->value('id');
        $tk_5_02 = DB::table('klasifikasis')->where('kode', 'TK.05.02')->value('id');

        // --- LEVEL CICIT (Level 4) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah TK.01.01
            ['parent_id' => $tk_1_01, 'kode' => 'TK.01.01.01', 'nama' => 'Pelaksanaan Kebijakan Perencanaan Tenaga Kerja Nasional', 'sifat' => 'B'],
            ['parent_id' => $tk_1_01, 'kode' => 'TK.01.01.02', 'nama' => 'Pembinaan dan Pemantauan Perencanaan Tenaga Kerja Nasional.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_01, 'kode' => 'TK.01.01.03', 'nama' => 'Analisis, Evaluasi dan Pelaporan Perencanaan Tenaga Kerja Nasional.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_01, 'kode' => 'TK.01.01.04', 'nama' => 'Pelaksanaan Kebijakan Perencanaan Tenaga Kerja Daerah.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_01, 'kode' => 'TK.01.01.05', 'nama' => 'Pembinaan dan Pemantauan Perencanaan Tenaga Kerja Daerah.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_01, 'kode' => 'TK.01.01.06', 'nama' => 'Analisis, Evaluasi dan Pelaporan Perencanaan Tenaga Kerja Daerah.', 'sifat' => 'B'],

            // Bawah TK.01.02
            ['parent_id' => $tk_1_02, 'kode' => 'TK.01.02.01', 'nama' => 'Pelaksanaan Kebijakan Perencanaan Tenaga Kerja Pemerintah Daerah.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_02, 'kode' => 'TK.01.02.02', 'nama' => 'Pembinaan dan Pemantauan Perencanaan Tenaga Kerja Perusahaan Pemerintah.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_02, 'kode' => 'TK.01.02.03', 'nama' => 'Analisis, Evaluasi dan Pelaporan Perencanaan Tenaga Kerja Perusahaan Pemerintah.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_02, 'kode' => 'TK.01.02.04', 'nama' => 'Pelaksanaan Kebijakan Perencanaan Tenaga Kerja Perusahaan Swasta.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_02, 'kode' => 'TK.01.02.05', 'nama' => 'Pembinaan dan Pemantauan Perencanaan Tenaga Kerja Perusahaan Swasta.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_02, 'kode' => 'TK.01.02.06', 'nama' => 'Analisis, Evaluasi dan Pelaporan Perencanaan Tenaga Kerja Perusahaan Swasta.', 'sifat' => 'B'],

            // Bawah TK.01.03
            ['parent_id' => $tk_1_03, 'kode' => 'TK.01.03.01', 'nama' => 'Penerapan Pengembangan Standarisasi Kompetensi dan Pogram Pelatihan.', 'sifat' => 'B'], // Typo Pogram
            ['parent_id' => $tk_1_03, 'kode' => 'TK.01.03.02', 'nama' => 'Bimbingan Pengembangan Standarisasi Kompetensi dan Program Pelatihan Ketenagakerjaan.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_03, 'kode' => 'TK.01.03.03', 'nama' => 'Program Pengembangan Standarisasi Kompetensi Pelatihan Ketenagakerjaan.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_03, 'kode' => 'TK.01.03.04', 'nama' => 'Penyusunan Materi Pelatihan Pengembangan Standarisasi Kompetensi Ketenagakerjaan.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_03, 'kode' => 'TK.01.03.05', 'nama' => 'Pengembangan Program Pelatihan Produktivitas dan Kewirausahaan.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_03, 'kode' => 'TK.01.03.06', 'nama' => 'Pengembangan Penyusunan Materi Pelatihan Produktivitas dan Kewirausahaan.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_03, 'kode' => 'TK.01.03.07', 'nama' => 'Pengembangan Program Pelatihan Ketransmigrasian.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_03, 'kode' => 'TK.01.03.08', 'nama' => 'Pengembangan Penyusunan Materi Pelatihan Ketransmigrasian.', 'sifat' => 'B'],

            // Bawah TK.01.04
            ['parent_id' => $tk_1_04, 'kode' => 'TK.01.04.01', 'nama' => 'Akreditasi Bina Lembaga dan Sarana Pelatihan Kerja.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_04, 'kode' => 'TK.01.04.02', 'nama' => 'Pengembangan Sistem Informasi Kelembagaan.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_04, 'kode' => 'TK.01.04.03', 'nama' => 'Pengembangan Sarana dan Fasilitas Lembaga Pelatihan.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_04, 'kode' => 'TK.01.04.04', 'nama' => 'Pengembangan Bimbingan Pengelolaan Sarana dan Fasilitas.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_04, 'kode' => 'TK.01.04.05', 'nama' => 'Pengembangan Standar Mutu Lembaga Pelatihan.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_04, 'kode' => 'TK.01.04.06', 'nama' => 'Pengembangan Bimbingan Penerapan Standar Mutu.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_04, 'kode' => 'TK.01.04.07', 'nama' => 'Sistem Pendanaan Pelatihan.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_04, 'kode' => 'TK.01.04.08', 'nama' => 'Kerjasama Antar Lembaga.', 'sifat' => 'B'],

            // Bawah TK.01.05
            ['parent_id' => $tk_1_05, 'kode' => 'TK.01.05.01', 'nama' => 'Peningkatan Kompetensi Instruktur dan PSM Lembaga Pelatihan.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_05, 'kode' => 'TK.01.05.02', 'nama' => 'Pengembangan Karir Instruktur dan PSM Lembaga Pelatihan Pemerintah.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_05, 'kode' => 'TK.01.05.03', 'nama' => 'Peningkatan Kompetensi Instruktur Lembaga Pelatihan Swasta.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_05, 'kode' => 'TK.01.05.04', 'nama' => 'Pengembangan Karir Instruktur Lembaga Pelatihan Swasta.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_05, 'kode' => 'TK.01.05.05', 'nama' => 'Peningkatan Kompetensi Tenaga Pelatihan.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_05, 'kode' => 'TK.01.05.06', 'nama' => 'Pengembangan Karir Tenaga Pelatihan.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_05, 'kode' => 'TK.01.05.07', 'nama' => 'Registrasi Instruktur, PSM, dan Tenaga Pelatihan.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_05, 'kode' => 'TK.01.05.08', 'nama' => 'Penyebaran Informasi Instruktur, PSM, dan Tenaga Pelatihan.', 'sifat' => 'B'],

            // Bawah TK.01.06
            ['parent_id' => $tk_1_06, 'kode' => 'TK.01.06.01', 'nama' => 'Bina Program Pemagangan Dalam Negeri.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_06, 'kode' => 'TK.01.06.02', 'nama' => 'Bina Bimbingan dan Penyuluhan Pemagangan Dalam Negeri.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_06, 'kode' => 'TK.01.06.03', 'nama' => 'Bina Program Pemagangan Luar Negeri.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_06, 'kode' => 'TK.01.06.04', 'nama' => 'Bina Bimbingan dan Penyuluhan Pemagangan Luar Negeri.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_06, 'kode' => 'TK.01.06.05', 'nama' => 'Perizinan dan Rekomendasi.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_06, 'kode' => 'TK.01.06.06', 'nama' => 'Advokasi dan Perlindungan.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_06, 'kode' => 'TK.01.06.07', 'nama' => 'Promosi dan Sistem Informasi Pemagangan.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_06, 'kode' => 'TK.01.06.08', 'nama' => 'Pemagangan Jejaring Pemagangan.', 'sifat' => 'B'],

            // Bawah TK.01.07
            ['parent_id' => $tk_1_07, 'kode' => 'TK.01.07.01', 'nama' => 'Pengembangan Promisi Produktivitas dan Kewirausahaan.', 'sifat' => 'B'], // Typo asli Promisi
            ['parent_id' => $tk_1_07, 'kode' => 'TK.01.07.02', 'nama' => 'Kerjasama Peningkatan Produktivitas dan Kewirausahaan.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_07, 'kode' => 'TK.01.07.03', 'nama' => 'Pengembangan Sistem dan Metode Produktivitas.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_07, 'kode' => 'TK.01.07.04', 'nama' => 'Pengembangan Alat dan Teknik Peningkatan Produktivitas.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_07, 'kode' => 'TK.01.07.05', 'nama' => 'Pengembangan Pengukuran Produktivitas.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_07, 'kode' => 'TK.01.07.06', 'nama' => 'Kajian Produktivitas.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_07, 'kode' => 'TK.01.07.07', 'nama' => 'Pengembangan Pelatihan Manajemen Kewirausahaan.', 'sifat' => 'B'],
            ['parent_id' => $tk_1_07, 'kode' => 'TK.01.07.08', 'nama' => 'Pengembangan Bimbingan Konsultasi.', 'sifat' => 'B'],

            // Bawah TK.02.01
            ['parent_id' => $tk_2_01, 'kode' => 'TK.02.01.01', 'nama' => 'Informasi Pasar Kerja Dalam Negeri.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_01, 'kode' => 'TK.02.01.02', 'nama' => 'Informasi Pasar Kerja Luar Negeri.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_01, 'kode' => 'TK.02.01.03', 'nama' => 'Analisis Pasar Kerja Dalam Negeri.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_01, 'kode' => 'TK.02.01.04', 'nama' => 'Analisis Pasar Kerja Luar Negeri.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_01, 'kode' => 'TK.02.01.05', 'nama' => 'Bursa Kerja Dalam Negeri.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_01, 'kode' => 'TK.02.01.06', 'nama' => 'Bursa Kerja Luar Negeri.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_01, 'kode' => 'TK.02.01.07', 'nama' => 'Analisis dan Informasi Jabatan.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_01, 'kode' => 'TK.02.01.08', 'nama' => 'Pengembangan Sistem Analisis Jabatan.', 'sifat' => 'B'],

            // Bawah TK.02.02
            ['parent_id' => $tk_2_02, 'kode' => 'TK.02.02.01', 'nama' => 'Penempatan Tenaga Kerja Antar Kerja Antar Daerah (AKAD)/ Antar Kerja Lokal (AKL).', 'sifat' => 'B'],
            ['parent_id' => $tk_2_02, 'kode' => 'TK.02.02.02', 'nama' => 'Kelembagaan Penempatan Tenaga Kerja.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_02, 'kode' => 'TK.02.02.03', 'nama' => 'Penempatan Tenaga Kerja Khusus Muda dan Wanita.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_02, 'kode' => 'TK.02.02.04', 'nama' => 'Penempatan Tenaga Kerja Khusus Penyandang Cacat dan Lansia.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_02, 'kode' => 'TK.02.02.05', 'nama' => 'Penyuluhan Jabatan.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_02, 'kode' => 'TK.02.02.06', 'nama' => 'Bimbingan Jabatan.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_02, 'kode' => 'TK.02.02.07', 'nama' => 'Pengembangan pemberdayaan Kompetensi Pengantar Kerja.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_02, 'kode' => 'TK.02.02.08', 'nama' => 'Kerjasama antar Lembaga.', 'sifat' => 'B'],

            // Bawah TK.02.03
            ['parent_id' => $tk_2_03, 'kode' => 'TK.02.03.01', 'nama' => 'Perizinan Kelembagaan.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_03, 'kode' => 'TK.02.03.02', 'nama' => 'Evaluasi Kinerja.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_03, 'kode' => 'TK.02.03.03', 'nama' => 'Penyiapan dan Dokumen Penempatan TKI.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_03, 'kode' => 'TK.02.03.04', 'nama' => 'Fasilitasi Penyediaan TKI.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_03, 'kode' => 'TK.02.03.05', 'nama' => 'Perlindungan Advokasi dan Kepulangan TKI.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_03, 'kode' => 'TK.02.03.06', 'nama' => 'Sarana dan Perlindungan.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_03, 'kode' => 'TK.02.03.07', 'nama' => 'Kerjasama Bilateral.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_03, 'kode' => 'TK.02.03.08', 'nama' => 'Kerjasama Regional dan Multilateral.', 'sifat' => 'B'],

            // Bawah TK.02.04 (Kacau penomorannya bawaan asli)
            ['parent_id' => $tk_2_04, 'kode' => 'TK.02.04.01', 'nama' => 'Tenaga Kerja Mandiri.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_04, 'kode' => 'TK.02.04.02', 'nama' => 'Tenaga Kerja Sektor Informal.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_04, 'kode' => 'TK.02.04.03', 'nama' => 'Pengembangan Padat Karya Perdesaan.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_04, 'kode' => 'TK.02.04.04', 'nama' => 'Pengembangan Padat Karya Perkotaan.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_04, 'kode' => 'TK.02.04.05', 'nama' => 'Pengembangan Terapan Teknologi Tepat Guna.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_04, 'kode' => 'TK.02.04.06', 'nama' => 'Penyebarluasan Terapan Teknologi Tepat Guna.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_04, 'kode' => 'TK.02.04.04', 'nama' => 'Pemberdayaan Pendampingan dan Kerjasama Antar Lembaga.', 'sifat' => 'B'], // Duplikat nomor 04 asli
            ['parent_id' => $tk_2_04, 'kode' => 'TK.02.04.07', 'nama' => 'Pemberdayaan Pendampingan.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_04, 'kode' => 'TK.02.04.08', 'nama' => 'Kerjasama Antar Lembaga.', 'sifat' => 'B'],

            // Bawah TK.02.05
            ['parent_id' => $tk_2_05, 'kode' => 'TK.02.05.01', 'nama' => 'Analisis Rencana Penggunaan Tenaga Kerja Asing Sektor Industri.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_05, 'kode' => 'TK.02.05.02', 'nama' => 'Izin Mempekerjakan Tenaga Kerja Asing Sektor Industri.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_05, 'kode' => 'TK.02.05.03', 'nama' => 'Analisis Rencana Pembangunan Tenaga Kerja Asing Sektor Jasa.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_05, 'kode' => 'TK.02.05.04', 'nama' => 'Izin Mempekerjakan Tenaga Kerja Asing Sektor Jasa.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_05, 'kode' => 'TK.02.05.05', 'nama' => 'Pengendalian.', 'sifat' => 'B'],
            ['parent_id' => $tk_2_05, 'kode' => 'TK.02.05.06', 'nama' => 'Kerjasama Kelembagaan.', 'sifat' => 'B'],

            // Bawah TK.02.06
            ['parent_id' => $tk_2_06, 'kode' => 'TK.02.06.01', 'nama' => 'Dokumen yang behubungan dengan sistem informasi dan registrasi.', 'sifat' => 'B'], // Typo asli
            ['parent_id' => $tk_2_06, 'kode' => 'TK.02.06.02', 'nama' => 'Dokumen yang behubungan dengan Sertifikasi kompetensi kerja.', 'sifat' => 'B'], // Typo asli
            ['parent_id' => $tk_2_06, 'kode' => 'TK.02.06.03', 'nama' => 'Pembakuan Dokumen yang behubungan dengan kompetensi dan akreditasi kelembagaan sertifikasi.', 'sifat' => 'B'], // Typo asli
            ['parent_id' => $tk_2_06, 'kode' => 'TK.02.06.04', 'nama' => 'Pembakuan Dokumen yang behubungan dengan penyelenggaraan konvensi dan persidangan.', 'sifat' => 'B'], // Typo asli

            // Bawah TK.03.01
            ['parent_id' => $tk_3_01, 'kode' => 'TK.03.01.01', 'nama' => 'Peraturan Perusahaan.', 'sifat' => 'B'],
            ['parent_id' => $tk_3_01, 'kode' => 'TK.03.01.02', 'nama' => 'Perjanjian Kerja Bersama.', 'sifat' => 'B'],
            ['parent_id' => $tk_3_01, 'kode' => 'TK.03.01.03', 'nama' => 'Perjanjian Kerja.', 'sifat' => 'B'],
            ['parent_id' => $tk_3_01, 'kode' => 'TK.03.01.04', 'nama' => 'Program Kesejahteraan.', 'sifat' => 'B'],
            ['parent_id' => $tk_3_01, 'kode' => 'TK.03.01.05', 'nama' => 'Fasilitas Kesejahteraan.', 'sifat' => 'B'],
            ['parent_id' => $tk_3_01, 'kode' => 'TK.03.01.06', 'nama' => 'Penanggulangan Diskriminasi Syarat Kerja.', 'sifat' => 'B'],
            ['parent_id' => $tk_3_01, 'kode' => 'TK.03.01.07', 'nama' => 'Evaluasi Diskriminasi Syarat Kerja.', 'sifat' => 'B'],

            // Bawah TK.03.02 (Kelembagaan dan Pemasyarakatan Hubungan Industrial)
            ['parent_id' => $tk_3_02_1, 'kode' => 'TK.03.02.01', 'nama' => 'Organisasi Pekerja.', 'sifat' => 'B'],
            ['parent_id' => $tk_3_02_1, 'kode' => 'TK.03.02.02', 'nama' => 'Organisasi Pengusaha.', 'sifat' => 'B'],
            ['parent_id' => $tk_3_02_1, 'kode' => 'TK.03.02.03', 'nama' => 'Lembaga Kerjasama BIPARTIT.', 'sifat' => 'B'],
            ['parent_id' => $tk_3_02_1, 'kode' => 'TK.03.02.04', 'nama' => 'Lembaga Kerjasama TRIPARTIT.', 'sifat' => 'B'],
            ['parent_id' => $tk_3_02_1, 'kode' => 'TK.03.02.03', 'nama' => 'Pemasyarakatan Hubungan Industrial.', 'sifat' => 'B'], // Duplikat nomor 03 asli
            ['parent_id' => $tk_3_02_1, 'kode' => 'TK.03.02.05', 'nama' => 'Penyiapan Masyarakat Materi Penyuluhan Masyarakat Hubungan Industrial.', 'sifat' => 'B'],
            ['parent_id' => $tk_3_02_1, 'kode' => 'TK.03.02.06', 'nama' => 'Penyelenggaraan Penyuluhan Masyarakat Hubungan Industrial:', 'sifat' => 'B'],

            // Bawah TK.03.03 (Pengupahan dan Penyelesaian Perselisihan Hubungan Industrial)
            ['parent_id' => $tk_3_03_1, 'kode' => 'TK.03.03.01', 'nama' => 'Penerapan Standar Pengupahan.', 'sifat' => 'B'],
            ['parent_id' => $tk_3_03_1, 'kode' => 'TK.03.03.02', 'nama' => 'Pengurusan Pengupahan.', 'sifat' => 'B'],
            ['parent_id' => $tk_3_03_1, 'kode' => 'TK.03.03.03', 'nama' => 'Pengurusan Jamsostek Dalam Hubungan Kerja.', 'sifat' => 'B'],
            ['parent_id' => $tk_3_03_1, 'kode' => 'TK.03.03.04', 'nama' => 'Kepesertaan Jamsostek Dalam Hubungan Kerja.', 'sifat' => 'B'],

            // Bawah TK.03.04
            ['parent_id' => $tk_3_04, 'kode' => 'TK.03.04.01', 'nama' => 'Pencegahan Dini Perselisihan Hubungan Industrial.', 'sifat' => 'B'],
            ['parent_id' => $tk_3_04, 'kode' => 'TK.03.04.02', 'nama' => 'Penanganan Mogok dan Penutupan Perusahaan.', 'sifat' => 'B'],

            // Bawah TK.03.02 (Penyelenggaraan Penyelesaian Perselisihan Hubungan Industrial - DUPLIKAT KODE INDUK)
            ['parent_id' => $tk_3_02_2, 'kode' => 'TK.03.02.01', 'nama' => 'Pengurusan Perselisihan Hubungan Industrial.', 'sifat' => 'B'],
            ['parent_id' => $tk_3_02_2, 'kode' => 'TK.03.02.02', 'nama' => 'Evaluasi dan Pelaporan.', 'sifat' => 'B'],

            // Bawah TK.03.03 (Pemberdayaan Kelembagaan dan Tenaga Penyelesaian Perselisihan Hubungan Industrial - DUPLIKAT KODE INDUK)
            ['parent_id' => $tk_3_03_2, 'kode' => 'TK.03.03.01', 'nama' => 'Fungsionalisasi Perantara dan Legitimasi Mediator, Konsiliator, dan Arbiter Hubungan.', 'sifat' => 'B'],
            ['parent_id' => $tk_3_03_2, 'kode' => 'TK.03.03.02', 'nama' => 'Kelembagaan dan Tenaga Penyelesaian Perselisihan di Luar Peradilan.', 'sifat' => 'B'],

            // Bawah TK.04.01
            ['parent_id' => $tk_4_01, 'kode' => 'TK.04.01.01', 'nama' => 'Pengawasan Norma Waktu Kerja Waktu Istirahat.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_01, 'kode' => 'TK.04.01.02', 'nama' => 'Pengawasan Norma Pengupahan.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_01, 'kode' => 'TK.04.01.03', 'nama' => 'Pengawasan Norma Hubungan Kerja.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_01, 'kode' => 'TK.04.01.04', 'nama' => 'Pengawasan Norma Perlindungan Berserikat.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_01, 'kode' => 'TK.04.01.05', 'nama' => 'Pengawasan Norma Penempatan dan Pelatihan Tenaga Kerja Luar Negeri.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_01, 'kode' => 'TK.04.01.06', 'nama' => 'Pengawasan Norma Kerja dan Jamsostek.', 'sifat' => 'B'],

            // Bawah TK.04.02
            ['parent_id' => $tk_4_02, 'kode' => 'TK.04.02.01', 'nama' => 'Pengawasan Norma Penghapusan Diskriminasi.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_02, 'kode' => 'TK.04.02.02', 'nama' => 'Pengawasan Norma Perlindungan Tenaga Kerja Perempuan.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_02, 'kode' => 'TK.04.02.03', 'nama' => 'Pengawasan Norma Penghapusan Bentuk-Bentuk Pekerjaan Terburuk Untuk Anak.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_02, 'kode' => 'TK.04.02.04', 'nama' => 'Pengawasan Norma Perlindungan Tenaga Kerja Anak.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_02, 'kode' => 'TK.04.02.05', 'nama' => 'Kerjasama Lintas Sektoral Tenaga Kerja Perempuan.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_02, 'kode' => 'TK.04.02.06', 'nama' => 'Kerjasama Lintas Sektoral Tenaga Kerja Anak.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_02, 'kode' => 'TK.04.02.07', 'nama' => 'Advokasi Tenaga Kerja Perempuan.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_02, 'kode' => 'TK.04.02.08', 'nama' => 'Advokasi Tenaga Kerja Anak.', 'sifat' => 'B'],

            // Bawah TK.04.03
            ['parent_id' => $tk_4_03, 'kode' => 'TK.04.03.01', 'nama' => 'Pengawasan Norma Mekanik.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_03, 'kode' => 'TK.04.03.02', 'nama' => 'Pengawasan Norma Pesawat Uap dan Bejana Tekan.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_03, 'kode' => 'TK.04.03.03', 'nama' => 'Pengawasan Norma Konstruksi Bangunan.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_03, 'kode' => 'TK.04.03.04', 'nama' => 'Pengawasan Norma Listrik dan Penanggulangan Kebakaran.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_03, 'kode' => 'TK.04.03.05', 'nama' => 'Pengawasan Norma Pelayanan Kesehatan Kerja.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_03, 'kode' => 'TK.04.03.06', 'nama' => 'Pengawasan Norma Pemeliharaan Kesehatan Tenaga Kerja.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_03, 'kode' => 'TK.04.03.07', 'nama' => 'Pengawasan Norma Lingkungan Kerja.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_03, 'kode' => 'TK.04.03.08', 'nama' => 'Pengawasan Norma Bahan Berbahaya.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_03, 'kode' => 'TK.04.03.09', 'nama' => 'Pengawasan Norma Kelembagaan dan Keahlian K3.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_03, 'kode' => 'TK.04.03.10', 'nama' => 'Pengawasan Norma Sistem Manajemen K3.', 'sifat' => 'B'],

            // Bawah TK.04.05
            ['parent_id' => $tk_4_05, 'kode' => 'TK.04.05.01', 'nama' => 'Teknis Pemeriksaan Norma Ketenagakerjaan.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_05, 'kode' => 'TK.04.05.02', 'nama' => 'Penindakan Norma Ketenagakerjaan.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_05, 'kode' => 'TK.04.05.03', 'nama' => 'Teknis Penyidikan Norma Ketenagakerjaan.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_05, 'kode' => 'TK.04.05.04', 'nama' => 'Administrasi Penyidikan Norma Ketenagakerjaan.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_05, 'kode' => 'TK.04.05.05', 'nama' => 'Pengembangan Pemberdayaan PPNS.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_05, 'kode' => 'TK.04.05.06', 'nama' => 'Pengembangan Sarana dan Prasarana PPNS.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_05, 'kode' => 'TK.04.05.07', 'nama' => 'Kerjasama Lembaga Penegakan Hukum.', 'sifat' => 'B'],
            ['parent_id' => $tk_4_05, 'kode' => 'TK.04.05.08', 'nama' => 'Kerjasama Pemeriksaan dan Penyidikan.', 'sifat' => 'B'],

            // Bawah TK.05.01
            ['parent_id' => $tk_5_01, 'kode' => 'TK.05.01.01', 'nama' => 'Analisis dan Standardisasi bidang K3.', 'sifat' => 'B'],
            ['parent_id' => $tk_5_01, 'kode' => 'TK.05.01.02', 'nama' => 'Hasil kajian, perekayasaan dan penerapan teknologi dan alih teknologi K3.', 'sifat' => 'B'],
            ['parent_id' => $tk_5_01, 'kode' => 'TK.05.01.03', 'nama' => 'Bimbingan Teknis dan Evaluasi Pelayanan K3.', 'sifat' => 'B'],

            // Bawah TK.05.02
            ['parent_id' => $tk_5_02, 'kode' => 'TK.05.02.01', 'nama' => 'Program, Analisis dan Standardisasi Pengembangan SDM dan Kompetensi K3.', 'sifat' => 'B'],
            ['parent_id' => $tk_5_02, 'kode' => 'TK.05.02.02', 'nama' => 'Penyebarluasan Informasi Pengembangan SDM dan Kompetensi K3.', 'sifat' => 'B'],
            ['parent_id' => $tk_5_02, 'kode' => 'TK.05.02.03', 'nama' => 'Kerjasama Tingkat Nasional Bidang Pengembangan SDM dan Kompetensi K3.', 'sifat' => 'B'],
            ['parent_id' => $tk_5_02, 'kode' => 'TK.05.02.04', 'nama' => 'Kerjasama Tingkat Internasional Bidang Pengembangan SDM dan Kompetensi K3.', 'sifat' => 'B'],
            ['parent_id' => $tk_5_02, 'kode' => 'TK.05.02.05', 'nama' => 'Bimbingan Teknis dan Evaluasi Pengembangan SDM dan Kompetensi K3.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: KO (Kepemudaan dan Olahraga)
        // ==============================================================================
        $id_ko = DB::table('klasifikasis')->where('kode', 'KO')->value('id') ?? DB::table('klasifikasis')->insertGetId(['kode' => 'KO', 'nama' => 'Kepemudaan dan Olahraga:', 'sifat' => 'B']);

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_ko, 'kode' => 'KO.01', 'nama' => 'Pembudayaan Olahraga, Peningkatan Prestasi Olahraga, dan Harmonisasi dan Kemitraan meliputi:', 'sifat' => 'B'],
        ]);

        $ko_1 = DB::table('klasifikasis')->where('kode', 'KO.01')->value('id');

        // --- LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $ko_1, 'kode' => 'KO.01.01', 'nama' => 'Peningkatan Tenaga dan Sumber Daya Pemuda:', 'sifat' => 'B'],
            ['parent_id' => $ko_1, 'kode' => 'KO.01.02', 'nama' => 'Pemberdayaan Pemuda:', 'sifat' => 'B'],
            ['parent_id' => $ko_1, 'kode' => 'KO.01.03', 'nama' => 'Pengembangan Pemuda:', 'sifat' => 'B'],
            ['parent_id' => $ko_1, 'kode' => 'KO.01.04', 'nama' => 'Pembudayaan Olahraga:', 'sifat' => 'B'],
            ['parent_id' => $ko_1, 'kode' => 'KO.01.05', 'nama' => 'Peningkatan Prestasi Olahraga:', 'sifat' => 'B'],
        ]);

        $ko_1_1 = DB::table('klasifikasis')->where('kode', 'KO.01.01')->value('id');
        $ko_1_2 = DB::table('klasifikasis')->where('kode', 'KO.01.02')->value('id');
        $ko_1_3 = DB::table('klasifikasis')->where('kode', 'KO.01.03')->value('id');
        $ko_1_4 = DB::table('klasifikasis')->where('kode', 'KO.01.04')->value('id');
        $ko_1_5 = DB::table('klasifikasis')->where('kode', 'KO.01.05')->value('id');

        // --- LEVEL CICIT (Level 4) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah KO.01.01 (Mentok di level 4)
            ['parent_id' => $ko_1_1, 'kode' => 'KO.01.01.01', 'nama' => 'Pengkajian dan pengusulan kebijakan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_1, 'kode' => 'KO.01.01.02', 'nama' => 'Penyiapan kebijakan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_1, 'kode' => 'KO.01.01.03', 'nama' => 'Perumusan dan penyusunan bahan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_1, 'kode' => 'KO.01.01.04', 'nama' => 'Pemberian masukan dan dukungan dalam penyusunan kebijakan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_1, 'kode' => 'KO.01.01.05', 'nama' => 'Penetapan dalam bentuk NSPK.', 'sifat' => 'B'],

            // Bawah KO.01.02
            ['parent_id' => $ko_1_2, 'kode' => 'KO.01.02.01', 'nama' => 'Peningkatan Tenaga dan Sumber Daya Pemuda:', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2, 'kode' => 'KO.01.02.02', 'nama' => 'Peningkatan Wawasan Pemuda:', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2, 'kode' => 'KO.01.02.03', 'nama' => 'Peningkatan Kapasitas Pemuda:', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2, 'kode' => 'KO.01.02.04', 'nama' => 'Peningkatan Kreativitas Pemuda (Pemetaan Kreativitas/seni kepemudaan):', 'sifat' => 'B'],

            // Bawah KO.01.03
            ['parent_id' => $ko_1_3, 'kode' => 'KO.01.03.01', 'nama' => 'Kepemimpinan dan Kepeloporan Pemuda:', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3, 'kode' => 'KO.01.03.02', 'nama' => 'Kewirausahaan:', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3, 'kode' => 'KO.01.03.03', 'nama' => 'Organisasi Kepemudaan dan Pengawasan Kepramukaan:', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3, 'kode' => 'KO.01.03.04', 'nama' => 'Standardisasi dan Infrastruktur Pemuda:', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3, 'kode' => 'KO.01.03.05', 'nama' => 'Kemitraan dan Penghargaan Pemuda:', 'sifat' => 'B'],

            // Bawah KO.01.04
            ['parent_id' => $ko_1_4, 'kode' => 'KO.01.04.01', 'nama' => 'Pengelolaan Olahraga Pendidikan:', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4, 'kode' => 'KO.01.04.02', 'nama' => 'Penglolaan Olahraga Rekreasi:', 'sifat' => 'B'], // Typo asli Penglolaan
            ['parent_id' => $ko_1_4, 'kode' => 'KO.01.04.03', 'nama' => 'Pengelolaan Pembinaan Sentra dan Sekolah Khusus Olahraga:', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4, 'kode' => 'KO.01.04.04', 'nama' => 'Pengembangan Olahraga Tradisional dan Layanan Khusus Olahraga Tradisional:', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4, 'kode' => 'KO.01.04.05', 'nama' => 'Kemitraan dan Penghargaan Olahraga:', 'sifat' => 'B'],

            // Bawah KO.01.05
            ['parent_id' => $ko_1_5, 'kode' => 'KO.01.05.01', 'nama' => 'Pembibitan dan IPTEK Olahraga:', 'sifat' => 'B'],
            ['parent_id' => $ko_1_5, 'kode' => 'KO.01.05.02', 'nama' => 'Peningkatan Tenaga dan Organisasi keolahragaan:', 'sifat' => 'B'],
            ['parent_id' => $ko_1_5, 'kode' => 'KO.01.05.03', 'nama' => 'Industri dan Promosi Olagraga:', 'sifat' => 'B'], // Typo asli Olagraga
            ['parent_id' => $ko_1_5, 'kode' => 'KO.01.05.04', 'nama' => 'Olahraga Prestasi:', 'sifat' => 'B'],
            ['parent_id' => $ko_1_5, 'kode' => 'KO.01.05.05', 'nama' => 'Standarisasi dan Infrastruktur Olahraga:', 'sifat' => 'B'],
        ]);

        // MENGAMBIL ID LEVEL 4 UNTUK MEMASUKKAN LEVEL 5 (CANGGAH)
        $ko_1_2_1 = DB::table('klasifikasis')->where('kode', 'KO.01.02.01')->value('id');
        $ko_1_2_2 = DB::table('klasifikasis')->where('kode', 'KO.01.02.02')->value('id');
        $ko_1_2_3 = DB::table('klasifikasis')->where('kode', 'KO.01.02.03')->value('id');
        $ko_1_2_4 = DB::table('klasifikasis')->where('kode', 'KO.01.02.04')->value('id');

        $ko_1_3_1 = DB::table('klasifikasis')->where('kode', 'KO.01.03.01')->value('id');
        $ko_1_3_2 = DB::table('klasifikasis')->where('kode', 'KO.01.03.02')->value('id');
        $ko_1_3_3 = DB::table('klasifikasis')->where('kode', 'KO.01.03.03')->value('id');
        $ko_1_3_4 = DB::table('klasifikasis')->where('kode', 'KO.01.03.04')->value('id');
        $ko_1_3_5 = DB::table('klasifikasis')->where('kode', 'KO.01.03.05')->value('id');

        $ko_1_4_1 = DB::table('klasifikasis')->where('kode', 'KO.01.04.01')->value('id');
        $ko_1_4_2 = DB::table('klasifikasis')->where('kode', 'KO.01.04.02')->value('id');
        $ko_1_4_3 = DB::table('klasifikasis')->where('kode', 'KO.01.04.03')->value('id');
        $ko_1_4_4 = DB::table('klasifikasis')->where('kode', 'KO.01.04.04')->value('id');
        $ko_1_4_5 = DB::table('klasifikasis')->where('kode', 'KO.01.04.05')->value('id');

        $ko_1_5_1 = DB::table('klasifikasis')->where('kode', 'KO.01.05.01')->value('id');
        $ko_1_5_2 = DB::table('klasifikasis')->where('kode', 'KO.01.05.02')->value('id');
        $ko_1_5_3 = DB::table('klasifikasis')->where('kode', 'KO.01.05.03')->value('id');
        $ko_1_5_4 = DB::table('klasifikasis')->where('kode', 'KO.01.05.04')->value('id');
        $ko_1_5_5 = DB::table('klasifikasis')->where('kode', 'KO.01.05.05')->value('id');

        // --- LEVEL CANGGAH (Level 5) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah KO.01.02.01
            ['parent_id' => $ko_1_2_1, 'kode' => 'KO.01.02.01.01', 'nama' => 'Penelusuran (Duta Kepemudaan), potensi lokal (Provinsi), Nasional, Internasional.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2_1, 'kode' => 'KO.01.02.01.02', 'nama' => 'Pengkajian (Rekomendasi Kepemudaan melalui forum kepemudaan), Potensi lokal (Provinsi), Nasional dan Internasional.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2_1, 'kode' => 'KO.01.02.01.03', 'nama' => 'Pengembangan Potensi Nasional dan Internasional.', 'sifat' => 'B'],

            // Bawah KO.01.02.02
            ['parent_id' => $ko_1_2_2, 'kode' => 'KO.01.02.02.01', 'nama' => 'Program Wawasan Kebangsaan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2_2, 'kode' => 'KO.01.02.02.02', 'nama' => 'Evaluasi Wawasan Kebangsaan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2_2, 'kode' => 'KO.01.02.02.03', 'nama' => 'Program Wawasan Lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2_2, 'kode' => 'KO.01.02.02.04', 'nama' => 'Evaluasi Wawasan Lingkungan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2_2, 'kode' => 'KO.01.02.02.05', 'nama' => 'Program Wawasan Sosial dan Hukum.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2_2, 'kode' => 'KO.01.02.02.06', 'nama' => 'Evaluasi Wawasan Sosial dan Hukum.', 'sifat' => 'B'],

            // Bawah KO.01.02.03
            ['parent_id' => $ko_1_2_3, 'kode' => 'KO.01.02.03.01', 'nama' => 'Program Kapasitas Iman dan Taqwa.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2_3, 'kode' => 'KO.01.02.03.02', 'nama' => 'Evaluasi Kapasitas Iman dan Taqwa.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2_3, 'kode' => 'KO.01.02.03.03', 'nama' => 'Program Kapasitas IPTEK.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2_3, 'kode' => 'KO.01.02.03.04', 'nama' => 'Evaluasi Kapasitas IPTEK.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2_3, 'kode' => 'KO.01.02.03.05', 'nama' => 'Program Pemanfaatan IPTEK.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2_3, 'kode' => 'KO.01.02.03.06', 'nama' => 'Evaluasi Pemanfaatan IPTEK.', 'sifat' => 'B'],

            // Bawah KO.01.02.04
            ['parent_id' => $ko_1_2_4, 'kode' => 'KO.01.02.04.01', 'nama' => 'Program Pengkajian.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2_4, 'kode' => 'KO.01.02.04.02', 'nama' => 'Evaluasi Pengkajian.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2_4, 'kode' => 'KO.01.02.04.03', 'nama' => 'Program Pengembangan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2_4, 'kode' => 'KO.01.02.04.04', 'nama' => 'Evaluasi Pengembangan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_2_4, 'kode' => 'KO.01.02.04.05', 'nama' => 'Program Pendayaguaan.', 'sifat' => 'B'], // Typo asli Pendayaguaan
            ['parent_id' => $ko_1_2_4, 'kode' => 'KO.01.02.04.06', 'nama' => 'Evaluasi Pendayagunaan.', 'sifat' => 'B'],

            // Bawah KO.01.03.01
            ['parent_id' => $ko_1_3_1, 'kode' => 'KO.01.03.01.01', 'nama' => 'Program Kepemimpinan (Penelusuran, Pengaderan dan Pendampingan).', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3_1, 'kode' => 'KO.01.03.01.02', 'nama' => 'Evaluasi Kepemimpinan (Penelusuran, Pengaderan dan Pendampingan).', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3_1, 'kode' => 'KO.01.03.01.03', 'nama' => 'Program Kepeloporan Pemuda (Kesukarelawan, Pengembangan Kepedulian, Pendampingan).', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3_1, 'kode' => 'KO.01.03.01.04', 'nama' => 'Evaluasi Kepeloporan Pemuda (Kesukarelawan, Pengembangan Kepedulian, Pendampingan)', 'sifat' => 'B'],

            // Bawah KO.01.03.02
            ['parent_id' => $ko_1_3_2, 'kode' => 'KO.01.03.02.01', 'nama' => 'Program Kelembagaan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3_2, 'kode' => 'KO.01.03.02.02', 'nama' => 'Evaluasi Kelembagaan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3_2, 'kode' => 'KO.01.03.02.03', 'nama' => 'Program Pengaderan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3_2, 'kode' => 'KO.01.03.02.04', 'nama' => 'Evaluasi Pengaderan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3_2, 'kode' => 'KO.01.03.02.05', 'nama' => 'Program Perintisan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3_2, 'kode' => 'KO.01.03.02.06', 'nama' => 'Evaluasi Perintisan.', 'sifat' => 'B'],

            // Bawah KO.01.03.03
            ['parent_id' => $ko_1_3_3, 'kode' => 'KO.01.03.03.01', 'nama' => 'Program Pemberdayaan Organisasi Kepemudaan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3_3, 'kode' => 'KO.01.03.03.02', 'nama' => 'Evaluasi Pemberdayaan Organisasi Kepemudaan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3_3, 'kode' => 'KO.01.03.03.03', 'nama' => 'Program Pemberdayaan Organisasi Kemahasiswaan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3_3, 'kode' => 'KO.01.03.03.04', 'nama' => 'Evaluasi Pemberdayaan Organisasi Kemahasiswaan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3_3, 'kode' => 'KO.01.03.03.05', 'nama' => 'Program Pemberdayaan Organisasi Kepelajaran.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3_3, 'kode' => 'KO.01.03.03.06', 'nama' => 'Evaluasi Pemberdayaan Organisasi Kepelajaran.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3_3, 'kode' => 'KO.01.03.03.07', 'nama' => 'Pengkajian dan Pengembangan Pengawasan Kepramukaan : Kelembagaan, Program dan Sumberdaya.', 'sifat' => 'B'],

            // Bawah KO.01.03.04
            ['parent_id' => $ko_1_3_4, 'kode' => 'KO.01.03.04.01', 'nama' => 'Standardisasi dan infrastruktur: Organisasi, Prasarana dan Sarana Kepemudaan.', 'sifat' => 'B'],

            // Bawah KO.01.03.05
            ['parent_id' => $ko_1_3_5, 'kode' => 'KO.01.03.05.01', 'nama' => 'Kemitraan Lintas Sektoral , Daerah dan Luar Negeri.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_3_5, 'kode' => 'KO.01.03.05.02', 'nama' => 'Pengembangan Penghargaan dan Promosi Kepemudaan.', 'sifat' => 'B'],

            // Bawah KO.01.04.01
            ['parent_id' => $ko_1_4_1, 'kode' => 'KO.01.04.01.01', 'nama' => 'Pengembangan Olahraga Pendidikan Dasar dan menengah.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_1, 'kode' => 'KO.01.04.01.02', 'nama' => 'Evaluasi Olahraga Pendidikan Dasar dan menengah.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_1, 'kode' => 'KO.01.04.01.03', 'nama' => 'Pengembangan Olahraga Pendidikan Tinggi.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_1, 'kode' => 'KO.01.04.01.04', 'nama' => 'Evaluasi Olahraga Pendidikan Tinggi.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_1, 'kode' => 'KO.01.04.01.05', 'nama' => 'Pengembangan Olahraga Pendidikan Nonformal dan Informal.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_1, 'kode' => 'KO.01.04.01.06', 'nama' => 'Evaluasi Olahraga Pendidikan Nonformal dan Informal.', 'sifat' => 'B'],

            // Bawah KO.01.04.02
            ['parent_id' => $ko_1_4_2, 'kode' => 'KO.01.04.02.01', 'nama' => 'Pengembangan Olahraga Massal.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_2, 'kode' => 'KO.01.04.02.02', 'nama' => 'Evaluasi Olahraga Massal.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_2, 'kode' => 'KO.01.04.02.03', 'nama' => 'Pengembangan Olahraga Tradisional.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_2, 'kode' => 'KO.01.04.02.04', 'nama' => 'Evaluasi Olahraga Tradisional.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_2, 'kode' => 'KO.01.04.02.05', 'nama' => 'Pengembangan Olahrga Petualangan, Tantangan dan Wisata.', 'sifat' => 'B'], // Typo asli Olahrga
            ['parent_id' => $ko_1_4_2, 'kode' => 'KO.01.04.02.06', 'nama' => 'Evaluasi Olahraga Petualangan, Tantangan dan Wisata.', 'sifat' => 'B'],

            // Bawah KO.01.04.03
            ['parent_id' => $ko_1_4_3, 'kode' => 'KO.01.04.03.01', 'nama' => 'Pengembangan Olahraga Pendidikan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_3, 'kode' => 'KO.01.04.03.02', 'nama' => 'Evaluasi Olahraga Pendidikan.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_3, 'kode' => 'KO.01.04.03.03', 'nama' => 'Pengembangan Olahraga Rekreasi.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_3, 'kode' => 'KO.01.04.03.04', 'nama' => 'Evaluasi Olahraga Rekreasi.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_3, 'kode' => 'KO.01.04.03.05', 'nama' => 'Pengembangan Olahraga Prestasi.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_3, 'kode' => 'KO.01.04.03.06', 'nama' => 'Evaluasi Olahraga Prestasi.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_3, 'kode' => 'KO.01.04.03.07', 'nama' => 'Pengembangan Sekolah Khusus Olahraga Provinsi.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_3, 'kode' => 'KO.01.04.03.08', 'nama' => 'Evaluasi Sekolah Khusus Olahraga Provinsi.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_3, 'kode' => 'KO.01.04.03.09', 'nama' => 'Pengembangan Sekolah Khusus Olahraga Nasional.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_3, 'kode' => 'KO.01.04.03.10', 'nama' => 'Evaluasi Sekolah Khusus Olahraga Nasional.', 'sifat' => 'B'],

            // Bawah KO.01.04.04
            ['parent_id' => $ko_1_4_4, 'kode' => 'KO.01.04.04.01', 'nama' => 'Lokal.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_4, 'kode' => 'KO.01.04.04.02', 'nama' => 'Nasional.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_4, 'kode' => 'KO.01.04.04.03', 'nama' => 'Layanan Khusus Olahraga Usia Dini, Lansia dan Penyandang cacat.', 'sifat' => 'B'],

            // Bawah KO.01.04.05
            ['parent_id' => $ko_1_4_5, 'kode' => 'KO.01.04.05.01', 'nama' => 'Kemitraan Keolahragaan Lintas Sektoral.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_5, 'kode' => 'KO.01.04.05.02', 'nama' => 'Kemitraan Keolahragaan Daerah.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_5, 'kode' => 'KO.01.04.05.03', 'nama' => 'Kemitraan Keolahragaan Luar Negeri.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_4_5, 'kode' => 'KO.01.04.05.04', 'nama' => 'Penelusuran dan Penyelenggaraan Penghargaan Olahraga.', 'sifat' => 'B'],

            // Bawah KO.01.05.01
            ['parent_id' => $ko_1_5_1, 'kode' => 'KO.01.05.01.01', 'nama' => 'Penelusuran dan Penelaahan Bakat.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_5_1, 'kode' => 'KO.01.05.01.02', 'nama' => 'Program dan Evaluasi Pengembangan Olahragawan berbakat.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_5_1, 'kode' => 'KO.01.05.01.03', 'nama' => 'Kompetisi nasional dan Internasional.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_5_1, 'kode' => 'KO.01.05.01.04', 'nama' => 'Penerapan Identifikasi dan kajian, Pendayagunaan serta evaluasi dan Desiminasi.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_5_1, 'kode' => 'KO.01.05.01.05', 'nama' => 'Pengembangan IPTEK olahraga.', 'sifat' => 'B'],

            // Bawah KO.01.05.02
            ['parent_id' => $ko_1_5_2, 'kode' => 'KO.01.05.02.01', 'nama' => 'Pengembangan Pelatih dan Instruktur Nasional dan Internasional.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_5_2, 'kode' => 'KO.01.05.02.02', 'nama' => 'Pengembangan Wasit dan Juri Nasional dan Internasional.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_5_2, 'kode' => 'KO.01.05.02.03', 'nama' => 'Pengembangan Tenaga Pendidik dan Pendukung.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_5_2, 'kode' => 'KO.01.05.02.04', 'nama' => 'Pendidikan dan Rekreasi.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_5_2, 'kode' => 'KO.01.05.02.05', 'nama' => 'Kelembagaan dan Sumberdaya Olah Raga Prestasi.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_5_2, 'kode' => 'KO.01.05.02.06', 'nama' => 'Olahraga Fungsional dan Profesional.', 'sifat' => 'B'],

            // Bawah KO.01.05.03
            ['parent_id' => $ko_1_5_3, 'kode' => 'KO.01.05.03.01', 'nama' => 'Jasa, Produk dan Manajemen Industri Olahraga.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_5_3, 'kode' => 'KO.01.05.03.02', 'nama' => 'Penelusuran dan Penyelenggaraan Promosi Olahraga.', 'sifat' => 'B'],

            // Bawah KO.01.05.04
            ['parent_id' => $ko_1_5_4, 'kode' => 'KO.01.05.04.01', 'nama' => 'Pengembangan, Pekan dan kejuaraan Olahraga Prestasi Daerah.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_5_4, 'kode' => 'KO.01.05.04.02', 'nama' => 'Pengembangan, Pekan dan kejuaraan Olahraga Prestasi Nasional.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_5_4, 'kode' => 'KO.01.05.04.03', 'nama' => 'Pengembangan, Pekan dan kejuaraan Olahraga Prestasi Internasional.', 'sifat' => 'B'],

            // Bawah KO.01.05.05
            ['parent_id' => $ko_1_5_5, 'kode' => 'KO.01.05.05.01', 'nama' => 'Standarisasi Olahraga Prestasi, Olahraga Pendidikan dan Olahrga Rekreasi.', 'sifat' => 'B'], // Typo asli Olahrga
            ['parent_id' => $ko_1_5_5, 'kode' => 'KO.01.05.05.02', 'nama' => 'Akreditasi dan Sertifikasi Olahraga Prestasi, Olahraga Pendidikan dan Olahraga Prestasi.', 'sifat' => 'B'],
            ['parent_id' => $ko_1_5_5, 'kode' => 'KO.01.05.05.03', 'nama' => 'Infrastruktur Prasarana dan Sarana Olahraga Pendidikan, Rekreasi dan Prestasi.', 'sifat' => 'B'],
        ]);
        // ==============================================================================
        // RINCIAN URUSAN SUBTANTIF: KK (Kependudukan dan Keluarga Berencana)
        // ==============================================================================
        $id_kk = DB::table('klasifikasis')->where('kode', 'KK')->value('id') ?? DB::table('klasifikasis')->insertGetId(['kode' => 'KK', 'nama' => 'Kependudukan dan Keluarga Berencana:', 'sifat' => 'B']);

        // --- LEVEL ANAK (Level 2) ---
        DB::table('klasifikasis')->insertOrIgnore([
            ['parent_id' => $id_kk, 'kode' => 'KK.01', 'nama' => 'Pengendalian Penduduk:', 'sifat' => 'B'],
            ['parent_id' => $id_kk, 'kode' => 'KK.02', 'nama' => 'Keluarga Berencana dan Kesehatan Reproduksi:', 'sifat' => 'B'],
            ['parent_id' => $id_kk, 'kode' => 'KK.03', 'nama' => 'Keluarga Sejahtera dan Pemberdayaan Keluarga:', 'sifat' => 'B'],
            ['parent_id' => $id_kk, 'kode' => 'KK.04', 'nama' => 'Advokasi dan Informasi:', 'sifat' => 'B'],
        ]);

        $kk_1 = DB::table('klasifikasis')->where('kode', 'KK.01')->value('id');
        $kk_2 = DB::table('klasifikasis')->where('kode', 'KK.02')->value('id');
        $kk_3 = DB::table('klasifikasis')->where('kode', 'KK.03')->value('id');
        $kk_4 = DB::table('klasifikasis')->where('kode', 'KK.04')->value('id');

        // --- LEVEL CUCU (Level 3) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah KK.01
            ['parent_id' => $kk_1, 'kode' => 'KK.01.01', 'nama' => 'Pemaduan kebijakan pengendalian penduduk:', 'sifat' => 'B'],
            ['parent_id' => $kk_1, 'kode' => 'KK.01.02', 'nama' => 'Perencanaan pengendalian penduduk:', 'sifat' => 'B'],
            ['parent_id' => $kk_1, 'kode' => 'KK.01.03', 'nama' => 'Kerjasama pendidikan kependudukan:', 'sifat' => 'B'],
            ['parent_id' => $kk_1, 'kode' => 'KK.01.04', 'nama' => 'Analisis dampak kependudukan:', 'sifat' => 'B'],

            // Bawah KK.02
            ['parent_id' => $kk_2, 'kode' => 'KK.02.01', 'nama' => 'Bina kesertaan keluarga berencana jalur pemerintah:', 'sifat' => 'B'],
            ['parent_id' => $kk_2, 'kode' => 'KK.02.02', 'nama' => 'Bina kesertaan keluarga berencana jalur swasta:', 'sifat' => 'B'],
            ['parent_id' => $kk_2, 'kode' => 'KK.02.03', 'nama' => 'Bina Kesertaan Keluarga Berencana Jalur Wilayah dan Sasaran khusus:', 'sifat' => 'B'],
            ['parent_id' => $kk_2, 'kode' => 'KK.02.04', 'nama' => 'Kesehatan Reproduksi:', 'sifat' => 'B'],

            // Bawah KK.03
            ['parent_id' => $kk_3, 'kode' => 'KK.03.01', 'nama' => 'Bina keluarga Balita dan Anak:', 'sifat' => 'B'],
            ['parent_id' => $kk_3, 'kode' => 'KK.03.02', 'nama' => 'Bina ketahanan remaja:', 'sifat' => 'B'],
            ['parent_id' => $kk_3, 'kode' => 'KK.03.03', 'nama' => 'Bina ketahanan keluarga Lansia dan Rentan:', 'sifat' => 'B'],
            ['parent_id' => $kk_3, 'kode' => 'KK.03.04', 'nama' => 'Pemberdayaan Ekonomi Keluarga:', 'sifat' => 'B'],
            ['parent_id' => $kk_3, 'kode' => 'KK.03.05', 'nama' => 'Pusat Pelayanan Keluarga Sejahtera:', 'sifat' => 'B'],

            // Bawah KK.04
            ['parent_id' => $kk_4, 'kode' => 'KK.04.01', 'nama' => 'Advokasi dan Komunikasi, Informasi dan Edukasi:', 'sifat' => 'B'],
            ['parent_id' => $kk_4, 'kode' => 'KK.04.02', 'nama' => 'Bina hubungan antar lembaga:', 'sifat' => 'B'],
            ['parent_id' => $kk_4, 'kode' => 'KK.04.03', 'nama' => 'Bina lini lapangan:', 'sifat' => 'B'],
            ['parent_id' => $kk_4, 'kode' => 'KK.04.04', 'nama' => 'Pelaporan dan statistik:', 'sifat' => 'B'],
            ['parent_id' => $kk_4, 'kode' => 'KK.04.05', 'nama' => 'Teknologi Informasi dan Dokumentasi:', 'sifat' => 'B'],
        ]);

        // Mengambil ID untuk memasukkan Level Cicit (Level 4)
        $kk_1_01 = DB::table('klasifikasis')->where('kode', 'KK.01.01')->value('id');
        $kk_1_02 = DB::table('klasifikasis')->where('kode', 'KK.01.02')->value('id');
        $kk_1_03 = DB::table('klasifikasis')->where('kode', 'KK.01.03')->value('id');
        $kk_1_04 = DB::table('klasifikasis')->where('kode', 'KK.01.04')->value('id');

        $kk_2_01 = DB::table('klasifikasis')->where('kode', 'KK.02.01')->value('id');
        $kk_2_02 = DB::table('klasifikasis')->where('kode', 'KK.02.02')->value('id');
        $kk_2_03 = DB::table('klasifikasis')->where('kode', 'KK.02.03')->value('id');
        $kk_2_04 = DB::table('klasifikasis')->where('kode', 'KK.02.04')->value('id');

        $kk_3_01 = DB::table('klasifikasis')->where('kode', 'KK.03.01')->value('id');
        $kk_3_02 = DB::table('klasifikasis')->where('kode', 'KK.03.02')->value('id');
        $kk_3_03 = DB::table('klasifikasis')->where('kode', 'KK.03.03')->value('id');
        $kk_3_04 = DB::table('klasifikasis')->where('kode', 'KK.03.04')->value('id');
        $kk_3_05 = DB::table('klasifikasis')->where('kode', 'KK.03.05')->value('id');

        $kk_4_01 = DB::table('klasifikasis')->where('kode', 'KK.04.01')->value('id');
        $kk_4_02 = DB::table('klasifikasis')->where('kode', 'KK.04.02')->value('id');
        $kk_4_03 = DB::table('klasifikasis')->where('kode', 'KK.04.03')->value('id');
        $kk_4_04 = DB::table('klasifikasis')->where('kode', 'KK.04.04')->value('id');
        $kk_4_05 = DB::table('klasifikasis')->where('kode', 'KK.04.05')->value('id');

        // --- LEVEL CICIT (Level 4) ---
        DB::table('klasifikasis')->insertOrIgnore([
            // Bawah KK.01.01
            ['parent_id' => $kk_1_01, 'kode' => 'KK.01.01.01', 'nama' => 'Analisis pemaduan kebijakan pengendalian penduduk (Pengumpulan dan Pengolahan Data).', 'sifat' => 'B'],
            ['parent_id' => $kk_1_01, 'kode' => 'KK.01.01.02', 'nama' => 'Analisis pemaduan kebijakan pengendalian penduduk (Evaluasi dan Pelaporan).', 'sifat' => 'B'],
            ['parent_id' => $kk_1_01, 'kode' => 'KK.01.01.03', 'nama' => 'Penyiapan fasilitas pemaduan kebijakan pengendalian penduduk.', 'sifat' => 'B'],
            ['parent_id' => $kk_1_01, 'kode' => 'KK.01.01.04', 'nama' => 'Fasilitas pemaduan kebijakan pengendalian penduduk (Evaluasi dan Pelaporan).', 'sifat' => 'B'],

            // Bawah KK.01.02
            ['parent_id' => $kk_1_02, 'kode' => 'KK.01.02.01', 'nama' => 'Data dan Evaluasi data Profil dan Proyeksi Penduduk.', 'sifat' => 'B'],
            ['parent_id' => $kk_1_02, 'kode' => 'KK.01.02.02', 'nama' => 'Penetapan parameter pengendalian penduduk (Penetapan sasaran parameter dan Evaluasi sasaran parameter).', 'sifat' => 'B'],
            ['parent_id' => $kk_1_02, 'kode' => 'KK.01.02.03', 'nama' => 'Pemanfaatan perencanaan pengendalian penduduk (Pemangfaatan profil dan proyeksi, Pemanfaatan Parameter).', 'sifat' => 'B'],

            // Bawah KK.01.03
            ['parent_id' => $kk_1_03, 'kode' => 'KK.01.03.01', 'nama' => 'Pengembangan sistem jalur pendidikan formal dan pengembangan jalur pendidikan non formal dan informal.', 'sifat' => 'B'],
            ['parent_id' => $kk_1_03, 'kode' => 'KK.01.03.02', 'nama' => 'Pengembangan Materi alur pendidikan formal dan pengembangan jalur pendidikan non formal dan informal.', 'sifat' => 'B'],
            ['parent_id' => $kk_1_03, 'kode' => 'KK.01.03.03', 'nama' => 'Monitoring dan evaluasi alur pendidikan formal dan pengembangan jalur pendidikan non formal dan informal.', 'sifat' => 'B'],

            // Bawah KK.01.04
            ['parent_id' => $kk_1_04, 'kode' => 'KK.01.04.01', 'nama' => 'Analisis Sosial.', 'sifat' => 'B'],
            ['parent_id' => $kk_1_04, 'kode' => 'KK.01.04.02', 'nama' => 'Analisis Ekonomi.', 'sifat' => 'B'],
            ['parent_id' => $kk_1_04, 'kode' => 'KK.01.04.03', 'nama' => 'Analisis dampak politik, pertahanan, dan keamanan.', 'sifat' => 'B'],
            ['parent_id' => $kk_1_04, 'kode' => 'KK.01.04.04', 'nama' => 'Analisis daya dukung dan daya tampung lingkungan.', 'sifat' => 'B'],

            // Bawah KK.02.01
            ['parent_id' => $kk_2_01, 'kode' => 'KK.02.01.01', 'nama' => 'Bina Keluarga Berencana Rumah Sakit dan Klinik Pemerintah.', 'sifat' => 'B'],
            ['parent_id' => $kk_2_01, 'kode' => 'KK.02.01.02', 'nama' => 'Jaminan pelayanan dan penyediaan sarana keluarga berencana.', 'sifat' => 'B'],
            ['parent_id' => $kk_2_01, 'kode' => 'KK.02.01.03', 'nama' => 'Kualitas, Standarisasi, Monitoring dan Evaluasi pelayanan keluarga berencana pemerintah.', 'sifat' => 'B'],

            // Bawah KK.02.02
            ['parent_id' => $kk_2_02, 'kode' => 'KK.02.02.01', 'nama' => 'Bina keluarga berencana rumah sakit dan klinik swasta.', 'sifat' => 'B'],
            ['parent_id' => $kk_2_02, 'kode' => 'KK.02.02.02', 'nama' => 'Jaminan dan ketersediaan sarana keluarga berencana swasta.', 'sifat' => 'B'],
            ['parent_id' => $kk_2_02, 'kode' => 'KK.02.02.03', 'nama' => 'Kualitas, Standarisasi, monitoring dan evaluasi pelayanan keluarga berencana swasta.', 'sifat' => 'B'],

            // Bawah KK.02.03
            ['parent_id' => $kk_2_03, 'kode' => 'KK.02.03.01', 'nama' => 'Peningkatan Akses dan kualitas pelayanan keluarga berencana wilayah tertinggal , terpencil dan perbatasan.', 'sifat' => 'B'],
            ['parent_id' => $kk_2_03, 'kode' => 'KK.02.03.02', 'nama' => 'Peningkatan Akses dan kualitas pelayanan keluarga berencana wilayah miskin perkotaan.', 'sifat' => 'B'],
            ['parent_id' => $kk_2_03, 'kode' => 'KK.02.03.03', 'nama' => 'Peningkatan akses dan Partisipasi Kesertaan keluarga berencana pria.', 'sifat' => 'B'],

            // Bawah KK.02.04
            ['parent_id' => $kk_2_04, 'kode' => 'KK.02.04.01', 'nama' => 'Kelangsungan hidup ibu, bayi dan anak.', 'sifat' => 'B'],
            ['parent_id' => $kk_2_04, 'kode' => 'KK.02.04.02', 'nama' => 'Pencegahan PMS dan HIV/AIDS.', 'sifat' => 'B'],
            ['parent_id' => $kk_2_04, 'kode' => 'KK.02.04.03', 'nama' => 'Pencegahan kanker alat reproduksi dan penanggulangan infertilitas.', 'sifat' => 'B'],

            // Bawah KK.03.01
            ['parent_id' => $kk_3_01, 'kode' => 'KK.03.01.01', 'nama' => 'Pelembagaan bina keluarga Balita dan anak (Pengembangan kelompok bina keluarga Balita dan anak , Pengembangan Kemitraan Bina Kelurga dan anak).', 'sifat' => 'B'],
            ['parent_id' => $kk_3_01, 'kode' => 'KK.03.01.02', 'nama' => 'Monitoring ,Evaluasi dan Pelaporan dan evaluasi bina keluarga Balita dan anak.', 'sifat' => 'B'],

            // Bawah KK.03.02
            ['parent_id' => $kk_3_02, 'kode' => 'KK.03.02.01', 'nama' => 'Pelembagaan bina ketahanan remaja jalur Pendidikan dan Jalur masyarakat.', 'sifat' => 'B'],
            ['parent_id' => $kk_3_02, 'kode' => 'KK.03.02.02', 'nama' => 'Monitoring dan Pelaporan dan evaluasi bina ketahanan Remaja.', 'sifat' => 'B'],

            // Bawah KK.03.03
            ['parent_id' => $kk_3_03, 'kode' => 'KK.03.03.01', 'nama' => 'Pengembangan Program Bina Ketahanan Keluarga Lansia dan keluarga Rentan.', 'sifat' => 'B'],
            ['parent_id' => $kk_3_03, 'kode' => 'KK.03.03.02', 'nama' => 'Pelembagaan Bina Ketahanan keluarga Lansia dan Rentan (Pengembangan kelompok dan kemitraan Bina Ketahanan Keluarga lansia dan Renta).', 'sifat' => 'B'],
            ['parent_id' => $kk_3_03, 'kode' => 'KK.03.03.03', 'nama' => 'Monitoring, evaluasi dan pelaporan bina ketahanan keluarga Lansia dan Rentan.', 'sifat' => 'B'],

            // Bawah KK.03.04
            ['parent_id' => $kk_3_04, 'kode' => 'KK.03.04.01', 'nama' => 'Pengembangan program usaha ekonomi keluarga.', 'sifat' => 'B'],
            ['parent_id' => $kk_3_04, 'kode' => 'KK.03.04.02', 'nama' => 'Peningkatan teknologi dan permodalan usaha ekonomi keluarga.', 'sifat' => 'B'],
            ['parent_id' => $kk_3_04, 'kode' => 'KK.03.04.03', 'nama' => 'Peningkatan manajemen usaha ekonomi keluarga (Pengembangan Administrasi, Keuangan dan pemasaran Kelompok Usaha Bersama).', 'sifat' => 'B'],
            ['parent_id' => $kk_3_04, 'kode' => 'KK.03.04.04', 'nama' => 'Monitoring dan evaluasi usaha ekonomi keluarga.', 'sifat' => 'B'],

            // Bawah KK.03.05
            ['parent_id' => $kk_3_05, 'kode' => 'KK.03.05.01', 'nama' => 'Pengembangan Program Pusat Pelayanan Keluarga Sejahtera.', 'sifat' => 'B'],
            ['parent_id' => $kk_3_05, 'kode' => 'KK.03.05.02', 'nama' => 'Pelembagaan Pusat Pelayanan Keluarga Sejahtera dan Kemitraan Pusat Pelayanan Keluarga sejahtera).', 'sifat' => 'B'],
            ['parent_id' => $kk_3_05, 'kode' => 'KK.03.05.03', 'nama' => 'Monitoring Evaluasi dan Pelaporan Pusat Pelayanan Keluarga Sejahtera.', 'sifat' => 'B'],

            // Bawah KK.04.01
            ['parent_id' => $kk_4_01, 'kode' => 'KK.04.01.01', 'nama' => 'Pengembangan advokasi dan komunikasi, informasi, edukasi (Perencanan, Evaluasi dan Pelaporan).', 'sifat' => 'B'],
            ['parent_id' => $kk_4_01, 'kode' => 'KK.04.01.02', 'nama' => 'Advokasi dan pencitraan.', 'sifat' => 'B'],
            ['parent_id' => $kk_4_01, 'kode' => 'KK.04.01.03', 'nama' => 'Promosi.', 'sifat' => 'B'],
            ['parent_id' => $kk_4_01, 'kode' => 'KK.04.01.04', 'nama' => 'Sarana Produksi Media komunikasi.', 'sifat' => 'B'],
            ['parent_id' => $kk_4_01, 'kode' => 'KK.04.01.05', 'nama' => 'Produk media komunikasi.', 'sifat' => 'B'],

            // Bawah KK.04.02
            ['parent_id' => $kk_4_02, 'kode' => 'KK.04.02.01', 'nama' => 'Hubungan dengan lembaga pemerintah pusat dan provinsi.', 'sifat' => 'B'],
            ['parent_id' => $kk_4_02, 'kode' => 'KK.04.02.02', 'nama' => 'Pengembangan dan Penguatan hubungan dengan lembaga Pemerintah Daerah Kabupaten dan Kota.', 'sifat' => 'B'],
            ['parent_id' => $kk_4_02, 'kode' => 'KK.04.02.03', 'nama' => 'Pengembangan dan Penguatan hubungan dengan lembaga non pemerintah.', 'sifat' => 'B'],

            // Bawah KK.04.03
            ['parent_id' => $kk_4_03, 'kode' => 'KK.04.03.01', 'nama' => 'Pengembangan tenaga lini lapangan.', 'sifat' => 'B'],
            ['parent_id' => $kk_4_03, 'kode' => 'KK.04.03.02', 'nama' => 'Monitoring dan Evaluasi Tenaga Lini Lapangan.', 'sifat' => 'B'],
            ['parent_id' => $kk_4_03, 'kode' => 'KK.04.03.03', 'nama' => 'Pengembangan Institusi masyarakat pedesaan.', 'sifat' => 'B'],
            ['parent_id' => $kk_4_03, 'kode' => 'KK.04.03.04', 'nama' => 'Monitoring dan evaluasi Institusi masyarakat pedesaan.', 'sifat' => 'B'],
            ['parent_id' => $kk_4_03, 'kode' => 'KK.04.03.05', 'nama' => 'Pengembangan institusi masyarakat pedesaan mekanisme operasional lini lapangan.', 'sifat' => 'B'],
            ['parent_id' => $kk_4_03, 'kode' => 'KK.04.03.06', 'nama' => 'Monitoring dan evaluasi mekanisme operasional lini lapangan.', 'sifat' => 'B'],

            // Bawah KK.04.04
            ['parent_id' => $kk_4_04, 'kode' => 'KK.04.04.01', 'nama' => 'Pengembangan sistem pencatatan dan pelaporan (Perumusan pola, Sistem pencatatan dan pelaporan).', 'sifat' => 'B'],
            ['parent_id' => $kk_4_04, 'kode' => 'KK.04.04.02', 'nama' => 'Monitoring dan Evaluasi Sistem pencatatan dan pelaporan.', 'sifat' => 'B'],
            ['parent_id' => $kk_4_04, 'kode' => 'KK.04.04.03', 'nama' => 'Pengumpulan dan pengolahan data.', 'sifat' => 'B'],
            ['parent_id' => $kk_4_04, 'kode' => 'KK.04.04.04', 'nama' => 'Analisis dan evaluasi pengendalian penduduk.', 'sifat' => 'B'],
            ['parent_id' => $kk_4_04, 'kode' => 'KK.04.04.05', 'nama' => 'Analisa dan evaluasi keluarga berencana dan keluarga.', 'sifat' => 'B'],

            // Bawah KK.04.05
            ['parent_id' => $kk_4_05, 'kode' => 'KK.04.05.01', 'nama' => 'Pengembangan sistem aplikasi.', 'sifat' => 'B'],
            ['parent_id' => $kk_4_05, 'kode' => 'KK.04.05.02', 'nama' => 'Pengelolaan Bank data.', 'sifat' => 'B'],
            ['parent_id' => $kk_4_05, 'kode' => 'KK.04.05.03', 'nama' => 'Pengembangan Infrastruktur teknologi informasi.', 'sifat' => 'B'],
            ['parent_id' => $kk_4_05, 'kode' => 'KK.04.05.04', 'nama' => 'Pemeliharaan Infrastruktur teknologi informasi.', 'sifat' => 'B'],
            ['parent_id' => $kk_4_05, 'kode' => 'KK.04.05.05', 'nama' => 'Dokumentasi dan Perpustakaan.', 'sifat' => 'B'],
            ['parent_id' => $kk_4_05, 'kode' => 'KK.04.05.06', 'nama' => 'Pengelolaan situs BKKBN dan Media konferensi.', 'sifat' => 'B'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('klasifikasis');
    }
};
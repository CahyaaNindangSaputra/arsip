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
        
    }

    public function down(): void
    {
        Schema::dropIfExists('klasifikasis');
    }
};
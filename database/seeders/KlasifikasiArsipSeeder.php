<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Klasifikasi;

class KlasifikasiArsipSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // ==========================================
            // TINGKAT UTAMA
            // ==========================================
            ['kode' => 'KS', 'nama' => 'Kesehatan'],

            // ==========================================
            // KS.01 UPAYA KESEHATAN
            // ==========================================
            ['kode' => 'KS.01', 'nama' => 'Upaya Kesehatan'],
            
            // KS.01.01
            ['kode' => 'KS.01.01', 'nama' => 'Upaya Kesehatan Dasar'],
            ['kode' => 'KS.01.01.01', 'nama' => 'Pelayanan Kedokteran Keluarga'],
            ['kode' => 'KS.01.01.02', 'nama' => 'Praktik Klinis Bagi Dokter di Fasyankes Primer'],
            ['kode' => 'KS.01.01.03', 'nama' => 'Pelaksanaan Kesehatan Primer'],
            ['kode' => 'KS.01.01.04', 'nama' => 'Kesehatan Gigi dan Mulut di Puskesmas'],
            ['kode' => 'KS.01.01.05', 'nama' => 'Kesehatan Gigi dan Mulut di Rumah Sakit'],
            ['kode' => 'KS.01.01.06', 'nama' => 'ICD 10, Dentistry & Stomatology'],
            ['kode' => 'KS.01.01.07', 'nama' => 'Infeksi Menular Lewat Tranfusi Darah'],
            ['kode' => 'KS.01.01.08', 'nama' => 'Penyakit Mulut di Tingkat Primer'],
            ['kode' => 'KS.01.01.09', 'nama' => 'Pembiayaan Darah'],
            ['kode' => 'KS.01.01.10', 'nama' => 'Penggunaan Darah Rasional'],
            ['kode' => 'KS.01.01.11', 'nama' => 'Unit Transfusi Darah, Bank Darah Rumah Sakit dan Jejaring Pelayanan Darah'],
            ['kode' => 'KS.01.01.12', 'nama' => 'Pelayanan Kesehatan di Daerah Terpencil, sangat terpencil dan kepulauan'],
            ['kode' => 'KS.01.01.13', 'nama' => 'Akreditasi Puskesmas'],
            ['kode' => 'KS.01.01.14', 'nama' => 'Puskesmas Berprestasi'],

            // KS.01.02
            ['kode' => 'KS.01.02', 'nama' => 'Upaya Kesehatan Rujukan'],
            ['kode' => 'KS.01.02.01', 'nama' => 'Pelayanan Kesehatan Rujukan Rumah Sakit Bergerak, Pratama, Publik, Privat dan Khusus'],
            ['kode' => 'KS.01.02.02', 'nama' => 'Pelayanan Kedokteran, Organisasi Profesi dan Konsorsium Upaya Kesehatan (KUK)'],
            ['kode' => 'KS.01.02.03', 'nama' => 'Pelayanan Rumah Sakit Privat (SPGDT Call 119, Rekayasa Jaringan, Geriartri, Medical tourism, Hyperbarik)'],
            ['kode' => 'KS.01.02.04', 'nama' => 'Pelayanan Kesehatan di Rumah Sakit Khusus dan Fasilitas Pelayanan Kesehatan Lain'],
            ['kode' => 'KS.01.02.05', 'nama' => 'Pelayanan Kesehatan di Rumah Sakit pendidikan'],
            ['kode' => 'KS.01.02.06', 'nama' => 'Pelayanan Pasien Jaminan Kesehatan (Biaya Klaim)'],
            ['kode' => 'KS.01.02.07', 'nama' => 'Fasilitas Pelayanan Kesehatan Asing dan Perdagangan Jasa'],
            ['kode' => 'KS.01.02.08', 'nama' => 'Badan Pengawas di Rumah Sakit'],
            ['kode' => 'KS.01.02.09', 'nama' => 'Perizinan dan Penetapan Kelas Rumah Sakit Kelas A dan Penanaman Modal Asing'],
            ['kode' => 'KS.01.02.10', 'nama' => 'Akreditasi Rumah Sakit dan Fasilitas Kesehatan Lain'],

            // ==========================================
            // KS.02 PENGENDALIAN PENYAKIT & LINGKUNGAN
            // ==========================================
            ['kode' => 'KS.02', 'nama' => 'Pengendalian Penyakit dan Penyehatan Lingkungan'],
            ['kode' => 'KS.02.01', 'nama' => 'Surveilans, Imunisasi, Karantina, dan Kesehatan Matra'],
            ['kode' => 'KS.02.02', 'nama' => 'Pengendalian Penyakit Menular Langsung'],
            ['kode' => 'KS.02.03', 'nama' => 'Pengendalian AIDS dan Penyakit Menular Seksual'],
            ['kode' => 'KS.02.04', 'nama' => 'Pengendalian Infeksi Pengendalian Saluran Pernafasan Akut'],
            ['kode' => 'KS.02.05', 'nama' => 'Pengendalian Diare dan Infeksi Saluran Pencernaan'],
            ['kode' => 'KS.02.06', 'nama' => 'Pengendalian Kusta dan Frambusia'],
            ['kode' => 'KS.02.07', 'nama' => 'Pengendalian Penyakit Bersumber Binatang'],
            ['kode' => 'KS.02.08', 'nama' => 'Pengendalian Zoonosis'],
            ['kode' => 'KS.02.09', 'nama' => 'Pengendalian Filariasis dan Kecacingan'],
            ['kode' => 'KS.02.10', 'nama' => 'Pengendalian Vektor'],
            ['kode' => 'KS.02.11', 'nama' => 'Pengendalian Penyakit Tidak Menular'],
            ['kode' => 'KS.02.12', 'nama' => 'Pengendalian Penyakit Jantung dan Pembuluh Darah'],
            
            // ==========================================
            // KATEGORI LAINNYA (DARI GAMBAR 4, 5, 6)
            // ==========================================
            ['kode' => 'KS.03', 'nama' => 'Gizi dan Kesehatan Ibu Dan Anak'],
            ['kode' => 'KS.03.01', 'nama' => 'Gizi Makro'],
            ['kode' => 'KS.03.02', 'nama' => 'Gizi Mikro'],
            ['kode' => 'KS.03.03', 'nama' => 'Gizi Klinik dan Dietetik'],
            ['kode' => 'KS.03.04', 'nama' => 'Konsumsi Makanan dan Jasa Makanan'],
            ['kode' => 'KS.03.05', 'nama' => 'Kewaspadaan Gizi'],

            ['kode' => 'KS.04', 'nama' => 'Kesehatan Ibu'],
            ['kode' => 'KS.04.01', 'nama' => 'Kesehatan Ibu Hamil'],
            ['kode' => 'KS.04.02', 'nama' => 'Kesehatan Ibu Bersalin dan Nifas'],
            ['kode' => 'KS.04.03', 'nama' => 'Kesehatan Maternal Dengan Pencegahan Komplikasi'],
            ['kode' => 'KS.04.04', 'nama' => 'Keluarga Berencana'],
            ['kode' => 'KS.04.05', 'nama' => 'Perlindungan Kesehatan Reproduksi'],

            ['kode' => 'KS.05', 'nama' => 'Kesehatan Anak'],
            ['kode' => 'KS.05.01', 'nama' => 'Kelangsungan Hidup Bayi'],
            ['kode' => 'KS.05.02', 'nama' => 'Kelangsungan Hidup Anak Balita dan Pra Sekolah'],
            ['kode' => 'KS.05.03', 'nama' => 'Kewaspadaan Penanganan Balita Berisiko'],

            ['kode' => 'KS.06', 'nama' => 'Kesehatan Tradisional Alternatif Dan Komplementer'],
            ['kode' => 'KS.07', 'nama' => 'Kesehatan Kerja dan Olah Raga'],
            ['kode' => 'KS.08', 'nama' => 'Kefarmasian Dan Alat Kesehatan'],
            ['kode' => 'KS.09', 'nama' => 'Produksi dan Distribusi Alat Kesehatan'],
            // ==========================================
            // KELANJUTAN KS.09.03 (Dari potongan atas gambar pertama)
            // ==========================================
            ['kode' => 'KS.09.03.02', 'nama' => 'Perbekalan Kesehatan Rumah Tangga (PKRT)'],
            ['kode' => 'KS.09.03.03', 'nama' => 'PKRT Klas III'],
            ['kode' => 'KS.09.03.04', 'nama' => 'PKRT Klas I dan II'],
            ['kode' => 'KS.09.03.05', 'nama' => 'Perusahaan Rumah Tangga PKRT'],
            ['kode' => 'KS.09.03.06', 'nama' => 'Penggunaan Pestisida Di Rumah Tangga'],
            ['kode' => 'KS.09.03.07', 'nama' => 'Post Market & Surveillance PKRT'],

            // ==========================================
            // KS.10 KEFARMASIAN
            // ==========================================
            ['kode' => 'KS.10', 'nama' => 'Kefarmasian (Standarisasi, klinis, komunitas dan Obat Tradisional)'],
            ['kode' => 'KS.10.01', 'nama' => 'Pelayanan Kefarmasian'],
            ['kode' => 'KS.10.01.01', 'nama' => 'Visite untuk Apoteker'],
            ['kode' => 'KS.10.01.02', 'nama' => 'Tanggung Jawab Apoteker terhadap Keselamatan Pasien (Patient Safety)'],
            ['kode' => 'KS.10.01.03', 'nama' => 'Penulisan Resep'],
            
            ['kode' => 'KS.10.02', 'nama' => 'Farmasi Klinik'],
            ['kode' => 'KS.10.02.01', 'nama' => 'Pharmaceutical Care untuk Penyakit Artritis Rematik'],
            ['kode' => 'KS.10.02.02', 'nama' => 'Pharmaceutical Care untuk Penyakit Asma'],
            ['kode' => 'KS.10.02.03', 'nama' => 'Pharmaceutical Care untuk Penyakit Flu Burung'],
            ['kode' => 'KS.10.02.04', 'nama' => 'Pharmaceutical Care untuk Penyakit Hati'],
            ['kode' => 'KS.10.02.05', 'nama' => 'Pharmaceutical Care untuk Penyakit Diabetes Mellitus'],
            ['kode' => 'KS.10.02.06', 'nama' => 'Pharmaceutical Care untuk Penyakit Infeksi Saluran Pernapasan'],
            ['kode' => 'KS.10.02.07', 'nama' => 'Pharmaceutical Care untuk Penyakit Tuberculosis'],
            ['kode' => 'KS.10.02.08', 'nama' => 'Pharmaceutical Care Lainnya'],
            ['kode' => 'KS.10.02.09', 'nama' => 'Dispensing Sediaan Steril'],
            ['kode' => 'KS.10.02.10', 'nama' => 'Pencampuran Obat Suntikan Penanganan Sediaan Sitostatika'],
            ['kode' => 'KS.10.02.11', 'nama' => 'Pharmaceutical Care untuk Pasien Penyakit Jantung Koroner Fokus Sindrom, koronwer akut'],
            
            ['kode' => 'KS.10.03', 'nama' => 'Farmasi Komunitas'],
            ['kode' => 'KS.10.03.01', 'nama' => 'Penggunaan Obat Bebas dan Bebas Terbatas'],
            ['kode' => 'KS.10.03.02', 'nama' => 'Kefarmasian di Rumah (Home Pharmacy Care)'],
            ['kode' => 'KS.10.03.03', 'nama' => 'Kefarmasian untuk Pasien Pediatri'],
            ['kode' => 'KS.10.03.04', 'nama' => 'Kefarmasian untuk Penyakit Malaria'],
            ['kode' => 'KS.10.03.05', 'nama' => 'Farmasi di Rumah Sakit'],

            ['kode' => 'KS.10.04', 'nama' => 'Penggunaan Obat Rasional'],
            ['kode' => 'KS.10.04.01', 'nama' => 'Obat Rasional'],
            ['kode' => 'KS.10.04.02', 'nama' => 'Informasi Obat'],
            ['kode' => 'KS.10.04.03', 'nama' => 'Kefarmasian untuk Terapi Antibiotik'],
            ['kode' => 'KS.10.04.04', 'nama' => 'Pemantauan Terapi Obat'],

            // ==========================================
            // KS.11 PRODUKSI DAN DISTRIBUSI KEFARMASIAN
            // ==========================================
            ['kode' => 'KS.11', 'nama' => 'Produksi Dan Distribusi Kefarmasian'],
            ['kode' => 'KS.11.01', 'nama' => 'Obat Tradisional'],
            ['kode' => 'KS.11.01.01', 'nama' => 'Farmakope Indonesia'],
            ['kode' => 'KS.11.01.02', 'nama' => 'Farmakope Herbal Indonesia'],
            ['kode' => 'KS.11.01.03', 'nama' => 'Suplemen I Farmakope Indonesia'],
            ['kode' => 'KS.11.01.04', 'nama' => 'Suplemen II Farmakope Indonesia'],
            ['kode' => 'KS.11.01.05', 'nama' => 'Suplemen II Farmakope Indonesia'], // Sesuai dengan dokumen asli
            ['kode' => 'KS.11.01.06', 'nama' => 'Suplemen I Farmakope Herbal Indonesia'],
            ['kode' => 'KS.11.01.07', 'nama' => 'Suplemen II Farmakope Herbal Indonesia'],
            ['kode' => 'KS.11.01.08', 'nama' => 'Suplemen III Farmakope Herbal Indonesia'],
            ['kode' => 'KS.11.01.09', 'nama' => 'Usaha Kecil Obat Tradisional (UKOT)'],
            ['kode' => 'KS.11.01.10', 'nama' => 'Usaha Menengah Obat Tradisional (UMOT)'],
            ['kode' => 'KS.11.01.11', 'nama' => 'Usaha Jamu Gendong (UJG)'],
            ['kode' => 'KS.11.01.12', 'nama' => 'Usaha Jamu Racik (UJR)'],
            ['kode' => 'KS.11.01.13', 'nama' => 'Farmakope Herbal Indonesia & Suplemennya Versi Bahasa Inggris'],

            ['kode' => 'KS.11.02', 'nama' => 'Kosmetik dan Makanan'],
            ['kode' => 'KS.11.02.01', 'nama' => 'Keamanan Pangan'],
            ['kode' => 'KS.11.02.02', 'nama' => 'Kosmetika bagi Petugas'],
            ['kode' => 'KS.11.02.03', 'nama' => 'Industri Rumah Tangga bagi Petugas'],
            ['kode' => 'KS.11.02.04', 'nama' => 'Makanan Jajanan Anak Sekolah'],
            ['kode' => 'KS.11.02.05', 'nama' => 'Kodeks Kosmetika Indonesia'],
            ['kode' => 'KS.11.02.06', 'nama' => 'Materia Kosmetika Bahan Alam Indonesia'],

            ['kode' => 'KS.11.03', 'nama' => 'Narkotika, Psikotropika, Prekursor Farmasi dan Sediaan Farmasi Khusus'],
            ['kode' => 'KS.11.03.01', 'nama' => 'Narkotika dan Psikotropika'],
            ['kode' => 'KS.11.03.02', 'nama' => 'Prekursor Farmasi'],
            ['kode' => 'KS.11.03.03', 'nama' => 'Sediaan Farmasi Khusus'],
            ['kode' => 'KS.11.03.04', 'nama' => 'Persetujuan Impor dan Ekspor'],
            ['kode' => 'KS.11.03.05', 'nama' => 'Pelaksanaan Perizinan Import dan Eksport Narkotika, Psikotropika dan Prekursor farmasi'],

            ['kode' => 'KS.11.04', 'nama' => 'Kemandirian Obat dan Bahan Baku Obat'],
            ['kode' => 'KS.11.04.01', 'nama' => 'Indonesian Pharmaceutical Industry Directory'],

            // ==========================================
            // KS.12 SURAT KETERANGAN, SERTIFIKASI DAN PERIJINAN
            // ==========================================
            ['kode' => 'KS.12', 'nama' => 'Surat Keterangan, Sertifikasi dan Perijinan'],
            ['kode' => 'KS.12.01', 'nama' => 'Surat Keterangan'],
            ['kode' => 'KS.12.01.01', 'nama' => 'Surat Keterangan Special Acces Scheme (SAS)'],
            ['kode' => 'KS.12.01.02', 'nama' => 'Surat Keterangan Special Acces Scheme (SAS)'], // Duplicate di dokumen
            ['kode' => 'KS.12.01.03', 'nama' => 'Surat Keterangan Alat Kesehatan'],
            ['kode' => 'KS.12.01.04', 'nama' => 'Sertifikasi Produksi PKRT'],
            ['kode' => 'KS.12.01.05', 'nama' => 'Surat Keterangan PKRT'],
            ['kode' => 'KS.12.01.06', 'nama' => 'Sertifikasi Produksi Alat Kesehatan'],
            ['kode' => 'KS.12.01.07', 'nama' => 'Sertifikasi Sarana Distribusi Alat Kesehatan'],
            ['kode' => 'KS.12.01.08', 'nama' => 'Perijinan dan Pengawasan Alat Kesehatan'],
            ['kode' => 'KS.12.01.09', 'nama' => 'Perijinan Penyalur Alat Kesehatan'],
            ['kode' => 'KS.12.01.10', 'nama' => 'Surat Keterangan Alat Kesehatan'],
            ['kode' => 'KS.12.01.11', 'nama' => 'Sertifikasi Produksi PKRT'],
            ['kode' => 'KS.12.01.12', 'nama' => 'Surat Keterangan PKRT'],

            // ==========================================
            // KS.13 PENANGGULANGAN KRISIS KESEHATAN
            // ==========================================
            ['kode' => 'KS.13', 'nama' => 'Penanggulangan Krisis Kesehatan'],
            ['kode' => 'KS.13.01', 'nama' => 'Pencegahan, Mitigasi,Kesiapsiagaan'],
            ['kode' => 'KS.13.01.01', 'nama' => 'Pencegahan dan Mitigasi'],
            ['kode' => 'KS.13.01.02', 'nama' => 'Kesiapsiagaan'],
            
            ['kode' => 'KS.13.02', 'nama' => 'Tanggap Darurat dan Pemulihan'],
            ['kode' => 'KS.13.02.01', 'nama' => 'Tanggap Darurat'],
            ['kode' => 'KS.13.02.02', 'nama' => 'Pemulihan'],
            
            ['kode' => 'KS.13.03', 'nama' => 'Pemantauan dan Informasi'],
            ['kode' => 'KS.13.03.01', 'nama' => 'Pemantauan'],
            ['kode' => 'KS.13.03.02', 'nama' => 'Informasi'],
            
            ['kode' => 'KS.13.04', 'nama' => 'Penanggulangan Krisis Kesehatan dalam bidang Pengendalian Penyakit dan Penyehatan'],
            ['kode' => 'KS.13.05', 'nama' => 'Pelayanan Kesehatan Reproduksi Situasi Bencana'],

            // ==========================================
            // KS.14 PENGEMBANGAN DAN JAMINAN KESEHATAN
            // ==========================================
            ['kode' => 'KS.14', 'nama' => 'Pengembangan Dan Jaminan Kesehatan'],
            ['kode' => 'KS.14.01', 'nama' => 'Tersedianya data NHA Setiap Tahun'],
            ['kode' => 'KS.14.02', 'nama' => 'Tersedianya dokumen Teknis Penguatan Pelaksanaan JKN'],

            // ==========================================
            // KS.15 INTELIGENSIA KESEHATAN
            // ==========================================
            ['kode' => 'KS.15', 'nama' => 'Inteligensia Kesehatan'],
            ['kode' => 'KS.15.01', 'nama' => 'Pemeliharaan dan Peningkatan Kemampuan Inteligensia Kesehatan'],
            ['kode' => 'KS.15.01.01', 'nama' => 'Inteligensia Anak'],
            ['kode' => 'KS.15.01.02', 'nama' => 'Inteligensia Remaja, Dewasa, dan Lanjut Usia'],
            
            ['kode' => 'KS.15.02', 'nama' => 'Penanggulangan Masalah Inteligensia Kesehatan'],
            ['kode' => 'KS.15.02.01', 'nama' => 'Inteligensia Akibat Gangguan Bawaan'],
            ['kode' => 'KS.15.02.02', 'nama' => 'Inteligensia Akibat Gangguan Degeneratif dan Sistem Persyarafan'],

            // ==========================================
            // KS.16 KESEHATAN HAJI
            // ==========================================
            ['kode' => 'KS.16', 'nama' => 'Kesehatan Haji'],
            ['kode' => 'KS.16.01', 'nama' => 'Pelayanan dan pendayagunaan sumber daya kesehatan haji'],
            ['kode' => 'KS.16.01.01', 'nama' => 'Pemeriksaan Kesehatan Jamaah Haji'],
            ['kode' => 'KS.16.01.02', 'nama' => 'Pelayanan Kesehatan jamaah Haji Kabupaten/Kota'],
            ['kode' => 'KS.16.01.03', 'nama' => 'Klaim Pelayanan Kesehatan di Embarkasi/Debarkasi atau KKP'],
            ['kode' => 'KS.16.01.04', 'nama' => 'Pelayanan Kesehatan Embarkasi'],
            ['kode' => 'KS.16.01.05', 'nama' => 'Rekruitmen Panitia Penyelenggara Ibadah Haji (PPIH)'],
            ['kode' => 'KS.16.01.06', 'nama' => 'Rekruitmen Tenaga Musiman'],
            
            ['kode' => 'KS.16.02', 'nama' => 'Peningkatan Kesehatan dan Pengendalian Faktor Risiko Kesehatan Haji'],
            ['kode' => 'KS.16.02.01', 'nama' => 'Advokasi dan Kemitraan Pembinaan Kesehatan Haji'],
            ['kode' => 'KS.16.02.02', 'nama' => 'Kesehatan Haji di Kabupaten/Kota'],
            ['kode' => 'KS.16.02.03', 'nama' => 'Kesehatan Haji Terpadu'],
            ['kode' => 'KS.16.02.04', 'nama' => 'Pemeriksaan Jasa Boga Catering Jemaah Haji'],
            ['kode' => 'KS.16.02.05', 'nama' => 'Vaksinasi jamaah Haji'],
            ['kode' => 'KS.16.02.06', 'nama' => 'Sanitasi Asrama Haji'],
            ['kode' => 'KS.16.02.07', 'nama' => 'Penyelenggaraan Kesehatan Haji di Indonesia dan Arab Saudi'],

            // ==========================================
            // KS.17 PROMOSI KESEHATAN
            // ==========================================
            ['kode' => 'KS.17', 'nama' => 'Promosi Kesehatan'],
            ['kode' => 'KS.17.01', 'nama' => 'Sarana Promosi Kesehatan'],
            ['kode' => 'KS.17.01.01', 'nama' => 'Booklet'],
            ['kode' => 'KS.17.01.02', 'nama' => 'Poster'],
            ['kode' => 'KS.17.01.03', 'nama' => 'Leaflet'],
            ['kode' => 'KS.17.01.04', 'nama' => 'Pamflet'],
            ['kode' => 'KS.17.01.05', 'nama' => 'Lembar Balik'],
            ['kode' => 'KS.17.01.06', 'nama' => 'Selebaran'],
            ['kode' => 'KS.17.01.07', 'nama' => 'Buletin'],
            ['kode' => 'KS.17.01.08', 'nama' => 'Festival'],
            ['kode' => 'KS.17.01.09', 'nama' => 'Lomba'],
            ['kode' => 'KS.17.01.10', 'nama' => 'Pameran'],
            ['kode' => 'KS.17.01.11', 'nama' => 'Seminar'],
            ['kode' => 'KS.17.01.12', 'nama' => 'Iklan Layanan Masyarakat'],
            ['kode' => 'KS.17.01.13', 'nama' => 'Film'],
            ['kode' => 'KS.17.01.14', 'nama' => 'Radio Spot'],

            ['kode' => 'KS.17.02', 'nama' => 'Pembinaan Advokasi dan Kemitraan serta Pemberdayaan Peran'],
            ['kode' => 'KS.17.02.01', 'nama' => 'Saka Bhakti Husada'],
            ['kode' => 'KS.17.02.02', 'nama' => 'Pemberdayaan dan Kesejahteraan Keluarga'],
            ['kode' => 'KS.17.02.03', 'nama' => 'Lembaga Sosial/Organisasi Kemasyarakatan di Bidang Kesehatan'],
            ['kode' => 'KS.17.02.04', 'nama' => 'Kawasan Tanpa Rokok'],
            ['kode' => 'KS.17.02.05', 'nama' => 'Kerjasama dengan Swasta dibidang Kesehatan'],
            ['kode' => 'KS.17.02.06', 'nama' => 'Kemitraan dan Peran Serta Masyarakat di Bidang Kesehatan'],
            ['kode' => 'KS.17.02.07', 'nama' => 'Koordinasi Lintas Program/Lintas Sektor di Bidang Kesehatan'],
            ['kode' => 'KS.17.02.08', 'nama' => 'Peran Serta Kader PKK dan Dasawisma dalam Mendukung Kesehatan Ibu dan Anak'],

            ['kode' => 'KS.17.03', 'nama' => 'Pengembangan Pesan Promosi Kesehatan'],
            ['kode' => 'KS.17.03.01', 'nama' => 'Pengembangan Pesan Promosi Kesehatan'],
            ['kode' => 'KS.17.03.02', 'nama' => 'Kampanye Promosi Kesehatan'],
            ['kode' => 'KS.17.03.03', 'nama' => 'Video Animasi Promosi Kesehatan'],

            ['kode' => 'KS.17.04', 'nama' => 'Hari Kesehatan'],
            ['kode' => 'KS.17.04.01', 'nama' => 'Hari Kesehatan Nasional'],
            ['kode' => 'KS.17.04.02', 'nama' => 'Hari Kesehatan Dunia'],
            ['kode' => 'KS.17.04.03', 'nama' => 'Hari tanpa Tembakau se-Dunia'],
            ['kode' => 'KS.17.04.04', 'nama' => 'Hari-hari Besar Kesehatan'],

            // ==========================================
            // KS.18 KONSIL KEDOKTERAN INDONESIA
            // ==========================================
            ['kode' => 'KS.18', 'nama' => 'Konsil Kedokteran Indonesia'],
            ['kode' => 'KS.18.01', 'nama' => 'Surat Tanda Registrasi (STR) Dokter dan Dokter Gigi'],

            // ==========================================
            // KS.19 DATA DAN INFORMASI
            // ==========================================
            ['kode' => 'KS.19', 'nama' => 'Data Dan Informasi'],
            ['kode' => 'KS.19.01', 'nama' => 'Statistik Kesehatan'],
            ['kode' => 'KS.19.01.01', 'nama' => 'Statistik Derajat dan Upaya Kesehatan'],
            ['kode' => 'KS.19.01.02', 'nama' => 'Statistik Lingkungan dan Sumber Daya Kesehatan'],

            ['kode' => 'KS.19.02', 'nama' => 'Analisis dan Diseminasi Informasi'],
            ['kode' => 'KS.19.02.01', 'nama' => 'Analisis Data Kesehatan'],
            ['kode' => 'KS.19.02.02', 'nama' => 'Diseminasi Informasi Kesehatan'],

            ['kode' => 'KS.19.03', 'nama' => 'Pengembangan Sistem Informasi dan Bank Data Kesehatan'],
            ['kode' => 'KS.19.03.01', 'nama' => 'Pengembangan Sistem Informasi'],
            ['kode' => 'KS.19.03.02', 'nama' => 'Bank Data'],

            // ==========================================
            // KODE SS: URUSAN SOSIAL
            // ==========================================
            ['kode' => 'SS', 'nama' => 'Urusan Sosial'],

            // ==========================================
            // SS.01 REHABILITASI SOSIAL
            // ==========================================
            ['kode' => 'SS.01', 'nama' => 'Rehabilitasi Sosial'],
            
            ['kode' => 'SS.01.01', 'nama' => 'Kesejahteraan sosial anak'],
            ['kode' => 'SS.01.01.01', 'nama' => 'Pengangkatan Kesejahteraan Anak Balita'],
            ['kode' => 'SS.01.01.02', 'nama' => 'Kesejahteraan Pengasuhan Anak Balita'],
            
            ['kode' => 'SS.01.02', 'nama' => 'Kesejahteraan Sosial Anak Terlantar'],
            ['kode' => 'SS.01.02.01', 'nama' => 'Kesejahteraan Pengasuhan Anak dalam Keluarga'],
            ['kode' => 'SS.01.02.02', 'nama' => 'Kesejahteraan Pengasuhan Anak dalam Lembaga'],

            ['kode' => 'SS.01.03', 'nama' => 'Kesejahteraan Sosial Anak Berhadapan dengan Hukum'],
            ['kode' => 'SS.01.03.01', 'nama' => 'Perlindungan dan Rehabilitasi Sosial Anak Berhadapan dengan Hukum'],
            ['kode' => 'SS.01.03.02', 'nama' => 'Pengembangan Remaja'],

            ['kode' => 'SS.01.04', 'nama' => 'Kesejahteraan Sosial Anak dengan Kecacatan'],
            ['kode' => 'SS.01.04.01', 'nama' => 'Kelembagaan dan Penguatan Keluarga'],
            ['kode' => 'SS.01.04.02', 'nama' => 'Akselerasi anak dengan kecacatan'],

            ['kode' => 'SS.01.05', 'nama' => 'Kesejahteraan Sosial Anak yang Membutuhkan Perlindungan Khusus'],
            ['kode' => 'SS.01.05.01', 'nama' => 'Kelembagaan Perlindungan Anak'],
            ['kode' => 'SS.01.05.02', 'nama' => 'Advokasi dan Perlindungan Khusus'],

            // Catatan: Di dokumen asli tertulis 02 lagi, dikoreksi menjadi 06
            ['kode' => 'SS.01.06', 'nama' => 'Rehabilitasi Sosial'],
            ['kode' => 'SS.01.06.01', 'nama' => 'Rehabilitasi Sosial Orang dengan Kecacatan tubuh dan bekas penderita penyakit kronis, netra dan rungu wicara, mental dalam panti'],
            ['kode' => 'SS.01.06.02', 'nama' => 'Rehabilitasi Sosial Orang dengan Kecacatan tubuh dan bekas penderita penyakit kronis, netra dan rungu wicara, mental luar panti'],
            ['kode' => 'SS.01.06.03', 'nama' => 'Kelembagaan dan advokasi social'],
            ['kode' => 'SS.01.06.04', 'nama' => 'Asistensi dan pemeliharaan kesejahteraan social'],

            // Catatan: Di dokumen asli tertulis 03, dikoreksi menjadi 07
            ['kode' => 'SS.01.07', 'nama' => 'Rehabilitasi sosial tuna social'],
            ['kode' => 'SS.01.07.01', 'nama' => 'Gelandangan, pengemis dan pemulung'],
            ['kode' => 'SS.01.07.02', 'nama' => 'Tuna susila dan korban traffiking perempuan'],
            ['kode' => 'SS.01.07.03', 'nama' => 'Penyiapan Bekas warga binaan lembaga pemasyarakatan'],
            ['kode' => 'SS.01.07.04', 'nama' => 'Reintegrasi Bekas warga binaan lembaga pemasyarakatan'],
            ['kode' => 'SS.01.07.05', 'nama' => 'Pelayanan sosial orang dengan HIV/AIDS dan kelompok minoritas'],

            // Catatan: Di dokumen asli tertulis 04, dikoreksi menjadi 08
            ['kode' => 'SS.01.08', 'nama' => 'Rehabilitasi Sosial Korban Penyalahgunaan NAPZA'],
            ['kode' => 'SS.01.08.01', 'nama' => 'Pencegahan penyalahgunaan NAPZA dan pengembangan peran masyarakat'],
            ['kode' => 'SS.01.08.02', 'nama' => 'Rehabilitasi sosial korban penyalahgunaan NAPZA dalam institusi dan luar institusi'],

            // Catatan: Di dokumen asli tertulis 05, dikoreksi menjadi 09
            ['kode' => 'SS.01.09', 'nama' => 'Pelayanan sosial lanjut usia'],
            ['kode' => 'SS.01.09.01', 'nama' => 'Pelayanan sosial dalam dan luar panti'],
            ['kode' => 'SS.01.09.02', 'nama' => 'Pembinaan Pengembangan kelembagaan'],
            ['kode' => 'SS.01.09.03', 'nama' => 'Kerjasama Pengembangan Lembaga'],
            ['kode' => 'SS.01.09.04', 'nama' => 'Advokasi dan pelayanan sosial kedaruratan'], // Koreksi typo double 03 di dokumen

            // ==========================================
            // SS.02 PERLINDUNGAN DAN JAMINAN SOSIAL
            // ==========================================
            ['kode' => 'SS.02', 'nama' => 'Perlindungan dan Jaminan Sosial'],
            
            ['kode' => 'SS.02.01', 'nama' => 'Pengumpulan dan pengelolaan sumber dana bantuan social'],
            ['kode' => 'SS.02.01.01', 'nama' => 'Bimbingan dan standardisasi'],
            ['kode' => 'SS.02.01.02', 'nama' => 'Perizinan dan pengumpulan'],

            ['kode' => 'SS.02.02', 'nama' => 'Perlindungan Sosial Korban Tindak Kekerasan dan pekerja migrant'],
            ['kode' => 'SS.02.02.01', 'nama' => 'Perlindungan dan pemulihan sosial korban tindak kekerasan'],
            ['kode' => 'SS.02.02.02', 'nama' => 'Pemulangan dan Reintegrasi sosial korban tindak kekerasan'],
            ['kode' => 'SS.02.02.03', 'nama' => 'Perlindungan penampungan dan pemulihan sosial pekerja migrant'],
            ['kode' => 'SS.02.02.04', 'nama' => 'Pemulangan dan Reintegrasi pekerja migrant'], // Dihapus duplikatnya yang ada di halaman selanjutnya

            ['kode' => 'SS.02.03', 'nama' => 'Evaluasi dan pelaporan'],
            ['kode' => 'SS.02.03.01', 'nama' => 'Evaluasi dan pelaporan Kerjasama'],
            ['kode' => 'SS.02.03.02', 'nama' => 'Pemantauan, Evaluasi dan Pelaporan'],

            ['kode' => 'SS.02.04', 'nama' => 'Perlindungan sosial korban bencana sosial'],
            ['kode' => 'SS.02.04.01', 'nama' => 'Ketahanan sosial masyarakat ( Keserasian sosial, penguatan sumber daya)'],
            ['kode' => 'SS.02.04.02', 'nama' => 'Tanggap Darurat ( Bantuan darurat, Advokasi sosial)'],
            ['kode' => 'SS.02.04.03', 'nama' => 'Pemulihan sosial ( penguatan sosial, advokasi sosial)'],
            ['kode' => 'SS.02.04.04', 'nama' => 'Kerjasama pemerintah dan non pemeintah'],

            ['kode' => 'SS.02.05', 'nama' => 'Perlindungan sosial korban bencana alam'],
            ['kode' => 'SS.02.05.01', 'nama' => 'Kesiapsiagaan dan mitigasi'],
            ['kode' => 'SS.02.05.02', 'nama' => 'Bantuan Tanggap darurat'],
            ['kode' => 'SS.02.05.03', 'nama' => 'Advokasi Sosial Tanggap Darurat'],
            ['kode' => 'SS.02.05.04', 'nama' => 'Pemulihan sosial dan penguatan sosial'],
            ['kode' => 'SS.02.05.05', 'nama' => 'Kerjasama pemerintahan dan non pemerintahan'],

            // Catatan: Di dokumen asli tertulis 05 lagi, dikoreksi menjadi 06
            ['kode' => 'SS.02.06', 'nama' => 'Jaminan sosial'],
            ['kode' => 'SS.02.06.01', 'nama' => 'Seleksi dan verifikasi'],
            ['kode' => 'SS.02.06.02', 'nama' => 'Asuransi kesejahteraan sosial kelembagaan dan pengelolaan premi'],
            ['kode' => 'SS.02.06.03', 'nama' => 'Pendampingan Bantuan langsung dan tunjangan berkelanjutan'],
            ['kode' => 'SS.02.06.04', 'nama' => 'Penyaluran Bantuan langsung dan tunjangan berkelanjutan'],
            ['kode' => 'SS.02.06.05', 'nama' => 'Kerjasama pemerintah dan non pemerintah'],

            // ==========================================
            // SS.03 PEMBERDAYAAN SOSIAL DAN PENANGGULANGAN KEMISKINAN
            // ==========================================
            ['kode' => 'SS.03', 'nama' => 'Pemberdayaan Sosial dan Penanggulangan Kemiskinan'],
            
            ['kode' => 'SS.03.01', 'nama' => 'Pemberdayaan keluarga dan kelembagaan sosial'],
            ['kode' => 'SS.03.01.01', 'nama' => 'Bimbingan kesejahteraan sosial ketahanan keluarga'],
            ['kode' => 'SS.03.01.02', 'nama' => 'Konsultasi dan advokasi ketahanan keluarga'],
            ['kode' => 'SS.03.01.03', 'nama' => 'Asistensi keluarga dan pemberdayaan perempuan'],
            ['kode' => 'SS.03.01.04', 'nama' => 'Tenaga kesejahteraan sosial masyarakat dan organisasi sosial'],
            ['kode' => 'SS.03.01.05', 'nama' => 'Kerjasama Kemitraan dunia usaha'],
            ['kode' => 'SS.03.01.06', 'nama' => 'Kerjasama Bimbingan Sosial'],
            ['kode' => 'SS.03.01.07', 'nama' => 'Kelembagaan Karang Taruna'],
            ['kode' => 'SS.03.01.08', 'nama' => 'Pengembangan Kapasitas Karang taruna'],

            ['kode' => 'SS.03.02', 'nama' => 'Pemberdayaan komunitas adat terpencil'],
            ['kode' => 'SS.03.02.01', 'nama' => 'Identitas Persiapan pemberdayaan'],
            ['kode' => 'SS.03.02.02', 'nama' => 'Analisis Persiapan pemberdayaan'],

            ['kode' => 'SS.03.03', 'nama' => 'Pemberdayaan sumber daya manusia'],
            ['kode' => 'SS.03.03.01', 'nama' => 'Pemberdayaan sumber daya manusia adat terpencil'],
            ['kode' => 'SS.03.03.02', 'nama' => 'Pemberdayaan pendamping sosial komunitas adat terpencil'],

            ['kode' => 'SS.03.04', 'nama' => 'Penggalian dan pengembangan potensi'],
            ['kode' => 'SS.03.04.01', 'nama' => 'Penggalian potensi sosial, budaya, ekonomi dan lingkungan'],
            ['kode' => 'SS.03.04.02', 'nama' => 'Pengembangan potensi sosial, budaya, ekonomi dan lingkungan'],
            ['kode' => 'SS.03.04.03', 'nama' => 'Keserasian dan penguatan komunitas adat terpencil (keserasian sosial, penguatan sosial)'],
            ['kode' => 'SS.03.04.04', 'nama' => 'Kerja sama kelembagaan'], // Dikoreksi urutannya dari typo di dokumen
            ['kode' => 'SS.03.04.05', 'nama' => 'Kerja sama Pemantauan, evaluasi dan pelaporan'], // Dikoreksi urutannya

            // Catatan: Di dokumen asli tertulis 03, dikoreksi menjadi 05
            ['kode' => 'SS.03.05', 'nama' => 'Penanggulangan kemiskinan perkotaan dan perdesaan'],
            ['kode' => 'SS.03.05.01', 'nama' => 'Identifikasi dan analisis'],
            ['kode' => 'SS.03.05.02', 'nama' => 'Pengembangan kapasitas sumber daya manusia'],
            ['kode' => 'SS.03.05.03', 'nama' => 'Pengembangan kapasitas usaha'],
            ['kode' => 'SS.03.05.04', 'nama' => 'Bimbingan Penataan sosial lingkungan kumuh'],
            ['kode' => 'SS.03.05.05', 'nama' => 'Pengembangan Penataan sosial lingkungan kumuh'],
            ['kode' => 'SS.03.05.06', 'nama' => 'Advokasi sosial dan pengembangan aksesibilitas'],
            ['kode' => 'SS.03.05.07', 'nama' => 'Pengembangan aksesibilitas'],

            // Catatan: Di dokumen asli tertulis 04, dikoreksi menjadi 06
            ['kode' => 'SS.03.06', 'nama' => 'Kepahlawanan, keperintisan dan kesetiakawanan social'],
            ['kode' => 'SS.03.06.01', 'nama' => 'Penghargaan dan kesejahteraan keluarga pahlawan (pengangkatan, penghargaan, kesejahteraan)'],
            ['kode' => 'SS.03.06.02', 'nama' => 'Pelestarian nilai-nilai kepahlawanan dan keperintisan (identifikasi, pendayagunaan)'],
            ['kode' => 'SS.03.06.03', 'nama' => 'Pengembangan kesetiakawanan sosial (penggalian nilai, pelestarian nilai)'],
            ['kode' => 'SS.03.06.04', 'nama' => 'Pengelolaan taman makam pahlawan nasional utama'],
            ['kode' => 'SS.03.06.05', 'nama' => 'Standardisasi taman makam pahlawan dan makam pahlawan nasional'],
            // ==========================================
            // KODE ES: ENERGI DAN SUMBER DAYA MINERAL
            // ==========================================
            ['kode' => 'ES', 'nama' => 'Energi dan Sumber Daya Mineral'],
            
            ['kode' => 'ES.01', 'nama' => 'Perancanaan Umum, Program, Pembinaan, Pengembangan, Pengendalian dan Monitoring'],
            ['kode' => 'ES.01.01', 'nama' => 'Perencanaan Strategis Urusan Pertambangan'],
            ['kode' => 'ES.01.02', 'nama' => 'Monitoring Dan Evaluasi'],

            ['kode' => 'ES.02', 'nama' => 'Prasarana dan Sarana Pertambangan'],
            ['kode' => 'ES.02.01', 'nama' => 'Pengadaan Inventarisasi'],
            ['kode' => 'ES.02.02', 'nama' => 'Pendistribusian'],
            ['kode' => 'ES.02.03', 'nama' => 'Pemeliharaan'],
            ['kode' => 'ES.02.04', 'nama' => 'Penghapusan'],

            ['kode' => 'ES.03', 'nama' => 'Peningkatan Produksi'],
            ['kode' => 'ES.03.01', 'nama' => 'Teknologi Tepat Guna'],
            ['kode' => 'ES.03.02', 'nama' => 'Teknologi Industri Pertambangan'],

            ['kode' => 'ES.04', 'nama' => 'Pemasaran Hasil Produksi'],
            ['kode' => 'ES.04.01', 'nama' => 'Penentuan Harga Dasar'],
            ['kode' => 'ES.04.02', 'nama' => 'Pemasaran Dalam Negeri'],
            ['kode' => 'ES.04.03', 'nama' => 'Pemasaran Antar Pulau'],
            ['kode' => 'ES.04.04', 'nama' => 'Pemasaran Luar Negeri'],

            ['kode' => 'ES.05', 'nama' => 'Pembinaan dan Penyuluhan Pertambangan'],
            ['kode' => 'ES.05.01', 'nama' => 'Penyuluhan Pertambangan'],
            ['kode' => 'ES.05.02', 'nama' => 'Pembinaan Pertambangan'],

            ['kode' => 'ES.06', 'nama' => 'Penelitian dan Pengembangan'],
            ['kode' => 'ES.06.01', 'nama' => 'Laboratorium'],
            ['kode' => 'ES.06.02', 'nama' => 'Pengujian'],
            ['kode' => 'ES.06.03', 'nama' => 'Penelitian'],

            ['kode' => 'ES.07', 'nama' => 'Bantuan Pertambangan'],
            ['kode' => 'ES.07.01', 'nama' => 'Bantuan Peralatan Pertambangan'],
            ['kode' => 'ES.07.02', 'nama' => 'Dana Rangsangan Bagi Kelompok Usaha Pertambangan'],

            ['kode' => 'ES.08', 'nama' => 'Standar Mutu Hasil Pertambangan'],
            
            ['kode' => 'ES.09', 'nama' => 'Usaha Pertambangan'],
            ['kode' => 'ES.09.01', 'nama' => 'Pertambangan Daerah'],

            ['kode' => 'ES.10', 'nama' => 'Pengawasan Lalu Lintas Pertambangan'],
            ['kode' => 'ES.11', 'nama' => 'Data dan Statistik Bidang Pertambangan'],
            ['kode' => 'ES.12', 'nama' => 'Laporan'],

            // ==========================================
            // KODE PUR: PEKERJAAN UMUM DAN PENATAAN RUANG
            // ==========================================
            ['kode' => 'PUR', 'nama' => 'Pekerjaan Umum Dan Penataan Ruang'],

            ['kode' => 'PUR.01', 'nama' => 'Kebijakan Bidang Pekerjaan Umum'],
            ['kode' => 'PUR.01.01', 'nama' => 'Pengairan'],
            ['kode' => 'PUR.01.01.01', 'nama' => 'Pembangunan Baru'],
            ['kode' => 'PUR.01.01.02', 'nama' => 'Rehabilitasi'],
            ['kode' => 'PUR.01.01.03', 'nama' => 'Pemeliharaan'],
            
            ['kode' => 'PUR.01.02', 'nama' => 'Jalan'],
            ['kode' => 'PUR.01.02.01', 'nama' => 'Pembangunan Baru'],
            ['kode' => 'PUR.01.02.02', 'nama' => 'Rehabilitasi'],
            ['kode' => 'PUR.01.02.03', 'nama' => 'Pemeliharaan'],
            
            ['kode' => 'PUR.01.03', 'nama' => 'Jembatan'],
            ['kode' => 'PUR.01.03.01', 'nama' => 'Pembangunan Baru'],
            ['kode' => 'PUR.01.03.02', 'nama' => 'Rehabilitasi'],
            ['kode' => 'PUR.01.03.03', 'nama' => 'Pemeliharaan'],

            ['kode' => 'PUR.01.04', 'nama' => 'Bangunan'],
            ['kode' => 'PUR.01.04.01', 'nama' => 'Pembangunan Baru'],
            ['kode' => 'PUR.01.04.02', 'nama' => 'Rehabilitasi'],
            ['kode' => 'PUR.01.04.03', 'nama' => 'Pemeliharaan'],

            ['kode' => 'PUR.02', 'nama' => 'Rencana Umum Tata Ruang'],
            ['kode' => 'PUR.02.01', 'nama' => 'Master Plan'],
            ['kode' => 'PUR.02.02', 'nama' => 'Block Plan'],
            ['kode' => 'PUR.02.03', 'nama' => 'Detail Plan'],

            ['kode' => 'PUR.03', 'nama' => 'Standarisasi Kriteria Teknis Bidang Pekerjaan Umum'],
            ['kode' => 'PUR.03.01', 'nama' => 'Bangunan'],
            ['kode' => 'PUR.03.01.01', 'nama' => 'Spesifikasi Teknis'],
            ['kode' => 'PUR.03.01.02', 'nama' => 'Pedoman/Prosedur'],
            ['kode' => 'PUR.03.01.03', 'nama' => 'Manual Teknis'],
            ['kode' => 'PUR.03.01.04', 'nama' => 'Manual Pelaksanaan'],
            
            ['kode' => 'PUR.03.02', 'nama' => 'Pengairan'],
            ['kode' => 'PUR.03.02.01', 'nama' => 'Spesifikasi Teknis'],
            ['kode' => 'PUR.03.02.02', 'nama' => 'Pedoman/Prosedur'],
            ['kode' => 'PUR.03.02.03', 'nama' => 'Manual Teknis'],
            ['kode' => 'PUR.03.02.04', 'nama' => 'Manual Pelaksanaan'],
            
            ['kode' => 'PUR.03.03', 'nama' => 'Air Minum'],
            ['kode' => 'PUR.03.03.01', 'nama' => 'Spesifikasi Teknis'],
            ['kode' => 'PUR.03.03.02', 'nama' => 'Pedoman/Prosedur'],
            ['kode' => 'PUR.03.03.03', 'nama' => 'Manual Teknis'],
            ['kode' => 'PUR.03.03.04', 'nama' => 'Manual Pelaksanaan'],
            
            ['kode' => 'PUR.03.04', 'nama' => 'Jalan'],
            ['kode' => 'PUR.03.04.01', 'nama' => 'Spesifikasi Teknis'],
            ['kode' => 'PUR.03.04.02', 'nama' => 'Pedoman/Prosedur'],
            ['kode' => 'PUR.03.04.03', 'nama' => 'Manual Teknis'],
            ['kode' => 'PUR.03.04.04', 'nama' => 'Manual Pelaksanaan'],
            
            ['kode' => 'PUR.03.05', 'nama' => 'Jembatan'],
            ['kode' => 'PUR.03.05.01', 'nama' => 'Spesifikasi Teknis'],
            ['kode' => 'PUR.03.05.02', 'nama' => 'Pedoman/Prosedur'],
            ['kode' => 'PUR.03.05.03', 'nama' => 'Manual Teknis'],
            ['kode' => 'PUR.03.05.04', 'nama' => 'Manual Pelaksanaan'],

            ['kode' => 'PUR.04', 'nama' => 'Pembinaan Bidang Pekerjaan Umum'],
            
            ['kode' => 'PUR.05', 'nama' => 'Perizinan'],
            ['kode' => 'PUR.05.01', 'nama' => 'Perijinan Bidang Pekerjaan Umum'],
            ['kode' => 'PUR.05.01.01', 'nama' => 'Ijin Mendirikan Bangunan'],
            ['kode' => 'PUR.05.01.02', 'nama' => 'Ijin Pemborongan Pembangunan'],
            ['kode' => 'PUR.05.01.03', 'nama' => 'Ijin Penggunaan Bangunan'],
            ['kode' => 'PUR.05.01.04', 'nama' => 'Ijin Pembangunan Tanggul/ tambak pada pinggiran Sungai'],
            ['kode' => 'PUR.05.01.05', 'nama' => 'Ijin Pengambilan dan Pembuangan Air'],
            ['kode' => 'PUR.05.01.06', 'nama' => 'Ijin Pembangunan Sumur Bor/Artesis'],
            ['kode' => 'PUR.05.01.07', 'nama' => 'Ijin Proyek Air Minum'],
            ['kode' => 'PUR.05.01.08', 'nama' => 'Ijin Pemanfaatan Tanah Dataran'],
            ['kode' => 'PUR.05.01.09', 'nama' => 'Ijin Penggunaan Jalan Dan Sejenisnya'],
            
            ['kode' => 'PUR.05.02', 'nama' => 'Penolakan Permohonan Perijinan'],
            ['kode' => 'PUR.05.03', 'nama' => 'Keringanan Pemberian Ijin'],
            ['kode' => 'PUR.05.04', 'nama' => 'Pembatalan Ijin'],

            ['kode' => 'PUR.06', 'nama' => 'Tata Kota Perkotaan'],
            ['kode' => 'PUR.06.01', 'nama' => 'Kebijakan Pembangunan, meliputi Penempatan, Pemeliharaan, Perbaikan dan Peningkatan daerah:'],
            ['kode' => 'PUR.06.01.01', 'nama' => 'Kawasan Perdagangan'],
            ['kode' => 'PUR.06.01.02', 'nama' => 'Kawasan Industri'],
            ['kode' => 'PUR.06.01.03', 'nama' => 'Kawasan Perumahan'],
            ['kode' => 'PUR.06.01.04', 'nama' => 'Kawasan Rekreasi'],
            ['kode' => 'PUR.06.01.05', 'nama' => 'Kawasan Ruang Terbuka Hijau'],
            
            ['kode' => 'PUR.06.02', 'nama' => 'Investasi Daerah/Kawasan:'],
            ['kode' => 'PUR.06.02.01', 'nama' => 'Perdagangan'],
            ['kode' => 'PUR.06.02.02', 'nama' => 'Industri'],
            ['kode' => 'PUR.06.02.03', 'nama' => 'Perumahan'],
            ['kode' => 'PUR.06.02.04', 'nama' => 'Rekreasi'],
            
            ['kode' => 'PUR.06.03', 'nama' => 'Data Statistik Pembangunan Perkotaan'],
            ['kode' => 'PUR.06.04', 'nama' => 'Pengawasan Pembangunan Perkotaan'],
            ['kode' => 'PUR.06.05', 'nama' => 'Laporan'],

            ['kode' => 'PUR.07', 'nama' => 'Bangunan'],
            ['kode' => 'PUR.07.01', 'nama' => 'Gambar/Rencana Bangunan'],
            ['kode' => 'PUR.07.02', 'nama' => 'Inventarisasi Bangunan Milik Pemerintah'],
            ['kode' => 'PUR.07.03', 'nama' => 'Peta Bangunan'],
            ['kode' => 'PUR.07.04', 'nama' => 'Blue Print'],
            ['kode' => 'PUR.07.05', 'nama' => 'Konstruksi Pencegahan Terhadap Gempa, Angin/Udara, Panas, Kegaduhan, Akustik, Kebakaran'],
            ['kode' => 'PUR.07.06', 'nama' => 'Usulan Gambar yang ditolak'],
            ['kode' => 'PUR.07.07', 'nama' => 'Hasil Penelitian Bangunan Oleh Perorangan/Kelompok'],
            ['kode' => 'PUR.07.08', 'nama' => 'Konsultasi Bangunan'],
            ['kode' => 'PUR.07.09', 'nama' => 'Penertiban Bangunan'],
            ['kode' => 'PUR.07.10', 'nama' => 'Data Bahan Bangunan'],
            ['kode' => 'PUR.07.11', 'nama' => 'Laporan'],

            ['kode' => 'PUR.08', 'nama' => 'Pemborong Kontraktor Bangunan Daerah'],
            ['kode' => 'PUR.08.01', 'nama' => 'Tender'],
            ['kode' => 'PUR.08.02', 'nama' => 'Prakualifikasi'],
            ['kode' => 'PUR.08.03', 'nama' => 'Peserta Yang Kalah Tender berikut persyaratannya'],
            ['kode' => 'PUR.08.04', 'nama' => 'Prasarana dan Sarana Pariwisata'],
            ['kode' => 'PUR.08.05', 'nama' => 'Swakelola'],
            ['kode' => 'PUR.08.06', 'nama' => 'Laporan'],

            ['kode' => 'PUR.09', 'nama' => 'Pembangkit Tenaga Listrik'],
            ['kode' => 'PUR.09.01', 'nama' => 'Kebijakan Perencanaan Pembangunan, Pemeliharaan, Perbaikan, Pengembangan, Peningkatan dan Pengawasan Tenaga Kelistrikan:'],
            ['kode' => 'PUR.09.01.01', 'nama' => 'Air'],
            ['kode' => 'PUR.09.01.02', 'nama' => 'Diesel Dan Listrik'],
            ['kode' => 'PUR.09.01.03', 'nama' => 'Listrik Masuk Desa'],
            ['kode' => 'PUR.09.02', 'nama' => 'Teknologi Kelistrikan'],
            ['kode' => 'PUR.09.03', 'nama' => 'Pemasangan Jalur Transmisi Tenaga Listrik'],
            ['kode' => 'PUR.09.04', 'nama' => 'Data Kelistrikan'],
            ['kode' => 'PUR.09.05', 'nama' => 'Penelitian Pembangkit Tenaga Listrik'],
            ['kode' => 'PUR.09.06', 'nama' => 'Laporan'],

            ['kode' => 'PUR.10', 'nama' => 'Pengairan'],
            ['kode' => 'PUR.10.01', 'nama' => 'Pembangunan Pengairan:'],
            ['kode' => 'PUR.10.01.01', 'nama' => 'Bangunan Pengairan Waduk/ Bendungan'],
            ['kode' => 'PUR.10.01.02', 'nama' => 'Bangunan Pembagi'],
            ['kode' => 'PUR.10.01.03', 'nama' => 'Saluran dan Tanggul'],
            ['kode' => 'PUR.10.01.04', 'nama' => 'Saluran Drinage'],
            ['kode' => 'PUR.10.01.05', 'nama' => 'Pembuangan Air Kotor Dan Limbah'],
            
            ['kode' => 'PUR.10.02', 'nama' => 'Pemeliharaan dan Renovasi:'],
            ['kode' => 'PUR.10.02.01', 'nama' => 'Bangunan Pengairan Waduk/ Bendungan'],
            ['kode' => 'PUR.10.02.02', 'nama' => 'Bangunan Pembagi'],
            ['kode' => 'PUR.10.02.03', 'nama' => 'Saluran dan Tanggul'],
            ['kode' => 'PUR.10.02.04', 'nama' => 'Saluran Drinage'],
            ['kode' => 'PUR.10.02.05', 'nama' => 'Pembuangan Air Kotor Dan Limbah'],
            
            ['kode' => 'PUR.10.03', 'nama' => 'Penertiban/Penanganan Kasus Kasus:'],
            ['kode' => 'PUR.10.03.01', 'nama' => 'Bangunan Pengairan Waduk/ Bendungan'],
            ['kode' => 'PUR.10.03.02', 'nama' => 'Bangunan Pembagi'],
            ['kode' => 'PUR.10.03.03', 'nama' => 'Saluran dan Tanggul'],
            ['kode' => 'PUR.10.03.04', 'nama' => 'Saluran Drinage'],
            ['kode' => 'PUR.10.03.05', 'nama' => 'Pembuangan Air Kotor Dan Limbah'],
            
            ['kode' => 'PUR.10.04', 'nama' => 'Inventarisasi Areal Bangunan Pengairan, Sungai dan Sumber Mata Air'],
            ['kode' => 'PUR.10.05', 'nama' => 'Pemeliharaan dan Pengelolaan Pengairan oleh Perkumpulan Petani Pemakai Air (P3A)'],
            ['kode' => 'PUR.10.06', 'nama' => 'Pengolahan Data Hidrologi'],
            ['kode' => 'PUR.10.07', 'nama' => 'Data dan Statistik Pengairan'],
            ['kode' => 'PUR.10.08', 'nama' => 'Laporan'],

            // Dikoreksi dari dokumen asli "10" menjadi "11"
            ['kode' => 'PUR.11', 'nama' => 'Air Minum'],
            ['kode' => 'PUR.11.01', 'nama' => 'Perencanaan Pembuatan, Pemeliharaan dan Perbaikan'],
            ['kode' => 'PUR.11.02', 'nama' => 'Prasarana dan Sarana Air Minum:'],
            ['kode' => 'PUR.11.02.01', 'nama' => 'Peningkatan Bangunan'],
            ['kode' => 'PUR.11.02.02', 'nama' => 'Penyediaan Fasilitas/ Air Bersih'],
            ['kode' => 'PUR.11.03', 'nama' => 'Pendaftaran distribusi dan Pemakaian Air Minum'],
            ['kode' => 'PUR.11.04', 'nama' => 'Pengawasan Air Minum'],
            ['kode' => 'PUR.11.05', 'nama' => 'Data Dan Statistik Air Minum/Air Bersih'],
            ['kode' => 'PUR.11.06', 'nama' => 'Pelaporan Keluhan Masyarakat'],

            // Dikoreksi dari dokumen asli "11" menjadi "12"
            ['kode' => 'PUR.12', 'nama' => 'Jalan'],
            ['kode' => 'PUR.12.01', 'nama' => 'Pembangunan / Pembuatan Jalan:'],
            ['kode' => 'PUR.12.01.01', 'nama' => 'Jalan Negara'],
            ['kode' => 'PUR.12.01.02', 'nama' => 'Jalan Provinsi'],
            ['kode' => 'PUR.12.01.03', 'nama' => 'Jalan Kabupaten'],
            ['kode' => 'PUR.12.01.04', 'nama' => 'Jalan Desa/Perkebunan'],
            ['kode' => 'PUR.12.02', 'nama' => 'Pemeliharaan Jalan'],
            ['kode' => 'PUR.12.03', 'nama' => 'Penyediaan Lokasi Jalan'],
            ['kode' => 'PUR.12.04', 'nama' => 'Pelebaran dan Pemindahan Jalan'],
            ['kode' => 'PUR.12.05', 'nama' => 'Pengawasan Jalan'],
            ['kode' => 'PUR.12.06', 'nama' => 'Data dan Statistik Jalan'],
            ['kode' => 'PUR.12.07', 'nama' => 'Evaluasi Pemanfaatan dan Keandalan Jalan'],
            ['kode' => 'PUR.12.08', 'nama' => 'Laporan'],

            // Dikoreksi dari dokumen asli "12" menjadi "13"
            ['kode' => 'PUR.13', 'nama' => 'Jembatan'], 
            ['kode' => 'PUR.13.01', 'nama' => 'Pembangunan/Pembuatan Jembatan:'],
            ['kode' => 'PUR.13.01.01', 'nama' => 'Jembatan Negara'],
            ['kode' => 'PUR.13.01.02', 'nama' => 'Jembatan Provinsi'],
            ['kode' => 'PUR.13.01.03', 'nama' => 'Jembatan Kabupaten'],
            ['kode' => 'PUR.13.01.04', 'nama' => 'Jembatan Desa/Perkebunan'],
            ['kode' => 'PUR.13.02', 'nama' => 'Pemeliharaan Jembatan Sementara gantung, Jembatan Penyebrangan'],
            ['kode' => 'PUR.13.03', 'nama' => 'Penyediaan Lokasi Jembatan'],
            ['kode' => 'PUR.13.04', 'nama' => 'Pelebaran dan Pemindahan Jembatan'],
            ['kode' => 'PUR.13.05', 'nama' => 'Pengawasan Jembatan'],
            ['kode' => 'PUR.13.06', 'nama' => 'Data Dan Statistik Jembatan'],
            ['kode' => 'PUR.13.07', 'nama' => 'Evaluasi Pemanfaatan dan Keandalan Jembatan'],
            ['kode' => 'PUR.13.08', 'nama' => 'Laporan'],
        ];

        // Looping pinter buat masukin data ke tabel sekaligus cari parent_id-nya
        foreach ($data as $item) {
            $parentId = null;
            
            // Logika misal 'KS.01.01' -> parentnya adalah 'KS.01'
            if (strpos($item['kode'], '.') !== false) {
                $parentKode = substr($item['kode'], 0, strrpos($item['kode'], '.'));
                $parent = Klasifikasi::where('kode', $parentKode)->first();
                if ($parent) {
                    $parentId = $parent->id;
                }
            }

            Klasifikasi::updateOrCreate(
                ['kode' => $item['kode']],
                [
                    'nama' => $item['nama'],
                    'parent_id' => $parentId
                ]
            );
        }
    }
}
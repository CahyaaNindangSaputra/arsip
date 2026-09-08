<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipInaktifController;
use App\Http\Controllers\RakController;

// Halaman utama langsung diarahkan ke form login
Route::get('/', function () {
    return redirect()->route('login');
});


// ... (route lain biarin)

Route::get('/dashboard', [ArsipController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rute yang wajib login (termasuk Super Admin & Arsip)
Route::middleware(['auth'])->group(function () {
    
    // Dashboard & Arsip Aktif (Big Data)
   
    Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip.index');
    Route::get('/arsip/create', [ArsipController::class, 'create'])->name('arsip.create');
    Route::post('/arsip', [ArsipController::class, 'store'])->name('arsip.store');
    Route::get('/arsip/export-excel', [ArsipController::class, 'exportExcel'])->name('arsip.exportExcel');

    // Lifecycle Arsip: Pindah ke Inaktif
    Route::get('/arsip/{id}/form-pindah', [ArsipController::class, 'formPindah'])->name('arsip.form_pindah');
    Route::patch('/arsip/{id}/pindahkan-inaktif', [ArsipController::class, 'pindahkanInaktif'])->name('arsip.pindahkan_inaktif');

    // Lifecycle Arsip: Usul Musnah
    Route::get('/arsip/{id}/form-musnah', [ArsipController::class, 'formMusnah'])->name('arsip.form_musnah');
    Route::patch('/arsip/{id}/proses-musnah', [ArsipController::class, 'prosesMusnah'])->name('arsip.proses_musnah');

    // Lifecycle Arsip: Serah Terima
    Route::get('/arsip/{id}/form-serah', [ArsipController::class, 'formSerah'])->name('arsip.form_serah');
    Route::patch('/arsip/{id}/proses-serah', [ArsipController::class, 'prosesSerah'])->name('arsip.proses_serah');

    Route::get('/arsip/status/aktif', [ArsipController::class, 'aktif'])->name('arsip.aktif');
Route::get('/arsip/status/inaktif', [ArsipController::class, 'inaktif'])->name('arsip.inaktif');
Route::get('/arsip/status/musnah', [ArsipController::class, 'musnah'])->name('arsip.musnah');
Route::get('/arsip/status/serah', [ArsipController::class, 'serah'])->name('arsip.serah');

    // Manajemen Arsip Inaktif
    Route::get('/arsip-inaktif', [ArsipInaktifController::class, 'index'])->name('arsip_inaktif.index');
    Route::get('/arsip-inaktif/create', [ArsipInaktifController::class, 'create'])->name('arsip-inaktif.create');
    Route::post('/arsip-inaktif', [ArsipInaktifController::class, 'store'])->name('arsip-inaktif.store');
    Route::get('/arsip-inaktif/export', [ArsipInaktifController::class, 'exportExcel'])->name('arsip-inaktif.exportExcel');

    // Manajemen Akun Pengguna oleh Super Admin
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

    // Lokasi Rak
    Route::get('/lokasi-rak', [RakController::class, 'index'])->name('rak.index');
    Route::get('/lokasi-rak/{namaRak}', [RakController::class, 'show'])->name('rak.show');

    // Rute Profile bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/api/notifications', [ArsipController::class, 'getNotificationCounts'])->middleware('auth');
});

require __DIR__.'/auth.php';
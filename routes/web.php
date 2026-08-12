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

// Rute yang wajib login (termasuk Super Admin & Arsip)
Route::middleware(['auth'])->group(function () {
    // Dashboard & Arsip
    Route::get('/dashboard', [ArsipController::class, 'index'])->name('dashboard');
    Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip.index');
    Route::get('/arsip/create', [ArsipController::class, 'create'])->name('arsip.create');
    Route::post('/arsip', [ArsipController::class, 'store'])->name('arsip.store');

    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

    // Manajemen Akun Pengguna oleh Super Admin
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    // Rute Profile bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});




Route::middleware(['auth'])->group(function () {
    // Menampilkan daftar arsip inaktif
    Route::get('/arsip-inaktif', [ArsipInaktifController::class, 'index'])->name('arsip_inaktif.index');
    
    // Aksi tombol untuk memindahkan arsip aktif ke inaktif
    Route::patch('/arsip/{id}/pindahkan-inaktif', [ArsipInaktifController::class, 'pindahkan'])->name('arsip.pindahkan_inaktif');
});

Route::middleware(['auth'])->group(function () {
    // Rute Arsip Inaktif Yang Dipindahkan
    Route::get('/arsip-inaktif', [ArsipInaktifController::class, 'index'])->name('arsip_inaktif.index');
    Route::get('/arsip-inaktif/create', [ArsipInaktifController::class, 'create'])->name('arsip-inaktif.create');
    Route::post('/arsip-inaktif', [ArsipInaktifController::class, 'store'])->name('arsip-inaktif.store');
    Route::get('/arsip-inaktif/export', [ArsipInaktifController::class, 'exportExcel'])->name('arsip-inaktif.exportExcel');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/lokasi-rak', [RakController::class, 'index'])->name('rak.index');
    Route::get('/lokasi-rak/{namaRak}', [RakController::class, 'show'])->name('rak.show');
});

Route::get('/arsip/export-excel', [ArsipController::class, 'exportExcel'])->name('arsip.exportExcel');

require __DIR__.'/auth.php';
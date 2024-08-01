<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TradisiController;
// use App\Http\Controllers\CagarBudayaController;
// use App\Http\Controllers\RitusController;
// use App\Http\Controllers\KesenianController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\WBTakBendaController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Login dan Logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Reset Password
Route::get('/password/reset', [AuthController::class, 'showResetPasswordForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendResetPasswordEmail'])->name('password.email');
Route::get('/password/reset/{token}', [AuthController::class, 'showNewPasswordForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.update');

// Rute untuk masyarakat (tanpa login)
Route::prefix('masyarakat')->group(function() {
    Route::get('/', [MasyarakatController::class, 'index'])->name('masyarakat.index');
    Route::get('/wbtb/{id}', [WBTakBendaController::class, 'showDetails'])->name('masyarakat.wbtb.detail');


    // Rute untuk pengajuan masyarakat (tanpa login)
    Route::get('/pengajuan', [PengajuanController::class, 'indexMasyarakat'])->name('masyarakat.pengajuan.index');
    Route::get('/pengajuan/create', [PengajuanController::class, 'createMasyarakat'])->name('masyarakat.pengajuan.create');
    Route::post('/pengajuan', [PengajuanController::class, 'storeMasyarakat'])->name('masyarakat.pengajuan.store');
});

// Rute untuk admin (login required)
Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    // Rute pengajuan admin
    Route::get('/pengajuan', [PengajuanController::class, 'indexAdmin'])->name('pengajuan.index');
    Route::post('/pengajuan/{id}/update-status', [PengajuanController::class, 'updateStatus'])->name('pengajuan.updateStatus');

    // Rute untuk resources admin
    Route::resource('wbtbs', WBTakBendaController::class);
    // Route::resource('kesenians', KesenianController::class);
    Route::resource('pengajuans', PengajuanController::class);
    Route::resource('kategori', KategoriController::class);
});

// Route::get('tradisi/nasional', [TradisiController::class, 'indexNasional'])->name('tradisi.nasional');
// Route::get('tradisi/provinsi', [TradisiController::class, 'indexProvinsi'])->name('tradisi.provinsi');

// Route::get('masyarakat/wbtb/detail/{id}', [WBTakBendaController::class,'showwbtb'])->name('masyarakat.wbtb.detail');

// Rute galeri
Route::prefix('galeri')->group(function() {
    Route::get('/{id}', [GalleryController::class, 'show'])->name('galeri.show');
    Route::resource('galleries', GalleryController::class);
});

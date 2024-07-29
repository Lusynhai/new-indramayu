<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdatController;
use App\Http\Controllers\CagarBudayaController;
use App\Http\Controllers\RitusController;
use App\Http\Controllers\KesenianController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\AuthController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Halaman admin (login required)
Route::get('/admin', function () {
    return view('admin.index');
})->middleware('auth');

// Login dan Logout
//Rute untuk loginRoute::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Rute lainnya yang memerlukan autentikasi
});

// Reset Password
Route::get('/password/reset', [AuthController::class, 'showResetPasswordForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendResetPasswordEmail'])->name('password.email');
Route::get('/password/reset/{token}', [AuthController::class, 'showNewPasswordForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.update');

// Rute untuk masyarakat (tanpa login)
Route::get('/masyarakat', [MasyarakatController::class, 'index'])->name('masyarakat.index');
Route::get('/masyarakat/adat/{id}', [AdatController::class, 'showDetails'])->name('masyarakat.adat.detail');
Route::get('/masyarakat/cagarbudaya', [CagarBudayaController::class, 'showForPublic'])->name('masyarakat.cagarbudaya');
Route::get('/masyarakat/cagarbudaya/{id}', [CagarBudayaController::class, 'showDetails'])->name('masyarakat.cagarbudaya.detail');
Route::get('/masyarakat/ritus', [RitusController::class, 'showForPublic'])->name('masyarakat.ritus');
Route::get('/masyarakat/ritus/{id}', [RitusController::class, 'showDetails'])->name('masyarakat.ritus.detail');
Route::get('/masyarakat/kesenian', [KesenianController::class, 'showForPublic'])->name('masyarakat.kesenian');
Route::get('/masyarakat/kesenian/{id}', [KesenianController::class, 'showDetails'])->name('masyarakat.kesenian.detail');

// Rute untuk pengajuan masyarakat (tanpa login)
Route::get('masyarakat/pengajuan', [PengajuanController::class, 'indexMasyarakat'])->name('masyarakat.pengajuan.index');
Route::get('masyarakat/pengajuan/create', [PengajuanController::class, 'createMasyarakat'])->name('masyarakat.pengajuan.create');
Route::post('masyarakat/pengajuan', [PengajuanController::class, 'storeMasyarakat'])->name('masyarakat.pengajuan.store');

// Rute untuk admin (login required)
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function() {
    Route::get('pengajuan', [PengajuanController::class, 'indexAdmin'])->name('pengajuan.index');
    Route::post('pengajuan/{id}/update-status', [PengajuanController::class, 'updateStatus'])->name('pengajuan.updateStatus');
});

// Rute galeri
Route::get('/galeri/{id}', [GalleryController::class, 'show'])->name('galeri.show');
Route::resource('galleries', GalleryController::class);
Route::resource('adats', AdatController::class);
Route::resource('cagarbudayas', CagarBudayaController::class);
Route::resource('rituses', RitusController::class);
Route::resource('kesenians', KesenianController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdatController;
use App\Http\Controllers\CagarBudayaController;
use App\Http\Controllers\RitusController;
use App\Http\Controllers\KesenianController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengajuanObjekBudayaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\Admin\PengajuanController as AdminPengajuanController;
use App\Models\PengajuanObjekBudaya;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.index');
});
Route::post('/login', [AuthController::class, 'login']);

// Handle logout request
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Show registration form
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// Handle registration request
Route::post('/register', [AuthController::class, 'register']);

// Show reset password form
Route::get('/password/reset', [AuthController::class, 'showResetPasswordForm'])->name('password.request');

// Handle reset password email sending
Route::post('/password/email', [AuthController::class, 'sendResetPasswordEmail'])->name('password.email');

// Show new password form
Route::get('/password/reset/{token}', [AuthController::class, 'showNewPasswordForm'])->name('password.reset');

// Handle new password setting
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.update');

// // Home route
// Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/masyarakat', [MasyarakatController::class, 'index'])->name('masyarakat.index');
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');

// Rute untuk halaman adat masyarakat
Route::get('/masyarakat/adat/{id}', [AdatController::class, 'showDetails'])->name('masyarakat.adat.detail');

// Rute untuk halaman cagar budaya masyarakat
Route::get('/masyarakat/cagarbudaya', [CagarBudayaController::class, 'showForPublic'])->name('masyarakat.cagarbudaya');
Route::get('/masyarakat/cagarbudaya/{id}', [CagarBudayaController::class, 'showDetails'])->name('masyarakat.cagarbudaya.detail');
// Rute untuk halaman kesenian masyarakat
Route::get('/masyarakat/ritus', [RitusController::class, 'showForPublic'])->name('masyarakat.ritus');
Route::get('/masyarakat/ritus/{id}', [RitusController::class, 'showDetails'])->name('masyarakat.ritus.detail');
// Rute untuk halaman kesenian masyarakat
Route::get('/masyarakat/kesenian', [KesenianController::class, 'showForPublic'])->name('masyarakat.kesenian');
Route::get('/masyarakat/kesenian/{id}', [KesenianController::class, 'showDetails'])->name('masyarakat.kesenian.detail');

Route::group(['prefix' => 'masyarakat', 'as' => 'masyarakat.', 'middleware' => 'auth'], function() {
    Route::get('pengajuan', [PengajuanController::class, 'indexMasyarakat'])->name('pengajuan.index');
    Route::get('pengajuan/create', [PengajuanController::class, 'create'])->name('pengajuan.create');
    Route::post('pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function() {
    Route::get('pengajuan', [PengajuanController::class, 'indexAdmin'])->name('pengajuan.index');
    Route::post('pengajuan/{id}/update-status', [PengajuanController::class, 'updateStatus'])->name('pengajuan.updateStatus');
});

// // Rute untuk pengajuan objek budaya
// Route::get('/masyarakat/pengajuan', [PengajuanObjekBudayaController::class, 'index'])->name('masyarakat.pengajuan.index');
// Route::get('/masyarakat/pengajuan/create', [PengajuanObjekBudayaController::class, 'create'])->name('masyarakat.pengajuan.create');
// Route::post('/masyarakat/pengajuan/store', [PengajuanObjekBudayaController::class, 'store'])->name('masyarakat.pengajuan.store');
// Route::get('/masyarakat/pengajuan/{id}/approve', [PengajuanObjekBudayaController::class, 'approve'])->name('masyarakat.pengajuan.approve');



// // Rute untuk admin pengajuan
// Route::get('/admin/pengajuans', [PengajuanObjekBudayaController::class, 'PengajuanIndex'])->name('admin.pengajuans.index');
// Route::get('/admin/notifications', [PengajuanObjekBudayaController::class, 'notifications'])->name('admin.notifications');
// Route::post('/admin/pengajuan/{id}/approved', [PengajuanObjekBudayaController::class, 'approved'])->name('admin.pengajuan.approved');
// Route::post('/admin/pengajuan/{id}/rejected', [PengajuanObjekBudayaController::class, 'rejected'])->name('admin.pengajuan.rejected');

// galeri
Route::get('/galeri/{id}', [GalleryController::class, 'show'])->name('galeri.show');



Route::resource('galleries', GalleryController::class);
Route::resource('adats', AdatController::class);
Route::resource('cagarbudayas', CagarBudayaController::class);
Route::resource('rituses', RitusController::class);
Route::resource('kesenians', KesenianController::class);
// Route::resource('pengajuan', PengajuanObjekBudayaController::class)->names([
//     'index' => 'pengajuan.index',
//     'create' => 'pengajuan.create',
//     'store' => 'pengajuan.store',
//     'show' => 'pengajuan.show',
//     'edit' => 'pengajuan.edit',
//     'update' => 'pengajuan.update',
//     'destroy' => 'pengajuan.destroy',
// ]);

// Route::prefix('admin')->group(function () {
//     Route::get('pengajuan', 'PengajuanObjekBudayaController@adminIndex')->name('admin.pengajuan.index');
//     Route::get('pengajuan/approve/{id}', 'PengajuanObjekBudayaController@approve')->name('admin.pengajuan.approve');
//     Route::get('pengajuan/reject/{id}', 'PengajuanObjekBudayaController@reject')->name('admin.pengajuan.reject');
//     Route::get('notifications', 'PengajuanObjekBudayaController@notifications')->name('admin.notifications');
// });


<?php

use App\Models\JenisSurat;
use App\Models\ProfilDesa;
use App\Models\WaktuPelayanan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\PendudukProfilController;
use App\Http\Controllers\WaktuPelayananController;
use App\Http\Controllers\penduduk\PendudukDashboardController;

Route::get('/', function () {
    $waktuPelayanan = WaktuPelayanan::get();
    $jenisSurat = JenisSurat::get();
    $profilDesa = ProfilDesa::first();
    return view('welcome', [
        'waktuPelayanan' => $waktuPelayanan,
        'jenisSurat' => $jenisSurat,
        'profilDesa' => $profilDesa
    ]);
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('profilDesa', ProfilDesaController::class);
    Route::resource('penduduk', PendudukController::class);
    Route::resource('waktu-pelayanan', WaktuPelayananController::class);
    Route::resource('jenis-surat', JenisSuratController::class);
    Route::resource('admin', AdminController::class);
    Route::get('/pengajuan/{kode}', [PengajuanController::class, 'list'])->name('pengajuan.list');
    Route::get('/pengajuan/{id}/detail', [PengajuanController::class, 'show'])->name('pengajuan.show');
    Route::post('/pengajuan/{id}/approve', [PengajuanController::class, 'approve'])->name('pengajuan.approve');
    Route::post('/pengajuan/{id}/reject', [PengajuanController::class, 'reject'])->name('pengajuan.reject');
    Route::get('/pengajuan/{id}/download', [PengajuanController::class, 'download'])->name('pengajuan.download');
    Route::get('/riwayat-surat', [PengajuanController::class, 'riwayat'])->name('admin.pengajuan.riwayat');

    Route::post('/penduduk/import', [PendudukController::class, 'import'])->name('penduduk.import');

    Route::get('/grafik', [GrafikController::class, 'index'])->name('grafik.index');


    Route::get('/pengajuan/{id}/download-all', [PengajuanController::class, 'downloadAll'])->name('pengajuan.downloadAll');

    Route::get('/pengajuan/{id}/print', [App\Http\Controllers\PengajuanController::class, 'print'])->name('pengajuan.print');
});

Route::middleware(['auth', 'role:penduduk'])->prefix('penduduk')->group(function () {
    Route::get('/dashboard', [PendudukDashboardController::class, 'index'])->name('dashboard.penduduk');
    Route::get('/profil', [PendudukProfilController::class, 'index'])->name('penduduk.profil');
    Route::get('profil/edit', [PendudukProfilController::class, 'edit'])->name('penduduk.profil.edit');
    Route::put('/profil', [PendudukProfilController::class, 'update'])->name('penduduk.profil.update');
    Route::get('/pengajuan/{kode}/form', [PengajuanController::class, 'create'])->name('pengajuan.form');
    Route::post('/pengajuan/{kode}', [PengajuanController::class, 'submit'])->name('pengajuan.submit');
    Route::get('/riwayat-surat', [PengajuanController::class, 'riwayat'])->name('penduduk.riwayat.surat');
    Route::get('/pengajuan/{id}/download', [PengajuanController::class, 'download'])->name('penduduk.pengajuan.download');

    Route::get('/pengajuan/edit/{id}', [PengajuanController::class, 'edit'])->name('penduduk.pengajuan.edit');
    Route::put('/pengajuan/update/{id}', [PengajuanController::class, 'update'])->name('penduduk.pengajuan.update');
});

require __DIR__ . '/auth.php';

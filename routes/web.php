<?php
use App\Http\Controllers\LaporanAsetController;
use App\Http\Controllers\MutasiAsetController;
use App\Http\Controllers\PenanggungJawabController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\AsetController;

Route::get('/', function () {
    return redirect()->route('aset.index');
});

Route::resource('kategori', KategoriController::class);
Route::resource('lokasi', LokasiController::class);
Route::resource('aset', AsetController::class);
Route::resource('penanggung-jawab', PenanggungJawabController::class);
Route::resource('mutasi-aset', MutasiAsetController::class);
Route::get('/laporan-aset', [LaporanAsetController::class, 'index'])->name('laporan-aset.index');
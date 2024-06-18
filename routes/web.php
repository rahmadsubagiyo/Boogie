<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\SelisihController;

// routes/web.php

use App\Http\Controllers\BahanBakuController;

Route::get('/bahanbaku', [BahanBakuController::class, 'index'])->name('bahanbaku.index');
Route::get('/bahanbaku/create', [BahanBakuController::class, 'create'])->name('bahanbaku.create');
Route::post('/bahanbaku', [BahanBakuController::class, 'store'])->name('bahanbaku.store');
Route::get('/bahanbaku/{id}', [BahanBakuController::class, 'show'])->name('bahanbaku.show');
Route::get('/bahanbaku/{id}/edit', [BahanBakuController::class, 'edit'])->name('bahanbaku.edit');
Route::put('/bahanbaku/{id}', [BahanBakuController::class, 'update'])->name('bahanbaku.update');
Route::delete('/bahanbaku/{id}', [BahanBakuController::class, 'destroy'])->name('bahanbaku.destroy');
Route::get('/hpp-data/pdf', [App\Http\Controllers\SelisihController::class, 'downloadPDF'])->name('hpp-data.pdf');





Route::get('/barangmasuk', [App\Http\Controllers\HomeController::class, 'masuk'])->name('masuk');
Route::get('/selisih', [App\Http\Controllers\SelisihController::class, 'index'])->name('selisih');
Route::get('/tambah/{id}', [SelisihController::class, 'edit'])->name('edit');


Route::resource('barang_masuk', BarangMasukController::class);
Route::resource('barang_keluar', BarangKeluarController::class);
Route::resource('Selisih', SelisihController::class);
Route::resource('bahanbaku', BahanBakuController::class);


Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




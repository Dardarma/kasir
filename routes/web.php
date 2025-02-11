<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangGudangController;
use App\Http\Controllers\barangJadiController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\barangMasukController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('barang-gudang', BarangGudangController::class);

Route::resource('satuan', SatuanController::class);

Route::resource('barang-jadi', barangJadiController::class);

Route::resource('barang-masuk', barangMasukController::class);

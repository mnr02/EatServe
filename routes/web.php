<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');})->name('welcome');
Route::get('registrasi', [AkunController::class, 'tampilkanRegistrasi'])->name('registrasi.tampil');
Route::post('registrasi/submit', [AkunController::class, 'submitRegistrasi'])->name('registrasi.submit');
Route::post('admin/delete/{id}', [AkunController::class, 'hapusAkun'])->name('hapus.akun');

Route::middleware('guest')->group(function () {
    Route::get('login', [AkunController::class, 'tampilkanLogin'])->name('login');
    Route::post('login/submit', [AkunController::class, 'submitLogin'])->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('admin', [AkunController::class, 'admin'])->name('admin');
    Route::get('admin2', [AkunController::class, 'admin2'])->name('admin2');
    Route::get('makanan/tambah', [MakananController::class, 'tambah'])->name('makanan.tambah');
    Route::post('makanan/submit', [MakananController::class, 'submit'])->name('makanan.submit');
    Route::get('makanan/edit/{id}', [MakananController::class, 'edit'])->name('makanan.edit');
    Route::put('makanan/update/{id}', [MakananController::class, 'update'])->name('makanan.update');
    Route::post('makanan/delete/{id}', [MakananController::class, 'delete'])->name('makanan.delete');
    Route::get('logout', [AkunController::class, 'logout'])->name('logout');    
});

Route::get('Daftar_Menu', [MakananController::class, 'Daftar_Menu'])->name('Daftar_Menu');
Route::get('makanan', [MakananController::class, 'tampil'])->name('makanan.tampil');
Route::get('makanan/detail/{id}', [MakananController::class, 'detail'])->name('makanan.detail');
Route::post('/makanan/{id}/tambah-stok', [MakananController::class, 'tambahStok'])->name('makanan.tambahStok');


Route::get('/pesanan', [OrderController::class, 'tampil'])->name('pesanan.tampil');
Route::get('/pesanan/baru', [OrderController::class, 'baru'])->name('pesanan.baru');
Route::post('/pesanan/submit', [OrderController::class, 'submit'])->name('pesanan.submit');
Route::get('/pesanan/konfirmasi/{kode}', [OrderController::class, 'konfirmasi'])->name('pesanan.konfirmasi');
Route::post('/pesanan/{id}/proses', [OrderController::class, 'proses'])->name('pesanan.proses');
Route::post('/pesanan/{id}/selesai', [OrderController::class, 'selesai'])->name('pesanan.selesai');
Route::post('/pesanan/{id}/tolak', [OrderController::class, 'tolak'])->name('pesanan.tolak');
Route::get('/pesanan/lacak', [OrderController::class, 'formLacak'])->name('lacak.form');
Route::get('/pesanan/cari', [OrderController::class, 'cariPesanan'])->name('lacak.cari');
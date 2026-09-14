<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemPenjualanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;

// Route untuk Guest (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/auth', [AuthController::class, 'authenticate'])->name('auth');
});

// Route untuk yang Sudah Login
Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route untuk Halaman Tentang Kami
    Route::get('/tentang-kami', function () {
        return view('tentang-kami');
    })->name('tentang.kami');

    // PERBAIKAN: Menambahkan middleware('role:admin') agar KASIR TIDAK BISA MASUK ke menu Users
    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users/update/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // Route berdasarkan Role (Admin dan Kasir sama-sama bisa akses)
    Route::middleware('role:admin,kasir')->group(function () {
        Route::resource('/produk', ProdukController::class);
        Route::resource('/penjualan', PenjualanController::class);
        Route::resource('/itempenjualan', ItemPenjualanController::class);
    });

}); // Kurung penutup utama middleware auth

// KODE BARU DITEMPEL DI SINI (BARIS PALING BAWAH SENDIRI)
Route::get('/buat-link-storage', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    return 'Link Storage Berhasil Dibuat!';
});

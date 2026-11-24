<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController; 
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\DashboardController;// <-- 1. TAMBAHKAN IMPORT INI
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route bawaan Laravel
Route::get('/', function () {
    return view('welcome');
});

// Route untuk tugas Passing Data Laravel
Route::get('/home', [HomeController::class, 'index']);

// ===== TAMBAHAN DARI MATERI ANDA =====

// 2. Route untuk Form Login / AJAX (dari pertemuan sebelumnya)
// Ini menangani action="auth/login" di form HTML Anda
Route::post('/auth/login', [HomeController::class, 'login']); 

// 3. Route untuk QuestionController (Langkah No. 2 di gambar materi)
Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

Route::get('/post/create', [PostController::class, 'create']);
Route::post('/post', [PostController::class, 'store']);
//pelanggan
Route::resource('pelanggan', PelangganController::class);

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');

Route::get('/admin/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('auth.logout');
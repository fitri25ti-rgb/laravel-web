<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController; 
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BiodataController;

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

// ===== ROUTE PELANGGAN =====
// Route::resource sudah otomatis membuat route index, create, store, show, edit, update, destroy.
// Jadi kamu tidak perlu menulis route manual untuk create dan index lagi di bawahnya.
Route::resource('pelanggan', PelangganController::class);

// ===== ROUTE DASHBOARD =====
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ===== ROUTE BIODATA (Diperbaiki) =====
// Menambahkan parameters agar Laravel menggunakan 'biodata' bukan 'biodatum'
Route::resource('biodata', BiodataController::class)->parameters([
    'biodata' => 'biodata'
]);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController; // <-- 1. TAMBAHKAN IMPORT INI

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
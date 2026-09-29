<?php

use Illuminate\Support\Facades\Route;
use App\Http\HomeControllers\HomeController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);
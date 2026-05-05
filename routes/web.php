<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
// Jangan lupa import controller Tugas jika sudah ada
// use App\Http\Controllers\TugasController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Jalur untuk tampilan Biodata (Halaman Utama)
Route::get('/', function () {
    return view('biodata');
});

// 2. Jalur untuk Posts
Route::get('/posts', [PostController::class, 'index']);

// 3. Jalur untuk Tugas (Jika kamu sudah sampai tahap ini)
// Route::get('/tugas', [TugasController::class, 'index']);
// Route::post('/tugas', [TugasController::class, 'store']);
// Route::delete('/tugas/{id}', [TugasController::class, 'destroy'])->middleware('admin');
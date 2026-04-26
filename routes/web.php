<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TugasController;

// Grouping yang mewajibkan Login (Autentikasi)
Route::middleware(['auth'])->group(function () {
    
    // Semua user yang login bisa lihat & tambah data
    Route::get('/tugas', [TugasController::class, 'index']);
    Route::post('/tugas', [TugasController::class, 'store']);

    // Khusus Admin yang bisa hapus (Otorisasi via Middleware)
    Route::delete('/tugas/{id}', [TugasController::class, 'destroy'])->middleware('admin');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\PostController;
Route::get('/posts', [PostController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

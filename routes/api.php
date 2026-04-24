<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
use App\Http\Controllers\MenuController;

Route::get('/menu', [MenuController::class, 'index']);      // Lihat semua menu
Route::get('/menu/{id}', [MenuController::class, 'show']); // Lihat satu menu detail
Route::post('/menu', [MenuController::class, 'store']);    // Tambah menu
Route::put('/menu/{id}', [MenuController::class, 'update']); // Update menu
Route::delete('/menu/{id}', [MenuController::class, 'destroy']); // Hapus menu

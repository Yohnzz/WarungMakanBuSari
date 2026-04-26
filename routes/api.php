<?php

use App\Http\Controllers\Api\KategoriController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\MenuController;
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

Route::get('/menu', [MenuController::class, 'index']);      // Lihat semua menu
Route::get('/menu/{id}', [MenuController::class, 'show']); // Lihat satu menu detail
Route::post('/menu', [MenuController::class, 'store']);    // Tambah menu
Route::put('/menu/{id}', [MenuController::class, 'update']); // Update menu
Route::delete('/menu/{id}', [MenuController::class, 'destroy']); // Hapus menu

Route::get('/kategori', [KategoriController::class, 'index']);      // Lihat semua kategori
Route::get('/kategori/{id}', [KategoriController::class, 'show']); // Lihat satu kategori detail
Route::post('/kategori', [KategoriController::class, 'store']);    // Tambah kategori
Route::put('/kategori/{id}', [KategoriController::class, 'update']); // Update kategori
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']); // Hapus kategori

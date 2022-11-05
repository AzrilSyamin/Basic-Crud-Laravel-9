<?php

use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, "index"]);
Route::put('/', [ProductController::class, "cash"]);

Route::get('/owner', [OwnerController::class, "index"]);
Route::put('/owner', [OwnerController::class, "cash"]);

Route::get('/owner/add', [OwnerController::class, "add"]);
Route::post('/owner/add', [OwnerController::class, "add"]);
Route::post('/owner/adds', [OwnerController::class, "store"]);

Route::get('/owner/edit', [OwnerController::class, "proses"]);
Route::post('/owner/edit', [OwnerController::class, "proses"]);
Route::put('/owner/update', [OwnerController::class, "update"]);

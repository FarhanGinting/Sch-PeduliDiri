<?php

use App\Http\Controllers\CatatanController;
use Illuminate\Support\Facades\Route;

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

Route::resource('/', CatatanController::class);
Route::get('/details/{id}/{nama}', [CatatanController::class, 'details']);
Route::get('/table', [CatatanController::class, 'showtable']);
Route::get('add', [CatatanController::class, 'create'])->name('perjalanan.add');
Route::post('store', [CatatanController::class, 'store']);


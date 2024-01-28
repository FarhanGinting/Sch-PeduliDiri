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
Route::get('/details/{id}/{nama}', [CatatanController::class, 'details'])->name('details');
Route::get('table/delete/{id}', [CatatanController::class, 'delete']);
Route::delete('/destroy/{id}', [CatatanController::class, 'destroy']);
Route::get('/table', [CatatanController::class, 'showtable'])->name('table');
Route::get('/image', [CatatanController::class, 'showimage'])->name('image');
Route::get('/showdeleted', [CatatanController::class, 'showdeleted'])->name('showdeleted');
Route::get('/{id}/restore', [CatatanController::class, 'restore']);
Route::get('add', [CatatanController::class, 'create'])->name('perjalanan.add');
Route::post('store', [CatatanController::class, 'store']);
Route::get('/details/{id}/{nama}/edit', [CatatanController::class, 'edit']);
Route::put('/details/{id}/{nama}/update', [CatatanController::class, 'update']);

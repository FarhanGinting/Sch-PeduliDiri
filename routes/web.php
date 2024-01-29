<?php

use App\Http\Controllers\CatatanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::resource('/', CatatanController::class)->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');


Route::get('/details/{id}/{nama}', [CatatanController::class, 'details'])->name('details')->middleware('auth');
Route::get('table/delete/{id}', [CatatanController::class, 'delete'])->middleware('auth');
Route::delete('/destroy/{id}', [CatatanController::class, 'destroy'])->middleware('auth');
Route::get('/table', [CatatanController::class, 'showtable'])->name('table')->middleware('auth');
Route::get('/image', [CatatanController::class, 'showimage'])->name('image')->middleware('auth');
Route::get('/showdeleted', [CatatanController::class, 'showdeleted'])->name('showdeleted')->middleware('auth');
Route::get('/{id}/restore', [CatatanController::class, 'restore'])->middleware('auth');
Route::get('add', [CatatanController::class, 'create'])->name('perjalanan.add')->middleware('auth');
Route::post('store', [CatatanController::class, 'store'])->middleware('auth');
Route::get('/details/{id}/{nama}/edit', [CatatanController::class, 'edit'])->middleware('auth');
Route::put('/details/{id}/{nama}/update', [CatatanController::class, 'update'])->middleware('auth');

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatatanController;
use FontLib\Table\Type\name;
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


Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');

// Group routes for Auth
Route::middleware(['auth'])->group(function () {
    Route::get('/', [CatatanController::class, 'index'])->name('index');
    Route::resource('/catatan', CatatanController::class);
    
    //Setup Route to view Table
    Route::get('/table', [CatatanController::class, 'showtable'])->name('catatan.table');
    Route::get('/image', [CatatanController::class, 'showimage'])->name('catatan.image');
    Route::get('/delete/{id}', [CatatanController::class, 'delete'])->name('catatan.delete');
    
    //Setup Route to view Delete List
    Route::get('/showdeleted', [CatatanController::class, 'showdeleted'])->name('catatan.showdeleted');
    Route::get('/restore/{id}', [CatatanController::class, 'restore'])->name('catatan.restore');

    //Setup Route to view Export-PDF
    Route::get('/exportdetails-pdf/{id}', [CatatanController::class, 'exportPdfDetails'])->name('catatan.export-details');
    Route::get('/exporttable-pdf/{id}', [CatatanController::class, 'exportPdfTable'])->name('catatan.export-table');
});

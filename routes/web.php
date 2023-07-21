<?php

use App\Http\Controllers\BidangController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DataTableController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RpjmdController;
use App\Http\Controllers\SubKegiatanController;
use App\Http\Controllers\UrusanController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/home2', function () {
    return view('home2');
});

Route::resource('rpjmds', RpjmdController::class);

// Auth::routes();



Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

//bagian saya
//route data resource table yajra
Route::get('data-urusan', [DataTableController::class, 'urusans'])->name('data-urusan');
Route::get('data-bidang', [DataTableController::class, 'bidangs'])->name('data-bidang');
Route::get('data-program', [DataTableController::class, 'programs'])->name('data-program');
Route::get('data-kegiatan', [DataTableController::class, 'kegiatans'])->name('data-kegiatan');
Route::get('data-subkegiatan', [DataTableController::class, 'sub_kegiatans'])->name('data-subkegiatan');

//route urusan
Route::resource('urusan', (UrusanController::class));
Route::resource('bidang', (BidangController::class));
Route::resource('program', (ProgramController::class));
Route::resource('kegiatan', (KegiatanController::class));
Route::resource('subkegiatan', (SubKegiatanController::class));

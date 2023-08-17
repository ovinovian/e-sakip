<?php

use App\Http\Controllers\BidangController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DataTableController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Rpjmd1RpjmdController;
use App\Http\Controllers\Rpjmd2VisiController;
use App\Http\Controllers\Rpjmd3MisiController;
use App\Http\Controllers\Rpjmd4TujuanController;
use App\Http\Controllers\Rpjmd5SasaranController;
use App\Http\Controllers\Rpjmd6StrategiController;
use App\Http\Controllers\Rpjmd7KebijakanController;
use App\Http\Controllers\Rpjmd8ProgramController;
use App\Http\Controllers\Rpjmd9KegiatanController;
use App\Http\Controllers\SubKegiatanController;
use App\Http\Controllers\UrusanController;
use App\Http\Controllers\UserController;
use App\Models\Rpjmd2_visi;

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

Route::resource('rpjmds', Rpjmd1RpjmdController::class);
Route::resource('rpjmd_visis', Rpjmd2VisiController::class);
Route::get('rpjmd_i_visis/{id}', [Rpjmd2VisiController::class, 'visi'])->name('rpjmd_i_visis');
Route::get('rpjmd_c_visis/{id}', [Rpjmd2VisiController::class, 'add'])->name('rpjmd_c_visis');
Route::resource('rpjmd_misis', Rpjmd3MisiController::class);
Route::resource('rpjmd_tujuans', Rpjmd4TujuanController::class);
Route::resource('rpjmd_sasarans', Rpjmd5SasaranController::class);
Route::resource('rpjmd_strategis', Rpjmd6StrategiController::class);
Route::resource('rpjmd_kebijakans', Rpjmd7KebijakanController::class);
Route::resource('rpjmd_programs', Rpjmd8ProgramController::class);
Route::resource('rpjmd_kegiatans', Rpjmd9KegiatanController::class);

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
Route::get('data-subkegiatan', [DataTableController::class, 'subkegiatans'])->name('data-subkegiatan');
//sengaja dipisah controller
Route::get('data-opd', [OpdController::class, 'getDataOpd'])->name('data-opd');

//route urusan
Route::resource('urusan', (UrusanController::class));
Route::resource('bidang', (BidangController::class));
Route::resource('program', (ProgramController::class));
Route::resource('kegiatan', (KegiatanController::class));
Route::resource('subkegiatan', (SubKegiatanController::class));
Route::resource('opd', (OpdController::class));
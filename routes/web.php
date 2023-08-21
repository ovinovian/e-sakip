<?php

use App\Http\Controllers\AdminController;

use App\Http\Controllers\BidangController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
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

Route::get('/landing_page', function () {
    return view('landing_page');
});

Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::view('/home', 'home')->name('home')->middleware('auth');

Route::resource('rpjmds', Rpjmd1RpjmdController::class);

Route::get('rpjmd_i_visis/{id}', [Rpjmd2VisiController::class, 'visi'])->name('rpjmd_i_visis');
Route::get('rpjmd_c_visis/{id}', [Rpjmd2VisiController::class, 'add'])->name('rpjmd_c_visis');
Route::resource('rpjmd_visis', Rpjmd2VisiController::class);

Route::get('rpjmd_i_misis/{id}', [Rpjmd3MisiController::class, 'misi'])->name('rpjmd_i_misis');
Route::get('rpjmd_c_misis/{id}', [Rpjmd3MisiController::class, 'add'])->name('rpjmd_c_misis');
Route::resource('rpjmd_misis', Rpjmd3MisiController::class);

Route::get('rpjmd_i_tujuans/{id}', [Rpjmd4TujuanController::class, 'tujuan'])->name('rpjmd_i_tujuans');
Route::get('rpjmd_c_tujuans/{id}', [Rpjmd4TujuanController::class, 'add'])->name('rpjmd_c_tujuans');
Route::get('rpjmd_i_tujuan_indikators/{id}', [Rpjmd4TujuanController::class, 'tujuan_indikator'])->name('rpjmd_i_tujuan_indikators');
Route::get('rpjmd_c_tujuan_indikators/{id}', [Rpjmd4TujuanController::class, 'add_indikator'])->name('rpjmd_c_tujuan_indikators');
Route::post('rpjmd_s_tujuan_indikators/{id}', [Rpjmd4TujuanController::class, 'store_indikator'])->name('rpjmd_s_tujuan_indikators');
Route::get('rpjmd_e_tujuan_indikators/{id}', [Rpjmd4TujuanController::class, 'edit_indikator'])->name('rpjmd_e_tujuan_indikators');
Route::get('rpjmd_u_tujuan_indikators/{id}', [Rpjmd4TujuanController::class, 'update_indikator'])->name('rpjmd_u_tujuan_indikators');
Route::get('rpjmd_d_tujuan_indikators/{id}', [Rpjmd4TujuanController::class, 'delete_indikator'])->name('rpjmd_d_tujuan_indikators');
Route::resource('rpjmd_tujuans', Rpjmd4TujuanController::class);

Route::get('rpjmd_i_sasarans/{id}', [Rpjmd5SasaranController::class, 'sasaran'])->name('rpjmd_i_sasarans');
Route::get('rpjmd_c_sasarans/{id}', [Rpjmd5SasaranController::class, 'add'])->name('rpjmd_c_sasarans');
Route::get('rpjmd_i_sasaran_indikators/{id}', [Rpjmd5SasaranController::class, 'sasaran_indikator'])->name('rpjmd_i_sasaran_indikators');
Route::get('rpjmd_c_sasaran_indikators/{id}', [Rpjmd5SasaranController::class, 'add_indikator'])->name('rpjmd_c_sasaran_indikators');
Route::post('rpjmd_s_sasaran_indikators/{id}', [Rpjmd5SasaranController::class, 'store_indikator'])->name('rpjmd_s_sasaran_indikators');
Route::get('rpjmd_e_sasaran_indikators/{id}', [Rpjmd5SasaranController::class, 'edit_indikator'])->name('rpjmd_e_sasaran_indikators');
Route::get('rpjmd_u_sasaran_indikators/{id}', [Rpjmd5SasaranController::class, 'update_indikator'])->name('rpjmd_u_sasaran_indikators');
Route::get('rpjmd_d_sasaran_indikators/{id}', [Rpjmd5SasaranController::class, 'delete_indikator'])->name('rpjmd_d_sasaran_indikators');
Route::resource('rpjmd_sasarans', Rpjmd5SasaranController::class);

Route::get('rpjmd_i_strategis/{id}', [Rpjmd6StrategiController::class, 'strategi'])->name('rpjmd_i_strategis');
Route::get('rpjmd_c_strategis/{id}', [Rpjmd6StrategiController::class, 'add'])->name('rpjmd_c_strategis');
Route::resource('rpjmd_strategis', Rpjmd6StrategiController::class);

Route::get('rpjmd_i_kebijakans/{id}', [Rpjmd7KebijakanController::class, 'kebijakan'])->name('rpjmd_i_kebijakans');
Route::get('rpjmd_c_kebijakans/{id}', [Rpjmd7KebijakanController::class, 'add'])->name('rpjmd_c_kebijakans');
Route::resource('rpjmd_kebijakans', Rpjmd7KebijakanController::class);

Route::get('rpjmd_i_programs/{id}', [Rpjmd8ProgramController::class, 'program'])->name('rpjmd_i_programs');
Route::get('rpjmd_c_programs/{id}', [Rpjmd8ProgramController::class, 'add'])->name('rpjmd_c_programs');
Route::resource('rpjmd_programs', Rpjmd8ProgramController::class);

Route::resource('rpjmd_kegiatans', Rpjmd9KegiatanController::class);

// Auth::routes();



Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/main', [HomeController::class, 'main'])->name('main-index');
Route::get('/main_detail', [HomeController::class, 'mainDetail'])->name('main-detail');


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
Route::get('data-admin', [AdminController::class, 'getDataAdmin'])->name('data-admin');

//route urusan
Route::resource('admin', (AdminController::class));
Route::resource('urusan', (UrusanController::class));
Route::resource('bidang', (BidangController::class));
Route::resource('program', (ProgramController::class));
Route::resource('kegiatan', (KegiatanController::class));
Route::resource('subkegiatan', (SubKegiatanController::class));
Route::resource('opd', (OpdController::class));
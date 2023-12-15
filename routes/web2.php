<?php

use App\Http\Controllers\BerkasController;
use App\Http\Controllers\BookdocsController;
use App\Http\Controllers\BookmanualController;
use App\Http\Controllers\BookstandardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\StandarController;
use App\Http\Controllers\StandardController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

/*==============================================*/
/*
Route Untuk LPPM
*/
/*==============================================*/

Route::get('/', function () {
    return view('home');
});
Route::resource('dashboard',DashboardController::class)->middleware('auth');
Route::resource('fakultas',FakultasController::class)->middleware('auth');
Route::resource('prodi',ProdiController::class)->middleware('auth');
Route::resource('jabatan',JabatanController::class)->middleware('auth');
Route::resource('pegawai',UserController::class)->middleware('auth');
Route::resource('standard',StandardController::class)->middleware('auth');
Route::resource('jenis',JenisController::class)->middleware('auth');
Route::resource('bookmanual',BookmanualController::class)->middleware('auth');
Route::resource('bookstandard',BookstandardController::class)->middleware('auth');
Route::resource('indikator', IndikatorController::class)->middleware('auth');
Route::resource('bookdocs',BookdocsController::class)->middleware('auth');
Route::resource('nilai',NilaiController::class)->middleware('auth');
Route::resource('berkas',BerkasController::class)->middleware('auth');

// manajemen login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login/auth', [LoginController::class, 'Authlogin'])->middleware('guest');
Route::post('/logout', [LoginController::class,'Logout'])->middleware('auth');
// Route::post('/logout', [LoginController::class,'LogOut'])->middleware('auth');

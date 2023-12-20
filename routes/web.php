<?php

use App\Http\Controllers\BerkasController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookdocsController;
use App\Http\Controllers\BookmanualController;
use App\Http\Controllers\BookstandardController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\FileController;
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
use App\Http\Controllers\PenilaianController;


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
    return view('welcome');
});

Route::get('/index', function(){
    return view('container');
})->middleware('auth');
Route::resource('dashboard', DashboardController::class)->middleware('auth');
Route::resource('standard',StandardController::class)->middleware('auth');
Route::resource('fakultas',FakultasController::class)->middleware('auth');
Route::resource('prodi',ProdiController::class)->middleware('auth');
Route::resource('jabatan',JabatanController::class)->middleware('auth');
Route::resource('pegawai',UserController::class)->middleware('auth');
Route::resource('jenis',JenisController::class)->middleware('auth');
Route::resource('nilai', NilaiController::class)->middleware('auth');
Route::resource('bookmanual',BookmanualController::class)->middleware('auth');
Route::resource('bookstandard',BookstandardController::class)->middleware('auth');
Route::resource('indikator', IndikatorController::class)->middleware('auth');
Route::resource('bookdocs',BookdocsController::class)->middleware('auth');
Route::resource('penilaian',PenilaianController::class)->middleware('auth');


//manajemen Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login/auth', [LoginController::class, 'Authlogin'])->middleware('guest');
Route::post('/logout', [LoginController::class,'Logout'])->middleware('auth');

//manajemen File
Route::get('/berkas',[BerkasController::class, 'listBerkas'])->name('berkas.index')->middleware('auth');
Route::post('/add-indikator', [BerkasController::class, 'addIndikator'])->name('berkas.addIndikator')->middleware('auth');
Route::delete('/delete-indikator/{id}',[BerkasController::class, 'hapusIndikator'])->name('berkas.delete')->middleware('auth');
Route::post('/add-file/{id}', [BerkasController::class, 'addFile'])->name('berkas.addFile')->middleware('auth');
Route::post('/upload-file/{id}',[BerkasController::class, 'uploadFile'])->name('berkas.upload_file')->middleware('auth');
Route::delete('/delete-file/{id}',[BerkasController::class, 'deleteFile'])->name('berkas.hapusFile')->middleware('auth');


Route::post('/upload_file/{id}',[FileController::class, 'upload_file'])->middleware('auth');
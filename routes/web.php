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
use Spatie\Permission\Models\Role;

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
// Route::get('/woy', function () {
//     $role = Role::first();
//     $role->givePermissionTo('kelola standard','kelola bookmanual','kelola bookstandard','kelola bookdocs','kelola indikator', 'kelola jenis','kelola nilai','kelola berkas','kelola penilaian');
//     dd($role);

// });

// Route::get('/index', function(){
//     return view('container');
// })->middleware('auth');

Route::resource('dashboard', DashboardController::class)->middleware('auth');
Route::middleware(['auth', 'can:kelola fakultas'])->group(function () {
    Route::resource('fakultas',FakultasController::class)->middleware('auth');
});
Route::middleware(['auth', 'can:kelola standard'])->group(function () {
    Route::resource('standard',StandardController::class)->middleware('auth');   
});
Route::middleware(['auth', 'can:kelola prodi'])->group(function () {
    Route::resource('prodi',ProdiController::class)->middleware('auth');
});
Route::middleware(['auth', 'can:kelola pegawai'])->group(function () {
    Route::resource('pegawai',UserController::class)->middleware('auth');
});
Route::middleware(['auth', 'can:kelola jenis'])->group(function () {
    Route::resource('jenis',JenisController::class)->middleware('auth');
});
Route::middleware(['auth', 'can:kelola nilai'])->group(function () {
    Route::resource('nilai', NilaiController::class)->middleware('auth');
});
Route::middleware(['auth', 'can:kelola bookmanual'])->group(function () {
    Route::resource('bookmanual',BookmanualController::class)->middleware('auth');  
});
Route::middleware(['auth', 'can:kelola bookstandard'])->group(function () {
    Route::resource('bookstandard',BookstandardController::class)->middleware('auth'); 
});
Route::middleware(['auth', 'can:kelola indikator'])->group(function () {
    Route::resource('indikator', IndikatorController::class)->middleware('auth');
});
Route::middleware(['auth', 'can:kelola penilaian'])->group(function () {
    Route::resource('penilaian',PenilaianController::class)->middleware('auth');
});

Route::get('/formulir',[BookdocsController::class, 'indexformulir'])->name('formulir.index')->middleware('auth');
Route::get('/SOP',[BookdocsController::class, 'indexSOP'])->name('SOP.index')->middleware('auth');
//manejemen formulir
Route::middleware(['auth', 'can:kelola bookdocs'])->group(function () {
    Route::get('/tambah-formulir',[BookdocsController::class, 'tambahFormulir'])->name('formulir.create')->middleware('auth');
    Route::post('/upload-formulir',[BookdocsController::class,'uploadFormulir'])->name('formulir.store')->middleware('auth');
    Route::get('/edit-formulir/{id}',[BookdocsController::class,'editFormulir'])->name('formulir.edit')->middleware('auth');
    Route::put('/update-formulir/{id}',[BookdocsController::class, 'updateFormulir'])->name('formulir.update')->middleware('auth');
    Route::delete('/hapus-formulir/{id}',[BookdocsController::class, 'hapusFormulir'])->name('formulir.destroy')->middleware('auth');
    //manejemen SOP
    Route::get('/tambah-SOP',[BookdocsController::class, 'tambahSOP'])->name('SOP.create')->middleware('auth');
    Route::post('/upload-SOP',[BookdocsController::class,'uploadSOP'])->name('SOP.store')->middleware('auth');
    Route::get('/edit-SOP/{id}',[BookdocsController::class,'editSOP'])->name('SOP.edit')->middleware('auth');
    Route::put('/update-SOP/{id}',[BookdocsController::class, 'updateSOP'])->name('SOP.update')->middleware('auth');
    Route::delete('/hapus-SOP/{id}',[BookdocsController::class, 'hapusSOP'])->name('SOP.destroy')->middleware('auth');
});

Route::middleware(['auth', 'can:kelola jabatan'])->group(function () {
    //manajemen jabatan
    Route::get('/jabatan',[JabatanController::class, 'index'])->name('jabatan.index')->middleware('auth');
    Route::post('/add-jabatan', [JabatanController::class, 'store'])->name('jabatan.store')->middleware('auth');
    Route::get('/jabatan-tambah',[JabatanController::class, 'create'])->name('jabatan.create')->middleware('auth');
    Route::delete('/delete-jabatan/{id}',[JabatanController::class, 'destroy'])->name('jabatan.destroy')->middleware('auth');
    Route::get('/edit-jabatan/{id}',[JabatanController::class, 'edit'])->name('jabatan.edit')->middleware('auth');
    Route::put('/update-jabatan/{id}', [JabatanController::class, 'update'])->name('jabatan.update')->middleware('auth');
});

Route::middleware(['auth', 'can:kelola berkas'])->group(function () {
    //manajemen File
    Route::get('/berkas',[BerkasController::class, 'listBerkas'])->name('berkas.index')->middleware('auth');
    Route::post('/add-indikator', [BerkasController::class, 'addIndikator'])->name('berkas.addIndikator')->middleware('auth');
    Route::delete('/delete-indikator/{id}',[BerkasController::class, 'hapusIndikator'])->name('berkas.delete')->middleware('auth');
    Route::post('/add-file/{id}', [BerkasController::class, 'addFile'])->name('berkas.addFile')->middleware('auth');
    Route::post('/upload-file/{id}',[BerkasController::class, 'uploadFile'])->name('berkas.upload_file')->middleware('auth');
    Route::delete('/delete-file/{id}',[BerkasController::class, 'deleteFile'])->name('berkas.hapusFile')->middleware('auth');
    Route::get('/add-nilai/{id}', [BerkasController::class, 'addNilai'])->name('berkas.addNilai')->middleware('auth');
    Route::put('/update-nilai/{id}', [BerkasController::class, 'updateNilai'])->name('berkas.updateNilai')->middleware('auth');
});

//manajemen Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login/auth', [LoginController::class, 'Authlogin'])->middleware('guest');
Route::post('/logout', [LoginController::class,'Logout'])->middleware('auth');



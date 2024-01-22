<?php

use App\Http\Controllers\BerkasController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookdocsController;
use App\Http\Controllers\BookmanualController;
use App\Http\Controllers\BookstandardController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiBerkasController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\AudhitorController;
use App\Http\Controllers\PengendalianController;
use App\Http\Controllers\ProfileController;
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
    return view('home');
});
// Route::get('/hey', function () {
//     $roles = ['Audhitor Informatika','Audhitor RPL', 'Audhitor Manajemen','Audhitor Hukum','Audhitor Argoteknologi'];
//     foreach ($roles as $rol)
//     {
//         Role::create(['name'=> $rol]);
//     }
//     dd('anjay');

// });
// Route::get('/woy', function () {
//     $role = Role::first();
//     $role->givePermissionTo('kelola standard','kelola bookmanual','kelola bookstandard','kelola bookdocs','kelola indikator', 'kelola jenis','kelola nilai','kelola berkas','kelola penilaian');
//     dd($role);

// });

// Route::get('/index', function(){
//     return view('container');
// });
// Route::get('/table', function(){
//     return view('tabel');
// });

Route::resource('dashboard', DashboardController::class)->middleware('auth');

// manajemen profil
Route::get('/profile/{id}', [ProfileController::class, 'ProfilInfo'])->name('profile.ProfilInfo')->middleware('auth');
Route::put('/profile/{id}/update', [ProfileController::class, 'UpdateProfil'])->name('profile.update')->middleware('auth');

//manejemen fakultas
Route::middleware(['auth', 'can:kelola fakultas'])->group(function () {
    Route::resource('fakultas',FakultasController::class)->middleware('auth');
});
//manajemen prodi
Route::middleware(['auth', 'can:kelola prodi'])->group(function () {
    Route::resource('prodi',ProdiController::class)->middleware('auth');
});

//manajemen pegawai
Route::middleware(['auth', 'can:kelola pegawai'])->group(function () {
    Route::resource('pegawai',UserController::class)->middleware('auth');
});
//manajemen kelola jenis
Route::middleware(['auth', 'can:kelola jenis'])->group(function () {
    Route::resource('jenis',JenisController::class)->middleware('auth');
});
//manajemen kelola nilai
Route::middleware(['auth', 'can:kelola nilai'])->group(function () {
    Route::resource('nilai', NilaiController::class)->middleware('auth');
});
//manajemen standard
Route::get('/standard',[StandardController::class,'index'])->name('standard.index')->middleware('auth');
Route::middleware(['auth', 'can:kelola standard'])->group(function () {
    Route::post('/standard/store',[StandardController::class,'store'])->name('standard.store')->middleware('auth');
    Route::put('/standard/{id}/update',[StandardController::class,'update'])->name('standard.update')->middleware('auth');
    Route::delete('/standard/{id}/destroy',[StandardController::class,'destroy'])->name('standard.destroy')->middleware('auth'); 
});

//manajemen indikator
Route::get('/indikator',[IndikatorController::class,'index'])->name('indikator.index')->middleware('auth');
Route::middleware(['auth','can:kelola indikator'])->group(function(){
    Route::get('/indikator/create', [IndikatorController::class,'create'])->name('indikator.create')->middleware('auth');
    Route::post('/indikator/store',[IndikatorController::class,'store'])->name('indikator.store')->middleware('auth');
    Route::get('/indikator/{id}/edit',[IndikatorController::class,'edit'])->name('indikator.edit')->middleware('auth');
    Route::put('/indikator/{id}/update',[IndikatorController::class,'update'])->name('indikator.update')->middleware('auth');
    Route::delete('/indikator/{id}/destroy',[IndikatorController::class,'destroy'])->name('indikator.destroy')->middleware('auth');

});


//manajemen buku manual

Route::get('/bookmanual',[BookmanualController::class,'index'])->name('bookmanual.index')->middleware('auth');
Route::get('/bookmanual/{id}/show',[BookmanualController::class,'show'])->name('bookmanual.show')->middleware('auth');

Route::middleware(['auth', 'can:kelola bookmanual'])->group(function () {
    Route::get('/bookmanual/create',[BookmanualController::class,'create'])->name('bookmanual.create')->middleware('auth');
    Route::post('/bookmanual/store',[BookmanualController::class,'store'])->name('bookmanual.store')->middleware('auth');
    Route::get('/bookmanual/{id}/edit',[BookmanualController::class,'edit'])->name('bookmanual.edit')->middleware('auth');
    Route::put('/bookmanual/{id}/update',[BookmanualController::class,'update'])->name('bookmanual.update')->middleware('auth');
    Route::delete('bookmanual/{id}/destroy',[BookmanualController::class,'destroy'])->name('bookmanual.destroy')->middleware('auth');
});

//manajemen buku standard
Route::get('/bookstandard',[BookstandardController::class, 'index'])->name('bookstandard.index')->middleware('auth'); 
Route::get('/bookstandard/{id}/show',[BookstandardController::class, 'show'])->name('bookstandard.show')->middleware('auth'); 

Route::middleware(['auth', 'can:kelola bookstandard'])->group(function () {
    Route::get('/bookstandard/create',[BookstandardController::class,'create'])->name('bookstandard.create')->middleware('auth');
    Route::post('/bookstandard/store',[BookstandardController::class,'store'])->name('bookstandard.store')->middleware('auth');
    Route::get('/bookstandard/{id}/edit',[BookstandardController::class,'edit'])->name('bookstandard.edit')->middleware('auth');
    Route::put('/bookstandard/{id}/update',[BookstandardController::class,'update'])->name('bookstandard.update')->middleware('auth');
    Route::delete('/bookstandard/{id}/destroy',[BookstandardController::class,'destroy'])->name('bookstandard.destroy')->middleware('auth');
});

// Route::middleware(['auth', 'can:kelola penilaian'])->group(function () {

// });
// Route::middleware(['auth', 'can:kelola indikator'])->group(function () {
// });

Route::get('/formulir',[BookdocsController::class, 'indexformulir'])->name('formulir.index')->middleware('auth');
Route::get('/SOP',[BookdocsController::class, 'indexSOP'])->name('SOP.index')->middleware('auth');

Route::middleware(['auth', 'can:kelola bookdocs'])->group(function () {
    //manejemen formulir
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

//manajemen File
Route::middleware(['auth', 'can:kelola berkas'])->group(function () {
    Route::get('/berkas',[BerkasController::class, 'listBerkas'])->name('berkas.index')->middleware('auth');
    Route::post('/add-indikator', [BerkasController::class, 'addIndikator'])->name('berkas.addIndikator')->middleware('auth');
    Route::delete('/delete-indikator/{id}',[BerkasController::class, 'hapusIndikator'])->name('berkas.delete')->middleware('auth');
    Route::post('/add-file/{id}', [BerkasController::class, 'addFile'])->name('berkas.addFile')->middleware('auth');
    Route::post('/add-peningkatan/{id}', [BerkasController::class, 'addPeningkatan'])->name('berkas.peningkatan')->middleware('auth');
    Route::post('/upload-file/{id}',[BerkasController::class, 'uploadFile'])->name('berkas.upload_file')->middleware('auth');
    Route::post('/upload-peningkatan/{id}',[BerkasController::class, 'uploadPeningkatan'])->name('berkas.upload_peningkatan')->middleware('auth');
    Route::delete('/delete-file/{id}',[BerkasController::class, 'deleteFile'])->name('berkas.hapusFile')->middleware('auth');
    Route::post('berkas/validasi/{id}',[BerkasController::class,'validasiBerkas'])->name('berkas.valid')->middleware('auth');
    Route::post('berkas/submit-peningkatan/{id}',[BerkasController::class,'submitpeningkatan'])->name('berkas.submit')->middleware('auth');
    
});
//penilaian
Route::middleware(['auth', 'role:Auditor Informatika,Auditor Manajemen,Auditor RPL,Auditor Hukum,Auditor Agroteknologi'])->group(function(){
    Route::get('/add-nilai/{id}', [NilaiBerkasController::class, 'addNilai'])->name('penilaian.addNilai')->middleware('auth');
    Route::put('/update-nilai/{id}', [NilaiBerkasController::class, 'updateNilai'])->name('penilaian.updateNilai')->middleware('auth');
});
Route::middleware(['auth', 'role:Auditor Manajemen'])->group(function(){
    Route::get('/penilaian/Manajemen',[NilaiBerkasController::class, 'PenilaianManajemen'])->name('manajemen.index')->middleware('auth');
});
Route::middleware(['auth', 'role:Auditor Informatika'])->group(function(){
    Route::get('/penilaian/Informatika',[NilaiBerkasController::class, 'PenilaianInformatika'])->name('informatika.index')->middleware('auth');
});
Route::middleware(['auth', 'role:Auditor RPL'])->group(function(){
    Route::get('/penilaian/RPL',[NilaiBerkasController::class, 'PenilaianRPL'])->name('rpl.index')->middleware('auth');
});
Route::middleware(['auth', 'role:Auditor Hukum'])->group(function(){
    Route::get('/penilaian/Hukum',[NilaiBerkasController::class, 'PenilaianHukum'])->name('hukum.index')->middleware('auth');
});
Route::middleware(['auth', 'role:Auditor Agroteknologi'])->group(function(){
    Route::get('/penilaian/Agroteknologi',[NilaiBerkasController::class, 'PenilaianAgroteknologi'])->name('agro.index')->middleware('auth');
});

//pengendalian
Route::middleware(['auth', 'role:LPPM'])->group(function(){
    Route::get('/pengendalian/informatika',[PengendalianController::class, 'PengendalianInformatika'])->name('prodi_informatika.index')->middleware('auth');
    Route::get('/pengendalian/RPL',[PengendalianController::class, 'PengendalianRPL'])->name('prodi_rpl.index')->middleware('auth');
    Route::get('/pengendalian/Manajemen',[PengendalianController::class, 'PengendalianManajemen'])->name('prodi_manajemen.index')->middleware('auth');
    Route::get('/pengendalian/Hukum',[PengendalianController::class, 'PengendalianHukum'])->name('prodi_hukum.index')->middleware('auth');
    Route::get('/pengendalian/Agroteknologi',[PengendalianController::class, 'PengendalianAgroteknologi'])->name('prodi_agroteknologi.index')->middleware('auth');
    Route::get('/tambah-pengendalian/{id}',[PengendalianController::class,'addPengendalian'])->name('pengendalian.edit')->middleware('auth');
    Route::post('/pengendalian/update/{id}',[PengendalianController::class, 'updatePengendalian'])->name('pengendalian.update')->middleware('auth');
});


//manajemen audhitor
Route::middleware(['auth', 'role:LPPM'])->group(function(){
    Route::get('/auditor',[AudhitorController::class,'listAudhitor'])->name('audhitor.index')->middleware('auth');
    Route::get('/tambah-audhitor',[AudhitorController::class,'addAudhitor'])->name('audhitor.create')->middleware('auth');
    Route::post('/add_audhitor',[AudhitorController::class, 'storeAudhitor'])->name('audhitor.store')->middleware('auth');
    Route::delete('/hapus_audhitor/{id}',[AudhitorController::class, 'destroyAudhitor'])->name('audhitor.destroy')->middleware('auth');
});

//manajemen Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login/auth', [LoginController::class, 'Authlogin'])->middleware('guest');
Route::post('/logout', [LoginController::class,'Logout'])->middleware('auth');



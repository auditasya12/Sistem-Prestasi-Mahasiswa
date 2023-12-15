<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AngkatanController;

use App\Http\Controllers\KompetisiController;
use App\Http\Controllers\PenghargaanController;
use App\Http\Controllers\OrganisasiController;

use App\Http\Controllers\AplikomController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [UserController::class, 'edit'])->name('profile');
    Route::put('/update-profile', [UserController::class, 'update'])->name('update.profile');
    Route::get('/edit-password', [UserController::class, 'editPassword'])->name('ubah-password');
    Route::patch('/update-password', [UserController::class, 'updatePassword'])->name('update-password');
});

Route::group(['middleware' => ['auth', 'checkRole:guru']], function () {
    Route::get('/guru/dashboard', [HomeController::class, 'guru'])->name('guru.dashboard');
    Route::resource('materi', MateriController::class);
    Route::resource('tugas', TugasController::class);
    Route::get('/jawaban-download/{id}', [TugasController::class, 'downloadJawaban'])->name('guru.jawaban.download');
});
Route::group(['middleware' => ['auth', 'checkRole:mahasiswa']], function () {
    Route::get('/mahasiswa/dashboard', [HomeController::class, 'mahasiswas'])->name('mahasiswa.dashboard');
    Route::get('/mahasiswa/portofolio', [HomeController::class, 'datadir'])->name('mahasiswa.portofolio');
    Route::get('/mahasiswa/app-dashboard', [HomeController::class, 'porto'])->name('mahasiswa.app-dashboard');
    Route::resource('kompetisi', KompetisiController::class);
    Route::resource('penghargaan', PenghargaanController::class);
    Route::resource('organisasi', OrganisasiController::class);
    Route::resource('aplikom', AplikomController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('buku', BukuController::class);
    Route::resource('film', FilmController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('angkatan', AngkatanController::class);
    Route::resource('kategori', KategoriController::class);
    
    // Route::get('/siswa/materi', [MateriController::class, 'siswa'])->name('siswa.materi');
    // Route::get('/materi-download/{id}', [MateriController::class, 'download'])->name('siswa.materi.download');
    Route::post('/kompetisi/store', [KompetisiController::class, 'store'])->name('kompetisi.store');
    Route::post('/penghargaan/store', [PenghargaanController::class, 'store'])->name('penghargaan.store');
    Route::post('/organisasi/store', [OrganisasiController::class, 'store'])->name('organisasi.store');
    Route::post('/artikel/store', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
    Route::post('/film/store', [FilmController::class, 'store'])->name('film.store');
    Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
    Route::post('/aplikom/store', [AplikomController::class, 'store'])->name('aplikom.store');

    // Route::get('/datakompetisi/{id}', [KompetisiController::class, 'tampilDataKompetisi'])->name('kompetisi.tampilDataKompetisi');


    // Route::get('/tugas-download/{id}', [TugasController::class, 'download'])->name('siswa.tugas.download');
    // Route::post('/kirim-jawaban', [TugasController::class, 'kirimJawaban'])->name('kirim-jawaban');
});
Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/admin/dashboard', [HomeController::class, 'admin'])->name('admin.dashboard');
    Route::resource('jurusan', JurusanController::class);
    Route::resource('mapel', MapelController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('user', UserController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    // diganti disini
    Route::get('/admin/dashboard-porto', [HomeController::class, 'admins'])->name('admin.dashboard-porto');
    Route::get('/admin/dashboard-subporto', [HomeController::class, 'adminsub'])->name('admin.dashboard-subporto');
    Route::get('/admin/mahasiswa-dashboard', [HomeController::class, 'adminmhs'])->name('admin.mahasiswa-dashboard');
    Route::resource('kompetisi', KompetisiController::class);
    Route::resource('penghargaan', PenghargaanController::class);
    Route::resource('organisasi', OrganisasiController::class);
    Route::resource('aplikom', AplikomController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('buku', BukuController::class);
    Route::resource('film', FilmController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('angkatan', AngkatanController::class);
    Route::resource('kategori', KategoriController::class);

});

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Frontend
Route::get('/',[HomePageController::class, 'index']);
Route::get('/detail/{slug_berita}',[HomePageController::class, 'detail_berita']);
Route::get('/kategori/{slug_kategori}',[HomePageController::class, 'kategori']);
Route::get('/indeks-berita',[HomePageController::class, 'indeks_berita']);
Route::post('/search/{search_type}',[HomePageController::class, 'search']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

//Karyawan
Route::get('/karyawan',[KaryawanController::class,'index'])->name('karyawan');
Route::get('/karyawan/tambah',[KaryawanController::class,'tambah'])->name('karyawan.tambah');
Route::put('/karyawan/simpan',[KaryawanController::class,'simpan'])->name('karyawan.simpan');
Route::get('/karyawan/edit/{id}',[KaryawanController::class,'edit'])->name('karyawan.edit');
Route::post('/karyawan/update/{id}',[KaryawanController::class,'update'])->name('karyawan.update');
Route::get('/karyawan/hapus/{id}',[KaryawanController::class,'hapus'])->name('karyawan.hapus');

//Admin
Route::group(['middleware' => 'role-check:superadmin'], function () {
    Route::get('/admin',[AdminController::class,'index'])->name('admin');
    Route::get('/admin/tambah',[AdminController::class,'tambah'])->name('admin.tambah');
    Route::put('/admin/simpan',[AdminController::class,'simpan'])->name('admin.simpan');
    Route::get('/admin/edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
    Route::post('/admin/update/{id}',[AdminController::class,'update'])->name('admin.update');
    Route::get('/admin/hapus/{id}',[AdminController::class,'hapus'])->name('admin.hapus');
});

//Kategori
Route::get('/kat',[KategoriController::class,'index'])->name('kategori');
Route::get('/kat/tambah',[KategoriController::class,'tambah'])->name('kategori.tambah');
Route::put('/kat/simpan',[KategoriController::class,'simpan'])->name('kategori.simpan');
Route::get('/kat/edit/{id}',[KategoriController::class,'edit'])->name('kategori.edit');
Route::post('/kat/update/{id}',[KategoriController::class,'update'])->name('kategori.update');
Route::get('/kat/hapus/{id}',[KategoriController::class,'hapus'])->name('kategori.hapus');

//Berita
Route::get('/berita',[BeritaController::class,'index'])->name('berita');
Route::get('/berita/tambah',[BeritaController::class,'tambah'])->name('berita.tambah');
Route::put('/berita/simpan',[BeritaController::class,'simpan'])->name('berita.simpan');
Route::get('/berita/edit/{id}',[BeritaController::class,'edit'])->name('berita.edit');
Route::post('/berita/update/{id}',[BeritaController::class,'update'])->name('berita.update');
Route::get('/berita/hapus/{id}',[BeritaController::class,'hapus'])->name('berita.hapus');

Route::get('/berita/headline/{id_berita}/{status}',[BeritaController::class,'setheadline'])->name('berita.headline');
Route::get('/berita/setpilihan/{id_berita}/{status}',[BeritaController::class,'setpilihan'])->name('berita.pilihan');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});




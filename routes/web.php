<?php

use App\Http\Controllers\KaryawanController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/karyawan',[KaryawanController::class,'index'])->name('karyawan');
Route::get('/karyawan/tambah',[KaryawanController::class,'tambah'])->name('karyawan.tambah');
Route::put('/karyawan/simpan',[KaryawanController::class,'simpan'])->name('karyawan.simpan');
Route::get('/karyawan/edit/{id}',[KaryawanController::class,'edit'])->name('karyawan.edit');
Route::post('/karyawan/update/{id}',[KaryawanController::class,'update'])->name('karyawan.update');
Route::get('/karyawan/hapus/{id}',[KaryawanController::class,'hapus'])->name('karyawan.hapus');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});




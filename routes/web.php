<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TracerStudyPageController;
use \App\Http\Controllers\LoginPageController;

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


Route::get('/', 'App\Http\Controllers\LoginPageController@index')->name('landingpage');
//Controller LoginPageController
Route::get('/login', 'App\Http\Controllers\LoginPageController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginPageController@authenticate')->name('login');
Route::get('/admin/logout', 'App\Http\Controllers\LoginPageController@actionlogout')->name('logout');

//REGISTER
Route::get('register', [LoginPageController::class, 'register'])->name('register');
Route::post('register/action', [LoginPageController::class, 'actionregister'])->name('actionregister');
//Route::get('/landingpage', [LandingPageController::class, 'index']);

//Controller DashboaedPageController
Route::get('/dashboard', 'App\Http\Controllers\DashboardPageController@index');

//CRUD ACARA Admin

Route::get('/admin/acara', 'App\Http\Controllers\AcaraPageController@index');
Route::get('/admin/acara/tambah', 'App\Http\Controllers\AcaraPageController@tambah');
Route::post('/admin/acara/tambah', 'App\Http\Controllers\AcaraPageController@simpan');
Route::get('/admin/acara/ubah/{id}', 'App\Http\Controllers\AcaraPageController@ubah');
Route::post('/admin/acara/update', 'App\Http\Controllers\AcaraPageController@update');
Route::get('/admin/acara/hapus/{id}', 'App\Http\Controllers\AcaraPageController@hapus');
//Kategori

//Master kategori
Route::get('/admin/kategori', 'App\Http\Controllers\KategoriPageController@index');
Route::get('/admin/kategori/tambah', 'App\Http\Controllers\KategoriPageController@tambah');
Route::post('/admin/kategori/tambah', 'App\Http\Controllers\KategoriPageController@simpan');
Route::get('/admin/kategori/ubah/{id}', 'App\Http\Controllers\KategoriPageController@ubah');
Route::post('/admin/kategori/update', 'App\Http\Controllers\KategoriPageController@update');
Route::get('/admin/kategori/hapus/{id}', 'App\Http\Controllers\KategoriPageController@hapus');

//Master Barang
Route::get('/admin/aset', 'App\Http\Controllers\AsetPageController@home');
Route::get('/admin/stockopname', 'App\Http\Controllers\AsetPageController@stockopname');
Route::get('/admin/aset/tambah', 'App\Http\Controllers\AsetPageController@tambah');
Route::post('/admin/aset/tambah', 'App\Http\Controllers\AsetPageController@simpan');
Route::get('/admin/aset/ubah/{id}', 'App\Http\Controllers\AsetPageController@ubah');
Route::post('/admin/aset/update', 'App\Http\Controllers\AsetPageController@update');
Route::get('/admin/aset/hapus/{id}', 'App\Http\Controllers\AsetPageController@hapus');

//Barang Masuk
Route::get('/admin/asetmasuk', 'App\Http\Controllers\AsetmasukPageController@home');
Route::get('/admin/asetmasuk/tambah', 'App\Http\Controllers\AsetmasukPageController@tambah');
Route::post('/admin/asetmasuk/tambah', 'App\Http\Controllers\AsetmasukPageController@simpan');
Route::get('/admin/asetmasuk/ubah/{id}', 'App\Http\Controllers\AsetmasukPageController@ubah');
Route::post('/admin/asetmasuk/update', 'App\Http\Controllers\AsetmasukPageController@update');
Route::get('/admin/asetmasuk/hapus/{id}', 'App\Http\Controllers\AsetmasukPageController@hapus');

// riwayat Inventory data dari barang masuk
Route::get('/admin/riwayat-inventory', 'App\Http\Controllers\RiwayatinventoryPageController@home');
Route::get('/admin/riwayat-inventory/tambah', 'App\Http\Controllers\RiwayatinventoryPageController@tambah');
Route::post('/admin/riwayat-inventory/tambah', 'App\Http\Controllers\riwayatinventoryPageController@simpan');
Route::get('/admin/riwayat-inventory/ubah/{id}', 'App\Http\Controllers\riwayatinventoryPageController@ubah');
Route::get('/admin/riwayat-inventory/lihat', 'App\Http\Controllers\riwayatinventoryPageController@lihat');
Route::post('/admin/riwayat-inventory/update', 'App\Http\Controllers\riwayatinventoryPageController@update');
Route::get('/admin/riwayat-inventory/hapus/{id}', 'App\Http\Controllers\riwayatinventoryPageController@hapus');

Route::get('/admin/kendaraan/', 'App\Http\Controllers\KendaraanPageController@index');
Route::get('/admin/kendaraan/tambah', 'App\Http\Controllers\KendaraanPageController@tambah');
Route::post('/admin/kendaraan/tambah', 'App\Http\Controllers\KendaraanPageController@simpan');
Route::get('/admin/kendaraan/edit-riwayat/', 'App\Http\Controllers\KendaraanPageController@editriwayat');
Route::post('/admin/kendaraan/update', 'App\Http\Controllers\KendaraanPageController@update');
Route::get('/admin/kendaraan/hapus/{id}', 'App\Http\Controllers\KendaraanPageController@hapus');


Route::get('/admin/dashboard/', 'App\Http\Controllers\DashboardPageController@index');

Route::get('/admin/alumni', 'App\Http\Controllers\AlumniPageController@index');

//tambahkan masing masing dalam array yaitu jumlah, jumlah sekarang, perbandingan kedua jumlah dan menjadi status jika lebih kecil maka status berwarna merah, dan jika lebih besar maka berwarna hijau
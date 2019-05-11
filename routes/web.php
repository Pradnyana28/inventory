<?php

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

Route::get('/', function () { return view('frontpage'); });
Auth::routes();

/**
 * DataTables Ajax Requests
 */
Route::get('/pemesanan/data', 'Pemesanan\PemesananController@getData');
Route::get('/pemesanan/{pemesanan}/data', 'Pemesanan\DetailPemesananController@getData');
Route::get('/pemesanan/{pemesanan}/detail/data', 'Pemesanan\PemesananDetailController@getData');
Route::get('/barang/data', 'Barang\BarangController@getData');
Route::get('/barangKeluar/data', 'Barang\BarangKeluarController@getData');
Route::get('/merk/data', 'MerkController@getData');
Route::get('/jenisBarang/data', 'Barang\JenisBarangController@getData');
Route::get('/barangMasuk/data', 'Barang\BarangMasukController@getData');
Route::get('/users/data', 'UserController@getData');
Route::get('/barangKeluar/{kode_barang_keluar}/detail/data', 'Barang\DetailBarangKeluarController@report');
Route::get('/laporan/barangMasuk', 'Barang\BarangMasukController@report')->name('laporanBarangMasuk');
Route::get('/laporan/barangKeluar', 'Barang\BarangKeluarController@report')->name('laporanBarangKeluar');

/**
 * Web Routes
 */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('pemesanan/add', 'Pemesanan\PemesananController@create')->name('pemesanan.form');
Route::get('pemesanan/{pemesanan}/detail', 'Pemesanan\PemesananDetailController@index')->name('pemesananDetail.index');
Route::get('barangKeluar/{kode_barang_keluar}/detail', 'Barang\DetailBarangKeluarController@index')->name('barangKeluar.detail.index');
Route::put('detailBarangKeluar/{kode_barang_keluar}/bulkUpdate', 'Barang\DetailBarangKeluarController@update')->name('detailBarangKeluar.bulkUpdate');

Route::resource('pemesanan', 'Pemesanan\PemesananController');
Route::resource('detailPemesanan', 'Pemesanan\DetailPemesananController');
Route::resource('barangKeluar', 'Barang\BarangKeluarController');
Route::resource('barangMasuk', 'Barang\BarangMasukController');
Route::resource('jenisBarang', 'Barang\JenisBarangController');
Route::resource('barang', 'Barang\BarangController');
Route::resource('merk', 'MerkController');
Route::resource('users', 'UserController');

Route::get('/laporan', function () { return view('pages.Manajer.laporan'); })->name('laporan');
Route::get('/cetak/laporanBarangMasuk', 'Print\LaporanBarangMasukController@index')->name('cetak.laporanBarangMasuk');
Route::get('/cetak/laporanBarangKeluar', 'Print\LaporanBarangKeluarController@index')->name('cetak.laporanBarangKeluar');
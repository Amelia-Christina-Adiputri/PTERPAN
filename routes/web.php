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


//GUEST
Route::post('/ceklogin', 'AuthController@ceklogin');
Route::get('/logout','AuthController@logout' );
Route::get('/register','AdminPageController@register' )->name('register');
Route::post('/simpan','AdminPageController@simpan' )->name('simpen');
Route::get('/','AuthController@login' );

//ADMIN
Route::get('/a_home', 'AdminPageController@a_home');
Route::get('/a_driver', 'AdminPageController@a_driver');
Route::get('/a_driver_filter', 'AdminPageController@a_driver_filter');
Route::get('/a_kendaraan', 'AdminPageController@a_kendaraan');
Route::get('/a_kendaraan_filter', 'AdminPageController@a_kendaraan_filter');
Route::get('/a_pengajuan', 'AdminPageController@a_pengajuan');
Route::get('/a_laporan', 'AdminPageController@a_laporan');
Route::get('/a_detail_laporan/{id_pengajuan}', 'AdminPageController@a_detail_laporan');

    // ADMIN CRUD DRIVER
    Route::get('/a_driver/tambah_driver', 'AdminPageController@a_driver_tambah_driver');
    Route::get('/a_driver/ubah_driver/{id_driver}', 'AdminPageController@a_driver_ubah_driver');

    Route::post('/a_driver/insert', 'AdminPageController@a_driver_insert');
    Route::put('/a_driver/update/{id_driver}', 'AdminPageController@a_driver_update');
    Route::get('/a_driver/delete/{id_driver}', 'AdminPageController@a_driver_delete');

    // ADMIN CRUD KENDARAAN
    Route::get('/a_kendaraan/tambah_kendaraan', 'AdminPageController@a_kendaraan_tambah_kendaraan');
    Route::get('/a_kendaraan/ubah_kendaraan/{id_kendaraan}', 'AdminPageController@a_kendaraan_ubah_kendaraan');


    Route::post('/a_kendaraan/insert', 'AdminPageController@a_kendaraan_insert');
    Route::put('/a_kendaraan/update/{id_kendaran}', 'AdminPageController@a_kendaraan_update');
    Route::get('/a_kendaraan/delete/{id_kendaraan}', 'AdminPageController@a_kendaraan_delete');

    // ADMIN CRUD PENGAJUAN
    Route::post('/a_home/tolak/{id_pengajuan}', 'AdminPageController@a_home_tolak');
    Route::get('/a_home/terima_pengajuan/{id_pengajuan}', 'AdminPageController@a_home_terima_pengajuan');
    Route::get('/a_pengajuan/tambah_pengajuan', 'AdminPageController@a_pengajuan_tambah_pengajuan');
    Route::get('/a_pengajuan/ubah_pengajuan/{id_pengajuan}', 'AdminPageController@a_pengajuan_ubah_pengajuan');

    Route::post('/a_pengajuan/insert', 'AdminPageController@a_pengajuan_insert');
    Route::put('/a_pengajuan/update/{id_pengajuan}', 'AdminPageController@a_pengajuan_update');
    Route::put('/a_home/terima_pengajuan/update/{id_pengajuan}', 'AdminPageController@a_terima_pengajuan_update');
    Route::get('/a_pengajuan/delete/{id_pengajuan}', 'AdminPageController@a_pengajuan_delete');

//DRIVER
Route::get('/d_home', 'DriverPageController@d_home');
Route::get('/d_laporan/{id_pengajuan}', 'DriverPageController@d_laporan');
Route::get('/d_laporan/tambah_laporan/{id_pengajuan}', 'DriverPageController@d_laporan_tambah_laporan');
Route::post('/d_laporan/insert/{id_pengajuan}', 'DriverPageController@d_laporan_insert');
Route::get('/d_data_diri', 'DriverPageController@d_data_diri');
Route::get('/d_data_diri/ubah', 'DriverPageController@d_data_diri_ubah');
Route::put('/d_data_diri/update', 'DriverPageController@d_data_diri_update');

//PENGGUNA
Route::get('/p_home', 'PenggunaPageController@p_home');
Route::get('/p_driver', 'PenggunaPageController@p_driver');
Route::get('/p_driver_filter', 'PenggunaPageController@p_driver_filter');
Route::get('/p_kendaraan', 'PenggunaPageController@p_kendaraan');
Route::get('/p_kendaraan_filter', 'PenggunaPageController@p_kendaraan_filter');


    // PENGGUNA CRUD PENGAJUAN
    Route::get('/p_pengajuan/tambah_pengajuan', 'PenggunaPageController@p_pengajuan_tambah_pengajuan');
    Route::post('/p_pengajuan/insert', 'PenggunaPageController@p_pengajuan_insert');

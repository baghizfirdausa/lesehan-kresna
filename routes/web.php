<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'AuthController@login');
Route::post('/postlogin', 'AuthController@postlogin')->name('postLogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth.basic', 'checkRole:Keuangan']], function () {
    Route::get('/keuangan/dashboard', 'HomeController@index');

    Route::get('/keuangan/transaksi', 'TransaksiController@index');
    Route::post('/keuangan/transaksi/filter', 'TransaksiController@filterIndex');
    Route::post('/keuangan/transaksi', 'TransaksiController@store');
    Route::get('/keuangan/transaksi/tambah', 'TransaksiController@create');
    Route::delete('/keuangan/transaksi/{transaksi}', 'TransaksiController@destroy');

    Route::get('/keuangan/kategori', 'KategoriController@index');
    Route::post('/keuangan/kategori', 'KategoriController@store');
    Route::get('/keuangan/kategori/tambah', 'KategoriController@create');
    Route::delete('/keuangan/kategori/{kategori}', 'KategoriController@destroy');
    Route::get('/keuangan/kategori/{kategori}/edit', 'KategoriController@edit');
    Route::post('/keuangan/kategori/{kategori}/update', 'KategoriController@update');

    Route::get('/keuangan/menu', 'MenuController@index');
    Route::post('/keuangan/menu', 'MenuController@store');
    Route::get('/keuangan/menu/tambah', 'MenuController@create');
    Route::delete('/keuangan/menu/{menu}', 'MenuController@destroy');
    Route::get('/keuangan/menu/{menu}/edit', 'MenuController@edit');
    Route::post('/keuangan/menu/{menu}/update', 'MenuController@update');
});

Route::group(['middleware' => ['auth', 'checkRole:Pemilik']], function () {
    Route::get('/pemilik/dashboard', 'HomeController@index');
    Route::get('/pemilik/karyawan', 'KaryawanController@index');
    Route::post('/pemilik/karyawan', 'KaryawanController@store');
    Route::get('/pemilik/karyawan/tambah', 'KaryawanController@create');
    Route::delete('/pemilik/karyawan/{karyawan}', 'KaryawanController@destroy');
    Route::get('/pemilik/karyawan/{karyawan}/edit', 'KaryawanController@edit');
    Route::post('/pemilik/karyawan/{karyawan}/update', 'KaryawanController@update');
});

Route::group(['middleware' => ['auth', 'checkRole:Kasir']], function () {
    Route::get('/kasir/dashboard', 'TransaksiController@index');
    Route::get('/kasir/order', 'TransaksiController@create');
    Route::post('/kasir/order', 'TransaksiController@store');
    Route::delete('/kasir/order/{transaksi}', 'TransaksiController@destroy');
});

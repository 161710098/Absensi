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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>['auth','role:admin']], function(){
Route::resource('kelas', 'KelasController');
Route::resource('orangtua','OrangTuaController');
Route::resource('jurusan','JurusanController');
Route::resource('siswa','SiswaController');
Route::resource('absensi','AbsensiController');
});


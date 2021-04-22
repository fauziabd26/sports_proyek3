<?php

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

Route::get('/', 'UtamaController@index');
Route::get('/olahraga', function () {
    return view('user/olahraga');
});

//route CRUD fasilitas
Route::get('/fasilitas', 'FasilitasController@index');
Route::get('/fasilitas/cari', 'FasilitasController@cari');
Route::post('/fasilitas/store', 'FasilitasController@store');
Route::get('/showfasiliitas', 'FasilitasController@show');
Route::put('/fasilitas-update/{id_fasilitas}', 'FasilitasController@update')->name('fasilitas.update');
Route::get('/fasilitas-destroy{id_fasilitas}', 'FasilitasController@destroy')->name('fasilitas.delete');

//route Dashboard Admin
Route::get('/homeadmin', 'DashboardadminController@index')->name('homeadmin');
Route::get('/homesuperadmin', 'DashboardsuperadminController@index')->name('homesuperadmin');

//route CRUD Olahraga(Super)
Route::get('/olahraga', 'OlahragaController@index');
Route::get('/olahraga/cari', 'OlahragaController@cari');
Route::post('/olahraga/store', 'OlahragaController@store');
Route::get('/showolahraga', 'OlahragaController@show');
Route::post('/olahraga-update/{id}', 'OlahragaController@update')->name('olahraga.update');
Route::get('/olahraga-destroy{id_olahraga}', 'OlahragaController@destroy')->name('olahraga.delete');

//route CRUD Olahraga(Super)
Route::get('/tambahsewa', 'TambahSewaController@index');
Route::post('/tambahsewa/input', 'TransaksiController@store');
Route::get('/tambahsewa/datalapangan', 'TambahSewaController@dataLapangan');

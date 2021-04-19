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
Route::get('/showfasiliitas','FasilitasController@show');
Route::put('/fasilitas-update/{id}','FasilitasController@update')->name('fasilitas.update');  
Route::delete('/fasilitas/destroy/{id}','FasilitasController@destroy')->name('fasilitas.delete');
Route::get('/homeadmin', 'DashboardController@index')->name('homeadmin');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//route CRUD Olahraga(Super)
Route::get('/olahraga', 'OlahragaController@index');
Route::get('/olahraga/cari', 'OlahragaController@cari');
Route::post('/olahraga/store', 'OlahragaController@store');
Route::get('/showolahraga', 'OlahragaController@show');
Route::post('/olahraga-update/{id}', 'OlahragaController@update')->name('olahraga.update');
Route::get('/olahraga-destroy{id_olahraga}', 'OlahragaController@destroy')->name('olahraga.delete');

//route CRUD fasilitas
Route::get('/fasilitas', 'FasilitasController@index');
Route::get('/fasilitas/cari', 'FasilitasController@cari');
Route::post('/fasilitas/store', 'FasilitasController@store');
Route::get('/showfasiliitas', 'FasilitasController@show');
Route::put('/fasilitas-update/{id_fasilitas}', 'FasilitasController@update')->name('fasilitas.update');
Route::get('/fasilitas-destroy{id_fasilitas}', 'FasilitasController@destroy')->name('fasilitas.delete');

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

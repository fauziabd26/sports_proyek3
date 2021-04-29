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
Route::get('/homeuser', 'UtamaController@user');

//route CRUD fasilitas
Route::get('/notifikasi', 'NotifikasiController@index');
Route::get('/notifikasi/cari', 'NotifikasiController@cari');
Route::post('/notifikasi/store', 'NotifikasiController@store');
Route::get('/showfasiliitas', 'NotifikasiController@show');
Route::post('/notifikasi-update-{id}', 'NotifikasiController@update')->name('notifikasi.update');
Route::get('/notifikasi-destroy{id}', 'NotifikasiController@destroy')->name('notifikasi.delete');

//
Route::get('/homeadmin', 'DashboardadminController@indexAdmin')->name('homeadmin');
Route::get('/homesuperadmin', 'DashboardadminController@indexsuperAdmin')->name('homesuperadmin');
Route::get('/homecalonadmin', 'MitraController@index')->name('homecalonadmin');

//route CRUD Olahraga(Super)
Route::get('/olahraga', 'SportsController@index');
Route::get('/olahraga/cari', 'SportsController@cari');
Route::post('/olahraga/store', 'SportsController@store');
Route::get('/showolahraga', 'SportsController@show');
Route::post('/olahraga-update/{id}', 'SportsController@update')->name('olahraga.update');
Route::get('/olahraga-destroy{id_olahraga}', 'SportsController@destroy')->name('olahraga.delete');

//route CRUD Mitra(Super)
Route::get('/mitra-admin', 'MitraController@index');
Route::get('/mitra-super', 'MitraController@super');
Route::get('/mitra/cari', 'MitraController@cari');
Route::post('/mitra-admin/store', 'MitraController@store');
Route::get('/showmitra', 'MitraController@show');
Route::post('/mitra-update/{id}', 'MitraController@update')->name('mitra.update');
Route::get('/mitra-destroy{id_mitra}', 'MitraController@destroy')->name('mitra.delete');
Route::get('/mitra-hapus{id_mitra}', 'MitraController@hapus')->name('mitra.delete');


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

//==========BATASSS

Route::get('/admin', function () {
    return view('backend.login');
})->name('adminpage');

Route::get('/login', 'FrontController@login')->name('front.login');
Route::post('/registeruser', 'UserController@register_member')->name('front.register_post');
Route::get('/pitch/detail/{id}', 'FrontController@detail')->name('front.detail');
Route::get('/pitch/timesheet/{id}/date/{date}', 'FrontController@timesheet')->name('front.timesheet');
Route::post('/checkout', 'FrontController@checkout')->name('front.checkout');
Route::get('/order', 'FrontController@order')->name('front.order');
Route::get('/order/detail/{id}', 'FrontController@detail_order')->name('front.detail_order');
Route::post('/confirm', 'FrontController@confirm')->name('front.confirm');

Route::post('/adminpage/login', 'UserController@login')->name('user.login');

    Route::get('/adminpage/user/change_password', 'UserController@edit_pass')->name('user.edit_pass');
    Route::post('/adminpage/user/update_password', 'UserController@update_pass')->name('user.update_pass');
        Route::get('/adminpage/user', 'UserController@index')->name('user.index');
            Route::get('/adminpage/user/create', 'UserController@create')->name('user.create');
            Route::post('/adminpage/user', 'UserController@store')->name('user.store');
        Route::get('/adminpage/user/datatable', 'UserController@show')->name("user.datatable");
            Route::patch('/adminpage/user/{id}', 'UserController@update')->name("user.update");
            Route::get('/adminpage/user/{id}', 'UserController@edit')->name("user.edit");
            Route::delete('/adminpage/user/{id}', 'UserController@destroy')->name("user.destroy");
        
    Route::get('/adminpage/logout', 'UserController@logout')->name('user.logout');
    Route::get('/logout', 'UserController@logout_member')->name('front.logout');

        Route::get('/artikel-admin', 'ArticleController@index')->name('article.index');
        Route::get('/artikel-admin-create', 'ArticleController@create')->name('article.create');
        Route::post('/adminpage/article', 'ArticleController@store')->name('article.store');
        Route::get('/adminpage/article/datatable', 'ArticleController@show')->name("article.datatable");
        Route::get('/artikel-edit-admin-{id}', 'ArticleController@edit')->name("article.edit");
        Route::post('/artikel-update-{id}', 'ArticleController@update')->name("article.update");
        Route::get('/artikel-delete{id}', 'ArticleController@destroy')->name("article.destroy");
    
        Route::get('/artikel_category', 'ArticleCategoryController@index')->name('article_category.index');
        Route::get('/artikel_category-create', 'ArticleCategoryController@create')->name('article_category.create');
        Route::post('/artikel_category-store', 'ArticleCategoryController@store')->name('article_category.store');
        Route::get('/adminpage/article_category/datatable', 'ArticleCategoryController@show')->name("article_category.datatable");
        Route::get('/adminpage/article_category/{id}', 'ArticleCategoryController@edit')->name("article_category.edit");
        Route::post('/artikel_category-update{id}', 'ArticleCategoryController@update')->name("article_category.update");
        Route::get('/artikel_category-destroy-{id}', 'ArticleCategoryController@destroy')->name("article_category.destroy");
        Route::get('/adminpage/setting', 'SettingController@index')->name('setting.index');
        Route::post('/adminpage/setting', 'SettingController@store')->name('setting.store');
    
    Route::get('/sarana-admin', 'PitchController@index')->name('sarana.index');
    Route::get('/sarana-admin-create', 'PitchController@create')->name('sarana.create');
    Route::post('/sarana-store', 'PitchController@store')->name('sarana.store');
    Route::get('/adminpage/pitch/datatable', 'PitchController@show')->name("pitch.datatable");
    Route::get('/sarana/edit/{id}', 'PitchController@edit')->name("pitch.edit");
    Route::patch('/sarana-update-{id}', 'PitchController@update')->name("sarana.update");
    Route::get('/sarana-delete-{id}', 'PitchController@destroy')->name("pitch.destroy");

    Route::get('/adminpage/cash', 'CashController@index')->name('cash.index');
    Route::get('/adminpage/cash/create', 'CashController@create')->name('cash.create');
    Route::post('/adminpage/cash', 'CashController@store')->name('cash.store');
    Route::get('/adminpage/cash/datatable', 'CashController@show')->name("cash.datatable");
    Route::get('/adminpage/cash/{id}', 'CashController@edit')->name("cash.edit");
    Route::patch('/adminpage/cash/{id}', 'CashController@update')->name("cash.update");
    Route::delete('/adminpage/cash/{id}', 'CashController@destroy')->name("cash.destroy");

    Route::get('/adminpage/booking/{id}/payment/create', 'PembayaranController@create')->name('payment.create');
    Route::get('/adminpage/booking/{booking_id}/payment/edit/{id}', 'PembayaranController@edit')->name("payment.edit");
    Route::post('/adminpage/payment', 'PembayaranController@store')->name('payment.store');
    Route::patch('/adminpage/payment/confirm/{id}', 'PembayaranController@confirm')->name('payment.confirm');
    Route::get('/adminpage/payment', 'PembayaranController@index')->name('payment.index');
    Route::get('/adminpage/payment/datatable', 'PembayaranController@show')->name('payment.datatable');
    Route::patch('/adminpage/payment/{id}', 'PembayaranController@update')->name("payment.update");
    Route::delete('/adminpage/payment/{id}', 'PembayaranController@destroy')->name("payment.destroy");

    Route::get('/adminpage/booking', 'PemesananController@index')->name('booking.index');
    Route::get('/adminpage/booking/detail/{id}', 'PemesananController@detail')->name('booking.detail');
    Route::get('/adminpage/booking/create', 'PemesananController@create')->name('booking.create');
    Route::post('/adminpage/booking', 'PemesananController@store')->name('booking.store');
    Route::get('/adminpage/booking/datatable', 'PemesananController@show')->name("booking.datatable");
    Route::get('/adminpage/booking/{id}', 'PemesananController@edit')->name("booking.edit");
    Route::patch('/adminpage/booking/{id}', 'PemesananController@update')->name("booking.update");
    Route::delete('/adminpage/booking/{id}', 'PemesananController@destroy')->name("booking.destroy");

    Route::get('/adminpage/report/profit', 'PemesananController@view_laba')->name('report.laba');
    Route::get('/adminpage/report/profit/datatable', 'PemesananController@report_laba')->name('report.laba.datatable');
    Route::get('/adminpage/report/payment', 'PembayaranController@view_report_payment')->name('report.payment');
    Route::get('/adminpage/report/payment/datatable', 'PembayaranController@report_payment')->name('report.payment.datatable');

//========Batas

/*Route::get('/tambahsewa', 'TambahSewaControll@index');
Route::post('/tambahsewa/input', 'TransaksiController@store');
Route::get('/tambahsewa/datalapangan', 'TambahSewaControll@dataLapangan');

Route::get('/daftarpenyewa', 'TransaksiController@index');
Route::delete('/daftarpenyewa/{transaksi}','TransaksiController@destroy');
// Route::get('/daftarpenyewa/{transaksi}/edit','TransaksiController@edit');
Route::put('/daftarpenyewa/{transaksi}','TransaksiController@update');
*/
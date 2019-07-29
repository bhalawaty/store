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
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::prefix('dashboard')->group(function () {

    Route::get('admin-Login', 'Auth\AdminLoginController@login')->name('admin.auth.login');

    Route::post('/loginAdmin', 'Auth\AdminLoginController@loginAdmin')->name('admin.auth.loginAdmin');


});

Route::group(['middleware' => 'admin'], function () {

    Route::prefix('dashboard')->group(function () {
        Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.auth.logout');
        Route::get('/admin', 'admin\AdminController@index')->name('admin.admin.dashboard');


    });
});

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

        Route::get('/admin/create/product', 'admin\AdminController@create')->name('get.create.products.admin');

        Route::post('/admin/create/product', 'admin\AdminController@store')->name('post.create.products.admin');

        Route::get('/admin/create/category', 'admin\AdminController@createCategory')->name('get.create.category.admin');

        Route::post('/admin/create/category', 'admin\AdminController@storeCategory')->name('post.create.category.admin');

        Route::get('/admin/create/package', 'admin\AdminController@createPackage')->name('get.create.package.admin');

        Route::post('/admin/create/package', 'admin\AdminController@storePackage')->name('post.create.package.admin');



    });
});

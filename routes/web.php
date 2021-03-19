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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/roles', 'PermissionController@Permission');

Route::post('/image-upload', 'CommonController@imageUploadPost');

Route::group(['middleware' => 'role:vendor'], function() {

   Route::get('/vendor-dashboard', 'vendor\VendorController@index');

   Route::resource('products', 'vendor\ProductController');

   Route::resource('category', 'vendor\CategoryController');

});

Route::group(['middleware' => 'role:admin'], function() {

   Route::get('/admin-dashboard', 'admin\AdminController@index');

});

// For unauthorised url
Route::get('/unauthorised', function () {
    return view('unauthorised');
});
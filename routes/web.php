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

Route::group(['middleware' => 'role:vendor'], function() {

   Route::get('/vendor-dashboard', function() {

      return 'Welcome vendor dashboard';
      
   });

});

Route::group(['middleware' => 'role:admin'], function() {

   Route::get('/admin-dashboard', function() {

      return 'Welcome admin dashboard';
      
   });

});

// For unauthorised url
Route::get('/unauthorised', function () {
    return view('unauthorised');
});
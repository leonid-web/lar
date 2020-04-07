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
    if (!Auth::user()) {
        return view('auth/register');
    }
    else{
        return view('home');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/suc', function() {
      return view('suc');
});
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::post('/admin/razdels', 'UserController@store')->middleware('auth');


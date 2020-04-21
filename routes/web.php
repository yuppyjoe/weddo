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

Route::get('/', function () {
    return view('welcome');
  });

Route::group(['prefix' => 'auth'], function () {
    Route::resource('make/type', 'UserController');
    Route::get('users/check', 'UserController@userCheck')->name('username-check');
    Route::resource('users', 'UserController')->names(
        [
            'store' => 'users.new',
            'update' => 'users.edit',
            'index' => 'users',
            'destroy' => 'users.delete',
            'show' => 'user',
        ]
    );
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

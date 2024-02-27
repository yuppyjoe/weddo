<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;

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

// Route::get('/about', 'AboutController@index');
//ROute::get('/corona', 'CoronaController@index');
Route::get('/services',);
Route::get('/services', 'ServicesController@index');
Route::get('/photography', 'ServicesController@photo');
Route::get('/planning', 'ServicesController@plan');
Route::get('/venue', 'ServicesController@venue');
Route::get('/catering', 'ServicesController@catering');
Route::get('/cars', 'ServicesController@cars');

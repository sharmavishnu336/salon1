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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'App\Http\Controllers\UserController@home');
Route::get('login', 'App\Http\Controllers\UserController@login')->name('login');
Route::post('login', 'App\Http\Controllers\UserController@login')->name('login');
Route::get('logout', 'App\Http\Controllers\UserController@logout')->name('logout');
Route::group(['middleware' => 'redirect'], function () {
    Route::get('dashboard', 'App\Http\Controllers\UserController@dashboard')->name('dashboard');
    Route::get('bookservice/{id}', 'App\Http\Controllers\UserController@bookservice')->name('bookservice');
    Route::post('bookservice-service', 'App\Http\Controllers\UserController@book')->name('bookservice.service');
    Route::get('booking.list', 'App\Http\Controllers\UserController@booklist')->name('booking.list');

});

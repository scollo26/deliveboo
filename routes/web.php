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

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::middleware('auth')
    ->namespace('Admin') 
    ->prefix('admin') 
    ->name('admin.')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('orders', 'OrderController');
        Route::resource('plates', 'PlateController');
        Route::resource('users', 'UserController');
    });

Route::get('{any?}', function ($name = null) {
    return view('guest.welcome');
})->where('any', '.*');
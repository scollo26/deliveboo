<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('search', 'Api\RestaurantController@search');
Route::get('restaurant/{slug}', 'Api\RestaurantController@show');
Route::get('v1/categories', 'Api\CategoryController@index');
Route::get('v1/users/random', 'Api\RestaurantController@RandomRestaurant');
Route::post('/guest', 'Api\GuestController@store');
Route::namespace("Api")
    ->group(function () {
        Route::post('/success', 'ContactController@store');
    });

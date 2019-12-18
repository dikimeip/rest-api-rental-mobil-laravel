<?php

use Illuminate\Http\Request;

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

Route::get('/client','ClientController@index');
Route::post('/client','ClientController@store');
Route::post('/client/edit','ClientController@update');
Route::post('/client/delete','ClientController@destroy');
Route::get('/admin','AdminController@index');
Route::post('/admin','AdminController@store');
Route::post('/admin/edit','AdminController@update');




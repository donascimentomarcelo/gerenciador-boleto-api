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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
    Route::resource('users', 'UserController');
    Route::post('users/delete', 'UserController@delete');

    Route::post('uploads/store', 'UploadController@store');
    Route::post('uploads/destroy', 'UploadController@destroy');
//});

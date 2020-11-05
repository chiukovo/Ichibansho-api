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

Route::get('getUserData', 'App\Http\Controllers\WebAuthController@getUserData');

Route::group(['prefix' => 'web'], function () {
    Route::post('login', 'App\Http\Controllers\WebAuthController@login');
    Route::post('logout', 'App\Http\Controllers\WebAuthController@logout');
});
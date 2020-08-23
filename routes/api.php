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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::get('/link', function () {
    Artisan::call('storage:link');
});

Route::prefix('users')->group(function () {
    Route::post('register','Api\v1\RegisterController@register');
    Route::post('login', 'Api\v1\LoginController@login');
});

Route::middleware('auth:api')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('myProfile','Api\v1\UserController@myProfile');
        Route::get('myPosts','Api\v1\UserController@myPosts');
        Route::get('all','Api\v1\UserController@index');
        Route::post('post','Api\v1\PostsController@store');
    });
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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
    Route::get('fcm','Api\v1\FCMController@sendNotification');
    Route::post('register','Api\v1\RegisterController@register');
    Route::post('login', 'Api\v1\LoginController@login');
    Route::post('verifyOtp','Api\v1\VerifyOtpController@RegisterVerify');
    Route::post('resetPasswordRequest', 'Api\v1\LoginController@resetPasswordRequest');
    Route::post('resetPassword', 'Api\v1\LoginController@resetPassword');
});

Route::middleware('auth:api')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('one','Api\v1\MyController@one');
        Route::get('two','Api\v1\MyController@two');
        Route::get('myProfile','Api\v1\UserController@myProfile');
        Route::get('userProfile','Api\v1\UserController@userProfile');
        Route::get('myPosts','Api\v1\UserController@myPosts');
        Route::get('userPosts','Api\v1\UserController@userPosts');
        Route::get('all','Api\v1\UserController@index');
        Route::get('search','Api\v1\SearchController@search');
        Route::get('get','Api\v1\PostsController@get');
        Route::get('post/comments','Api\v1\CommentController@getComment');
        Route::get('notifications','Api\v1\NotificationController@getNotifications');
        Route::get('header','Api\v1\HeaderController@header');
        Route::get('post/{id}','Api\v1\PostsController@getPostById');



        Route::post('post','Api\v1\PostsController@store');
        Route::post('like','Api\v1\LikeController@postLike');
        Route::post('follow','Api\v1\FollowController@follow');
        Route::post('changeProfilePicture','Api\v1\UserController@changeProfilePicture');
        Route::post('post/comments','Api\v1\CommentController@comment');


        Route::delete('post/comments','Api\v1\CommentController@deleteComment');
    });
});


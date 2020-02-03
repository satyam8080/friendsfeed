<?php

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
    return view('index');
});

Route::get('/test',function() {
	return view('index');
});
/*Route::get('/profile',function() { 
	return view('pages/profile');
});*/

Route::get('/selectusername','Controller\UserController@getUserName' )->name('selectusername');
Route::get('/selectusernamedefault','Controller\UserController@createUserNameDefault' );
Route::post('/acceptuser','Controller\UserController@acceptUser' );
Route::post('/post','Controller\PostController@store' );
Route::get('/search','Controller\UserController@search' )->name('search');
Route::get('/profile','Controller\UserController@self_post' );

Route::get('/searchadv', function () {
    return view('pages/search');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/qq', 'Controller\UserController@qq');
 



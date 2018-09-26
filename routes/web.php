<?php

use Illuminate\Http\Request;

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

Route::get('/', 'PagesController@index')->name('welcome');


Route::post('/signup', 'UserController@postSignUp')->name('signup');
Route::post('/signin', 'UserController@postSignIn')->name('signin');
Route::get('/logout', 'UserController@getLogout')->name('logout');

Route::get('/account', 'UserController@getAccount')->name('account');
Route::post('/updateaccount', 'UserController@postSaveAccount')->name('account.save');
Route::get('/userimage/{filename}', 'UserController@getUserImage')->name('account.image');

Route::get('/dashboard', 'PostController@getDashboard')->name('dashboard')->middleware('auth');


Route::post('/createpost', 'PostController@postCreatePost')->name('post.create')->middleware('auth');
Route::get('/post-delete/{id}', 'PostController@getDeletePost')->name('post.delete')->middleware('auth');

Route::post('/edit', 'PostController@postEditPost')->name('edit');

Route::post('/like', 'PostController@postLIkePost')->name('like');
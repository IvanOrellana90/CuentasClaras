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

Route::get('login/google', 'LoginController@redirectToProvider')->name('googleLogin');;
Route::get('login/google/callback', 'LoginController@handleProviderCallback');

Route::get('/', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::post('/verificarInicioSesion', 'LoginController@validateLogin')->name('validateLogin');

Route::get('/welcome', 'PagesController@welcome')->name('welcome')->middleware('auth');
Route::get('/bills', 'PagesController@bills')->name('bills')->middleware('auth');

/*Group*/
Route::get('/groups', 'GroupController@groups')->name('groups')->middleware('auth');
Route::get('/group/{id}', 'GroupController@group')->name('group')->middleware('auth');
Route::post('/group/store', 'GroupController@store')->name('group.store')->middleware('auth');
Route::get('/group/update', 'GroupController@update')->name('group.update')->middleware('auth');
Route::get('/group/destroy', 'GroupController@destroy')->name('group.destroy')->middleware('auth');

/*User*/
Route::get('/users', 'UserController@users')->name('users')->middleware('auth');
Route::get('/user/{id}', 'UserController@user')->name('user')->middleware('auth');
Route::post('/user/store', 'UserController@store')->name('user.store');
Route::get('/user/update/{id}', 'UserController@update')->name('user.update')->middleware('auth');
Route::get('/user/destroy/{id}', 'UserController@destroy')->name('user.destroy')->middleware('auth');
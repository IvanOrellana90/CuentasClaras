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

Route::get('/home', 'PagesController@home')->name('home')->middleware('auth');

// JSON ROUTES

Route::get('/findGroupUsers','AjaxController@findGroupUsers');
Route::get('/getGastosMensuales','AjaxController@getGastosMensuales');

// LOGIN

Route::get('/', 'AuthController@login')->name('inicio');
Route::get('/validate/login', 'AuthController@validateLogin')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');

// USERS ROUTES

Route::get('/users', 'UserController@users')->name('users')->middleware('auth');
Route::get('/user/{id}', 'UserController@user')->name('user')->middleware('auth');
Route::post('/user/store', 'UserController@store')->name('user.store');

// GROUPS ROUTES

Route::get('/groups', 'GroupController@groups')->name('groups')->middleware('auth');
Route::get('/group/{id}', 'GroupController@group')->name('group')->middleware('auth');
Route::post('/group/store', 'GroupController@store')->name('group.store')->middleware('auth');
Route::get('/group/destroy/{id}', 'GroupController@destroy')->name('group.destroy')->middleware('auth');

// TICKETS ROUTES

Route::get('/tickets', 'TicketController@tickets')->name('tickets')->middleware('auth');
Route::get('/ticket/{id}', 'TicketController@ticket')->name('ticket')->middleware('auth');
Route::post('/ticket/store', 'TicketController@store')->name('ticket.store')->middleware('auth');
Route::get('/ticket/destroy/{id}', 'TicketController@destroy')->name('ticket.destroy')->middleware('auth');
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


Route::get('/login','UserController@login');
Route::post('/login','UserController@authenticate');

Route::get('/create','UserController@createUser');
Route::post('/create','UserController@storeUser');


Route::get('/user/{id}/proyectos','UserController@projects');
Route::get('/user/proyectos','UserController@getData');

Route::get('/user/{id}/edit','UserController@getInfo');
Route::post('/user/{id}/edit','UserController@update');


Route::get('/logout','UserController@logout');



//---------------------------------------------------------------------

Route::get('/user/{id}/project/create','GameController@create');
Route::get('/user/{id}/project/create','GameController@storeGame');


Route::get('/', function () {
    return view('welcome');
});

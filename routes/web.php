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
Route::get('/create','UserController@create');
Route::post('/create','UserController@store');


Route::get('/user','UserController@projects');
Route::get('/user/proyectos','UserController@getData');

Route::get('/user/{id}/edit','UserController@getInfo');
Route::post('/user/{id}/edit','UserController@update');

Route::get('/user/{id}/proyectos','UserController@getProyectos');
Route::post('/user/{id}/proyectos', 'UserController@storeGame');




Route::get('/user/{user}/proyecto/edit/{project}','UserController@getInfo');


//---------------------------------------------------------------------

Route::get('/game/create','GameController@create');
Route::post('/game/create','GameController@store');
Route::get('/game/{game}','GameController@create');
Route::get('/game/{game}/edit','GameController@create');



Route::get('/', function () {
    return view('welcome');
});

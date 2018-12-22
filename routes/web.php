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


Route::get('/user/{id}/proyectos','GameController@projects');
Route::get('/user/proyectos/{id}','GameController@getData');

Route::get('/user/{id}/edit/{usuario}','UserController@getInfo');
Route::post('/user/{id}/edit/{usuario}','UserController@update');


Route::get('/user/{id}/usuarios','UserController@getUsersView');
Route::get('/users','UserController@getUsers');

Route::get('/game/{id}', 'GameController@getGamesView');


Route::get('/user/{id}/proyectos/create','GameController@create');
Route::post('/user/{id}/proyectos/create', 'GameController@storeGame');

Route::get('/user/{id}/proyecto/{game}/edit', 'GameController@getInfo');
Route::post('/user/{id}/proyecto/{game}/edit', 'GameController@editGame');

Route::post('/user/{id}/delete','UserController@deleteUser');


Route::get('/logout','UserController@logout');



//---------------------------------------------------------------------




Route::get('/', function () {
    return view('welcome');
});

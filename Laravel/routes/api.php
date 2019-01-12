<?php

use Illuminate\Http\Request;

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

Route::post('login', 'ApiController@login');
Route::post('search', 'ApiController@search');
Route::post('gameImages', 'ApiController@gameImages');
Route::post('gameTags', 'ApiController@gameTags');

Route::get('catalogue', 'ApiController@catalogue');


Route::group(['middleware' => 'auth:api'], function(){
  Route::post('details', 'ApiController@details');

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
*/

});

<?php

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

Route::post('login', 'AuthenticateController@login');
Route::post('logout', 'AuthenticateController@logout');
Route::post('refresh', 'AuthenticateController@refresh');

Route::resource('users', 'UsersController', ['except' => [
    'create', 'edit',
]]);

Route::resource('articles', 'ArticlesController', ['except' => [
    'create', 'edit',
]]);

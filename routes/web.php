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

Route::get('/login', 'LoginController@index');

Route::get('/index', ['as'=>'console','uses'=>'ConsoleController@index']);

Route::get('/resident',['as'=>'resident','uses'=>'ResidentController@index']);

Route::post('/resident/add',['as'=>'add_resident','uses'=>'ResidentController@add_resident']);
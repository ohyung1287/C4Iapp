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

Route::get('/login', ['as'=>'login_page','uses'=>'LoginController@index']);
Route::post('/login/login', ['as'=>'login','uses'=>'LoginController@login']);

Route::get('/index', ['as'=>'console','uses'=>'ConsoleController@index']);

Route::get('/resident',['as'=>'resident','uses'=>'ResidentController@index']);
Route::get('/room',['as'=>'room','uses'=>'ResidentController@room']);

Route::post('/resident/add/resident',['as'=>'add_resident','uses'=>'ResidentController@add_resident']);
Route::post('/resident/add/room',['as'=>'add_room','uses'=>'ResidentController@add_room']);
Route::post('/resident/update',['as'=>'update_resident','uses'=>'ResidentController@update_resident']);

Route::get('/package',['as'=>'package','uses'=>'PackageController@index']);
<<<<<<< HEAD
=======

//Dorothy Hao
Route::get('/visitor',['as'=>'visitor','uses'=>'VisitorController@index']);
Route::post('/visitor/add/visitor',['as'=>'addVisitor','uses'=>'VisitorController@addVisitor']);
Route::post('/visitor/search/visitor',['as'=>'searchVisitor','uses'=>'VisitorController@searchVisitor']);
<<<<<<< HEAD

Route::get('repair','pageController@getRepair');
Route::get('services','PostsController@services');
Route::resource('posts','PostsController');
>>>>>>> Ray1105
=======
>>>>>>> parent of e857fd4... save

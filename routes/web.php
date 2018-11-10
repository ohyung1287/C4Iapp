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
//Route::get('/package/{pack_id?}',['as'=>'package','uses'=>'PackageController@edit_package']);
use App\Packages;
Route::get('/package/{pask_id?}',function($pack_id){
    $pack = Packages::where('id',$pack_id)->get();
    return Response::json($pack);
});
Route::post('/package/add',['as'=>'add_package','uses'=>'PackageController@add_package']);
Route::post('/package/remove',['as'=>'remove_package','uses'=>'PackageController@remove_package']);
Route::post('/package/update',['as'=>'update_package','uses'=>'PackageController@update_package']);

Route::get('/visitor',['as'=>'visitor','uses'=>'VisitorController@index']);
Route::post('/visitor/add/visitor',['as'=>'addVisitor','uses'=>'VisitorController@addVisitor']);
Route::post('/visitor/search/visitor',['as'=>'searchVisitor','uses'=>'VisitorController@searchVisitor']);


Route::get('repair','pageController@getRepair');
Route::get('services','PostsController@services');
Route::resource('posts','PostsController');

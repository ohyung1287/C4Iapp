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
Route::post('/resident/update/resident',['as'=>'update_resident','uses'=>'ResidentController@update_resident']);
Route::post('/resident/update/room',['as'=>'update_room','uses'=>'ResidentController@update_room']);
Route::get('/resident/delete/resident',['as'=>'delete_resident','uses'=>'ResidentController@delete_resident']);
Route::get('/resident/delete/room',['as'=>'delete_room','uses'=>'ResidentController@delete_room']);

Route::get('/package',['as'=>'package','uses'=>'PackageController@index']);

//Dorothy Hao
Route::get('/visitor',['as'=>'visitor','uses'=>'VisitorController@index']);
Route::post('/visitor/add/visitor',['as'=>'addVisitor','uses'=>'VisitorController@addVisitor']);
Route::post('/visitor/search/visitor',['as'=>'searchVisitor','uses'=>'VisitorController@searchVisitor']);

//Valerie - Announcement & Booking
Route::get('/announcement',['as'=>'announcement','uses'=>'AnnouncementController@index']);
Route::post('/announcement/add/announcement',['as'=>'add_announcement','uses'=>'AnnouncementController@add_announcement']);
Route::post('/announcement/update/announcement',['as'=>'update_announcement','uses'=>'AnnouncementController@update_announcement']);
Route::get('/announcement/delete/announcement',['as'=>'delete_announcement','uses'=>'AnnouncementController@delete_announcement']);

Route::get('/facility_booking',['as'=>'facility_booking','uses'=>'FacilityBookingController@index']);
Route::post('/facility_booking/add/facility_booking',['as'=>'add_facility_booking','uses'=>'FacilityBookingController@add_facility_booking']);
Route::post('/facility_booking/update/facility_booking',['as'=>'update_facility_booking','uses'=>'FacilityBookingController@update_facility_booking']);
Route::get('/facility_booking/delete/facility_booking',['as'=> 'delete_facility_booking','uses'=>'FacilityBookingController@delete_facility_booking']);
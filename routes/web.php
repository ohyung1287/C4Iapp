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


Route::get('/userinterface', ['as'=>'ui','uses'=>'ConsoleController@ui']);

Route::get('/resident',['as'=>'resident','uses'=>'ResidentController@index']);
Route::get('/room',['as'=>'room','uses'=>'ResidentController@room']);
/*Resident & Room*/
Route::post('/resident/add/resident',['as'=>'add_resident','uses'=>'ResidentController@add_resident']);
Route::post('/resident/add/room',['as'=>'add_room','uses'=>'ResidentController@add_room']);
Route::post('/resident/update',['as'=>'update_resident','uses'=>'ResidentController@update_resident']);
Route::post('/resident/update/resident',['as'=>'update_resident','uses'=>'ResidentController@update_resident']);
Route::post('/resident/update/room',['as'=>'update_room','uses'=>'ResidentController@update_room']);
Route::get('/resident/delete/resident',['as'=>'delete_resident','uses'=>'ResidentController@delete_resident']);
Route::get('/resident/delete/room',['as'=>'delete_room','uses'=>'ResidentController@delete_room']);
Route::get('/resident/mail',['as'=>'verifymail','uses'=>'ResidentController@registration_email']);
Route::get('register/{id}/{token}','ResidentController@user_registration')->name('register');

/*Resident & Room*/
Route::get('/package',['as'=>'package','uses'=>'PackageController@index']);
//Route::get('/package/{pack_id?}',['as'=>'package','uses'=>'PackageController@edit_package']);
use App\Packages;
Route::get('/package/{pask_id?}',function($pack_id){
    $pack = Packages::where('id',$pack_id)->get();
    return Response::json($pack);
});

Route::get('/package/{id}/{packid}','PackageController@pack_confirm')->name('packconfirmed');
Route::post('/package/add',['as'=>'add_package','uses'=>'PackageController@add_package']);
Route::post('/package/remove',['as'=>'remove_package','uses'=>'PackageController@remove_package']);
Route::post('/package/update',['as'=>'update_package','uses'=>'PackageController@update_package']);

Route::get('/visitor',['as'=>'visitor','uses'=>'VisitorController@index']);
Route::post('/visitor/add/visitor',['as'=>'addVisitor','uses'=>'VisitorController@addVisitor']);
Route::post('/visitor/search/visitor',['as'=>'searchVisitor','uses'=>'VisitorController@searchVisitor']);

Route::get('repair','pageController@getRepair');
Route::get('services','PostsController@services');
Route::resource('posts','PostsController');


Route::get('/LostFoundTopics',['as'=>'LostFoundTopics','uses'=>'LostFoundController@index']);
Route::post('/LostFoundTopics/add',['as'=>'add_topic','uses'=>'LostFoundController@add_topic']);

Route::get('/LostFoundTopics/{id}',['as'=>'LostFoundReplys','uses'=>'LostFoundController@index_reply']);
Route::post('/LostFoundTopics/{id}/reply',['as'=>'reply','uses'=>'LostFoundController@add_reply']);


//Valerie - Announcement & Booking
Route::get('/announcement',['as'=>'announcement','uses'=>'AnnouncementController@index']);
Route::post('/announcement/add/announcement',['as'=>'add_announcement','uses'=>'AnnouncementController@add_announcement']);
Route::post('/announcement/update/announcement',['as'=>'update_announcement','uses'=>'AnnouncementController@update_announcement']);
Route::get('/announcement/delete/announcement',['as'=>'delete_announcement','uses'=>'AnnouncementController@delete_announcement']);

Route::get('/facility_booking',['as'=>'facility_booking','uses'=>'FacilityBookingController@index']);
Route::post('/facility_booking/add/facility_booking',['as'=>'add_facility_booking','uses'=>'FacilityBookingController@add_facility_booking']);
Route::post('/facility_booking/update/facility_booking',['as'=>'update_facility_booking','uses'=>'FacilityBookingController@update_facility_booking']);
Route::get('/facility_booking/delete/facility_booking',['as'=> 'delete_facility_booking','uses'=>'FacilityBookingController@delete_facility_booking']);

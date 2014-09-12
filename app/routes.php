<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
header('Access-Control-Allow-Origin: *');  

Route::get('/', 'HomeController@getHomeStoreSelector');


Route::get('{storeno?}', 				array('uses' => 'HomeController@getIndex'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/calendar', 		array('uses' => 'CalendarController@getIndex'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/photos',	 		array('uses' => 'PhotoController@getIndex'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/staff', 			array('uses' => 'StaffController@getIndex'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/flyer', 			array('uses' => 'FlyerController@getIndex'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/jumpstart', 		array('uses' => 'JumpstartController@getIndex'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/flyer-int', 		array('uses' => 'FlyerController@getInteractiveFlyer'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/cash', 			array('uses' => 'CashController@getIndex'))->where('storeno', '[0-9]+');


//LANDSCAPE ROUTES
Route::get('{storeno?}/ls', 		 	array('uses' => 'HomeController@getIndexLandScape'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/ls/calendar', 	array('uses' => 'CalendarController@getIndexLandScape'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/ls/photos', 		array('uses' => 'PhotoController@getIndexLandScape'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/ls/staff', 		array('uses' => 'StaffController@getIndexLandScape'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/ls/flyer', 		array('uses' => 'FlyerController@getIndexLandScape'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/ls/jumpstart', 	array('uses' => 'JumpstartController@getIndexLandScape'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/ls/flyer-int', 	array('uses' => 'FlyerController@getInteractiveFlyerLandScape'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/ls/cash', 		array('uses' => 'CashController@getIndexLandScape'))->where('storeno', '[0-9]+');




Route::when('admin*', 'auth');

Route::get('/admin', 'AdminController@getIndex');
Route::get('/admin/staff', 'AdminController@getStaff');
Route::get('/admin/staff/add', 'AdminController@addStaff');
Route::get('/admin/staff/edit/{id?}', 'AdminController@editStaff');
Route::get('/admin/staff/delete/{id?}', 'AdminController@removeStaff');
Route::post('/admin/staff/saveedit', 'AdminController@saveStaffEdit');
Route::post('/admin/staff/saveadd', 'AdminController@saveStaffAdd');

Route::get('/admin/calendar', 'AdminController@getCalendar');
Route::get('/admin/calendar/add', 'AdminController@addEvent');
Route::post('/admin/calendar/savenew', 'AdminController@saveAddEvent');
Route::get('/admin/calendar/delete/{id?}', 'AdminController@removeEvent');
Route::get('/admin/calendar/edit/{id?}', 'AdminController@editEvent');
Route::post('/admin/calendar/saveedit', 'AdminController@saveEditEvent');

Route::get('/admin/flyer', 'AdminController@getFlyer');
Route::get('/admin/flyer/upload', 'AdminController@addFlyer');
Route::post('/admin/flyer/savenew', 'AdminController@saveAddFlyer');
Route::get('/admin/flyer/edit/{id?}', 'AdminController@editFlyer');
Route::post('/admin/flyer/savedit', 'AdminController@saveEditFlyer');
Route::get('/admin/flyer/delete/{id?}', 'AdminController@removeFlyer');
Route::get('/admin/flyer/deletepick/{id?}', 'AdminController@removePick');
Route::get('/admin/flyer/pickupload', 'AdminController@addPick');
Route::post('/admin/flyer/savepick', 'AdminController@saveAddPick');

Route::get('/admin/photos', 'AdminController@getPhotos');
Route::get('/admin/photos/upload', 'AdminController@addPhotos');
Route::post('/admin/photos/savenew', 'AdminController@saveAddPhoto');
Route::get('/admin/photos/edit/{id?}', 'AdminController@editPhotos');
Route::get('/admin/photos/delete/{id?}', 'AdminController@removePhotos');
Route::post('/admin/photos/saveedit/{id?}', 'AdminController@saveEditPhoto');

Route::get('/admin/feature', 'AdminController@getFeature');
Route::get('/admin/feature/add', 'AdminController@addFeature');
Route::get('/admin/feature/edit/{id?}', 'AdminController@editFeature');
Route::get('/admin/feature/delete/{id?}', 'AdminController@removeFeature');
Route::post('/admin/feature/savedit', 'AdminController@saveEditFeature');
Route::post('/admin/feature/saveadd', 'AdminController@saveAddFeature');

Route::get('/admin/jumpstart', 'AdminController@getJumpstart');
Route::get('/admin/jumpstart/add', 'AdminController@addJumpstart');
Route::get('/admin/jumpstart/edit/{id?}', 'AdminController@editJumpstart');
Route::get('/admin/jumpstart/delete/{id?}', 'AdminController@removeJumpstart');
Route::post('/admin/jumpstart/savedit', 'AdminController@saveEditJumpstart');
Route::post('/admin/jumpstart/saveadd', 'AdminController@saveAddJumpstart');


/*API ROUTES*/
Route::get('/api', 'ApiController@getIndex');
Route::get('/api/home', 'HomeController@getFeaturedData');
Route::get('/api/calendar', 'CalendarController@getCalData');
Route::get('/api/calendar-raw', 'CalendarController@getCalRaw');
Route::get('/api/staff', 'StaffController@getStaffData');
Route::get('/api/photos', 'PhotoController@getPhotoData');
Route::get('/api/flyer', 'FlyerController@getFlyerData');

//

// user/authentication routes

Route::post('users', 'UsersController@store');
Route::get('users/create', 'UsersController@create');

Route::get('/login', 'UsersController@login');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');

Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
//Route::get('users/logout', 'UsersController@logout');
Route::get('/logout', 'UsersController@logout');

// Dashboard route 
Route::get('admin/dashboard', function(){ return View::make('admin.dashboard'); });



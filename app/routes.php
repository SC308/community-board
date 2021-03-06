<?php
/*
 | 1. Before you start with this create a file in your logs folder (eg : 'query.log') and grant laravel write access to it.
 | 2. Place the snippet in your '/app/start/local.php' file. (or routes.php or anywhere...)
 | 3. Access artisan from your console and type this -
 |    $ php artisan tail --path="app/storage/logs/query.log" (better use full path)
*/ 

$path = storage_path().'/logs/query.log';

App::before(function($request) use($path) {
    $start = PHP_EOL.'=| '.$request->method().' '.$request->path().' |='.PHP_EOL;
  File::append($path, $start);
});

Event::listen('illuminate.query', function($sql, $bindings, $time) use($path) {
    // Uncomment this if you want to include bindings to queries
    //$sql = str_replace(array('%', '?'), array('%%', '%s'), $sql);
    //$sql = vsprintf($sql, $bindings);
    $time_now = (new DateTime)->format('Y-m-d H:i:s');;
    $log = $time_now.' | '.$sql.' | '.$time.'ms'.PHP_EOL;
  File::append($path, $log);
});
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
Route::get('{storeno?}/activity', 		array('uses' => 'KioskController@getIndex'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/activity/{sportid?}', array('uses' => 'KioskController@viewSport'))->where('storeno', '[0-9]+')->where('sportid', '[0-9]+');
Route::get('{storeno?}/cash', 			array('uses' => 'CashController@getIndex'))->where('storeno', '[0-9]+');



//LANDSCAPE ROUTES
Route::get('{storeno?}/ls', 		 	array('uses' => 'HomeController@getIndexLandScape'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/ls/calendar', 	array('uses' => 'CalendarController@getIndexLandScape'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/ls/photos', 		array('uses' => 'PhotoController@getIndexLandScape'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/ls/staff', 		array('uses' => 'StaffController@getIndexLandScape'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/ls/flyer', 		array('uses' => 'FlyerController@getIndexLandScape'))->where('storeno', '[0-9]+');
//Route::get('{storeno?}/ls/flyer', 		array('uses' => 'FlyerController@getIndexLandScape'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/ls/jumpstart', 	array('uses' => 'JumpstartController@getIndexLandScape'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/ls/flyer-int', 	array('uses' => 'FlyerController@getInteractiveFlyerLandScape'))->where('storeno', '[0-9]+');

Route::get('{storeno?}/ls/activity/', 		    array('uses' => 'KioskController@getIndexLandscape'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/ls/activity/{sportid?}', array('uses' => 'KioskController@viewSportLandscape'))->where('storeno', '[0-9]+')->where('sportid', '[0-9]+');

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
Route::post('/admin/jumpstart/savedit', 'AdminController@saveEditJumpstart');

/*Activity Kiosk Routes*/
Route::get('/admin/kiosk/{storeno}',					'EventController@index')->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/event', 				'EventController@index')->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/blog', 				'BlogController@index')->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/gear', 				array('before' => 'admin', 'uses' => 'GearController@index'))->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/league', 			'LeagueController@index')->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/location', 			'LocationController@index')->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/sport', 				'SportController@index')->where('storeno', '[0-9]+');

Route::get('/admin/kiosk/{storeno}/event/create', 		'EventController@create')->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/blog/create', 		'BlogController@create')->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/gear/create', 		array('before' => 'admin', 'uses' => 'GearController@create'))->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/league/create', 	 	'LeagueController@create')->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/location/create', 	'LocationController@create')->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/sport/create', 		'SportController@create')->where('storeno', '[0-9]+');

Route::get('/admin/kiosk/{storeno}/event/{id}', 		'EventController@show')->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/blog/{id}', 			'BlogController@show')->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/gear/{id}', 			array('before' => 'admin', 'uses' => 'GearController@show'))->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/league/{id}', 		'LeagueController@show')->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/location/{id}', 		'LocationController@show')->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/sport/{id}', 		'SportController@show')->where('storeno', '[0-9]+');

Route::get('/admin/kiosk/{storeno}/event/{id}/edit', 	'EventController@edit')->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/blog/{id}/edit', 	'BlogController@edit')->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/gear/{id}/edit', 	array('before' => 'admin', 'uses' => 'GearController@edit'))->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/league/{id}/edit', 	'LeagueController@edit')->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/location/{id}/edit', 'LocationController@edit')->where('storeno', '[0-9]+');
Route::get('/admin/kiosk/{storeno}/sport/{id}/edit', 	'SportController@edit')->where('storeno', '[0-9]+');

Route::patch('/admin/kiosk/{storeno}/event/{id}', 		array( 'as'=>'event.update', 'uses'=> 'EventController@update'));
Route::patch('/admin/kiosk/{storeno}/blog/{id}',  		array( 'as'=>'blog.update' , 'uses'=> 'BlogController@update'));
Route::patch('/admin/kiosk/{storeno}/gear/{id}',  		array( 'as'=>'gear.update' , 'uses'=> 'GearController@update'));
Route::patch('/admin/kiosk/{storeno}/league/{id}',  	array( 'as'=>'league.update' , 'uses'=> 'LeagueController@update'));
Route::patch('/admin/kiosk/{storeno}/location/{id}',  	array( 'as'=>'location.update' , 'uses'=> 'LocationController@update'));
Route::patch('/admin/kiosk/{storeno}/sport/{id}', 		array( 'as'=>'sport.update' , 'uses'=> 'SportController@update'));

Route::post('/admin/kiosk/{storeno}/event', 			array( 'as'=>'event.store', 'uses'=> 'EventController@store'));
Route::post('/admin/kiosk/{storeno}/blog',  			array( 'as'=>'blog.store' , 'uses'=> 'BlogController@store'));
Route::post('/admin/kiosk/{storeno}/gear',  			array( 'as'=>'gear.store' , 'uses'=> 'GearController@store'));
Route::post('/admin/kiosk/{storeno}/league',  			array( 'as'=>'league.store' , 'uses'=> 'LeagueController@store'));
Route::post('/admin/kiosk/{storeno}/location',  		array( 'as'=>'location.store' , 'uses'=> 'LocationController@store'));
Route::post('/admin/kiosk/{storeno}/sport',  			array( 'as'=>'sport.store' , 'uses'=> 'SportController@store'));


Route::delete('/admin/kiosk/{storeno}/event/{id}', 		array( 'as'=>'event.delete', 'uses'=> 'EventController@destroy'));
Route::delete('/admin/kiosk/{storeno}/blog/{id}',  		array( 'as'=>'blog.delete' , 'uses'=> 'BlogController@destroy'));
Route::delete('/admin/kiosk/{storeno}/gear/{id}',  		array( 'as'=>'gear.delete' , 'uses'=> 'GearController@destroy'));
Route::delete('/admin/kiosk/{storeno}/league/{id}',  	array( 'as'=>'league.delete' , 'uses'=> 'LeagueController@destroy'));
Route::delete('/admin/kiosk/{storeno}/location/{id}',  	array( 'as'=>'location.delete' , 'uses'=> 'LocationController@destroy'));
Route::delete('/admin/kiosk/{storeno}/sport/{id}',  	array( 'as'=>'sport.delete' , 'uses'=> 'SportController@destroy'));

/*API ROUTES*/

Route::get('{storeno?}/api', 'ApiController@getIndex');
Route::get('{storeno?}/api/home', 			array('uses' => 'HomeController@getFeaturedData'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/api/calendar', 		array('uses' => 'CalendarController@getAPI'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/api/calendar-raw',	array('uses' => 'CalendarController@getCalRaw'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/api/staff',  		array('uses' => 'StaffController@getStaffData'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/api/photos', 		array('uses' => 'PhotoController@getPhotoData'))->where('storeno', '[0-9]+');

Route::get('{storeno?}/api/sports', 		array('uses' => 'KioskController@getActiveSports'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/api/blogs/{sport?}', array('uses' => 'BlogController@getBlogs'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/api/events/{sport?}',array('uses' => 'EventController@getEvents'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/api/gears/{sport?}', array('uses' => 'GearController@getGears'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/api/leagues/{sport?}',array('uses' => 'LeagueController@getLeagues'))->where('storeno', '[0-9]+');
Route::get('{storeno?}/api/locations/{sport?}', array('uses' => 'LocationController@getLocations'))->where('storeno', '[0-9]+');



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


/*Thumbnail routes*/
// Route::get('photo/thumb', 'UtilityController@createPhotoThumbnails');
// Route::get('staff/thumb', 'UtilityController@createStaffThumbnails');
// Route::get('flyer/thumb', 'UtilityController@createFlyerThumbnails');
// Route::get('feature/thumb', 'UtilityController@createFeatureThumbnails');
// Route::get('toppick/thumb', 'UtilityController@createToppickThumbnails');
// Route::get('jumpstart/thumb', 'UtilityController@createJumpstartThumbnails');

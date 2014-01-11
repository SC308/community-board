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

Route::get('/', function()
{
	return View::make('home');
});

// Route::get('/calendar', function()
// {
//     return View::make('calendar');
// });

Route::get('/calendar', 'CalendarController@getIndex');
Route::get('/photos', 'PhotoController@getIndex');
Route::get('/staff', 'StaffController@getIndex');
Route::get('/staff/{id?}', array('uses' => 'StaffController@view'))->where('id', '[0-9]+');
Route::get('/flyer', 'FlyerController@getIndex');



Route::get('/flyer', function()
{
    return View::make('flyer');
});
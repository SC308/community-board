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

Route::get('calendar', 'CalendarController@getIndex');

Route::get('/photos', function()
{
    return View::make('photos');
});

Route::get('/staff', function()
{
    return View::make('staff');
});

Route::get('/flyer', function()
{
    return View::make('flyer');
});
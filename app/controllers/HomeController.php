<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		$feature = Feature::all();
		
        $flyer = DB::table('flyers')
                ->orderBy('order', 'asc')
                ->take(1)
                ->get();
                
        $toppicks = DB::table('top_picks')
                ->orderBy('id', 'asc')
                ->get();      
                  	
		return View::make('home')
			->with('feature', $feature)
			->with('flyer', $flyer)
			->with('toppicks', $toppicks);			
	}

}
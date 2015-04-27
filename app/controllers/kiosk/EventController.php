<?php

class EventController extends \BaseController {

	private $menuItems = [];
	private $panel_name;
	private $panel_title; 

	public function __construct()
	{
		if(Auth::user()->role == 1)
		{
			$this->menuItems= array("blog", "event", "gear", "league", "location", "sport");	
		}
		else
		{
			$this->menuItems= array("event", "league", "location");
		}
		

		$this ->panel_name	= "event";

		$this->panel_title  =  "Dashboard";


	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$store_id = Store::where('store_number' , Auth::user()->store_id)->first()->id;
		
		$events = CalendarEvent::where('store_id', $store_id)->get();
		
		return View::make("kiosk/admin/dashboard/dashboard")->withTitle($this->panel_title)
												 			->withItems($this->menuItems)
												 			->withPanel($this->panel_name)
												 			->withPanelData($events);
	}





	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$sports= array();
		$allSports = Sport::all();
		foreach ($allSports as $sport) {
					$sports[$sport->id] =  $sport->name;
				}

		$stores = array();
		$allStores = Store::all();
		foreach ($allStores as $store) {
					$stores[$store->id] =  $store->store_name;
				}

		$currentStore = Store::where('store_number', Auth::user()->store_id)->first()->id;
		return View::make('kiosk/admin/forms/add/event')->withSports($sports)
														->withStores($stores)
														->withStore($currentStore);
	}





	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$validator = Validator::make(Input::all(), CalendarEvent::$rules);

		if($validator->fails())
		{
			 $messages = $validator->messages();

        	return Redirect::to('admin/kiosk/'.Auth::user()->store_id.'/event/create')
            ->withErrors($validator);
		}

		
		 $store = Store::where("store_number",Auth::user()->store_id)->first()->id;
		 $event = CalendarEvent::create(
				 	[

				 		'title'			=> Input::get('title'),
				 		'description'	=> Input::get('description'),
				 		'event_start'	=> Input::get('event_start'),
				 		'event_end'		=> Input::get('event_end'),
				 		'store_id'		=> $store,
				 		'sport_id'		=> Input::get('sport_id')

				 	]

				 );

		
		return Redirect::to('/admin/kiosk/'.Auth::user()->id.'/event/'.$event->id);
	}






	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($storeNumber,$id)
	{
		$event = CalendarEvent::find($id);
		
		$sport = Sport::where("id", $event->sport_id)->first()->name;
		
		$store = Store::where("id", $event->store_id)->first()->store_name;
		
		return View::make('kiosk/admin/dashboard/viewDashboard')->withPanel($this->panel_name)
													  	  		->withPanelData($event)
												 	  	  		->withTitle($this->panel_title)
													  	  		->withItems($this->menuItems)
													  	  		->withSport($sport)
													  	  		->withStore($store);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($storeNumber,$id)
	{
		

		$sports= array();
		$allSports = Sport::all();
		foreach ($allSports as $sport) {
					$sports[$sport->id] =  $sport->name;
				}

		$stores = array();
		$allStores = Store::all();
		foreach ($allStores as $store) {
					$stores[$store->id] =  $store->store_name;
				}
		$event= CalendarEvent::whereid($id)->first();
		$selected_sport = [$event->sport_id];
		$store = Store::where('store_number', $storeNumber)->first()->id;
		return View::make('kiosk/admin/forms/edit/event')->withevent($event)
												   ->withsports($sports)
												   ->withstores($stores)
												   ->withStore($store)
												   ->withSelectedSport($selected_sport);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($storeNumber,$id)
	{

		$validator = Validator::make(Input::all(), CalendarEvent::$rules);

		if($validator->fails())
		{
			 $messages = $validator->messages();

        	return Redirect::to('admin/kiosk/'.Auth::user()->store_id.'/event/'.$id.'/edit')
            ->withErrors($validator)
            ->withStore($id);
		}

		$store = Store::where('store_number', $storeNumber )->first()->id;
		
		$event = array();
	  	$event['title'] 	    = Input::get('title');
	  	$event['description']	= Input::get('description');
  		$event['event_start']	= Input::get('event_start');
	  	$event['event_end']		= Input::get('event_end');
	  	$event['sport_id'] 		= Input::get('sport_id');
		$event['store_id']		= $store;
	  	
	  	CalendarEvent::whereid($id)->update($event);
	  	return Redirect::to('/admin/kiosk/'.$storeNumber.'/event/'.$id)->withStore($id);;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($storeNumber,$id)
	{
		CalendarEvent::whereid($id)->delete();

	}

	public function getEvents()
	{
		return Response::json(CalendarEvent::all());
	}


}

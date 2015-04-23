<?php

class EventController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		
		if(Auth::user()->role == 1)
		{
			$menuItems= array("blog", "event", "gear", "league", "location", "sport");	
		}
		else{
			$menuItems= array("event", "league", "location");
		}
		$menuPanel=  "event";
		$store_id = Store::where('store_number' , Auth::user()->store_id)->first()->id;
		$events = CalendarEvent::where('store_id', $store_id)->get();
		return View::make("kiosk/admin/dashboard/dashboard")->withTitle("Dashboard")
												 ->withItems($menuItems)
												 ->withPanel($menuPanel)
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

		return View::make('kiosk/admin/forms/add/event')->withSports($sports)->withStores($stores);
	}





	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		 $image_string = "";
		 $store_string = "";
		 //return Input::all();

		 $image_files = Input::file('Image');
		 if($image_files[0] != null){

		 	foreach ($image_files as $image_file) {
			 	 $image_string .= $image_file->getClientOriginalName().";";
			 	 $destinationPath = public_path().'/images/content/';
				 $filename = $image_file->getClientOriginalName();
				 $uploadSuccess = $image_file->move($destinationPath, $filename);
			 }
		 }


		 $store = Store::where("store_name",Input::get("Store"))->first()->id;
		 
		 $event = CalendarEvent::create(
				 	[

				 		'title'			=> Input::get('Title'),
				 		'description'	=> Input::get('Content'),
				 		'event_start'	=> Input::get('Event_start'),
				 		'event_end'		=> Input::get('Event_end'),
				 		'store_id'		=> $store,
				 		'sport_id'		=> Input::get('Sport_name')

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
		$event_id = $id;
		$menuItems= array("blog", "event", "gear", "league", "location", "sport", "store", "map");
		$menuPanel=  "event";
		$event = CalendarEvent::whereid($id)->first();
		$sport = Sport::where("id", $event->sport_id)->first()->name;
		$store = Store::where("id", $event->store_id)->first()->store_name;
		return View::make('kiosk/admin/dashboard/viewDashboard')->withPanel("event")
													  	  ->withPanelData($event)
												 	  	  ->withTitle("Dashboard")
													  	  ->withItems($menuItems)
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
		$selected_store = [$event->store_id];
		return View::make('kiosk/admin/forms/edit/event')->withevent($event)
												   ->withsports($sports)
												   ->withstores($stores)
												   ->withSelectedStore($selected_store)
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

		$store = Store::where('store_number', $storeNumber )->first()->id;
			
		$event = array();
	  	$event['title'] 	    = Input::get('Title');
	  	$event['description']	= Input::get('Content');
  		$event['event_start']	= Input::get('Event_start');
	  	$event['event_end']		= Input::get('Event_end');
	  	$event['sport_id'] 		= Input::get('Sport_name');
		$event['store_id']		= $store;
	  	
	  	CalendarEvent::whereid($id)->update($event);
	  	return Redirect::to('/admin/kiosk/'.$storeNumber.'/event/'.$id);
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

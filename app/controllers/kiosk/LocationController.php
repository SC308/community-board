<?php

class LocationController extends \BaseController {

	

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
		$menuPanel = "location";
		$store_id  = Store::where('store_number', Auth::user()->store_id)->first()->id;
		$locations = Location::where('store_id', $store_id)->get();
		return View::make("kiosk/admin/dashboard/dashboard")->withTitle("Dashboard")
												 ->withItems($menuItems)
												 ->withPanel($menuPanel)
												 ->withPanelData($locations);
		// the following will display the map. 
		$storeLocation = Store::where('store_number', Auth::user()->id)->first();
		return View::make('kiosk/admin/dashboard/location')->withLocations($locations)
													 ->withStoreLocation($storeLocation);
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
					$sports[$sport->id]  =  $sport->name;
				}

		$stores = array();
		$allStores = Store::all();
		foreach ($allStores as $store){
			$stores [$store->id] = $store->store_name;
		}		
		return View::make('kiosk/admin/forms/add/location')->withSports($sports)
													 ->withStores($stores);

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Location::create(
		[
			'sport_id' 		=> Input::get('Sport_id'),
			'store_id' 		=> Input::get('Store'),
			'name'	   		=> Input::get('Title'),
			'description'	=> Input::get('Description'),
			'address'  		=> Input::get('Address'),
			'postal_code'	=> Input::get('PostalCode'),
			'latitude'		=> Input::get('Latitude'),
			'longitude'		=> Input::get('Longitude'),

		]);
		return Redirect::to('/location');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($storeNumber,$id)
	{
		$menuItems= array("blog", "event", "gear", "league", "location", "sport", "store", "map");
		$menuPanel=  "location";
		$location = Location::whereid($id)->first();
		$sport  = Sport::whereid($location->sport_id)->first()->name;
		$store = Store::whereid($location->store_id)->first()->store_name;
		return View::make('kiosk/admin/dashboard/viewDashboard')->withPanel("location")
													  	  ->withPanelData($location)
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

		$location = Location::whereid($id)->first();
		$allSports = Sport::all();
		foreach ($allSports as $sport) {
					$sports[$sport->id]  =  $sport->name;
				}

		$stores = array();
		$allStores = Store::all();
		foreach ($allStores as $store){
			$stores [$store->id] = $store->store_name;
		}		
		$selected_sport  = Sport::whereid($location->sport_id)->first()->id;
		$selected_store = Store::whereid($location->store_id)->first()->id;

		return View::make('kiosk/admin/forms/edit/location')->withLocation($location)
													  	  ->withSports($sports)
													  	  ->withStores($stores)
													  	  ->withSelectedSport($selected_sport)
													  	  ->withSelectedStore($selected_store);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($storeNumber,$id)
	{

	
		$location = array();
		$location["name"] 		 = Input::get('Title');
		$location["description"] = Input::get('Description');
		$location["sport_id"]    = Input::get('Sport');
		$location["store_id"]	 = Input::get('Store');
		$location["address"]	 = Input::get('Address');
		$location["postal_code"] = Input::get('PostalCode');
		$location["latitude"]	 = Input::get('Latitude');
		$location["longitude"]	 = Input::get('Longitude');

		Location::whereid($id)->update($location);
		return Redirect::to('/admin/kiosk/'.$storeNumber.'/location/'.$id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($storeNumber,$id)
	{
		Location::whereid($id)->delete();
	}

	public function getLocations()
	{
		return Response::json(Location::all());
	}

}

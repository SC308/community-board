<?php

class KioskController extends \BaseController {


	private $menuItems = [];
	private $panel_name;
	private $panel_title; 

	public function __construct()
	{
		

	}

	/**
	 * Display a listing of the resource.
	 * GET /kiosk
	 *
	 * @return Response
	 */
	public function index()
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

		$store_id = Store::where('store_number', Auth::user()->store_id )->first()->id;
		

		$events = CalendarEvent::where('store_id', $store_id)->get();

		return View::make('kiosk/admin/dashboard/dashboard')->withTitle($this->panel_title)
													  		->withItems($this->menuItems)
													  		->withPanel($this->panel_name)
													  		->withPanelData($events);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /kiosk/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /kiosk
	 *
	 * @return Response
	 */
	public function store()
	{

	}

	/**
	 * Display the specified resource.
	 * GET /kiosk/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($sn)
	{
		$storedetails = Store::getStoreDetails($sn);
		$activeSports = Sport::getActiveSports();
		$storeid = $storedetails[0]->id;
		return View::make('activity')
			->with('activesports', $activeSports)
			->with('storedetails', $storedetails);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /kiosk/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /kiosk/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /kiosk/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getSports($storeNumber)
	{
		$storedetails = Store::getStoreDetails($storeNumber);

		$filteredSports = Sport::getActiveSports();

		
		return View::make('activity')->with('storedetails', $storedetails)->withActivesports($filteredSports);

	}

	public function viewSport($storeNumber, $sport_id)
	{
		
		$storedetails = Store::getStoreDetails($storeNumber);
		$storeid = $storedetails[0]->id;

		$selectedSport = Sport::find($sport_id);


		$store_id = Store::where('store_number', $storeNumber)->first()->id;

		
		$allBlogs = Blog::where('sport_id', $sport_id)->get();
		$blogs = array();
		foreach($allBlogs as $blog)
		{
			$stores = preg_split('/;/', $blog->applicable_to_stores);
			
			if( ($blog->applicable_to_stores == "all") || ( in_array($store_id,	$stores)))
			{
				array_push($blogs, $blog);
			}

		}

		
		$events = CalendarEvent::where('sport_id', $sport_id)->where('store_id', $store_id)->get();
		
		
		$gears = Gear::where('sport_id', $sport_id)->get();

	
		$sportPieces= DB::table('kiosk_sport_detail_mappings')->where('sport_id', $sport_id)->get();
		$pieceNames = array(); 

		foreach($sportPieces as $piece)
		{
			array_push($pieceNames , SportDetail::where('id', $piece->detail_id)->first()->detail_name );	
		}
		
		$leagues = array();
		$locations = array();		
		if(in_array("League", $pieceNames))
		{
			$leagues = League::where('store_id', $store_id)->where('sport_id', $sport_id)->get();
		}
		elseif(in_array("Location", $pieceNames))
		{
			$locations = Location::where('store_id', $store_id)->where('sport_id', $sport_id)->get();
		}


		return View::make('activity-detail')
			->with('storedetails', $storedetails)
			->with('selectedSport', $selectedSport)
			->with('blogs', $blogs)
			->with('events', $events)
			->with('gears', $gears)
			->with('locations', $locations)
			->with('leagues', $leagues);


		
	}

}

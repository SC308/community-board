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
		//
	}

	/**
	 * Display the specified resource.
	 * GET /kiosk/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
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

	public function getSports()
	{
		$currentMonth = date('m');
		$sports = Sport::all();
		$filteredSports =  Array();



		foreach ($sports as $sport) {
			if($sport->season_start <= $currentMonth  || $sport->season_end >= $currentMonth)
			{
				array_push($filteredSports, $sport);
			}
		}

		return $filteredSports;
		return View::make('kiosk/sports')->withTitle("Activity Kiosk")->withSports($filteredSports);
	
	}
	public function showSport($storeNumber, $sport_id)
	{
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
		// $events = array();

		// foreach($allEvents as $event)
		// {
		// 	if($event->store_id == $store_id)
		// 	{
		// 		array_push($events, $event);
		// 	}

		// }

		
		$gears = Gear::where('sport_id', $sport_id)->get();

	
		$sportPieces= DB::table('kiosk_sport_detail_mappings')->where('sport_id', $sport_id)->get();
		$pieceNames = array();  
		foreach($sportPieces as $piece){
			array_push($pieceNames , SportDetail::where('id', $piece->detail_id)->first()->detail_name );	
		}
		
		if(in_array("League", $pieceNames))
		{
			$leagues = League::where('store_id', $store_id)->where('sport_id', $sport_id)->get();
		}
		elseif(in_array("Location", $pieceNames))
		{
			$locations = Location::where('store_id', $store_id)->where('sport_id', $sport_id)->get();

		}
		
		
		return (compact("blogs", "events", "gears", "leagues", "locations"));
	}

}
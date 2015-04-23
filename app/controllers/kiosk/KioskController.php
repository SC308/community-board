<?php

class KioskController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /kiosk
	 *
	 * @return Response
	 */
	public function index()
	{
		$store_id = Store::where('store_number', Auth::user()->store_id )->first()->id;
		if(Auth::user()->role == 1)
		{
			$menuItems= array("blog", "event", "gear", "league", "location", "sport");	
		}
		else{
			$menuItems= array("event", "league", "location");
		}
		
		$menuPanel= "event";
		$events = CalendarEvent::where('store_id', $store_id)->get();
		//dd($events);
		return View::make('kiosk/admin/dashboard/dashboard')->withTitle("Dashboard")
													  		->withItems($menuItems)
													  		->withPanel($menuPanel)
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
	public function setKiosk($sport_id)
	{
		
		$sportPieces= DB::table('sport_detail_mappings')->where('sport_id', $sport_id)->get();
		$sportDetails = Array();
		foreach($sportPieces as $piece){
			$pieceName =  SportDetail::where('detail_id', $piece->detail_id)->first()->detail_name;
			$pieceDetails = $pieceName::where('sport_id', $sport_id)->get();
			$pieceDetailsArray = [$pieceName => $pieceDetails];
			array_push($sportDetails, $pieceDetailsArray);
		}
		return $sportDetails;

	}

}
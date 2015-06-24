<?php

class SportController extends \BaseController {

	private $months = array();
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
			$this->menuItems= array("blog", "event", "league", "location", "sport");
		}
		
		$this->months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

		$this ->panel_name	= "sport";

		$this->panel_title  =  "Dashboard";


	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		
		$sort_parameter = Input::get('sort');
		$filter_store_parameter = Input::get('store');
		
		$sports = Sport::all();
		
		// if(Auth::user()->role == 0){
		// 	$sports = Content::filter($sports, Store::where('store_number', Auth::user()->store_id)->first()->id, 'store_id');
		// }

		if (isset($filter_store_parameter)) {
			$sports = Content::filter($sports, $filter_store_parameter, 'store_id');
		}

		if(isset($sort_parameter))
		{
			$sports = Content::sort($sports, $sort_parameter);		
		}
		
		$sortOptions = Sport::getSortOptions();

		$storeOptions[""] = "Filter By Store";
		$allStores = Store::all();
		foreach ($allStores as $store) {
					$storeOptions[$store->id] =  $store->store_name;
				}

		$ifUserIsNT = Auth::user()->role;
		
		return View::make("kiosk/admin/dashboard/dashboard")->withTitle($this->panel_title)
												 			->withItems($this->menuItems)
												 			->withPanel($this->panel_name)
												 			->withPanelData($sports)
												 			->withSports([])
												 			->withStores($storeOptions)
												 			->withSort($sortOptions)
												 			->withUserType($ifUserIsNT);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$sport_details = array();
		
		$raw_details = SportDetail::all();
		
		foreach($raw_details as $rd)
		{
			$sport_details[$rd->id] =  $rd->detail_name;
		}

		$stores = array();

		$allStores = Store::all();

		foreach ($allStores as $store) 
		{
			$stores[$store->id] = $store->store_name;
		}
		
		return View::make('kiosk/admin/forms/add/sport')->withdetails($sport_details)
														->withmonths($this->months)
														->withStores($stores);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$validator = Validator::make(Input::all(), Sport::$rules);

		if($validator->fails())
		{
			 $messages = $validator->messages();

        	return Redirect::to('admin/kiosk/'. Auth::user()->store_id . '/sport/create')
            ->withErrors($validator);
		}
		
		$store_string = "";
		 $stores = Input::get("stores");
		 if(in_array( "all", $stores)){
		 	$store_string = "all";
		 }
		 else{
		 	foreach ($stores as $key => $value) {
		 		$store_string .= $value.";";
		 	}
		 }



		$sport = Sport::create(
		[
			'name'			=> 	Input::get('name'),
			'season_start'	=>  Input::get('season_start'),
			'season_end'	=>  Input::get('season_end'),
			'store_id'		=>  $store_string
		]);
		
		
		$details = Input::get('details');
		foreach ($details as $detail)
		{
			
			DB::table('kiosk_sport_detail_mappings')->insert(
				array('sport_id' => $sport->id , 'detail_id' => $detail)

			);
		}
		

		
		return Redirect::to('/admin/kiosk/'.Auth::user()->store_id.'/sport/'.$sport->id);


	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($storeNumber , $id)
	{
		$sport_id = $id;
		
		$sport = Sport::find($id);

		$details= DB::table('kiosk_sport_detail_mappings')->where('sport_id', $id)->get();
		
		$detail_names = array();
		
		foreach ($details as $detail) {
			array_push($detail_names, SportDetail::find( $detail->detail_id )->detail_name);

		}
		

		if($sport->store_id == "all")
		{
			$all_stores = DB::table('stores')->lists('id');

		}
		else{
			$all_stores = preg_split('/;/', $sport->store_id, -1,  PREG_SPLIT_NO_EMPTY);
		}

		$stores = array();
		foreach($all_stores as $store){
				array_push($stores, Store::whereid($store)->first()->store_name);
		}

		return View::make('kiosk/admin/dashboard/viewDashboard')->withPanel($this->panel_name)
													  			->withPanelData($sport)
												 	  			->withTitle($this->panel_title)
													  			->withItems($this->menuItems)
													  			->withDetails($detail_names)
													  			->withStores($stores);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($storeNumber, $id)
	{
		$sport = Sport::find($id);
		
		$sport_details = array();
		$raw_details = SportDetail::all();
		foreach($raw_details as $rd){
			$sport_details[$rd->id] =  $rd->detail_name;
		}

		$season_start = [$sport->season_start];
		$season_end =	[$sport->season_end];

		$stores = array();
		$allStores = Store::all();
		foreach ($allStores as $store) {
					$stores[$store->id] = $store->store_name;
				}



		if($sport->store_id == "all"){
			$selected_stores = ["all"];	
		}
		else{
			$selected_stores = preg_split('/;/', $sport->store_id, -1,  PREG_SPLIT_NO_EMPTY);
		}

		$selected_details = DB::table('kiosk_sport_detail_mappings')->where('sport_id', $id)->lists('detail_id');
		return View::make('kiosk/admin/forms/edit/sport')->withsport("sport")
												   ->withDetails($sport_details)
												   ->withmonths($this->months)
												   ->withSport($sport)
												   ->withSelectedDetails($selected_details)
												   ->withSelectedStore($selected_stores)
												   ->withStores($stores);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($storeNumber, $id)
	{
		
		$validator = Validator::make(Input::all(), Sport::$rules);

		if($validator->fails())
		{
			 $messages = $validator->messages();

        	return Redirect::to('admin/kiosk/'. Auth::user()->store_id . '/sport/'. $id . "/edit")
            ->withErrors($validator);
		}
		
		$store_string ="";
	  	$stores = Input::get("stores");
		 if(in_array( "all", $stores)){
		 	$store_string = "all";
		 }
		 else{
		 	foreach ($stores as $key => $value) {
		 		$store_string .= $value.";";
		 	}
		 }
		
		
		$sport = array();
		
		$sport['name']			= 	Input::get('name');
		$sport['season_start']	= 	Input::get('season_start');
		$sport['season_end']	= 	Input::get('season_end');
		$sport['store_id']		=   $store_string;
		
		Sport::whereid($id)->update($sport);


		$details = Input::get('details');
		// delete and insert used inplace of update since the simple update results in duplicate entries.
		DB::table('kiosk_sport_detail_mappings')->where('sport_id', $id)->delete();
		foreach($details as $detail_id){
			DB::table('kiosk_sport_detail_mappings')->insert(['sport_id' => $id, 'detail_id' => $detail_id]);
		}

		return Redirect::to('/admin/kiosk/'.$storeNumber.'/sport/'.$id);

		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($storeNumber, $id)
	{
		$mappings = DB::table('kiosk_sport_detail_mappings')->where('sport_id', $id)->get();
		DB::table('kiosk_sport_detail_mappings')->where('sport_id', $id)->delete();
		foreach($mappings as $mapping){
			
			$detail = SportDetail::find($mapping->detail_id)->detail_name;
			$detail::where('sport_id', $id)->delete();
		}
		Sport::where('id', $id)->delete();
		
	}

	public function getSports()
	{
		return Response::json(Sport::all());
	}


}

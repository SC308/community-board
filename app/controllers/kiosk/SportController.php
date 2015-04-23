<?php

class SportController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	private $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	

	public function index()
	{
		
		if(Auth::user()->role == 1)
		{
			$menuItems= array("blog", "event", "gear", "league", "location", "sport");	
		}
		else{
			$menuItems= array("event", "league", "location");
		}
		$menuPanel =  "Sport";
		$sports = Sport::all();
		return View::make("kiosk/admin/dashboard/dashboard")->withTitle("Dashboard")
												 ->withItems($menuItems)
												 ->withPanel($menuPanel)
												 ->withPanelData($sports);
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
		foreach($raw_details as $rd){
			$sport_details[$rd->detail_id] =  $rd->detail_name;
		}
		return View::make('kiosk/admin/forms/add/sport')->withdetails($sport_details)->withmonths($this->months);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{


		$image_string = "";

		$image_file = Input::file('Image');
		if($image_file != null){

		
	 	 	 $image_string .= $image_file->getClientOriginalName().";";
	 	 	 $destinationPath = public_path().'/images/sport/icons/';
	 		 $filename = $image_file->getClientOriginalName();
	 		 $uploadSuccess = $image_file->move($destinationPath, $filename);
		
		}

		Sport::create(
		[
		
		'name'	=> 	Input::get('SportName'),
		'season_start'	=>  Input::get('SeasonStart'),
		'season_end'	=>  Input::get('SeasonEnd'),
		'image'	=>	$image_string
		
		]
		);
		

		$sport = Sport::wherename(Input::get('SportName'))->first();
		$sport_id = $sport["id"];
		
		$details = Input::get('Details');
		foreach ($details as $detail){
			
			DB::table('kiosk_sport_detail_mappings')->insert(
				array('sport_id' => $sport_id , 'detail_id' => $detail)

			);
		}
		

		
		return Redirect::to('/admin/kiosk/'.Auth::user()->store_id.'/sport/'.$sport_id);


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
		
		$menuPanel=  "sport";
		$sport = Sport::whereid($id)->first();
		$details= DB::table('kiosk_sport_detail_mappings')->where('sport_id' , '=', $id)->get();
		
		$detail_names = array();
		foreach ($details as $detail) {
			array_push($detail_names, SportDetail::wheredetail_id( $detail->detail_id )->first()->detail_name);

		}
		
		return View::make('kiosk/admin/dashboard/viewDashboard')->withPanel("sport")
													  ->withPanelData($sport)
												 	  ->withTitle("Dashboard")
													  ->withItems($this->menuItems)
													  ->withDetails($detail_names);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($storeNumber, $id)
	{
		$sport = Sport::whereid($id)->first();
		
		$sport_details = array();
		$raw_details = SportDetail::all();
		foreach($raw_details as $rd){
			$sport_details[$rd->detail_id] =  $rd->detail_name;
		}

		$season_start = [$sport->season_start];
		$season_end =	[$sport->season_end];
		$selected_details = DB::table('kiosk_sport_detail_mappings')->where('sport_id', $id)->lists('detail_id');
		return View::make('kiosk/admin/forms/edit/sport')->withsport("sport")
												   ->withDetails($sport_details)
												   ->withmonths($this->months)
												   ->withSport($sport)
												   ->withSeasonStart($season_start)
												   ->withSeasonEnd($season_end)
												   ->withSelectedDetails($selected_details);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($storeNumber, $id)
	{
		
		$image_string = "";
		
		$image_file = Input::file('Image');
		if($image_file != null){

		
	 	 	 $image_string .= $image_file->getClientOriginalName().";";
	 	 	 $destinationPath = public_path().'/images/sport/icons/';
	 		 $filename = $image_file->getClientOriginalName();
	 		 $uploadSuccess = $image_file->move($destinationPath, $filename);
		
		}
		
		$removeImages  = preg_split('/;/', Input::get('removeImages'), -1,  PREG_SPLIT_NO_EMPTY);
		$oldSport = Sport::whereid($id)->first();
		
		$sport = array();
		
		$sport['name']			= 	Input::get('SportName');
		$sport['season_start']	= 	Input::get('SeasonStart');
		$sport['season_end']	= 	Input::get('SeasonEnd');
		$sport['image']	=	$image_string;

		foreach($removeImages as $removeImage){
	  		$sport['image'] =  str_replace($removeImage.";", "", $oldSport->image);
	  	}
	  	
	  	$sport['image'].= ";".$image_string;
		
		Sport::whereid($id)->update($sport);


		$details = Input::get('Details');
		// delete and insert used inplace of update since the simple update results in duplicate entries.
		DB::table('kiosk_sport_detail_mappings')->where('sport_id', '=' , $id)->delete();
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
		Sport::whereid($id)->delete();
	}

	public function getSports()
	{
		return Response::json(Sport::all());
	}


}

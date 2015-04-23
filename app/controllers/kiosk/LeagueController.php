<?php

class LeagueController extends \BaseController {

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
		$menuPanel =  "league";
		$store_id  = Store::where('store_number' , Auth::user()->store_id)->first()->id;
		$leagues   = League::where("store_id", $store_id)->get();
		return View::make("kiosk/admin/dashboard/dashboard")->withTitle("Dashboard")
												 ->withItems($menuItems)
												 ->withPanel($menuPanel)
												 ->withPanelData($leagues);
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
		
		$city =  Store::where('store_number', Auth::user()->store_id)->first()->city;
		
		return View::make('kiosk/admin/forms/add/league')->withSports($sports)
														 ->withCity($city);
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

		$league = League::create(
						[
						
						'name'		=> 	Input::get('LeagueName'),
						'city'		=> 	Store::where('store_number', Auth::user()->store_id)->first()->city,
						'location'	=> 	Input::get('Location'),
						'ages'		=> 	Input::get('AgeGroup'),
						'contact'	=> 	Input::get('Contact'),
						'description'=>	Input::get('Description'),
						'sport_id' 	=>  Input::get('Sport'),
						'store_id'  =>  Store::where('store_number', Auth::user()->store_id)->first()->id,
						'url'		=> 	Input::get('URL'),
						'image'		=>	$image_string
						
						]
				  );

		return Redirect::to('/admin/kiosk/'.Auth::user()->store_id.'/league/'.$league->id);
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
		$menuPanel=  "league";
		$league = League::whereid($id)->first();
		$sport  = Sport::whereid($league->sport_id)->first()->name;
		return View::make('kiosk/admin/dashboard/viewDashboard')->withPanel("league")
													  	  ->withPanelData($league)
												 	  	  ->withTitle("Dashboard")
													  	  ->withItems($menuItems)
													  	  ->withSport($sport);
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
					$sports[$sport->id]  =  $sport->name;
				}

		$league = League::whereid($id)->first();		
		$selected_sport = [$league->sport_id];
		return View::make('kiosk/admin/forms/edit/league')->withLeague($league)
													->withSports($sports)
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
		
		$image_string = "";
		
		$image_file = Input::file('Image');
		if($image_file != null){

		
	 	 	 $image_string .= $image_file->getClientOriginalName().";";
	 	 	 $destinationPath = public_path().'/images/sport/icons/';
	 		 $filename = $image_file->getClientOriginalName();
	 		 $uploadSuccess = $image_file->move($destinationPath, $filename);
		
		}
		
		$removeImages  = preg_split('/;/', Input::get('removeImages'), -1,  PREG_SPLIT_NO_EMPTY);
		$oldLeague = League::whereid($id)->first();
		
		$league = array();
		
		$league['name']			= 	Input::get('LeagueName');
		$league['city']			= 	Input::get('City');
		$league['location']		= 	Input::get('Location');
		$league['ages']			= 	Input::get('AgeGroup');
		$league['contact']		= 	Input::get('Contact');
		$league['description']  =	Input::get('Description');
		$league['sport_id'] 	=   Input::get('Sport');
		$league['url']			= 	Input::get('URL');
		$league['image']		=	$image_string;

		foreach($removeImages as $removeImage){
	  		$league['image'] =  str_replace($removeImage.";", "", $oldLeague->image);
	  	}
	  	
	  	$league['image'].= ";".$image_string;
		
		League::whereid($id)->update($league);

		return Redirect::to('admin/kiosk/'. $storeNumber .'/league/'.$id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($storeNumber,$id)
	{
		League::whereid($id)->delete();
	}

	public function getLeagues()
	{
		return Response::json(League::all());
	}

}

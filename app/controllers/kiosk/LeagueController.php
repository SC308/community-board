<?php

class LeagueController extends \BaseController {

	private $menuItems;
	private $store_name; 
	private $panel_name;
	private $panel_title;

	public function __construct()
	{
		if(Auth::user()->role == 1)
		{
			$this->menuItems   = ["blog", "event", "gear", "league", "location", "sport"];	
		}
		else{
			
			$this->menuItems   = ["event", "league", "location"];
		}

		$this->store  		= Store::where('store_number', Auth::user()->store_id)->first();

		$this->panel_name	= "league";

		$this->panel_title 	= "Dashboard";

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$leagues   = League::where("store_id", $this->store->id)->get();
		
		return View::make("kiosk/admin/dashboard/dashboard")->withTitle($this->panel_title)
												 			->withItems($this->menuItems)
												 			->withPanel($this->panel_name)
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
		
		$city =  $this->store->city;
		
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
		
		$validator = Validator::make(Input::all(), League::$rules);

		if($validator->fails())
		{
			 $messages = $validator->messages();

        	return Redirect::to('admin/kiosk/'.Auth::user()->store_id.'/league/create')
            ->withErrors($validator);
		}


		$image_string = "";

		$image_file = Input::file('image');
		
		if($image_file != null){

		
	 	 	 $image_string .= $image_file->getClientOriginalName().";";
	 	 	 $destinationPath = public_path().'/images/kiosk/content/';
	 		 $filename = $image_file->getClientOriginalName();
	 		 $uploadSuccess = $image_file->move($destinationPath, $filename);
		
		}

		$league = League::create(
						[
						
						'name'		=> 	Input::get('name'),
						'city'		=> 	$this->store->city,
						'location'	=> 	Input::get('location'),
						'ages'		=> 	Input::get('age_group'),
						'contact'	=> 	Input::get('contact'),
						'description'=>	Input::get('description'),
						'sport_id' 	=>  Input::get('sport_id'),
						'store_id'  =>  $this->store->id,
						'url'		=> 	Input::get('url'),
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

		$league 	= League::find($id);

		$sport_name = Sport::find($league->sport_id)->name;
		
		return View::make('kiosk/admin/dashboard/viewDashboard')->withPanel($this->panel_name)
													  	  		->withPanelData($league)
												 	  	  		->withTitle($this->panel_title)
													  	  		->withItems($this->menuItems)
													  	  		->withSport($sport_name);
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

		$league = League::find($id);		
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
		
		$validator = Validator::make(Input::all(), League::$rules);

		if($validator->fails())
		{
			 $messages = $validator->messages();

        	return Redirect::to('admin/kiosk/'. Auth::user()->store_id . '/league/' . $id .'/edit')
            ->withErrors($validator);
		}



		$image_string = "";
		
		$image_file = Input::file('image');
		if($image_file != null){

		
	 	 	 $image_string .= $image_file->getClientOriginalName().";";
	 	 	 $destinationPath = public_path().'/images/kiosk/content/';
	 		 $filename = $image_file->getClientOriginalName();
	 		 $uploadSuccess = $image_file->move($destinationPath, $filename);
		
		}
		
		$removeImages  = preg_split('/;/', Input::get('removeImages'), -1,  PREG_SPLIT_NO_EMPTY);
		$oldLeague = League::whereid($id)->first();
		
		$league = array();
		
		$league['name']			= 	Input::get('name');
		$league['city']			= 	$this->store->city;
		$league['location']		= 	Input::get('location');
		$league['ages']			= 	Input::get('age_group');
		$league['contact']		= 	Input::get('contact');
		$league['description']  =	Input::get('description');
		$league['sport_id'] 	=   Input::get('sport_id');
		$league['url']			= 	Input::get('url');
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

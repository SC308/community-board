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
		
		$filter_sport_parameter = Input::get('sport');

		$filter_store_parameter = Input::get('store');
		
		$sort_parameter = Input::get('sort');

		if(Auth::user()->role == 1)
		{
			$leagues = League::all();
		}	
		else
		{
			$leagues   = League::where("store_id", $this->store->id)->get();	
		}

		if(isset( $filter_sport_parameter ))
		{
			$leagues = Content::filter( $leagues, $filter_sport_parameter,"sport_id");
		}
		if(isset( $filter_store_parameter ))
		{
			$leagues = Content::filter( $leagues, $filter_store_parameter,"store_id");
		}
		if(isset($sort_parameter))
		{
			$leagues = Content::sort($leagues, $sort_parameter);	
		}
		
		$filterOptions[""] = "Filter By Sport";

		$filterOptions = $filterOptions + Sport::getSportWithLeague();

		$sortOptions = League::getSortOptions();

		$storeOptions[""] = "Filter By Store";
		$allStores = Store::all();
		foreach ($allStores as $store) {
					$storeOptions[$store->id] =  $store->store_name;
				}
		
		$ifUserIsNT = Auth::user()->role;

		return View::make("kiosk/admin/dashboard/dashboard")->withTitle($this->panel_title)
												 			->withItems($this->menuItems)
												 			->withPanel($this->panel_name)
												 			->withPanelData($leagues)
												 			->withSports($filterOptions)
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
		$sports = Sport::getSportWithLeague();
		
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
		if(Input::file('image')){
			$image_string =  Media::createMediaString(Input::file('image'));
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

		$oldLeague = League::find($id);

		
		if(Input::file('image') != "")
		{
			$added_images_string = Media::createMediaString(Input::file('image'));
		}
		if(Input::get('removeImages') != "")
	  	{
			if(isset($added_images_string)){

				$added_images_string .= ";".Media::editMediaString(Input::get('removeImages'), $oldLeague->images);	
			}
			else{
				$added_images_string = Media::editMediaString(Input::get('removeImages'), $oldLeague->images);	
			}
	  	}
		
		
		$league = array();
		
		$league['name']			= 	Input::get('name');
		$league['city']			= 	$this->store->city;
		$league['location']		= 	Input::get('location');
		$league['ages']			= 	Input::get('age_group');
		$league['contact']		= 	Input::get('contact');
		$league['description']  =	Input::get('description');
		$league['sport_id'] 	=   Input::get('sport_id');
		$league['url']			= 	Input::get('url');
		if(isset($added_images_string)){
		  	$gear['image']	= $added_images_string;
	  	}

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

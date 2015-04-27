<?php

class GearController extends \BaseController {

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
			$this->menuItems= array("event", "league", "location");
		}
		

		$this ->panel_name	= "gear";

		$this->panel_title  =  "Dashboard";


	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$gears = Gear::all();
		
		return View::make("kiosk/admin/dashboard/dashboard")->withTitle($this->panel_title)
												 			->withItems($this->menuItems)
												 			->withPanel($this->panel_name)
												 			->withPanelData($gears);
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
		
		foreach ($allSports as $sport) 
		{
			$sports[$sport->id] =  $sport->name;
		
		}

		return View::make('kiosk/admin/forms/add/gear')->withSports($sports);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$validator = Validator::make(Input::all(), Gear::$rules);

		if($validator->fails())
		{
			 $messages = $validator->messages();

        	return Redirect::to('admin/kiosk/'.Auth::user()->store_id.'/gear/create')
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

		$gear = Gear::create(
			[
			
			'name'			=> 	Input::get('name'),
			'sport_id'		=>	Input::get('sport_id'),
			'description'	=>  Input::get('description'),
			'image'			=>	$image_string
			
			]
		);

		return Redirect::to('/admin/kiosk/'.Auth::user()->store_id.'/gear/'.$gear->id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($storeNumber,$id)
	{
		$gear = Gear::find($id);

		$sport = Sport::whereid($gear->sport_id)->first()->name;
		
		return View::make('kiosk/admin/dashboard/viewDashboard')->withPanel($this->panel_name)
													  	  		->withPanelData($gear)
												 	  	  		->withTitle($this->panel_title)
												 	  	  		->withSport($sport)
													  	  		->withItems($this->menuItems);
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
		foreach ($allSports as $sport) 
		{
			$sports[$sport->id] =  $sport->name;
		}

		$gear = Gear::find($id);

		$selected_sport = [$gear->sport_id];
		
		return View::make('kiosk/admin/forms/edit/gear')->withgear($gear)
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
		$validator = Validator::make(Input::all(), Gear::$edit_rules);

		if($validator->fails())
		{
			 $messages = $validator->messages();

        	return Redirect::to('admin/kiosk/'.Auth::user()->store_id.'/gear/'.$id.'/edit')
            ->withErrors($validator);
		}


		
		$image_file_string ="";
		$image_file = Input::file('image'); 
		if($image_file != null){
	 	 	$image_file_string .= $image_file->getClientOriginalName().";";
	 	 	$destinationPath = public_path().'/images/kiosk/content/';
		 	$filename = $image_file->getClientOriginalName();
		 	$uploadSuccess = $image_file->move($destinationPath, $filename);
		}
		
		
		

		$removeImages  = preg_split('/;/', Input::get('removeImages'), -1,  PREG_SPLIT_NO_EMPTY);
		

		$oldGear = Gear::whereid($id)->first();
	  	
	  	$gear = array();
	  	$gear['name'] 	    = Input::get('name');
	  	$gear['description']= Input::get('description');
  		$gear['sport_id'] 	= Input::get('sport_id');
	  	$gear['image']		= $oldGear->image;
	  	
		

	  	foreach($removeImages as $removeImage){
	  		$gear['image'] =  str_replace($removeImage.";", "", $oldGear->image);
	  	}
	  	
	  	$gear['image'].= ";".$image_file_string;

	  	

	  	Gear::whereid($id)->update($gear);
	  	return Redirect::to('/admin/kiosk/'.$storeNumber.'/gear/'.$id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($storeNumber,$id)
	{
		Gear::whereid($id)->delete();

	}

	public function getGears()
	{
		return Response::json(Gear::all());
	}


}

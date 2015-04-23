<?php

class GearController extends \BaseController {

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
		$menuPanel=  "gear";
		$gears = Gear::all();
		return View::make("kiosk/admin/dashboard/dashboard")->withTitle("Dashboard")
												 ->withItems($menuItems)
												 ->withPanel($menuPanel)
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
		foreach ($allSports as $sport) {
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
		
		$image_string = "";

		$image_file = Input::file('Image');
		if($image_file != null){

		
	 	 	 $image_string .= $image_file->getClientOriginalName().";";
	 	 	 $destinationPath = public_path().'/images/sport/icons/';
	 		 $filename = $image_file->getClientOriginalName();
	 		 $uploadSuccess = $image_file->move($destinationPath, $filename);
		
		}

		$gear = Gear::create(
					[
					
					'name'		=> 	Input::get('GearName'),
					'sport_id'		=>	Input::get('Sport'),
					'description'	=>  Input::get('GearDescription'),
					'image'	=>	$image_string
					
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
		$menuItems= array("blog", "event", "gear", "league", "location", "sport", "store", "map");
		$menuPanel=  "gear";
		$gear = Gear::whereid($id)->first();
		$sport = Sport::whereid($gear->sport_id)->first()->name;
		
		return View::make('kiosk/admin/dashboard/viewDashboard')->withPanel("gear")
													  	  ->withPanelData($gear)
												 	  	  ->withTitle("Dashboard")
												 	  	  ->withSport($sport)
													  	  ->withItems($menuItems);
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
					$sports[$sport->id] =  $sport->name;
				}

		$gear = Gear::whereid($id)->first();
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
		
		$image_file_string ="";
		$image_file = Input::file('Image'); 
		if($image_file != null){
	 	 	$image_file_string .= $image_file->getClientOriginalName().";";
	 	 	$destinationPath = public_path().'/images/content/';
		 	$filename = $image_file->getClientOriginalName();
		 	$uploadSuccess = $image_file->move($destinationPath, $filename);
		}
		
		
		

		$removeImages  = preg_split('/;/', Input::get('removeImages'), -1,  PREG_SPLIT_NO_EMPTY);
		

		$oldGear = Gear::whereid($id)->first();
	  	
	  	$gear = array();
	  	$gear['name'] 	    = Input::get('GearName');
	  	$gear['description']= Input::get('GearDescription');
  		$gear['sport_id'] 	= Input::get('Sport');
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

<?php

class BlogController extends \BaseController {

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
		

		$this ->panel_name	= "blog";

		$this->panel_title  =  "Dashboard";

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

		$blogs = Blog::all();

		if(isset( $filter_sport_parameter ))
		{
			$blogs = Content::filter($blogs, $filter_sport_parameter, "sport_id"); 
		}
		if(isset( $filter_store_parameter ))
		{
			$blogs = Content::filter($blogs, $filter_store_parameter, "applicable_to_stores"); 
		}
		
		if(isset($sort_parameter))
		{
			$blogs = Content::sort($blogs, $sort_parameter);	
		}

		$filterOptions[""] = "Filter By Sport";

		$filterOptions = $filterOptions + Sport::getAllSportName();

		$sortOptions = Blog::getSortOptions();

		$storeOptions[""] = "Filter By Store";
		$allStores = Store::all();
		foreach ($allStores as $store) {
					$storeOptions[$store->id] =  $store->store_name;
				}

		$ifUserIsNT = Auth::user()->role; 	
		return View::make("kiosk/admin/dashboard/dashboard")->withTitle($this->panel_title)
												 			->withItems($this->menuItems)
												 			->withPanel($this->panel_name)
												 			->withPanelData($blogs)
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

		$stores = array();

		$allStores = Store::all();

		foreach ($allStores as $store) 
		{
			$stores[$store->id] = $store->store_name;
		}

		return View::make('kiosk/admin/forms/add/blog')->withSports(Sport::getAllSportName())->withStores($stores);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$validator = Validator::make(Input::all(), Blog::$rules);

		if($validator->fails())
		{
			 $messages = $validator->messages();

        	return Redirect::to('admin/kiosk/'.Auth::user()->store_id."/blog/create")
            ->withErrors($validator);
		}

		 $image_string = Media::createMediaString(Input::file('image'));
		 $video_string = Media::createMediaString(Input::file('video'));
		 
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
		
		$blog = Blog::create(
			[
			
			'title' 				=>	Input::get('title'),
			'content'				=> 	Input::get('content'),
			'date'					=> 	Input::get('starts_at'),
			'author_id' 			=>  Auth::user()->id,
			'sport_id'				=>  Input::get('sport_id'),
			'applicable_to_stores' 	=>  $store_string,
			'images'	    		=>  $image_string,
			'videos'				=>  $video_string
			

			]

		);

		
		return Redirect::to('/admin/kiosk/'.Auth::user()->store_id.'/blog/'.$blog->id);

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($storeNumber, $id)
	{
		$blog = Blog::find($id);
		
		$sport = Sport::where("id", $blog->sport_id)->first()->name;
		
		$applicable_to_stores = $blog->applicable_to_stores;
		
		
		if($applicable_to_stores == "all")
		{
			$all_stores = DB::table('stores')->lists('id');

		}
		else{
			$all_stores = preg_split('/;/', $applicable_to_stores, -1,  PREG_SPLIT_NO_EMPTY);
		}

		$stores = array();
		foreach($all_stores as $store){
				array_push($stores, Store::whereid($store)->first()->store_name);
		}
		
		
		return View::make('kiosk/admin/dashboard/viewDashboard')->withPanel($this->panel_name)
													  	  		->withPanelData($blog)
												 	  	  		->withTitle($this->panel_title)
													  	  		->withItems($this->menuItems)
													  	  		->withSport($sport)
															  	->withStores($stores);
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
					$sports[$sport->id] = $sport->name;
				}

		$stores = array();
		$allStores = Store::all();
		foreach ($allStores as $store) {
					$stores[$store->id] = $store->store_name;
				}

		$blog = Blog::find($id);

		$selected_sport = $blog->sport_id;

		if($blog->applicable_to_stores == "all"){
			$selected_stores = ["all"];	
		}
		else{
			$selected_stores = preg_split('/;/', $blog->applicable_to_stores, -1,  PREG_SPLIT_NO_EMPTY);
		}
		return View::make("kiosk/admin/forms/edit/blog")->withblog($blog)
				 										->withsports($sports)
				 										->withstores($stores)
				 										->withSelectedSport($selected_sport)
				 										->withSelectedStore($selected_stores);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($storeNumber,$id)
	{
		$validator = Validator::make(Input::all(), Blog::$rules);

		if($validator->fails())
		{
			 $messages = $validator->messages();

        	return Redirect::to('admin/kiosk/'.Auth::user()->store_id.'/blog/'.$id.'/edit')
            ->withErrors($validator);
		}
		
		$oldBlog = Blog::find($id);
		// dd(Input::all());
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

		 /*Process Images*/
		if(Input::file('image')[0] != null)
		 {
			$added_images_string = $oldBlog->images.Media::createMediaString(Input::file('image'));

		 }

		if(Input::get('removeImages') != "")
	  	{
			if(isset($added_images_string)){
				$added_images_string = Media::editMediaString(Input::get('removeImages'), $added_images_string);
			}
			else{
				$added_images_string = Media::editMediaString(Input::get('removeImages'), $oldBlog->images);	
			}
	  	}
	  	/*Process Videos*/
	  	if(Input::file('video')[0] != null)
	  	{
			$added_videos_string = $oldBlog->videos.Media::createMediaString(Input::file('video'));

	  	}

	  	if(Input::get('removeVideos') != "")
	  	{
			if(isset($added_videos_string)){
				$added_videos_string = Media::editMediaString(Input::get('removeVideos'), $added_videos_string);
			}
			else{
				$added_videos_string = Media::editMediaString(Input::get('removeVideos'), $oldBlog->videos);

			}
	  	}

	  	$blog = array();
	  	$blog['title'] 	    = Input::get('title');
	  	$blog['content']    = Input::get('content');
  		$blog['date']  		= Input::get('starts_at');
	  	$blog['sport_id'] 	= Input::get('sport_id');
	  	if(isset($added_images_string)){
	  		$blog['images']		= $added_images_string;
	  	}
	  	if(isset($added_videos_string)){
	  		$blog['videos']		= $added_videos_string;
	  	}
	  	$blog['author_id']	= Auth::user()->id;
		$blog['applicable_to_stores']	= $store_string;

	  	Blog::whereid($id)->update($blog);
	  	return Redirect::to('/admin/kiosk/'. $storeNumber .'/blog');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($storeNumber,$id)
	{
		$deletedBlog = Blog::whereid($id)->delete();
		
	}


	public function getBlogs()
	{
		return Response::json(BLog::all());
	}


}

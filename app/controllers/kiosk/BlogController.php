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
		$blogs = Blog::all();
		
		return View::make("kiosk/admin/dashboard/dashboard")->withTitle($this->panel_title)
												 			->withItems($this->menuItems)
												 			->withPanel($this->panel_name)
												 			->withPanelData($blogs); 
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
			$sports[$sport->id] = $sport->name;
		}

		$stores = array();

		$allStores = Store::all();

		foreach ($allStores as $store) 
		{
			$stores[$store->id] = $store->store_name;
		}

		return View::make('kiosk/admin/forms/add/blog')->withSports($sports)->withStores($stores);
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

		 $image_string = "";
		 $video_string = "";
		 $store_string = "";
		 

		 $image_files = Input::file('image');
		 if($image_files[0] != null){

		 	foreach ($image_files as $image_file) {
			 	 $image_string .= $image_file->getClientOriginalName().";";
			 	 $destinationPath = public_path().'/images/kiosk/content/';
				 $filename = $image_file->getClientOriginalName();
				 $uploadSuccess = $image_file->move($destinationPath, $filename);
			 }
		 }


		 $video_files = Input::file('Video');
		 if($video_files[0]!= null){
		 	foreach ($video_files as $video_file) {
			 	 $video_string .= $video_file->getClientOriginalName().";";
			 	 $destinationPath = public_path().'/videos/kiosk/content/';
				 $filename = $video_file->getClientOriginalName();
				 $uploadSuccess = $video_file->move($destinationPath, $filename);
			 }

		 }


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
		

		$image_file_string ="";
		$image_files = Input::file('Image'); 
		if($image_files[0] != ""){
			foreach ($image_files as $image_file) {
			 	 $image_file_string .= $image_file->getClientOriginalName().";";
			 	 $destinationPath = public_path().'/images/kiosk/content/';
				 $filename = $image_file->getClientOriginalName();
				 $uploadSuccess = $image_file->move($destinationPath, $filename);
			 }
		}
		
		$video_file_string = "";
		$video_files  = Input::file('Video');
		if($video_files[0] != ""){
			foreach($video_files as $video_file) {
				$video_file_string .= $video_file->getClientOriginalName().";";
				$destinationPath = public_path().'/videos/kiosk/content/';
				$filename = $video_file->getClientOriginalName();
				$uploadSuccess = $video_file->move($destinationPath, $filename);
			}
		}

		$removeImages  = preg_split('/;/', Input::get('removeImages'), -1,  PREG_SPLIT_NO_EMPTY);
		$removeVideos  = preg_split('/;/', Input::get('removeVideos'), -1,  PREG_SPLIT_NO_EMPTY);
	  

	  	



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

		$oldBlog = Blog::whereid($id)->first();
	  	
	  	$blog = array();
	  	$blog['title'] 	    = Input::get('title');
	  	$blog['content']    = Input::get('content');
  		$blog['date']  		= Input::get('starts_at');
	  	$blog['sport_id'] 	= Input::get('sport_id');
	  	$blog['images']		= $oldBlog->image;
	  	$blog['videos']		= $oldBlog->video;
	  	$blog['author_id']	= Auth::user()->id;
		$blog['applicable_to_stores']	= $store_string;
		

	  	foreach($removeImages as $removeImage){
	  		$blog['images'] =  str_replace($removeImage, "", $oldBlog->image);
	  	}
	  	
	  	$blog['images'].= ";".$image_file_string;

	  	foreach($removeVideos as $removeVideo){
	  		$blog['videos']	= str_replace($removeVideo, "", $oldBlog->video);
	  	}
	  	$blog['videos'] .= ";".$video_file_string;

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

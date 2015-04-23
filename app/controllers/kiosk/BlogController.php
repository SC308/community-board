<?php

class BlogController extends \BaseController {

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
		$menuPanel=  "blog";
		$blogs = Blog::all();
		return View::make("kiosk/admin/dashboard/dashboard")->withTitle("Dashboard")
												 ->withItems($menuItems)
												 ->withPanel($menuPanel)
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
		foreach ($allSports as $sport) {
					$sports[$sport->id] = $sport->name;
				}

		$stores = array();
		$allStores = Store::all();
		foreach ($allStores as $store) {
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

        	return Redirect::to('ducks')
            ->withErrors($validator);
		}

		 $image_string = "";
		 $video_string = "";
		 $store_string = "";
		 

		 $image_files = Input::file('Image');
		 if($image_files[0] != null){

		 	foreach ($image_files as $image_file) {
			 	 $image_string .= $image_file->getClientOriginalName().";";
			 	 $destinationPath = public_path().'/images/content/';
				 $filename = $image_file->getClientOriginalName();
				 $uploadSuccess = $image_file->move($destinationPath, $filename);
			 }
		 }


		 $video_files = Input::file('Video');
		 if($video_files[0]!= null){
		 	foreach ($video_files as $video_file) {
			 	 $video_string .= $video_file->getClientOriginalName().";";
			 	 $destinationPath = public_path().'/videos/content/';
				 $filename = $video_file->getClientOriginalName();
				 $uploadSuccess = $video_file->move($destinationPath, $filename);
			 }

		 }


		 $stores = Input::get("Stores");
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
					
					'title' 				=>	Input::get('Title'),
					'content'				=> 	Input::get('Content'),
					'date'					=> 	Input::get('Starts_at'),
					'author_id' 			=>  Auth::user()->id,
					'sport_id'				=>  Input::get('Sport_id'),
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
		$blod_id = $id;
		$menuItems= array("blog", "event", "gear", "league", "location", "sport", "store", "map");
		$menuPanel=  "blog";
		$blog = Blog::whereid($id)->first();
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
		
		
		return View::make('kiosk/admin/dashboard/viewDashboard')->withPanel("blog")
													  	  ->withPanelData($blog)
												 	  	  ->withTitle("Dashboard")
													  	  ->withItems($menuItems)
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

		$blog = Blog::whereid($id)->first();
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
		
		$image_file_string ="";
		$image_files = Input::file('Image'); 
		if($image_files[0] != ""){
			foreach ($image_files as $image_file) {
			 	 $image_file_string .= $image_file->getClientOriginalName().";";
			 	 $destinationPath = public_path().'/images/content/';
				 $filename = $image_file->getClientOriginalName();
				 $uploadSuccess = $image_file->move($destinationPath, $filename);
			 }
		}
		
		$video_file_string = "";
		$video_files  = Input::file('Video');
		if($video_files[0] != ""){
			foreach($video_files as $video_file) {
				$video_file_string .= $video_file->getClientOriginalName().";";
				$destinationPath = public_path().'/videos/content/';
				$filename = $video_file->getClientOriginalName();
				$uploadSuccess = $video_file->move($destinationPath, $filename);
			}
		}

		$removeImages  = preg_split('/;/', Input::get('removeImages'), -1,  PREG_SPLIT_NO_EMPTY);
		$removeVideos  = preg_split('/;/', Input::get('removeVideos'), -1,  PREG_SPLIT_NO_EMPTY);
	  

	  	



		$store_string ="";
	  	$stores = Input::get("Stores");
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
	  	$blog['title'] 	    = Input::get('Title');
	  	$blog['content']    = Input::get('Content');
  		$blog['date']  		= Input::get('Starts_at');
	  	$blog['sport_id'] 	= Input::get('Sport_id');
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

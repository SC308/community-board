<?php

class HomeController extends BaseController {


	public function getIndex($sn, $ls = NULL){
		$storedetails = Store::getStoreDetails($sn); 
		$storeid = $storedetails[0]->id;

		$feature = Feature::getFeatures($storeid);
        $flyer = Flyer::getFlyerFirstPage($storeid);
        $toppicks = TopPick::getTopPicks($storeid);

        if($ls){
        	//landscape view
			return View::make('landscape/home')
				->with('feature', $feature)
				->with('flyer', $flyer)
				->with('toppicks', $toppicks)
				->with('storedetails', $storedetails);			

        } else {

			return View::make('home')
				->with('feature', $feature)
				->with('flyer', $flyer)
				->with('toppicks', $toppicks)
				->with('storedetails', $storedetails);	
        }     
                  	
	}


	public function getHomeStoreSelector(){
		return View::make('home-selector');
	}
	
	public function getFeaturedData(){
		
		$feature = Feature::all();
		
		return $feature;
	}

}
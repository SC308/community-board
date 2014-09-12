<?php

class HomeController extends BaseController {


	public function getIndex($sn, $ls = NULL){
		$storedetails = Store::getStoreDetails($sn); 

		$feature = Feature::all();
		
        $flyer = DB::table('flyers')
                ->orderBy('order', 'asc')
                ->take(1)
                ->get();
                
        $toppicks = DB::table('top_picks')
                ->orderBy('id', 'asc')
                ->get();      

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

	public function getIndexLandScape($sn){
		$storedetails = Store::getStoreDetails($sn); 
		return $this->getIndex($sn, true);	
	}



	public function getHomeStoreSelector(){
		return View::make('home-selector');
	}
	
	public function getFeaturedData(){
		
		$feature = Feature::all();
		
		return $feature;
	}

}
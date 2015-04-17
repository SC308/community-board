<?php

class FlyerController extends BaseController{

     public function getIndex($sn, $ls = NULL){
        $storedetails = Store::getStoreDetails($sn); 
		$storeid = $storedetails[0]->id;
/*
        $flyer = DB::table('flyers')
                ->orderBy('order', 'asc')
                ->get();
*/
		$flyer = Flyer::getFlyers($storeid);
		
        if($ls){
            return View::make('landscape/flyer')
	            ->with('storedetails', $storedetails)
                ->with('flyer', $flyer);
        } else {
            return View::make('flyer')
	            ->with('storedetails', $storedetails)
                ->with('flyer', $flyer); 
        }
    }
    
    public function getInteractiveFlyer($sn, $ls = NULL){
        
        $storedetails = Store::getStoreDetails($sn); 

        if($ls){
            return View::make('landscape/flyerint')
                ->with('storedetails', $storedetails)
                ->with('flyerint');
        } else {
            return View::make('flyerint')
                ->with('storedetails', $storedetails)
                ->with('flyerint');            
        }

    }

     public function getFlyerData(){

        $flyer = DB::table('flyers')
                ->orderBy('order', 'asc')
                ->get();

		return $flyer;
    }   

    public function getInteractiveFlyerLandScape($sn){
        $storedetails = Store::getStoreDetails($sn); 
        return $this->getInteractiveFlyer($sn, true);  
    }
    
}

?>
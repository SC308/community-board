<?php

class FlyerController extends BaseController{

     public function getIndex(){

        $flyer = DB::table('flyers')
                ->orderBy('order', 'asc')
                ->get();

        return View::make('flyer')
            ->with('flyer', $flyer);
    }
    
    public function getInteractiveFlyer($sn){
        
        $storedetails = Store::getStoreDetails($sn); 
        return View::make('flyerint')
            ->with('storedetails', $storedetails)
            ->with('flyerint');
    }

     public function getFlyerData(){

        $flyer = DB::table('flyers')
                ->orderBy('order', 'asc')
                ->get();

		return $flyer;
    }    
}

?>
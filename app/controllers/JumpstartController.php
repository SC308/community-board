<?php

class JumpstartController extends BaseController{

    public function getIndex($sn, $ls = NULL){
        $storedetails = Store::getStoreDetails($sn); 
        $storeid = $storedetails[0]->id;

        $jumpstart = Jumpstart::getJumpstart($sn);
       
       if($ls) {
       		return View::make('landscape/jumpstart')
        	   ->with('storedetails', $storedetails)
             ->with('jumpstart', $jumpstart);
       	} else {
        	return View::make('jumpstart')
        	   ->with('storedetails', $storedetails)
             ->with('jumpstart', $jumpstart);
       	} 	   
    }
 
 	public function getIndexLandScape($sn){
		$storedetails = Store::getStoreDetails($sn); 
		return $this->getIndex($sn, true);	
	}   
}
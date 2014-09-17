<?php

class JumpstartController extends BaseController{

    public function getIndex($sn, $ls = NULL){
        $storedetails = Store::getStoreDetails($sn); 
        $storeid = $storedetails[0]->id;

        $jumpstart = Jumpstart::getJumpstart($sn);
        $jsgoal = $jumpstart->store_goal;
        $jsraised = $jumpstart->store_raised;

        $jsperc = ($jsraised/$jsgoal) * 100;
       
       if($ls) {
       		return View::make('landscape/jumpstart')
        	   ->with('storedetails', $storedetails)
             ->with('jumpstart', $jumpstart)
             ->with('jsperc', $jsperc);
       	} else {
        	return View::make('jumpstart')
        	   ->with('storedetails', $storedetails)
             ->with('jumpstart', $jumpstart)
             ->with('jsperc', $jsperc);
       	} 	   
    }
 
 // 	public function getIndexLandScape($sn){
	// 	$storedetails = Store::getStoreDetails($sn); 
	// 	return $this->getIndex($sn, true);	
	// }   
}
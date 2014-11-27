<?php

class JumpstartController extends BaseController{

    public function getIndex($sn, $ls = NULL){
        $storedetails = Store::getStoreDetails($sn); 
        $storeid = $storedetails[0]->id;
       
        $js = Jumpstart::getJumpstart($storeid);

        $jsgoal = $js[0]->store_goal;
        $jsraised = $js[0]->store_raised;

        $jsperc = ($jsraised/$jsgoal) * 100;
        
        if( $jsperc > 100){
	        $jsperc = 100;
        }
       
       if($ls) {
       		return View::make('landscape/jumpstart')
        	 ->with('storedetails', $storedetails)
             ->with('jumpstart', $js)
             ->with('jsperc', $jsperc);
       	} else {
        	return View::make('jumpstart')
        	 ->with('storedetails', $storedetails)
             ->with('jumpstart', $js)
             ->with('jsperc', $jsperc);
       	} 	   
    }
 
 // 	public function getIndexLandScape($sn){
	// 	$storedetails = Store::getStoreDetails($sn); 
	// 	return $this->getIndex($sn, true);	
	// }   
}
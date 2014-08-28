<?php

class JumpstartController extends BaseController{

    public function getIndex($sn){
        $storedetails = Store::getStoreDetails($sn); 
        $storeid = $storedetails[0]->id;

        $jumpstart = Jumpstart::getJumpstart($storeid);
        
        return View::make('jumpstart')
            ->with('storedetails', $storedetails)
            ->with('jumpstart', $jumpstart);
    }
    
}
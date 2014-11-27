<?php

class StaffController extends BaseController{

    public function getIndex($sn, $ls = NULL){
        
        $storedetails = Store::getStoreDetails($sn); 
        $storeid = $storedetails[0]->id;

        $staff = StaffBio::getStoreStaff($storeid);

        if($ls){
            return View::make('landscape/staff')
                ->with('storedetails', $storedetails)
                ->with('staff', $staff);
        } else {
            return View::make('staff')
                ->with('storedetails', $storedetails)
                ->with('staff', $staff);
        }
    }

    public function view($id){

        return View::make('individualProfile')
            ->with('manager', $manager);
    }
    
    public function getStaffData($sn){
	    
        $storedetails = Store::getStoreDetails($sn); 
        $storeid = $storedetails[0]->id;	    
        
	    $staff = StaffBio::where("store_id","=",$storeid)->get();

        return $staff;
        
    }

    // public function getIndexLandScape($sn){
    //     $storedetails = Store::getStoreDetails($sn); 
    //     return $this->getIndex($sn, true);  
    // }    
}
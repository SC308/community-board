<?php

class StaffController extends BaseController{

    public function getIndex($sn){
        
        $storedetails = Store::getStoreDetails($sn); 
        $staff = StaffBio::get();

        return View::make('staff')
            ->with('storedetails', $storedetails)
            ->with('staff', $staff);
    }

    public function view($id){

        return View::make('individualProfile')
            ->with('manager', $manager);
    }
    
    public function getStaffData(){
	    
	    $staff = StaffBio::get();

        return $staff;
        
    }
}
<?php

class StaffController extends BaseController{

    public function getIndex($sn, $ls = NULL){
        
        $storedetails = Store::getStoreDetails($sn); 
        $storeid = $storedetails[0]->id;

        $staff = StaffBio::getStoreStaff($storeid);

        if($ls){
            $staff_chunks = array_chunk($staff, 15, true);
            return View::make('landscape/staff')
                ->with('storedetails', $storedetails)
                ->with('staff', $staff)
                ->with('staff_chunks', $staff_chunks)
                ->with('chunkCounter', 0)
                ->with('chunkCounterMax', count($staff_chunks))
                ->with('chunkSize', 15);
        } 
        else {
            $staff_chunks = array_chunk($staff, 21, true);
            return View::make('staff')
                ->with('storedetails', $storedetails)
                ->with('staff', $staff)
                ->with('staff_chunks', $staff_chunks)
                ->with('chunkCounter', 0)
                ->with('chunkCounterMax', count($staff_chunks))
                ->with('chunkSize', 21);
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
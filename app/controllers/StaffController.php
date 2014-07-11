<?php

class StaffController extends BaseController{

    public function getIndex(){

        $staff = StaffBio::get();

        return View::make('staff')
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
<?php

class StaffController extends BaseController{

    public function getIndex(){

        $staff = StaffBio::all();

        return View::make('staff')
            ->with('staff', $staff);
    }

    public function view($id){


        return View::make('individualProfile')
            ->with('manager', $manager);
    }
}
<?php
class ApiController extends BaseController{

    public function getIndex($sn){
	    
	    
        return View::make('apihome')
	        ->with('storenumber', $sn);
    }
    
}
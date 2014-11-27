<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function getIndexLandScape($sn){
       // $storedetails = Store::getStoreDetails($sn); 
        return $this->getIndex($sn, true);  
    }    
    
	public function getAPI($sn){
       // $storedetails = Store::getStoreDetails($sn); 
        return $this->getIndex($sn, false, true);  
    }    

}

<?php

class CashController extends BaseController{
    
    public function getIndex($sn){
        
        $staff = StaffBio::get();
        
        $talls = CashwallAsset::getTalls();
        
        $singles = CashwallAsset::getSingles();
        
        $events = CommunityEvent::getnextthirty();

        $photos = Photo::orderBy(DB::raw('RAND()'))
                ->where("publish","=",1)
                ->get();

        $storedetails = Store::getStoreDetails($sn); 

		if (!$storedetails) {
			
			return "Oops, can't find that store. Use a valid store number. <em>Example:</em> <strong>http://domain.com/<em>5111</em>/cash</strong>";
			
		} else {
			
	        return View::make('cash/cash')
	            ->with('staff', $staff)
	            ->with('talls', $talls)
	            ->with('singles', $singles)
	            ->with('events', $events)
	            ->with('photos', $photos)
	            ->with('storedetails', $storedetails);			
		}
        
    }

}
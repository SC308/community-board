<?php

class CashController extends BaseController{
    
    public function getIndex(){
        $staff = StaffBio::get();
        $talls = CashwallAsset::getTalls();
        $singles = CashwallAsset::getSingles();
        $events = CommunityEvent::getnextthirty();
        $photos = Photo::orderBy(DB::raw('RAND()'))
                ->where("publish","=",1)
                ->get();
        return View::make('cash/cash')
            ->with('staff', $staff)
            ->with('talls', $talls)
            ->with('singles', $singles)
            ->with('events', $events)
            ->with('photos', $photos);
        
    }
}
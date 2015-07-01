<?php

class CashController extends BaseController
{

    public function getIndex($sn)
    {

        $storedetails = Store::getStoreDetails($sn);
        $storeid      = $storedetails[0]->id;

        $staff = StaffBio::getStoreStaff($storeid);

        $talls = CashwallAsset::getTalls();

        $singles = CashwallAsset::getSingles();

        $events = CommunityEvent::getnextthirty($storeid);

        $photos = Photo::orderBy(DB::raw('RAND()'))
            ->where("publish", "=", 1)
            ->where("store_id", "=", $storeid)
            ->get();

        if (!$storedetails) {

            return "Oops, can't find that store. Use a valid store number.";

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

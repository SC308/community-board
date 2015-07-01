<?php

class HomeController extends BaseController
{

    public function getIndex($sn, $ls = null)
    {
        $storedetails = Store::getStoreDetails($sn);
        $storeid      = $storedetails[0]->id;

        $feature  = Feature::getFeatures($storeid);
        $flyer    = Flyer::getFlyerFirstPage($storeid);
        $flyerTwo = Flyer::getFlyerTwoPage($storeid);
        $toppicks = TopPick::getTopPicks($storeid);

        if ($ls) {
            //landscape view
            return View::make('landscape/home')
                ->with('feature', $feature)
                ->with('flyer', $flyerTwo)
                ->with('toppicks', $toppicks)
                ->with('storedetails', $storedetails);

        } else {

            return View::make('home')
                ->with('feature', $feature)
                ->with('flyer', $flyer)
                ->with('toppicks', $toppicks)
                ->with('storedetails', $storedetails);
        }

    }

    public function getHomeStoreSelector()
    {
        return View::make('home-selector');
    }

    public function getFeaturedData($sn)
    {

        $storedetails = Store::getStoreDetails($sn);
        $storeid      = $storedetails[0]->id;

        $feature = Feature::where('store_id', '=', $storeid)->get();

        return $feature;
    }

}

<?php

class FlyerController extends BaseController{

     public function getIndex(){

        $flyer = DB::table('flyers')
                ->orderBy('order', 'asc')
                ->get();

        return View::make('flyer')
            ->with('flyer', $flyer);
    }
    
    public function getInteractiveFlyer(){

        return View::make('flyerint')
            ->with('flyerint');
    }

     public function getFlyerData(){

        $flyer = DB::table('flyers')
                ->orderBy('order', 'asc')
                ->get();

		return $flyer;
    }    
}

?>
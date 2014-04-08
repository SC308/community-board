<?php

class FlyerController extends BaseController{

     public function getIndex(){

        $flyer = DB::table('flyers')
                ->orderBy('order', 'asc')
                ->get();

        return View::make('flyer')
            ->with('flyer', $flyer);
    }
}

?>
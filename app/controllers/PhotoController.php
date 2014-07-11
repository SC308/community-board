<?php

class PhotoController extends BaseController{

    public function getIndex(){
        //$photos = Photo::all()->orderBy(DB::raw('RAND()')); 
        $photos = Photo::orderBy(DB::raw('RAND()'))
                ->where("publish","=",1)
                ->get();
        return View::make('photos')
            ->with('photos', $photos);
    }
    
    
    public function getPhotoData(){
        $photos = Photo::orderBy(DB::raw('RAND()'))
		        ->where("publish","=",1)
				->get();
				
		return $photos;

    }
}
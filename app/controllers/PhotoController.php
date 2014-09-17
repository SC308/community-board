<?php

class PhotoController extends BaseController{

    public function getIndex($sn, $ls = NULL){
        $storedetails = Store::getStoreDetails($sn); 
        //$photos = Photo::all()->orderBy(DB::raw('RAND()')); 
        $storeid = $storedetails[0]->id;

        $photos = Photo::getPhotos($storeid);
        
        // $photos = Photo::orderBy(DB::raw('RAND()'))
        //         ->where("publish","=",1)
        //         ->get();

        if($ls){
            return View::make('landscape/photos')
                ->with('storedetails', $storedetails)
                ->with('photos', $photos);           
        } else {
            return View::make('photos')
                ->with('storedetails', $storedetails)
                ->with('photos', $photos);
        }

    }
    
    
    public function getPhotoData(){
        $photos = Photo::orderBy(DB::raw('RAND()'))
		        ->where("publish","=",1)
				->get();
				
		return $photos;

    }

    // public function getIndexLandScape($sn){
    //     $storedetails = Store::getStoreDetails($sn); 
    //     return $this->getIndex($sn, true);  
    // }    
}
<?php

class Photo extends Eloquent{

    
    protected $fillable = array('publish', 'title', 'photographer_name', 'location', 'description', 'path');

    public static function getPhotos($storeid){

    	$photos = DB::table('photos')
					->where('store_id', '=', $storeid)
					->get();  
        return $photos;
    }

}
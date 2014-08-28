<?php

class Jumpstart extends Eloquent{

    //protected $fillable = array('store_id', 'publish', 'title', 'photographer_name', 'location', 'description', 'path');

    public static function getJumpstart($storeid){

    	$jumpstart = DB::table('jumpstart')
					->where('store_id', '=', $storeid)
					->get();  
        return $jumpstart;
    }

}
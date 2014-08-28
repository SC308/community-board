<?php

class Flyer extends Eloquent{
    protected $fillable = array('path', 'order', 'store_id');

        public static function getFlyers($storeid){

    	$flyers = DB::table('flyers')
					->where('store_id', '=', $storeid)
					->get();  
        return $flyers;
    }
}
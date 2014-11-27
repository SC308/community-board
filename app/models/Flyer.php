<?php

class Flyer extends Eloquent{
    protected $fillable = array('path', 'order', 'store_id');

    public static function getFlyers($storeid){

    	$flyers = DB::table('flyers')
					->where('store_id', '=', $storeid)
					->get();  
        return $flyers;
    }

    public static function getFlyerFirstPage($storeid){
    	$flyer = DB::table('flyers')
    			->where('store_id', '=', $storeid)
                ->orderBy('order', 'asc')
                ->take(1)
                ->get();
        return $flyer;
    }

    public static function getFlyerTwoPage($storeid){
        $flyer = DB::table('flyers')
                ->where('store_id', '=', $storeid)
                ->orderBy('order', 'asc')
                ->take(2)
                ->get();
        return $flyer;
    }
}
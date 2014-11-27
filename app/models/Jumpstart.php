<?php

class Jumpstart extends Eloquent{

    protected $fillable = array('store_id', 'champ_photo', 'champ_bio', 'champ_name', 'store_goal', 'store_raised');

    public static function getJumpstart($storeid){

    	$jumpstart = DB::table('jumpstarts')
				->where('store_id', '=', $storeid)
				->get();
					
        return $jumpstart;
    }

}

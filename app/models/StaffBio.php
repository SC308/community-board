<?php

class StaffBio extends Eloquent{
 
    protected $fillable = array('first', 'last', 'position', 'favorite_sport', 'bio', 'photo');    

    public static function getStoreStaff($storeid){

    	$staff = DB::table('staff_bios')
					->where('store_id', '=', $storeid)
					->get();  
        return $staff;
    }
}
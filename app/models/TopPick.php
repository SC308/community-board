<?php

class TopPick extends Eloquent{
     protected $fillable = array('path', 'store_id', 'publish');   

     public static function getTopPicks($storeid){
     	 $toppicks = DB::table('top_picks')
					->where('store_id', '=', $storeid)
					->get();  
        return $toppicks;
     }
}
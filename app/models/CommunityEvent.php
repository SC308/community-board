<?php

class CommunityEvent extends Eloquent{

   // protected $table = 'CommunityEvents';
    
    public static function getevents(){
        $events = DB::table('CommunityEvents')->select(DB::raw('id, title, description, location, type, DATE(start) as startdate, DATE(end) as enddate, EXTRACT(HOUR FROM start) AS starthour, EXTRACT(MINUTE FROM start) as startmin, EXTRACT(HOUR from end) as endhour, EXTRACT(MINUTE from end) as endmin'))->orderBy('startdate')->get();
        return $events;
    }



}

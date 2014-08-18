<?php

class CommunityEvent extends Eloquent{

   protected $fillable = array('title', 'description', 'location', 'type', 'start', 'end');
    
    public static function getevents($storeid){
        $events = DB::table('community_events')->select(DB::raw('id, title, description, location, type, DATE(start) as startdate, DATE(end) as enddate, EXTRACT(MONTH from start) as startmonth, EXTRACT(DAY from start) as startday, EXTRACT(YEAR from start) as startyear, EXTRACT(MONTH from end) as endmonth, EXTRACT(DAY from end) as endday, EXTRACT(YEAR from end) as endyear, EXTRACT(HOUR FROM start) AS starthour, EXTRACT(MINUTE FROM start) as startmin, EXTRACT(HOUR from end) as endhour, EXTRACT(MINUTE from end) as endmin'))
                    ->where('store_id', '=', $storeid)
                    ->orderBy('startdate')
                    ->get();
        return $events;
    }

    public static function getnextthirty(){
        $today = date("Y-m-d"); 
        $events = DB::table('community_events')->select(DB::raw('id, title, description, location, type, DATE(start) as startdate, DATE(end) as enddate, EXTRACT(MONTH from start) as startmonth, EXTRACT(DAY from start) as startday, EXTRACT(YEAR from start) as startyear, EXTRACT(MONTH from end) as endmonth, EXTRACT(DAY from end) as endday, EXTRACT(YEAR from end) as endyear, EXTRACT(HOUR FROM start) AS starthour, EXTRACT(MINUTE FROM start) as startmin, EXTRACT(HOUR from end) as endhour, EXTRACT(MINUTE from end) as endmin'))->where('start','>=', $today)->orderBy('startdate')->take(15)->get();
        return $events;
    }


}

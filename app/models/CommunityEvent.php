<?php

class CommunityEvent extends Eloquent
{

    protected $fillable = array('store_id', 'title', 'description', 'location', 'type', 'start', 'end', 'hilite');

    public static function getevents($storeid)
    {
        $events = DB::table('community_events')->select(DB::raw('id, title, description, location, hilite, type, DATE(start) as startdate, DATE(end) as enddate, EXTRACT(MONTH from start) as startmonth, EXTRACT(DAY from start) as startday, EXTRACT(YEAR from start) as startyear, EXTRACT(MONTH from end) as endmonth, EXTRACT(DAY from end) as endday, EXTRACT(YEAR from end) as endyear, EXTRACT(HOUR FROM start) AS starthour, EXTRACT(MINUTE FROM start) as startmin, EXTRACT(HOUR from end) as endhour, EXTRACT(MINUTE from end) as endmin'))
                                               ->where('store_id', '=', $storeid)
                                               ->orderBy('startdate')
                                               ->get();
        return $events;
    }

    public static function getnextthirty($storeid)
    {
        $today  = date("Y-m-d");
        $events = DB::table('community_events')->select(DB::raw('id, title, description, location, hilite, type, DATE(start) as startdate, DATE(end) as enddate, EXTRACT(MONTH from start) as startmonth, EXTRACT(DAY from start) as startday, EXTRACT(YEAR from start) as startyear, EXTRACT(MONTH from end) as endmonth, EXTRACT(DAY from end) as endday, EXTRACT(YEAR from end) as endyear, EXTRACT(HOUR FROM start) AS starthour, EXTRACT(MINUTE FROM start) as startmin, EXTRACT(HOUR from end) as endhour, EXTRACT(MINUTE from end) as endmin'))
                                               ->where('start', '>=', $today)
                                               ->where('store_id', '=', $storeid)
                                               ->orderBy('startdate')
                                               ->take(15)
                                               ->get();
        return $events;
    }

    public static function getTaggedEvents($tag, $storeid)
    {
        $eventCollection= array();         
        
        $tags= preg_split('/,/', Input::get('tags'));
        $events = array();
        foreach ($tags as $tag) {
            
            $taggedEvents = DB::table('tags')->where('tag', $tag)->get();
            
            /*required output is array of collections,
             merging two $taggedEvents would give
             array of array of collections, hence */
            foreach ($taggedEvents as $taggedEvent) {
                array_push($events, $taggedEvent); 
            }
        }
        
        foreach ($events as $event) {
            $taggedEvent = CommunityEvent::find($event->content_id);
            if ($taggedEvent->store_id == $storeid) {
              array_push($eventCollection, $taggedEvent);
            }
        }
        return $eventCollection;
    }
}

<?php

Class CalendarController extends BaseController {

    public function getIndex(){
        $events = CommunityEvent::getevents();
       // $events = CommunityEvent::find(40);

        $events_string= "";

        $lastdate = "2013-01-01"; 
        $count = count($events);
        $i=0;

        foreach($events as $e){

            if( $e->startdate != $lastdate) {
                $lastdate = $e->startdate;

                if($i != 0){
                    $events_string .= '</div>'; //not the first, close the last date group    
                }

                $startdate = str_replace("-", "", $e->startdate);
                $pos = strpos($startdate,'0');

                if ($pos !== false) {
                    $startdate = substr($startdate,0,$pos+1) . str_replace('0','',substr($startdate,$pos+1));
                }
                $enddate = str_replace("-", "", $e->enddate);
                $events_string .= '<div data-role="day" data-day="'.$startdate.'">';  //open the new dategroup
            }
            $startmin = $e->startmin;
            $endmin = $e->endmin; 
            if($e->startmin == 0 ){ $startmin = "00"; }
            if($e->endmin == 0 ){ $endmin = "00"; }

            $events_string .=  '    <div data-role="event" data-name="'.$e->title.'" data-start="'.$e->starthour.':'.$startmin.'" data-end="'.$e->endhour.':'.$endmin.'" data-location="'.$e->location.'" data-details="'.$e->description.'"></div>';

            if( $i == $count){
                $events_string .= "</div>"; //last record of group
            }

            $i++;            
        }   

        return View::make('calendar')
            ->with('events_string', $events_string);
    }

}
<?php

class CalendarController extends BaseController
{

    public function getIndex($sn, $ls = null, $api = null)
    {

        $storedetails = Store::getStoreDetails($sn);
        $storeid      = $storedetails[0]->id;

        $events = CommunityEvent::getevents($storeid);
        // $events = CommunityEvent::find(40);

        $events_string = "";

        $lastdate = "2013-01-01";
        $count    = count($events);
        $i        = 0;

        foreach ($events as $e) {

            if ($e->hilite) {
                $h = 1;
            } else {
                $h = 0;
            }

            if ($e->startdate != $lastdate) {
                $lastdate = $e->startdate;

                if ($i != 0) {
                    $events_string .= '</div>'; //not the first, close the last date group
                }

                $startdate = str_replace("-", "", $e->startdate);
                $pos       = strpos($startdate, '0');

                if ($pos !== false) {

                    if (substr($startdate, -1) == "0") {
                        //  echo "this is a 10,20,30";
                        $startdate = substr($startdate, 0, $pos + 1) . str_replace('0', '', substr($startdate, $pos));
                        $startdate = $startdate . "0";

                    } else {
                        $startdate = substr($startdate, 0, $pos + 1) . str_replace('0', '', substr($startdate, $pos + 1));
                    }

                    //  echo "<b>original:</b> " . $e->startdate ." <b>zero pos:</b> " . $pos . " <b>formatted:</b> " .$startdate . " <b>len:</b> ". strlen($startdate) . " <br />";

                }
                $enddate = str_replace("-", "", $e->enddate);

                if ($h == 1) {
                    $events_string .= '<div data-role="day" data-day="' . $startdate . '" data-hilite="yes">'; //open the new dategroup
                } else {
                    $events_string .= '<div data-role="day" data-day="' . $startdate . '">'; //open the new dategroup
                }

            }
            $startmin = $e->startmin;
            $endmin   = $e->endmin;

            if ($e->startmin == 0) {$startmin = "00";}
            if ($e->endmin == 0) {$endmin     = "00";}

            $starthour                       = $e->starthour;
            if ($starthour > 12) {$starthour = $starthour - 12;}

            $endhour                     = $e->endhour;
            if ($endhour > 12) {$endhour = $endhour - 12;}

            $desc = $e->description;
            $desc = preg_replace('/[\x00-\x1F\x7F]/', '', $desc);
            $desc = preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/', '', $desc);

            $loc = $e->location;
            $loc = preg_replace('/[\x00-\x1F\x7F]/', '', $loc);
            $loc = preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/', '', $loc);

            $title = $e->title;
            $title = preg_replace('/[\x00-\x1F\x7F]/', '', $title);
            $title = preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/', '', $title);

            $events_string .= '    <div data-role="event" data-name="' . $title . '" data-start="' . $starthour . ':' . $startmin . '" data-end="' . $endhour . ':' . $endmin . '" data-location="' . $loc . '" data-details="' . $desc . '"></div>';

            if ($i == $count) {
                $events_string .= "</div>"; //last record of group
            }

            $i++;
        }

        if ($api) {
            return $events_string;
        }

        if ($ls) {
            //landscape
            return View::make('landscape/calendar')
                ->with('storedetails', $storedetails)
                ->with('events_string', $events_string);
        } else {
            return View::make('calendar')
                ->with('storedetails', $storedetails)
                ->with('events_string', $events_string);
        }

    }

    public function getCalRaw($sn)
    {

        $storedetails = Store::getStoreDetails($sn);
        $storeid      = $storedetails[0]->id;

        $events = CommunityEvent::getevents($storeid);
        return $events;

    }
}

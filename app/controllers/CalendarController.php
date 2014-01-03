<?php

Class CalendarController extends BaseController {

    public function getIndex(){
        $events = CommunityEvent::all();
       // $events = CommunityEvent::find(40);

        return View::make('calendar')
            ->with('events', $events);
    }

}
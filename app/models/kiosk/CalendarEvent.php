<?php

class CalendarEvent extends \Eloquent {

	protected $table ="kiosk_calendar_events";

	protected $fillable = ['id', 'title', 'description', 'event_start', 'event_end', 'store_id', 'sport_id', 'created_at', 'updated_at'];
}


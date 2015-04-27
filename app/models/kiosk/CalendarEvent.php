<?php

class CalendarEvent extends \Eloquent {

	protected $table ="kiosk_calendar_events";

	protected $fillable = [	'id', 
							'title', 
							'description', 
							'event_start', 
							'event_end', 
							'store_id', 
							'sport_id', 
							'created_at', 
							'updated_at'
						  ];


	public static $rules = [
			'sport_id'	    => 'required',
			'event_start'	=> 'required',
			'event_end'		=> 'required',
			'title'			=> 'required',
			'description'	=> 'required'

	];
}


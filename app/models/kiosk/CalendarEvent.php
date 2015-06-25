<?php

class CalendarEvent extends \Eloquent
{

    protected $table = "kiosk_calendar_events";

    protected $fillable = [
        'id',
        'title',
        'description',
        'event_start',
        'event_end',
        'store_id',
        'sport_id',
        'created_at',
        'updated_at',
    ];

    public static $rules = [
        'sport_id'    => 'required',
        'event_start' => 'required',
        'event_end'   => 'required',
        'title'       => 'required',
        'description' => 'required',

    ];
    protected static function getSortOptions()
    {
        $sortOptions = [
            ""                 => "Sort By",
            "title"            => "A-Z",
            "title:desc"       => "Z-A",
            "event_start"      => "Starting Earliest",
            "event_start:desc" => "Starting Latest",
            "event_end"        => "Ending Earliest",
            "event_end:desc"   => "Ending Latest",
            "created_at"       => "Oldest First",
            "created_at:desc"  => "Latest Latest",

        ];
        return $sortOptions;
    }
}

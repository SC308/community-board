<?php

class League extends \Eloquent
{

    protected $table = "kiosk_leagues";

    protected $fillable = [
    	'id',
        'name',
        'city',
        'location',
        'ages',
        'contact',
        'description',
        'sport_id',
        'store_id',
        'url',
        'image',
        'created_at',
        'updated_at',
    ];

    public static $rules = [
        'sport_id' => 'required',
        'name'     => 'required',
        'city'     => 'required',
        'contact'  => 'required',

    ];

    protected static function getSortOptions()
    {
        $sortOptions = [
            ""                => "Sort By",
            "name"            => "A-Z",
            "name:desc"       => "Z-A",
            "created_at"      => "Oldest First",
            "created_at:desc" => "Latest First",

        ];
        return $sortOptions;
    }

}

<?php

class Location extends \Eloquent
{

    protected $table = "kiosk_locations";

    protected $fillable = [
    	'id',
        'name',
        'description',
        'sport_id',
        'store_id',
        'address',
        'postal_code',
        'latitude',
        'longitude',
        'created_at',
        'updated_at',

    ];

    public static $rules = [
        'sport_id'    => 'required',
        'store_id'    => 'required',
        'name'        => 'required',
        'postal_code' => 'required',

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

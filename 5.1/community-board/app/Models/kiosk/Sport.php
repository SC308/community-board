<?php

class Sport extends \Eloquent
{

    protected $table = "kiosk_sports";

    protected $fillable = [
    	'id',
        'name',
        'season_start',
        'season_end',
        'store_id',
        'created_at',
        'updated_at',
    ];

    public static $rules = [
        'name'         => 'required',
        'season_start' => 'required',
        'season_end'   => 'required',
        'details'      => 'required',

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

    protected function getActiveSportsByStore($storeNumber)
    {
        $currentMonth = date('m');
        $store_id     = Store::where('store_number', $storeNumber)->first()->id;

        $sports    = array();
        $allSports = Sport::all();
        foreach ($allSports as $sport) {
            $stores = preg_split('/;/', $sport->store_id);
            if (($sport->store_id == "all") || (in_array($store_id, $stores))) {
                array_push($sports, $sport);
            }

        }

        $filteredSports = array();
        foreach ($sports as $sport) {
            if ($sport->season_start <= $currentMonth || $sport->season_end >= $currentMonth) {
                array_push($filteredSports, $sport);
            }
        }

        return $filteredSports;
    }

    protected function getActiveSports()
    {
        $currentMonth   = date('m');
        $sports         = Sport::all();
        $filteredSports = array();

        foreach ($sports as $sport) {
            if ($sport->season_start <= $currentMonth || $sport->season_end >= $currentMonth) {
                array_push($filteredSports, $sport);
            }
        }

        return $filteredSports;

    }

    protected function getAllSportName()
    {
        $sports = array();

        $allSports = Sport::all();
        foreach ($allSports as $sport) {
            $sports[$sport->id] = $sport->name;
        }
        return $sports;
    }

    protected function getSportWithLeague()
    {
        $allSports = DB::table('kiosk_sport_detail_mappings')->where('detail_id', SportDetail::where('detail_name', 'League')->first()->id)->get();

        $sports = array();

        foreach ($allSports as $sport) {
            $sports[$sport->sport_id] = Sport::find($sport->sport_id)->name;
        }
        return $sports;
    }

    protected function getSportWithLocation()
    {
        $location_id = (SportDetail::where('detail_name', 'Location')->first()->id);
        $allSports   = DB::table('kiosk_sport_detail_mappings')->where('detail_id', $location_id)->get();
        $sports      = array();

        foreach ($allSports as $sport) {
            $sports[$sport->sport_id] = Sport::find($sport->sport_id)->name;
        }
        return $sports;
    }
}

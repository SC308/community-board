<?php

class Sport extends \Eloquent {

	protected $table = "kiosk_sports";

	protected $fillable = ['id', 'name', 'season_start', 'season_end', 'image' ,'created_at', 'updated_at'];


	protected function getActiveSports(){
		$currentMonth = date('m');
		$sports = Sport::all();
		$filteredSports =  Array();

		foreach ($sports as $sport) {
			if($sport->season_start <= $currentMonth  || $sport->season_end >= $currentMonth)
			{
				array_push($filteredSports, $sport);
			}
		}

		return $filteredSports;

	}
}

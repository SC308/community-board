<?php

class Sport extends \Eloquent {

	protected $table = "kiosk_sports";

	protected $fillable = [ 'id', 
							'name', 
							'season_start', 
							'season_end', 
							'created_at', 
							'updated_at'
	];

	public static $rules = [
			'name'       	=> 'required',
			'season_start' 	=> 'required',
			'season_end'	=> 'required',
			'details'		=> 'required'


	];



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


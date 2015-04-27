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
}
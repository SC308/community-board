<?php

class Gear extends \Eloquent {

	protected $table = "kiosk_gears";

	protected $fillable = [	'id', 
							'name', 
							'sport_id', 
							'description', 
							'image' , 
							'created_at', 
							'updated_at'
		];

	public static $rules = [

			'sport_id'      => 'required',
			'name'			=> 'required',
			'description'	=> 'required',
			'image'			=> 'required'

	];

	public static $edit_rules = [

			'sport_id'      => 'required',
			'name'			=> 'required',
			'description'	=> 'required',
			

	];
}
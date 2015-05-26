<?php

class Blog extends \Eloquent {
	protected $table = "kiosk_blogs";

	protected $fillable = [ 'id', 
							'title', 
							'content', 
							'date', 
							'author_id', 
							'sport_id', 
							'applicable_to_stores', 
							'images', 
							'videos', 
							'created_at', 
							'updated_at'
						   ];

	public static $rules = [
			'sport_id'      => 'required',
			'starts_at'		=> 'required',
			'stores'		=> 'required',
			'title'			=> 'required',
			'content'		=> 'required'

	];


	protected static function getSortOptions()
	{
		$sortOptions = [
			""					=> "Sort By",
			"title"  			=> "A-Z",
			"title:desc" 		=> "Z-A",
			"created_at"		=> "Oldest First",
			"created_at:desc"	=> "Latest First"

		];
		return $sortOptions;
	} 

	
	
}
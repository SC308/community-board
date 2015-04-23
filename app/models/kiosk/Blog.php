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
			'Sport_id'      => 'required',
			'Starts_at'		=> 'required',
			'Stores[]'		=> 'required',
			'Title'			=> 'required',
			'Content'		=> 'required'

	];
}
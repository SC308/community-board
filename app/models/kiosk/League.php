<?php

class League extends \Eloquent {

	protected $table = "kiosk_leagues";  

	protected $fillable = ['id', 'name', 'city', 'location', 'ages', 'contact', 'description', 'sport_id', 'store_id', 'url', 'image' , 'created_at', 'updated_at'];
}
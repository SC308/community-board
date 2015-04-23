<?php

class Location extends \Eloquent {

	protected $table = "kiosk_locations";

	protected $fillable = ['id', 'name', 'description', 'sport_id', 'store_id', 'address', 'postal_code', 'latitude', 'longitude', 'created_at', 'updated_at'];
}
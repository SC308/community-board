<?php

class Gear extends \Eloquent {

	protected $table = "kiosk_gears";

	protected $fillable = ['id', 'name', 'sport_id', 'description', 'image' , 'created_at', 'updated_at'];
}
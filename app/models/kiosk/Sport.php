<?php

class Sport extends \Eloquent {

	protected $table = "kiosk_sports";

	protected $fillable = ['id', 'name', 'season_start', 'season_end', 'image' ,'created_at', 'updated_at'];
}
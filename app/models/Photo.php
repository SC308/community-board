<?php

class Photo extends Eloquent{

    
    protected $fillable = array('publish', 'title', 'photographer_name', 'location', 'description', 'path');

}
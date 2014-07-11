<?php

class StaffBio extends Eloquent{
 
    protected $fillable = array('first', 'last', 'position', 'favorite_sport', 'bio', 'photo');    
}
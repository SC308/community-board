<?php

class Feature extends Eloquent
{

    protected $fillable = array('path', 'title', 'content', 'store_id');

    public static function getFeatures($storeid)
    {

        $features = DB::table('features')
            ->where('store_id', '=', $storeid)
            ->get();
        return $features;
    }
}

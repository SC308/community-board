<?php

class Store extends Eloquent
{

    protected $fillable = array('store_number', 'store_name', 'store_type', 'address', 'city', 'prov', 'district', 'active');

    public static function getStoreDetails($sn)
    {
        $storeDetails = DB::table('stores')
            ->where('store_number', '=', $sn)
            ->get();
        return $storeDetails;
    }

    public static function getStoreIDfromStoreNumber($sn)
    {
        $storeDetails = DB::table('stores')
            ->where('store_number', '=', $sn)
            ->get('id');
        return $storeDetails;
    }

    public static function getAllStores()
    {
        $storeDetails = DB::table('stores')
            ->where('store_type', '!=', 0)
            ->get();
        return $storeDetails;
    }

}

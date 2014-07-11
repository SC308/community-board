<?php

class CashwallAsset extends Eloquent{

    public static function getTalls(){
        $talls  = DB::table('cashwall_assets')
                ->where('size', '=', 'tall')
                ->get();     
        return $talls;
    }

    public static function getSingles(){
        $singles = DB::table('cashwall_assets')
                ->where('size', '=', 'single')
                ->get();     
        return $singles;
    }
}
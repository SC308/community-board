<?php

class PhotoController extends BaseController
{

    public function getIndex($sn, $ls = null)
    {
        $storedetails = Store::getStoreDetails($sn);
        //$photos = Photo::all()->orderBy(DB::raw('RAND()'));
        $storeid = $storedetails[0]->id;

        // $photos = Photo::getPhotos($storeid);
        $photos = Photo::getRandomPhotos($storeid);

        // $photos = Photo::orderBy(DB::raw('RAND()'))
        //         ->where("publish","=",1)
        //         ->get();

        if ($ls) {
            $photo_chunks = (array_chunk($photos, 20, true));
            return View::make('landscape/photos')
                ->with('storedetails', $storedetails)
                ->with('photos', $photo_chunks)
                ->with('chunkCounter', 0)
                ->with('chunkCounterMax', count($photo_chunks))
                ->with('chunkSize', 18);
        } else {
            $photo_chunks = (array_chunk($photos, 18, true));
            return View::make('photos')
                ->with('storedetails', $storedetails)
                ->with('photos', $photo_chunks)
                ->with('chunkCounter', 0)
                ->with('chunkCounterMax', count($photo_chunks))
                ->with('chunkSize', 18);
        }

    }

    public function getPhotoData($sn)
    {
        $storedetails = Store::getStoreDetails($sn);
        $storeid      = $storedetails[0]->id;

        $photos = Photo::orderBy(DB::raw('RAND()'))
            ->where("publish", "=", 1)
            ->where("store_id", "=", $storeid)
            ->get();

        foreach($photos as $p) {
            $fileext = substr($p->path, strpos($p->path, ".") + 1);
            $filename = explode(".", $p->path);
            $p->filename = $filename[0];
            $p->original_fileext = $fileext;
            $p->orginal = "http://communityboard.storeapps.fglsports.dmz/images/photos/" . $p->path;
            $p->thumbnail_300 = "http://communityboard.storeapps.fglsports.dmz/images/photos/thumb/" . $p->filename . "_300.jpg";
            $p->thumbnail_400 = "http://communityboard.storeapps.fglsports.dmz/images/photos/thumb/" . $p->filename . "_400.jpg";
            $p->full_p = "http://communityboard.storeapps.fglsports.dmz/images/photos/full/" . $p->filename . "_1000.jpg";
            $p->full_ls = "http://communityboard.storeapps.fglsports.dmz/images/photos/full/" . $p->filename . "_800.jpg";
        }

        return $photos;

    }

    // public function getIndexLandScape($sn){
    //     $storedetails = Store::getStoreDetails($sn);
    //     return $this->getIndex($sn, true);
    // }
}

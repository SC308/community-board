<?php

class UtilityController extends \BaseController {

	public function createPhotoThumbnails()
	{
		$filePath = public_path()."/images/photos";
        $files = File::files($filePath);
        foreach ($files as $file) {
        	$filename = pathinfo($file, PATHINFO_FILENAME);
        	$extension = pathinfo($file, PATHINFO_EXTENSION);

        	Media::resize(300, null, $filePath, $filename, $extension, 'thumb');
	        Media::resize(400, null, $filePath, $filename, $extension, 'thumb');
	        Media::resize(1000, null, $filePath, $filename, $extension, 'full');
	        Media::resize(null, 800, $filePath, $filename, $extension, 'full');

        }
	}

	public function createStaffThumbnails()
	{
		$filePath = public_path()."/images/staff";
        $files = File::files($filePath);
        foreach ($files as $file) {
        	$filename = pathinfo($file, PATHINFO_FILENAME);
        	$extension = pathinfo($file, PATHINFO_EXTENSION);

        	Media::fit(124, 158 , $filePath, $filename, $extension, 'thumb', 'top-right');
            Media::fit(1180, 847 , $filePath, $filename, $extension, 'ls', 'top-right');
            Media::fit(1080, 947 , $filePath, $filename, $extension, 'p', 'top-right');

        }
        dd();
	}

	public function createFlyerThumbnails()
	{
		$filePath = public_path()."/images/flyer";
        $files = File::files($filePath);
        foreach ($files as $file) {
        	$filename = pathinfo($file, PATHINFO_FILENAME);
        	$extension = pathinfo($file, PATHINFO_EXTENSION);
        	$img = Image::make($filePath."/".$filename.".".$extension);
        	if ($img->height() == 1600) {
        		Media::fit(172, 400 , $filePath, $filename, $extension, 'thumb/ls', 'top-left');
		        Media::fit(175, 370 , $filePath, $filename, $extension, 'thumb/p', 'top-left');
		        Media::fit(400, 550 , $filePath, $filename, $extension, 'thumb/thumb', 'top-left');
		        Media::resize(1000, null , $filePath, $filename, $extension, 'full');

        	}
        	
        }
        dd();
	}

	public function createFeatureThumbnails()
	{
		$filePath = public_path()."/images/feature";
        $files = File::files($filePath);
        foreach ($files as $file) {
        	$filename = pathinfo($file, PATHINFO_FILENAME);
        	$extension = pathinfo($file, PATHINFO_EXTENSION);

        	Media::resize(1200, 860 , $filePath, $filename, $extension , 'ls');
        	Media::resize(1080, 795 , $filePath, $filename, $extension , 'p');

        }
	}

	public function createToppickThumbnails()
	{
		$filePath = public_path()."/images/flyer";
        $files = File::files($filePath);
        foreach ($files as $file) {
        	$filename = pathinfo($file, PATHINFO_FILENAME);
        	$extension = pathinfo($file, PATHINFO_EXTENSION);
        	$img = Image::make($filePath."/".$filename.".".$extension);
        	if ($img->height() == 553) {
        		Media::fit(418,277, $filePath, $filename, $extension, 'toppick/ls', 'top-left' );
        	    Media::fit(836,553, $filePath, $filename, $extension, 'toppick/p' , 'top-left');
        	}
        }
	}

	public function createJumpstartThumbnails()
	{
		$filePath = public_path()."/images/jumpstart/champs";
        $files = File::files($filePath);
        foreach ($files as $file) {
        	$filename = pathinfo($file, PATHINFO_FILENAME);
        	$extension = pathinfo($file, PATHINFO_EXTENSION);

            Media::fit(230, 230 , $filePath, $filename, $extension, 'thumb', 'right');
        	

        }
	}


}

<?php

class Media extends \Eloquent
{

    public static function createMediaString($media)
    {
        $media_string = "";
        $media_files  = $media;
        if (is_array($media_files)) {
            if ($media_files[0] != null) {
                foreach ($media_files as $media_file) {
                    $returnValue = Media::addMedia($media_file);
                    if ($returnValue) {
                        $media_string .= $media_file->getClientOriginalName() . ";";
                    }
                }
            }

        } else {
            $returnValue = Media::addMedia($media_files);
            if ($returnValue) {
                $media_string .= $media_files->getClientOriginalName() . ";";
            }
        }
        return $media_string;
    }

    public static function editMediaString($mediaToRemove, $currentMediaString)
    {
        $mediaToRemove_array = Media::formatData($mediaToRemove);
        foreach ($mediaToRemove_array as $removeMedia) {
            $returnValue = Media::removeMedia($removeMedia);
            if ($returnValue) {
                $currentMediaString = str_replace($removeMedia, "", $currentMediaString);
            }
        }
        return $currentMediaString;

    }

    protected static function addMedia($file_object)
    {
        $destinationPath = public_path() . '/images/kiosk/content/';
        $filename        = $file_object->getClientOriginalName();
        $uploadSuccess   = $file_object->move($destinationPath, $filename);
        $img = Image::make($destinationPath.$filename);
        $img->fit(100);
        $img->save($destinationPath."cache/".$filename);
        $img->destroy();
        // JitImage::source($destinationPath.$filename)->resize(200, 0);
        return $uploadSuccess;
    }

    protected static function removeMedia($filename)
    {
        $filepath = public_path() . '/images/kiosk/content/'; 
        Log::info("going to delete : ".$filepath.$filename);
        if (File::exists($filepath.$filename)) {
            Log::info("file exists : " . $filepath.$filename);
            if (File::delete($filepath.$filename)) {
                Log::info("here");
                File::delete($filepath."cache/".$filename);
                return true;
            }
        }
    }
    protected static function formatData($media)
    {
        return preg_split('/;/', $media, -1, PREG_SPLIT_NO_EMPTY);
    }

    /*
    *   $width = (int) required width of the final image : optional parameter
    *   $height = (int)required height of the final image :optional parameter
    *   $directory = (string)location of the original file
    *   $filename = (filename)name of the file
    *   $type= (string) ls pr p or thumb : used to save the final image at the correct sub-directory
    */
    protected static function resize($width = null, $height=null, $directory, $filename, $extension, $type)
    {
        Log::info($directory."/".$filename.".".$extension);
        $img = Image::make($directory."/".$filename. "." .$extension);
        $img->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });
        $imgString = $directory."/".$type."/".$filename."_";

        if ($width != null ) {
            
            $imgString .= $width;
            if ($height != null) {
                $imgString .= "X".$height;    
            }

        }
        else if ($height != null){
            
            $imgString .= $height;

        }
        $imgString .= ".jpg";
        $img->save($imgString);
        $img->destroy();
    }

    protected static function fit($width, $height=null, $directory, $filename, $extension, $type, $direction)
    {
        Log::info($directory."/".$filename. "." .$extension);
        $img = Image::make($directory."/".$filename. "." .$extension);
        $img->fit($width, $height, null, $direction);
        $img->save($directory ."/". $type ."/". $filename ."_". $width ."X". $height . ".jpg");
        $img->destroy();
    }


}

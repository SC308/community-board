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
        return $uploadSuccess;
    }

    protected static function removeMedia($filename)
    {
        $filepath = public_path() . '/images/kiosk/content/' . $filename;
        if (File::exists($filepath)) {
            if (File::delete($filepath)) {
                return true;
            }
        }
    }
    protected static function formatData($media)
    {
        return preg_split('/;/', $media, -1, PREG_SPLIT_NO_EMPTY);
    }
}

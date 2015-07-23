<?php

class AdminController extends BaseController
{

    /**
     * Default view
     *
     *
     */
    public function getIndex()
    {
        return View::make('admin/dashboard');
        // ->with('events_string', $events_string);
    }

    /**************************************************************************************
     * photos
     *
     *
     */
    public function getPhotos()
    {
        $storedetails = Store::getStoreDetails(Confide::user()->store_id);
        $sn           = $storedetails[0]->id;
        // $photos = Photo::all();
        $photos = Photo::getPhotos($sn);
        return View::make('admin/photos')
            ->with('photos', $photos);
    }

    public function addPhotos()
    {
        return View::make('admin/photos-upload');
    }

    public function saveAddPhoto()
    {

        $storedetails = Store::getStoreDetails(Confide::user()->store_id);
        $sn           = $storedetails[0]->id;

        $extension = Input::file('photo')->getClientOriginalExtension();
        $directory = public_path() . '/images/photos';
        $timestamp = sha1(time() . time());
        $filename  = $timestamp . "." . $extension;

        $p = Input::get('publish');
        if ($p == "on") {
            $p = 1;
        } else {
            $p = 0;
        }

        $upload_success = Input::file('photo')->move($directory, $filename); //move and rename file

        Media::resize(300, null, $directory, $timestamp, $extension, 'thumb');
        Media::resize(400, null, $directory, $timestamp, $extension, 'thumb');
        Media::resize(1000, null, $directory, $timestamp, $extension, 'full');
        Media::resize(null, 800, $directory, $timestamp, $extension, 'full');
        

        if ($upload_success) {
            $photodetails = array(
                'title'             => Input::get('title'),
                'photographer_name' => Input::get('photographer_name'),
                'location'          => Input::get('location'),
                'description'       => Input::get('description'),
                'store_id'          => $sn,
                'publish'           => $p,
                'path'              => $filename,
            );

            $photo = Photo::create($photodetails);
            $photo->save();

            $t = "Awesome!";
            $r = "Your new photo has been created! <a href='/admin/photos'>Back to Photos</a>";
            return View::make('admin/confirmation')
                ->with('response_title', $t)
                ->with('response', $r);
        } else {
            $t = "Um...";
            $r = "Something bad happened. <a href='/admin/photos'>Back to Photos</a>";
            return View::make('admin/confirmation')
                ->with('response_title', $t)
                ->with('response', $r);
        }

    }

    public function removePhotos($id)
    {

        $p = Photo::find($id);
        $p->delete();

        $filename = pathinfo($p->path, PATHINFO_FILENAME);
        $extension = pathinfo($p->path, PATHINFO_EXTENSION);
        $filepath = public_path()."/images/photos";
        
        File::delete($filepath."/".$p->path);
        File::delete($filepath."/thumb/".$filename."_300".".".$extension);
        File::delete($filepath."/thumb/".$filename."_400".".".$extension);
        File::delete($filepath."/full/".$filename."_1000".".".$extension);
        File::delete($filepath."/full/".$filename."_800".".".$extension);

        
        $t = "So long, photo...";
        $r = "Photo deleted!<br /><a href='/admin/photos'>Back to Photos</a>";
        return View::make('admin/confirmation')
            ->with('response_title', $t)
            ->with('response', $r);
    }

    public function editPhotos($id)
    {
        $photos = DB::table('photos')->where('id', $id)->first();
        return View::make('admin/photoedit')
            ->with('photos', $photos);
    }

    public function saveEditPhoto()
    {
        $id = Input::get('id');

        $p = Input::get('publish');
        if ($p == "on") {
            $p = 1;
        } else {
            $p = 0;
        }

        $photoedits = array(
            'title'             => Input::get('title'),
            'photographer_name' => Input::get('photographer_name'),
            'location'          => Input::get('location'),
            'description'       => Input::get('description'),
            'publish'           => $p,
        );

        Photo::find($id)->update($photoedits);

        $t = "Awesome!";
        $r = "Your changes have been saved! <a href='/admin/photos'>Back to Photos</a>";
        return View::make('admin/confirmation')
            ->with('response_title', $t)
            ->with('response', $r);
    }

    /**************************************************************************************
     * staff
     *
     *
     */
    public function getStaff()
    {
        $storedetails = Store::getStoreDetails(Confide::user()->store_id);
        $sn           = $storedetails[0]->id;

        $staff = StaffBio::getStoreStaff($sn);

        return View::make('admin/staff')
            ->with('staff', $staff);

    }

    public function addStaff()
    {
        return View::make('admin/addstaff');
    }

    public function removeStaff($id)
    {
        $s = StaffBio::find($id);
        
        $filename = pathinfo($s->photo, PATHINFO_FILENAME);
        $extension = pathinfo($s->photo, PATHINFO_EXTENSION);
        $filepath = public_path()."/images/staff";

        File::delete($filepath ."/". $filename . "." .  $extension);
        File::delete($filepath . "/thumb/" . $filename . "_124X158.jpg" );
        File::delete($filepath . "/ls/" . $filename . "_1180X847.jpg" );
        File::delete($filepath . "/p/" . $filename . "_1080X947.jpg" );

        $s->delete();

        $t = "Done!";
        $r = "Staff member deleted!<br /><a href='/admin/staff'>Back to Staff</a>";
        return View::make('admin/confirmation')
            ->with('response_title', $t)
            ->with('response', $r);
    }

    public function editStaff($id)
    {

        $staff = DB::table('staff_bios')->where('id', $id)->first();
        return View::make('admin/staffedit')
            ->with('staff', $staff);
    }

    public function saveStaffEdit()
    {
        $storedetails = Store::getStoreDetails(Confide::user()->store_id);
        $sn           = $storedetails[0]->id;

        $id   = Input::get('id');
        $file = Input::file('photo');

        if ($file) {
            $extension      = Input::file('photo')->getClientOriginalExtension();
            $directory      = public_path() . '/images/staff';
            $timestamp      = sha1(time() . time());
            $filename       = $timestamp . "." . $extension;
            
            $upload_success = Input::file('photo')->move($directory, $filename); //move and rename file

            Media::fit(124, 158 , $directory, $timestamp, $extension, 'thumb', 'top-right');
            Media::fit(1180, 847 , $directory, $timestamp, $extension, 'ls', 'top-right');
            Media::fit(1080, 947 , $directory, $timestamp, $extension, 'p', 'top-right');

            /*Remove old photo*/
            $oldPhoto     = StaffBio::find($id)->photo; 
            $oldFilename  = pathinfo( $oldPhoto, PATHINFO_FILENAME);
            $extension = pathinfo( $oldPhoto, PATHINFO_EXTENSION);
            $filepath  = public_path()."/images/staff";

            File::delete($directory ."/". $oldFilename . "." .  $extension);
            File::delete($directory . "/thumb/" . $oldFilename . "_124X158.jpg" );
            File::delete($directory . "/ls/" . $oldFilename . "_1180X847.jpg" );
            File::delete($directory . "/p/" . $oldFilename . "_1080X947.jpg" );

            if ($upload_success) {
                $staffedits = array(
                    'store_id'       => $sn,
                    'first'          => Input::get('first'),
                    'last'           => Input::get('last'),
                    'position'       => Input::get('position'),
                    'favorite_sport' => Input::get('favsport'),
                    'bio'            => Input::get('description'),
                    'photo'          => $filename,
                );

                StaffBio::find($id)->update($staffedits);

                $t = "Very Nice!";
                $r = "Your changes have been saved, and photo updated! <a href='/admin/staff'>Back to Staff</a>";
                return View::make('admin/confirmation')
                    ->with('response_title', $t)
                    ->with('response', $r);
            } else {
                $t = "Um...";
                $r = "Something bad happened. <a href='/admin/photos'>Back to Staff</a>";
                return View::make('admin/confirmation')
                    ->with('response_title', $t)
                    ->with('response', $r);
            }

        } else {
            $staffedits = array(
                'store_id'       => $sn,
                'first'          => Input::get('first'),
                'last'           => Input::get('last'),
                'position'       => Input::get('position'),
                'favorite_sport' => Input::get('favsport'),
                'bio'            => Input::get('description'),
            );

            StaffBio::find($id)->update($staffedits);

            $t = "Very Nice!";
            $r = "Your changes have been saved! <a href='/admin/staff'>Back to Staff</a>";
            return View::make('admin/confirmation')
                ->with('response_title', $t)
                ->with('response', $r);

        }
    }

    public function saveStaffAdd()
    {
        $storedetails = Store::getStoreDetails(Confide::user()->store_id);
        $sn           = $storedetails[0]->id;

        $extension = Input::file('photo')->getClientOriginalExtension();
        $directory = public_path() . '/images/staff';
        $timestamp = sha1(time() . time());
        $filename  = $timestamp . "." . $extension;

        $upload_success = Input::file('photo')->move($directory, $filename); //move and rename file

        Media::fit(124, 158 , $directory, $timestamp, $extension, 'thumb', 'top-right');
        Media::fit(1180, 847 , $directory, $timestamp, $extension, 'ls', 'top-right');
        Media::fit(1080, 947 , $directory, $timestamp, $extension, 'p', 'top-right');

        if ($upload_success) {
            $staffdetails = array(
                'store_id'       => $sn,
                'first'          => Input::get('first'),
                'last'           => Input::get('last'),
                'position'       => Input::get('position'),
                'favorite_sport' => Input::get('favsport'),
                'bio'            => Input::get('description'),
                'photo'          => $filename,
            );

            $staff = StaffBio::create($staffdetails);
            $staff->save();

            $t = "Welcome to the team!";
            $r = "New staff added! <a href='/admin/staff'>Back to Staff</a>";
            return View::make('admin/confirmation')
                ->with('response_title', $t)
                ->with('response', $r);
        } else {
            $t = "Um...";
            $r = "Something bad happened. <a href='/admin/photos'>Back to Staff</a>";
            return View::make('admin/confirmation')
                ->with('response_title', $t)
                ->with('response', $r);
        }
    }

    /**************************************************************************************
     * flyer
     *
     *
     */
    public function getFlyer()
    {

        $storedetails = Store::getStoreDetails(Confide::user()->store_id);
        $sn           = $storedetails[0]->id;

        $flyer = Flyer::getFlyers($sn);
        $picks = TopPick::getTopPicks($sn);
        return View::make('admin/flyer')
            ->with('flyer', $flyer)
            ->with('picks', $picks);
    }

    public function addFlyer()
    {
        return View::make('admin/addflyer');
    }

    public function saveAddFlyer()
    {

        $storedetails = Store::getStoreDetails(Confide::user()->store_id);
        $sn           = $storedetails[0]->id;

        $extension = Input::file('flyer')->getClientOriginalExtension();
        $directory = public_path() . '/images/flyer';
        $timestamp = sha1(time() . time());
        $filename  =  $timestamp . "." . $extension;

        $upload_success = Input::file('flyer')->move($directory, $filename); //move and rename file

        Media::fit(175, 204 , $directory, $timestamp, $extension, 'thumb/ls', 'top-left');
        Media::fit(175, 204 , $directory, $timestamp, $extension, 'thumb/p', 'top-left');
        Media::fit(400, 550 , $directory, $timestamp, $extension, 'thumb/thumb', 'top-left');
        Media::resize(1000, null , $directory, $timestamp, $extension, 'full');


        if ($upload_success) {
            $photodetails = array(
                'order'    => Input::get('order'),
                'store_id' => $sn,
                'path'     => $filename,
            );

            $flyer = Flyer::create($photodetails);
            $flyer->save();

            $t = "I'm so happy for you!";
            $r = "The new flyer page has been added! <a href='/admin/flyer'>Back to Flyer</a>";
            return View::make('admin/confirmation')
                ->with('response_title', $t)
                ->with('response', $r);
        } else {
            $t = "I don't know how to say this...";
            $r = "Something bad happened. <a href='/admin/photos'>Back to Flyer</a>";
            return View::make('admin/confirmation')
                ->with('response_title', $t)
                ->with('response', $r);
        }

    }

    public function editFlyer($id)
    {
        
        $flyer = DB::table('flyers')->where('id', $id)->first();
        return View::make('admin/flyeredit')
            ->with('flyer', $flyer);
    }

    public function saveEditFlyer()
    {
        $id = Input::get('id');

        $photoedits = array(
            'order' => Input::get('order'),
        );

        Flyer::find($id)->update($photoedits);

        $t = "Awesome!";
        $r = "Your changes have been saved! <a href='/admin/flyer'>Back to Flyer</a>";
        return View::make('admin/confirmation')
            ->with('response_title', $t)
            ->with('response', $r);
    }

    public function removeFlyer($id)
    {
        $f = Flyer::find($id);

        $filename = pathinfo($f->path, PATHINFO_FILENAME);
        $extension = pathinfo($f->path, PATHINFO_EXTENSION);
        $filepath = public_path()."/images/flyer";

        File::delete($filepath ."/". $filename . "." .  $extension);
        File::delete($filepath . "/thumb/ls/" . $filename . "_175X204.jpg" );
        File::delete($filepath . "/thumb/p/" . $filename . "_175X204.jpg" );
        File::delete($filepath . "/thumb/thumb/" . $filename . "_400X550.jpg" );
        File::delete($filepath . "/full/" . $filename . "_1000.jpg" );

        $f->delete();
        $t = "So long, flyer page...";
        $r = "Page deleted!<br /><a href='/admin/flyer'>Back to Flyer</a>";
        return View::make('admin/confirmation')
            ->with('response_title', $t)
            ->with('response', $r);
    }

    public function addPick()
    {
        return View::make('admin/addpick');
    }

    public function saveAddPick()
    {

        $storedetails = Store::getStoreDetails(Confide::user()->store_id);
        $sn           = $storedetails[0]->id;

        $extension = Input::file('pick')->getClientOriginalExtension();
        $directory = public_path() . '/images/flyer/toppick';
        $timestamp = sha1(time() . time());
        $filename  = $timestamp . "." . $extension;

        $upload_success = Input::file('pick')->move($directory, $filename); //move and rename file
        Media::fit(418,277, $directory, $timestamp, $extension, '/ls', 'top-left' );
        Media::fit(836,553, $directory, $timestamp, $extension, '/p' , 'top-left');

        if ($upload_success) {
            $pickdetails = array(
                'path'     => $filename,
                'store_id' => $sn,
            );

            $pick = TopPick::create($pickdetails);
            $pick->save();

            $t = "Yes!";
            $r = "Your new top pick has been created! <a href='/admin/flyer'>Back to Flyer</a>";
            return View::make('admin/confirmation')
                ->with('response_title', $t)
                ->with('response', $r);
        } else {
            $t = "Um...";
            $r = "Something bad happened. <a href='/admin/flyer'>Back to Flyer</a>";
            return View::make('admin/confirmation')
                ->with('response_title', $t)
                ->with('response', $r);
        }

    }

    public function removePick($id)
    {
        $p = TopPick::find($id);

        $filename = pathinfo($p->path, PATHINFO_FILENAME);
        $extension = pathinfo($p->path, PATHINFO_EXTENSION);
        $filepath = public_path()."/images/flyer/toppick";

        File::delete($filepath ."/". $filename . "." .  $extension);
        File::delete($filepath . "/ls/" . $filename . "_418X277.jpg" );
        File::delete($filepath . "/p/" . $filename . "_836X553.jpg" );

        $p->delete();
        $t = "So long, top pick...";
        $r = "Top Pick deleted!<br /><a href='/admin/flyer'>Back to Flyer</a>";
        return View::make('admin/confirmation')
            ->with('response_title', $t)
            ->with('response', $r);
    }

    /**************************************************************************************
     * calendar
     *
     *
     */
    public function getCalendar()
    {
        $storedetails = Store::getStoreDetails(Confide::user()->store_id);
        $sn           = $storedetails[0]->id;

        $calendar = CommunityEvent::getevents($sn);
        return View::make('admin/calendar')
            ->with('calendar', $calendar);
    }

    public function addEvent()
    {
        return View::make('admin/addevent');
    }

    public function saveAddEvent()
    {
        $storedetails = Store::getStoreDetails(Confide::user()->store_id);
        $sn           = $storedetails[0]->id;

        $h = Input::get('hilite');
        if ($h == "on") {
            $h = 1;
        } else {
            $h = 0;
        }

        $eventdetails = array(
            'store_id'    => $sn,
            'title'       => Input::get('title'),
            'location'    => Input::get('location'),
            'start'       => Input::get('start'),
            'end'         => Input::get('end'),
            'description' => Input::get('description'),
            'hilite'      => $h,
        );
        $event = CommunityEvent::create($eventdetails);
        $event->save();

        $t = "Awesome!";
        $r = "Your new event has been created! <a href='/admin/calendar'>Back to Calendar</a>";
        return View::make('admin/confirmation')
            ->with('response_title', $t)
            ->with('response', $r);

    }

    public function removeEvent($id)
    {
        $e = CommunityEvent::find($id);
        $e->delete();
        $t = "Done!";
        $r = "Event deleted!<br /><a href='/admin/calendar'>Back to Calendar</a>";
        return View::make('admin/confirmation')
            ->with('response_title', $t)
            ->with('response', $r);
    }

    public function editEvent($id)
    {
        $event = DB::table('community_events')->where('id', $id)->first();
        return View::make('admin/eventedit')
            ->with('event', $event);
    }

    public function saveEditEvent()
    {
        $storedetails = Store::getStoreDetails(Confide::user()->store_id);
        $sn           = $storedetails[0]->id;

        $h = Input::get('hilite');
        if ($h == "on") {
            $h = 1;
        } else {
            $h = 0;
        }

        $id = Input::get('id');

        $eventedits = array(
            'store_id'    => $sn,
            'title'       => Input::get('title'),
            'location'    => Input::get('location'),
            'start'       => Input::get('start'),
            'end'         => Input::get('end'),
            'description' => Input::get('description'),
            'hilite'      => $h,
        );

        CommunityEvent::find($id)->update($eventedits);

        $t = "Awesome!";
        $r = "Your changes have been saved! <a href='/admin/calendar'>Back to Calendar</a>";
        return View::make('admin/confirmation')
            ->with('response_title', $t)
            ->with('response', $r);
    }

    /**************************************************************************************
     * feature content
     *
     *
     */
    public function getFeature()
    {
        $storedetails = Store::getStoreDetails(Confide::user()->store_id);
        $sn           = $storedetails[0]->id;

        $content = Feature::getFeatures($sn);
        return View::make('admin/feature')
            ->with('content', $content);
    }

    public function addFeature()
    {
        return View::make('admin/addfeature');
    }

    public function removeFeature($id)
    {
        $f = Feature::find($id);

        $filename = pathinfo($f->path, PATHINFO_FILENAME);
        $extension = pathinfo($f->path, PATHINFO_EXTENSION);
        $filepath = public_path()."/images/feature";

        File::delete($filepath ."/". $filename . "." .  $extension);
        File::delete($filepath . "/ls/" . $filename . "_1200X860.jpg" );
        File::delete($filepath . "/p/" . $filename . "_1080X795.jpg" );

        $f->delete();

        $t = "Done!";
        $r = "Feature content deleted!<br /><a href='/admin/feature'>Back to Feature Content</a>";
        return View::make('admin/confirmation')
            ->with('response_title', $t)
            ->with('response', $r);
    }

    public function editFeature($id)
    {
        $feature = DB::table('features')->where('id', $id)->first();
        return View::make('admin/featureedit')
            ->with('feature', $feature);
    }

    public function saveEditFeature()
    {

        $storedetails = Store::getStoreDetails(Confide::user()->store_id);
        $sn           = $storedetails[0]->id;

        $id   = Input::get('id');
        $file = Input::file('photo');

        if ($file) {

            $extension      = Input::file('photo')->getClientOriginalExtension();
            $directory      = public_path() . '/images/feature';
            $timestamp      = sha1(time() . time());
            $filename       = $timestamp . "." . $extension;
            $upload_success = Input::file('photo')->move($directory, $filename); //move and rename file

            Log::info($upload_success);
            Media::resize(1200, 860 , $directory, $timestamp, $extension, 'ls');
            Media::resize(1080, 795 , $directory, $timestamp, $extension, 'p');

            /*Remove old photo*/
            $oldPhoto     = Feature::find($id)->path; 
            $oldFilename  = pathinfo( $oldPhoto, PATHINFO_FILENAME);
            $extension = pathinfo( $oldPhoto, PATHINFO_EXTENSION);
            $filepath  = public_path()."/images/feature";

            File::delete($directory ."/". $oldFilename . "." .  $extension);
            File::delete($directory . "/ls/" . $oldFilename . "_1200X860.jpg" );
            File::delete($directory . "/p/" . $oldFilename . "_1080X795.jpg" );

            if ($upload_success) {
                $featuredits = array(
                    'store_id' => $sn,
                    'title'    => Input::get('title'),
                    'content'  => Input::get('content'),
                    'path'     => $filename,
                );

                Feature::find($id)->update($featuredits);

                $t = "Awesome!";
                $r = "Your changes have been saved, photo updated! <a href='/admin/feature'>Back to Feature Content</a>";
                return View::make('admin/confirmation')
                    ->with('response_title', $t)
                    ->with('response', $r);
            } else {
                $t = "Um...";
                $r = "Something bad happened. <a href='/admin/photos'>Back to Staff</a>";
                return View::make('admin/confirmation')
                    ->with('response_title', $t)
                    ->with('response', $r);
            }

        } else {
            $featuredits = array(
                'title'   => Input::get('title'),
                'content' => Input::get('content'),
            );

            Feature::find($id)->update($featuredits);

            $t = "Awesome!";
            $r = "Your changes have been saved! <a href='/admin/feature'>Back to Feature Content</a>";
            return View::make('admin/confirmation')
                ->with('response_title', $t)
                ->with('response', $r);

        }

    }

    public function saveAddFeature()
    {
        $storedetails = Store::getStoreDetails(Confide::user()->store_id);
        $sn           = $storedetails[0]->id;

        $extension = Input::file('feature')->getClientOriginalExtension();
        $directory = public_path() . '/images/feature';
        $timestamp = sha1(time() . time());
        $filename  = $timestamp . "." . $extension;

        $upload_success = Input::file('feature')->move($directory, $filename); //move and rename file

        /*create thumbnail*/

        Media::resize(1200, 860 , $directory, $timestamp, $extension, 'ls');
        Media::resize(1080, 795 , $directory, $timestamp, $extension, 'p');

        if ($upload_success) {
            $photodetails = array(
                'store_id' => $sn,
                'title'    => Input::get('title'),
                'content'  => Input::get('content'),
                'path'     => $filename,
            );

            $feature = Feature::create($photodetails);
            $feature->save();

            $t = "Dandy!";
            $r = "The new flyer page has been added! <a href='/admin/feature'>Back to Feature Content</a>";
            return View::make('admin/confirmation')
                ->with('response_title', $t)
                ->with('response', $r);
        } else {
            $t = "I don't know how to say this...";
            $r = "Something bad happened. <a href='/admin/feature'>Back to Feature Content</a>";
            return View::make('admin/confirmation')
                ->with('response_title', $t)
                ->with('response', $r);
        }

    }

    /**************************************************************************************
     * Jumpstart
     *
     *
     */

    public function getJumpstart()
    {
        $storedetails = Store::getStoreDetails(Confide::user()->store_id);
        $sn           = $storedetails[0]->id;

        $jumpstart = Jumpstart::getJumpstart($sn);
        return View::make('admin/jumpstart')
            ->with('jumpstart', $jumpstart);
    }

    public function editJumpstart()
    {
        $jumpstart = DB::table('jumpstart')->where('id', $id)->first();
        return View::make('admin/jumpstartedit')
            ->with('jumpstart', $jumpstart);
    }

    public function saveEditJumpstart()
    {

        $storedetails = Store::getStoreDetails(Confide::user()->store_id);
        $sn           = $storedetails[0]->id;

        $id   = Input::get('id');
        $file = Input::file('champ_photo');

        


        if ($file) {
            $extension      = Input::file('champ_photo')->getClientOriginalExtension();
            $directory      = public_path() . '/images/jumpstart/champs';
            $timestamp      = sha1(time() . time());
            $filename       = $timestamp . "." . $extension;
            $upload_success = Input::file('champ_photo')->move($directory, $filename); //move and rename file

            
            Media::fit(230, 230 , $directory, $timestamp, $extension, 'thumb', 'right');

            if ($upload_success) {
                $oldPhoto     = Jumpstart::find($id)->champ_photo; 
                $oldFilename  = pathinfo( $oldPhoto, PATHINFO_FILENAME);
                $extension = pathinfo( $oldPhoto, PATHINFO_EXTENSION);
                $filepath  = public_path()."/images/jumpstart/champs";

                File::delete($directory ."/". $oldFilename . "." .  $extension);
                File::delete($directory . "/thumb/" . $oldFilename . "_230X230.jpg" );

                $jumpstartedits = array(
                    'store_id'     => $sn,
                    'champ_name'   => Input::get('champ_name'),
                    'champ_bio'    => Input::get('champ_bio'),
                    'store_goal'   => Input::get('store_goal'),
                    'store_raised' => Input::get('store_raised'),
                    'champ_photo'  => $filename,
                );

                Jumpstart::find($id)->update($jumpstartedits);

                $t = "Awesome!";
                $r = "Your changes have been saved, photo updated! <a href='/admin/jumpstart'>Back to Jumpstart</a>";
                return View::make('admin/confirmation')
                    ->with('response_title', $t)
                    ->with('response', $r);
            } else {
                $t = "Um...";
                $r = "Something bad happened. <a href='/admin/jumpstart'>Back to Jumpstart</a>";
                return View::make('admin/confirmation')
                    ->with('response_title', $t)
                    ->with('response', $r);
            }

        } else {
            $jumpstartedits = array(
                'store_id'     => $sn,
                'champ_name'   => Input::get('champ_name'),
                'champ_bio'    => Input::get('champ_bio'),
                'store_goal'   => Input::get('store_goal'),
                'store_raised' => Input::get('store_raised'),
            );

            Jumpstart::find($id)->update($jumpstartedits);

            $t = "Awesome!";
            $r = "Your changes have been saved! <a href='/admin/jumpstart'>Back to Jumpstart</a>";
            return View::make('admin/confirmation')
                ->with('response_title', $t)
                ->with('response', $r);

        }

    }

    public function saveAddJumpStart()
    {

    }

}

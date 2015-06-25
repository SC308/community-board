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
        $filename  = sha1(time() . time()) . "." . $extension;

        $p = Input::get('publish');
        if ($p == "on") {
            $p = 1;
        } else {
            $p = 0;
        }

        $upload_success = Input::file('photo')->move($directory, $filename); //move and rename file

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
            $filename       = sha1(time() . time()) . "." . $extension;
            $upload_success = Input::file('photo')->move($directory, $filename); //move and rename file

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
        $filename  = sha1(time() . time()) . "." . $extension;

        $upload_success = Input::file('photo')->move($directory, $filename); //move and rename file

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
        $filename  = sha1(time() . time()) . "." . $extension;

        $upload_success = Input::file('flyer')->move($directory, $filename); //move and rename file

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
        $directory = public_path() . '/images/flyer';
        $filename  = sha1(time() . time()) . "." . $extension;

        $upload_success = Input::file('pick')->move($directory, $filename); //move and rename file

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
            $filename       = sha1(time() . time()) . "." . $extension;
            $upload_success = Input::file('photo')->move($directory, $filename); //move and rename file

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
        $filename  = sha1(time() . time()) . "." . $extension;

        $upload_success = Input::file('feature')->move($directory, $filename); //move and rename file

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
            $filename       = sha1(time() . time()) . "." . $extension;
            $upload_success = Input::file('champ_photo')->move($directory, $filename); //move and rename file

            if ($upload_success) {
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

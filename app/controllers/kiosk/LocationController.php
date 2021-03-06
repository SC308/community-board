<?php

class LocationController extends \BaseController
{

    private $menuItems;
    private $store_name;
    private $panel_name;
    private $panel_title;

    public function __construct()
    {
        if (Auth::user()) {

            if (Auth::user()->role == 1) {
                $this->menuItems = ["blog", "event", "gear", "league", "location", "sport"];
            } else {

                $this->menuItems = ["blog", "event", "league", "location", "sport"];
            }

            $this->store_name = Store::where('store_number', Auth::user()->store_id)->first()->store_name;

            $this->store_id = Store::where('store_number', Auth::user()->store_id)->first()->id;
        }

        $this->panel_name = "location";

        $this->panel_title = "Dashboard";

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $filter_sport_parameter = Input::get('sport');

        $filter_store_parameter = Input::get('store');

        $sort_parameter = Input::get('sort');

        if (Auth::user()->role == 1) {
            $locations = Location::all();
        } else {
            $locations = Location::where('store_id', $this->store_id)->get();
        }

        if (isset($filter_sport_parameter)) {
            $locations = Content::filter($locations, $filter_sport_parameter, "sport_id");
        }
        if (isset($filter_store_parameter)) {
            $locations = Content::filter($locations, $filter_store_parameter, "store_id");
        }

        if (isset($sort_parameter)) {
            $locations = Content::sort($locations, $sort_parameter);
        }

        $filterOptions[""] = "Filter By Sport";

        $filterOptions = $filterOptions + Sport::getSportWithLocation();

        $sortOptions = Location::getSortOptions();

        $storeOptions[""] = "Filter By Store";
        $allStores        = Store::all();
        foreach ($allStores as $store) {
            $storeOptions[$store->id] = $store->store_name;
        }

        $ifUserIsNT = Auth::user()->role;

        return View::make("kiosk/admin/dashboard/dashboard")->withTitle($this->panel_title)
            ->withItems($this->menuItems)
            ->withPanel($this->panel_name)
            ->withPanelData($locations)
            ->withSports($filterOptions)
            ->withStores($storeOptions)
            ->withSort($sortOptions)
            ->withUserType($ifUserIsNT);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $sports = Sport::getSportWithLocation();

        return View::make('kiosk/admin/forms/add/location')->withSports($sports)
                                                           ->withStore($this->store_name);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), Location::$rules);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return Redirect::to('admin/kiosk/' . Auth::user()->store_id . '/location/create')
                ->withErrors($validator);
        }

        $location = Location::create(
            [
                'sport_id'    => Input::get('sport_id'),
                'store_id'    => Store::where('store_number', Auth::user()->store_id)->first()->id,
                'name'        => Input::get('name'),
                'description' => Input::get('description'),
                'address'     => Input::get('address'),
                'postal_code' => Input::get('postal_code'),
                'latitude'    => Input::get('latitude'),
                'longitude'   => Input::get('longitude'),

            ]);
        return Redirect::to('/admin/kiosk/' . Auth::user()->store_id . "/location/" . $location->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($storeNumber, $id)
    {
        $location = Location::find($id);

        $sport = Sport::whereid($location->sport_id)->first()->name;

        return View::make('kiosk/admin/dashboard/viewDashboard')->withTitle($this->panel_title)
            ->withPanel($this->panel_name)
            ->withPanelData($location)
            ->withItems($this->menuItems)
            ->withSport($sport)
            ->withStore($this->store_name);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($storeNumber, $id)
    {

        $location = Location::find($id);

        $allSports = Sport::all();
        foreach ($allSports as $sport) {
            $sports[$sport->id] = $sport->name;
        }

        $stores    = array();
        $allStores = Store::all();
        foreach ($allStores as $store) {
            $stores[$store->id] = $store->store_name;
        }

        $selected_sport = Sport::whereid($location->sport_id)->first()->id;

        return View::make('kiosk/admin/forms/edit/location')->withLocation($location)
                                                            ->withSports($sports)
                                                            ->withStores($stores)
                                                            ->withSelectedSport($selected_sport)
                                                            ->withStore($this->store_name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($storeNumber, $id)
    {

        $validator = Validator::make(Input::all(), Location::$rules);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return Redirect::to('admin/kiosk/' . Auth::user()->store_id . '/location/' . $id . '/edit')
                ->withErrors($validator);
        }

        $location                = array();
        $location["name"]        = Input::get('name');
        $location["description"] = Input::get('description');
        $location["sport_id"]    = Input::get('sport_id');
        $location["store_id"]    = Store::where('store_number', Auth::user()->store_id)->first()->id;
        $location["address"]     = Input::get('address');
        $location["postal_code"] = Input::get('postal_code');
        $location["latitude"]    = Input::get('latitude');
        $location["longitude"]   = Input::get('longitude');

        Location::whereid($id)->update($location);
        return Redirect::to('/admin/kiosk/' . $storeNumber . '/location/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($storeNumber, $id)
    {
        Location::whereid($id)->delete();
    }

    public function getLocations($storeNumber, $sport = null)
    {

        $store_id  = Store::where('store_number', $storeNumber)->first()->id;
        $locations = Content::filter(Location::all(), $store_id, 'store_id');

        if ($sport != null) {

            $sport_id  = Sport::where('name', $sport)->first()->id;
            $locations = Content::filter($locations, $sport_id, "sport_id");

        }
        return $locations;

    }

}

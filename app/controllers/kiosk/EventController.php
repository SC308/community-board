<?php

class EventController extends \BaseController
{

    private $menuItems = [];
    private $panel_name;
    private $panel_title;
    private $store_id;

    public function __construct()
    {
        if (Auth::user()) {

            if (Auth::user()->role == 1) {
                $this->menuItems = array("blog", "event", "gear", "league", "location", "sport");
            } else {
                $this->menuItems = array("blog", "event", "league", "location", "sport");
            }

            $this->store_id = Store::where('store_number', Auth::user()->store_id)->first()->id;

        }

        $this->panel_name = "event";

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
            $events = CalendarEvent::all();
        } else {
            $events = CalendarEvent::where('store_id', $this->store_id)->get();
        }

        if (isset($filter_sport_parameter)) {
            $events = Content::filter($events, $filter_sport_parameter, "sport_id");

        }
        if (isset($filter_store_parameter)) {
            $events = Content::filter($events, $filter_store_parameter, "store_id");
        }

        if (isset($sort_parameter)) {
            $events = Content::sort($events, $sort_parameter);
        }

        $filterOptions[""] = "Filter By Sport";

        $filterOptions = $filterOptions + Sport::getAllSportName();

        $sortOptions = CalendarEvent::getSortOptions();

        $storeOptions[""] = "Filter By Store";
        $allStores        = Store::all();
        foreach ($allStores as $store) {
            $storeOptions[$store->id] = $store->store_name;
        }
        $ifUserIsNT = Auth::user()->role;
        return View::make("kiosk/admin/dashboard/dashboard")->withTitle($this->panel_title)
            ->withItems($this->menuItems)
            ->withPanel($this->panel_name)
            ->withPanelData($events)
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
        $sports    = array();
        $allSports = Sport::all();
        foreach ($allSports as $sport) {
            $sports[$sport->id] = $sport->name;
        }

        $stores    = array();
        $allStores = Store::all();
        foreach ($allStores as $store) {
            $stores[$store->id] = $store->store_name;
        }

        $currentStore = Store::where('store_number', Auth::user()->store_id)->first()->id;
        return View::make('kiosk/admin/forms/add/event')->withSports($sports)
                                                        ->withStores($stores)
                                                        ->withStore($currentStore);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

        $validator = Validator::make(Input::all(), CalendarEvent::$rules);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return Redirect::to('admin/kiosk/' . Auth::user()->store_id . '/event/create')
                ->withErrors($validator);
        }

        $store = Store::where("store_number", Auth::user()->store_id)->first()->id;
        $event = CalendarEvent::create(
            [

                'title'       => Input::get('title'),
                'description' => Input::get('description'),
                'event_start' => Input::get('event_start'),
                'event_end'   => Input::get('event_end'),
                'store_id'    => $store,
                'sport_id'    => Input::get('sport_id'),

            ]

        );

        return Redirect::to('/admin/kiosk/' . Auth::user()->id . '/event/' . $event->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($storeNumber, $id)
    {
        $event = CalendarEvent::find($id);

        $sport = Sport::where("id", $event->sport_id)->first()->name;

        $store = Store::where("id", $event->store_id)->first()->store_name;

        return View::make('kiosk/admin/dashboard/viewDashboard')->withPanel($this->panel_name)
            ->withPanelData($event)
            ->withTitle($this->panel_title)
            ->withItems($this->menuItems)
            ->withSport($sport)
            ->withStore($store);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($storeNumber, $id)
    {

        $sports    = array();
        $allSports = Sport::all();
        foreach ($allSports as $sport) {
            $sports[$sport->id] = $sport->name;
        }

        $stores    = array();
        $allStores = Store::all();
        foreach ($allStores as $store) {
            $stores[$store->id] = $store->store_name;
        }
        $event          = CalendarEvent::whereid($id)->first();
        $selected_sport = [$event->sport_id];
        $store          = Store::where('store_number', $storeNumber)->first()->id;
        return View::make('kiosk/admin/forms/edit/event')->withevent($event)
                                                         ->withsports($sports)
                                                         ->withstores($stores)
                                                         ->withStore($store)
                                                         ->withSelectedSport($selected_sport);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($storeNumber, $id)
    {

        $validator = Validator::make(Input::all(), CalendarEvent::$rules);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return Redirect::to('admin/kiosk/' . Auth::user()->store_id . '/event/' . $id . '/edit')
                ->withErrors($validator)
                ->withStore($id);
        }

        $store = Store::where('store_number', $storeNumber)->first()->id;

        $event                = array();
        $event['title']       = Input::get('title');
        $event['description'] = Input::get('description');
        $event['event_start'] = Input::get('event_start');
        $event['event_end']   = Input::get('event_end');
        $event['sport_id']    = Input::get('sport_id');
        $event['store_id']    = $store;

        CalendarEvent::whereid($id)->update($event);
        return Redirect::to('/admin/kiosk/' . $storeNumber . '/event/' . $id)->withStore($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($storeNumber, $id)
    {
        CalendarEvent::whereid($id)->delete();

    }

    public function getEvents($storeNumber, $sport = null)
    {
        $store_id = Store::where('store_number', $storeNumber)->first()->id;
        $events   = Content::filter(CalendarEvent::all(), $store_id, "store_id");

        if ($sport != null) {

            $sport_id = Sport::where('name', $sport)->first()->id;
            $events   = Content::filter($events, $sport_id, "sport_id");

        }
        return $events;
    }

}

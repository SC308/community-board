<?php

class MapController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /map
	 *
	 * @return Response
	 */
	public function index()
	{
		$menuItems= array("blog", "event", "gear", "league", "location", "sport", "store", "map");
		$menuPanel=  "map";
		$maps = Map::all();
		return View::make("admin/dashboard/dashboard")->withTitle("Dashboard")
												 ->withItems($menuItems)
												 ->withPanel($menuPanel)
												 ->withPanelData($maps);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /map/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /map
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /map/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /map/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /map/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /map/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}